<div>
    <x-menu.notification-toast seconds="8" layout="compact" animated="true" />

    <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-semibold">Leave Management</h1>
            <p class="text-sm text-muted-foreground">
                Record and monitor employee leaves for payroll alignment and attendance tracking.
            </p>
        </div>
        <div class="flex gap-2">
            <button wire:click="openLeaveModal" type="button" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 bg-primary text-white hover:bg-primary/90 h-10 rounded-md px-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 5v14"></path>
                    <path d="M5 12h14"></path>
                </svg>
                Record Leave
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
        <div class="border rounded-lg p-4 bg-foreground/5">
            <div class="text-xs uppercase tracking-wide opacity-70">Leaves This Month</div>
            <div class="flex items-end justify-between mt-2">
                <div class="text-3xl font-bold text-primary">{{ number_format($this->leavesThisMonth) }}</div>
                <span class="text-xs font-medium text-muted-foreground">
                    {{ now()->format('M Y') }}
                </span>
            </div>
        </div>
        <div class="border rounded-lg p-4 bg-foreground/5">
            <div class="text-xs uppercase tracking-wide opacity-70">Leaves This Year</div>
            <div class="flex items-end justify-between mt-2">
                <div class="text-3xl font-bold text-success">{{ number_format($this->leavesThisYear) }}</div>
                <span class="text-xs font-medium text-muted-foreground">
                    {{ now()->format('Y') }}
                </span>
            </div>
        </div>
        <div class="border rounded-lg p-4 bg-foreground/5">
            <div class="text-xs uppercase tracking-wide opacity-70">Monthly Indicator</div>
            <div class="mt-3 grid grid-cols-4 gap-2 text-xs">
                @foreach($this->monthlyBreakdown as $monthNumber => $count)
                    <div class="rounded-md border border-foreground/10 px-2 py-1 text-center {{ (int) now()->format('n') === (int) $monthNumber ? 'bg-primary/10 text-primary font-semibold' : '' }}">
                        <div>{{ \Carbon\Carbon::create()->month($monthNumber)->shortMonthName }}</div>
                        <div class="text-sm font-medium">{{ $count }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="mt-8 flex flex-col gap-4 lg:flex-row lg:items-end lg:justify-between">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-full lg:w-auto">
            <div>
                <label class="text-sm font-medium mb-1 block">Month</label>
                @php
                    $months = collect(range(1, 12))->mapWithKeys(fn($m) => [$m => \Carbon\Carbon::create()->month($m)->format('F')]);
                @endphp
                <select wire:model.live="filterMonth" class="h-10 rounded-md border bg-background px-3 py-2 w-full">
                    <option value="">All</option>
                    @foreach($months as $value => $label)
                        <option value="{{ str_pad($value, 2, '0', STR_PAD_LEFT) }}">{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="text-sm font-medium mb-1 block">Year</label>
                @php
                    $currentYear = (int) now()->year;
                    $years = range($currentYear, $currentYear - 5);
                @endphp
                <select wire:model.live="filterYear" class="h-10 rounded-md border bg-background px-3 py-2 w-full">
                    <option value="">All</option>
                    @foreach($years as $year)
                        <option value="{{ $year }}">{{ $year }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="text-sm font-medium mb-1 block">Per Page</label>
                <select wire:model.live="perPage" class="h-10 rounded-md border bg-background px-3 py-2 w-full">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                </select>
            </div>
        </div>
        <div class="w-full lg:w-80">
            <label class="text-sm font-medium mb-1 block">Search</label>
            <div class="relative">
                <input wire:model.debounce.500ms="search" type="text" placeholder="Search employee or reason..." class="h-10 rounded-md border bg-background px-3 py-2 w-full pr-10">
                <svg class="absolute right-3 top-1/2 -translate-y-1/2 size-4 text-muted-foreground" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>
            </div>
        </div>
    </div>

    <div class="mt-6 border rounded-xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-foreground/5 border-b border-foreground/10">
                    <tr>
                        <th class="p-3 text-left font-medium">Employee</th>
                        <th class="p-3 text-left font-medium">Period</th>
                        <th class="p-3 text-left font-medium">Days</th>
                        <th class="p-3 text-left font-medium">Reason</th>
                        <th class="p-3 text-left font-medium">Recorded By</th>
                        <th class="p-3 text-left font-medium">Filed On</th>
                        <th class="p-3 text-center font-medium w-32">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($leaves as $leave)
                        <tr class="border-b border-foreground/5 hover:bg-foreground/5/40">
                            <td class="p-3">
                                <div class="font-semibold">{{ $leave->user->name ?? 'Unknown' }}</div>
                                <div class="text-xs text-muted-foreground">
                                    {{ $leave->user->employee_id ?? '—' }}
                                </div>
                            </td>
                            <td class="p-3">
                                <div class="font-medium">
                                    {{ $leave->start_date->format('M d, Y') }} - {{ $leave->end_date->format('M d, Y') }}
                                </div>
                            </td>
                            <td class="p-3">
                                <span class="inline-flex items-center rounded-full bg-primary/10 text-primary px-3 py-1 text-xs font-semibold">
                                    {{ $leave->total_days }} {{ $leave->total_days === 1 ? 'day' : 'days' }}
                                </span>
                            </td>
                            <td class="p-3">
                                <div class="max-w-xs truncate" title="{{ $leave->reason }}">
                                    {{ $leave->reason ?? 'N/A' }}
                                </div>
                            </td>
                            <td class="p-3">
                                <div class="text-sm">{{ $leave->recordedBy->name ?? 'System' }}</div>
                            </td>
                            <td class="p-3">
                                {{ $leave->created_at?->format('M d, Y h:i A') }}
                            </td>
                            <td class="p-3 text-center">
                                <div class="inline-flex gap-2">
                                    <button wire:click="openLeaveModal({{ $leave->id }})" type="button" class="cursor-pointer inline-flex items-center justify-center h-8 w-8 rounded-md border border-foreground/20 hover:bg-foreground/5 text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25z"/>
                                            <path d="M14.06 4.94l3.75 3.75"/>
                                        </svg>
                                    </button>
                                    <button wire:click="deleteLeave({{ $leave->id }})" type="button" class="cursor-pointer inline-flex items-center justify-center h-8 w-8 rounded-md border border-foreground/20 hover:bg-foreground/5 text-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <polyline points="3 6 5 6 21 6"/>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/>
                                            <path d="M10 11v6"/>
                                            <path d="M14 11v6"/>
                                            <path d="M9 6V4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v2"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-6 text-center text-muted-foreground">
                                No leave records found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-foreground/10">
            <x-menu.pagination :paginator="$leaves" :perPageOptions="[10, 25, 50]" />
        </div>
    </div>

    <x-menu.modal 
        :showButton="false"
        modalId="leave-modal"
        :title="$editingLeaveId ? 'Edit Leave' : 'Record Leave'"
        description="Set the employee and date range for the leave entry."
        size="xl"
        :isOpen="$showLeaveModal">
        <div class="space-y-4">
            <div>
                <label class="text-sm font-medium mb-1 block">Employee <span class="text-danger">*</span></label>
                <select wire:model="formUserId" class="h-11 rounded-md border bg-background px-3 py-2 w-full">
                    <option value="">Select employee</option>
                    @foreach($this->employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->name }} {{ $employee->employee_id ? ' - ' . $employee->employee_id : '' }}</option>
                    @endforeach
                </select>
                @error('formUserId') <span class="text-danger text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="text-sm font-medium mb-1 block">Start Date <span class="text-danger">*</span></label>
                    <input wire:model="formStartDate" type="date" class="h-11 rounded-md border bg-background px-3 py-2 w-full">
                    @error('formStartDate') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="text-sm font-medium mb-1 block">End Date <span class="text-danger">*</span></label>
                    <input wire:model="formEndDate" type="date" class="h-11 rounded-md border bg-background px-3 py-2 w-full">
                    @error('formEndDate') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                </div>
            </div>
            <div>
                <label class="text-sm font-medium mb-1 block">Reason</label>
                <textarea wire:model="formReason" rows="3" class="rounded-md border bg-background px-3 py-2 w-full" placeholder="Optional notes or leave type"></textarea>
                @error('formReason') <span class="text-danger text-xs">{{ $message }}</span> @enderror
            </div>
        </div>
        <x-slot:footer>
            <button wire:click="closeLeaveModal" type="button" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 text-foreground hover:bg-foreground/5 bg-background border-foreground/20 h-10 px-4 py-2 mr-2">
                Cancel
            </button>
            <button wire:click="saveLeave" type="button" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 bg-primary text-white hover:bg-primary/90 h-10 px-6 py-2">
                {{ $editingLeaveId ? 'Save Changes' : 'Save Leave' }}
            </button>
        </x-slot:footer>
    </x-menu.modal>
</div>

