<?php

namespace App\Livewire\CreatePayroll;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\deduction;
use App\Models\earnings;

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
    
    // Deduction selection
    public array $selectedDeductions = [];
    public array $deductionAmounts = [];
    public ?int $selectedDeductionId = null;

    // Earnings selection
    public array $chosenEarnings = [];
    public array $earningsAmounts = [];
    public array $earningsDescriptions = [];
    public array $earningsSelectedBuffer = [];
    public ?int $selectedEarningId = null;
    public ?string $earningDescriptionInput = null;
    public ?float $earningAmountInput = null;

    public function openProcessPayrollModal(int $userId, string $userName): void
    {
        $this->selectedUserId = $userId;
        $this->selectedUserName = $userName;
        $this->showProcessPayrollModal = true;
        
        // Reset deduction selections
        $this->selectedDeductions = [];
        $this->deductionAmounts = [];
        $this->selectedDeductionId = null;
        $this->chosenEarnings = [];
        $this->earningsAmounts = [];
        $this->earningsDescriptions = [];
        $this->earningsSelectedBuffer = [];
        $this->selectedEarningId = null;
        $this->earningDescriptionInput = null;
        $this->earningAmountInput = null;
    }
    
    public function addDeduction(): void
    {
        if ($this->selectedDeductionId) {
            $deduction = deduction::find($this->selectedDeductionId);
            if ($deduction && !in_array($this->selectedDeductionId, $this->selectedDeductions)) {
                $this->selectedDeductions[] = $this->selectedDeductionId;
                $this->deductionAmounts[$this->selectedDeductionId] = $deduction->amount;
                $this->selectedDeductionId = null; // Reset dropdown
            }
        }
    }
    
    public function removeDeduction(int $deductionId): void
    {
        $this->selectedDeductions = array_filter($this->selectedDeductions, fn($id) => $id !== $deductionId);
        unset($this->deductionAmounts[$deductionId]);
    }
    
    public function updateDeductionAmount(int $deductionId, float $amount): void
    {
        $this->deductionAmounts[$deductionId] = $amount;
    }

    public function addSelectedEarnings(): void
    {
        if (empty($this->earningsSelectedBuffer)) {
            return;
        }

        $earnings = earnings::whereIn('id', $this->earningsSelectedBuffer)->get();

        foreach ($earnings as $earning) {
            $earningId = (int) $earning->id;
            if (!in_array($earningId, $this->chosenEarnings, true)) {
                $this->chosenEarnings[] = $earningId;
                $this->earningsAmounts[$earningId] = isset($this->earningsAmounts[$earningId])
                    ? (float) $this->earningsAmounts[$earningId]
                    : 0.0;
                $this->earningsDescriptions[$earningId] = isset($this->earningsDescriptions[$earningId])
                    ? (string) $this->earningsDescriptions[$earningId]
                    : (string) ($earning->earnings ?? '');
            }
        }

        $this->earningsSelectedBuffer = [];
    }

    public function removeEarning(int $earningId): void
    {
        $this->chosenEarnings = array_values(array_filter($this->chosenEarnings, fn ($id) => (int) $id !== (int) $earningId));
        unset($this->earningsAmounts[$earningId], $this->earningsDescriptions[$earningId]);
    }

    public function updateEarningAmount(int $earningId, float $amount): void
    {
        $this->earningsAmounts[$earningId] = $amount;
    }

    public function updateEarningDescription(int $earningId, string $description): void
    {
        $this->earningsDescriptions[$earningId] = $description;
    }

    public function addEarningFromForm(): void
    {
        if (!$this->selectedEarningId) {
            return;
        }

        $earning = earnings::find($this->selectedEarningId);
        if (!$earning) {
            return;
        }

        $earningId = (int) $earning->id;
        if (!in_array($earningId, $this->chosenEarnings, true)) {
            $this->chosenEarnings[] = $earningId;
        }

        $this->earningsDescriptions[$earningId] = isset($this->earningDescriptionInput) && $this->earningDescriptionInput !== ''
            ? (string) $this->earningDescriptionInput
            : (string) ($earning->earnings ?? '');

        $this->earningsAmounts[$earningId] = isset($this->earningAmountInput)
            ? (float) $this->earningAmountInput
            : 0.0;

        $this->selectedEarningId = null;
        $this->earningDescriptionInput = null;
        $this->earningAmountInput = null;
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

        // Get all deductions for the dropdown
        $deductions = deduction::where('status', 'active')->get();
        $earningsList = earnings::where('status', 'active')->get();

        return view('livewire.create-payroll.create-payroll', [
            'users' => $users,
            'deductions' => $deductions,
            'earningsList' => $earningsList,
        ]);
    }
}
