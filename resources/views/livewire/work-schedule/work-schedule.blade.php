<div>
    <h2 class="mt-10 text-lg font-medium">Work Schedule</h2>
    <div class="mt-5 grid grid-cols-12 gap-x-6 gap-y-8">
                            <div class="col-span-12 mt-2 flex flex-wrap items-center sm:flex-nowrap">
            <button wire:click="openAddModal" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-(--color)/20 border-(--color)/60 text-(--color) hover:bg-(--color)/5 [--color:var(--color-primary)] h-10 px-4 py-2 box mr-2">
                                    Add Employee Work Schedule
                                </button>
                                
                                <div class="mx-auto hidden opacity-70 md:block">
                                    @if(isset($usersWithSchedules))
                                        Showing {{ $usersWithSchedules->firstItem() }} to {{ $usersWithSchedules->lastItem() }} of {{ $usersWithSchedules->total() }} entries
                                    @endif
                                </div>
                                <div class="mt-3 w-full sm:ml-auto sm:mt-0 sm:w-auto md:ml-0">
                                    <div class="relative w-56">
                                        <input wire:model.debounce.400ms="search" class="h-10 rounded-md border bg-background px-3 py-2 ring-offset-background file:border-0 file:bg-transparent file:font-medium file:text-foreground placeholder:text-foreground/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 box w-56 pr-10" type="text" placeholder="Search...">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="search" class="lucide lucide-search size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 absolute inset-y-0 right-0 my-auto mr-3 h-4 w-4"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <!-- BEGIN: Data List -->
        @isset($usersWithSchedules)
        @forelse($usersWithSchedules as $user)
        <div class="col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="box relative before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md p-0">
                <div class="p-5">
                    <div class="image-fit h-40 overflow-hidden rounded-lg before:absolute before:left-0 before:top-0 before:z-10 before:block before:h-full before:w-full before:bg-gradient-to-t before:from-black before:to-black/10 2xl:h-56">
                        <img class="rounded-lg" src="{{ $user->profile_image ? asset('storage/' . ltrim($user->profile_image, '/')) : asset('images/placeholders/avatar.jpg') }}" alt="{{ $user->name }}">
                        <div class="absolute bottom-0 z-10 px-5 pb-6 text-white">
                            <a class="block text-base font-medium" href="">
                                {{ $user->name }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-2 mb-2 opacity-70">
                    <div class="flex flex-col items-center gap-1 text-center">
                    @forelse($user->workSchedules as $sched)
                        <div class="text-xs opacity-80 flex items-center gap-2">
                            <span class="inline-flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="calendar" class="lucide lucide-calendar size-3 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 h-3 w-3"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg>
                                <span class="capitalize">{{ $sched->day }}</span>
                            </span>
                            <span>•</span>
                            <span class="inline-flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="clock" class="lucide lucide-clock size-3 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 h-3 w-3"><circle cx="12" cy="12" r="10"></circle><path d="M12 6v6l4 2"></path></svg>
                                {{ \Carbon\Carbon::parse($sched->time_in)->format('h:i A') }} - {{ \Carbon\Carbon::parse($sched->time_out)->format('h:i A') }}
                                <span class="ml-1 inline-block h-2 w-2 rounded-full {{ $sched->status === 'active' ? 'bg-blue-500' : 'bg-red-500' }}" title="{{ ucfirst($sched->status) }}"></span>
                            </span>
                        </div>
                    @empty
                        <div class="mt-1 text-xs opacity-60">No schedules</div>
                    @endforelse
                    </div>
                </div>
                <div class="flex items-center justify-center border-t p-5 lg:justify-end">
                    <a class="mr-3 flex items-center" href="#" wire:click="openEditModal({{ $user->id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="check-square" class="lucide lucide-check-square size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 mr-1 h-4 w-4"><path d="M21 10.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h12.5"></path><path d="m9 11 3 3L22 4"></path></svg>
                        Edit
                    </a>
                    <a class="text-danger flex items-center" data-tw-toggle="modal" data-tw-target="#delete-confirmation-dialog" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="trash" class="lucide lucide-trash size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 mr-1 h-4 w-4"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path></svg>
                        Delete
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-12 text-center py-12 text-foreground/50">No work schedules found.</div>
        @endforelse
        @endisset

        <!-- Edit Work Schedule Modal -->
        <x-menu.modal 
            :showButton="false" 
            modalId="edit-work-schedule-modal" 
            title="Edit Employee Work Schedules" 
            description="Update the schedules for this employee"
            size="xl"
            :isOpen="$showEditScheduleModal">
            <form wire:submit.prevent="updateSchedules" class="space-y-4">
                <div class="grid gap-3">
                    @forelse($editSchedules as $index => $row)
                    <div class="grid grid-cols-12 items-center gap-2">
                        <div class="col-span-4">
                            <select wire:model.defer="editSchedules.{{ $index }}.day" class="w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5">
                                <option value="monday">Monday</option>
                                <option value="tuesday">Tuesday</option>
                                <option value="wednesday">Wednesday</option>
                                <option value="thursday">Thursday</option>
                                <option value="friday">Friday</option>
                                <option value="saturday">Saturday</option>
                                <option value="sunday">Sunday</option>
                            </select>
                        </div>
                        <div class="col-span-3">
                            <input wire:model.defer="editSchedules.{{ $index }}.time_in" type="time" class="w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5" />
                        </div>
                        <div class="col-span-3">
                            <input wire:model.defer="editSchedules.{{ $index }}.time_out" type="time" class="w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5" />
                        </div>
                        <div class="col-span-2">
                            <select wire:model.defer="editSchedules.{{ $index }}.status" class="w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    @empty
                    <div class="text-xs opacity-60">No schedules to edit.</div>
                    @endforelse
                </div>
            </form>

            <x-slot:footer>
                <button data-tw-dismiss="modal" type="button" wire:click="$set('showEditScheduleModal', false)" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 text-foreground hover:bg-foreground/5 bg-background border-foreground/20 h-10 px-4 py-2 mr-1 w-24">Cancel</button>
                <button type="button" wire:click="updateSchedules" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 bg-(--color)/20 border-(--color)/60 text-(--color) hover:bg-(--color)/5 [--color:var(--color-primary)] h-10 px-4 py-2 w-28">Save</button>
            </x-slot:footer>
        </x-menu.modal>

        <!-- Add Work Schedule Modal -->
        <x-menu.modal 
            :showButton="false" 
            modalId="add-work-schedule-modal" 
            title="Add Employee Work Schedule" 
            description="Create a new work schedule for an employee"
            size="lg"
            :isOpen="$showAddScheduleModal">
            <form wire:submit.prevent="createSchedule" class="space-y-4">
                <div class="grid gap-4 gap-y-3">
                    <div class="grid grid-cols-4 items-center gap-4">
                        <label class="text-right text-sm font-medium" for="ws-user">Employee</label>
                        <select wire:model.defer="users_id" id="ws-user" class="col-span-3 w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5">
                            <option value="">Select Employee</option>
                            @foreach($users as $u)
                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('users_id') <div class="col-start-2 col-span-3 text-danger text-xs">{{ $message }}</div> @enderror

                    <div class="grid grid-cols-4 items-center gap-4">
                        <label class="text-right text-sm font-medium" for="ws-day">Day</label>
                        <select wire:model.defer="day" id="ws-day" class="col-span-3 w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5">
                            <option value="">Select Day</option>
                            <option value="monday">Monday</option>
                            <option value="tuesday">Tuesday</option>
                            <option value="wednesday">Wednesday</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                            <option value="saturday">Saturday</option>
                            <option value="sunday">Sunday</option>
                        </select>
                    </div>
                    @error('day') <div class="col-start-2 col-span-3 text-danger text-xs">{{ $message }}</div> @enderror

                    <div class="grid grid-cols-4 items-center gap-4">
                        <label class="text-right text-sm font-medium" for="ws-time-in">Time In</label>
                        <input wire:model.defer="time_in" id="ws-time-in" type="time" class="col-span-3 w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5" />
                    </div>
                    @error('time_in') <div class="col-start-2 col-span-3 text-danger text-xs">{{ $message }}</div> @enderror

                    <div class="grid grid-cols-4 items-center gap-4">
                        <label class="text-right text-sm font-medium" for="ws-time-out">Time Out</label>
                        <input wire:model.defer="time_out" id="ws-time-out" type="time" class="col-span-3 w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5" />
                    </div>
                    @error('time_out') <div class="col-start-2 col-span-3 text-danger text-xs">{{ $message }}</div> @enderror

                    <div class="grid grid-cols-4 items-center gap-4">
                        <label class="text-right text-sm font-medium" for="ws-status">Status</label>
                        <select wire:model.defer="status" id="ws-status" class="col-span-3 w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                                </select>
                            </div>
                    @error('status') <div class="col-start-2 col-span-3 text-danger text-xs">{{ $message }}</div> @enderror
                </div>
            </form>

            <x-slot:footer>
                <button data-tw-dismiss="modal" type="button" wire:click="$set('showAddScheduleModal', false)" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 text-foreground hover:bg-foreground/5 bg-background border-foreground/20 h-10 px-4 py-2 mr-1 w-24">Cancel</button>
                <button type="button" wire:click="createScheduleAndAddAnother" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 bg-(--color)/20 border-(--color)/60 text-(--color) hover:bg-(--color)/5 [--color:var(--color-secondary)] h-10 px-4 py-2 w-40 mr-2">Save &amp; Add Another</button>
                <button type="button" wire:click="createSchedule" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 bg-(--color)/20 border-(--color)/60 text-(--color) hover:bg-(--color)/5 [--color:var(--color-primary)] h-10 px-4 py-2 w-28">Save</button>
            </x-slot:footer>
        </x-menu.modal>
        <!-- BEGIN: Pagination -->
        @isset($usersWithSchedules)
            <x-menu.pagination :paginator="$usersWithSchedules" :perPageOptions="[10, 25, 35, 50]" />
        @endisset
                            <!-- END: Pagination -->
    </div>
</div>

