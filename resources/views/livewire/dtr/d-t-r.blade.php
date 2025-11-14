<div class="mt-8 grid grid-cols-12 gap-6">
    <div class="col-span-12 lg:col-span-3">
        <h2 class="mr-auto mt-2 text-lg font-medium">Employees</h2>
        <!-- BEGIN: Employee List -->
        <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md mt-6">
            <div class="mt-6 flex flex-col gap-2 max-h-[600px] overflow-y-auto overflow-x-hidden pr-2">
                @forelse($employees as $employee)
                <a wire:click="selectEmployee({{ $employee->id }})" class="[&.active]:bg-foreground/5 [&.active]:border-foreground/10 flex items-center rounded-md border border-transparent px-3 py-2 hover:bg-foreground/5 cursor-pointer {{ $selectedEmployeeId == $employee->id ? 'bg-foreground/5 border-foreground/10' : '' }}">
                    <div class="mr-3 flex-shrink-0">
                        @if($employee->picture)
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('storage/' . ltrim($employee->picture, '/')) }}" alt="{{ $employee->firstname . ' ' . $employee->lastname }}">
                        @else
                            <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold text-sm">
                                {{ strtoupper(substr($employee->firstname ?? 'E', 0, 1)) }}{{ strtoupper(substr($employee->lastname ?? '', 0, 1)) }}
                            </div>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="font-medium text-sm truncate">
                            {{ $employee->firstname }} {{ $employee->middlename ? $employee->middlename . ' ' : '' }}{{ $employee->lastname }}{{ $employee->suffix ? ' ' . $employee->suffix : '' }}
                        </div>
                        @if($employee->position)
                            <div class="text-xs text-foreground/70 truncate">{{ $employee->position }}</div>
                                    @endif
                                </div>
                </a>
                @empty
                <div class="text-center py-8 text-foreground/50 text-sm">
                    No employees found
                </div>
                @endforelse
            </div>
        </div>
        <!-- END: Employee List -->
    </div>
    <div class="col-span-12 lg:col-span-9">
        @if($selectedEmployee)
        <!-- BEGIN: Inbox Content -->
        <div class="box relative before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md mt-5 p-0">
            <!-- BEGIN: DTR Content -->
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base mr-auto">
                    My Daily Time Record
                </h2>
            </div>
            <div class="p-5">
                <!-- Date Range Section -->
                <div class="mb-5">
                    <div x-data="dateRangePicker()" class="relative">
                        <label class="text-sm font-medium mb-2 block">Date Range:</label>
                        <div class="flex items-center gap-2">
                            <button @click="showCalendar = !showCalendar" type="button" class="h-10 rounded-md border bg-background px-3 py-2 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5 focus-visible:ring-offset-2 box w-80 text-left flex items-center justify-between">
                                <span x-text="displayText"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            </button>
                            <button wire:click="loadDtrData" class="btn btn-primary" id="bom_load_btn">Load</button>
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
                                if (!dateStr) return '';
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
                                    this.showCalendar = false;
                                    // Force Livewire to update and load DTR data
                                    @this.loadDtrData();
                                }
                            }
                        }
                    }
                    </script>
                </div>
                <!-- DTR Table -->
                <div class="pb-10">
                <div class="overflow-x-auto sm:overflow-x-visible">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr>
                                <th rowspan="2" class="whitespace-nowrap text-center border border-slate-200 dark:border-darkmode-400 border-r-2" style="max-width: 50px; width: 50px;"></th>
                                <th colspan="2" class="whitespace-nowrap text-center border border-slate-200 dark:border-darkmode-400 border-r-2 border-b-0">AM</th>
                                <th colspan="2" class="whitespace-nowrap text-center border border-slate-200 dark:border-darkmode-400 border-r-2 border-b-0">PM</th>
                                <th rowspan="2" class="whitespace-nowrap text-center border border-slate-200 dark:border-darkmode-400">UNDERTIME <br> <span class="text-slate-400 font-normal">(Minutes)</span></th>
                                <th rowspan="2" class="whitespace-nowrap text-center border border-slate-200 dark:border-darkmode-400">Late <br> <span class="text-slate-400 font-normal">(Minutes)</span></th>
                            </tr>
                            <tr>
                                <th colspan="1" class="whitespace-nowrap text-center border border-slate-200 dark:border-darkmode-400" style="width: 80px;">IN</th>
                                <th colspan="1" class="whitespace-nowrap text-center border border-slate-200 dark:border-darkmode-400 border-r-2" style="width: 80px;">OUT</th>
                                <th colspan="1" class="whitespace-nowrap text-center border border-slate-200 dark:border-darkmode-400" style="width: 80px;">IN</th>
                                <th colspan="1" class="whitespace-nowrap text-center border border-slate-200 dark:border-darkmode-400 border-r-2" style="width: 80px;">OUT</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dtrData as $record)
                            <tr class="[&:hover>td]:before:bg-accent [&:hover>td]:relative [&:hover>td]:before:absolute [&:hover>td]:before:inset-0 [&:hover>td]:before:z-[-1] [&:hover>td]:before:blur-lg">
                                <td class="border border-slate-200 dark:border-darkmode-400 border-r-2 text-center">{{ $record['day'] }}</td>
                                <td class="border border-slate-200 dark:border-darkmode-400 relative text-center overflow-hidden" style="width: 80px;" data-just="0" data-date="{{ $record['date'] }}" data-when="Morning In">
                                    @if($record['is_weekend'])
                                        <span class="absolute inset-0 flex items-center justify-center font-semibold text-red-600 uppercase tracking-[0.2em] text-xs pointer-events-none whitespace-nowrap">
                                            {{ strtoupper($record['day_name']) }}
                                        </span>
                                    @elseif($record['am_in'])
                                        {{ $record['am_in'] }}
                                    @endif
                                </td>
                                <td class="border border-slate-200 dark:border-darkmode-400 border-r-2 text-center" style="width: 80px;" data-just="0" data-date="{{ $record['date'] }}" data-when="Morning Out">
                                    @if(!$record['is_weekend'] && $record['am_out'])
                                        {{ $record['am_out'] }}
                                    @endif
                                </td>
                                <td class="border border-slate-200 dark:border-darkmode-400 text-center" style="width: 80px;" data-just="0" data-date="{{ $record['date'] }}" data-when="Afternoon In">
                                    @if(!$record['is_weekend'] && $record['pm_in'])
                                        {{ $record['pm_in'] }}
                                    @endif
                                </td>
                                <td class="border border-slate-200 dark:border-darkmode-400 border-r-2 text-center" style="width: 80px;" data-just="0" data-date="{{ $record['date'] }}" data-when="Afternoon Out">
                                    @if(!$record['is_weekend'] && $record['pm_out'])
                                        {{ $record['pm_out'] }}
                                    @endif
                                </td>
                                <td class="text-danger text-center border border-slate-200 dark:border-darkmode-400">
                                    @if($record['undertime'] > 0)
                                        <div class="dropdown inline-block" data-tw-placement="top">
                                            <button class="dropdown-toggle text-danger" aria-expanded="false" data-tw-toggle="dropdown">{{ $record['undertime'] }}</button>
                                            <div class="dropdown-menu">
                                                <ul class="dropdown-content">
                                                    <div>
                                                        <x-menu.regular-table hoverEffect="false">
                                                            <x-slot:thead>
                                                                <tr>
                                                                    <th class="whitespace-nowrap text-center">Scheduled <br> Time</th>
                                                                </tr>
                                                            </x-slot:thead>
                                                            <x-slot:tbody>
                                                                <tr class="text-center">
                                                                    <td>{{ $record['scheduled']['am_in'] }}</td>
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <td>{{ $record['scheduled']['am_out'] }}</td>
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <td>{{ $record['scheduled']['pm_in'] }}</td>
                                                                </tr>
                                                                <tr class="text-center">
                                                                    <td>{{ $record['scheduled']['pm_out'] }}</td>
                                                                </tr>
                                                            </x-slot:tbody>
                                                        </x-menu.regular-table>
                                                    </div>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center border border-slate-200 dark:border-darkmode-400">
                                    <!-- Late data will go here -->
                                </td>
                            </tr>
                            @endforeach
                            @if(empty($dtrData))
                            <tr>
                                <td colspan="7" class="text-center py-8 text-foreground/50 text-sm border border-slate-200 dark:border-darkmode-400">
                                    Choose the employee first and choose the date range for the DTR and click the load button
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            <!-- END: DTR Content -->
        </div>
        <!-- END: Inbox Content -->
        @else
        <!-- Empty state when no employee is selected -->
        <div class="box relative before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md mt-5 p-5 text-center text-foreground/50">
            Please select an employee to view DTR
        </div>
        @endif
    </div>
</div>