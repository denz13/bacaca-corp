<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use App\Models\tbl_employee_info;
use App\Models\attendance as Attendance;

class PayrollController extends Controller
{
    public function downloadPayslip($id)
    {
        // Get main payroll data
        $payroll = DB::table('process_payroll')
            ->where('id', $id)
            ->first();

        if (!$payroll) {
            abort(404, 'Payroll record not found');
        }

        $userId = $payroll->empid;
        $employee = tbl_employee_info::with('positionInfo')->find($userId);

        if (!$employee) {
            abort(404, 'Employee record not found');
        }

        $salaryRate = (float) ($employee->salary ?? 0);
        $lateRatePerMinute = $salaryRate > 0 ? ($salaryRate / 60 / 8) : 0.0;

        // Get deductions
        $deductions = DB::table('deductions')
            ->join('payroll_deduction', 'deductions.deductionid', '=', 'payroll_deduction.id')
            ->where('deductions.payrollid', $id)
            ->select('payroll_deduction.description', 'payroll_deduction.amount')
            ->get();

        // Get earnings
        $earnings = DB::table('earnings_p')
            ->join('earnings', 'earnings_p.earnings_id', '=', 'earnings.id')
            ->where('earnings_p.payroll_id', $id)
            ->select('earnings.earnings as description', 'earnings_p.amount')
            ->get();

        // Get late information
        $lateInfo = DB::table('late')
            ->where('payrollidd', $id)
            ->first();

        // Get final payroll
        $finalPayroll = DB::table('f_payroll')
            ->where('p_id', $id)
            ->first();

        $summaryExtras = $this->buildSummaryExtras($payroll, $userId);
        
        $undertimeAmount = (float) (data_get($summaryExtras, 'total_undertime_minutes', 0) * $lateRatePerMinute);
        $overtimeAmount = (float) (data_get($summaryExtras, 'total_overtime_minutes', 0) * $lateRatePerMinute);

        $data = [
            'payroll' => $payroll,
            'employee' => $employee,
            'deductions' => $deductions,
            'earnings' => $earnings,
            'lateInfo' => $lateInfo,
            'finalPayroll' => $finalPayroll,
            'summaryExtras' => $summaryExtras,
            'undertimeAmount' => $undertimeAmount,
            'overtimeAmount' => $overtimeAmount,
        ];

        $pdf = Pdf::loadView('pdf.payslip-pdf', $data);
        
        $filename = 'payslip_' . ($employee->lastname ?? 'employee') . '_' . $id . '.pdf';
        
        return $pdf->stream($filename);
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

        $attendance = Attendance::where('users_id', $userId)
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
}
