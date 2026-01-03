<?php

namespace App\Livewire\WorkSchedule;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\work_schedule;
use App\Models\tbl_employee_info;

class WorkSchedule extends Component
{
    use WithPagination;
    public bool $showAddScheduleModal = false;
    public ?int $users_id = null;
    public string $day = '';
    public string $time_in = '';
    public string $time_out = '';
    public string $status = 'active';
    public string $search = '';

    // Edit modal state
    public bool $showEditScheduleModal = false;
    public ?int $editUserId = null;
    public array $editSchedules = [];

    protected $rules = [
        'users_id' => 'required|integer|exists:tbl_employee_info,id',
        'day' => 'required|string|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
        'time_in' => 'required|date_format:H:i',
        'time_out' => 'required|date_format:H:i|after:time_in',
        'status' => 'required|in:active,inactive',
    ];

    public function openAddModal(): void
    {
        $this->resetForm();
        $this->showAddScheduleModal = true;
    }

    public function openEditModal(int $userId): void
    {
        $this->editUserId = $userId;
        $this->editSchedules = work_schedule::where('users_id', $userId)
            ->orderBy('day')
            ->orderBy('time_in')
            ->get(['id', 'day', 'time_in', 'time_out', 'status'])
            ->map(function ($ws) {
                return [
                    'id' => (int) $ws->id,
                    'day' => (string) $ws->day,
                    'time_in' => substr((string) $ws->time_in, 0, 5), // HH:MM
                    'time_out' => substr((string) $ws->time_out, 0, 5),
                    'status' => (string) $ws->status,
                ];
            })->toArray();

        $this->showEditScheduleModal = true;
    }

    public function updateSchedules(): void
    {
        // Basic validation for edit items
        $rules = [
            'editSchedules' => 'required|array|min:1',
            'editSchedules.*.id' => 'required|integer|exists:work_schedule,id',
            'editSchedules.*.day' => 'required|string|in:monday,tuesday,wednesday,thursday,friday,saturday,sunday',
            'editSchedules.*.time_in' => 'required|date_format:H:i',
            'editSchedules.*.time_out' => 'required|date_format:H:i',
            'editSchedules.*.status' => 'required|in:active,inactive',
        ];
        $validated = $this->validate($rules);

        // Ensure logical time order per item (time_out after time_in)
        foreach ($validated['editSchedules'] as $item) {
            if (strtotime($item['time_out']) <= strtotime($item['time_in'])) {
                $this->dispatch('show-toast', [
                    'message' => 'Time out must be after time in for ' . ucfirst($item['day']) . '.',
                    'type' => 'error',
                    'title' => 'Invalid Time'
                ]);
                return;
            }
        }

        try {
            foreach ($validated['editSchedules'] as $item) {
                work_schedule::where('id', $item['id'])
                    ->where('users_id', $this->editUserId)
                    ->update([
                        'day' => strtolower($item['day']),
                        'time_in' => $item['time_in'],
                        'time_out' => $item['time_out'],
                        'status' => $item['status'],
                    ]);
            }

            $this->dispatch('show-toast', [
                'message' => 'Schedules updated successfully.',
                'type' => 'success',
                'title' => 'Updated'
            ]);

            $this->showEditScheduleModal = false;
            $this->dispatch('close-modal', id: 'edit-work-schedule-modal');

            // Refresh list
            $this->resetPage();
        } catch (\Exception $e) {
            $this->dispatch('show-toast', [
                'message' => 'Error updating schedules: ' . $e->getMessage(),
                'type' => 'error',
                'title' => 'Error'
            ]);
        }
    }

    public function createSchedule(): void
    {
        $this->validate();

        try {
            // Prevent duplicate schedule for same user and day
            $exists = work_schedule::where('users_id', $this->users_id)
                ->where('day', strtolower($this->day))
                ->exists();
            if ($exists) {
                $this->dispatch('show-toast', [
                    'message' => 'This employee already has a schedule on this day.',
                    'type' => 'error',
                    'title' => 'Duplicate'
                ]);
                return;
            }
            work_schedule::create([
                'users_id' => $this->users_id,
                'day' => strtolower($this->day),
                'time_in' => $this->time_in,
                'time_out' => $this->time_out,
                'status' => $this->status,
            ]);

            $this->showAddScheduleModal = false;
            $this->dispatch('close-modal', id: 'add-work-schedule-modal');
            $this->dispatch('show-toast', [
                'message' => 'Work schedule created successfully.',
                'type' => 'success',
                'title' => 'Created'
            ]);

            $this->resetForm();
        } catch (\Exception $e) {
            $this->dispatch('show-toast', [
                'message' => 'Error creating work schedule: ' . $e->getMessage(),
                'type' => 'error',
                'title' => 'Error'
            ]);
        }
    }

    public function createScheduleAndAddAnother(): void
    {
        $this->validate();

        try {
            // Prevent duplicate schedule for same user and day
            $exists = work_schedule::where('users_id', $this->users_id)
                ->where('day', strtolower($this->day))
                ->exists();
            if ($exists) {
                $this->dispatch('show-toast', [
                    'message' => 'This employee already has a schedule on this day.',
                    'type' => 'error',
                    'title' => 'Duplicate'
                ]);
                return;
            }
            work_schedule::create([
                'users_id' => $this->users_id,
                'day' => strtolower($this->day),
                'time_in' => $this->time_in,
                'time_out' => $this->time_out,
                'status' => $this->status,
            ]);

            // Keep modal open, clear day/time only for quick multi-add
            $this->day = '';
            $this->time_in = '';
            $this->time_out = '';

            $this->dispatch('show-toast', [
                'message' => 'Work schedule saved. You can add another.',
                'type' => 'success',
                'title' => 'Saved'
            ]);
        } catch (\Exception $e) {
            $this->dispatch('show-toast', [
                'message' => 'Error creating work schedule: ' . $e->getMessage(),
                'type' => 'error',
                'title' => 'Error'
            ]);
        }
    }

    private function resetForm(): void
    {
        $this->users_id = null;
        $this->day = '';
        $this->time_in = '';
        $this->time_out = '';
        $this->status = 'active';
    }
    public function render()
    {
        $users = tbl_employee_info::orderBy('firstname')->get(['id', 'firstname', 'lastname']);

        $perPage = (int) request()->get('perPage', 10);
        if ($perPage <= 0) {
            $perPage = 10;
        }

        $usersWithSchedulesQuery = tbl_employee_info::with([
            'workSchedules' => function ($q) {
                $q->orderBy('day')->orderBy('time_in');
            },
        ])->whereHas('workSchedules');

        if (!empty($this->search)) {
            $term = '%' . $this->search . '%';
            $usersWithSchedulesQuery->where(function ($q) use ($term) {
                $q->where('firstname', 'like', $term)
                  ->orWhere('lastname', 'like', $term)
                  ->orWhereHas('workSchedules', function ($wq) use ($term) {
                      $wq->where('day', 'like', $term)
                         ->orWhere('status', 'like', $term)
                         ->orWhere('time_in', 'like', $term)
                         ->orWhere('time_out', 'like', $term);
                  });
            });
        }

        $usersWithSchedules = $usersWithSchedulesQuery
            ->orderBy('firstname')
            ->paginate($perPage);

        return view('livewire.work-schedule.work-schedule', [
            'users' => $users,
            'usersWithSchedules' => $usersWithSchedules,
        ]);
    }
}
