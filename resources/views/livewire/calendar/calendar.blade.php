<div>
    <!-- Toast Notification Template -->
    <x-menu.notification-toast seconds="10" layout="compact" animated="true" />
    
    <h2 class="mt-10 text-lg font-medium">Calendar - Philippines Holidays</h2>
<div class="mt-5 grid grid-cols-12 gap-5">
    <!-- BEGIN: Calendar Side Menu -->
    <div class="col-span-12 xl:col-span-4 2xl:col-span-3">

            <!-- Holidays List -->
            <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:z-[-1] after:backdrop-blur-md">
                <h3 class="text-lg font-medium mb-4">This Month's Holidays</h3>
                <div class="space-y-3">
                    @forelse($monthEvents as $event)
                    <div class="flex items-center p-3 rounded-lg border border-foreground/10 hover:bg-foreground/5 transition-colors">
                        <div class="w-3 h-3 rounded-full mr-3" style="background-color: {{ $event['color'] }}"></div>
                        <div class="flex-1 min-w-0">
                            <div class="font-medium text-sm truncate">{{ $event['title'] }}</div>
                            <div class="text-xs text-foreground/70">
                                {{ \Carbon\Carbon::parse($event['start'])->format('M d, Y') }}
                            </div>
                            <div class="text-xs text-foreground/50">{{ ucfirst(str_replace('_', ' ', $event['type'])) }}</div>
                        </div>
                        @if(!empty($event['isCustom']) && $event['isCustom'] && !empty($event['customId']))
                        <button title="Edit" wire:click="openEditHoliday({{ (int) $event['customId'] }})" class="ml-4 text-foreground/70 hover:text-primary flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        </button>
                        @endif
                    </div>
                    @empty
                    <div class="text-center py-8 text-foreground/50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-4">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <p>No holidays this month</p>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Add Holiday trigger button (matches course-management pattern) -->
            <div class="mt-5">
                <button wire:click="openAddHoliday" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 bg-(--color)/20 border-(--color)/60 text-(--color) hover:bg-(--color)/5 [--color:var(--color-primary)] h-10 px-4 py-2 box w-full">
                    Add Holiday
                </button>
            </div>

            <!-- Add Holiday Modal (course-management style) -->
            <x-menu.modal 
                :showButton="false" 
                modalId="add-holiday-modal" 
                title="Add Holiday" 
                description="Create a holiday and choose its repeat type"
                size="md"
                :isOpen="$showAddHoliday">
                <form wire:submit.prevent="addHoliday" class="space-y-4">
                    <div class="grid gap-4 gap-y-3">
                        <div class="grid grid-cols-4 items-center gap-4">
                            <label class="text-right text-sm font-medium" for="holiday-title">Title</label>
                            <input 
                                wire:model.defer="holidayTitle" 
                                id="holiday-title"
                                class="col-span-3 w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5" 
                                type="text" 
                                placeholder="e.g., Independence Day">
                        </div>
                        @error('holidayTitle') <div class="col-start-2 col-span-3 text-danger text-xs">{{ $message }}</div> @enderror

                        <div class="grid grid-cols-4 items-center gap-4">
                            <label class="text-right text-sm font-medium" for="holiday-date">Date</label>
                            <input 
                                wire:model.live="holidayDate" 
                                id="holiday-date"
                                class="col-span-3 w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5" 
                                type="date">
                        </div>
                        @error('holidayDate') <div class="col-start-2 col-span-3 text-danger text-xs">{{ $message }}</div> @enderror

                        <div class="grid grid-cols-4 items-center gap-4">
                            <label class="text-right text-sm font-medium">Day</label>
                            <div class="col-span-3 text-sm opacity-80">{{ $dayName ?: '—' }}</div>
                        </div>

                        <div class="grid grid-cols-4 items-center gap-4">
                            <label class="text-right text-sm font-medium" for="repeat-type">Repeat</label>
                            <select 
                                wire:model.defer="repeatType" 
                                id="repeat-type"
                                class="col-span-3 w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5">
                                <option value="yearly">Yearly (same month/day)</option>
                                <option value="monthly">Monthly (same day each month)</option>
                                <option value="day">Every Day</option>
                            </select>
                        </div>

                        <div class="grid grid-cols-4 items-center gap-4">
                            <label class="text-right text-sm font-medium" for="status">Status</label>
                            <select 
                                wire:model.defer="status" 
                                id="status"
                                class="col-span-3 w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </form>

                <x-slot:footer>
                    <button data-tw-dismiss="modal" type="button" wire:click="closeAddHoliday" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 text-foreground hover:bg-foreground/5 bg-background border-foreground/20 h-10 px-4 py-2 mr-1 w-24">
                        Cancel
                    </button>
                    <button type="button" wire:click="addHoliday" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 bg-(--color)/20 border-(--color)/60 text-(--color) hover:bg-(--color)/5 [--color:var(--color-primary)] h-10 px-4 py-2 w-24">
                        Save
                    </button>
                </x-slot:footer>
            </x-menu.modal>

            <!-- Edit Holiday Modal -->
            <x-menu.modal 
                :showButton="false" 
                modalId="edit-holiday-modal" 
                title="Edit Holiday" 
                description="Update holiday details"
                size="md"
                :isOpen="$showEditHoliday">
                <form wire:submit.prevent="updateHoliday" class="space-y-4">
                    <div class="grid gap-4 gap-y-3">
                        <div class="grid grid-cols-4 items-center gap-4">
                            <label class="text-right text-sm font-medium" for="edit-holiday-title">Title</label>
                            <input wire:model.defer="holidayTitle" id="edit-holiday-title" class="col-span-3 w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5" type="text">
                        </div>
                        <div class="grid grid-cols-4 items-center gap-4">
                            <label class="text-right text-sm font-medium" for="edit-holiday-date">Date</label>
                            <input wire:model.live="holidayDate" id="edit-holiday-date" class="col-span-3 w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5" type="date">
                        </div>
                        <div class="grid grid-cols-4 items-center gap-4">
                            <label class="text-right text-sm font-medium">Day</label>
                            <div class="col-span-3 text-sm opacity-80">{{ $dayName ?: '—' }}</div>
                        </div>
                        <div class="grid grid-cols-4 items-center gap-4">
                            <label class="text-right text-sm font-medium" for="edit-repeat-type">Repeat</label>
                            <select wire:model.defer="repeatType" id="edit-repeat-type" class="col-span-3 w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5">
                                <option value="yearly">Yearly (same month/day)</option>
                                <option value="monthly">Monthly (same day each month)</option>
                                <option value="day">Every Day</option>
                            </select>
                        </div>
                        <div class="grid grid-cols-4 items-center gap-4">
                            <label class="text-right text-sm font-medium" for="edit-status">Status</label>
                            <select wire:model.defer="status" id="edit-status" class="col-span-3 w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                </form>
                <x-slot:footer>
                    <button data-tw-dismiss="modal" type="button" wire:click="$set('showEditHoliday', false)" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 text-foreground hover:bg-foreground/5 bg-background border-foreground/20 h-10 px-4 py-2 mr-1 w-24">Cancel</button>
                    <button type="button" wire:click="updateHoliday" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 bg-(--color)/20 border-(--color)/60 text-(--color) hover:bg-(--color)/5 [--color:var(--color-primary)] h-10 px-4 py-2 w-24">Update</button>
                </x-slot:footer>
            </x-menu.modal>

        </div>
        <!-- END: Calendar Side Menu -->

        <!-- BEGIN: Calendar Content -->
        <div class="col-span-12 xl:col-span-8 2xl:col-span-9">
            <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:z-[-1] after:backdrop-blur-md">
                <!-- Calendar Header -->
                <div class="flex items-center justify-between mb-6">
                    <div class="flex items-center gap-4">
                        <button wire:click="previousMonth" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-background border-foreground/20 hover:bg-foreground/5 h-10 w-10">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m15 18-6-6 6-6"></path>
                            </svg>
                        </button>
                        <h2 class="text-xl font-semibold">{{ $currentMonthName }}</h2>
                        <button wire:click="nextMonth" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-background border-foreground/20 hover:bg-foreground/5 h-10 w-10">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg>
                        </button>
            </div>
                    <div class="text-sm text-foreground/70">
                        {{ $monthEvents->count() }} holidays this month
                </div>
                </div>

                @if($viewMode === 'month')
                <!-- Month View -->
                <div class="calendar-month">
                    <!-- Day Headers -->
                    <div class="grid grid-cols-7 gap-1 mb-2">
                        <div class="text-center font-medium text-sm py-2 text-foreground/70">Sun</div>
                        <div class="text-center font-medium text-sm py-2 text-foreground/70">Mon</div>
                        <div class="text-center font-medium text-sm py-2 text-foreground/70">Tue</div>
                        <div class="text-center font-medium text-sm py-2 text-foreground/70">Wed</div>
                        <div class="text-center font-medium text-sm py-2 text-foreground/70">Thu</div>
                        <div class="text-center font-medium text-sm py-2 text-foreground/70">Fri</div>
                        <div class="text-center font-medium text-sm py-2 text-foreground/70">Sat</div>
                    </div>

                    <!-- Calendar Days -->
                    <div class="grid grid-cols-7 gap-1">
                        @foreach($calendarDays as $day)
                        <div class="min-h-[120px] border border-foreground/10 rounded-lg p-2 {{ $day['isCurrentMonth'] ? 'bg-background' : 'bg-foreground/5' }} {{ $day['isToday'] ? 'ring-2 ring-primary' : '' }}">
                            <div class="flex items-center justify-between mb-1">
                                <span class="text-sm font-medium {{ $day['isCurrentMonth'] ? 'text-foreground' : 'text-foreground/50' }} {{ $day['isToday'] ? 'text-primary font-bold' : '' }}">
                                    {{ $day['day'] }}
                                </span>
                                @if($day['events']->count() > 0)
                                    <span class="text-xs bg-primary text-primary-foreground rounded-full px-2 py-1">
                                        {{ $day['events']->count() }}
                                    </span>
                                @endif
                            </div>
                            
                            <!-- Events for this day -->
                            <div class="space-y-1">
                                @foreach($day['events']->take(2) as $event)
                                <div class="text-xs p-1 rounded truncate" style="background-color: {{ $event['color'] }}20; color: {{ $event['color'] }}">
                                    {{ $event['title'] }}
                                </div>
                                @endforeach
                                @if($day['events']->count() > 2)
                                <div class="text-xs text-foreground/50">
                                    +{{ $day['events']->count() - 2 }} more
                </div>
                                @endif
                </div>
            </div>
                        @endforeach
                    </div>
                </div>
                @elseif($viewMode === 'list')
                <!-- List View -->
                <div class="space-y-4">
                    @forelse($monthEvents->sortBy('start') as $event)
                    <div class="border border-foreground/10 rounded-lg p-4 hover:bg-foreground/5 transition-colors">
                        <div class="flex items-start justify-between">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-2">
                                    <div class="w-3 h-3 rounded-full" style="background-color: {{ $event['color'] }}"></div>
                                    <h3 class="font-semibold text-lg">{{ $event['title'] }}</h3>
                                    <span class="px-2 py-1 text-xs rounded-full bg-foreground/10">
                                        {{ ucfirst(str_replace('_', ' ', $event['type'])) }}
                                    </span>
                                </div>
                                <p class="text-foreground/70 mb-2">{{ $event['description'] }}</p>
                                <div class="flex items-center gap-4 text-sm text-foreground/60">
                                    <div class="flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg>
                                        {{ \Carbon\Carbon::parse($event['start'])->format('M d, Y') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
                    @empty
                    <div class="text-center py-12 text-foreground/50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-4">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                        <h3 class="text-lg font-medium mb-2">No holidays this month</h3>
                        <p>There are no listed public holidays for this month.</p>
                    </div>
                    @endforelse
                </div>
                @endif
            </div>
        </div>
        <!-- END: Calendar Content -->
    </div>
</div>
