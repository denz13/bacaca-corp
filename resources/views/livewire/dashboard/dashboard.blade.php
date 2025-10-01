<div>
    <x-menu.modal size="md" :showButton="false" modalId="refresh-modal" title="Refreshing...">
    </x-menu.modal>
    <div class="grid grid-cols-12 gap-8">
        <div class="col-span-12 2xl:col-span-9">
                @guest('students')
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="flex h-10 items-center">
                        <h2 class="me-5 truncate text-lg font-medium">General Report</h2>
                        <a id="open-modal" class="text-primary ms-auto flex items-center gap-3" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="refresh-ccw" class="lucide lucide-refresh-ccw size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25"><path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><path d="M3 3v5h5"></path><path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"></path><path d="M16 16h5v5"></path></svg>
                            Refresh
                        </a>
                    </div>
                    <div class="mt-5 grid grid-cols-12 gap-6">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3">
                            <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md cursor-pointer hover:shadow-lg transition-shadow" wire:click="showCardModal('total_votes')">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="circle-gauge" class="lucide lucide-circle-gauge size-4 stroke-(--color) fill-(--color)/25 h-7 w-7 stroke-1 drop-shadow [--color:var(--color-primary)]"><path d="M15.6 2.7a10 10 0 1 0 5.7 5.7"></path><circle cx="12" cy="12" r="2"></circle><path d="M13.4 10.6 19 5"></path></svg>
                                    <div class="ms-auto">
                                        <div class="bg-(--color)/20 border-(--color)/60 text-(--color) flex cursor-pointer items-center rounded-full border px-2 py-px text-xs tooltip pl-2 pr-1 [--color:var(--color-success)]" data-content="12% Higher than last month">
                                            12%
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-up" class="lucide lucide-chevron-up size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 ms-0.5"><path d="m18 15-6-6-6 6"></path></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6 text-2xl font-medium leading-8">{{ number_format($stats['total_votes']) }}</div>
                                <div class="mt-1.5 text-xs uppercase opacity-70">Total Votes Cast</div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3">
                            <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md cursor-pointer hover:shadow-lg transition-shadow" wire:click="showCardModal('total_candidates')">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="panel-bottom-close" class="lucide lucide-panel-bottom-close size-4 stroke-(--color) fill-(--color)/25 h-7 w-7 stroke-1 [--color:var(--color-pending)]"><rect width="18" height="18" x="3" y="3" rx="2"></rect><path d="M3 15h18"></path><path d="m15 8-3 3-3-3"></path></svg>
                                    <div class="ms-auto">
                                        <div class="bg-(--color)/20 border-(--color)/60 text-(--color) flex cursor-pointer items-center rounded-full border px-2 py-px text-xs tooltip pl-2 pr-1 [--color:var(--color-success)]" data-content="9% Higher than last month">
                                            9%
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-up" class="lucide lucide-chevron-up size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 ms-0.5"><path d="m18 15-6-6-6 6"></path></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6 text-2xl font-medium leading-8">{{ number_format($stats['total_candidates']) }}</div>
                                <div class="mt-1.5 text-xs uppercase opacity-70">Total Candidates</div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3">
                            <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md cursor-pointer hover:shadow-lg transition-shadow" wire:click="showCardModal('winners')">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="disc3" class="lucide lucide-disc3 size-4 stroke-(--color) fill-(--color)/25 h-7 w-7 stroke-1 [--color:var(--color-warning)]"><circle cx="12" cy="12" r="10"></circle><path d="M6 12c0-1.7.7-3.2 1.8-4.2"></path><circle cx="12" cy="12" r="2"></circle><path d="M18 12c0 1.7-.7 3.2-1.8 4.2"></path></svg>
                                    <div class="ms-auto">
                                        <div class="bg-(--color)/20 border-(--color)/60 text-(--color) flex cursor-pointer items-center rounded-full border px-2 py-px text-xs tooltip pl-2 pr-1 [--color:var(--color-danger)]" data-content="7% Lower than last month">
                                            7%
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-down" class="lucide lucide-chevron-down size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 ms-0.5"><path d="m6 9 6 6 6-6"></path></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6 text-2xl font-medium leading-8">{{ number_format($stats['winners']) }}</div>
                                <div class="mt-1.5 text-xs uppercase opacity-70">Election Winners</div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3">
                            <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md cursor-pointer hover:shadow-lg transition-shadow" wire:click="showCardModal('total_students')">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="album" class="lucide lucide-album size-4 stroke-(--color) fill-(--color)/25 h-7 w-7 stroke-1 [--color:var(--color-danger)]"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect><polyline points="11 3 11 11 14 8 17 11 17 3"></polyline></svg>
                                    <div class="ms-auto">
                                        <div class="bg-(--color)/20 border-(--color)/60 text-(--color) flex cursor-pointer items-center rounded-full border px-2 py-px text-xs tooltip pl-2 pr-1 [--color:var(--color-success)]" data-content="41% Higher than last month">
                                            41%
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-up" class="lucide lucide-chevron-up size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 ms-0.5"><path d="m18 15-6-6-6 6"></path></svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6 text-2xl font-medium leading-8">{{ number_format($stats['total_students']) }}</div>
                                <div class="mt-1.5 text-xs uppercase opacity-70">Total Students</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
                @endguest
                
                @guest('students')
                <!-- BEGIN: General Report -->
                <div class="col-span-12 mt-8 grid grid-cols-12 gap-6">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3">
                        <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md cursor-pointer hover:shadow-lg transition-shadow" wire:click="showCardModal('total_users')">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="users" class="lucide lucide-users size-4 stroke-(--color) fill-(--color)/25 h-7 w-7 stroke-1 drop-shadow [--color:var(--color-success)]"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                <div class="ms-auto">
                                    <div class="bg-(--color)/20 border-(--color)/60 text-(--color) flex cursor-pointer items-center rounded-full border px-2 py-px text-xs tooltip pl-2 pr-1 [--color:var(--color-success)]" data-content="{{ $stats['total_students'] > 0 ? round(($stats['total_users'] / $stats['total_students']) * 100) : 0 }}% of total students are users">
                                        {{ $stats['total_students'] > 0 ? round(($stats['total_users'] / $stats['total_students']) * 100) : 0 }}%
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-up" class="lucide lucide-chevron-up size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 ms-0.5"><path d="m18 15-6-6-6 6"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 text-2xl font-medium leading-8">{{ number_format($stats['total_users']) }}</div>
                            <div class="mt-1.5 text-xs uppercase opacity-70">Total Users</div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3">
                        <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md cursor-pointer hover:shadow-lg transition-shadow" wire:click="showCardModal('total_voters')">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="users" class="lucide lucide-users size-4 stroke-(--color) fill-(--color)/25 h-7 w-7 stroke-1 drop-shadow [--color:var(--color-primary)]"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M22 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                <div class="ms-auto">
                                    <div class="bg-(--color)/20 border-(--color)/60 text-(--color) flex cursor-pointer items-center rounded-full border px-2 py-px text-xs tooltip pl-2 pr-1 [--color:var(--color-success)]" data-content="{{ $stats['total_students'] > 0 ? round(($stats['total_voters'] / $stats['total_students']) * 100) : 0 }}% of students have voted">
                                        {{ $stats['total_students'] > 0 ? round(($stats['total_voters'] / $stats['total_students']) * 100) : 0 }}%
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-up" class="lucide lucide-chevron-up size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 ms-0.5"><path d="m18 15-6-6-6 6"></path></svg>
                                </div>
                                </div>
                            </div>
                            <div class="mt-6 text-2xl font-medium leading-8">{{ number_format($stats['total_voters']) }}</div>
                            <div class="mt-1.5 text-xs uppercase opacity-70">Total Voters</div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3">
                        <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md cursor-pointer hover:shadow-lg transition-shadow" wire:click="showCardModal('total_courses')">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="book-open" class="lucide lucide-book-open size-4 stroke-(--color) fill-(--color)/25 h-7 w-7 stroke-1 drop-shadow [--color:var(--color-warning)]"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                                <div class="ms-auto">
                                    <div class="bg-(--color)/20 border-(--color)/60 text-(--color) flex cursor-pointer items-center rounded-full border px-2 py-px text-xs tooltip pl-2 pr-1 [--color:var(--color-success)]" data-content="{{ $stats['total_courses'] > 0 ? round(($stats['active_courses'] / $stats['total_courses']) * 100) : 0 }}% of courses are active">
                                        {{ $stats['total_courses'] > 0 ? round(($stats['active_courses'] / $stats['total_courses']) * 100) : 0 }}%
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-up" class="lucide lucide-chevron-up size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 ms-0.5"><path d="m18 15-6-6-6 6"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 text-2xl font-medium leading-8">{{ number_format($stats['total_courses']) }}</div>
                            <div class="mt-1.5 text-xs uppercase opacity-70">Total Courses</div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3">
                        <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md cursor-pointer hover:shadow-lg transition-shadow" wire:click="showCardModal('total_meetings')">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="calendar" class="lucide lucide-calendar size-4 stroke-(--color) fill-(--color)/25 h-7 w-7 stroke-1 drop-shadow [--color:var(--color-danger)]"><path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path></svg>
                                <div class="ms-auto">
                                    <div class="bg-(--color)/20 border-(--color)/60 text-(--color) flex cursor-pointer items-center rounded-full border px-2 py-px text-xs tooltip pl-2 pr-1 [--color:var(--color-success)]" data-content="{{ $stats['total_meetings'] > 0 ? round(($stats['active_meetings'] / $stats['total_meetings']) * 100) : 0 }}% of meetings are active">
                                        {{ $stats['total_meetings'] > 0 ? round(($stats['active_meetings'] / $stats['total_meetings']) * 100) : 0 }}%
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-up" class="lucide lucide-chevron-up size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 ms-0.5"><path d="m18 15-6-6-6 6"></path></svg>
                            </div>
                                </div>
                            </div>
                            <div class="mt-6 text-2xl font-medium leading-8">{{ number_format($stats['total_meetings']) }}</div>
                            <div class="mt-1.5 text-xs uppercase opacity-70">Total Meetings</div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
                @endguest
                
                @auth('students')
                <!-- BEGIN: General Report for Students -->
                <div class="col-span-12 mt-8">
                    <div class="flex h-10 items-center">
                        <h2 class="me-5 truncate text-lg font-medium">Partylist Overview</h2>
                    </div>
                    <div class="mt-5 grid grid-cols-12 gap-6">
                        @foreach($partylists as $partylist)
                        <div class="col-span-12 sm:col-span-6 xl:col-span-3">
                            <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md cursor-pointer" 
                                 wire:click="viewPartylistCandidacies({{ $partylist->id }})">
                                <div class="flex">
                                    @if($partylist->partylist_image)
                                        <img src="{{ asset('storage/' . $partylist->partylist_image) }}" 
                                             alt="{{ $partylist->partylist_name }}" 
                                             class="w-8 h-8 rounded-full object-cover">
                                    @else
                                        <div class="w-8 h-8 bg-primary/20 rounded-full flex items-center justify-center text-primary font-semibold text-xs">
                                            {{ strtoupper(substr($partylist->partylist_name, 0, 2)) }}
                                        </div>
                                    @endif
                                    <div class="ms-auto">
                                        <div class="bg-(--color)/20 border-(--color)/60 text-(--color) flex cursor-pointer items-center rounded-full border px-2 py-px text-xs tooltip pl-2 pr-1 [--color:var(--color-primary)]" 
                                             data-content="{{ $partylist->applied_candidacies->count() }} candidates">
                                            {{ $partylist->applied_candidacies->count() }}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="users" class="lucide lucide-users size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 ms-0.5">
                                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="9" cy="7" r="4"></circle>
                                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6 text-2xl font-medium leading-8">{{ $partylist->partylist_name }}</div>
                                <div class="mt-1.5 text-xs uppercase opacity-70">Partylist</div>
                                @if($partylist->description)
                                <div class="mt-2 text-xs text-gray-600">{{ Str::limit($partylist->description, 50) }}</div>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- END: General Report for Students -->
                @endauth
                
                <!-- BEGIN: Weekly Top Products -->
                <div class="col-span-12 mt-6">
                    <div class="block h-10 items-center sm:flex">
                        <h2 class="me-5 truncate text-lg font-medium">
                            Election Results Overview
                        </h2>
                        <!-- <div class="mt-3 flex items-center sm:ms-auto sm:mt-0">
                            <button class="[--color:var(--color-foreground)] cursor-pointer border justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 bg-background h-10 px-4 py-2 box flex items-center border-inherit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="file-text" class="lucide lucide-file-text size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 me-2 hidden sm:block"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path><path d="M14 2v4a2 2 0 0 0 2 2h4"></path><path d="M10 9H8"></path><path d="M16 13H8"></path><path d="M16 17H8"></path></svg>
                                Export to Excel
                            </button>
                            <button class="[--color:var(--color-foreground)] cursor-pointer border justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 bg-background h-10 px-4 py-2 box ms-3 flex items-center border-inherit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="file-text" class="lucide lucide-file-text size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 me-2 hidden sm:block"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path><path d="M14 2v4a2 2 0 0 0 2 2h4"></path><path d="M10 9H8"></path><path d="M16 13H8"></path><path d="M16 17H8"></path></svg>
                                Export to PDF
                            </button>
                        </div> -->
                    </div>
                    <div class="mt-8 overflow-auto sm:mt-0 lg:overflow-visible">
                        <div class="relative w-full overflow-auto">
                            <table class="w-full caption-bottom border-separate border-spacing-y-[10px] sm:mt-2">
                                <thead class="[&amp;_tr]:border-b-0 [&amp;_tr_th]:h-10">
                                    <tr class="transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted border-b-0">
                                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                            CANDIDATE
                                        </th>
                                        <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                            POSITION
                                        </th>
                                        <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 text-center">
                                            VOTES
                                        </th>
                                        <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 text-center">
                                            STATUS
                                        </th>
                                        <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 text-center">
                                            COURSE
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="[&amp;_tr:last-child]:border-0">
                                    @forelse($topCandidates as $candidate)
                                        @php
                                            $student = $candidate->student;
                                            $position = $candidate->appliedCandidacy->position ?? null;
                                            $course = $student->course ?? null;
                                        @endphp
                                    <tr class="transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted border-b-0">
                                        <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                                <div class="flex items-center">
                                                    <span class="block relative size-11 flex-none overflow-hidden rounded-full border-3 ring-1 ring-primary/25 bg-background">
                                                        @php
                                                            $imageSrc = asset('images/placeholders/placeholder.jpg'); // Default placeholder
                                                            
                                                            // Check profile_image field first (profile_pictures folder)
                                                            if ($student->profile_image) {
                                                                if (file_exists(public_path('storage/' . $student->profile_image))) {
                                                                    $imageSrc = asset('storage/' . $student->profile_image);
                                                                }
                                                            }
                                                            
                                                            // If no profile_image or file doesn't exist, check student_images directory
                                                            if ($imageSrc === asset('images/placeholders/placeholder.jpg')) {
                                                                $studentImagesPath = storage_path('app/public/student_images/');
                                                                
                                                                // Look for profile images with student ID
                                                                $profilePattern = $studentImagesPath . '*_profile_*' . $student->id . '*';
                                                                $profileFiles = glob($profilePattern);
                                                                
                                                                if (!empty($profileFiles)) {
                                                                    $profileFile = basename($profileFiles[0]);
                                                                    $imageSrc = asset('storage/student_images/' . $profileFile);
                                                                } else {
                                                                    // Look for ID images as fallback
                                                                    $idPattern = $studentImagesPath . '*_id_*' . $student->id . '*';
                                                                    $idFiles = glob($idPattern);
                                                                    
                                                                    if (!empty($idFiles)) {
                                                                        $idFile = basename($idFiles[0]);
                                                                        $imageSrc = asset('storage/student_images/' . $idFile);
                                                                    }
                                                                }
                                                            }
                                                        @endphp
                                                        @if($imageSrc !== asset('images/placeholders/placeholder.jpg'))
                                                            <img class="absolute top-0 size-full object-cover" src="{{ $imageSrc }}" alt="{{ $student->first_name }} {{ $student->last_name }}">
                                                        @else
                                                            <div class="absolute top-0 size-full bg-primary/20 flex items-center justify-center text-primary font-semibold">
                                                                {{ strtoupper(substr($student->first_name, 0, 1)) }}{{ strtoupper(substr($student->last_name, 0, 1)) }}
                                                            </div>
                                                        @endif
                                                </span>
                                                    <div class="ms-3">
                                                        <div class="font-medium">{{ $student->first_name }} {{ $student->last_name }}</div>
                                                        <div class="text-xs opacity-70">{{ $student->student_id }}</div>
                                            </div>
                                            </div>
                                        </td>
                                        <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                                <div class="font-medium">{{ $position->position_name ?? 'N/A' }}</div>
                                                <div class="text-xs opacity-70">Position</div>
                                        </td>
                                        <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r text-center">
                                                <span class="font-semibold text-lg">{{ $candidate->number_of_vote }}</span>
                                        </td>
                                        <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                            <div class="flex items-center justify-center">
                                                    @if($candidate->status === 'win')
                                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            Winner
                                                </span>
                                                    @elseif($candidate->status === 'loss')
                                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            Lost
                                                </span>
                                                    @else
                                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                                                            </svg>
                                                            {{ ucfirst($candidate->status) }}
                                                </span>
                                                    @endif
                                            </div>
                                        </td>
                                        <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                                <div class="text-center">
                                                    <div class="font-medium">{{ $course->course_name ?? 'N/A' }}</div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr class="transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted border-b-0">
                                            <td colspan="5" class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-8 align-middle text-center border-y border-foreground/10 bg-background">
                                                <div class="text-gray-500">
                                                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                    </svg>
                                                    <h3 class="text-sm font-medium text-gray-900 mb-1">No Candidates Found</h3>
                                                    <p class="text-sm text-gray-500">There are currently no candidates in the system.</p>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <x-menu.pagination :paginator="$appointments" :perPageOptions="[10, 25, 35, 50]" />
                </div>
                <!-- END: Weekly Top Products -->
        </div>
        <div class="col-span-12 2xl:col-span-3">
            <div class="-mb-10 h-full pb-10 2xl:border-l">
                <div class="grid grid-cols-12 gap-x-6 gap-y-6 2xl:gap-x-0 2xl:pl-6">
                    <!-- BEGIN: Transactions -->
                    <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-4 2xl:col-span-12 2xl:mt-8">
                        <div class="flex h-10 items-center">
                            <h2 class="me-5 truncate text-lg font-medium">Voting Transactions</h2>
                        </div>
                        <div class="mt-5">
                            @forelse($votingTransactions as $transaction)
                            <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md mb-3 flex items-center px-5 py-3 before:hidden">
                                    <span data-content="" class="tooltip border-(--color)/5 block relative size-11 flex-none overflow-hidden rounded-full border-3 ring-1 ring-(--color)/25 [--color:var(--color-success)]">
                                        @php
                                            $imageSrc = asset('images/placeholders/placeholder.jpg'); // Default placeholder
                                            
                                            // Check profile_image field first (profile_pictures folder)
                                            if ($transaction->student && $transaction->student->profile_image) {
                                                if (file_exists(public_path('storage/' . $transaction->student->profile_image))) {
                                                    $imageSrc = asset('storage/' . $transaction->student->profile_image);
                                                }
                                            }
                                            
                                            // If no profile_image or file doesn't exist, check student_images directory
                                            if ($imageSrc === asset('images/placeholders/placeholder.jpg') && $transaction->student) {
                                                $studentImagesPath = storage_path('app/public/student_images/');
                                                
                                                // Look for profile images with student ID
                                                $profilePattern = $studentImagesPath . '*_profile_*' . $transaction->student->id . '*';
                                                $profileFiles = glob($profilePattern);
                                                
                                                if (!empty($profileFiles)) {
                                                    $profileFile = basename($profileFiles[0]);
                                                    $imageSrc = asset('storage/student_images/' . $profileFile);
                                                } else {
                                                    // Look for ID images as fallback
                                                    $idPattern = $studentImagesPath . '*_id_*' . $transaction->student->id . '*';
                                                    $idFiles = glob($idPattern);
                                                    
                                                    if (!empty($idFiles)) {
                                                        $idFile = basename($idFiles[0]);
                                                        $imageSrc = asset('storage/student_images/' . $idFile);
                                                    }
                                                }
                                            }
                                        @endphp
                                        @if($imageSrc !== asset('images/placeholders/placeholder.jpg'))
                                            <img class="absolute top-0 size-full object-cover" src="{{ $imageSrc }}" alt="{{ $transaction->student->first_name ?? 'Unknown' }} {{ $transaction->student->last_name ?? 'Student' }}">
                                        @else
                                            <div class="absolute top-0 size-full bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center text-white font-semibold text-sm">
                                                {{ strtoupper(substr($transaction->student->first_name ?? 'U', 0, 1)) }}{{ strtoupper(substr($transaction->student->last_name ?? 'N', 0, 1)) }}
                                    </div>
                                        @endif
                                </span>
                                <div class="me-auto ms-4">
                                        <div class="font-medium">{{ $transaction->student->first_name ?? 'Unknown' }} {{ $transaction->student->last_name ?? 'Student' }}</div>
                                    <div class="mt-1 text-xs opacity-70">
                                            {{ $transaction->created_at->format('M d, Y g:i A') }}
                                            @if($transaction->student && $transaction->student->course)
                                                • {{ $transaction->student->course->course_name }}
                                            @endif
                            </div>
                                    </div>
                                    <div class="text-success flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1">
                                            <path d="M9 12l2 2 4-4"></path>
                                            <path d="M21 12c.552 0 1-.448 1-1V8c0-.552-.448-1-1-1h-3.5l-1-1h-5l-1 1H3c-.552 0-1 .448-1 1v3c0 .552.448 1 1 1h18z"></path>
                                        </svg>
                                        Voted
                                    </div>
                                </div>
                            @empty
                                <div class="box relative p-8 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md text-center">
                                    <div class="text-gray-500">
                                        <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                        <h3 class="text-sm font-medium text-gray-900 mb-1">No Voting Transactions</h3>
                                        <p class="text-sm text-gray-500">No voting activity has been recorded yet.</p>
                                    </div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <!-- END: Transactions -->
                    <!-- BEGIN: Recent Activities -->
                    <!-- <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-4 2xl:col-span-12">
                        <div class="flex h-10 items-center">
                            <h2 class="me-5 truncate text-lg font-medium">
                                Recent Activities
                            </h2>
                            <a class="text-primary ms-auto truncate" href=""> Show More </a>
                        </div>
                        <div class="before:bg-foreground/10 relative mt-5 before:absolute before:ms-5 before:mt-5 before:block before:h-[85%] before:w-px">
                            <div class="relative mb-3 flex items-center">
                                <div class="before:bg-foreground/10 before:absolute before:ms-5 before:mt-5 before:block before:h-px before:w-20">
                                    <span data-content="" class="tooltip border-(--color)/5 block relative size-11 flex-none overflow-hidden rounded-full border-3 ring-1 ring-(--color)/25 [--color:var(--color-primary)]">
                                        <img class="absolute top-0 size-full object-cover" src="dist/images/fakers/profile-8.jpg" alt="Midone - Tailwind Admin Dashboard Template">
                                    </span>
                                </div>
                                <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md z-10 ms-4 flex-1 px-5 py-3 before:hidden">
                                    <div class="flex items-center">
                                        <div class="font-medium">
                                            Brad Pitt
                                        </div>
                                        <div class="ms-auto text-xs opacity-70">07:00 PM</div>
                                    </div>
                                    <div class="mt-1 opacity-70">Has joined the team</div>
                                </div>
                            </div>
                            <div class="relative mb-3 flex items-center">
                                <div class="before:bg-foreground/10 before:absolute before:ms-5 before:mt-5 before:block before:h-px before:w-20">
                                    <span data-content="" class="tooltip border-(--color)/5 block relative size-11 flex-none overflow-hidden rounded-full border-3 ring-1 ring-(--color)/25 [--color:var(--color-primary)]">
                                        <img class="absolute top-0 size-full object-cover" src="dist/images/fakers/profile-13.jpg" alt="Midone - Tailwind Admin Dashboard Template">
                                    </span>
                                </div>
                                <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md z-10 ms-4 flex-1 px-5 py-3 before:hidden">
                                    <div class="flex items-center">
                                        <div class="font-medium">
                                            Charlize Theron
                                        </div>
                                        <div class="ms-auto text-xs opacity-70">07:00 PM</div>
                                    </div>
                                    <div>
                                        <div class="mt-1 opacity-70">Added 3 new photos</div>
                                        <div class="mt-2 flex gap-2">
                                            <span data-content="" class="tooltip border-(--color)/5 block relative flex-none overflow-hidden border-3 ring-(--color)/25 [--color:var(--color-primary)] size-8 rounded-lg border-none ring-0">
                                                <img class="absolute top-0 size-full object-cover" src="dist/images/fakers/profile-8.jpg" alt="Midone - Tailwind Admin Dashboard Template">
                                            </span>
                                            <span data-content="" class="tooltip border-(--color)/5 block relative flex-none overflow-hidden border-3 ring-(--color)/25 [--color:var(--color-primary)] size-8 rounded-lg border-none ring-0">
                                                <img class="absolute top-0 size-full object-cover" src="dist/images/fakers/profile-6.jpg" alt="Midone - Tailwind Admin Dashboard Template">
                                            </span>
                                            <span data-content="" class="tooltip border-(--color)/5 block relative flex-none overflow-hidden border-3 ring-(--color)/25 [--color:var(--color-primary)] size-8 rounded-lg border-none ring-0">
                                                <img class="absolute top-0 size-full object-cover" src="dist/images/fakers/profile-7.jpg" alt="Midone - Tailwind Admin Dashboard Template">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-4 text-center text-xs opacity-70">
                                12 November
                            </div>
                            <div class="relative mb-3 flex items-center">
                                <div class="before:bg-foreground/10 before:absolute before:ms-5 before:mt-5 before:block before:h-px before:w-20">
                                    <span data-content="" class="tooltip border-(--color)/5 block relative size-11 flex-none overflow-hidden rounded-full border-3 ring-1 ring-(--color)/25 [--color:var(--color-primary)]">
                                        <img class="absolute top-0 size-full object-cover" src="dist/images/fakers/profile-2.jpg" alt="Midone - Tailwind Admin Dashboard Template">
                                    </span>
                                </div>
                                <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md z-10 ms-4 flex-1 px-5 py-3 before:hidden">
                                    <div class="flex items-center">
                                        <div class="font-medium">
                                            Denzel Washington
                                        </div>
                                        <div class="ms-auto text-xs opacity-70">07:00 PM</div>
                                    </div>
                                    <div class="mt-1 opacity-70">
                                        Has changed
                                        <a class="text-primary" href="">
                                            Nikon Z6
                                        </a>
                                        price and description
                                    </div>
                                </div>
                            </div>
                            <div class="relative mb-3 flex items-center">
                                <div class="before:bg-foreground/10 before:absolute before:ms-5 before:mt-5 before:block before:h-px before:w-20">
                                    <span data-content="" class="tooltip border-(--color)/5 block relative size-11 flex-none overflow-hidden rounded-full border-3 ring-1 ring-(--color)/25 [--color:var(--color-primary)]">
                                        <img class="absolute top-0 size-full object-cover" src="dist/images/fakers/profile-8.jpg" alt="Midone - Tailwind Admin Dashboard Template">
                                    </span>
                                </div>
                                <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md z-10 ms-4 flex-1 px-5 py-3 before:hidden">
                                    <div class="flex items-center">
                                        <div class="font-medium">
                                            Leonardo DiCaprio
                                        </div>
                                        <div class="ms-auto text-xs opacity-70">07:00 PM</div>
                                    </div>
                                    <div class="mt-1 opacity-70">
                                        Has changed
                                        <a class="text-primary" href="">
                                            Sony A7 III
                                        </a>
                                        description
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- END: Recent Activities -->
                   
                  
                </div>
            </div>
        </div>
   
    <div data-tw-backdrop="" class="modal group bg-black/60 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&amp;:not(.show)]:duration-[0s,0.2s] [&amp;:not(.show)]:delay-[0.2s,0s] [&amp;:not(.show)]:invisible [&amp;:not(.show)]:opacity-0 [&amp;.show]:visible [&amp;.show]:opacity-100 [&amp;.show]:duration-[0s,0.4s]" id="onboarding-dialog" aria-hidden="true">
        <div class="box relative before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:z-[-1] after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:z-[-1] after:backdrop-blur-md before:bg-background/60 dark:before:shadow-background before:shadow-foreground/60 z-50 mx-auto -mt-16 p-6 transition-[margin-top,transform] duration-[0.4s,0.3s] before:rounded-3xl before:shadow-2xl after:rounded-3xl group-[.show]:mt-16 group-[.modal-static]:scale-[1.05] sm:max-w-xl">
            <a class="bg-background/80 hover:bg-background absolute right-0 top-0 -mr-3 -mt-3 flex size-9 items-center justify-center rounded-full border shadow outline-none backdrop-blur" data-tw-dismiss="modal" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="x" class="lucide lucide-x stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 size-5 opacity-70"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg>
            </a>
            <div class="-mx-3 pb-5">
                <div class="tns-outer" id="tns2-ow"><div class="tns-nav" aria-label="Carousel Pagination"><button type="button" data-nav="0" aria-controls="tns2" style="" aria-label="Carousel Page 1" class="" tabindex="-1"></button><button type="button" data-nav="1" aria-controls="tns2" style="" aria-label="Carousel Page 2 (Current Slide)" class="tns-nav-active"></button></div><button type="button" data-action="stop"><span class="tns-visually-hidden">stop animation</span>stop</button><div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">4</span>  of 2</div><div id="tns2-mw" class="tns-ovh"><div class="tns-inner" id="tns2-iw"><div data-config="{
    nav: true
}" class="tiny-slider mb-11 mt-2  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" id="tns2" style="transform: translate3d(-50%, 0px, 0px); transition-duration: 0s;"><div class="relative mx-3 flex flex-col items-center gap-1 px-3.5 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                        <div class="w-full bg-primary/[.05] mb-7 border-primary/10 shadow-lg shadow-black/10 relative rounded-3xl border h-52 overflow-hidden before:bg-noise before:absolute before:inset-0 before:opacity-30 after:bg-accent after:absolute after:inset-0 after:opacity-30 after:blur-2xl">
                            <img class="absolute inset-0 mx-auto mt-10 w-2/5 scale-125" src="dist/images/phone-illustration.svg" alt="Midone - Tailwind Admin Dashboard Template">
                        </div>
                        <div class="px-8">
                            <div class="text-center text-xl font-medium">Welcome to Midone Admin!</div>
                            <div class="mt-3 text-center text-base leading-relaxed opacity-70">
                                Premium admin dashboard template for all kinds <br> of projects.
                                With a unique and modern design, Midone offers the perfect foundation to build professional
                                applications with ease.
                            </div>
                        </div>
                        <div class="absolute inset-x-0 bottom-0 -mb-12 flex place-content-between px-5">
                            <a class="text-danger flex items-center gap-3 font-medium" data-tw-dismiss="modal" href="">
                                Skip Intro
                            </a>
                            <a class="text-primary flex items-center gap-3 font-medium" href="">
                                Next <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="move-right" class="lucide lucide-move-right size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25"><path d="M18 8L22 12L18 16"></path><path d="M2 12H22"></path></svg>
                            </a>
                        </div>
                    </div><div class="relative mx-3 flex flex-col items-center gap-1 px-3.5 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                        <div class="w-full bg-primary/[.05] mb-7 border-primary/10 shadow-lg shadow-black/10 relative rounded-3xl border h-52 overflow-hidden before:bg-noise before:absolute before:inset-0 before:opacity-30 after:bg-accent after:absolute after:inset-0 after:opacity-30 after:blur-2xl">
                            <img class="absolute inset-0 mx-auto mt-10 w-2/5 scale-125" src="dist/images/woman-illustration.svg" alt="Midone - Tailwind Admin Dashboard Template">
                        </div>
                        <div class="w-full">
                            <div class="text-center text-xl font-medium">Example Request Information</div>
                            <div class="mt-3 text-center text-base leading-relaxed opacity-70">
                                Your premium admin dashboard template.
                            </div>
                            <div class="mt-8">
                                <div class="grid grid-cols-2 gap-5 px-5">
                                    <div class="flex flex-col gap-2.5"><label class="font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Full Name</label>
                                        <input type="text" placeholder="John Doe" class="h-10 w-full rounded-md border bg-background px-3 py-2 ring-offset-background file:border-0 file:bg-transparent file:font-medium file:text-foreground placeholder:text-foreground/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                                    </div>
                                    <div class="flex flex-col gap-2.5"><label class="font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Event</label>
                                        <select class="bg-(image:--background-image-chevron) bg-[position:calc(100%-theme(spacing.3))_center] bg-[size:theme(spacing.5)] bg-no-repeat relative appearance-none flex h-10 w-full rounded-md border bg-background px-3 py-2 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                                            <option>Corporate Event</option>
                                            <option>Wedding</option>
                                            <option>Birthday</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute inset-x-0 bottom-0 -mb-12 flex place-content-between px-5">
                            <a class="text-primary flex items-center gap-3 font-medium" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="move-left" class="lucide lucide-move-left size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25"><path d="M6 8L2 12L6 16"></path><path d="M2 12H22"></path></svg>
                                Previous
                            </a>
                        </div>
                    </div>
                    <div class="relative mx-3 flex flex-col items-center gap-1 px-3.5 tns-item" id="tns2-item0" aria-hidden="true" tabindex="-1">
                        <div class="w-full bg-primary/[.05] mb-7 border-primary/10 shadow-lg shadow-black/10 relative rounded-3xl border h-52 overflow-hidden before:bg-noise before:absolute before:inset-0 before:opacity-30 after:bg-accent after:absolute after:inset-0 after:opacity-30 after:blur-2xl">
                            <img class="absolute inset-0 mx-auto mt-10 w-2/5 scale-125" src="dist/images/phone-illustration.svg" alt="Midone - Tailwind Admin Dashboard Template">
                        </div>
                        <div class="px-8">
                            <div class="text-center text-xl font-medium">Welcome to Midone Admin!</div>
                            <div class="mt-3 text-center text-base leading-relaxed opacity-70">
                                Premium admin dashboard template for all kinds <br> of projects.
                                With a unique and modern design, Midone offers the perfect foundation to build professional
                                applications with ease.
                            </div>
                        </div>
                        <div class="absolute inset-x-0 bottom-0 -mb-12 flex place-content-between px-5">
                            <a class="text-danger flex items-center gap-3 font-medium" data-tw-dismiss="modal" href="">
                                Skip Intro
                            </a>
                            <a class="text-primary flex items-center gap-3 font-medium" href="">
                                Next <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="move-right" class="lucide lucide-move-right size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25"><path d="M18 8L22 12L18 16"></path><path d="M2 12H22"></path></svg>
                            </a>
                        </div>
                    </div>
                    <div class="relative mx-3 flex flex-col items-center gap-1 px-3.5 tns-item tns-slide-active" id="tns2-item1">
                        <div class="w-full bg-primary/[.05] mb-7 border-primary/10 shadow-lg shadow-black/10 relative rounded-3xl border h-52 overflow-hidden before:bg-noise before:absolute before:inset-0 before:opacity-30 after:bg-accent after:absolute after:inset-0 after:opacity-30 after:blur-2xl">
                            <img class="absolute inset-0 mx-auto mt-10 w-2/5 scale-125" src="dist/images/woman-illustration.svg" alt="Midone - Tailwind Admin Dashboard Template">
                        </div>
                        <div class="w-full">
                            <div class="text-center text-xl font-medium">Example Request Information</div>
                            <div class="mt-3 text-center text-base leading-relaxed opacity-70">
                                Your premium admin dashboard template.
                            </div>
                            <div class="mt-8">
                                <div class="grid grid-cols-2 gap-5 px-5">
                                    <div class="flex flex-col gap-2.5"><label class="font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Full Name</label>
                                        <input type="text" placeholder="John Doe" class="h-10 w-full rounded-md border bg-background px-3 py-2 ring-offset-background file:border-0 file:bg-transparent file:font-medium file:text-foreground placeholder:text-foreground/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                                    </div>
                                    <div class="flex flex-col gap-2.5"><label class="font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Event</label>
                                        <select class="bg-(image:--background-image-chevron) bg-[position:calc(100%-theme(spacing.3))_center] bg-[size:theme(spacing.5)] bg-no-repeat relative appearance-none flex h-10 w-full rounded-md border bg-background px-3 py-2 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                                            <option>Corporate Event</option>
                                            <option>Wedding</option>
                                            <option>Birthday</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute inset-x-0 bottom-0 -mb-12 flex place-content-between px-5">
                            <a class="text-primary flex items-center gap-3 font-medium" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="move-left" class="lucide lucide-move-left size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25"><path d="M6 8L2 12L6 16"></path><path d="M2 12H22"></path></svg>
                                Previous
                            </a>
                        </div>
                    </div>
                <div class="relative mx-3 flex flex-col items-center gap-1 px-3.5 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                        <div class="w-full bg-primary/[.05] mb-7 border-primary/10 shadow-lg shadow-black/10 relative rounded-3xl border h-52 overflow-hidden before:bg-noise before:absolute before:inset-0 before:opacity-30 after:bg-accent after:absolute after:inset-0 after:opacity-30 after:blur-2xl">
                            <img class="absolute inset-0 mx-auto mt-10 w-2/5 scale-125" src="dist/images/phone-illustration.svg" alt="Midone - Tailwind Admin Dashboard Template">
                        </div>
                        <div class="px-8">
                            <div class="text-center text-xl font-medium">Welcome to Midone Admin!</div>
                            <div class="mt-3 text-center text-base leading-relaxed opacity-70">
                                Premium admin dashboard template for all kinds <br> of projects.
                                With a unique and modern design, Midone offers the perfect foundation to build professional
                                applications with ease.
                            </div>
                        </div>
                        <div class="absolute inset-x-0 bottom-0 -mb-12 flex place-content-between px-5">
                            <a class="text-danger flex items-center gap-3 font-medium" data-tw-dismiss="modal" href="">
                                Skip Intro
                            </a>
                            <a class="text-primary flex items-center gap-3 font-medium" href="">
                                Next <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="move-right" class="lucide lucide-move-right size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25"><path d="M18 8L22 12L18 16"></path><path d="M2 12H22"></path></svg>
                            </a>
                        </div>
                    </div><div class="relative mx-3 flex flex-col items-center gap-1 px-3.5 tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                        <div class="w-full bg-primary/[.05] mb-7 border-primary/10 shadow-lg shadow-black/10 relative rounded-3xl border h-52 overflow-hidden before:bg-noise before:absolute before:inset-0 before:opacity-30 after:bg-accent after:absolute after:inset-0 after:opacity-30 after:blur-2xl">
                            <img class="absolute inset-0 mx-auto mt-10 w-2/5 scale-125" src="dist/images/woman-illustration.svg" alt="Midone - Tailwind Admin Dashboard Template">
                        </div>
                        <div class="w-full">
                            <div class="text-center text-xl font-medium">Example Request Information</div>
                            <div class="mt-3 text-center text-base leading-relaxed opacity-70">
                                Your premium admin dashboard template.
                            </div>
                            <div class="mt-8">
                                <div class="grid grid-cols-2 gap-5 px-5">
                                    <div class="flex flex-col gap-2.5"><label class="font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Full Name</label>
                                        <input type="text" placeholder="John Doe" class="h-10 w-full rounded-md border bg-background px-3 py-2 ring-offset-background file:border-0 file:bg-transparent file:font-medium file:text-foreground placeholder:text-foreground/70 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                                    </div>
                                    <div class="flex flex-col gap-2.5"><label class="font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70">Event</label>
                                        <select class="bg-(image:--background-image-chevron) bg-[position:calc(100%-theme(spacing.3))_center] bg-[size:theme(spacing.5)] bg-no-repeat relative appearance-none flex h-10 w-full rounded-md border bg-background px-3 py-2 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                                            <option>Corporate Event</option>
                                            <option>Wedding</option>
                                            <option>Birthday</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute inset-x-0 bottom-0 -mb-12 flex place-content-between px-5">
                            <a class="text-primary flex items-center gap-3 font-medium" href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="move-left" class="lucide lucide-move-left size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25"><path d="M6 8L2 12L6 16"></path><path d="M2 12H22"></path></svg>
                                Previous
                            </a>
                        </div>
                    </div></div></div></div></div>
            </div>
        </div>
    </div>

    <!-- Partylist Candidacies Modal -->
    @if($showPartylistModal)
    <x-menu.modal 
        :showButton="false" 
        modalId="partylist-candidacies-modal" 
        title="Partylist Candidates" 
        description="View all candidates from this partylist"
        size="3xl"
        :isOpen="$showPartylistModal">
        
        @if($selectedPartylist)
        <div class="space-y-6">
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                <h3 class="text-lg font-semibold text-blue-800">{{ $selectedPartylist->partylist_name }}</h3>
                @if($selectedPartylist->description)
                <p class="text-sm text-blue-600 mt-1">{{ $selectedPartylist->description }}</p>
                @endif
                <p class="text-sm text-blue-600 mt-2">
                    Total Candidates: <strong>{{ $selectedPartylist->applied_candidacies->count() }}</strong>
                </p>
            </div>

            @if($selectedPartylist->applied_candidacies->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($selectedPartylist->applied_candidacies as $candidacy)
                <div class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                    <div class="flex items-center space-x-3">
                        <div class="flex-shrink-0">
                            @php
                                $candidateImage = null;
                                if ($candidacy->students->profile_image && file_exists(public_path('storage/' . $candidacy->students->profile_image))) {
                                    $candidateImage = asset('storage/' . $candidacy->students->profile_image);
                                }
                            @endphp
                            
                            @if($candidateImage)
                                <img class="h-12 w-12 rounded-full object-cover" 
                                     src="{{ $candidateImage }}" 
                                     alt="{{ $candidacy->students->first_name }} {{ $candidacy->students->last_name }}"
                                     onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="h-12 w-12 rounded-full bg-primary/20 flex items-center justify-center text-primary font-semibold" style="display: none;">
                                    {{ strtoupper(substr($candidacy->students->first_name, 0, 1)) }}{{ strtoupper(substr($candidacy->students->last_name, 0, 1)) }}
                                </div>
                            @else
                                <div class="h-12 w-12 rounded-full bg-primary/20 flex items-center justify-center text-primary font-semibold">
                                    {{ strtoupper(substr($candidacy->students->first_name, 0, 1)) }}{{ strtoupper(substr($candidacy->students->last_name, 0, 1)) }}
                                </div>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <h4 class="text-sm font-medium text-gray-900 truncate">
                                {{ $candidacy->students->first_name }} {{ $candidacy->students->last_name }}
                            </h4>
                            <p class="text-sm text-gray-500 truncate">
                                {{ $candidacy->position->position_name ?? 'No Position' }}
                            </p>
                            <p class="text-xs text-gray-400 truncate">
                                {{ $candidacy->students->course->course_name ?? 'No Course' }}
                            </p>
                        </div>
                        <div class="flex-shrink-0">
                            @if($candidacy->status === 'approved')
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    Approved
                                </span>
                            @elseif($candidacy->status === 'pending')
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            @elseif($candidacy->status === 'rejected')
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                    Rejected
                                </span>
                            @else
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                    {{ ucfirst($candidacy->status) }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-8">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No candidates</h3>
                <p class="mt-1 text-sm text-gray-500">This partylist doesn't have any candidates yet.</p>
            </div>
            @endif
        </div>
        @endif

        <x-slot:footer>
            <button data-tw-dismiss="modal" type="button" wire:click="$set('showPartylistModal', false)" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 text-foreground hover:bg-foreground/5 bg-background border-foreground/20 h-10 px-4 py-2 w-24">
                Close
            </button>
        </x-slot:footer>
    </x-menu.modal>
    @endif

    <!-- Card Data Modal -->
    @if($showModal)
    <x-menu.modal 
        :showButton="false" 
        modalId="card-data-modal" 
        :title="$modalTitle" 
        :description="$modalDescription"
        size="3xl"
        :isOpen="$showModal">
        
        <div class="space-y-6">
            @if($modalData && count($modalData) > 0)
                @switch($modalType)
                    @case('total_votes')
                    @case('total_candidates')
                    @case('winners')
                        <div class="overflow-x-auto">
                            <table class="w-full border-collapse">
                                <thead>
                                    <tr class="border-b border-gray-200">
                                        <th class="text-left py-3 px-4 font-medium text-gray-700">Candidate</th>
                                        <th class="text-left py-3 px-4 font-medium text-gray-700">Position</th>
                                        <th class="text-center py-3 px-4 font-medium text-gray-700">Votes</th>
                                        <th class="text-center py-3 px-4 font-medium text-gray-700">Course</th>
                                        @if($modalType === 'winners')
                                        <th class="text-center py-3 px-4 font-medium text-gray-700">Winning Margin</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($modalData as $item)
                                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                                        <td class="py-3 px-4">{{ $item['candidate_name'] }}</td>
                                        <td class="py-3 px-4">{{ $item['position'] }}</td>
                                        <td class="py-3 px-4 text-center font-semibold">{{ $item['votes'] }}</td>
                                        <td class="py-3 px-4 text-center">{{ $item['course'] }}</td>
                                        @if($modalType === 'winners')
                                        <td class="py-3 px-4 text-center text-green-600 font-semibold">{{ $item['winning_margin'] }}</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @break
                        
                    @case('total_students')
                    @case('total_users')
                    @case('total_voters')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($modalData as $item)
                            <div class="border border-gray-200 rounded-lg p-4">
                                <h4 class="font-semibold text-gray-800 mb-2">{{ $item['course'] ?? $item['type'] }}</h4>
                                <div class="space-y-1 text-sm">
                                    <div class="flex justify-between">
                                        <span>Total:</span>
                                        <span class="font-medium">{{ $item['count'] ?? $item['voters_count'] ?? $item['unique_voters'] }}</span>
                                    </div>
                                    @if(isset($item['active']))
                                    <div class="flex justify-between">
                                        <span>Active:</span>
                                        <span class="text-green-600 font-medium">{{ $item['active'] }}</span>
                                    </div>
                                    @endif
                                    @if(isset($item['inactive']))
                                    <div class="flex justify-between">
                                        <span>Inactive:</span>
                                        <span class="text-red-600 font-medium">{{ $item['inactive'] }}</span>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @break
                        
                    @case('total_courses')
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($modalData as $course)
                            <div class="border border-gray-200 rounded-lg p-4">
                                <h4 class="font-semibold text-gray-800 mb-2">{{ $course['course_name'] }}</h4>
                                <div class="space-y-1 text-sm">
                                    <div class="flex justify-between">
                                        <span>Status:</span>
                                        <span class="font-medium capitalize">{{ $course['status'] }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Total Students:</span>
                                        <span class="font-medium">{{ $course['students_count'] }}</span>
                                    </div>
                                    <div class="flex justify-between">
                                        <span>Active Students:</span>
                                        <span class="text-green-600 font-medium">{{ $course['active_students'] }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        @break
                        
                    @case('total_meetings')
                        <div class="space-y-4">
                            @foreach($modalData as $meeting)
                            <div class="border border-gray-200 rounded-lg p-4">
                                <div class="flex justify-between items-start mb-2">
                                    <h4 class="font-semibold text-gray-800">{{ $meeting['title'] }}</h4>
                                    <span class="px-2 py-1 rounded-full text-xs font-medium 
                                        {{ $meeting['status'] === 'active' ? 'bg-green-100 text-green-800' : 
                                           ($meeting['status'] === 'completed' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800') }}">
                                        {{ ucfirst($meeting['status']) }}
                                    </span>
                                </div>
                                <p class="text-sm text-gray-600 mb-1">Date: {{ $meeting['date'] }}</p>
                                @if($meeting['description'])
                                <p class="text-sm text-gray-500">{{ $meeting['description'] }}</p>
                                @endif
                            </div>
                            @endforeach
                        </div>
                        @break
                @endswitch
            @else
                <div class="text-center py-8">
                    <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h3 class="text-sm font-medium text-gray-900 mb-1">No Data Available</h3>
                    <p class="text-sm text-gray-500">There is no data to display for this category.</p>
                </div>
            @endif
        </div>

        <x-slot:footer>
            <button data-tw-dismiss="modal" type="button" wire:click="$set('showModal', false)" class="cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 text-foreground hover:bg-foreground/5 bg-background border-foreground/20 h-10 px-4 py-2 w-24">
                Close
            </button>
        </x-slot:footer>
    </x-menu.modal>
    @endif
</div>
