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
    
    // Modal properties
    public $showAttendanceModal = false;
    public $selectedDate = null;
    public $selectedAction = null; // 'time_in' or 'time_out'
    public $selectedTime = null;
    public $selectedWhen = null; // 'Morning In', 'Morning Out', 'Afternoon In', 'Afternoon Out', 'Undertime', 'Late'
    public $selectedValue = null; // For undertime/late minutes
    public $modalType = 'attendance'; // 'attendance' or 'minutes'
    public $selectedRecordId = null; // For updating existing records

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

            // Get undertime from attendance records (sum of all undertime_minutes for the day)
            $undertime = $records->sum('undertime_minutes') ?? 0;

            // Get late from attendance records (sum of all late_minutes for the day)
            $late = $records->sum('late_minutes') ?? 0;

            // Check if it's a weekend
            $isWeekend = in_array($dayName, ['saturday', 'sunday']);
            
            // Check if there's any attendance data for this day
            $hasAttendanceData = $records->count() > 0;

            $this->dtrData[] = [
                'day' => $day,
                'date' => $dateString,
                'day_name' => $currentDate->format('l'),
                'am_in' => $amIn,
                'am_out' => $amOut,
                'pm_in' => $pmIn,
                'pm_out' => $pmOut,
                'undertime' => $undertime,
                'late' => $late,
                'is_weekend' => $isWeekend,
                'has_attendance_data' => $hasAttendanceData,
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

    public function openAttendanceModal($date, $when)
    {
        $this->selectedDate = $date;
        $this->selectedWhen = $when;
        
        // Check if editing undertime or late
        if ($when === 'Undertime' || $when === 'Late') {
            $this->modalType = 'minutes';
            $this->selectedValue = '';
            
            // Get current value from attendance records
            $records = attendance::where('users_id', $this->selectedEmployeeId)
                ->whereDate('timestamp', $date)
                ->get();
            
            if ($when === 'Undertime') {
                $this->selectedValue = $records->sum('undertime_minutes') ?? 0;
            } else {
                $this->selectedValue = $records->sum('late_minutes') ?? 0;
            }
        } else {
            $this->modalType = 'attendance';
            // Determine action based on when
            if (str_contains($when, 'In')) {
                $this->selectedAction = 'time_in';
            } else {
                $this->selectedAction = 'time_out';
            }
            
            // Get existing attendance records for this date
            $allRecords = attendance::where('users_id', $this->selectedEmployeeId)
                ->whereDate('timestamp', $date)
                ->orderBy('timestamp', 'asc')
                ->get();
            
            // Determine which record to load based on when
            $recordToLoad = null;
            if ($when === 'Morning In') {
                $recordToLoad = $allRecords->where('action', 'time_in')->first();
            } elseif ($when === 'Morning Out') {
                $recordToLoad = $allRecords->where('action', 'time_out')->first();
            } elseif ($when === 'Afternoon In') {
                $recordToLoad = $allRecords->where('action', 'time_in')->skip(1)->first();
            } elseif ($when === 'Afternoon Out') {
                $recordToLoad = $allRecords->where('action', 'time_out')->skip(1)->first();
            }
            
            if ($recordToLoad) {
                $this->selectedTime = Carbon::parse($recordToLoad->timestamp)->format('H:i');
                $this->selectedRecordId = $recordToLoad->id;
            } else {
                // Set default time to current time if no existing record
                $this->selectedTime = now()->format('H:i');
                $this->selectedRecordId = null;
            }
        }
        
        $this->showAttendanceModal = true;
        $this->dispatch('open-attendance-modal');
    }

    public function closeAttendanceModal()
    {
        $this->showAttendanceModal = false;
        $this->selectedDate = null;
        $this->selectedAction = null;
        $this->selectedTime = null;
        $this->selectedWhen = null;
        $this->selectedValue = null;
        $this->selectedRecordId = null;
        $this->modalType = 'attendance';
        $this->dispatch('close-attendance-modal');
    }

    public function saveAttendance()
    {
        try {
            if ($this->modalType === 'minutes') {
                // Save undertime or late minutes - just update the value directly
                if (!$this->selectedEmployeeId || !$this->selectedDate || !$this->selectedWhen) {
                    $this->dispatch('show-toast', [
                        'type' => 'error',
                        'title' => 'Error',
                        'message' => 'Missing required fields'
                    ]);
                    return;
                }

            // Get existing attendance records for this date
            $records = attendance::where('users_id', $this->selectedEmployeeId)
                ->whereDate('timestamp', $this->selectedDate)
                ->get();

            if ($records->count() > 0) {
                // Update the first record with the minutes value
                $firstRecord = $records->first();
                if ($this->selectedWhen === 'Undertime') {
                    $firstRecord->update(['undertime_minutes' => $this->selectedValue ?? 0]);
                } else {
                    $firstRecord->update(['late_minutes' => $this->selectedValue ?? 0]);
                }
            } else {
                // Create a new record if none exists - just with the minutes value
                $timestamp = Carbon::parse($this->selectedDate . ' 08:00');
                $data = [
                    'users_id' => $this->selectedEmployeeId,
                    'action' => 'time_in',
                    'timestamp' => $timestamp,
                    'time' => '08:00',
                ];
                
                if ($this->selectedWhen === 'Undertime') {
                    $data['undertime_minutes'] = $this->selectedValue ?? 0;
                } else {
                    $data['late_minutes'] = $this->selectedValue ?? 0;
                }
                
                attendance::create($data);
            }
        } else {
            // Save or update attendance record
            if (!$this->selectedEmployeeId || !$this->selectedDate || !$this->selectedAction || !$this->selectedTime) {
                $this->dispatch('show-toast', [
                    'type' => 'error',
                    'title' => 'Error',
                    'message' => 'Missing required fields'
                ]);
                return;
            }

            // Create timestamp from date and time
            $timestamp = Carbon::parse($this->selectedDate . ' ' . $this->selectedTime);

            if ($this->selectedRecordId) {
                // Update existing record
                $record = attendance::find($this->selectedRecordId);
                if ($record) {
                    $record->update([
                        'timestamp' => $timestamp,
                        'time' => $this->selectedTime,
                    ]);
                }
            } else {
                // Create new attendance record
                attendance::create([
                    'users_id' => $this->selectedEmployeeId,
                    'action' => $this->selectedAction,
                    'timestamp' => $timestamp,
                    'time' => $this->selectedTime,
                ]);
            }
        }

        // Close modal first
        $this->closeAttendanceModal();
        
        // Reload DTR data
        $this->loadDtrData();
        
        // Show success toast
        $this->dispatch('show-toast', [
            'type' => 'success',
            'title' => 'Success',
            'message' => 'Attendance saved successfully'
        ]);
        } catch (\Exception $e) {
            // Show error toast
            $this->dispatch('show-toast', [
                'type' => 'error',
                'title' => 'Error',
                'message' => 'Error saving attendance: ' . $e->getMessage()
            ]);
        }
    }

    public function render()
    {
        return view('livewire.dtr.d-t-r');
    }
}
