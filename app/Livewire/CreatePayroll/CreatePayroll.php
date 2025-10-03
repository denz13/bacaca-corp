<?php

namespace App\Livewire\CreatePayroll;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class CreatePayroll extends Component
{
    use WithPagination;

    /**
     * Selected date range.
     */
    public ?string $startDate = null;
    public ?string $endDate = null;
    public string $search = '';
    
    // Process Payroll Modal
    public bool $showProcessPayrollModal = false;
    public ?int $selectedUserId = null;
    public ?string $selectedUserName = null;

    public function openProcessPayrollModal(int $userId, string $userName): void
    {
        $this->selectedUserId = $userId;
        $this->selectedUserName = $userName;
        $this->showProcessPayrollModal = true;
    }

    public function render()
    {
        $perPage = (int) request()->get('perPage', 10);
        if ($perPage <= 0) {
            $perPage = 10;
        }

        $users = null;

        // Fetch all users with their attendance if date range is selected
        if ($this->startDate && $this->endDate) {
            $usersQuery = User::select('id', 'name', 'employee_id', 'designation_id', 'employment_type_id', 'profile_image')
                ->with(['attendance' => function ($query) {
                    $query->whereRaw('DATE(timestamp) >= ?', [$this->startDate])
                        ->whereRaw('DATE(timestamp) <= ?', [$this->endDate])
                        ->orderBy('timestamp', 'asc');
                }]);

            // Search filter
            if (!empty($this->search)) {
                $term = '%' . $this->search . '%';
                $usersQuery->where(function ($q) use ($term) {
                    $q->where('name', 'like', $term)
                        ->orWhere('employee_id', 'like', $term)
                        ->orWhere('designation_id', 'like', $term)
                        ->orWhere('employment_type_id', 'like', $term);
                });
            }

            $users = $usersQuery->orderBy('name')->paginate($perPage);
        }

        return view('livewire.create-payroll.create-payroll', [
            'users' => $users,
        ]);
    }
}
