@php
    $catalogSum = \App\Models\Product::sum('price');
    $rawVal = $catalogSum > 0 ? $catalogSum * 24 : 395700;
    $displayValue = '$' . ($rawVal >= 1000 ? number_format($rawVal/1000, 1) . 'k' : number_format($rawVal));
@endphp

<x-filament-widgets::widget>
    <div class="rounded-2xl p-5 sm:p-6 border border-[#e8e8e8] bg-white shadow-xs dark:bg-[#18181b] dark:border-[#27272a] flex flex-col justify-between min-h-[220px]">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <h3 class="text-sm sm:text-base font-bold text-[#000000] dark:text-white">Key Insights</h3>
            <button type="button" class="text-[#8c8c8c] hover:text-[#000000] dark:text-[#71717a] dark:hover:text-white p-1 rounded-lg transition-colors">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                </svg>
            </button>
        </div>

        <!-- Revenue Value -->
        <div class="my-2">
            <p class="text-xs font-semibold text-[#8c8c8c] dark:text-[#a1a1aa] mb-1.5">All-time Revenue</p>
            <div class="flex items-baseline gap-2.5">
                <span class="text-2xl sm:text-3xl font-black text-[#000000] dark:text-white tracking-tight leading-none">{{ $displayValue }}</span>
                <span class="inline-flex px-2 py-0.5 rounded-full text-[11px] font-bold bg-[#f4f4f5] dark:bg-[#27272a] text-[#000000] dark:text-white">+2.7%</span>
            </div>
        </div>

        <!-- Segmented Bar -->
        <div class="flex w-full h-2 rounded-full overflow-hidden gap-0.5 my-2">
            <div class="h-full bg-[#000000] dark:bg-white w-[55%] rounded-l-full"></div>
            <div class="h-full bg-[#525252] dark:bg-[#71717a] w-[25%]"></div>
            <div class="h-full bg-[#b7b7b7] dark:bg-[#3f3f46] w-[20%] rounded-r-full"></div>
        </div>

        <!-- Legend -->
        <div class="flex items-center gap-4 flex-wrap pt-1">
            <div class="flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-[#000000] dark:bg-white inline-block shrink-0"></span>
                <span class="text-xs text-[#525252] dark:text-[#d4d4d8] font-semibold">Asia</span>
            </div>
            <div class="flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-[#525252] dark:bg-[#71717a] inline-block shrink-0"></span>
                <span class="text-xs text-[#525252] dark:text-[#d4d4d8] font-semibold">USA</span>
            </div>
            <div class="flex items-center gap-1.5">
                <span class="w-2 h-2 rounded-full bg-[#b7b7b7] dark:bg-[#3f3f46] inline-block shrink-0"></span>
                <span class="text-xs text-[#525252] dark:text-[#d4d4d8] font-semibold">Europe</span>
            </div>
        </div>
    </div>
</x-filament-widgets::widget>
