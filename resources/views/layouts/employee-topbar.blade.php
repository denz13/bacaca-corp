<!-- BEGIN: Top Bar -->
<div class="top-bar -mx-4 px-4 md:-mx-5 md:px-5 mb-6">
    <!-- BEGIN: Breadcrumb -->
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Employee Portal</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ $pageTitle ?? 'Dashboard' }}
            </li>
        </ol>
    </nav>
    <!-- END: Breadcrumb -->
    
    <!-- BEGIN: Search -->
    <div class="intro-x relative mr-3 sm:mr-6">
        <div class="search hidden sm:block">
            <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
            <i data-lucide="search" class="search__icon dark:text-slate-500"></i>
        </div>
        <a class="notification sm:hidden" href="">
            <i data-lucide="search" class="notification__icon dark:text-slate-500"></i>
        </a>
    </div>
    <!-- END: Search -->
    
    <!-- BEGIN: Notifications -->
    <div class="intro-x dropdown mr-auto sm:mr-6">
        <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown">
            <i data-lucide="bell" class="notification__icon dark:text-slate-500"></i>
        </div>
        <div class="notification-content pt-2 dropdown-menu">
            <div class="notification-content__box dropdown-content">
                <div class="notification-content__title">Notifications</div>
                <div class="cursor-pointer relative flex items-center">
                    <div class="w-12 h-12 flex-none image-fit mr-1">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/fakers/profile-11.jpg">
                        <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                    </div>
                    <div class="ml-2 overflow-hidden">
                        <div class="flex items-center">
                            <a href="javascript:;" class="font-medium truncate mr-5">John Doe</a>
                            <div class="text-xs text-slate-500 ml-auto whitespace-nowrap">05:09 AM</div>
                        </div>
                        <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                    </div>
                </div>
                <div class="cursor-pointer relative flex items-center mt-5">
                    <div class="w-12 h-12 flex-none image-fit mr-1">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/fakers/profile-11.jpg">
                        <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                    </div>
                    <div class="ml-2 overflow-hidden">
                        <div class="flex items-center">
                            <a href="javascript:;" class="font-medium truncate mr-5">John Doe</a>
                            <div class="text-xs text-slate-500 ml-auto whitespace-nowrap">05:09 AM</div>
                        </div>
                        <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                    </div>
                </div>
                <div class="cursor-pointer relative flex items-center mt-5">
                    <div class="w-12 h-12 flex-none image-fit mr-1">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="dist/images/fakers/profile-11.jpg">
                        <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                    </div>
                    <div class="ml-2 overflow-hidden">
                        <div class="flex items-center">
                            <a href="javascript:;" class="font-medium truncate mr-5">John Doe</a>
                            <div class="text-xs text-slate-500 ml-auto whitespace-nowrap">05:09 AM</div>
                        </div>
                        <div class="w-full truncate text-slate-500 mt-0.5">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Notifications -->
    
    <!-- BEGIN: Account Menu -->
    <div class="intro-x dropdown w-8 h-8">
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
            @php
                $currentUser = auth()->user();
            @endphp
            @if($currentUser && $currentUser->profile_image)
                <img alt="Employee Profile" src="{{ asset('storage/' . $currentUser->profile_image) }}">
            @else
                <img alt="Employee Profile" src="dist/images/fakers/profile-11.jpg">
            @endif
        </div>
        <div class="dropdown-menu w-56">
            <div class="dropdown-menu__content box bg-primary text-white">
                <div class="p-4 border-b border-white/10">
                    <div class="font-medium">{{ $currentUser->name ?? 'Employee' }}</div>
                    <div class="text-xs text-white/70 mt-0.5">Employee</div>
                </div>
                <div class="p-2">
                    <a href="profile-management" class="flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-white/5">
                        <i data-lucide="user" class="w-4 h-4 mr-2"></i> Profile
                    </a>
                    <a href="logout" class="flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-white/5">
                        <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Account Menu -->
</div>
<!-- END: Top Bar -->
