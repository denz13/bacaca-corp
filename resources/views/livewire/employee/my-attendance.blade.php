<div class="grid grid-cols-12 gap-6">
    <!-- Date Range Filter -->
    <div class="col-span-12">
        <div class="intro-y box p-5">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                Filter Attendance Records
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div>
                    <label class="form-label">Start Date</label>
                    <input type="date" 
                           wire:model.live="startDate" 
                           class="form-control">
                </div>
                <div>
                    <label class="form-label">End Date</label>
                    <input type="date" 
                           wire:model.live="endDate" 
                           class="form-control">
                </div>
                <div>
                    <label class="form-label">Search</label>
                    <input type="text" 
                           wire:model.live="search" 
                           placeholder="Search by action or time..."
                           class="form-control">
                </div>
                <div>
                    <label class="form-label">Per Page</label>
                    <select wire:model.live="perPage" class="form-control">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="col-span-12 sm:col-span-6 lg:col-span-3">
        <div class="intro-y box p-5">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                    <i data-lucide="calendar" class="w-6 h-6 text-blue-600"></i>
                </div>
                <div class="ml-4">
                    <div class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ $summary['days_present'] }}
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        Days Present
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 lg:col-span-3">
        <div class="intro-y box p-5">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <i data-lucide="trending-up" class="w-6 h-6 text-green-600"></i>
                </div>
                <div class="ml-4">
                    <div class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ $summary['attendance_rate'] }}%
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        Attendance Rate
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 lg:col-span-3">
        <div class="intro-y box p-5">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                    <i data-lucide="clock" class="w-6 h-6 text-red-600"></i>
                </div>
                <div class="ml-4">
                    <div class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ $summary['total_late_minutes'] }}
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        Late Minutes
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 lg:col-span-3">
        <div class="intro-y box p-5">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                    <i data-lucide="clock-4" class="w-6 h-6 text-yellow-600"></i>
                </div>
                <div class="ml-4">
                    <div class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ $summary['total_overtime_minutes'] }}
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        Overtime Minutes
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Attendance Records Table -->
    <div class="col-span-12">
        <div class="intro-y box p-5">
            <div class="flex items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Attendance Records
                </h3>
                <div class="ml-auto">
                    <span class="text-sm text-gray-600 dark:text-gray-400">
                        Showing {{ $attendances->firstItem() ?? 0 }} to {{ $attendances->lastItem() ?? 0 }} of {{ $attendances->total() }} records
                    </span>
                </div>
            </div>
            
            @if($attendances->count() > 0)
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Date</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Time</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Action</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Status</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Late Minutes</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Overtime Minutes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($attendances as $attendance)
                                <tr>
                                    <td class="border-b dark:border-dark-5">
                                        {{ \Carbon\Carbon::parse($attendance->timestamp)->format('M d, Y') }}
                                    </td>
                                    <td class="border-b dark:border-dark-5">
                                        {{ \Carbon\Carbon::parse($attendance->timestamp)->format('h:i A') }}
                                    </td>
                                    <td class="border-b dark:border-dark-5">
                                        <span class="px-2 py-1 text-xs rounded-full
                                            {{ $attendance->action === 'in' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ strtoupper($attendance->action) }}
                                        </span>
                                    </td>
                                    <td class="border-b dark:border-dark-5">
                                        @if($attendance->is_late)
                                            <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">
                                                Late
                                            </span>
                                        @else
                                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">
                                                On Time
                                            </span>
                                        @endif
                                    </td>
                                    <td class="border-b dark:border-dark-5">
                                        {{ $attendance->late_minutes ?? 0 }} min
                                    </td>
                                    <td class="border-b dark:border-dark-5">
                                        {{ $attendance->overtime_minutes ?? 0 }} min
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $attendances->links() }}
                </div>
            @else
                <div class="text-center py-8">
                    <i data-lucide="calendar-x" class="w-16 h-16 text-gray-400 mx-auto mb-4"></i>
                    <p class="text-gray-600 dark:text-gray-400">No attendance records found for the selected date range</p>
                </div>
            @endif
        </div>
    </div>
</div>
