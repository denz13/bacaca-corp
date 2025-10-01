<?php

namespace App\Livewire\Calendar;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\calendar_holiday;

class Calendar extends Component
{
    public $currentMonth;
    public $currentYear;
    public $viewMode = 'month'; // month, week, day, list
    public $selectedDate;
    // events no longer persisted; computed on the fly
    public $showAddHoliday = false;
    public $holidayTitle = '';
    public $holidayDate = '';
    public $customHolidays = [];
    public $repeatType = 'yearly'; // yearly | monthly | day
    public $status = 'active';
    public $dayName = '';
    public $showEditHoliday = false;
    public ?int $editingId = null;

    public function mount()
    {
        $this->currentMonth = now()->month;
        $this->currentYear = now()->year;
        $this->selectedDate = now()->format('Y-m-d');
    }

    private function buildHolidays()
    {
        $startYear = max(2025, (int) $this->currentYear - 1);
        $endYear = (int) $this->currentYear + 5;
        $holidays = collect();

        for ($year = $startYear; $year <= $endYear; $year++) {
            $holidays = $holidays->merge($this->generatePhilippineHolidays($year));
        }

        // Include database holidays with repeat rules
        $dbHolidays = calendar_holiday::active()->get();
        foreach ($dbHolidays as $row) {
            $title = $row->title;
            $baseDate = Carbon::parse($row->date);
            switch ($row->repeat_type) {
                case 'day':
                    // Every day within the range
                    $cursor = Carbon::create($startYear, 1, 1);
                    $end = Carbon::create($endYear, 12, 31);
                    while ($cursor->lte($end)) {
                        $holidays->push(['date' => $cursor->format('Y-m-d'), 'title' => $title, 'source' => 'db', 'id' => $row->id]);
                        $cursor->addDay();
                    }
                    break;
                case 'monthly':
                    // Same day each month
                    for ($year = $startYear; $year <= $endYear; $year++) {
                        for ($month = 1; $month <= 12; $month++) {
                            $day = (int) $baseDate->day;
                            if (checkdate($month, min($day, 28), $year)) {
                                $date = Carbon::create($year, $month, min($day, Carbon::create($year, $month, 1)->endOfMonth()->day));
                                $holidays->push(['date' => $date->format('Y-m-d'), 'title' => $title, 'source' => 'db', 'id' => $row->id]);
                            }
                        }
                    }
                    break;
                case 'yearly':
                default:
                    // Same month/day each year
                    for ($year = $startYear; $year <= $endYear; $year++) {
                        $month = (int) $baseDate->month;
                        $day = (int) $baseDate->day;
                        if (checkdate($month, $day, $year)) {
                            $date = Carbon::create($year, $month, $day);
                            $holidays->push(['date' => $date->format('Y-m-d'), 'title' => $title, 'source' => 'db', 'id' => $row->id]);
                        }
                    }
                    break;
            }
        }

        return $holidays->map(function ($holiday) {
            $start = Carbon::parse($holiday['date'])->startOfDay();
            return [
                'id' => 'holiday_' . $start->format('Ymd'),
                'title' => $holiday['title'],
                'start' => $start->toDateTimeString(),
                'end' => $start->copy()->endOfDay()->toDateTimeString(),
                'type' => 'holiday',
                'color' => '#ef4444',
                'description' => 'Public holiday',
                'status' => 'active',
                'isCustom' => isset($holiday['source']) && $holiday['source'] === 'db',
                'customId' => $holiday['id'] ?? null,
            ];
        })->sortBy('start')->values();
    }

	private function generatePhilippineHolidays(int $year)
	{
		$holidays = collect();

		$push = function (string $date, string $title) use (&$holidays) {
			$holidays->push(['date' => $date, 'title' => $title]);
		};

		// Fixed regular holidays
		$push("$year-01-01", "New Year's Day");
		$push("$year-04-09", 'Araw ng Kagitingan');
		$push("$year-05-01", 'Labor Day');
		$push("$year-06-12", 'Independence Day');
		$push("$year-08-21", 'Ninoy Aquino Day'); // special (non-working)
		$push($this->lastMondayOfAugust($year), 'National Heroes Day');
		$push("$year-11-01", "All Saints' Day");
		$push("$year-11-02", "All Souls' Day");
		$push("$year-11-30", 'Bonifacio Day');
		$push("$year-12-08", 'Feast of the Immaculate Conception');
		$push("$year-12-25", 'Christmas Day');
		$push("$year-12-30", 'Rizal Day');

		// Movable (Holy Week) - Maundy Thursday and Good Friday
		$easter = $this->easterDate($year);
		$maundyThursday = $easter->copy()->subDays(3);
		$goodFriday = $easter->copy()->subDays(2);
		$push($maundyThursday->format('Y-m-d'), 'Maundy Thursday');
		$push($goodFriday->format('Y-m-d'), 'Good Friday');

		return $holidays;
	}

