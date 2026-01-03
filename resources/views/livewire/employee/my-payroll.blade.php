<div>
    <x-menu.notification-toast seconds="6" layout="compact" animated="true" />

    <!-- Search and Filter -->
    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-3">
            <div class="relative w-56">
                <input wire:model.debounce.400ms="search" class="h-10 rounded-md border bg-background px-3 py-2 ring-offset-background file:border-0 file:bg-transparent file:font-medium file:text-foreground placeholder:text-foreground/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 box w-56 pr-10" type="text" placeholder="Search by period, amount...">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="search" class="lucide lucide-search size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 absolute inset-y-0 right-0 my-auto mr-3 h-4 w-4"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
            </div>
            <select wire:model="perPage" class="h-10 rounded-md border bg-background px-3 py-2">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
        <button wire:click="$refresh" type="button" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 bg-primary/20 border-primary/60 text-primary hover:bg-primary/5 h-10 rounded-md px-3 min-w-32">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M3 21v-5h5"/></svg>
            Refresh
        </button>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-lg">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-blue-100 dark:bg-blue-800 rounded-full flex items-center justify-center">
                    <i data-lucide="credit-card" class="w-5 h-5 text-blue-600 dark:text-blue-400"></i>
                </div>
                <div class="ml-3">
                    <div class="text-2xl font-bold text-blue-600">{{ $summary['total_payrolls'] }}</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Total Payrolls</div>
                </div>
            </div>
        </div>

        <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-green-100 dark:bg-green-800 rounded-full flex items-center justify-center">
                    <i data-lucide="dollar-sign" class="w-5 h-5 text-green-600 dark:text-green-400"></i>
                </div>
                <div class="ml-3">
                    <div class="text-2xl font-bold text-green-600">₱{{ number_format($summary['total_net_pay'], 2) }}</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Total Net Pay</div>
                </div>
            </div>
        </div>

        <div class="bg-purple-50 dark:bg-purple-900/20 p-4 rounded-lg">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-purple-100 dark:bg-purple-800 rounded-full flex items-center justify-center">
                    <i data-lucide="trending-up" class="w-5 h-5 text-purple-600 dark:text-purple-400"></i>
                </div>
                <div class="ml-3">
                    <div class="text-2xl font-bold text-purple-600">₱{{ number_format($summary['average_net_pay'], 2) }}</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Average Net Pay</div>
                </div>
            </div>
        </div>

        <div class="bg-yellow-50 dark:bg-yellow-900/20 p-4 rounded-lg">
            <div class="flex items-center">
                <div class="w-10 h-10 bg-yellow-100 dark:bg-yellow-800 rounded-full flex items-center justify-center">
                    <i data-lucide="calendar" class="w-5 h-5 text-yellow-600 dark:text-yellow-400"></i>
                </div>
                <div class="ml-3">
                    <div class="text-lg font-bold text-yellow-600">{{ $summary['latest_payroll'] ? \Carbon\Carbon::parse($summary['latest_payroll']->created_at)->format('M d, Y') : 'N/A' }}</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Latest Payroll</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Payroll Records Table -->
    <div class="border rounded-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-foreground/5 border-b border-foreground/10">
                    <tr>
                        <th class="p-3 text-left font-medium cursor-pointer select-none" wire:click="sortBy('period')">
                            Period
                            @if($sortField === 'period')
                                <span class="ml-1 opacity-60">{{ $sortDirection === 'asc' ? '▲' : '▼' }}</span>
                            @endif
                        </th>
                        <th class="p-3 text-left font-medium cursor-pointer select-none" wire:click="sortBy('partial')">
                            Basic Pay
                            @if($sortField === 'partial')
                                <span class="ml-1 opacity-60">{{ $sortDirection === 'asc' ? '▲' : '▼' }}</span>
                            @endif
                        </th>
                        <th class="p-3 text-left font-medium">Late Deduction</th>
                        <th class="p-3 text-left font-medium cursor-pointer select-none" wire:click="sortBy('net')">
                            Net Pay
                            @if($sortField === 'net')
                                <span class="ml-1 opacity-60">{{ $sortDirection === 'asc' ? '▲' : '▼' }}</span>
                            @endif
                        </th>
                        <th class="p-3 text-left font-medium cursor-pointer select-none" wire:click="sortBy('created_at')">
                            Date Processed
                            @if($sortField === 'created_at')
                                <span class="ml-1 opacity-60">{{ $sortDirection === 'asc' ? '▲' : '▼' }}</span>
                            @endif
                        </th>
                        <th class="p-3 text-center font-medium">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($payrolls as $payroll)
                        <tr class="border-b border-foreground/5">
                            <td class="p-3">
                                <div class="font-medium">{{ $payroll->period }}</div>
                            </td>
                            <td class="p-3">
                                <div class="font-medium text-green-600">₱{{ number_format($payroll->partial, 2) }}</div>
                            </td>
                            <td class="p-3">
                                <div class="text-red-600">₱{{ number_format($payroll->late_amount ?? 0, 2) }}</div>
                                @if($payroll->late_minutes > 0)
                                    <div class="text-xs text-gray-500">({{ $payroll->late_minutes }} min)</div>
                                @endif
                            </td>
                            <td class="p-3">
                                <div class="font-bold text-lg text-blue-600">₱{{ number_format($payroll->net, 2) }}</div>
                            </td>
                            <td class="p-3">{{ \Carbon\Carbon::parse($payroll->created_at)->format('M d, Y h:i A') }}</td>
                            <td class="p-3 text-center">
                                <button wire:click="viewPayslip({{ $payroll->id }})" 
                                        class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 bg-primary/20 border-primary/60 text-primary hover:bg-primary/5 h-8 px-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/></svg>
                                    View Payslip
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-4 text-center opacity-70">No payroll records found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $payrolls->links() }}
    </div>

    <!-- Payslip Modal -->
    <x-menu.modal :showButton="false" modalId="payslip-modal" title="Payslip Details" description="View detailed payslip information" size="lg" :isOpen="$showPayslipModal">
        @if(!empty($payslipData))
            <div class="space-y-6">
                <!-- Header -->
                <div class="text-center border-b pb-4">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Bacaca Corp</h2>
                    <p class="text-gray-600 dark:text-gray-400">Payroll Statement</p>
                    <p class="text-sm text-gray-500 mt-2">Period: {{ $payslipData['payroll']->period ?? 'N/A' }}</p>
                </div>

                <!-- Employee Info -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <h3 class="font-semibold text-gray-900 dark:text-white">Employee Information</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ auth()->user()->name }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Employee ID: {{ auth()->user()->employee_id }}</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 dark:text-white">Pay Date</h3>
                        <p class="text-sm text-gray-600 dark:text-gray-400">{{ \Carbon\Carbon::parse($payslipData['payroll']->created_at ?? now())->format('M d, Y') }}</p>
                    </div>
                </div>

                <!-- Earnings -->
                @if($payslipData['earnings'] && count($payslipData['earnings']) > 0)
                    <div>
                        <h3 class="font-semibold text-gray-900 dark:text-white mb-3">Earnings</h3>
                        <div class="space-y-2">
                            @foreach($payslipData['earnings'] as $earning)
                                <div class="flex justify-between items-center py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">{{ $earning->description }}</span>
                                    <span class="font-medium text-green-600">₱{{ number_format($earning->amount, 2) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Deductions -->
                @if($payslipData['deductions'] && count($payslipData['deductions']) > 0)
                    <div>
                        <h3 class="font-semibold text-gray-900 dark:text-white mb-3">Deductions</h3>
                        <div class="space-y-2">
                            @foreach($payslipData['deductions'] as $deduction)
                                <div class="flex justify-between items-center py-2 border-b border-gray-200 dark:border-gray-700">
                                    <span class="text-sm text-gray-600 dark:text-gray-400">{{ $deduction->description }}</span>
                                    <span class="font-medium text-red-600">₱{{ number_format($deduction->amount, 2) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Late Deduction -->
                @if($payslipData['lateInfo'] && $payslipData['lateInfo']->amount > 0)
                    <div>
                        <h3 class="font-semibold text-gray-900 dark:text-white mb-3">Late Deduction</h3>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200 dark:border-gray-700">
                            <span class="text-sm text-gray-600 dark:text-gray-400">Late Minutes: {{ $payslipData['lateInfo']->late ?? 0 }}</span>
                            <span class="font-medium text-red-600">₱{{ number_format($payslipData['lateInfo']->amount, 2) }}</span>
                        </div>
                    </div>
                @endif

                @if(isset($payslipData['undertimeAmount']) && $payslipData['undertimeAmount'] > 0)
                    <div>
                        <h3 class="font-semibold text-gray-900 dark:text-white mb-3">Undertime Deduction</h3>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200 dark:border-gray-700">
                            <span class="text-sm text-gray-600 dark:text-gray-400">Undertime Minutes: {{ data_get($payslipData['summaryExtras'], 'total_undertime_minutes', 0) }}</span>
                            <span class="font-medium text-red-600">₱{{ number_format($payslipData['undertimeAmount'], 2) }}</span>
                        </div>
                    </div>
                @endif

                @if(isset($payslipData['overtimeAmount']) && $payslipData['overtimeAmount'] > 0)
                    <div>
                        <h3 class="font-semibold text-gray-900 dark:text-white mb-3">Overtime Pay</h3>
                        <div class="flex justify-between items-center py-2 border-b border-gray-200 dark:border-gray-700">
                            <span class="text-sm text-gray-600 dark:text-gray-400">Overtime Minutes: {{ data_get($payslipData['summaryExtras'], 'total_overtime_minutes', 0) }}</span>
                            <span class="font-medium text-green-600">₱{{ number_format($payslipData['overtimeAmount'], 2) }}</span>
                        </div>
                    </div>
                @endif

                <!-- Summary -->
                <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                    <div class="space-y-2">
                        <div class="flex justify-between items-center">
                            <span class="text-sm text-gray-600 dark:text-gray-400">Basic Pay:</span>
                            <span class="font-medium text-gray-900 dark:text-white">₱{{ number_format($payslipData['payroll']->partial ?? 0, 2) }}</span>
                        </div>
                        
                        @if($payslipData['earnings'] && count($payslipData['earnings']) > 0)
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Total Earnings:</span>
                                <span class="font-medium text-green-600">₱{{ number_format($payslipData['earnings']->sum('amount') + ($payslipData['overtimeAmount'] ?? 0), 2) }}</span>
                            </div>
                        @endif

                        @if($payslipData['deductions'] && count($payslipData['deductions']) > 0)
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Total Deductions:</span>
                                <span class="font-medium text-red-600">₱{{ number_format($payslipData['deductions']->sum('amount'), 2) }}</span>
                            </div>
                        @endif

                        @if($payslipData['lateInfo'] && $payslipData['lateInfo']->amount > 0)
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Late Deduction:</span>
                                <span class="font-medium text-red-600">₱{{ number_format($payslipData['lateInfo']->amount, 2) }}</span>
                            </div>
                        @endif

                        @if(isset($payslipData['undertimeAmount']) && $payslipData['undertimeAmount'] > 0)
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Undertime Deduction:</span>
                                <span class="font-medium text-red-600">₱{{ number_format($payslipData['undertimeAmount'], 2) }}</span>
                            </div>
                        @endif

                        @if(isset($payslipData['overtimeAmount']) && $payslipData['overtimeAmount'] > 0)
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600 dark:text-gray-400">Overtime Pay:</span>
                                <span class="font-medium text-green-600">₱{{ number_format($payslipData['overtimeAmount'], 2) }}</span>
                            </div>
                        @endif

                        <div class="border-t border-gray-300 dark:border-gray-600 pt-2 mt-2">
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-semibold text-gray-900 dark:text-white">Net Pay:</span>
                                <span class="text-xl font-bold text-blue-600">₱{{ number_format($payslipData['finalPayroll']->net ?? 0, 2) }}</span>
                            </div>
                        </div>
                    </div>

                    @if(isset($payslipData['summaryExtras']))
                        <div class="mt-4 grid grid-cols-1 gap-2 text-sm text-gray-600 dark:text-gray-400">
                            <div class="flex justify-between">
                                <span>No. of Working Days (Biometric):</span>
                                <span class="font-medium text-gray-900 dark:text-white">
                                    {{ number_format(data_get($payslipData['summaryExtras'], 'worked_days', 0), 0) }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span>Equivalent Paid Days:</span>
                                <span class="font-medium text-gray-900 dark:text-white">
                                    {{ number_format(data_get($payslipData['summaryExtras'], 'equivalent_days', 0), 2) }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span>Total Undertime Minutes:</span>
                                <span class="font-medium text-gray-900 dark:text-white">
                                    {{ number_format(data_get($payslipData['summaryExtras'], 'total_undertime_minutes', 0)) }}
                                </span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endif

        <x-slot:footer>
            <div class="flex justify-end gap-2 w-full">
                <a href="{{ $selectedPayrollId ? route('payroll.payslip.download', $selectedPayrollId) : '#' }}" 
                   target="_blank"
                   class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2 flex-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
                    Print Payslip
                </a>
                <button wire:click="closePayslipModal" type="button" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 text-foreground hover:bg-foreground/5 bg-background border-foreground/20 h-10 px-4 py-2 flex-1">Close</button>
            </div>
        </x-slot:footer>
    </x-menu.modal>

    <script>
        // Clean up URL parameter after modal opens (if it was opened via route)
        document.addEventListener('DOMContentLoaded', () => {
            // Check if payslip_id is in URL and modal should be open
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('payslip_id')) {
                // Wait a bit for Livewire to render the modal, then clean URL
                setTimeout(() => {
                    const url = new URL(window.location);
                    url.searchParams.delete('payslip_id');
                    window.history.replaceState({}, '', url);
                }, 1000);
            }
        });
    </script>
</div>
