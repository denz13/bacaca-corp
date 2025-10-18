<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ViewPayslip extends Component
{
    public $payrollId;
    public $payroll;
    public $deductions = [];
    public $earnings = [];
    public $lateInfo = [];
    public $finalPayroll = [];

    public function mount($payrollId)
    {
        $this->payrollId = $payrollId;
        $this->loadPayslipData();
    }

    public function loadPayslipData()
    {
        $userId = auth()->id();

        // Get main payroll data
        $this->payroll = DB::table('process_payroll')
            ->where('id', $this->payrollId)
            ->where('empid', $userId)
            ->first();

        if (!$this->payroll) {
            abort(404, 'Payslip not found');
        }

        // Get deductions
        $this->deductions = DB::table('deductions')
            ->join('payroll_deduction', 'deductions.deductionid', '=', 'payroll_deduction.id')
            ->where('deductions.payrollid', $this->payrollId)
            ->select('payroll_deduction.description', 'payroll_deduction.amount')
            ->get();

        // Get earnings
        $this->earnings = DB::table('earnings_p')
            ->join('earnings', 'earnings_p.earnings_id', '=', 'earnings.id')
            ->where('earnings_p.payroll_id', $this->payrollId)
            ->select('earnings.earnings as description', 'earnings.amount')
            ->get();

        // Get late information
        $this->lateInfo = DB::table('late')
            ->where('payrollidd', $this->payrollId)
            ->first();

        // Get final payroll
        $this->finalPayroll = DB::table('f_payroll')
            ->where('p_id', $this->payrollId)
            ->first();
    }

    public function render()
    {
        return view('livewire.employee.view-payslip')
            ->layout('layouts.employee', [
                'title' => 'View Payslip - Bacaca Corp',
                'page-title' => 'View Payslip'
            ]);
    }
}
