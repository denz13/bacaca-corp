<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Payslip - {{ $employee->firstname ?? '' }} {{ $employee->lastname ?? '' }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11px;
            color: #333;
            line-height: 1.4;
            margin: 0;
            padding: 10px;
        }
        .text-center { text-align: center; }
        .text-right { text-align: right; }
        .font-bold { font-weight: bold; }
        .mb-4 { margin-bottom: 20px; }
        .pb-4 { padding-bottom: 20px; }
        .border-b { border-bottom: 1px solid #ddd; }
        .grid { width: 100%; display: table; }
        .col-2 { width: 50%; display: table-cell; vertical-align: top; }
        .bg-gray-50 { background-color: #f9fafb; }
        .p-4 { padding: 15px; }
        .rounded-lg { border-radius: 8px; }
        .space-y-2 > * + * { margin-top: 8px; }
        .flex { display: table; width: 100%; }
        .flex-between { display: table; width: 100%; }
        .flex-between span { display: table-cell; }
        .flex-between span:last-child { text-align: right; }
        .text-green { color: #16a34a; }
        .text-red { color: #dc2626; }
        .text-blue { color: #2563eb; }
        .text-lg { font-size: 18px; }
        .text-2xl { font-size: 24px; }
        .text-sm { font-size: 12px; }
        .text-gray { color: #666; }
        
        table { width: 100%; border-collapse: collapse; }
        .py-2 { padding-top: 8px; padding-bottom: 8px; }
        .mt-4 { margin-top: 15px; }
        .mt-2 { margin-top: 8px; }
        .pt-2 { padding-top: 8px; }
        .border-t { border-top: 1px solid #ddd; }

        /* Custom Header Styling */
        .header-logo { width: 60px; margin-bottom: 5px; }
        .header-company { font-size: 16px; margin: 2px 0; }
        .header-title { font-size: 14px; margin: 2px 0; }
        .header-info { font-size: 12px; margin: 2px 0; }
    </style>
</head>
<body>
    <div class="text-center mb-4 pb-4 border-b">
        @php
            $logoPath = resource_path('images/bacaca.png');
            $logoBase64 = '';
            if (file_exists($logoPath)) {
                $logoData = file_get_contents($logoPath);
                $logoBase64 = 'data:image/png;base64,' . base64_encode($logoData);
            }
        @endphp
        @if($logoBase64)
            <img src="{{ $logoBase64 }}" class="header-logo">
        @endif
        <h2 class="header-company font-bold">Bacaca PrintShop & Trading Corporation</h2>
        <h3 class="header-title font-bold">Payslip</h3>
        <p class="header-info font-bold">Payroll Period: {{ $payroll->period ?? 'N/A' }}</p>
        <p class="header-info font-bold">Employee Name: {{ strtoupper(($employee->firstname ?? '') . ' ' . ($employee->lastname ?? '')) }}</p>
        <p class="header-info font-bold">Nature: {{ $employee->positionInfo->nature ?? 'N/A' }}</p>
    </div>

    <!-- The rest remains consistent with the modal layout as per previous request -->
    @if($earnings && count($earnings) > 0)
        <div class="mb-4">
            <h3 class="font-bold border-b py-2">Earnings</h3>
            @foreach($earnings as $earning)
                <div class="flex-between py-2 border-b">
                    <span>{{ $earning->description }}</span>
                    <span class="text-green">&#8369;{{ number_format($earning->amount, 2) }}</span>
                </div>
            @endforeach
        </div>
    @endif

    @if($deductions && count($deductions) > 0)
        <div class="mb-4">
            <h3 class="font-bold border-b py-2">Deductions</h3>
            @foreach($deductions as $deduction)
                <div class="flex-between py-2 border-b">
                    <span>{{ $deduction->description }}</span>
                    <span class="text-red">&#8369;{{ number_format($deduction->amount, 2) }}</span>
                </div>
            @endforeach
        </div>
    @endif

    @if($lateInfo && $lateInfo->amount > 0)
        <div class="mb-4">
            <h3 class="font-bold border-b py-2">Late Deduction</h3>
            <div class="flex-between py-2 border-b">
                <span>Late Minutes: {{ $lateInfo->late ?? 0 }}</span>
                <span class="text-red">&#8369;{{ number_format($lateInfo->amount, 2) }}</span>
            </div>
        </div>
    @endif

        @if(isset($undertimeAmount) && $undertimeAmount > 0)
            <div class="mb-4">
                <h3 class="font-bold border-b py-2">Undertime Deduction</h3>
                <div class="flex-between py-2 border-b">
                    <span>Undertime Minutes: {{ data_get($summaryExtras, 'total_undertime_minutes', 0) }}</span>
                    <span class="text-red">&#8369;{{ number_format($undertimeAmount, 2) }}</span>
                </div>
            </div>
        @endif

        @if(isset($overtimeAmount) && $overtimeAmount > 0)
            <div class="mb-4">
                <h3 class="font-bold border-b py-2">Overtime Pay</h3>
                <div class="flex-between py-2 border-b">
                    <span>Overtime Minutes: {{ data_get($summaryExtras, 'total_overtime_minutes', 0) }}</span>
                    <span class="text-green">&#8369;{{ number_format($overtimeAmount, 2) }}</span>
                </div>
            </div>
        @endif

    <div class="bg-gray-50 p-4 rounded-lg">
        <div class="flex-between mb-2">
            <span>Basic Pay:</span>
            <span class="font-bold">&#8369;{{ number_format($payroll->partial ?? 0, 2) }}</span>
        </div>
        
        @if($earnings && count($earnings) > 0)
            <div class="flex-between mb-2">
                <span>Total Earnings:</span>
                <span class="text-green">&#8369;{{ number_format($earnings->sum('amount'), 2) }}</span>
            </div>
        @endif

        <div class="flex-between mb-2 font-bold border-t pt-2">
            <span>Gross Pay:</span>
            <span>&#8369;{{ number_format(($payroll->partial ?? 0) + ($earnings ? $earnings->sum('amount') : 0) + ($overtimeAmount ?? 0), 2) }}</span>
        </div>

        @if($deductions && count($deductions) > 0)
            <div class="flex-between mb-2">
                <span>Total Deductions:</span>
                <span class="text-red">&#8369;{{ number_format($deductions->sum('amount'), 2) }}</span>
            </div>
        @endif

        @if($lateInfo && $lateInfo->amount > 0)
            <div class="flex-between mb-2">
                <span>Late Deduction:</span>
                <span class="text-red">&#8369;{{ number_format($lateInfo->amount, 2) }}</span>
            </div>
        @endif

        @if(isset($undertimeAmount) && $undertimeAmount > 0)
            <div class="flex-between mb-2">
                <span>Undertime Deduction:</span>
                <span class="text-red">&#8369;{{ number_format($undertimeAmount, 2) }}</span>
            </div>
        @endif

        @if(isset($overtimeAmount) && $overtimeAmount > 0)
            <div class="flex-between mb-2">
                <span>Overtime Pay:</span>
                <span class="text-green">&#8369;{{ number_format($overtimeAmount, 2) }}</span>
            </div>
        @endif

        <div class="border-t pt-2 mt-2">
            <div class="flex-between">
                <span class="text-lg font-bold">Net Pay:</span>
                <span class="text-2xl font-bold text-blue">&#8369;{{ number_format($finalPayroll->net ?? 0, 2) }}</span>
            </div>
        </div>

        @if(isset($summaryExtras))
            <div class="mt-4 text-sm text-gray">
                <!-- <div class="flex-between">
                    <span>No. of Working Days (Biometric):</span>
                    <span class="font-bold">{{ number_format(data_get($summaryExtras, 'worked_days', 0), 0) }}</span>
                </div> -->
                <div class="flex-between">
                    <span>No. of Working Days:</span>
                    <span class="font-bold">{{ number_format(data_get($summaryExtras, 'equivalent_days', 0), 2) }}</span>
                </div>
                @if(data_get($summaryExtras, 'total_undertime_minutes', 0) > 0)
                    <div class="flex-between">
                        <span>Total Undertime Minutes:</span>
                        <span class="font-bold">{{ number_format(data_get($summaryExtras, 'total_undertime_minutes', 0)) }}</span>
                    </div>
                @endif
                @if(data_get($summaryExtras, 'total_overtime_minutes', 0) > 0)
                    <div class="flex-between">
                        <span>Total Overtime Minutes:</span>
                        <span class="font-bold">{{ number_format(data_get($summaryExtras, 'total_overtime_minutes', 0)) }}</span>
                    </div>
                @endif
            </div>
        @endif
    </div>
</body>
</html>
