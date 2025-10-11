<?php

namespace App\Livewire\Deduction;

use App\Models\deduction;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class DeductionManager extends Component
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
    public ?string $newDescription = null;
    #[Rule('required|numeric|min:0')]
    public $newAmount = null; // keep as mixed to allow numeric validation

    public ?int $editId = null;
    #[Rule('required|string|max:255')]
    public ?string $editDescription = null;
    #[Rule('required|numeric|min:0')]
    public $editAmount = null;

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
        $this->newDescription = null;
        $this->newAmount = null;
        $this->showCreateModal = true;
    }

    public function saveDeduction(): void
    {
        $this->validateOnly('newDescription');
        $this->validateOnly('newAmount');

        deduction::create([
            'users_id' => Auth::id(),
            'description' => (string) $this->newDescription,
            'amount' => (float) $this->newAmount,
            'status' => 'active',
        ]);

        $this->showCreateModal = false;
        $this->newDescription = null;
        $this->newAmount = null;
        $this->successMessage = 'Deduction added successfully';
        $this->showSuccessModal = true;
        $this->dispatch('notify', message: $this->successMessage);
    }

    public function openEditModal(int $id): void
    {
        $model = deduction::find($id);
        if (!$model) {
            return;
        }

        $this->resetValidation();
        $this->editId = $model->id;
        $this->editDescription = (string) $model->description;
        $this->editAmount = (float) $model->amount;
        $this->showEditModal = true;
    }

    public function updateDeduction(): void
    {
        $this->validateOnly('editDescription');
        $this->validateOnly('editAmount');
        if (!$this->editId) {
            return;
        }

        $model = deduction::find($this->editId);
        if (!$model) {
            return;
        }

        $model->update([
            'description' => (string) $this->editDescription,
            'amount' => (float) $this->editAmount,
        ]);

        $this->showEditModal = false;
        $this->editId = null;
        $this->editDescription = null;
        $this->editAmount = null;
        $this->successMessage = 'Deduction updated successfully';
        $this->showSuccessModal = true;
        $this->dispatch('notify', message: $this->successMessage);
    }

    public function render()
    {
        $query = deduction::query()
            ->when($this->search !== '', function ($q) {
                $term = '%' . $this->search . '%';
                $q->where('description', 'like', $term)
                  ->orWhere('status', 'like', $term);
            })
            ->orderBy($this->sortField, $this->sortDirection);

        $list = $query->paginate($this->perPage);

        return view('livewire.deduction.deduction-manager', [
            'list' => $list,
        ]);
    }
}


