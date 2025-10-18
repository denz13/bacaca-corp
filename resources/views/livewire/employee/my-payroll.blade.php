<div class="grid grid-cols-12 gap-6">
    <!-- Search and Filter -->
    <div class="col-span-12">
        <div class="intro-y box p-5">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="form-label">Search</label>
                    <input type="text" 
                           wire:model.live="search" 
                           placeholder="Search by period, amount..."
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
                <div class="flex items-end">
                    <button wire:click="$refresh" class="btn btn-primary w-full">
                        <i data-lucide="refresh-cw" class="w-4 h-4 mr-2"></i>
                        Refresh
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="col-span-12 sm:col-span-6 lg:col-span-3">
        <div class="intro-y box p-5">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                    <i data-lucide="credit-card" class="w-6 h-6 text-blue-600"></i>
                </div>
                <div class="ml-4">
                    <div class="text-2xl font-bold text-gray-900 dark:text-white">
                        {{ $summary['total_payrolls'] }}
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        Total Payrolls
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 lg:col-span-3">
        <div class="intro-y box p-5">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <i data-lucide="dollar-sign" class="w-6 h-6 text-green-600"></i>
                </div>
                <div class="ml-4">
                    <div class="text-2xl font-bold text-gray-900 dark:text-white">
                        ₱{{ number_format($summary['total_net_pay'], 2) }}
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        Total Net Pay
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 lg:col-span-3">
        <div class="intro-y box p-5">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                    <i data-lucide="trending-up" class="w-6 h-6 text-purple-600"></i>
                </div>
                <div class="ml-4">
                    <div class="text-2xl font-bold text-gray-900 dark:text-white">
                        ₱{{ number_format($summary['average_net_pay'], 2) }}
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        Average Net Pay
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-12 sm:col-span-6 lg:col-span-3">
        <div class="intro-y box p-5">
            <div class="flex items-center">
                <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                    <i data-lucide="calendar" class="w-6 h-6 text-yellow-600"></i>
                </div>
                <div class="ml-4">
                    <div class="text-lg font-bold text-gray-900 dark:text-white">
                        {{ $summary['latest_payroll'] ? \Carbon\Carbon::parse($summary['latest_payroll']->created_at)->format('M d, Y') : 'N/A' }}
                    </div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        Latest Payroll
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Payroll Records Table -->
    <div class="col-span-12">
        <div class="intro-y box p-5">
            <div class="flex items-center mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Payroll Records
                </h3>
                <div class="ml-auto">
                    <span class="text-sm text-gray-600 dark:text-gray-400">
                        Showing {{ $payrolls->firstItem() ?? 0 }} to {{ $payrolls->lastItem() ?? 0 }} of {{ $payrolls->total() }} records
                    </span>
                </div>
            </div>
            
            @if($payrolls->count() > 0)
                <div class="overflow-x-auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap cursor-pointer" 
                                    wire:click="sortBy('period')">
                                    Period
                                    @if($sortField === 'period')
                                        <i data-lucide="{{ $sortDirection === 'asc' ? 'chevron-up' : 'chevron-down' }}" 
                                           class="w-4 h-4 inline ml-1"></i>
                                    @endif
                                </th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap cursor-pointer" 
                                    wire:click="sortBy('partial')">
                                    Basic Pay
                                    @if($sortField === 'partial')
                                        <i data-lucide="{{ $sortDirection === 'asc' ? 'chevron-up' : 'chevron-down' }}" 
                                           class="w-4 h-4 inline ml-1"></i>
                                    @endif
                                </th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Late Deduction</th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap cursor-pointer" 
                                    wire:click="sortBy('net')">
                                    Net Pay
                                    @if($sortField === 'net')
                                        <i data-lucide="{{ $sortDirection === 'asc' ? 'chevron-up' : 'chevron-down' }}" 
                                           class="w-4 h-4 inline ml-1"></i>
                                    @endif
                                </th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap cursor-pointer" 
                                    wire:click="sortBy('created_at')">
                                    Date Processed
                                    @if($sortField === 'created_at')
                                        <i data-lucide="{{ $sortDirection === 'asc' ? 'chevron-up' : 'chevron-down' }}" 
                                           class="w-4 h-4 inline ml-1"></i>
                                    @endif
                                </th>
                                <th class="border-b-2 dark:border-dark-5 whitespace-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($payrolls as $payroll)
                                <tr>
                                    <td class="border-b dark:border-dark-5">
                                        <div class="font-medium">{{ $payroll->period }}</div>
                                    </td>
                                    <td class="border-b dark:border-dark-5">
                                        <div class="font-medium text-green-600">
                                            ₱{{ number_format($payroll->partial, 2) }}
                                        </div>
                                    </td>
                                    <td class="border-b dark:border-dark-5">
                                        <div class="text-red-600">
                                            ₱{{ number_format($payroll->late_amount ?? 0, 2) }}
                                        </div>
                                        @if($payroll->late_minutes > 0)
                                            <div class="text-xs text-gray-500">
                                                ({{ $payroll->late_minutes }} min)
                                            </div>
                                        @endif
                                    </td>
                                    <td class="border-b dark:border-dark-5">
                                        <div class="font-bold text-lg text-blue-600">
                                            ₱{{ number_format($payroll->net, 2) }}
                                        </div>
                                    </td>
                                    <td class="border-b dark:border-dark-5">
                                        {{ \Carbon\Carbon::parse($payroll->created_at)->format('M d, Y h:i A') }}
                                    </td>
                                    <td class="border-b dark:border-dark-5">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('employee.view-payslip', $payroll->id) }}" 
                                               class="btn btn-sm btn-primary">
                                                <i data-lucide="eye" class="w-4 h-4 mr-1"></i>
                                                View Payslip
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $payrolls->links() }}
                </div>
            @else
                <div class="text-center py-8">
                    <i data-lucide="credit-card" class="w-16 h-16 text-gray-400 mx-auto mb-4"></i>
                    <p class="text-gray-600 dark:text-gray-400">No payroll records found</p>
                    @if(!empty($search))
                        <p class="text-sm text-gray-500 mt-2">Try adjusting your search criteria</p>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>
