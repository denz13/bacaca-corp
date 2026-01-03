<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MyPayroll extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    // Payslip Modal
    public $showPayslipModal = false;
    public $selectedPayrollId = null;
    public $payslipData = [];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
        $this->resetPage();
    }

    public function viewPayslip($payrollId)
    {
        $this->selectedPayrollId = $payrollId;
        $this->loadPayslipData();
        $this->showPayslipModal = true;
    }

    public function closePayslipModal()
    {
        $this->showPayslipModal = false;
        $this->selectedPayrollId = null;
        $this->payslipData = [];
    }

    private function loadPayslipData()
    {
        $userId = auth()->id();

        // Get main payroll data
        $this->payslipData['payroll'] = DB::table('process_payroll')
            ->where('id', $this->selectedPayrollId)
            ->where('empid', $userId)
            ->first();

        if (!$this->payslipData['payroll']) {
            abort(404, 'Payslip not found');
        }

        // Get deductions
        $this->payslipData['deductions'] = DB::table('deductions')
            ->join('payroll_deduction', 'deductions.deductionid', '=', 'payroll_deduction.id')
            ->where('deductions.payrollid', $this->selectedPayrollId)
            ->select('payroll_deduction.description', 'payroll_deduction.amount')
            ->get();

        // Get earnings
        $this->payslipData['earnings'] = DB::table('earnings_p')
            ->join('earnings', 'earnings_p.earnings_id', '=', 'earnings.id')
            ->where('earnings_p.payroll_id', $this->selectedPayrollId)
            ->select('earnings.earnings as description', 'earnings_p.amount')
            ->get();

        // Get late information
        $this->payslipData['lateInfo'] = DB::table('late')
            ->where('payrollidd', $this->selectedPayrollId)
            ->first();

        // Get final payroll
        $this->payslipData['finalPayroll'] = DB::table('f_payroll')
            ->where('p_id', $this->selectedPayrollId)
            ->first();

        // Get salary rate for monetization
        $employee = \App\Models\tbl_employee_info::find($userId);
        $salaryRate = (float) ($employee->salary ?? 0);
        $lateRatePerMinute = $salaryRate > 0 ? ($salaryRate / 60 / 8) : 0.0;

        $this->payslipData['summaryExtras'] = $this->buildSummaryExtras(
            $this->payslipData['payroll'],
            $userId
        );

        $this->payslipData['undertimeAmount'] = (float) (data_get($this->payslipData['summaryExtras'], 'total_undertime_minutes', 0) * $lateRatePerMinute);
        $this->payslipData['overtimeAmount'] = (float) (data_get($this->payslipData['summaryExtras'], 'total_overtime_minutes', 0) * $lateRatePerMinute);
    }

    private function buildSummaryExtras($payrollRow, int $userId): ?array
    {
        if (!$payrollRow || empty($payrollRow->period)) {
            return null;
        }

        $periodParts = explode(' - ', $payrollRow->period);
        if (count($periodParts) < 2) {
            return null;
        }

        try {
            $start = Carbon::parse(trim($periodParts[0]))->startOfDay();
            $end = Carbon::parse(trim(end($periodParts)))->endOfDay();
        } catch (\Throwable $e) {
            return null;
        }

        $attendance = DB::table('attendance')
            ->where('users_id', $userId)
            ->whereBetween('timestamp', [$start, $end])
            ->get();

        if ($attendance->isEmpty()) {
            return null;
        }

        $workedDays = $attendance
            ->map(fn ($row) => Carbon::parse($row->timestamp)->toDateString())
            ->unique()
            ->count();

        $totalUndertimeMinutes = (int) $attendance->sum(function ($row) {
            return (int) ($row->undertime_minutes ?? 0);
        });

        $totalOvertimeMinutes = (int) $attendance->sum(function ($row) {
            return (int) ($row->overtime_minutes ?? 0);
        });

        $potentialWorkMinutes = $workedDays * 8 * 60;
        $earnedMinutes = max(0, $potentialWorkMinutes - $totalUndertimeMinutes);
        $equivalentDays = $potentialWorkMinutes > 0
            ? round($earnedMinutes / (8 * 60), 2)
            : 0.0;

        return [
            'worked_days' => $workedDays,
            'equivalent_days' => $equivalentDays,
            'total_undertime_minutes' => $totalUndertimeMinutes,
            'total_overtime_minutes' => $totalOvertimeMinutes,
        ];
    }

    public function mount()
    {
        // Check if payslip_id is in the query string (from route redirect)
        $payslipId = request()->get('payslip_id');
        if ($payslipId) {
            $this->viewPayslip((int) $payslipId);
        }
    }

    public function render()
    {
        $userId = auth()->id();
        
        $query = DB::table('process_payroll')
            ->join('f_payroll', 'process_payroll.id', '=', 'f_payroll.p_id')
            ->leftJoin('late', 'process_payroll.id', '=', 'late.payrollidd')
            ->where('process_payroll.empid', $userId)
            ->select([
                'process_payroll.id',
                'process_payroll.period',
                'process_payroll.partial',
                'process_payroll.created_at',
                'f_payroll.net',
                'late.late as late_minutes',
                'late.amount as late_amount'
            ])
            ->distinct();

        // Apply search filter
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('process_payroll.period', 'like', '%' . $this->search . '%')
                  ->orWhere('process_payroll.partial', 'like', '%' . $this->search . '%')
                  ->orWhere('f_payroll.net', 'like', '%' . $this->search . '%');
            });
        }

        // Apply sorting
        if ($this->sortField === 'net') {
            $query->orderBy('f_payroll.net', $this->sortDirection);
        } elseif ($this->sortField === 'period') {
            $query->orderBy('process_payroll.period', $this->sortDirection);
        } elseif ($this->sortField === 'partial') {
            $query->orderBy('process_payroll.partial', $this->sortDirection);
        } else {
            $query->orderBy('process_payroll.created_at', $this->sortDirection);
        }

        $payrolls = $query->paginate($this->perPage);

        // Calculate summary statistics
        $summary = $this->calculateSummary($userId);

        return view('livewire.employee.my-payroll', [
            'payrolls' => $payrolls,
            'summary' => $summary
        ])->layout('layouts.employee', [
            'title' => 'My Payroll - Bacaca Corp',
            'page-title' => 'My Payroll'
        ]);
    }

    private function calculateSummary($userId)
    {
        $totalPayrolls = DB::table('process_payroll')
            ->where('empid', $userId)
            ->count();

        $totalNetPay = DB::table('process_payroll')
            ->join('f_payroll', 'process_payroll.id', '=', 'f_payroll.p_id')
            ->where('process_payroll.empid', $userId)
            ->sum('f_payroll.net');

        $averageNetPay = $totalPayrolls > 0 ? $totalNetPay / $totalPayrolls : 0;

        $latestPayroll = DB::table('process_payroll')
            ->join('f_payroll', 'process_payroll.id', '=', 'f_payroll.p_id')
            ->where('process_payroll.empid', $userId)
            ->orderBy('process_payroll.created_at', 'desc')
            ->first();

        return [
            'total_payrolls' => $totalPayrolls,
            'total_net_pay' => $totalNetPay,
            'average_net_pay' => $averageNetPay,
            'latest_payroll' => $latestPayroll
        ];
    }
}
