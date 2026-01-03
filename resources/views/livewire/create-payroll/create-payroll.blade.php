<div>
    <!-- Toast Notification Template -->
    <x-menu.notification-toast seconds="10" layout="compact" animated="true" />
    <div class="col-span-12 mt-6 -mb-6">
        <div class="box relative before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md alert flex border items-center rounded-xl p-4 text-(--color) before:bg-(--color)/5 before:border-(--color)/15 after:bg-(--color)/10 after:border-(--color)/20 mb-6 border-transparent bg-transparent [--color:var(--color-warning)]">
            <span>
                Please select the date first Example: Oct 1 to Oct 31 to show the employees list and their attendance.
            </span>
            <a class="ml-auto cursor-pointer" data-tw-dismiss="alert" type="button" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="x" class="lucide lucide-x size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 w-4 h-4 ml-auto"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
            </a>
        </div>
    </div>
    <h2 class="mt-10 text-lg font-medium">Employees</h2>
    <div class="mt-5 grid grid-cols-12 gap-6">
                            <div class="col-span-12 mt-2 flex flex-wrap items-center sm:flex-nowrap">
                                <div x-data="dateRangePicker()" class="relative">
                                    <label class="text-sm font-medium mb-2 block">Date Range:</label>
                                    <div class="flex items-center gap-2">
                                        <button @click="showCalendar = !showCalendar" type="button" class="h-10 rounded-md border bg-background px-3 py-2 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5 focus-visible:ring-offset-2 box w-80 text-left flex items-center justify-between">
                                            <span x-text="displayText"></span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                        </button>
                                    </div>
                                    
                                    <!-- Calendar Dropdown -->
                                    <div x-show="showCalendar" @click.away="showCalendar = false" class="absolute z-50 mt-2 bg-background border rounded-lg shadow-lg p-4 w-80">
                                        <div class="flex justify-between items-center mb-4">
                                            <button @click="previousMonth()" type="button" class="p-1 hover:bg-foreground/5 rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m15 18-6-6 6-6"/></svg>
                                            </button>
                                            <span class="font-medium" x-text="monthYear"></span>
                                            <button @click="nextMonth()" type="button" class="p-1 hover:bg-foreground/5 rounded">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg>
                                </button>
                                        </div>
                                        
                                        <div class="grid grid-cols-7 gap-1 text-center">
                                            <template x-for="day in ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']">
                                                <div class="text-xs font-medium p-2" x-text="day"></div>
                                            </template>
                                            
                                            <template x-for="blank in blankDays">
                                                <div class="p-2"></div>
                                            </template>
                                            
                                            <template x-for="date in daysInMonth">
                                                <button 
                                                    @click="selectDate(date)" 
                                                    type="button"
                                                    class="p-2 text-sm rounded hover:bg-foreground/5 transition"
                                                    :class="getDateClass(date)"
                                                    x-text="date"
                                                ></button>
                                            </template>
                                        </div>
                                        
                                        <!-- OK Button Footer -->
                                        <div class="mt-4 pt-4 border-t border-foreground/10">
                                            <button 
                                                @click="confirmSelection()" 
                                                type="button"
                                                class="w-full px-4 py-2 bg-primary text-white rounded-md hover:bg-primary/90 transition disabled:opacity-50 disabled:cursor-not-allowed"
                                                :disabled="!startDate || !endDate"
                                            >
                                                OK
                                    </button>
                                        </div>
                                    </div>
                                </div>
                                
                                <script>
                                function dateRangePicker() {
                                    return {
                                        showCalendar: false,
                                        currentMonth: new Date().getMonth(),
                                        currentYear: new Date().getFullYear(),
                                        startDate: @entangle('startDate'),
                                        endDate: @entangle('endDate'),
                                        
                                        get monthYear() {
                                            const monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                                            return monthNames[this.currentMonth] + ' ' + this.currentYear;
                                        },
                                        
                                        get displayText() {
                                            if (!this.startDate && !this.endDate) return 'Choose date range';
                                            if (this.startDate && !this.endDate) return this.formatDate(this.startDate);
                                            if (this.startDate && this.endDate) {
                                                return this.formatDate(this.startDate) + ' - ' + this.formatDate(this.endDate);
                                            }
                                            return 'Choose date range';
                                        },
                                        
                                        formatDate(dateStr) {
                                            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                                            const date = new Date(dateStr);
                                            return `${date.getDate()} ${months[date.getMonth()]}, ${date.getFullYear()}`;
                                        },
                                        
                                        get daysInMonth() {
                                            return new Date(this.currentYear, this.currentMonth + 1, 0).getDate();
                                        },
                                        
                                        get blankDays() {
                                            return new Date(this.currentYear, this.currentMonth, 1).getDay();
                                        },
                                        
                                        previousMonth() {
                                            this.currentMonth--;
                                            if (this.currentMonth < 0) {
                                                this.currentMonth = 11;
                                                this.currentYear--;
                                            }
                                        },
                                        
                                        nextMonth() {
                                            this.currentMonth++;
                                            if (this.currentMonth > 11) {
                                                this.currentMonth = 0;
                                                this.currentYear++;
                                            }
                                        },
                                        
                                        selectDate(day) {
                                            const dateStr = `${this.currentYear}-${String(this.currentMonth + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                                            
                                            if (!this.startDate || (this.startDate && this.endDate)) {
                                                // Start new range
                                                this.startDate = dateStr;
                                                this.endDate = null;
                                            } else if (this.startDate && !this.endDate) {
                                                // Complete the range
                                                if (new Date(dateStr) < new Date(this.startDate)) {
                                                    this.endDate = this.startDate;
                                                    this.startDate = dateStr;
                                                } else {
                                                    this.endDate = dateStr;
                                                }
                                            }
                                        },
                                        
                                        getDateClass(day) {
                                            const dateStr = `${this.currentYear}-${String(this.currentMonth + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                                            const date = new Date(dateStr);
                                            
                                            if (this.startDate && this.endDate) {
                                                const start = new Date(this.startDate);
                                                const end = new Date(this.endDate);
                                                
                                                if (dateStr === this.startDate || dateStr === this.endDate) {
                                                    return 'bg-primary text-white';
                                                }
                                                if (date > start && date < end) {
                                                    return 'bg-primary/20';
                                                }
                                            } else if (dateStr === this.startDate) {
                                                return 'bg-primary text-white';
                                            }
                                            
                                            return '';
                                        },
                                        
                                        confirmSelection() {
                                            if (this.startDate && this.endDate) {
                                                console.log('Confirming dates:', this.startDate, this.endDate);
                                                this.showCalendar = false;
                                                // Force Livewire to update
                                                this.$wire.$refresh();
                                            }
                                        }
                                    }
                                }
                                </script>
                                
                                <div class="mx-auto hidden opacity-70 md:block">
                                    @isset($users)
                                        @if(method_exists($users, 'total') && $users->total() > 0)
                                            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} entries
                                        @endif
                                    @endisset
                                </div>
                                <div class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto md:ml-0">
                                    <div class="relative w-56">
                                        <input wire:model.debounce.400ms="search" class="h-10 rounded-md border bg-background px-3 py-2 ring-offset-background file:border-0 file:bg-transparent file:font-medium file:text-foreground placeholder:text-foreground/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 box w-56 pr-10" type="text" placeholder="Search...">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="search" class="lucide lucide-search size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 absolute inset-y-0 right-0 my-auto mr-3 h-4 w-4"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <!-- BEGIN: Data List -->
                            <div class="col-span-12 overflow-auto lg:overflow-visible">
                                <div class="relative w-full overflow-auto">
                                    <table class="w-full caption-bottom border-separate border-spacing-y-[10px] -mt-2">
                                        <thead class="[&amp;_tr]:border-b-0 [&amp;_tr_th]:h-10">
                                            <tr class="transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted border-b-0">
                                                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Image</th>
                                                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Name</th>
                                                <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">Position</th>
                                                <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody class="[&amp;_tr:last-child]:border-0" x-data="{ activeRow: null }">
                                            @forelse($users ?? [] as $user)
                                            <tr @click="activeRow = activeRow === {{ $user->id }} ? null : {{ $user->id }}" class="transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted border-b-0 cursor-pointer">
                                                <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                                    <div class="flex items-center gap-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="transition-transform" :class="activeRow === {{ $user->id }} ? 'rotate-90' : ''">
                                                            <path d="m9 18 6-6-6-6"/>
                                                        </svg>
                                                        <span class="block relative size-11 flex-none overflow-hidden rounded-full border-3 ring-1 ring-(--color)/25 [--color:var(--color-primary)] bg-background">
                                                            <img class="absolute top-0 size-full object-cover" src="{{ $user->picture ? asset('storage/' . ltrim($user->picture, '/')) : asset('images/placeholders/avatar.jpg') }}" alt="{{ $user->firstname }}">
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="shadow-[3px_3px_5px_#0000000b] box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background">
                                                    <span class="whitespace-nowrap font-medium">{{ $user->firstname }} {{ $user->lastname }}</span>
                                                </td>
                                                <td class="shadow-[3px_3px_5px_#0000000b] box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background">
                                                    <span class="whitespace-nowrap">{{ $user->position ?? '-' }}</span>
                                                </td>
                                                <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                                        <div class="flex items-center justify-center gap-2">
                                                            @if($user->existing_payroll_id)
                                                                <button wire:click="viewPayslip({{ $user->existing_payroll_id }})" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-success/20 border-success/60 text-success hover:bg-success/5 h-9 rounded-md px-3 min-w-32" type="button">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                                                                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                                                                    </svg>
                                                                    View Payslip
                                                                </button>
                                                            @endif
                                                            <button wire:click="openProcessPayrollModal({{ $user->id }}, '{{ $user->firstname }} {{ $user->lastname }}')" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-(--color)/20 border-(--color)/60 text-(--color) hover:bg-(--color)/5 [--color:var(--color-primary)] h-9 rounded-md px-3 min-w-32" type="button">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="wallet" class="lucide lucide-wallet size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25">
                                                                    <path d="M21 12V7H5a2 2 0 0 1 0-4h14v4"/>
                                                                    <path d="M3 5v14a2 2 0 0 0 2 2h16v-5"/>
                                                                    <path d="M18 12a2 2 0 0 0 0 4h4v-4Z"/>
                                                                </svg>
                                                                Process Payroll
                                                            </button>
                                                        </div>
                                                </td>
                                            </tr>
                                            
                                            <!-- Attendance Details Row -->
                                            <tr x-show="activeRow === {{ $user->id }}" x-collapse class="border-b-0">
                                                <td colspan="4" class="p-0 border-y border-foreground/10">
                                                    <div class="p-4 bg-foreground/5">
                                                        <h4 class="font-medium mb-3">Attendance Records ({{ $user->attendance->count() }} total)</h4>
                                                        <div class="border rounded-md bg-white" style="max-height: 400px; overflow-y: scroll; overflow-x: auto;">
                                                            <table class="w-full text-sm">
                                                                <thead class="sticky top-0 bg-white border-b z-10">
                                                                    <tr class="text-left">
                                                                        <th class="p-2">Date</th>
                                                                        <th class="p-2">Action</th>
                                                                        <th class="p-2">Time</th>
                                                                        <th class="p-2">Status</th>
                                                                        <th class="p-2">Late (min)</th>
                                                                        <th class="p-2">Overtime (min)</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @forelse($user->attendance as $record)
                                                                    <tr class="border-b border-foreground/5">
                                                                        <td class="p-2">{{ \Carbon\Carbon::parse($record->timestamp)->format('M d, Y') }}</td>
                                                                        <td class="p-2 capitalize">{{ $record->action }}</td>
                                                                        <td class="p-2">{{ $record->time }}</td>
                                                                        <td class="p-2">
                                                                            @if($record->is_late)
                                                                                <span class="text-danger">Late</span>
                                                                            @else
                                                                                <span class="text-success">On Time</span>
                                                                            @endif
                                                                        </td>
                                                                        <td class="p-2">{{ $record->late_minutes ?? 0 }}</td>
                                                                        <td class="p-2">{{ $record->overtime_minutes ?? 0 }}</td>
                                                                    </tr>
                                                                    @empty
                                                                    <tr>
                                                                        <td colspan="6" class="p-2 text-center opacity-70">No attendance records</td>
                                                                    </tr>
                                                                    @endforelse
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="4" class="p-4 text-center opacity-70">
                                                    @if($startDate && $endDate)
                                                        No employees with attendance records found for the selected date range.
                                                    @else
                                                        Please select a date range to view employees.
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END: Data List -->
                            <!-- BEGIN: Pagination -->
                            @isset($users)
                                <x-menu.pagination :paginator="$users" :perPageOptions="[10, 25, 35, 50]" />
                            @endisset
                            <!-- END: Pagination -->
                        </div>
    
    <!-- Process Payroll Modal -->
    <x-menu.modal 
        :showButton="false" 
        modalId="process-payroll-modal" 
        :title="'Process Payroll' . ($selectedUserName ? ' - ' . $selectedUserName : '')" 
        description="Add deductions and earnings for this employee"
        size="3xl"
        :isOpen="$showProcessPayrollModal">
        
        <div class="space-y-6">

            @if(($startDate ?? null) && ($endDate ?? null))
                <div class="border rounded-lg p-4">
                    <h3 class="font-medium mb-3">Summary for Selected Range</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="box p-3 rounded-md border border-foreground/10 bg-foreground/5">
                            <div class="text-sm opacity-70">Total Late Minutes</div>
                            <div class="text-2xl font-semibold mt-1">{{ number_format($totalLateMinutes) }}</div>
                        </div>
                        <div class="box p-3 rounded-md border border-foreground/10 bg-foreground/5">
                            <div class="text-sm opacity-70">Total Undertime Minutes</div>
                            <div class="text-2xl font-semibold mt-1">{{ number_format($totalUndertimeMinutes) }}</div>
                        </div>
                        <div class="box p-3 rounded-md border border-foreground/10 bg-foreground/5">
                            <div class="text-sm opacity-70">Total Overtime Minutes</div>
                            <div class="text-2xl font-semibold mt-1">{{ number_format($totalOvertimeMinutes) }}</div>
                        </div>
                    </div>
                </div>

            @endif
            <!-- Add Deduction Section -->
            <div class="border rounded-lg p-4">
                <h3 class="font-medium mb-3 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-danger">
                        <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h9a3.5 3.5 0 0 1 0 7H6"/>
                    </svg>
                    Add Deduction
                </h3>
                
                <!-- Add Deduction Form -->
                <div class="flex gap-3 mb-4">
                    <div class="flex-1">
                        <select wire:model="selectedDeductionId" class="w-full h-10 rounded-md border bg-background px-3 py-2">
                            <option value="">Select Deduction Type</option>
                            @forelse($deductions as $deduction)
                                <option value="{{ $deduction->id }}">
                                    {{ $deduction->description }} - ₱{{ number_format($deduction->amount, 2) }}
                                </option>
                            @empty
                                <option disabled>No deductions available</option>
                            @endforelse
                        </select>
                    </div>
                    <button 
                        wire:click="addDeduction" 
                        :disabled="!selectedDeductionId"
                        class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary/20 border-primary/60 text-primary hover:bg-primary/5 h-10 px-4 py-2"
                        type="button"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M5 12h14"/>
                            <path d="M12 5v14"/>
                        </svg>
                        Add
                    </button>
                </div>
                
                <!-- Selected Deductions Table -->
                @if(count($selectedDeductions) > 0)
                    <div class="border border-foreground/10 rounded-md overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="bg-foreground/5 border-b border-foreground/10">
                                    <tr>
                                        <th class="p-3 text-left font-medium">Description</th>
                                        <th class="p-3 text-center font-medium w-32">Amount</th>
                                        <th class="p-3 text-center font-medium w-20">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($deductions->whereIn('id', $selectedDeductions) as $deduction)
                                        <tr class="border-b border-foreground/5">
                                            <td class="p-3">
                                                <span class="font-medium">{{ $deduction->description }}</span>
                                            </td>
                                            <td class="p-3 text-center">
                                       <input 
                                            type="number" 
                                            step="0.01"
                                            value="{{ $deductionAmounts[$deduction->id] ?? $deduction->amount }}"
                                            wire:change="updateDeductionAmount({{ $deduction->id }}, $event.target.value)"
                                            class="w-28 h-8 text-sm rounded border bg-background px-2 py-1 border-foreground/20 focus:ring-2 focus:ring-primary focus:border-primary text-center"
                                            min="0" readonly
                                        />
                                            </td>
                                            <td class="p-3 text-center">
                                                <button 
                                                    wire:click="removeDeduction({{ $deduction->id }})"
                                                    type="button"
                                                    class="cursor-pointer inline-flex items-center justify-center h-8 w-8 rounded-md border border-foreground/20 bg-background hover:bg-foreground/5 text-danger hover:text-danger"
                                                >
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M18 6L6 18M6 6l12 12"/>
                                                    </svg>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="bg-foreground/5 border-t border-foreground/10">
                                    <tr>
                                        <td class="p-3 font-medium text-right" colspan="2">
                                            Total Deductions:
                                        </td>
                                        <td class="p-3 text-center font-medium text-danger">
                                            ₱{{ number_format(array_sum($deductionAmounts), 2) }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                @endif
            </div>

            @if(count($holidayDetails) > 0)
                @php
                    $holidayTotals = $this->holidayTotals;
                @endphp
                <div class="border rounded-lg p-4 space-y-4">
                    <div class="flex flex-col gap-2 md:flex-row md:items-center md:justify-between">
                        <div>
                            <h3 class="font-medium flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <path d="M8 12h8"></path>
                                    <path d="M12 8v8"></path>
                                </svg>
                                Holiday Work Earnings
                            </h3>
                            <p class="text-sm text-muted-foreground">
                                Employees earn an extra 30% of their daily rate (₱{{ number_format($holidayRatePerDay, 2) }}) for every approved holiday they attended.
                            </p>
                        </div>
                        <div class="text-right">
                            <div class="text-xs uppercase opacity-70">Selected Bonus</div>
                            <div class="text-2xl font-semibold text-success">₱{{ number_format($holidayTotals['total'] ?? 0, 2) }}</div>
                            <div class="text-xs text-muted-foreground">
                                {{ $holidayTotals['days'] ?? 0 }} {{ ($holidayTotals['days'] ?? 0) === 1 ? 'holiday' : 'holidays' }}
                            </div>
                        </div>
                    </div>
                    <div class="border border-foreground/10 rounded-md overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="bg-foreground/5 border-b border-foreground/10">
                                    <tr>
                                        <th class="p-3 text-left font-medium">Date &amp; Holiday</th>
                                        <th class="p-3 text-center font-medium w-40">Bonus Amount</th>
                                        <th class="p-3 text-center font-medium w-32">Include</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($holidayDetails as $date => $detail)
                                        <tr class="border-b border-foreground/5">
                                            <td class="p-3">
                                                <div class="font-medium">{{ $detail['title'] }}</div>
                                                <div class="text-xs text-muted-foreground">{{ \Carbon\Carbon::parse($date)->format('M d, Y (D)') }}</div>
                                            </td>
                                            <td class="p-3 text-center font-semibold text-success">
                                                ₱{{ number_format($detail['amount'], 2) }}
                                            </td>
                                            <td class="p-3 text-center">
                                                <label class="inline-flex items-center gap-2 cursor-pointer">
                                                    <input 
                                                        type="checkbox" 
                                                        class="size-4 rounded border-foreground/40 text-primary focus:ring-primary"
                                                        @checked($holidayWorkSelections[$date] ?? false)
                                                        wire:change="updateHolidaySelection('{{ $date }}', $event.target.checked)"
                                                    >
                                                    <span class="text-xs text-muted-foreground">
                                                        {{ ($holidayWorkSelections[$date] ?? false) ? 'Included' : 'Excluded' }}
                                                    </span>
                                                </label>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Add Earnings Section -->
            <div class="border rounded-lg p-4">
                <h3 class="font-medium mb-3 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-success">
                        <line x1="12" y1="2" x2="12" y2="22"></line>
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                    </svg>
                    Add Earnings
                </h3>
                <div class="grid gap-3">
                    <div>
                        <label class="text-sm font-medium">Earning</label>
                        <div class="grid md:grid-cols-3 gap-3 mt-1">
                            <select wire:model="selectedEarningId" class="h-10 rounded-md border bg-background px-3 py-2">
                                <option value="">Select earning</option>
                                @forelse($earningsList as $earning)
                                    <option value="{{ $earning->id }}">{{ $earning->earnings }}</option>
                                @empty
                                    <option disabled>No earnings available</option>
                                @endforelse
                            </select>
                            <input 
                                type="text" 
                                wire:model.defer="earningDescriptionInput" 
                                class="h-10 rounded-md border bg-background px-3 py-2" 
                                placeholder="Description (optional)"
                            />
                            <div class="flex gap-3">
                                <input 
                                    type="number" 
                                    step="0.01"
                                    min="0"
                                    wire:model.defer="earningAmountInput" 
                                    class="h-10 rounded-md border bg-background px-3 py-2 w-full" 
                                    placeholder="Amount"
                                />
                                <button 
                                    wire:click="addEarningFromForm"
                                    type="button"
                                    class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-success/20 border-success/60 text-success hover:bg-success/5 h-10 px-4 py-2"
                                >
                                    Add
                                </button>
                            </div>
                        </div>
                    </div>

                    @if(count($chosenEarnings) > 0)
                        <div class="border border-foreground/10 rounded-md overflow-hidden">
                            <div class="overflow-x-auto">
                                <table class="w-full text-sm">
                                    <thead class="bg-foreground/5 border-b border-foreground/10">
                                        <tr>
                                            <th class="p-3 text-left font-medium">Description</th>
                                            <th class="p-3 text-center font-medium w-32">Amount</th>
                                            <th class="p-3 text-center font-medium w-20">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($earningsList->whereIn('id', $chosenEarnings) as $earning)
                                            <tr class="border-b border-foreground/5">
                                                <td class="p-3">
                                                    <input 
                                                        type="text"
                                                        value="{{ $earningsDescriptions[$earning->id] ?? $earning->earnings }}"
                                                        wire:change="updateEarningDescription({{ $earning->id }}, $event.target.value)"
                                                        class="w-full h-8 text-sm rounded border bg-background px-2 py-1 border-foreground/20 focus:ring-2 focus:ring-primary focus:border-primary"
                                                    />
                                                </td>
                                                <td class="p-3 text-center">
                                                    <input 
                                                        type="number" 
                                                        step="0.01"
                                                        value="{{ $earningsAmounts[$earning->id] ?? 0 }}"
                                                        wire:change="updateEarningAmount({{ $earning->id }}, $event.target.value)"
                                                        class="w-28 h-8 text-sm rounded border bg-background px-2 py-1 border-foreground/20 focus:ring-2 focus:ring-primary focus:border-primary text-center"
                                                        min="0"
                                                    />
                                                </td>
                                                <td class="p-3 text-center">
                                                    <button 
                                                        wire:click="removeEarning({{ $earning->id }})"
                                                        type="button"
                                                        class="cursor-pointer inline-flex items-center justify-center h-8 w-8 rounded-md border border-foreground/20 bg-background hover:bg-foreground/5 text-danger hover:text-danger"
                                                    >
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M18 6L6 18M6 6l12 12"/>
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="bg-foreground/5 border-t border-foreground/10">
                                        <tr>
                                            <td class="p-3 font-medium text-right" colspan="2">
                                                Total Earnings:
                                            </td>
                                            <td class="p-3 text-center font-medium text-success">
                                                ₱{{ number_format(array_sum($earningsAmounts), 2) }}
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <x-slot:footer>
            <button wire:click="$set('showProcessPayrollModal', false)" data-tw-dismiss="modal" type="button" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 text-foreground hover:bg-foreground/5 bg-background border-foreground/20 h-10 px-4 py-2 mr-1 w-24">Cancel</button>
            <button wire:click="processPayroll" type="button" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 bg-(--color)/20 border-(--color)/60 text-(--color) hover:bg-(--color)/5 [--color:var(--color-primary)] h-10 px-4 py-2 w-32">Process</button>
        </x-slot:footer>
    </x-menu.modal>
    
    <!-- Success Modal -->
    <x-menu.modal 
        :showButton="false" 
        modalId="process-success-modal" 
        title="Payroll Processed"
        description="The payroll has been processed successfully."
        size="lg"
        :isOpen="$showSuccessModal">
        <div class="space-y-3">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                <div class="box p-3 rounded-md border border-foreground/10 bg-foreground/5">
                    <div class="text-xs opacity-70">Period</div>
                    <div class="font-medium">{{ $processedSummary['period'] ?? '' }}</div>
                </div>
                <div class="box p-3 rounded-md border border-foreground/10 bg-foreground/5">
                    <div class="text-xs opacity-70">Process ID</div>
                    <div class="font-medium">{{ $processedSummary['process_id'] ?? '' }}</div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <tbody>
                        <tr><td class="p-2">Gross Amount</td><td class="p-2 text-right">₱{{ number_format($processedSummary['partial'] ?? 0, 2) }}</td></tr>
                        <tr><td class="p-2">Total Deductions</td><td class="p-2 text-right">₱{{ number_format($processedSummary['total_deductions'] ?? 0, 2) }}</td></tr>
                        <tr><td class="p-2">Biometric Days Logged</td><td class="p-2 text-right">{{ number_format($processedSummary['worked_days'] ?? 0, 0) }}</td></tr>
                        <tr><td class="p-2">Equivalent Paid Days</td><td class="p-2 text-right">{{ number_format($processedSummary['equivalent_days'] ?? 0, 2) }}</td></tr>
                        <tr><td class="p-2">Undertime Minutes</td><td class="p-2 text-right">{{ number_format($processedSummary['total_undertime_minutes'] ?? 0) }}</td></tr>
                        <tr><td class="p-2">Overtime Minutes</td><td class="p-2 text-right">{{ number_format($processedSummary['total_overtime_minutes'] ?? 0) }}</td></tr>
                        <tr><td class="p-2">Late Minutes</td><td class="p-2 text-right">{{ $processedSummary['late_minutes'] ?? 0 }}</td></tr>
                        <tr><td class="p-2">Late Amount</td><td class="p-2 text-right">₱{{ number_format($processedSummary['late_amount'] ?? 0, 2) }}</td></tr>
                        <tr><td class="p-2">Late Rate / Minute</td><td class="p-2 text-right">₱{{ number_format($processedSummary['late_rate_per_minute'] ?? 0, 2) }}</td></tr>
                        <tr><td class="p-2">Manual Earnings</td><td class="p-2 text-right">₱{{ number_format($processedSummary['manual_earnings'] ?? 0, 2) }}</td></tr>
                         <tr>
                             <td class="p-2">Holiday Earnings ({{ $processedSummary['holiday_days'] ?? 0 }} {{ ($processedSummary['holiday_days'] ?? 0) === 1 ? 'day' : 'days' }})</td>
                             <td class="p-2 text-right">₱{{ number_format($processedSummary['holiday_earnings'] ?? 0, 2) }}</td>
                         </tr>
                         <tr class="border-t font-bold">
                             <td class="p-2 text-lg">Net Pay</td>
                             <td class="p-2 text-right text-lg text-primary">₱{{ number_format($processedSummary['net'] ?? 0, 2) }}</td>
                         </tr>
                     </tbody>
                 </table>
             </div>
         </div>
         <x-slot:footer>
             <button wire:click="$set('showSuccessModal', false)" type="button" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 text-foreground hover:bg-foreground/5 bg-background border-foreground/20 h-10 px-4 py-2 w-full">OK</button>
         </x-slot:footer>
     </x-menu.modal>

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
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            {{ ($payslipData['employee']->firstname ?? '') . ' ' . ($payslipData['employee']->lastname ?? '') }}
                        </p>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Position ID: {{ $payslipData['employee']->position ?? 'N/A' }}</p>
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
                                <span class="font-medium text-green-600">₱{{ number_format($payslipData['earnings']->sum('amount'), 2) }}</span>
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
                            @if(data_get($payslipData['summaryExtras'], 'total_undertime_minutes', 0) > 0)
                                <div class="flex justify-between">
                                    <span>Total Undertime Minutes:</span>
                                    <span class="font-medium text-gray-900 dark:text-white">
                                        {{ number_format(data_get($payslipData['summaryExtras'], 'total_undertime_minutes', 0)) }}
                                    </span>
                                </div>
                            @endif
                            @if(data_get($payslipData['summaryExtras'], 'total_overtime_minutes', 0) > 0)
                                <div class="flex justify-between">
                                    <span>Total Overtime Minutes:</span>
                                    <span class="font-medium text-gray-900 dark:text-white">
                                        {{ number_format(data_get($payslipData['summaryExtras'], 'total_overtime_minutes', 0)) }}
                                    </span>
                                </div>
                            @endif
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
 
</div>