	private function lastMondayOfAugust(int $year): string
	{
		$date = Carbon::create($year, 8, 31);
		while ($date->dayOfWeek !== Carbon::MONDAY) {
			$date->subDay();
		}
		return $date->format('Y-m-d');
	}

	private function easterDate(int $year): Carbon
	{
		// Anonymous Gregorian algorithm
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

    public function previousMonth()
    {
        $date = Carbon::create($this->currentYear, $this->currentMonth, 1)->subMonth();
        $this->currentMonth = $date->month;
        $this->currentYear = $date->year;
    }

    public function nextMonth()
    {
        $date = Carbon::create($this->currentYear, $this->currentMonth, 1)->addMonth();
        $this->currentMonth = $date->month;
        $this->currentYear = $date->year;
    }

    public function goToToday()
    {
        $this->currentMonth = now()->month;
        $this->currentYear = now()->year;
        $this->selectedDate = now()->format('Y-m-d');
    }

    public function changeView($view)
    {
        $this->viewMode = $view;
    }

    public function selectDate($date)
    {
        $this->selectedDate = $date;
    }

    public function getEventsForDate($date)
    {
        return $this->buildHolidays()->filter(function ($event) use ($date) {
            $eventDate = Carbon::parse($event['start'])->format('Y-m-d');
            return $eventDate === $date;
        });
    }

    public function getEventsForMonth()
    {
        $startOfMonth = Carbon::create($this->currentYear, $this->currentMonth, 1)->startOfMonth();
        $endOfMonth = Carbon::create($this->currentYear, $this->currentMonth, 1)->endOfMonth();

        return $this->buildHolidays()->filter(function ($event) use ($startOfMonth, $endOfMonth) {
            $eventStart = Carbon::parse($event['start']);
            $eventEnd = Carbon::parse($event['end']);
            
            return $eventStart->between($startOfMonth, $endOfMonth) || 
                   $eventEnd->between($startOfMonth, $endOfMonth) ||
                   ($eventStart->lt($startOfMonth) && $eventEnd->gt($endOfMonth));
        });
    }

    public function openAddHoliday()
    {
        $this->showAddHoliday = true;
    }

    public function closeAddHoliday()
    {
        $this->showAddHoliday = false;
    }

    public function openEditHoliday(int $id)
    {
        $holiday = calendar_holiday::find($id);
        if (!$holiday) {
            $this->dispatch('show-toast', [ 'message' => 'Holiday not found.', 'type' => 'error', 'title' => 'Not Found' ]);
            return;
        }
        $this->editingId = $holiday->id;
        $this->holidayTitle = (string) $holiday->title;
        $this->holidayDate = Carbon::parse($holiday->date)->format('Y-m-d');
        $this->repeatType = (string) $holiday->repeat_type;
        $this->status = (string) $holiday->status;
        $this->dayName = Carbon::parse($holiday->date)->format('l');
        $this->showEditHoliday = true;
    }

    public function addHoliday()
    {
        $this->validate([
            'holidayTitle' => 'required|string|min:2|max:100',
            'holidayDate' => 'required|date|after_or_equal:2025-01-01',
            'repeatType' => 'required|in:yearly,monthly,day',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            $parsed = Carbon::parse($this->holidayDate);
            $dayName = $parsed->format('l');

            $holiday = new calendar_holiday();
            $holiday->title = (string) $this->holidayTitle;
            $holiday->date = $parsed->format('Y-m-d');
            $holiday->day = strtolower($dayName); // e.g., monday, tuesday
            $holiday->repeat_type = (string) $this->repeatType; // yearly|monthly|day
            $holiday->status = (string) $this->status;
            $holiday->save();

            // Close modal & show success toast (same pattern as CourseManagement)
            $this->showAddHoliday = false;
            $this->dispatch('close-modal', id: 'add-holiday-modal');
            $this->dispatch('show-toast', [
                'message' => 'Holiday has been successfully created.',
                'type' => 'success',
                'title' => 'Holiday Created!'
            ]);

            // Reset inputs
            $this->holidayTitle = '';
            $this->holidayDate = '';
            $this->repeatType = 'yearly';
            $this->status = 'active';
            $this->dayName = '';
        } catch (\Exception $e) {
            $this->dispatch('show-toast', [
                'message' => 'Error creating holiday: ' . $e->getMessage(),
                'type' => 'error',
                'title' => 'Error!'
            ]);
        }
    }

    public function updateHoliday()
    {
        if (!$this->editingId) {
            $this->dispatch('show-toast', [ 'message' => 'No holiday selected to update.', 'type' => 'error', 'title' => 'Error' ]);
            return;
        }

        $this->validate([
            'holidayTitle' => 'required|string|min:2|max:100',
            'holidayDate' => 'required|date|after_or_equal:2025-01-01',
            'repeatType' => 'required|in:yearly,monthly,day',
            'status' => 'required|in:active,inactive',
        ]);

        try {
            $holiday = calendar_holiday::find($this->editingId);
            if (!$holiday) {
                $this->dispatch('show-toast', [ 'message' => 'Holiday not found.', 'type' => 'error', 'title' => 'Not Found' ]);
                return;
            }

            $parsed = Carbon::parse($this->holidayDate);
            $holiday->title = (string) $this->holidayTitle;
            $holiday->date = $parsed->format('Y-m-d');
            $holiday->day = strtolower($parsed->format('l'));
            $holiday->repeat_type = (string) $this->repeatType;
            $holiday->status = (string) $this->status;
            $holiday->save();

            $this->showEditHoliday = false;
            $this->dispatch('close-modal', id: 'edit-holiday-modal');
            $this->dispatch('show-toast', [ 'message' => 'Holiday updated successfully.', 'type' => 'success', 'title' => 'Updated' ]);

            $this->editingId = null;
            $this->holidayTitle = '';
            $this->holidayDate = '';
            $this->repeatType = 'yearly';
            $this->status = 'active';
            $this->dayName = '';
        } catch (\Exception $e) {
            $this->dispatch('show-toast', [ 'message' => 'Error updating holiday: '.$e->getMessage(), 'type' => 'error', 'title' => 'Error' ]);
        }
    }

    public function updatedHolidayDate($value)
    {
        try {
            $this->dayName = Carbon::parse($value)->format('l');
        } catch (\Throwable $e) {
            $this->dayName = '';
        }
    }

    public function getCalendarDays()
    {
		$startOfMonth = Carbon::create($this->currentYear, $this->currentMonth, 1)->startOfMonth();
		$endOfMonth = Carbon::create($this->currentYear, $this->currentMonth, 1)->endOfMonth();
        
		// Align week to start on Sunday to match the UI headers (Sun..Sat)
		$startOfCalendar = $startOfMonth->copy()->startOfWeek(Carbon::SUNDAY);
		$endOfCalendar = $endOfMonth->copy()->endOfWeek(Carbon::SATURDAY);
        
        $days = collect();
        $current = $startOfCalendar->copy();
        
        while ($current->lte($endOfCalendar)) {
            $days->push([
                'date' => $current->format('Y-m-d'),
                'day' => $current->day,
                'isCurrentMonth' => $current->month === $this->currentMonth,
                'isToday' => $current->isToday(),
                'events' => $this->getEventsForDate($current->format('Y-m-d'))
            ]);
            $current->addDay();
        }
        
        return $days;
    }

    public function render()
    {
        $calendarDays = $this->getCalendarDays();
        $monthEvents = $this->getEventsForMonth();
        
        return view('livewire.calendar.calendar', [
            'calendarDays' => $calendarDays,
            'monthEvents' => $monthEvents,
            'currentMonthName' => Carbon::create($this->currentYear, $this->currentMonth, 1)->format('F Y'),
        ]);
    }
}
