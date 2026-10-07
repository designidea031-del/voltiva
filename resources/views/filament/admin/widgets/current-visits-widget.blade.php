<x-filament-widgets::widget>
    <div class="rounded-2xl p-5 sm:p-6 border border-[#e8e8e8] bg-white shadow-xs dark:bg-[#18181b] dark:border-[#27272a] flex flex-col gap-4 min-h-[220px]">
        <!-- Header -->
        <div class="flex items-start justify-between">
            <div>
                <h3 class="text-sm sm:text-base font-bold text-[#000000] dark:text-white mb-0.5">Current Visits</h3>
                <p class="text-xs text-[#8c8c8c] dark:text-[#a1a1aa] font-medium">Live store traffic by territory</p>
            </div>
            <button class="text-[#8c8c8c] hover:text-[#000000] dark:text-[#71717a] dark:hover:text-white p-1 rounded-lg transition-colors">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                </svg>
            </button>
        </div>

        <!-- Donut Chart — pure SVG -->
        <div class="flex items-center justify-center my-1">
            <div class="relative w-36 h-36 sm:w-40 sm:h-40">
                <svg viewBox="0 0 42 42" class="w-full h-full -rotate-90 block">
                    <!-- Background circle -->
                    <circle cx="21" cy="21" r="15.9155" fill="none" class="stroke-[#f4f4f5] dark:stroke-[#27272a]" stroke-width="5.5"/>
                    <!-- Black/White segment: 57% -->
                    <circle cx="21" cy="21" r="15.9155" fill="none" class="stroke-[#000000] dark:stroke-[#ffffff]" stroke-width="5.5"
                            stroke-dasharray="57 43" stroke-dashoffset="0"/>
                    <!-- Dark grey segment: 20% -->
                    <circle cx="21" cy="21" r="15.9155" fill="none" class="stroke-[#525252] dark:stroke-[#a1a1aa]" stroke-width="5.5"
                            stroke-dasharray="20 80" stroke-dashoffset="-57"/>
                    <!-- Light grey segment: 23% -->
                    <circle cx="21" cy="21" r="15.9155" fill="none" class="stroke-[#b7b7b7] dark:stroke-[#525252]" stroke-width="5.5"
                            stroke-dasharray="23 77" stroke-dashoffset="-77"/>
                </svg>
                <!-- Center text -->
                <div class="absolute inset-0 flex flex-col items-center justify-center pointer-events-none">
                    <span class="text-[10px] font-semibold text-[#8c8c8c] dark:text-[#a1a1aa] tracking-wider uppercase">Total</span>
                    <span class="text-xl sm:text-2xl font-black text-[#000000] dark:text-white tracking-tight leading-none">2,458</span>
                </div>
            </div>
        </div>

        <!-- Breakdown List -->
        <div class="flex flex-col gap-2.5 border-t border-[#e8e8e8] dark:border-[#27272a] pt-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#000000] dark:bg-white inline-block shrink-0"></span>
                    <span class="text-xs sm:text-sm font-semibold text-[#525252] dark:text-[#d4d4d8]">America</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs sm:text-sm font-bold text-[#000000] dark:text-white">1,650</span>
                    <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-[#f4f4f5] dark:bg-[#27272a] text-[#000000] dark:text-white">+4.7%</span>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#525252] dark:bg-[#a1a1aa] inline-block shrink-0"></span>
                    <span class="text-xs sm:text-sm font-semibold text-[#525252] dark:text-[#d4d4d8]">Asia</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs sm:text-sm font-bold text-[#000000] dark:text-white">350</span>
                    <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-[#f4f4f5] dark:bg-[#27272a] text-[#000000] dark:text-white">+2.1%</span>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#b7b7b7] dark:bg-[#525252] inline-block shrink-0"></span>
                    <span class="text-xs sm:text-sm font-semibold text-[#525252] dark:text-[#d4d4d8]">Europe</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-xs sm:text-sm font-bold text-[#000000] dark:text-white">498</span>
                    <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-[#f4f4f5] dark:bg-[#27272a] text-[#525252] dark:text-[#a1a1aa]">-1.7%</span>
                </div>
            </div>
        </div>
    </div>
</x-filament-widgets::widget>
