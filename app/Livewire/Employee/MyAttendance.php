<?php

namespace App\Livewire\Employee;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\attendance;
use Carbon\Carbon;

class MyAttendance extends Component
{
    use WithPagination;

    public $startDate;
    public $endDate;
    public $search = '';
    public $perPage = 10;

    // Loading state
    public $isLoaded = false;
    public $dailyRecords = [];

    public function mount()
    {
        // Set default date range to current month
        $this->startDate = Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->endDate = Carbon::now()->endOfMonth()->format('Y-m-d');
    }

    public function updatedStartDate()
    {
        $this->resetPage();
    }

    public function updatedEndDate()
    {
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function loadAttendance()
    {
        // Validate that date range is selected
        if (!$this->startDate || !$this->endDate) {
            $this->dispatch('notification', [
                'type' => 'warning',
                'message' => 'Please select both start and end dates.',
            ]);
            return;
        }

        // Load the attendance data
        $this->dailyRecords = $this->generateDailyTimeRecords(auth()->id());
        $this->isLoaded = true;
        
        $this->dispatch('attendance-loaded');
    }

    public function render()
    {
        return view('livewire.employee.my-attendance', [
            'dailyRecords' => $this->dailyRecords
        ])->layout('layouts.employee', [
            'title' => 'My Daily Time Record - Bacaca Corp',
            'page-title' => 'My Daily Time Record'
        ]);
    }

    private function generateDailyTimeRecords($userId)
    {
        if (!$this->startDate || !$this->endDate) {
            return [];
        }

        $start = Carbon::parse($this->startDate);
        $end = Carbon::parse($this->endDate);
        $dailyRecords = [];

        // Get all attendance records for the date range from the attendance table
        $attendanceRecords = attendance::where('users_id', $userId)
            ->whereBetween('timestamp', [
                $start->startOfDay(),
                $end->endOfDay()
            ])
            ->orderBy('timestamp', 'asc')
            ->get()
            ->groupBy(function ($record) {
                return Carbon::parse($record->timestamp)->toDateString();
            });

        // Generate records for each day in the range
        $current = $start->copy();
        while ($current->lte($end)) {
            $dateString = $current->toDateString();
            $dayRecords = $attendanceRecords->get($dateString, collect());

            $dailyRecord = [
                'date' => $current->copy(),
                'day_number' => $current->format('d'),
                'day_name' => $current->format('l'),
                'is_weekend' => $current->isWeekend(),
                'time_in' => null,
                'break_out' => null,
                'break_in' => null,
                'time_out' => null,
                'has_records' => $dayRecords->isNotEmpty()
            ];

            // Process attendance records for this day
            if ($dayRecords->isNotEmpty()) {
                $timeIn = $dayRecords->where('action', 'time_in')->first();
                $breakOut = $dayRecords->where('action', 'break_out')->first();
                $breakIn = $dayRecords->where('action', 'break_in')->first();
                $timeOut = $dayRecords->where('action', 'time_out')->first();

                if ($timeIn) {
                    $dailyRecord['time_in'] = Carbon::parse($timeIn->timestamp)->format('H:i');
                }
                if ($breakOut) {
                    $dailyRecord['break_out'] = Carbon::parse($breakOut->timestamp)->format('H:i');
                }
                if ($breakIn) {
                    $dailyRecord['break_in'] = Carbon::parse($breakIn->timestamp)->format('H:i');
                }
                if ($timeOut) {
                    $dailyRecord['time_out'] = Carbon::parse($timeOut->timestamp)->format('H:i');
                }
            }

            $dailyRecords[] = $dailyRecord;
            $current->addDay();
        }

        return $dailyRecords;
    }

    private function calculateSummary($userId)
    {
        if (!$this->startDate || !$this->endDate) {
            return [
                'total_days' => 0,
                'total_late_minutes' => 0,
                'total_overtime_minutes' => 0,
                'attendance_rate' => 0
            ];
        }

        $start = Carbon::parse($this->startDate)->startOfDay();
        $end = Carbon::parse($this->endDate)->endOfDay();

        $totalDays = $start->diffInDays($end) + 1;
        $attendanceRecords = attendance::where('users_id', $userId)
            ->whereBetween('timestamp', [$start, $end])
            ->where('action', 'in')
            ->get();

        $uniqueDays = $attendanceRecords->map(function ($record) {
            return Carbon::parse($record->timestamp)->toDateString();
        })->unique()->count();

        $totalLateMinutes = attendance::where('users_id', $userId)
            ->whereBetween('timestamp', [$start, $end])
            ->sum('late_minutes');

        $totalOvertimeMinutes = attendance::where('users_id', $userId)
            ->whereBetween('timestamp', [$start, $end])
            ->sum('overtime_minutes');

        $attendanceRate = $totalDays > 0 ? round(($uniqueDays / $totalDays) * 100, 2) : 0;

        return [
            'total_days' => $totalDays,
            'days_present' => $uniqueDays,
            'total_late_minutes' => $totalLateMinutes,
            'total_overtime_minutes' => $totalOvertimeMinutes,
            'attendance_rate' => $attendanceRate
        ];
    }
}
