<?php

namespace App\Livewire\Leave;

use App\Models\Leave;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class LeaveManager extends Component
{
    use WithPagination;

    public string $search = '';
    public int $perPage = 10;
    public ?string $filterMonth = null;
    public ?int $filterYear = null;

    public bool $showLeaveModal = false;
    public ?int $editingLeaveId = null;

    #[Rule('required', as: 'employee')]
    public ?int $formUserId = null;

    #[Rule('required|date', as: 'start date')]
    public ?string $formStartDate = null;

    #[Rule('required|date|after_or_equal:formStartDate', as: 'end date')]
    public ?string $formEndDate = null;

    #[Rule('nullable|string|max:255', as: 'reason')]
    public ?string $formReason = null;

    public function mount(): void
    {
        $this->filterMonth = now()->format('m');
        $this->filterYear = (int) now()->year;
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedPerPage(): void
    {
        $this->resetPage();
    }

    public function updatedFilterMonth(): void
    {
        $this->resetPage();
    }

    public function updatedFilterYear(): void
    {
        $this->resetPage();
    }

    public function openLeaveModal(?int $leaveId = null): void
    {
        $this->resetValidation();
        $this->editingLeaveId = $leaveId;

        if ($leaveId) {
            $leave = Leave::findOrFail($leaveId);
            $this->formUserId = $leave->user_id;
            $this->formStartDate = $leave->start_date->toDateString();
            $this->formEndDate = $leave->end_date->toDateString();
            $this->formReason = $leave->reason;
        } else {
            $this->reset(['formUserId', 'formStartDate', 'formEndDate', 'formReason']);
        }

        $this->showLeaveModal = true;
    }

    public function closeLeaveModal(): void
    {
        $this->showLeaveModal = false;
        $this->editingLeaveId = null;
        $this->reset(['formUserId', 'formStartDate', 'formEndDate', 'formReason']);
        $this->resetValidation();
    }

    public function saveLeave(): void
    {
        $validated = $this->validate();

        $start = Carbon::parse($this->formStartDate)->startOfDay();
        $end = Carbon::parse($this->formEndDate)->startOfDay();
        $days = $start->diffInDays($end) + 1;

        $payload = [
            'user_id' => $validated['formUserId'],
            'start_date' => $start->toDateString(),
            'end_date' => $end->toDateString(),
            'total_days' => $days,
            'reason' => $this->formReason,
            'recorded_by' => auth()->id(),
        ];

        if ($this->editingLeaveId) {
            Leave::whereKey($this->editingLeaveId)->update($payload);
            $message = 'Leave updated successfully.';
        } else {
            Leave::create($payload);
            $message = 'Leave recorded successfully.';
        }

        $this->dispatch('show-toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => $message,
        ]);

        $this->closeLeaveModal();
        $this->resetPage();
    }

    public function deleteLeave(int $leaveId): void
    {
        $leave = Leave::find($leaveId);
        if (!$leave) {
            return;
        }

        $leave->delete();

        $this->dispatch('show-toast', [
            'type' => 'success',
            'title' => 'Deleted',
            'message' => 'Leave record removed.',
        ]);

        $this->resetPage();
    }

    #[Computed]
    public function leavesThisMonth(): int
    {
        $start = now()->startOfMonth();
        $end = now()->endOfMonth();

        return Leave::overlapping($start, $end)->count();
    }

    #[Computed]
    public function leavesThisYear(): int
    {
        $start = now()->startOfYear();
        $end = now()->endOfYear();

        return Leave::overlapping($start, $end)->count();
    }

    #[Computed]
    public function monthlyBreakdown(): array
    {
        $year = now()->year;
        $data = [];

        for ($month = 1; $month <= 12; $month++) {
            $start = Carbon::create($year, $month, 1)->startOfMonth();
            $end = $start->copy()->endOfMonth();
            $data[$month] = Leave::overlapping($start, $end)->count();
        }

        return $data;
    }

    #[Computed]
    public function employees()
    {
        return User::orderBy('name')->get(['id', 'name', 'employee_id']);
    }

    public function render(): View
    {
        $query = Leave::query()
            ->with(['user', 'recordedBy'])
            ->orderByDesc('start_date');

        if (!empty($this->search)) {
            $term = '%' . $this->search . '%';
            $query->where(function ($inner) use ($term) {
                $inner->where('reason', 'like', $term)
                    ->orWhereHas('user', function ($userQuery) use ($term) {
                        $userQuery->where('name', 'like', $term)
                            ->orWhere('employee_id', 'like', $term);
                    });
            });
        }

        if (!empty($this->filterMonth)) {
            $query->whereMonth('start_date', (int) $this->filterMonth);
        }

        if (!empty($this->filterYear)) {
            $query->whereYear('start_date', (int) $this->filterYear);
        }

        $leaves = $query->paginate($this->perPage);

        return view('livewire.leave.leave-manager', [
            'leaves' => $leaves,
        ]);
    }
}

