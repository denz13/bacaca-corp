<div>
    <h2 class="mt-10 text-lg font-medium">Positions</h2>
    <div class="mt-5 grid grid-cols-12 gap-x-6 gap-y-8">
        <div class="col-span-12 mt-2 flex flex-wrap items-center sm:flex-nowrap">
            <button wire:click="openAddModal" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 bg-(--color)/20 border-(--color)/60 text-(--color) hover:bg-(--color)/5 [--color:var(--color-primary)] h-10 px-4 py-2 box mr-2">
                Add Position
            </button>
            
            <div class="mx-auto hidden opacity-70 md:block">
                @if(isset($positions))
                    Showing {{ $positions->firstItem() ?? 0 }} to {{ $positions->lastItem() ?? 0 }} of {{ $positions->total() }} entries
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
        @isset($positions)
        @forelse($positions as $pos)
        <div class="col-span-12 md:col-span-6 lg:col-span-4 xl:col-span-3">
            <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md">
                <div class="flex items-center border-b pb-4 mb-4">
                    <div class="rounded-full bg-primary/10 p-3 text-primary mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-briefcase h-6 w-6"><rect width="20" height="14" x="2" y="7" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                    </div>
                    <div>
                        <div class="text-base font-medium">{{ $pos->position }}</div>
                        <div class="text-xs text-foreground/50">{{ $pos->job }}</div>
                    </div>
                </div>
                <div class="space-y-2">
                    <div class="flex items-center text-xs opacity-70">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-banknote mr-2 h-4 w-4"><rect width="20" height="12" x="2" y="6" rx="2"></rect><circle cx="12" cy="12" r="2"></circle><path d="M6 12h.01"></path><path d="M18 12h.01"></path></svg>
                        <span class="font-medium mr-1">Salary:</span> {{ $pos->salary }}
                    </div>
                    <div class="flex items-center text-xs opacity-70">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-info mr-2 h-4 w-4"><circle cx="12" cy="12" r="10"></circle><path d="M12 16v-4"></path><path d="M12 8h.01"></path></svg>
                        <span class="font-medium mr-1">Nature:</span> {{ $pos->nature }}
                    </div>
                    <div class="flex items-center text-xs opacity-70">
                        <span class="font-medium mr-2">Status:</span>
                        <span class="inline-block px-2 py-1 rounded-full text-[10px] {{ $pos->status === 'active' ? 'bg-blue-500/10 text-blue-500 border border-blue-500/20' : 'bg-red-500/10 text-red-500 border border-red-500/20' }}">
                            {{ ucfirst($pos->status) }}
                        </span>
                    </div>
                </div>
                <div class="flex items-center justify-end border-t mt-4 pt-4">
                    <a class="mr-3 flex items-center text-sm" href="javascript:;" wire:click="edit({{ $pos->pos_id }})">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-edit-2 mr-1 h-3 w-3"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                        Edit
                    </a>
                    <a class="text-danger flex items-center text-sm" href="javascript:;" wire:click="delete({{ $pos->pos_id }})" onConfirm="return confirm('Are you sure you want to delete this position?')">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2 mr-1 h-3 w-3"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path><line x1="10" x2="10" y1="11" y2="17"></line><line x1="14" x2="14" y1="11" y2="17"></line></svg>
                        Delete
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-12 text-center py-12 text-foreground/50">No positions found.</div>
        @endforelse
        @endisset

        <!-- Add/Edit Position Modal -->
        <x-menu.modal 
            :showButton="false" 
            modalId="position-modal" 
            :title="$pos_id ? 'Edit Position' : 'Add New Position'" 
            :description="$pos_id ? 'Update position details' : 'Create a new position in the system'"
            size="lg"
            :isOpen="$showAddModal || $showEditModal">
            <form wire:submit.prevent="{{ $pos_id ? 'update' : 'store' }}" class="space-y-4">
                <div class="grid gap-4 gap-y-3">
                    <div class="grid grid-cols-4 items-center gap-4">
                        <label class="text-right text-sm font-medium" for="pos-title">Position</label>
                        <input wire:model.defer="position" id="pos-title" type="text" class="col-span-3 w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5" placeholder="e.g. Software Engineer" />
                    </div>
                    @error('position') <div class="col-start-2 col-span-3 text-danger text-xs">{{ $message }}</div> @enderror

                    <div class="grid grid-cols-4 items-center gap-4">
                        <label class="text-right text-sm font-medium" for="pos-job">Job</label>
                        <input wire:model.defer="job" id="pos-job" type="text" class="col-span-3 w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5" placeholder="e.g. Development" />
                    </div>
                    @error('job') <div class="col-start-2 col-span-3 text-danger text-xs">{{ $message }}</div> @enderror

                    <div class="grid grid-cols-4 items-center gap-4">
                        <label class="text-right text-sm font-medium" for="pos-salary">Salary</label>
                        <input wire:model.defer="salary" id="pos-salary" type="text" class="col-span-3 w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5" placeholder="e.g. 50,000" />
                    </div>
                    @error('salary') <div class="col-start-2 col-span-3 text-danger text-xs">{{ $message }}</div> @enderror

                    <div class="grid grid-cols-4 items-center gap-4">
                        <label class="text-right text-sm font-medium" for="pos-nature">Nature</label>
                        <input wire:model.defer="nature" id="pos-nature" type="text" class="col-span-3 w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5" placeholder="e.g. Full-time" />
                    </div>
                    @error('nature') <div class="col-start-2 col-span-3 text-danger text-xs">{{ $message }}</div> @enderror

                    <div class="grid grid-cols-4 items-center gap-4">
                        <label class="text-right text-sm font-medium" for="pos-status">Status</label>
                        <select wire:model.defer="status" id="pos-status" class="col-span-3 w-full rounded-md border bg-background px-3 py-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    @error('status') <div class="col-start-2 col-span-3 text-danger text-xs">{{ $message }}</div> @enderror
                </div>
            </form>

            <x-slot:footer>
                <button type="button" wire:click="closeModals" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 text-foreground hover:bg-foreground/5 bg-background border-foreground/20 h-10 px-4 py-2 mr-1 w-24">Cancel</button>
                <button type="button" wire:click="{{ $pos_id ? 'update' : 'store' }}" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 bg-(--color)/20 border-(--color)/60 text-(--color) hover:bg-(--color)/5 [--color:var(--color-primary)] h-10 px-4 py-2 w-28">
                    {{ $pos_id ? 'Update' : 'Save' }}
                </button>
            </x-slot:footer>
        </x-menu.modal>

        <!-- BEGIN: Pagination -->
        @isset($positions)
            <x-menu.pagination :paginator="$positions" :perPageOptions="[10, 25, 35, 50]" />
        @endisset
        <!-- END: Pagination -->
    </div>
</div>

