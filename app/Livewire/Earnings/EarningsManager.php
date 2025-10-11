<?php

namespace App\Livewire\Earnings;

use App\Models\earnings;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class EarningsManager extends Component
{
    use WithPagination;

    public string $search = '';
    public int $perPage = 10;
    public string $sortField = 'created_at';
    public string $sortDirection = 'desc';

    public bool $showCreateModal = false;
    public bool $showEditModal = false;
    public bool $showSuccessModal = false;
    public ?string $successMessage = null;

    #[Rule('required|string|max:255')]
    public ?string $newEarning = null;

    public ?int $editEarningId = null;
    #[Rule('required|string|max:255')]
    public ?string $editEarningValue = null;

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingPerPage(): void
    {
        $this->resetPage();
    }

    public function sortBy(string $field): void
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }

    public function openCreateModal(): void
    {
        $this->resetValidation();
        $this->newEarning = null;
        $this->showCreateModal = true;
    }

    public function saveEarning(): void
    {
        $this->validateOnly('newEarning');

        earnings::create([
            'users_id' => Auth::id(),
            'earnings' => (string) $this->newEarning,
            'status' => 'active',
        ]);

        $this->showCreateModal = false;
        $this->newEarning = null;
        $this->successMessage = 'Earning added successfully';
        $this->showSuccessModal = true;
        $this->dispatch('notify', message: $this->successMessage);
    }

    public function openEditModal(int $earningId): void
    {
        $model = earnings::find($earningId);
        if (!$model) {
            return;
        }

        $this->resetValidation();
        $this->editEarningId = $model->id;
        $this->editEarningValue = (string) ($model->earnings ?? '');
        $this->showEditModal = true;
    }

    public function updateEarning(): void
    {
        $this->validateOnly('editEarningValue');
        if (!$this->editEarningId) {
            return;
        }

        $model = earnings::find($this->editEarningId);
        if (!$model) {
            return;
        }

        $model->update([
            'earnings' => (string) $this->editEarningValue,
        ]);

        $this->showEditModal = false;
        $this->editEarningId = null;
        $this->editEarningValue = null;
        $this->successMessage = 'Earning updated successfully';
        $this->showSuccessModal = true;
        $this->dispatch('notify', message: $this->successMessage);
    }

    public function render()
    {
        $query = earnings::query()
            ->when($this->search !== '', function ($q) {
                $term = '%' . $this->search . '%';
                $q->where('earnings', 'like', $term)
                  ->orWhere('status', 'like', $term);
            })
            ->orderBy($this->sortField, $this->sortDirection);

        $list = $query->paginate($this->perPage);

        return view('livewire.earnings.earnings-manager', [
            'list' => $list,
        ]);
    }
}


