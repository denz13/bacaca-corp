<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="flex h-10 items-center">
                    <h2 class="me-5 truncate text-lg font-medium">General Report</h2>
                    <a class="text-primary ms-auto flex items-center gap-3" href="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="refresh-ccw" class="lucide lucide-refresh-ccw size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25"><path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path><path d="M3 3v5h5"></path><path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"></path><path d="M16 16h5v5"></path></svg>
                        Refresh
                    </a>
                </div>
                <div class="mt-5 grid grid-cols-12 gap-6">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3">
                        <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="circle-gauge" class="lucide lucide-circle-gauge size-4 stroke-(--color) fill-(--color)/25 h-7 w-7 stroke-1 drop-shadow [--color:var(--color-primary)]"><path d="M15.6 2.7a10 10 0 1 0 5.7 5.7"></path><circle cx="12" cy="12" r="2"></circle><path d="M13.4 10.6 19 5"></path></svg>
                                <div class="ms-auto">
                                    <div class="bg-(--color)/20 border-(--color)/60 text-(--color) flex cursor-pointer items-center rounded-full border px-2 py-px text-xs tooltip pl-2 pr-1 [--color:var(--color-success)]" data-content="12% Higher than last month">
                                        12%
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-up" class="lucide lucide-chevron-up size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 ms-0.5"><path d="m18 15-6-6-6 6"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 text-2xl font-medium leading-8">₱{{ number_format($totalEarnings, 2) }}</div>
                            <div class="mt-1.5 text-xs uppercase opacity-70">Total Earnings</div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3">
                        <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="panel-bottom-close" class="lucide lucide-panel-bottom-close size-4 stroke-(--color) fill-(--color)/25 h-7 w-7 stroke-1 [--color:var(--color-pending)]"><rect width="18" height="18" x="3" y="3" rx="2"></rect><path d="M3 15h18"></path><path d="m15 8-3 3-3-3"></path></svg>
                                <div class="ms-auto">
                                    <div class="bg-(--color)/20 border-(--color)/60 text-(--color) flex cursor-pointer items-center rounded-full border px-2 py-px text-xs tooltip pl-2 pr-1 [--color:var(--color-success)]" data-content="9% Higher than last month">
                                        9%
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-up" class="lucide lucide-chevron-up size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 ms-0.5"><path d="m18 15-6-6-6 6"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 text-2xl font-medium leading-8">{{ number_format($totalAttendance) }}</div>
                            <div class="mt-1.5 text-xs uppercase opacity-70">Total Attendance</div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3">
                        <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="disc3" class="lucide lucide-disc3 size-4 stroke-(--color) fill-(--color)/25 h-7 w-7 stroke-1 [--color:var(--color-warning)]"><circle cx="12" cy="12" r="10"></circle><path d="M6 12c0-1.7.7-3.2 1.8-4.2"></path><circle cx="12" cy="12" r="2"></circle><path d="M18 12c0 1.7-.7 3.2-1.8 4.2"></path></svg>
                                <div class="ms-auto">
                                    <div class="bg-(--color)/20 border-(--color)/60 text-(--color) flex cursor-pointer items-center rounded-full border px-2 py-px text-xs tooltip pl-2 pr-1 [--color:var(--color-danger)]" data-content="7% Lower than last month">
                                        7%
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-down" class="lucide lucide-chevron-down size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 ms-0.5"><path d="m6 9 6 6 6-6"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 text-2xl font-medium leading-8">{{ number_format($totalEmployees) }}</div>
                            <div class="mt-1.5 text-xs uppercase opacity-70">Total Employees</div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3">
                        <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="album" class="lucide lucide-album size-4 stroke-(--color) fill-(--color)/25 h-7 w-7 stroke-1 [--color:var(--color-danger)]"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect><polyline points="11 3 11 11 14 8 17 11 17 3"></polyline></svg>
                                <div class="ms-auto">
                                    <div class="bg-(--color)/20 border-(--color)/60 text-(--color) flex cursor-pointer items-center rounded-full border px-2 py-px text-xs tooltip pl-2 pr-1 [--color:var(--color-success)]" data-content="41% Higher than last month">
                                        41%
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-up" class="lucide lucide-chevron-up size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 ms-0.5"><path d="m18 15-6-6-6 6"></path></svg>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 text-2xl font-medium leading-8">{{ number_format($totalLeaves) }}</div>
                            <div class="mt-1.5 text-xs uppercase opacity-70">Total Leaves</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: General Report -->
            
           
            <!-- BEGIN: Official Store -->
            <div class="col-span-12 mt-6 xl:col-span-12">
                <div class="block h-10 items-center sm:flex">
                    <h2 class="me-5 truncate text-lg font-medium">Official Store</h2>
                </div>
                <div class="box relative before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md mt-12 p-5 sm:mt-5">
                    <div class="border rounded-lg overflow-hidden mt-5 h-[500px]">
                        <div id="map" style="width: 100%; height: 100%;"></div>
                    </div>
                </div>
            </div>
            <!-- END: Official Store -->
            
            @push('scripts')
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBM2-ikIyV0IMgQ31Rtpn_XBAMTm9wKup4&callback=initMap" async defer></script>
            <script>
                function initMap() {
                    // End location coordinates
                    const endLocation = { lat: 7.119066, lng: 125.6277931 };
                    
                    // Center map between the two locations
                    const map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 12,
                        center: { lat: 7.0886466, lng: 125.57245755 },
                        mapTypeId: 'roadmap'
                    });
                    
                    // Add end location marker
                    const endMarker = new google.maps.Marker({
                        position: endLocation,
                        map: map,
                        title: 'End Location'
                    });
                }
            </script>
            @endpush
            
          
            <!-- END: Weekly Best Sellers -->
            <!-- BEGIN: General Report -->
            <!-- <div class="col-span-12 mt-8 grid grid-cols-12 gap-6">
                <div class="col-span-12 sm:col-span-6 2xl:col-span-3">
                    <div class="box relative before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md p-5">
                        <div class="flex items-center">
                            <div class="w-2/4 flex-none">
                                <div class="truncate text-lg font-medium">Target Sales</div>
                                <div class="mt-1 opacity-70">300 Sales</div>
                            </div>
                            <div class="relative ms-auto flex-none">
                                <div class="w-[90px] h-[90px]">
                                    <canvas class="report-donut-chart-1" width="45" height="45" style="display: block; box-sizing: border-box; height: 90px; width: 90px;"></canvas>
                                </div>
                                <div class="absolute start-0 top-0 flex h-full w-full items-center justify-center font-medium">
                                    20%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 2xl:col-span-3">
                    <div class="box relative before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md p-5">
                        <div class="flex items-center">
                            <div class="me-3 truncate text-lg font-medium">
                                Social Media
                            </div>
                            <div class="text-(--color) flex cursor-pointer items-center rounded-full border px-2 py-px text-xs [--color:var(--color-foreground)] bg-(--color)/10 border-(--color)/40 ms-auto whitespace-nowrap">
                                137
                                Sales
                            </div>
                        </div>
                        <div class="mt-1">
                            <div class="w-auto h-[58px]">
                                <canvas class="simple-line-chart-1" width="105" height="29" style="display: block; box-sizing: border-box; height: 58px; width: 210px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 2xl:col-span-3">
                    <div class="box relative before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md p-5">
                        <div class="flex items-center">
                            <div class="w-2/4 flex-none">
                                <div class="truncate text-lg font-medium">New Products</div>
                                <div class="mt-1 opacity-70">1450 Products</div>
                            </div>
                            <div class="relative ms-auto flex-none">
                                <div class="w-[90px] h-[90px]">
                                    <canvas class="report-donut-chart-1" width="45" height="45" style="display: block; box-sizing: border-box; height: 90px; width: 90px;"></canvas>
                                </div>
                                <div class="absolute start-0 top-0 flex h-full w-full items-center justify-center font-medium">
                                    45%
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 2xl:col-span-3">
                    <div class="box relative before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md p-5">
                        <div class="flex items-center">
                            <div class="me-3 truncate text-lg font-medium">Posted Ads</div>
                            <div class="text-(--color) flex cursor-pointer items-center rounded-full border px-2 py-px text-xs [--color:var(--color-foreground)] bg-(--color)/10 border-(--color)/40 ms-auto whitespace-nowrap">
                                180
                                Campaign
                            </div>
                        </div>
                        <div class="mt-1">
                            <div class="w-auto h-[58px]">
                                <canvas class="simple-line-chart-1" width="105" height="29" style="display: block; box-sizing: border-box; height: 58px; width: 210px;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <!-- END: General Report -->
            <!-- BEGIN: Weekly Top Products -->
            <!-- <div class="col-span-12 mt-6">
                <div class="block h-10 items-center sm:flex">
                    <h2 class="me-5 truncate text-lg font-medium">
                        Weekly Top Products
                    </h2>
                    <div class="mt-3 flex items-center sm:ms-auto sm:mt-0">
                        <button class="[--color:var(--color-foreground)] cursor-pointer border justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 bg-background h-10 px-4 py-2 box flex items-center border-inherit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="file-text" class="lucide lucide-file-text size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 me-2 hidden sm:block"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path><path d="M14 2v4a2 2 0 0 0 2 2h4"></path><path d="M10 9H8"></path><path d="M16 13H8"></path><path d="M16 17H8"></path></svg>
                            Export to Excel
                        </button>
                        <button class="[--color:var(--color-foreground)] cursor-pointer border justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 bg-background h-10 px-4 py-2 box ms-3 flex items-center border-inherit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="file-text" class="lucide lucide-file-text size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 me-2 hidden sm:block"><path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z"></path><path d="M14 2v4a2 2 0 0 0 2 2h4"></path><path d="M10 9H8"></path><path d="M16 13H8"></path><path d="M16 17H8"></path></svg>
                            Export to PDF
                        </button>
                    </div>
                </div>
                <div class="mt-8 overflow-auto sm:mt-0 lg:overflow-visible">
                    <div class="relative w-full overflow-auto">
                        <table class="w-full caption-bottom border-separate border-spacing-y-[10px] sm:mt-2">
                            <thead class="[&amp;_tr]:border-b-0 [&amp;_tr_th]:h-10">
                                <tr class="transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted border-b-0">
                                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                        IMAGES
                                    </th>
                                    <th class="h-12 px-4 text-left align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0">
                                        PRODUCT NAME
                                    </th>
                                    <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 text-center">
                                        STOCK
                                    </th>
                                    <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 text-center">
                                        STATUS
                                    </th>
                                    <th class="h-12 px-4 align-middle font-medium text-muted-foreground [&amp;:has([role=checkbox])]:pr-0 text-center">
                                        ACTIONS
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="[&amp;_tr:last-child]:border-0">
                                <tr class="transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted border-b-0">
                                    <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                        <div class="flex">
                                            <span data-content="Uploaded at 17 June 2020" class="tooltip border-(--color)/5 block relative size-11 flex-none overflow-hidden rounded-full border-3 ring-1 ring-(--color)/25 [--color:var(--color-primary)] bg-background">
                                                <img class="absolute top-0 size-full object-cover" src="dist/images/fakers/preview-8.jpg" alt="Midone - Tailwind Admin Dashboard Template">
                                            </span>
                                            <span data-content="Uploaded at 15 May 2021" class="tooltip border-(--color)/5 block relative size-11 flex-none overflow-hidden rounded-full border-3 ring-1 ring-(--color)/25 [--color:var(--color-primary)] bg-background -ms-5">
                                                <img class="absolute top-0 size-full object-cover" src="dist/images/fakers/preview-13.jpg" alt="Midone - Tailwind Admin Dashboard Template">
                                            </span>
                                            <span data-content="Uploaded at 25 May 2022" class="tooltip border-(--color)/5 block relative size-11 flex-none overflow-hidden rounded-full border-3 ring-1 ring-(--color)/25 [--color:var(--color-primary)] bg-background -ms-5">
                                                <img class="absolute top-0 size-full object-cover" src="dist/images/fakers/preview-4.jpg" alt="Midone - Tailwind Admin Dashboard Template">
                                            </span>
                                        </div>
                                    </td>
                                    <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                        <a class="whitespace-nowrap font-medium" href="">
                                            Nike Air Max 270
                                        </a>
                                        <div class="mt-1 whitespace-nowrap text-xs opacity-70">
                                            Sport &amp; Outdoor
                                        </div>
                                    </td>
                                    <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r text-center">
                                        98
                                    </td>
                                    <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                        <div class="flex items-center justify-center text-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="check-square" class="lucide lucide-check-square size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 me-2"><path d="M21 10.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h12.5"></path><path d="m9 11 3 3L22 4"></path></svg>
                                            Active
                                        </div>
                                    </td>
                                    <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                        <div class="flex items-center justify-center">
                                            <a class="me-3 flex items-center" href="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="check-square" class="lucide lucide-check-square size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 me-1"><path d="M21 10.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h12.5"></path><path d="m9 11 3 3L22 4"></path></svg>
                                                Edit
                                            </a>
                                            <a class="text-danger flex items-center" href="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="trash" class="lucide lucide-trash size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 me-1"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path></svg>
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted border-b-0">
                                    <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                        <div class="flex">
                                            <span data-content="Uploaded at 2 May 2022" class="tooltip border-(--color)/5 block relative size-11 flex-none overflow-hidden rounded-full border-3 ring-1 ring-(--color)/25 [--color:var(--color-primary)] bg-background">
                                                <img class="absolute top-0 size-full object-cover" src="dist/images/fakers/preview-7.jpg" alt="Midone - Tailwind Admin Dashboard Template">
                                            </span>
                                            <span data-content="Uploaded at 8 November 2022" class="tooltip border-(--color)/5 block relative size-11 flex-none overflow-hidden rounded-full border-3 ring-1 ring-(--color)/25 [--color:var(--color-primary)] bg-background -ms-5">
                                                <img class="absolute top-0 size-full object-cover" src="dist/images/fakers/preview-12.jpg" alt="Midone - Tailwind Admin Dashboard Template">
                                            </span>
                                            <span data-content="Uploaded at 4 September 2020" class="tooltip border-(--color)/5 block relative size-11 flex-none overflow-hidden rounded-full border-3 ring-1 ring-(--color)/25 [--color:var(--color-primary)] bg-background -ms-5">
                                                <img class="absolute top-0 size-full object-cover" src="dist/images/fakers/preview-15.jpg" alt="Midone - Tailwind Admin Dashboard Template">
                                            </span>
                                        </div>
                                    </td>
                                    <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                        <a class="whitespace-nowrap font-medium" href="">
                                            Apple MacBook Pro 13
                                        </a>
                                        <div class="mt-1 whitespace-nowrap text-xs opacity-70">
                                            PC &amp; Laptop
                                        </div>
                                    </td>
                                    <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r text-center">
                                        203
                                    </td>
                                    <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                        <div class="flex items-center justify-center text-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="check-square" class="lucide lucide-check-square size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 me-2"><path d="M21 10.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h12.5"></path><path d="m9 11 3 3L22 4"></path></svg>
                                            Inactive
                                        </div>
                                    </td>
                                    <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                        <div class="flex items-center justify-center">
                                            <a class="me-3 flex items-center" href="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="check-square" class="lucide lucide-check-square size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 me-1"><path d="M21 10.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h12.5"></path><path d="m9 11 3 3L22 4"></path></svg>
                                                Edit
                                            </a>
                                            <a class="text-danger flex items-center" href="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="trash" class="lucide lucide-trash size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 me-1"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path></svg>
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted border-b-0">
                                    <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                        <div class="flex">
                                            <span data-content="Uploaded at 25 June 2020" class="tooltip border-(--color)/5 block relative size-11 flex-none overflow-hidden rounded-full border-3 ring-1 ring-(--color)/25 [--color:var(--color-primary)] bg-background">
                                                <img class="absolute top-0 size-full object-cover" src="dist/images/fakers/preview-6.jpg" alt="Midone - Tailwind Admin Dashboard Template">
                                            </span>
                                            <span data-content="Uploaded at 2 November 2022" class="tooltip border-(--color)/5 block relative size-11 flex-none overflow-hidden rounded-full border-3 ring-1 ring-(--color)/25 [--color:var(--color-primary)] bg-background -ms-5">
                                                <img class="absolute top-0 size-full object-cover" src="dist/images/fakers/preview-1.jpg" alt="Midone - Tailwind Admin Dashboard Template">
                                            </span>
                                            <span data-content="Uploaded at 27 March 2021" class="tooltip border-(--color)/5 block relative size-11 flex-none overflow-hidden rounded-full border-3 ring-1 ring-(--color)/25 [--color:var(--color-primary)] bg-background -ms-5">
                                                <img class="absolute top-0 size-full object-cover" src="dist/images/fakers/preview-13.jpg" alt="Midone - Tailwind Admin Dashboard Template">
                                            </span>
                                        </div>
                                    </td>
                                    <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                        <a class="whitespace-nowrap font-medium" href="">
                                            Samsung Galaxy S20 Ultra
                                        </a>
                                        <div class="mt-1 whitespace-nowrap text-xs opacity-70">
                                            Smartphone &amp; Tablet
                                        </div>
                                    </td>
                                    <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r text-center">
                                        50
                                    </td>
                                    <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                        <div class="flex items-center justify-center text-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="check-square" class="lucide lucide-check-square size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 me-2"><path d="M21 10.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h12.5"></path><path d="m9 11 3 3L22 4"></path></svg>
                                            Inactive
                                        </div>
                                    </td>
                                    <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                        <div class="flex items-center justify-center">
                                            <a class="me-3 flex items-center" href="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="check-square" class="lucide lucide-check-square size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 me-1"><path d="M21 10.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h12.5"></path><path d="m9 11 3 3L22 4"></path></svg>
                                                Edit
                                            </a>
                                            <a class="text-danger flex items-center" href="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="trash" class="lucide lucide-trash size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 me-1"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path></svg>
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted border-b-0">
                                    <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                        <div class="flex">
                                            <span data-content="Uploaded at 19 November 2022" class="tooltip border-(--color)/5 block relative size-11 flex-none overflow-hidden rounded-full border-3 ring-1 ring-(--color)/25 [--color:var(--color-primary)] bg-background">
                                                <img class="absolute top-0 size-full object-cover" src="dist/images/fakers/preview-9.jpg" alt="Midone - Tailwind Admin Dashboard Template">
                                            </span>
                                            <span data-content="Uploaded at 25 September 2022" class="tooltip border-(--color)/5 block relative size-11 flex-none overflow-hidden rounded-full border-3 ring-1 ring-(--color)/25 [--color:var(--color-primary)] bg-background -ms-5">
                                                <img class="absolute top-0 size-full object-cover" src="dist/images/fakers/preview-9.jpg" alt="Midone - Tailwind Admin Dashboard Template">
                                            </span>
                                            <span data-content="Uploaded at 19 September 2020" class="tooltip border-(--color)/5 block relative size-11 flex-none overflow-hidden rounded-full border-3 ring-1 ring-(--color)/25 [--color:var(--color-primary)] bg-background -ms-5">
                                                <img class="absolute top-0 size-full object-cover" src="dist/images/fakers/preview-14.jpg" alt="Midone - Tailwind Admin Dashboard Template">
                                            </span>
                                        </div>
                                    </td>
                                    <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                        <a class="whitespace-nowrap font-medium" href="">
                                            Nike Air Max 270
                                        </a>
                                        <div class="mt-1 whitespace-nowrap text-xs opacity-70">
                                            Sport &amp; Outdoor
                                        </div>
                                    </td>
                                    <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r text-center">
                                        50
                                    </td>
                                    <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                        <div class="flex items-center justify-center text-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="check-square" class="lucide lucide-check-square size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 me-2"><path d="M21 10.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h12.5"></path><path d="m9 11 3 3L22 4"></path></svg>
                                            Active
                                        </div>
                                    </td>
                                    <td class="shadow-[3px_3px_5px_#0000000b] first:rounded-l-xl last:rounded-r-xl box rounded-none p-4 align-middle [&amp;:has([role=checkbox])]:pr-0 border-y border-foreground/10 bg-background first:border-l last:border-r">
                                        <div class="flex items-center justify-center">
                                            <a class="me-3 flex items-center" href="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="check-square" class="lucide lucide-check-square size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 me-1"><path d="M21 10.5V19a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h12.5"></path><path d="m9 11 3 3L22 4"></path></svg>
                                                Edit
                                            </a>
                                            <a class="text-danger flex items-center" href="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="trash" class="lucide lucide-trash size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 me-1"><path d="M3 6h18"></path><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path></svg>
                                                Delete
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-3 flex flex-wrap items-center sm:flex-row sm:flex-nowrap">
                    <nav class="w-full sm:me-auto sm:w-auto">
                        <ul class="mr-0 flex w-full gap-1 sm:mr-auto sm:w-auto">
                            <li class="flex-1 sm:flex-initial">
                                <a class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 h-10 px-4 py-2 border-transparent bg-transparent">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevrons-left" class="lucide lucide-chevrons-left size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25"><path d="m11 17-5-5 5-5"></path><path d="m18 17-5-5 5-5"></path></svg>
                                </a>
                            </li>
                            <li class="flex-1 sm:flex-initial">
                                <a class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 h-10 px-4 py-2 border-transparent bg-transparent">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-left" class="lucide lucide-chevron-left size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25"><path d="m15 18-6-6 6-6"></path></svg>
                                </a>
                            </li>
                            <li class="flex-1 sm:flex-initial">
                                <a class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 h-10 px-4 py-2 border-transparent bg-transparent">
                                    ...
                                </a>
                            </li>
                            <li class="flex-1 sm:flex-initial">
                                <a class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 h-10 px-4 py-2 border-transparent bg-transparent">
                                    1
                                </a>
                            </li>
                            <li class="flex-1 sm:flex-initial">
                                <a class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 bg-background h-10 px-4 py-2 box rounded-xl border-inherit">
                                    2
                                </a>
                            </li>
                            <li class="flex-1 sm:flex-initial">
                                <a class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 h-10 px-4 py-2 border-transparent bg-transparent">
                                    3
                                </a>
                            </li>
                            <li class="flex-1 sm:flex-initial">
                                <a class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 h-10 px-4 py-2 border-transparent bg-transparent">
                                    ...
                                </a>
                            </li>
                            <li class="flex-1 sm:flex-initial">
                                <a class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 h-10 px-4 py-2 border-transparent bg-transparent">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-right" class="lucide lucide-chevron-right size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25"><path d="m9 18 6-6-6-6"></path></svg>
                                </a>
                            </li>
                            <li class="flex-1 sm:flex-initial">
                                <a class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 h-10 px-4 py-2 border-transparent bg-transparent">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevrons-right" class="lucide lucide-chevrons-right size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25"><path d="m6 17 5-5-5-5"></path><path d="m13 17 5-5-5-5"></path></svg>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <select class="bg-(image:--background-image-chevron) bg-[position:calc(100%-theme(spacing.3))_center] bg-[size:theme(spacing.5)] bg-no-repeat relative appearance-none flex h-10 rounded-md border bg-background px-3 py-2 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-foreground/5 focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 box mt-3 w-20 sm:mt-0">
                        <option>10</option>
                        <option>25</option>
                        <option>35</option>
                        <option>50</option>
                    </select>
                </div>
            </div> -->
            <!-- END: Weekly Top Products -->
        </div>
    </div>
    <div class="col-span-12 2xl:col-span-3">
        <div class="-mb-10 h-full pb-10 2xl:border-l">
            <div class="grid grid-cols-12 gap-x-6 gap-y-6 2xl:gap-x-0 2xl:pl-6">
                <!-- BEGIN: Top 5 Employees -->
                <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-4 2xl:col-span-12 2xl:mt-8">
                    <div class="flex h-10 items-center">
                        <h2 class="me-5 truncate text-lg font-medium">Top 5 Employees</h2>
                    </div>
                    <div class="mt-5">
                        @forelse($topEmployees as $employee)
                        <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md mb-3 flex items-center px-5 py-3 before:hidden">
                            <span data-content="" class="tooltip border-(--color)/5 block relative size-11 flex-none overflow-hidden rounded-full border-3 ring-1 ring-(--color)/25 [--color:var(--color-primary)]">
                                @php
                                    $picturePath = $employee['picture'] ? 'storage/' . ltrim($employee['picture'], '/') : null;
                                    $pictureExists = $picturePath && file_exists(public_path($picturePath));
                                @endphp
                                @if($pictureExists)
                                    <img class="absolute top-0 size-full object-cover" src="{{ asset($picturePath) }}" alt="{{ $employee['name'] }}" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                    <div class="absolute top-0 h-full w-full flex items-center justify-center bg-gray-200 text-gray-600 text-sm font-bold" style="display: none;">
                                        {{ strtoupper(substr($employee['name'] ?? 'E', 0, 1)) }}
                                    </div>
                                @else
                                    <div class="absolute top-0 h-full w-full flex items-center justify-center bg-gray-200 text-gray-600 text-sm font-bold">
                                        {{ strtoupper(substr($employee['name'] ?? 'E', 0, 1)) }}
                                    </div>
                                @endif
                            </span>
                            <div class="me-auto ms-4">
                                <div class="font-medium">{{ $employee['name'] }}</div>
                                <div class="mt-1 text-xs opacity-70">
                                    {{ $employee['time_in'] }} at {{ $employee['time'] }}
                                </div>
                            </div>
                            <div class="text-success">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="clock-in" class="lucide lucide-clock-in size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            </div>
                        </div>
                        @empty
                        <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md mb-3 flex items-center justify-center px-5 py-8 before:hidden">
                            <div class="text-center text-foreground/50 text-sm">
                                No attendance records found
                            </div>
                        </div>
                        @endforelse
                        <button class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 bg-background border-(--color)/20 px-4 py-2 box h-12 w-full border-dotted">
                            View More
                        </button>
                    </div>
                </div>
                <!-- END: Top 5 Employees -->
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
                <!-- BEGIN: Daily Notes -->
                <!-- <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-12 xl:col-start-1 xl:row-start-1 2xl:col-start-auto 2xl:row-start-auto">
                    <div class="flex h-10 items-center">
                        <h2 class="me-auto truncate text-lg font-medium">
                            Daily Notes
                        </h2>
                        <button class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 bg-background h-10 py-2 box me-2 border-inherit px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-left" class="lucide lucide-chevron-left size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25"><path d="m15 18-6-6 6-6"></path></svg>
                        </button>
                        <button class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap rounded-lg text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 bg-background h-10 py-2 box me-2 border-inherit px-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-right" class="lucide lucide-chevron-right size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25"><path d="m9 18 6-6-6-6"></path></svg>
                        </button>
                    </div>
                    <div class="mt-5">
                        <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md">
                            <div class="tns-outer" id="tns1-ow"><button type="button" data-action="stop"><span class="tns-visually-hidden">stop animation</span>stop</button><div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">slide <span class="current">4</span>  of 3</div><div id="tns1-mw" class="tns-ovh"><div class="tns-inner" id="tns1-iw"><div data-config="{}" class="tiny-slider  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal" id="tns1" style="transform: translate3d(-60%, 0px, 0px);"><div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                    <div class="truncate text-base font-medium">
                                        Lorem Ipsum is simply dummy text
                                    </div>
                                    <div class="mt-2 text-xs opacity-50">Posted 20 Hours ago</div>
                                    <div class="mt-2 text-justify opacity-70">
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's
                                        standard dummy text ever since the 1500s.
                                    </div>
                                    <div class="mt-5 flex font-medium">
                                        <button class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 bg-background border-(--color)/20 h-9 rounded-md px-3" type="button">
                                            View Notes
                                        </button>
                                        <button class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 bg-background border-(--color)/20 h-9 rounded-md px-3 ms-auto" type="button">
                                            Dismiss
                                        </button>
                                    </div>
                                </div>
                                <div class="tns-item" id="tns1-item0" aria-hidden="true" tabindex="-1">
                                    <div class="truncate text-base font-medium">
                                        Lorem Ipsum is simply dummy text
                                    </div>
                                    <div class="mt-2 text-xs opacity-50">Posted 20 Hours ago</div>
                                    <div class="mt-2 text-justify opacity-70">
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's
                                        standard dummy text ever since the 1500s.
                                    </div>
                                    <div class="mt-5 flex font-medium">
                                        <button class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 bg-background border-(--color)/20 h-9 rounded-md px-3" type="button">
                                            View Notes
                                        </button>
                                        <button class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 bg-background border-(--color)/20 h-9 rounded-md px-3 ms-auto" type="button">
                                            Dismiss
                                        </button>
                                    </div>
                                </div>
                                <div class="tns-item" id="tns1-item1" aria-hidden="true" tabindex="-1">
                                    <div class="truncate text-base font-medium">
                                        Lorem Ipsum is simply dummy text
                                    </div>
                                    <div class="mt-2 text-xs opacity-50">Posted 20 Hours ago</div>
                                    <div class="mt-2 text-justify opacity-70">
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's
                                        standard dummy text ever since the 1500s.
                                    </div>
                                    <div class="mt-5 flex font-medium">
                                        <button class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 bg-background border-(--color)/20 h-9 rounded-md px-3" type="button">
                                            View Notes
                                        </button>
                                        <button class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 bg-background border-(--color)/20 h-9 rounded-md px-3 ms-auto" type="button">
                                            Dismiss
                                        </button>
                                    </div>
                                </div>
                                <div class="tns-item tns-slide-active" id="tns1-item2">
                                    <div class="truncate text-base font-medium">
                                        Lorem Ipsum is simply dummy text
                                    </div>
                                    <div class="mt-2 text-xs opacity-50">Posted 20 Hours ago</div>
                                    <div class="mt-2 text-justify opacity-70">
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's
                                        standard dummy text ever since the 1500s.
                                    </div>
                                    <div class="mt-5 flex font-medium">
                                        <button class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 bg-background border-(--color)/20 h-9 rounded-md px-3" type="button">
                                            View Notes
                                        </button>
                                        <button class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 bg-background border-(--color)/20 h-9 rounded-md px-3 ms-auto" type="button">
                                            Dismiss
                                        </button>
                                    </div>
                                </div>
                            <div class="tns-item tns-slide-cloned" aria-hidden="true" tabindex="-1">
                                    <div class="truncate text-base font-medium">
                                        Lorem Ipsum is simply dummy text
                                    </div>
                                    <div class="mt-2 text-xs opacity-50">Posted 20 Hours ago</div>
                                    <div class="mt-2 text-justify opacity-70">
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the industry's
                                        standard dummy text ever since the 1500s.
                                    </div>
                                    <div class="mt-5 flex font-medium">
                                        <button class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 bg-background border-(--color)/20 h-9 rounded-md px-3" type="button">
                                            View Notes
                                        </button>
                                        <button class="[--color:var(--color-foreground)] cursor-pointer inline-flex border items-center justify-center gap-2 whitespace-nowrap text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-(--color) hover:bg-(--color)/5 bg-background border-(--color)/20 h-9 rounded-md px-3 ms-auto" type="button">
                                            Dismiss
                                        </button>
                                    </div>
                                </div></div></div></div></div>
                        </div>
                    </div>
                </div> -->
                <!-- END: Daily Notes -->
                <!-- BEGIN: Schedules -->
                <!-- <div class="col-span-12 mt-3 md:col-span-6 xl:col-span-4 xl:col-start-1 xl:row-start-2 2xl:col-span-12 2xl:col-start-auto 2xl:row-start-auto">
                    <div class="flex h-10 items-center">
                        <h2 class="me-5 truncate text-lg font-medium">Schedules</h2>
                        <a class="text-primary ms-auto flex items-center truncate" href="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="plus" class="lucide lucide-plus size-4 stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 me-1"><path d="M5 12h14"></path><path d="M12 5v14"></path></svg>
                            Add New Schedules
                        </a>
                    </div>
                    <div class="mt-5">
                        <div class="box relative p-5 before:absolute before:inset-0 before:mx-3 before:-mb-3 before:border before:border-foreground/10 before:bg-background/30 before:shadow-[0px_3px_5px_#0000000b] before:z-[-1] before:rounded-xl after:absolute after:inset-0 after:border after:border-foreground/10 after:bg-background after:shadow-[0px_3px_5px_#0000000b] after:rounded-xl after:z-[-1] after:backdrop-blur-md">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-left" class="lucide lucide-chevron-left stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 size-5 opacity-70"><path d="m15 18-6-6 6-6"></path></svg>
                                <div class="mx-auto text-base font-medium">April</div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" data-lucide="chevron-right" class="lucide lucide-chevron-right stroke-[1.5] [--color:currentColor] stroke-(--color) fill-(--color)/25 size-5 opacity-70"><path d="m9 18 6-6-6-6"></path></svg>
                            </div>
                            <div class="mt-5 grid grid-cols-7 gap-4 text-center">
                                <div class="font-medium">Su</div>
                                <div class="font-medium">Mo</div>
                                <div class="font-medium">Tu</div>
                                <div class="font-medium">We</div>
                                <div class="font-medium">Th</div>
                                <div class="font-medium">Fr</div>
                                <div class="font-medium">Sa</div>
                                <div class="relative rounded py-0.5 opacity-70">29</div>
                                <div class="relative rounded py-0.5 opacity-70">30</div>
                                <div class="relative rounded py-0.5 opacity-70">31</div>
                                <div class="relative rounded py-0.5">1</div>
                                <div class="relative rounded py-0.5">2</div>
                                <div class="relative rounded py-0.5">3</div>
                                <div class="relative rounded py-0.5">4</div>
                                <div class="relative rounded py-0.5">5</div>
                                <div class="bg-(--color)/20 border-(--color)/60 text-(--color) rounded border py-0.5 [--color:var(--color-success)]">
                                    6
                                </div>
                                <div class="relative rounded py-0.5">7</div>
                                <div class="bg-(--color)/20 border-(--color)/60 text-(--color) rounded border py-0.5 [--color:var(--color-primary)]">
                                    8
                                </div>
                                <div class="relative rounded py-0.5">9</div>
                                <div class="relative rounded py-0.5">10</div>
                                <div class="relative rounded py-0.5">11</div>
                                <div class="relative rounded py-0.5">12</div>
                                <div class="relative rounded py-0.5">13</div>
                                <div class="relative rounded py-0.5">14</div>
                                <div class="relative rounded py-0.5">15</div>
                                <div class="relative rounded py-0.5">16</div>
                                <div class="relative rounded py-0.5">17</div>
                                <div class="relative rounded py-0.5">18</div>
                                <div class="relative rounded py-0.5">19</div>
                                <div class="relative rounded py-0.5">20</div>
                                <div class="relative rounded py-0.5">21</div>
                                <div class="relative rounded py-0.5">22</div>
                                <div class="bg-(--color)/20 border-(--color)/60 text-(--color) rounded border py-0.5 [--color:var(--color-pending)]">
                                    23
                                </div>
                                <div class="relative rounded py-0.5">24</div>
                                <div class="relative rounded py-0.5">25</div>
                                <div class="relative rounded py-0.5">26</div>
                                <div class="bg-(--color)/20 border-(--color)/60 text-(--color) rounded border py-0.5 [--color:var(--color-warning)]">
                                    27
                                </div>
                                <div class="relative rounded py-0.5">28</div>
                                <div class="relative rounded py-0.5">29</div>
                                <div class="relative rounded py-0.5">30</div>
                                <div class="relative rounded py-0.5 opacity-70">1</div>
                                <div class="relative rounded py-0.5 opacity-70">2</div>
                                <div class="relative rounded py-0.5 opacity-70">3</div>
                                <div class="relative rounded py-0.5 opacity-70">4</div>
                                <div class="relative rounded py-0.5 opacity-70">5</div>
                                <div class="relative rounded py-0.5 opacity-70">6</div>
                                <div class="relative rounded py-0.5 opacity-70">7</div>
                                <div class="relative rounded py-0.5 opacity-70">8</div>
                                <div class="relative rounded py-0.5 opacity-70">9</div>
                            </div>
                            <div class="mt-5 border-t pt-5">
                                <div class="flex items-center">
                                    <div class="bg-(--color)/20 border-(--color)/60 me-3 size-2 rounded-full border [--color:var(--color-pending)]">
                                    </div>
                                    <span class="truncate">UI/UX Workshop</span>
                                    <span class="font-medium xl:ms-auto">23th</span>
                                </div>
                                <div class="mt-4 flex items-center">
                                    <div class="bg-(--color)/20 border-(--color)/60 me-3 size-2 rounded-full border [--color:var(--color-primary)]">
                                    </div>
                                    <span class="truncate"> VueJs Frontend Development </span>
                                    <span class="font-medium xl:ms-auto">10th</span>
                                </div>
                                <div class="mt-4 flex items-center">
                                    <div class="bg-(--color)/20 border-(--color)/60 me-3 size-2 rounded-full border [--color:var(--color-warning)]">
                                    </div>
                                    <span class="truncate">Laravel Rest API</span>
                                    <span class="font-medium xl:ms-auto">31th</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- END: Schedules -->
            </div>
        </div>
    </div>
</div>