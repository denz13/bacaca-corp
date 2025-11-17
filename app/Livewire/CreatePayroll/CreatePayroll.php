<?php

namespace App\Livewire\CreatePayroll;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use App\Models\User;
use App\Models\deduction;
use App\Models\earnings;
use App\Models\calendar_holiday as CalendarHoliday;
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

    // Holiday handling
    public array $holidayDetails = [];
    public array $holidayWorkSelections = [];
    public float $holidayRatePerDay = 0.0;

    // Success modal
    public bool $showSuccessModal = false;
    public array $processedSummary = [];

    public function updatedStartDate(): void
    {
        $this->resetHolidayData();
    }

    public function updatedEndDate(): void
    {
        $this->resetHolidayData();
    }

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

        $this->prepareHolidayData(force: true);
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

    public function updateHolidaySelection(string $date, $value): void
    {
        if (!isset($this->holidayDetails[$date])) {
            return;
        }

        $this->holidayWorkSelections[$date] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
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

        $this->prepareHolidayData();

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
        $totalUndertimeMinutes = (int) $attendanceInRange->sum(fn ($r) => (int) ($r->undertime_minutes ?? 0));

        // Get salary from position table
        $position = DB::table('position')->where('user_id', $this->selectedUserId)->first();
        $salaryRate = (float) ($position->salary ?? 0);
        $nature = (string) ($position->nature ?? 'day');

        // Compute partial: salary based on nature and biometric days
        $workedDays = $uniqueDatesWorked->count();
        $partial = $nature === 'day' ? $workedDays * $salaryRate : $salaryRate;
        $potentialWorkMinutes = $workedDays * 8 * 60;
        $earnedWorkMinutes = max(0, $potentialWorkMinutes - $totalUndertimeMinutes);
        $equivalentWorkDays = $potentialWorkMinutes > 0
            ? round($earnedWorkMinutes / (8 * 60), 4)
            : 0.0;

        // Compute totals for deductions and earnings
        $selectedDeductionIds = array_map('intval', $this->selectedDeductions);
        $totalDeductions = 0.0;
        if (!empty($selectedDeductionIds)) {
            $deductionRows = DB::table('payroll_deduction')->whereIn('id', $selectedDeductionIds)->get();
            $totalDeductions = (float) $deductionRows->sum(fn ($r) => (float) ($r->amount ?? 0));
        }

        $totalManualEarnings = 0.0;
        foreach ($this->chosenEarnings as $earningId) {
            $totalManualEarnings += (float) ($this->earningsAmounts[$earningId] ?? 0);
        }

        $holidayEntries = $this->getSelectedHolidayEntries();
        $holidayTotals = $this->calculateHolidayTotals();
        $holidayEarnings = (float) ($holidayTotals['total'] ?? 0.0);
        $holidayDays = (int) ($holidayTotals['days'] ?? 0);

        $totalEarnings = $totalManualEarnings + $holidayEarnings;

        $lateRatePerMinute = $salaryRate > 0 ? ($salaryRate / 60 / 8) : 0.0;
        $lateAmount = (float) $totalLateMinutes * (float) $lateRatePerMinute;

        $periodStr = $start->toDateString() . ' - ' . $end->toDateString();

        DB::transaction(function () use (
            $periodStr,
            $partial,
            $selectedDeductionIds,
            $totalDeductions,
            $totalLateMinutes,
            $lateAmount,
            $totalEarnings,
            $totalManualEarnings,
            $holidayEntries,
            $holidayEarnings,
            $lateRatePerMinute,
            $holidayDays,
            $totalUndertimeMinutes,
            $equivalentWorkDays,
            $workedDays
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
                    'amount' => (float) ($this->earningsAmounts[$earningId] ?? 0),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            if (!empty($holidayEntries) && $holidayEarnings > 0) {
                $holidayEarningId = $this->getHolidayEarningId();
                if ($holidayEarningId) {
                    foreach ($holidayEntries as $entry) {
                        DB::table('earnings_p')->insert([
                            'payroll_id' => $pId,
                            'earnings_id' => $holidayEarningId,
                            'amount' => (float) ($entry['amount'] ?? 0),
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
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
                'late_rate_per_minute' => $lateRatePerMinute,
                'worked_days' => $workedDays,
                'equivalent_days' => $equivalentWorkDays,
                'total_undertime_minutes' => $totalUndertimeMinutes,
                'manual_earnings' => $totalManualEarnings,
                'holiday_earnings' => $holidayEarnings,
                'total_earnings' => $totalEarnings,
                'net' => $net,
                'period' => $periodStr,
                'process_id' => $pId,
                'holiday_days' => $holidayDays,
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
        $earningsList = earnings::where('status', 'active')
            ->where('earnings', '!=', 'Holiday Pay')
            ->get();

        return view('livewire.create-payroll.create-payroll', [
            'users' => $users,
            'deductions' => $deductions,
            'earningsList' => $earningsList,
        ]);
    }

    protected function resetHolidayData(): void
    {
        $this->holidayDetails = [];
        $this->holidayWorkSelections = [];
        $this->holidayRatePerDay = 0.0;
    }

    protected function prepareHolidayData(bool $force = false): void
    {
        if (!$force && !empty($this->holidayDetails)) {
            return;
        }

        $this->resetHolidayData();

        if (!$this->selectedUserId || !$this->startDate || !$this->endDate) {
            return;
        }

        $start = Carbon::parse($this->startDate)->startOfDay();
        $end = Carbon::parse($this->endDate)->endOfDay();

        $position = DB::table('position')->where('user_id', $this->selectedUserId)->first();
        $salaryRate = (float) ($position->salary ?? 0);
        $this->holidayRatePerDay = round($salaryRate * 0.30, 2);

        if ($this->holidayRatePerDay <= 0) {
            return;
        }

        $attendanceDates = Attendance::where('users_id', $this->selectedUserId)
            ->whereBetween('timestamp', [$start, $end])
            ->get()
            ->map(fn ($record) => Carbon::parse($record->timestamp)->toDateString())
            ->unique()
            ->values();

        if ($attendanceDates->isEmpty()) {
            return;
        }

        $holidayCandidates = $this->collectHolidaysWithinRange($start, $end);

        foreach ($holidayCandidates as $date => $title) {
            if (!$attendanceDates->contains($date)) {
                continue;
            }

            $this->holidayDetails[$date] = [
                'title' => $title,
                'amount' => $this->holidayRatePerDay,
            ];

            if (!array_key_exists($date, $this->holidayWorkSelections)) {
                $this->holidayWorkSelections[$date] = true;
            }
        }

        $this->holidayWorkSelections = array_filter(
            $this->holidayWorkSelections,
            fn ($value, $date) => isset($this->holidayDetails[$date]),
            ARRAY_FILTER_USE_BOTH
        );
    }

    protected function getSelectedHolidayEntries(): array
    {
        if (empty($this->holidayDetails)) {
            return [];
        }

        $entries = [];

        foreach ($this->holidayDetails as $date => $detail) {
            if (!empty($this->holidayWorkSelections[$date])) {
                $entries[$date] = $detail;
            }
        }

        return $entries;
    }

    #[Computed]
    public function holidayTotals(): array
    {
        $entries = $this->getSelectedHolidayEntries();
        $total = 0.0;

        foreach ($entries as $entry) {
            $total += (float) ($entry['amount'] ?? 0);
        }

        return [
            'days' => count($entries),
            'total' => $total,
        ];
    }

    protected function calculateHolidayTotals(): array
    {
        return $this->holidayTotals;
    }

    protected function getHolidayEarningId(): ?int
    {
        if (!$this->selectedUserId) {
            return null;
        }

        $earning = earnings::withTrashed()->firstOrCreate(
            [
                'users_id' => $this->selectedUserId,
                'earnings' => 'Holiday Pay',
            ],
            [
                'status' => 'active',
            ]
        );

        return (int) $earning->id;
    }

    protected function collectHolidaysWithinRange(Carbon $start, Carbon $end): array
    {
        $holidays = [];

        $dbHolidays = CalendarHoliday::active()->get();
        foreach ($dbHolidays as $holiday) {
            $dates = $this->expandHolidayRecordDates($holiday, $start, $end);
            foreach ($dates as $date) {
                $holidays[$date] = $holiday->title ?? 'Holiday';
            }
        }

        $builtinHolidays = $this->builtinHolidayDatesBetween($start, $end);
        foreach ($builtinHolidays as $date => $title) {
            if (!isset($holidays[$date])) {
                $holidays[$date] = $title;
            }
        }

        ksort($holidays);

        return $holidays;
    }

    protected function expandHolidayRecordDates($holiday, Carbon $start, Carbon $end): array
    {
        $dates = [];
        $base = Carbon::parse($holiday->date);

        if ($holiday->repeat_type === 'yearly') {
            for ($year = $start->year; $year <= $end->year; $year++) {
                $candidate = $base->copy()->year($year);
                if ($candidate->betweenIncluded($start, $end)) {
                    $dates[] = $candidate->toDateString();
                }
            }
        } elseif ($holiday->repeat_type === 'monthly') {
            $cursor = $start->copy()->day($base->day);
            while ($cursor->lessThanOrEqualTo($end)) {
                if ($cursor->betweenIncluded($start, $end)) {
                    $dates[] = $cursor->toDateString();
                }
                $cursor->addMonth();
            }
        } else {
            if ($base->betweenIncluded($start, $end)) {
                $dates[] = $base->toDateString();
            }
        }

        return $dates;
    }

    protected function builtinHolidayDatesBetween(Carbon $start, Carbon $end): array
    {
        $holidays = [];

        for ($year = $start->year; $year <= $end->year; $year++) {
            foreach ($this->generatePhilippineHolidays($year) as $date => $title) {
                $dateObj = Carbon::parse($date);
                if ($dateObj->betweenIncluded($start, $end)) {
                    $holidays[$dateObj->toDateString()] = $title;
                }
            }
        }

        return $holidays;
    }

    protected function generatePhilippineHolidays(int $year): array
    {
        $holidays = [
            "$year-01-01" => "New Year's Day",
            "$year-04-09" => 'Araw ng Kagitingan',
            "$year-05-01" => 'Labor Day',
            "$year-06-12" => 'Independence Day',
            "$year-08-21" => 'Ninoy Aquino Day',
            $this->lastMondayOfAugust($year) => 'National Heroes Day',
            "$year-11-01" => "All Saints' Day",
            "$year-11-02" => "All Souls' Day",
            "$year-11-30" => 'Bonifacio Day',
            "$year-12-08" => 'Feast of the Immaculate Conception',
            "$year-12-25" => 'Christmas Day',
            "$year-12-30" => 'Rizal Day',
        ];

        $easter = $this->easterDate($year);
        $holidays[$easter->copy()->subDays(3)->format('Y-m-d')] = 'Maundy Thursday';
        $holidays[$easter->copy()->subDays(2)->format('Y-m-d')] = 'Good Friday';

        return $holidays;
    }

    protected function lastMondayOfAugust(int $year): string
    {
        $date = Carbon::create($year, 8, 31);
        while ($date->dayOfWeek !== Carbon::MONDAY) {
            $date->subDay();
        }

        return $date->format('Y-m-d');
    }

    protected function easterDate(int $year): Carbon
    {
        $a = $year % 19;
        $b = intdiv($year, 100);
        $c = $year % 100;
        $d = intdiv($b, 4);
        $e = $b % 4;
        $f = intdiv($b + 8, 25);
        $g = intdiv($b - $f + 1, 3);
        $h = (19 * $a + $b - $d - $g + 15) % 30;
        $i = intdiv($c, 4);
        $k = $c % 4;
        $l = (32 + 2 * $e + 2 * $i - $h - $k) % 7;
        $m = intdiv($a + 11 * $h + 22 * $l, 451);
        $month = intdiv($h + $l - 7 * $m + 114, 31);
        $day = (($h + $l - 7 * $m + 114) % 31) + 1;

        return Carbon::create($year, $month, $day);
    }
}
