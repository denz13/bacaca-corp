<div>
    <x-menu.notification-toast seconds="6" layout="compact" animated="true" />

    <div class="flex items-center justify-between mb-4">
        <div class="flex items-center gap-3">
            <div class="relative w-56">
                <input wire:model.debounce.400ms="search" class="h-10 rounded-md border bg-background px-3 py-2 ring-offset-background file:border-0 file:bg-transparent file:font-medium file:text-foreground placeholder:text-foreground/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 box w-56 pr-10" type="text" placeholder="Search...">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="search" class="lucide lucide-search size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 absolute inset-y-0 right-0 my-auto mr-3 h-4 w-4"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg>
            </div>
            <select wire:model="perPage" class="h-10 rounded-md border bg-background px-3 py-2">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="35">35</option>
                <option value="50">50</option>
            </select>
        </div>
        <button wire:click="openCreateModal" type="button" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg]:size-4 [&_svg]:shrink-0 bg-(--color)/20 border-(--color)/60 text-(--color) hover:bg-(--color)/5 [--color:var(--color-primary)] h-10 rounded-md px-3 min-w-32">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
            Add Earning
        </button>
    </div>

    <div class="border rounded-md overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-foreground/5 border-b border-foreground/10">
                    <tr>
                        <th class="p-3 text-left font-medium cursor-pointer select-none" wire:click="sortBy('earnings')">
                            Earning
                            @if($sortField === 'earnings')
                                <span class="ml-1 opacity-60">{{ $sortDirection === 'asc' ? '▲' : '▼' }}</span>
                            @endif
                        </th>
                        <th class="p-3 text-left font-medium cursor-pointer select-none" wire:click="sortBy('status')">
                            Status
                            @if($sortField === 'status')
                                <span class="ml-1 opacity-60">{{ $sortDirection === 'asc' ? '▲' : '▼' }}</span>
                            @endif
                        </th>
                        <th class="p-3 text-left font-medium">Encoded By</th>
                        <th class="p-3 text-left font-medium cursor-pointer select-none" wire:click="sortBy('created_at')">
                            Created
                            @if($sortField === 'created_at')
                                <span class="ml-1 opacity-60">{{ $sortDirection === 'asc' ? '▲' : '▼' }}</span>
                            @endif
                        </th>
                        <th class="p-3 text-center font-medium">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($list as $row)
                        <tr class="border-b border-foreground/5">
                            <td class="p-3">{{ $row->earnings }}</td>
                            <td class="p-3">{{ $row->status }}</td>
                            <td class="p-3">{{ optional($row->user)->name ?? '—' }}</td>
                            <td class="p-3">{{ optional($row->created_at)->format('M d, Y h:i A') }}</td>
                            <td class="p-3 text-center">
                                <button 
                                    wire:click="openEditModal({{ $row->id }})"
                                    type="button"
                                    class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 bg-primary/20 border-primary/60 text-primary hover:bg-primary/5 h-8 px-3"
                                >
                                    Update
                                </button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-4 text-center opacity-70">No earnings found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        {{ $list->links() }}
    </div>

    <x-menu.modal :showButton="false" modalId="create-earning" title="Add Earning" description="Create a new earning" size="md" :isOpen="$showCreateModal">
        <div class="space-y-4">
            <div>
                <label class="text-sm font-medium">Earning</label>
                <input type="text" wire:model.defer="newEarning" class="w-full mt-1 h-10 rounded-md border bg-background px-3 py-2" placeholder="Enter earning name">
                @error('newEarning')
                    <div class="text-danger text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <x-slot:footer>
            <button wire:click="$set('showCreateModal', false)" data-tw-dismiss="modal" type="button" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 text-foreground hover:bg-foreground/5 bg-background border-foreground/20 h-10 px-4 py-2 mr-1 w-24">Cancel</button>
            <button wire:click="saveEarning" type="button" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 bg-(--color)/20 border-(--color)/60 text-(--color) hover:bg-(--color)/5 [--color:var(--color-primary)] h-10 px-4 py-2 w-24">Save</button>
        </x-slot:footer>
    </x-menu.modal>

    <x-menu.modal :showButton="false" modalId="edit-earning" title="Update Earning" description="Edit existing earning" size="md" :isOpen="$showEditModal">
        <div class="space-y-4">
            <div>
                <label class="text-sm font-medium">Earning</label>
                <input type="text" wire:model.defer="editEarningValue" class="w-full mt-1 h-10 rounded-md border bg-background px-3 py-2" placeholder="Enter earning name">
                @error('editEarningValue')
                    <div class="text-danger text-xs mt-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <x-slot:footer>
            <button wire:click="$set('showEditModal', false)" data-tw-dismiss="modal" type="button" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 text-foreground hover:bg-foreground/5 bg-background border-foreground/20 h-10 px-4 py-2 mr-1 w-24">Cancel</button>
            <button wire:click="updateEarning" type="button" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 bg-(--color)/20 border-(--color)/60 text-(--color) hover:bg-(--color)/5 [--color:var(--color-primary)] h-10 px-4 py-2 w-24">Update</button>
        </x-slot:footer>
    </x-menu.modal>

    <x-menu.modal :showButton="false" modalId="success-modal" title="Success" description="Action completed" size="sm" :isOpen="$showSuccessModal">
        <div class="space-y-2">
            <div class="text-sm">{{ $successMessage }}</div>
        </div>
        <x-slot:footer>
            <button wire:click="$set('showSuccessModal', false)" data-tw-dismiss="modal" type="button" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 text-foreground hover:bg-foreground/5 bg-background border-foreground/20 h-10 px-4 py-2 w-24">OK</button>
        </x-slot:footer>
    </x-menu.modal>
</div>


