@php
    $totalLeads = \App\Models\Lead::count();
    $newLeads = \App\Models\Lead::where('status', 'new')->count();
    $totalProducts = \App\Models\Product::count();
    $totalBlogs = \App\Models\BlogPost::count();
    $totalGalleries = \App\Models\Gallery::count();
    $totalBanners = \App\Models\PageBanner::count();
    $totalSeoPages = \App\Models\PageSeo::count();
@endphp

<x-filament-widgets::widget>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 w-full">
        <!-- 1. Customer Inquiries Card -->
        <a href="{{ url('/admin/leads') }}" class="group rounded-2xl p-5 border border-[#e8e8e8] bg-white shadow-xs dark:bg-[#18181b] dark:border-[#27272a] flex flex-col justify-between transition-all hover:shadow-md hover:border-red-400 dark:hover:border-red-500">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-[#525252] dark:text-[#a1a1aa] mb-1">Inquiries & Leads</p>
                    <div class="flex items-center gap-2">
                        <h3 class="text-2xl font-black text-[#000000] dark:text-white tracking-tight">{{ $totalLeads }}</h3>
                        @if($newLeads > 0)
                        <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-red-500/10 text-red-600 dark:bg-red-500/20 dark:text-red-400">
                            {{ $newLeads }} New
                        </span>
                        @endif
                    </div>
                </div>
                <div class="w-10 h-10 rounded-xl bg-red-500/10 dark:bg-red-500/20 flex items-center justify-center shrink-0 text-red-600 dark:text-red-400 group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                </div>
            </div>
            <div class="mt-3 flex items-center justify-between text-xs text-red-600 dark:text-red-400 font-medium">
                <span>View CRM Inbox &rarr;</span>
                <span class="text-gray-400 font-normal">Updated live</span>
            </div>
        </a>

        <!-- 2. Active Products Card -->
        <a href="{{ url('/admin/products') }}" class="group rounded-2xl p-5 border border-[#e8e8e8] bg-white shadow-xs dark:bg-[#18181b] dark:border-[#27272a] flex flex-col justify-between transition-all hover:shadow-md hover:border-amber-400 dark:hover:border-amber-500">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-[#525252] dark:text-[#a1a1aa] mb-1">Products Catalog</p>
                    <div class="flex items-center gap-2">
                        <h3 class="text-2xl font-black text-[#000000] dark:text-white tracking-tight">{{ $totalProducts }}</h3>
                        <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-amber-500/10 text-amber-600 dark:bg-amber-500/20 dark:text-amber-400">Live</span>
                    </div>
                </div>
                <div class="w-10 h-10 rounded-xl bg-amber-500/10 dark:bg-amber-500/20 flex items-center justify-center shrink-0 text-amber-600 dark:text-amber-400 group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                </div>
            </div>
            <div class="mt-3 flex items-center justify-between text-xs text-amber-600 dark:text-amber-400 font-medium">
                <span>Manage Products &rarr;</span>
                <span class="text-gray-400 font-normal">Catalog intact</span>
            </div>
        </a>

        <!-- 3. Media Gallery Assets Card -->
        <a href="{{ url('/admin/galleries') }}" class="group rounded-2xl p-5 border border-[#e8e8e8] bg-white shadow-xs dark:bg-[#18181b] dark:border-[#27272a] flex flex-col justify-between transition-all hover:shadow-md hover:border-blue-400 dark:hover:border-blue-500">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-[#525252] dark:text-[#a1a1aa] mb-1">Gallery & Media</p>
                    <div class="flex items-center gap-2">
                        <h3 class="text-2xl font-black text-[#000000] dark:text-white tracking-tight">{{ $totalGalleries }}</h3>
                        <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-blue-500/10 text-blue-600 dark:bg-blue-500/20 dark:text-blue-400">Hub</span>
                    </div>
                </div>
                <div class="w-10 h-10 rounded-xl bg-blue-500/10 dark:bg-blue-500/20 flex items-center justify-center shrink-0 text-blue-600 dark:text-blue-400 group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
            </div>
            <div class="mt-3 flex items-center justify-between text-xs text-blue-600 dark:text-blue-400 font-medium">
                <span>Photos & Videos &rarr;</span>
                <span class="text-gray-400 font-normal">{{ $totalBanners }} Banners</span>
            </div>
        </a>

        <!-- 4. SEO & Organic Health Card -->
        <a href="{{ url('/admin/page-seos') }}" class="group rounded-2xl p-5 border border-[#e8e8e8] bg-white shadow-xs dark:bg-[#18181b] dark:border-[#27272a] flex flex-col justify-between transition-all hover:shadow-md hover:border-emerald-400 dark:hover:border-emerald-500">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold uppercase tracking-wider text-[#525252] dark:text-[#a1a1aa] mb-1">SEO Hub Health</p>
                    <div class="flex items-center gap-2">
                        <h3 class="text-2xl font-black text-[#000000] dark:text-white tracking-tight">{{ $totalSeoPages }} Pages</h3>
                        <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-emerald-500/10 text-emerald-600 dark:bg-emerald-500/20 dark:text-emerald-400">91% Optimal</span>
                    </div>
                </div>
                <div class="w-10 h-10 rounded-xl bg-emerald-500/10 dark:bg-emerald-500/20 flex items-center justify-center shrink-0 text-emerald-600 dark:text-emerald-400 group-hover:scale-105 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </div>
            </div>
            <div class="mt-3 flex items-center justify-between text-xs text-emerald-600 dark:text-emerald-400 font-medium">
                <span>Manage Meta & SERP &rarr;</span>
                <span class="text-gray-400 font-normal">All indexed</span>
            </div>
        </a>
    </div>
</x-filament-widgets::widget>
