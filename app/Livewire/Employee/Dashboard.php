<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use App\Models\User;
use App\Models\attendance;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $user;
    public $totalAttendanceThisMonth;
    public $totalLateMinutes;
    public $recentPayrolls;
    public $upcomingHolidays;

    public function mount()
    {
        $this->user = auth()->user();
        $this->loadDashboardData();
    }

    public function loadDashboardData()
    {
        $userId = $this->user->id;
        $currentMonth = Carbon::now()->startOfMonth();
        $currentMonthEnd = Carbon::now()->endOfMonth();

        // Get total attendance this month
        $this->totalAttendanceThisMonth = attendance::where('users_id', $userId)
            ->whereBetween('timestamp', [$currentMonth, $currentMonthEnd])
            ->where('action', 'in')
            ->count();

        // Get total late minutes this month
        $this->totalLateMinutes = attendance::where('users_id', $userId)
            ->whereBetween('timestamp', [$currentMonth, $currentMonthEnd])
            ->sum('late_minutes');

        // Get recent payrolls (last 3)
        $this->recentPayrolls = DB::table('process_payroll')
            ->join('f_payroll', 'process_payroll.id', '=', 'f_payroll.p_id')
            ->where('process_payroll.empid', $userId)
            ->orderBy('process_payroll.created_at', 'desc')
            ->limit(3)
            ->get(['process_payroll.*', 'f_payroll.net']);

        // Get upcoming holidays (next 7 days)
        $this->upcomingHolidays = DB::table('calendar_holiday')
            ->where('date', '>=', Carbon::now())
            ->where('date', '<=', Carbon::now()->addDays(7))
            ->orderBy('date')
            ->get();
    }

    public function render()
    {
        return view('livewire.employee.dashboard')
            ->layout('layouts.employee', [
                'title' => 'Employee Dashboard - Bacaca Corp',
                'page-title' => 'Dashboard'
            ]);
    }
}
