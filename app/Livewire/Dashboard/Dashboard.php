<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\User;
use App\Models\deduction;
use App\Models\earnings;
use App\Models\attendance;
use App\Models\tbl_employee_info;
use App\Models\Leave;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $totalEarnings = 0;
    public $totalDeductions = 0;
    public $totalAttendance = 0;
    public $totalEmployees = 0;
    public $totalLeaves = 0;
    public $topEmployees = [];

    public function mount()
    {
        $this->loadStatistics();
        $this->loadTopEmployees();
    }

    public function loadStatistics()
    {
        // Total Earnings (sum of earnings)
        $this->totalEarnings = earnings::where('status', 'active')->sum('earnings') ?? 0;
        
        // Total Deductions (sum of deductions)
        $this->totalDeductions = deduction::where('status', 'active')->sum('amount') ?? 0;
        
        // Total Attendance Records
        $this->totalAttendance = attendance::count();
        
        // Total Employees
        $this->totalEmployees = tbl_employee_info::count();
        
        // Total Leaves
        $this->totalLeaves = Leave::count();
    }

    public function loadTopEmployees()
    {
        // Get top 5 employees with earliest time_in attendance per day (today)
        // Get earliest time_in for each employee today
        $today = Carbon::today();
        
        $earliestTimeIns = attendance::where('action', 'time_in')
            ->whereDate('timestamp', $today)
            ->selectRaw('users_id, MIN(timestamp) as earliest_time_in')
            ->groupBy('users_id')
            ->orderBy('earliest_time_in', 'asc')
            ->limit(5)
            ->get();

        // Get employee details and format the data
        $this->topEmployees = $earliestTimeIns->map(function ($record) {
            $employee = tbl_employee_info::find($record->users_id);
            if ($employee) {
                return [
                    'id' => $employee->id,
                    'name' => trim($employee->firstname . ' ' . ($employee->middlename ? $employee->middlename . ' ' : '') . $employee->lastname . ($employee->suffix ? ' ' . $employee->suffix : '')),
                    'picture' => $employee->picture,
                    'time_in' => Carbon::parse($record->earliest_time_in)->format('M d, Y'),
                    'time' => Carbon::parse($record->earliest_time_in)->format('h:i A'),
                ];
            }
            return null;
        })->filter()->values()->toArray();
    }

    public function render()
    {
        return view('livewire.dashboard.dashboard');
    }
}
