<div class="rubick min-h-screen dark:bg-background before:bg-primary dark:before:bg-foreground/[.01] before:fixed before:inset-0 before:bg-noise after:bg-accent after:bg-contain after:fixed after:inset-0 after:blur-xl dark:after:opacity-20">
        <div class="side-menu text-background dark:text-foreground xl:ml-0 transition-[margin] duration-200 fixed top-0 left-0 z-50 group before:content-[''] before:fixed before:inset-0 before:bg-black/80 dark:before:bg-foreground/5 before:backdrop-blur before:xl:hidden after:content-[''] after:absolute after:inset-0 after:bg-primary after:xl:hidden dark:after:bg-background after:bg-noise [&.side-menu--mobile-menu-open]:ml-0 [&.side-menu--mobile-menu-open]:before:block -ml-[275px] before:hidden">
            <div class="close-mobile-menu fixed ml-[275px] xl:hidden z-50 cursor-pointer [&.close-mobile-menu--mobile-menu-open]:block hidden">
                <div class="ml-5 mt-5 flex size-10 items-center justify-center">
                    <i data-lucide="x" class="[--color:currentColor] stroke-(--color) fill-(--color)/25 size-7 stroke-1"></i>
                </div>
            </div>
            <div class="side-menu__content z-20 pt-5 pb-[7.5rem] relative w-[275px] duration-200 transition-[width] group-[.side-menu--collapsed]:xl:w-[110px] group-[.side-menu--collapsed.side-menu--on-hover]:xl:w-[275px] h-screen flex flex-col">
                <div class="relative z-10 hidden h-[65px] w-[275px] flex-none items-center overflow-hidden px-6 duration-200 xl:flex group-[.side-menu--collapsed.side-menu--on-hover]:xl:w-[275px] group-[.side-menu--collapsed]:xl:w-[110px]">
                    <a class="flex items-center transition-[margin] duration-200 xl:ml-2 group-[.side-menu--collapsed.side-menu--on-hover]:xl:ml-2 group-[.side-menu--collapsed]:xl:ml-6" href="">
                        @php
                            $sidebarLogo = \App\Models\system_settings::where('key', 'sidebar_logo')
                                ->where('type', 'image')
                                ->where('module_id', 1)
                                ->where('status', 'active')
                                ->first();
                            $logoPath = $sidebarLogo ? $sidebarLogo->value : 'dist/images/logo.svg';
                        @endphp
                        <img class="size-12" src="{{ asset($logoPath) }}">
                        <div class="ml-3.5 text-nowrap transition-opacity group-[.side-menu--collapsed.side-menu--on-hover]:xl:opacity-100 group-[.side-menu--collapsed]:xl:opacity-0">
                            @php
                                $sidebarTextLogo = \App\Models\system_settings::where('key', 'sidebar_text_logo')
                                    ->where('type', 'text')
                                    ->where('module_id', 2)
                                    ->where('status', 'active')
                                    ->first();
                                $textLogo = $sidebarTextLogo ? $sidebarTextLogo->value : 'Bacaca Corp';
                            @endphp
                            <span class="text-base font-medium">{{ $textLogo }}</span>
                        </div>
                    </a>
                </div>
                <div class="w-full h-full z-20 px-4 overflow-y-auto overflow-x-hidden pb-3 [&:-webkit-scrollbar]:w-0 scroll-smooth [&_.simplebar-scrollbar]:before:!bg-background/70 [-webkit-mask-image:_linear-gradient(to_top,_rgba(0,_0,_0,_0),_black_30px),_linear-gradient(to_bottom,_rgba(0,_0,_0,_0),_black_30px)] [-webkit-mask-composite:_destination-in]" x-scroll data-simplebar data-simplebar-auto-hide="true">
                    <ul class="scrollable">
                        
                        <li class="side-menu__group-label">
                            EMPLOYEE PORTAL
                        </li>
                        
                        <li>
                            <a href="{{ route('employee.dashboard') }}" class="side-menu__link {{ request()->routeIs('employee.dashboard') ? 'side-menu__link--active' : '' }}">
                                <i data-lucide="home" class="size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 side-menu__link__icon"></i>
                                <div class="side-menu__link__title">Dashboard</div>
                            </a>
                        </li>
                       
                        <li>
                            <a href="{{ route('employee.my-attendance') }}" class="side-menu__link {{ request()->routeIs('employee.my-attendance') ? 'side-menu__link--active' : '' }}">
                                <i data-lucide="calendar" class="size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 side-menu__link__icon"></i>
                                <div class="side-menu__link__title">My Attendance</div>
                            </a>
                        </li>
                       
                        <li>
                            <a href="{{ route('employee.my-payroll') }}" class="side-menu__link {{ request()->routeIs('employee.my-payroll') || request()->routeIs('employee.view-payslip') ? 'side-menu__link--active' : '' }}">
                                <i data-lucide="credit-card" class="size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 side-menu__link__icon"></i>
                                <div class="side-menu__link__title">My Payroll</div>
                            </a>
                        </li>
                        
                    </ul>
                </div>
                <div class="side-menu__account group/profile absolute inset-x-0 bottom-0 mx-4 mb-8 transition-[width] group-[.side-menu--collapsed.side-menu--on-hover]:block group-[.side-menu--collapsed]:justify-center xl:group-[.side-menu--collapsed]:flex">
                    <div class="bg-background/10 border-background/20 dark:bg-foreground/[.02] dark:border-foreground/[.09] flex cursor-pointer items-center rounded-full border p-2.5 opacity-80 backdrop-blur-2xl transition hover:opacity-100" onclick="toggleProfileDropdown()">
                        <div class="border-background/20 dark:border-foreground/20 relative h-10 w-10 flex-none overflow-hidden rounded-full border-4">
                            @php
                                $currentUser = auth()->user();
                            @endphp
                            @if($currentUser)
                                @if($currentUser->profile_image)
                                    <img class="absolute top-0 h-full w-full object-cover" src="{{ asset('storage/' . $currentUser->profile_image) }}" alt="User Profile">
                                @else
                                    <div class="absolute top-0 h-full w-full flex items-center justify-center bg-gray-200 text-gray-600 text-sm font-bold">
                                        {{ strtoupper(substr($currentUser->name ?? 'E', 0, 1)) }}
                                    </div>
                                @endif
                            @else
                                <img class="absolute top-0 h-full w-full object-cover" src="dist/images/fakers/profile-11.jpg" alt="Guest User">
                            @endif
                        </div>
                        <div class="ms-3 flex w-full items-center overflow-hidden transition-opacity group-[.side-menu--collapsed.side-menu--on-hover]:ms-3 group-[.side-menu--collapsed.side-menu--on-hover]:w-full group-[.side-menu--collapsed.side-menu--on-hover]:opacity-100 xl:group-[.side-menu--collapsed]:ms-0 xl:group-[.side-menu--collapsed]:w-0 xl:group-[.side-menu--collapsed]:opacity-0">
                            <div class="w-28">
                                <div class="w-full truncate font-medium">
                                    {{ $currentUser->name ?? 'Employee' }}
                                </div>
                                <div class="w-full truncate text-xs opacity-60">
                                    Employee
                                </div>
                            </div>
                            <i data-lucide="move-right" class="size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 me-4 ms-auto opacity-50"></i>
                        </div>
                    </div>
                    <div class="hidden" id="profileDropdown">
                        <div class="box p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:z-[-1] after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:z-[-1] after:backdrop-blur-md text-foreground before:shadow-foreground/5 absolute bottom-0 left-[100%] z-50 ml-2 flex w-64 flex-col gap-2.5 px-6 py-5 before:rounded-2xl before:shadow-xl before:backdrop-blur after:rounded-2xl">
                            <div class="flex flex-col gap-0.5">
                                <div class="font-medium">
                                    {{ $currentUser->name ?? 'Employee' }}
                                </div>
                                <div class="mt-0.5 text-xs opacity-70">
                                    Employee
                                </div>
                            </div>
                            <div class="bg-foreground/5 h-px"></div>
                            <div class="flex flex-col gap-0.5">
                                <a class="hover:bg-foreground/5 -mx-3 flex gap-2.5 rounded-lg px-4 py-1.5" href="profile-management">
                                    <i data-lucide="users" class="size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25"></i>
                                    Profile
                                </a>
                            </div>
                            <div class="bg-foreground/5 h-px"></div>
                            <div class="flex flex-col gap-0.5">
                                <a class="hover:bg-foreground/5 -mx-3 flex gap-2.5 rounded-lg px-4 py-1.5" href="{{ route('logout') }}">
                                    <i data-lucide="power" class="size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25"></i>
                                    Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function toggleProfileDropdown() {
                const dropdown = document.getElementById('profileDropdown');
                if (dropdown.classList.contains('hidden')) {
                    dropdown.classList.remove('hidden');
                    dropdown.classList.add('block');
                } else {
                    dropdown.classList.remove('block');
                    dropdown.classList.add('hidden');
                }
            }

            // Close dropdown when clicking outside
            document.addEventListener('click', function(event) {
                const profileAccount = document.querySelector('.side-menu__account');
                const dropdown = document.getElementById('profileDropdown');
                
                if (!profileAccount.contains(event.target)) {
                    dropdown.classList.remove('block');
                    dropdown.classList.add('hidden');
                }
            });
        </script>
