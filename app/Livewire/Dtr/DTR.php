<?php

namespace App\Livewire\Dtr;

use Livewire\Component;
use App\Models\tbl_employee_info;
use App\Models\attendance;
use App\Models\User;
use App\Models\work_schedule;
use Carbon\Carbon;

class DTR extends Component
{
    public $employees;
    public $selectedEmployee = null;
    public $selectedEmployeeId = null;
    public $dtrData = [];
    public ?string $startDate = null;
    public ?string $endDate = null;
    public $workSchedule = [];

    public function mount()
    {
        $this->employees = tbl_employee_info::limit(10)->get();
        $this->startDate = now()->startOfMonth()->format('Y-m-d');
        $this->endDate = now()->endOfMonth()->format('Y-m-d');
        
        // Auto-select first employee if available
        if ($this->employees->count() > 0) {
            $firstEmployee = $this->employees->first();
            $this->selectedEmployeeId = $firstEmployee->id;
            $this->selectedEmployee = $firstEmployee;
            $this->loadDtrData();
        }
    }

    public function selectEmployee($employeeId)
    {
        $this->selectedEmployeeId = $employeeId;
        $this->selectedEmployee = tbl_employee_info::find($employeeId);
        $this->loadDtrData();
    }

    public function loadDtrData()
    {
        if (!$this->selectedEmployeeId || !$this->startDate || !$this->endDate) {
            return;
        }

        // Direct connection: tbl_employee_info.id -> attendance.users_id
        // The users_id in attendance table directly references tbl_employee_info.id
        $employeeId = $this->selectedEmployeeId;

        // Get work schedule using users_id (which is the employee id)
        $this->workSchedule = work_schedule::where('users_id', $employeeId)
            ->where('status', 'active')
            ->get()
            ->keyBy('day')
            ->map(function ($schedule) {
                return [
                    'time_in' => Carbon::parse($schedule->time_in)->format('H:i'),
                    'time_out' => Carbon::parse($schedule->time_out)->format('H:i'),
                ];
            })
            ->toArray();

        // Parse date range
        $startDate = Carbon::parse($this->startDate)->startOfDay();
        $endDate = Carbon::parse($this->endDate)->endOfDay();

        // Get all days in the date range
        $this->dtrData = [];
        $currentDate = $startDate->copy();

        while ($currentDate->lte($endDate)) {
            $dateString = $currentDate->toDateString();
            $dayName = strtolower($currentDate->format('l'));
            $day = $currentDate->day;

            // Get attendance records for this day using users_id (tbl_employee_info.id)
            $records = attendance::where('users_id', $employeeId)
                ->whereDate('timestamp', $dateString)
                ->orderBy('timestamp', 'asc')
                ->get();

            $timeIns = $records->where('action', 'time_in')->values();
            $timeOuts = $records->where('action', 'time_out')->values();

            // Get scheduled times for this day
            $scheduledTimeIn = isset($this->workSchedule[$dayName]) ? ($this->workSchedule[$dayName]['time_in'] ?? '08:00') : '08:00';
            $scheduledTimeOut = isset($this->workSchedule[$dayName]) ? ($this->workSchedule[$dayName]['time_out'] ?? '12:00') : '12:00';
            $scheduledPmIn = '13:00';
            $scheduledPmOut = '17:00';

            // Determine AM IN/OUT and PM IN/OUT
            $amIn = $timeIns->first() ? Carbon::parse($timeIns->first()->timestamp)->format('H:i') : '';
            $amOut = $timeOuts->first() ? Carbon::parse($timeOuts->first()->timestamp)->format('H:i') : '';
            $pmIn = $timeIns->count() > 1 ? Carbon::parse($timeIns->get(1)->timestamp)->format('H:i') : '';
            $pmOut = $timeOuts->count() > 1 ? Carbon::parse($timeOuts->get(1)->timestamp)->format('H:i') : '';

            // Calculate undertime
            $undertime = 0;
            if ($pmOut) {
                $scheduledOut = Carbon::parse($dateString . ' ' . $scheduledPmOut);
                $actualOut = Carbon::parse($dateString . ' ' . $pmOut);
                if ($actualOut->lt($scheduledOut)) {
                    $undertime = $actualOut->diffInMinutes($scheduledOut);
                }
            }

            $this->dtrData[] = [
                'day' => $day,
                'date' => $dateString,
                'day_name' => $currentDate->format('l'),
                'am_in' => $amIn,
                'am_out' => $amOut,
                'pm_in' => $pmIn,
                'pm_out' => $pmOut,
                'undertime' => $undertime,
                'is_weekend' => in_array($dayName, ['saturday', 'sunday']),
                'scheduled' => [
                    'am_in' => $scheduledTimeIn,
                    'am_out' => $scheduledTimeOut,
                    'pm_in' => $scheduledPmIn,
                    'pm_out' => $scheduledPmOut,
                ],
            ];
            
            $currentDate->addDay();
        }
    }

    public function updatedStartDate()
    {
        if ($this->selectedEmployeeId && $this->startDate && $this->endDate) {
            $this->loadDtrData();
        }
    }

    public function updatedEndDate()
    {
        if ($this->selectedEmployeeId && $this->startDate && $this->endDate) {
            $this->loadDtrData();
        }
    }

    public function render()
    {
        return view('livewire.dtr.d-t-r');
    }
}
