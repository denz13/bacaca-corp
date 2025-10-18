<div class="grid grid-cols-12 gap-6">
    <!-- Welcome Card -->
    <div class="col-span-12">
        <div class="intro-y box p-5">
            <div class="flex items-center">
                <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center">
                    <i data-lucide="user" class="w-8 h-8 text-white"></i>
                </div>
                <div class="ml-4">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                        Welcome back, {{ $user->name }}!
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400">
                        Here's your employee dashboard overview
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="col-span-12 sm:col-span-6 lg:col-span-3">
        <div class="intro-y box p-5">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                    <i data-lucide="calendar" class="w-6 h-6 text-blue-600"></i>
                </div>
                <div class="ml-4">
                    <div class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ $totalAttendanceThisMonth }}
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        Days Present This Month
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
                        {{ $totalLateMinutes ?? 0 }}
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        Late Minutes This Month
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 lg:col-span-3">
        <div class="intro-y box p-5">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <i data-lucide="credit-card" class="w-6 h-6 text-green-600"></i>
                </div>
                <div class="ml-4">
                    <div class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ $recentPayrolls->count() }}
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        Recent Payrolls
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 lg:col-span-3">
        <div class="intro-y box p-5">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                    <i data-lucide="calendar-days" class="w-6 h-6 text-yellow-600"></i>
                </div>
                <div class="ml-4">
                    <div class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ $upcomingHolidays->count() }}
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        Upcoming Holidays
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Payrolls -->
    <div class="col-span-12 lg:col-span-8">
        <div class="intro-y box p-5">
            <div class="flex items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Recent Payrolls
                </h3>
                <a href="{{ route('employee.my-payroll') }}" class="ml-auto text-primary hover:text-primary-dark">
                    View All
                </a>
            </div>
            
            @if($recentPayrolls->count() > 0)
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Period</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Basic Pay</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Net Pay</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Date</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentPayrolls as $payroll)
                                <tr>
                                    <td class="border-b dark:border-dark-5">{{ $payroll->period }}</td>
                                    <td class="border-b dark:border-dark-5">₱{{ number_format($payroll->partial, 2) }}</td>
                                    <td class="border-b dark:border-dark-5">₱{{ number_format($payroll->net, 2) }}</td>
                                    <td class="border-b dark:border-dark-5">{{ \Carbon\Carbon::parse($payroll->created_at)->format('M d, Y') }}</td>
                                    <td class="border-b dark:border-dark-5">
                                        <a href="{{ route('employee.view-payslip', $payroll->id) }}" 
                                           class="btn btn-sm btn-primary">
                                            View Payslip
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center py-8">
                    <i data-lucide="credit-card" class="w-16 h-16 text-gray-400 mx-auto mb-4"></i>
                    <p class="text-gray-600 dark:text-gray-400">No payroll records found</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Upcoming Holidays -->
    <div class="col-span-12 lg:col-span-4">
        <div class="intro-y box p-5">
            <div class="flex items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Upcoming Holidays
                </h3>
            </div>
            
            @if($upcomingHolidays->count() > 0)
                <div class="space-y-3">
                    @foreach($upcomingHolidays as $holiday)
                        <div class="flex items-center p-3 bg-gray-50 dark:bg-gray-800 rounded-lg">
                            <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                                <i data-lucide="calendar" class="w-5 h-5 text-yellow-600"></i>
                            </div>
                            <div class="ml-3">
                                <div class="font-medium text-gray-900 dark:text-white">
                                    {{ $holiday->name ?? 'Holiday' }}
                                </div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ \Carbon\Carbon::parse($holiday->date)->format('M d, Y') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <i data-lucide="calendar-days" class="w-16 h-16 text-gray-400 mx-auto mb-4"></i>
                    <p class="text-gray-600 dark:text-gray-400">No upcoming holidays</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="col-span-12">
        <div class="intro-y box p-5">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                Quick Actions
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <a href="{{ route('employee.my-attendance') }}" 
                   class="flex items-center p-4 bg-blue-50 dark:bg-blue-900/20 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors">
                    <div class="w-10 h-10 bg-blue-100 dark:bg-blue-800 rounded-full flex items-center justify-center">
                        <i data-lucide="calendar" class="w-5 h-5 text-blue-600 dark:text-blue-400"></i>
                    </div>
                    <div class="ml-3">
                        <div class="font-medium text-gray-900 dark:text-white">View Attendance</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Check your attendance records</div>
                    </div>
                </a>

                <a href="{{ route('employee.my-payroll') }}" 
                   class="flex items-center p-4 bg-green-50 dark:bg-green-900/20 rounded-lg hover:bg-green-100 dark:hover:bg-green-900/30 transition-colors">
                    <div class="w-10 h-10 bg-green-100 dark:bg-green-800 rounded-full flex items-center justify-center">
                        <i data-lucide="credit-card" class="w-5 h-5 text-green-600 dark:text-green-400"></i>
                    </div>
                    <div class="ml-3">
                        <div class="font-medium text-gray-900 dark:text-white">View Payroll</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Check your payroll history</div>
                    </div>
                </a>

                <a href="{{ route('profile-management') }}" 
                   class="flex items-center p-4 bg-purple-50 dark:bg-purple-900/20 rounded-lg hover:bg-purple-100 dark:hover:bg-purple-900/30 transition-colors">
                    <div class="w-10 h-10 bg-purple-100 dark:bg-purple-800 rounded-full flex items-center justify-center">
                        <i data-lucide="user" class="w-5 h-5 text-purple-600 dark:text-purple-400"></i>
                    </div>
                    <div class="ml-3">
                        <div class="font-medium text-gray-900 dark:text-white">Update Profile</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Manage your profile information</div>
                    </div>
                </a>

                <a href="{{ route('logout') }}" 
                   class="flex items-center p-4 bg-red-50 dark:bg-red-900/20 rounded-lg hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors">
                    <div class="w-10 h-10 bg-red-100 dark:bg-red-800 rounded-full flex items-center justify-center">
                        <i data-lucide="log-out" class="w-5 h-5 text-red-600 dark:text-red-400"></i>
                    </div>
                    <div class="ml-3">
                        <div class="font-medium text-gray-900 dark:text-white">Logout</div>
                        <div class="text-sm text-gray-600 dark:text-gray-400">Sign out of your account</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
