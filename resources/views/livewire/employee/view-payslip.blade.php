<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12">
        <div class="intro-y box p-5">
            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Payslip</h2>
                    <p class="text-gray-600 dark:text-gray-400">Pay Period: {{ $payroll->period }}</p>
                </div>
                <div class="flex space-x-2">
                    <button onclick="window.print()" class="btn btn-primary">
                        <i data-lucide="printer" class="w-4 h-4 mr-2"></i>
                        Print
                    </button>
                    <a href="{{ route('employee.my-payroll') }}" class="btn btn-secondary">
                        <i data-lucide="arrow-left" class="w-4 h-4 mr-2"></i>
                        Back to Payroll
                    </a>
                </div>
            </div>

            <!-- Employee Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                    <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Employee Information</h3>
                    <div class="space-y-1">
                        <p><span class="font-medium">Name:</span> {{ auth()->user()->name }}</p>
                        <p><span class="font-medium">Employee ID:</span> {{ auth()->user()->employee_id ?? 'N/A' }}</p>
                        <p><span class="font-medium">Email:</span> {{ auth()->user()->email }}</p>
                    </div>
                </div>
                <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded-lg">
                    <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Payroll Information</h3>
                    <div class="space-y-1">
                        <p><span class="font-medium">Pay Period:</span> {{ $payroll->period }}</p>
                        <p><span class="font-medium">Processed Date:</span> {{ \Carbon\Carbon::parse($payroll->created_at)->format('M d, Y') }}</p>
                        <p><span class="font-medium">Payroll ID:</span> #{{ $payroll->id }}</p>
                    </div>
                </div>
            </div>

            <!-- Earnings and Deductions -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <!-- Earnings -->
                <div class="bg-green-50 dark:bg-green-900/20 p-4 rounded-lg">
                    <h3 class="font-semibold text-green-800 dark:text-green-400 mb-3">Earnings</h3>
                    <div class="space-y-2">
                        <div class="flex justify-between items-center py-2 border-b border-green-200 dark:border-green-700">
                            <span class="font-medium">Basic Pay</span>
                            <span class="font-bold text-green-600">₱{{ number_format($payroll->partial, 2) }}</span>
                        </div>
                        @foreach($earnings as $earning)
                            <div class="flex justify-between items-center py-2 border-b border-green-200 dark:border-green-700">
                                <span>{{ $earning->description }}</span>
                                <span class="text-green-600">₱{{ number_format($earning->amount, 2) }}</span>
                            </div>
                        @endforeach
                        <div class="flex justify-between items-center py-2 font-bold text-lg">
                            <span>Total Earnings</span>
                            <span class="text-green-600">₱{{ number_format($payroll->partial + $earnings->sum('amount'), 2) }}</span>
                        </div>
                    </div>
                </div>

                <!-- Deductions -->
                <div class="bg-red-50 dark:bg-red-900/20 p-4 rounded-lg">
                    <h3 class="font-semibold text-red-800 dark:text-red-400 mb-3">Deductions</h3>
                    <div class="space-y-2">
                        @foreach($deductions as $deduction)
                            <div class="flex justify-between items-center py-2 border-b border-red-200 dark:border-red-700">
                                <span>{{ $deduction->description }}</span>
                                <span class="text-red-600">₱{{ number_format($deduction->amount, 2) }}</span>
                            </div>
                        @endforeach
                        @if($lateInfo)
                            <div class="flex justify-between items-center py-2 border-b border-red-200 dark:border-red-700">
                                <span>Late Penalty ({{ $lateInfo->late }} min)</span>
                                <span class="text-red-600">₱{{ number_format($lateInfo->amount, 2) }}</span>
                            </div>
                        @endif
                        <div class="flex justify-between items-center py-2 font-bold text-lg">
                            <span>Total Deductions</span>
                            <span class="text-red-600">₱{{ number_format($deductions->sum('amount') + ($lateInfo->amount ?? 0), 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Net Pay Summary -->
            <div class="bg-blue-50 dark:bg-blue-900/20 p-6 rounded-lg">
                <div class="text-center">
                    <h3 class="text-lg font-semibold text-blue-800 dark:text-blue-400 mb-2">Net Pay</h3>
                    <div class="text-4xl font-bold text-blue-600 dark:text-blue-400">
                        ₱{{ number_format($finalPayroll->net, 2) }}
                    </div>
                    <p class="text-sm text-blue-600 dark:text-blue-400 mt-2">
                        Total amount to be received
                    </p>
                </div>
            </div>

            <!-- Breakdown Summary -->
            <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="text-center p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
                    <div class="text-2xl font-bold text-green-600">₱{{ number_format($payroll->partial + $earnings->sum('amount'), 2) }}</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Total Earnings</div>
                </div>
                <div class="text-center p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
                    <div class="text-2xl font-bold text-red-600">₱{{ number_format($deductions->sum('amount') + ($lateInfo->amount ?? 0), 2) }}</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Total Deductions</div>
                </div>
                <div class="text-center p-4 bg-gray-50 dark:bg-gray-800 rounded-lg">
                    <div class="text-2xl font-bold text-blue-600">₱{{ number_format($finalPayroll->net, 2) }}</div>
                    <div class="text-sm text-gray-600 dark:text-gray-400">Net Pay</div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
@media print {
    .no-print {
        display: none !important;
    }
    
    body {
        background: white !important;
    }
    
    .intro-y {
        box-shadow: none !important;
        border: 1px solid #e5e7eb !important;
    }
}
</style>
