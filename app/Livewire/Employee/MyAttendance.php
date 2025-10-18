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

    public function render()
    {
        $userId = auth()->id();
        $query = attendance::where('users_id', $userId)
            ->with('users');

        // Apply date range filter
        if ($this->startDate && $this->endDate) {
            $query->whereBetween('timestamp', [
                Carbon::parse($this->startDate)->startOfDay(),
                Carbon::parse($this->endDate)->endOfDay()
            ]);
        }

        // Apply search filter
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('action', 'like', '%' . $this->search . '%')
                  ->orWhere('time', 'like', '%' . $this->search . '%');
            });
        }

        $attendances = $query->orderBy('timestamp', 'desc')
            ->paginate($this->perPage);

        // Calculate summary statistics
        $summary = $this->calculateSummary($userId);

        return view('livewire.employee.my-attendance', [
            'attendances' => $attendances,
            'summary' => $summary
        ])->layout('layouts.employee', [
            'title' => 'My Attendance - Bacaca Corp',
            'page-title' => 'My Attendance'
        ]);
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
