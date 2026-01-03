<?php

namespace App\Livewire\Position;

use Livewire\Component;

use App\Models\position as PositionModel;
use Livewire\WithPagination;

class Position extends Component
{
    use WithPagination;

    public $search = '';
    public $showAddModal = false;
    public $showEditModal = false;

    // Form fields
    public $pos_id;
    public $position;
    public $job;
    public $salary;
    public $status = 'active';
    public $nature;

    protected $rules = [
        'position' => 'required|string|max:255',
        'job' => 'required|string|max:255',
        'salary' => 'required|string|max:255',
        'status' => 'required|in:active,inactive',
        'nature' => 'required|string|max:255',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function openAddModal()
    {
        $this->reset(['pos_id', 'position', 'job', 'salary', 'status', 'nature']);
        $this->showAddModal = true;
    }

    public function closeModals()
    {
        $this->showAddModal = false;
        $this->showEditModal = false;
        $this->reset(['pos_id', 'position', 'job', 'salary', 'status', 'nature']);
    }

    public function store()
    {
        $this->validate();

        PositionModel::create([
            'position' => $this->position,
            'job' => $this->job,
            'salary' => $this->salary,
            'status' => $this->status,
            'nature' => $this->nature,
        ]);

        $this->showAddModal = false;
        $this->reset(['position', 'job', 'salary', 'status', 'nature']);
        session()->flash('success', 'Position created successfully.');
    }

    public function edit($id)
    {
        $pos = PositionModel::findOrFail($id);
        $this->pos_id = $pos->pos_id;
        $this->position = $pos->position;
        $this->job = $pos->job;
        $this->salary = $pos->salary;
        $this->status = $pos->status;
        $this->nature = $pos->nature;

        $this->showEditModal = true;
    }

    public function update()
    {
        $this->validate();

        $pos = PositionModel::findOrFail($this->pos_id);
        $pos->update([
            'position' => $this->position,
            'job' => $this->job,
            'salary' => $this->salary,
            'status' => $this->status,
            'nature' => $this->nature,
        ]);

        $this->showEditModal = false;
        session()->flash('success', 'Position updated successfully.');
    }

    public function delete($id)
    {
        PositionModel::findOrFail($id)->delete();
        session()->flash('success', 'Position deleted successfully.');
    }

    public function render()
    {
        $positions = PositionModel::where('position', 'like', '%' . $this->search . '%')
            ->orWhere('job', 'like', '%' . $this->search . '%')
            ->latest()
            ->paginate(10);

        return view('livewire.position.position', [
            'positions' => $positions
        ]);
    }
}
