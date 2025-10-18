<div>
    <x-menu.notification-toast seconds="6" layout="compact" animated="true" />

    <!-- Header Section -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">My Daily Time Record</h1>
        </div>
    </div>

    <!-- Date Range Selector and Actions -->
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-2">
                <label class="text-sm font-medium text-gray-700 dark:text-gray-300">Select Date:</label>
                <div class="flex items-center gap-2">
                    <input type="date" wire:model.live="startDate" class="h-10 rounded-md border bg-background px-3 py-2 text-sm">
                    <span class="text-gray-500">to</span>
                    <input type="date" wire:model.live="endDate" class="h-10 rounded-md border bg-background px-3 py-2 text-sm">
                </div>
            </div>
            <button wire:click="loadAttendance" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary/20 border-primary/60 text-primary hover:bg-primary/5 h-10 rounded-md px-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M3 21v-5h5"/></svg>
                Load
            </button>
        </div>
    </div>

    <!-- Daily Time Record Table -->
    @if($isLoaded)
        <div class="border rounded-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-foreground/5 border-b border-foreground/10">
                        <tr>
                            <th class="p-3 text-center font-medium w-16">Day</th>
                            <th class="p-3 text-center font-medium w-20">Time In</th>
                            <th class="p-3 text-center font-medium w-20">Break Out</th>
                            <th class="p-3 text-center font-medium w-20">Break In</th>
                            <th class="p-3 text-center font-medium w-20">Time Out</th>
                            <th class="p-3 text-center font-medium w-20">Total Hours</th>
                            <th class="p-3 text-center font-medium w-20">Overtime</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dailyRecords as $record)
                            <tr class="border-b border-foreground/5">
                                @if($record['is_weekend'])
                                    <!-- Weekend Row -->
                                    <td colspan="7" class="p-3 text-center">
                                        <span class="text-red-600 font-medium text-lg">{{ strtoupper($record['day_name']) }}</span>
                                    </td>
                                @elseif(!$record['has_records'])
                                    <!-- Empty Day Row -->
                                    <td class="p-3 text-center font-medium">{{ $record['day_number'] }}</td>
                                    <td class="p-3 text-center">--:--</td>
                                    <td class="p-3 text-center">--:--</td>
                                    <td class="p-3 text-center">--:--</td>
                                    <td class="p-3 text-center">--:--</td>
                                    <td class="p-3 text-center">--:--</td>
                                    <td class="p-3 text-center">--:--</td>
                                @else
                                    <!-- Working Day Row -->
                                    <td class="p-3 text-center font-medium">{{ $record['day_number'] }}</td>
                                    <td class="p-3 text-center">{{ $record['time_in'] ?? '--:--' }}</td>
                                    <td class="p-3 text-center">{{ $record['break_out'] ?? '--:--' }}</td>
                                    <td class="p-3 text-center">{{ $record['break_in'] ?? '--:--' }}</td>
                                    <td class="p-3 text-center">{{ $record['time_out'] ?? '--:--' }}</td>
                                    <td class="p-3 text-center">
                                        @if($record['time_in'] && $record['time_out'])
                                            @php
                                                $timeIn = \Carbon\Carbon::createFromFormat('H:i', $record['time_in']);
                                                $timeOut = \Carbon\Carbon::createFromFormat('H:i', $record['time_out']);
                                                $totalMinutes = $timeOut->diffInMinutes($timeIn);
                                                
                                                // Subtract break time if both break out and break in exist
                                                if ($record['break_out'] && $record['break_in']) {
                                                    $breakOut = \Carbon\Carbon::createFromFormat('H:i', $record['break_out']);
                                                    $breakIn = \Carbon\Carbon::createFromFormat('H:i', $record['break_in']);
                                                    $breakMinutes = $breakIn->diffInMinutes($breakOut);
                                                    $totalMinutes -= $breakMinutes;
                                                }
                                                
                                                $hours = floor($totalMinutes / 60);
                                                $minutes = $totalMinutes % 60;
                                            @endphp
                                            {{ sprintf('%02d:%02d', $hours, $minutes) }}
                                        @else
                                            --:--
                                        @endif
                                    </td>
                                    <td class="p-3 text-center">
                                        @if($record['time_in'] && $record['time_out'])
                                            @php
                                                $timeIn = \Carbon\Carbon::createFromFormat('H:i', $record['time_in']);
                                                $timeOut = \Carbon\Carbon::createFromFormat('H:i', $record['time_out']);
                                                $totalMinutes = $timeOut->diffInMinutes($timeIn);
                                                
                                                // Subtract break time if both break out and break in exist
                                                if ($record['break_out'] && $record['break_in']) {
                                                    $breakOut = \Carbon\Carbon::createFromFormat('H:i', $record['break_out']);
                                                    $breakIn = \Carbon\Carbon::createFromFormat('H:i', $record['break_in']);
                                                    $breakMinutes = $breakIn->diffInMinutes($breakOut);
                                                    $totalMinutes -= $breakMinutes;
                                                }
                                                
                                                // Calculate overtime (assuming 8 hours = 480 minutes is regular time)
                                                $overtimeMinutes = max(0, $totalMinutes - 480);
                                                $overtimeHours = floor($overtimeMinutes / 60);
                                                $overtimeMins = $overtimeMinutes % 60;
                                            @endphp
                                            @if($overtimeMinutes > 0)
                                                {{ sprintf('%02d:%02d', $overtimeHours, $overtimeMins) }}
                                            @else
                                                --:--
                                            @endif
                                        @else
                                            --:--
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="p-4 text-center opacity-70">No attendance records found for the selected date range</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <!-- Empty State -->
        <div class="border rounded-md overflow-hidden">
            <div class="p-8 text-center">
                <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 rounded-full flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                        <line x1="16" y1="2" x2="16" y2="6"/>
                        <line x1="8" y1="2" x2="8" y2="6"/>
                        <line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No Data Loaded</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-4">Select a date range and click "Load" to view your attendance records.</p>
                <div class="text-sm text-gray-500">
                    <p>• Choose your start and end dates</p>
                    <p>• Click the "Load" button to fetch attendance data</p>
                    <p>• View your daily time records and summary</p>
                </div>
            </div>
        </div>
    @endif

    <!-- Summary Section -->
    @if($isLoaded && count($dailyRecords) > 0)
        <div class="mt-6 grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-blue-100 dark:bg-blue-800 rounded-full flex items-center justify-center">
                        <i data-lucide="calendar" class="w-5 h-5 text-blue-600 dark:text-blue-400"></i>
                    </div>
                    <div class="ml-3">
                        <div class="text-2xl font-bold text-blue-600">{{ count($dailyRecords) }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Total Days</div>
                    </div>
                </div>
            </div>

            <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-green-100 dark:bg-green-800 rounded-full flex items-center justify-center">
                        <i data-lucide="check-circle" class="w-5 h-5 text-green-600 dark:text-green-400"></i>
                    </div>
                    <div class="ml-3">
                        <div class="text-2xl font-bold text-green-600">{{ collect($dailyRecords)->where('has_records', true)->where('is_weekend', false)->count() }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Working Days</div>
                    </div>
                </div>
            </div>

            <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-purple-100 dark:bg-purple-800 rounded-full flex items-center justify-center">
                        <i data-lucide="clock" class="w-5 h-5 text-purple-600 dark:text-purple-400"></i>
                    </div>
                    <div class="ml-3">
                        <div class="text-2xl font-bold text-purple-600">{{ collect($dailyRecords)->where('is_weekend', true)->count() }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Weekend Days</div>
                    </div>
                </div>
            </div>

            <div class="bg-yellow-50 dark:bg-yellow-900/20 p-4 rounded-lg">
                <div class="flex items-center">
                    <div class="w-10 h-10 bg-yellow-100 dark:bg-yellow-800 rounded-full flex items-center justify-center">
                        <i data-lucide="calendar-x" class="w-5 h-5 text-yellow-600 dark:text-yellow-400"></i>
                    </div>
                    <div class="ml-3">
                        <div class="text-2xl font-bold text-yellow-600">{{ collect($dailyRecords)->where('has_records', false)->where('is_weekend', false)->count() }}</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Absent Days</div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
