<?php

namespace App\Livewire\CreatePayroll;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\deduction;
use App\Models\earnings;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\attendance as Attendance;

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

    // Success modal
    public bool $showSuccessModal = false;
    public array $processedSummary = [];

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

    public function processPayroll(): void
    {
        if (!$this->selectedUserId || !$this->startDate || !$this->endDate) {
            $this->dispatchBrowserEvent('notification', [
                'type' => 'warning',
                'message' => 'Please select a user and date range first.',
            ]);
            return;
        }

        // Gather attendance within range
        $start = Carbon::parse($this->startDate)->startOfDay();
        $end = Carbon::parse($this->endDate)->endOfDay();

        $attendanceInRange = Attendance::where('users_id', $this->selectedUserId)
            ->whereBetween('timestamp', [$start, $end])
            ->get();

        $uniqueDatesWorked = $attendanceInRange
            ->map(fn ($r) => Carbon::parse($r->timestamp)->toDateString())
            ->unique()
            ->values();

        $totalLateMinutes = (int) $attendanceInRange->sum(fn ($r) => (int) ($r->late_minutes ?? 0));

        // Get salary from position table
        $position = DB::table('position')->where('user_id', $this->selectedUserId)->first();
        $salaryRate = (float) ($position->salary ?? 0);
        $nature = (string) ($position->nature ?? 'day');

        // Compute partial: salary based on nature and biometric days
        $workedDays = $uniqueDatesWorked->count();
        $partial = $nature === 'day' ? $workedDays * $salaryRate : $salaryRate;

        // Compute totals for deductions and earnings
        $selectedDeductionIds = array_map('intval', $this->selectedDeductions);
        $totalDeductions = 0.0;
        if (!empty($selectedDeductionIds)) {
            $deductionRows = DB::table('payroll_deduction')->whereIn('id', $selectedDeductionIds)->get();
            $totalDeductions = (float) $deductionRows->sum(fn ($r) => (float) ($r->amount ?? 0));
        }

        $totalEarnings = 0.0;
        foreach ($this->chosenEarnings as $earningId) {
            $totalEarnings += (float) ($this->earningsAmounts[$earningId] ?? 0);
        }

        $lateAmount = (float) $totalLateMinutes * 1.0; // 1 per minute

        $periodStr = $start->toDateString() . ' - ' . $end->toDateString();

        DB::transaction(function () use (
            $periodStr,
            $partial,
            $selectedDeductionIds,
            $totalDeductions,
            $totalLateMinutes,
            $lateAmount,
            $totalEarnings
        ) {
            // 1) Partial payroll
            $pId = DB::table('process_payroll')->insertGetId([
                'empid' => $this->selectedUserId,
                'period' => $periodStr,
                'partial' => $partial,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 2) Deductions (reference payroll_deduction)
            if (!empty($selectedDeductionIds)) {
                $rows = DB::table('payroll_deduction')->whereIn('id', $selectedDeductionIds)->get();
                foreach ($rows as $row) {
                    DB::table('deductions')->insert([
                        'payrollid' => $pId,
                        'deductionid' => $row->id,
                        'description' => $row->description ?? null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            // 3) Earnings (reference earnings)
            foreach ($this->chosenEarnings as $earningId) {
                DB::table('earnings_p')->insert([
                    'payroll_id' => $pId,
                    'earnings_id' => (int) $earningId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // 4) Late record
            DB::table('late')->insert([
                'payrollidd' => $pId,
                'late' => $totalLateMinutes,
                'amount' => $lateAmount,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // 5) Final payroll
            $net = (float) $partial - (float) $totalDeductions - (float) $lateAmount + (float) $totalEarnings;
            DB::table('f_payroll')->insert([
                'p_id' => $pId,
                'net' => $net,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Expose summary
            $this->processedSummary = [
                'partial' => $partial,
                'total_deductions' => $totalDeductions,
                'late_minutes' => $totalLateMinutes,
                'late_amount' => $lateAmount,
                'total_earnings' => $totalEarnings,
                'net' => $net,
                'period' => $periodStr,
                'process_id' => $pId,
            ];
        });

        $this->showSuccessModal = true;
        $this->showProcessPayrollModal = false;
        $this->dispatch('refresh')->self();
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
