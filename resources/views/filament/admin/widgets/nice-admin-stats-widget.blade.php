@php
    $productsCount = \App\Models\Product::count();
    $categoriesCount = \App\Models\Category::count();
    $blogsCount = \App\Models\BlogPost::count();
@endphp

<x-filament-widgets::widget>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 w-full">
        <!-- 1. Visitor Card -->
        <div class="rounded-2xl p-5 sm:p-6 border border-[#e8e8e8] bg-white shadow-xs dark:bg-[#18181b] dark:border-[#27272a] flex flex-col justify-between min-h-[140px] transition-all hover:shadow-md">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs sm:text-sm font-semibold text-[#525252] dark:text-[#a1a1aa] mb-2">Visitors</p>
                    <div class="flex items-center gap-2.5">
                        <h3 class="text-2xl sm:text-3xl font-black text-[#000000] dark:text-white tracking-tight leading-none">126,426</h3>
                        <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-emerald-500/10 text-emerald-600 dark:bg-emerald-500/20 dark:text-emerald-400">+1.2%</span>
                    </div>
                </div>
                <div class="w-11 h-11 rounded-xl bg-emerald-500/10 dark:bg-emerald-500/20 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                </div>
            </div>
            <div class="mt-3">
                <span class="text-xs text-[#8c8c8c] dark:text-[#71717a] font-medium">vs last month</span>
            </div>
        </div>

        <!-- 2. Conversion Rate Card -->
        <div class="rounded-2xl p-5 sm:p-6 border border-[#e8e8e8] bg-white shadow-xs dark:bg-[#18181b] dark:border-[#27272a] flex flex-col justify-between min-h-[140px] transition-all hover:shadow-md">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs sm:text-sm font-semibold text-[#525252] dark:text-[#a1a1aa] mb-2">Conversion Rate</p>
                    <div class="flex items-center gap-2.5">
                        <h3 class="text-2xl sm:text-3xl font-black text-[#000000] dark:text-white tracking-tight leading-none">5.3%</h3>
                        <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-rose-500/10 text-rose-600 dark:bg-rose-500/20 dark:text-rose-400">-1.5%</span>
                    </div>
                </div>
                <div class="w-11 h-11 rounded-xl bg-amber-500/10 dark:bg-amber-500/20 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-amber-600 dark:text-amber-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                </div>
            </div>
            <div class="mt-3">
                <span class="text-xs text-[#8c8c8c] dark:text-[#71717a] font-medium">vs last month</span>
            </div>
        </div>

        <!-- 3. Ad Campaign Clicks Card -->
        <div class="rounded-2xl p-5 sm:p-6 border border-[#e8e8e8] bg-white shadow-xs dark:bg-[#18181b] dark:border-[#27272a] flex flex-col justify-between min-h-[140px] transition-all hover:shadow-md">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs sm:text-sm font-semibold text-[#525252] dark:text-[#a1a1aa] mb-2">Ad Campaign Clicks</p>
                    <div class="flex items-center gap-2.5">
                        <h3 class="text-2xl sm:text-3xl font-black text-[#000000] dark:text-white tracking-tight leading-none">11,510</h3>
                        <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-violet-500/10 text-violet-600 dark:bg-violet-500/20 dark:text-violet-400">+1.9%</span>
                    </div>
                </div>
                <div class="w-11 h-11 rounded-xl bg-violet-500/10 dark:bg-violet-500/20 flex items-center justify-center shrink-0">
                    <svg class="w-6 h-6 text-violet-600 dark:text-violet-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 7.5-9-5.25L3 7.5m18 0-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
                    </svg>
                </div>
            </div>
            <div class="mt-3">
                <span class="text-xs text-[#8c8c8c] dark:text-[#71717a] font-medium">vs last month</span>
            </div>
        </div>
    </div>
</x-filament-widgets::widget>
