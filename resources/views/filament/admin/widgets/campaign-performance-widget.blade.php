<x-filament-widgets::widget>
    <div class="rounded-2xl p-5 sm:p-6 border border-[#e8e8e8] bg-white shadow-xs dark:bg-[#18181b] dark:border-[#27272a] flex flex-col gap-4 min-h-[360px]">
        <!-- Card Header -->
        <div class="flex items-start justify-between pb-3.5 border-b border-[#e8e8e8] dark:border-[#27272a]">
            <div>
                <h3 class="text-sm sm:text-base font-bold text-[#000000] dark:text-white mb-0.5">Campaign Performance</h3>
                <p class="text-xs text-[#8c8c8c] dark:text-[#a1a1aa] font-medium">Top digital acquisition channels</p>
            </div>
            <button class="text-[#8c8c8c] hover:text-[#000000] dark:text-[#71717a] dark:hover:text-white p-1 rounded-lg transition-colors">
                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 12.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5ZM12 18.75a.75.75 0 1 1 0-1.5.75.75 0 0 1 0 1.5Z" />
                </svg>
            </button>
        </div>

        <!-- Channels List -->
        <div class="flex flex-col gap-1">
            <!-- Instagram -->
            <div class="flex items-center justify-between p-2.5 rounded-xl hover:bg-[#f8f9fa] dark:hover:bg-[#27272a] transition-colors">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-pink-500/10 dark:bg-pink-500/20 flex items-center justify-center text-xs font-black text-pink-600 dark:text-pink-400 shrink-0">
                        IG
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm font-bold text-[#000000] dark:text-white mb-0.5">Instagram</p>
                        <p class="text-[11px] text-[#8c8c8c] dark:text-[#a1a1aa] font-medium">8.49k active reach</p>
                    </div>
                </div>
                <span class="inline-flex px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-cyan-500/10 text-cyan-600 dark:bg-cyan-500/20 dark:text-cyan-400">Running</span>
            </div>

            <!-- Google -->
            <div class="flex items-center justify-between p-2.5 rounded-xl hover:bg-[#f8f9fa] dark:hover:bg-[#27272a] transition-colors">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-amber-500/10 dark:bg-amber-500/20 flex items-center justify-center text-xs font-black text-amber-600 dark:text-amber-400 shrink-0">
                        G
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm font-bold text-[#000000] dark:text-white mb-0.5">Google Search</p>
                        <p class="text-[11px] text-[#8c8c8c] dark:text-[#a1a1aa] font-medium">9.12k active reach</p>
                    </div>
                </div>
                <span class="inline-flex px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-amber-500/10 text-amber-600 dark:bg-amber-500/20 dark:text-amber-400">Paused</span>
            </div>

            <!-- Facebook -->
            <div class="flex items-center justify-between p-2.5 rounded-xl hover:bg-[#f8f9fa] dark:hover:bg-[#27272a] transition-colors">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-blue-500/10 dark:bg-blue-500/20 flex items-center justify-center text-xs font-black text-blue-600 dark:text-blue-400 shrink-0">
                        FB
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm font-bold text-[#000000] dark:text-white mb-0.5">Facebook Ads</p>
                        <p class="text-[11px] text-[#8c8c8c] dark:text-[#a1a1aa] font-medium">6.98k active reach</p>
                    </div>
                </div>
                <span class="inline-flex px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-rose-500/10 text-rose-600 dark:bg-rose-500/20 dark:text-rose-400">Stopped</span>
            </div>

            <!-- Twitter / X -->
            <div class="flex items-center justify-between p-2.5 rounded-xl hover:bg-[#f8f9fa] dark:hover:bg-[#27272a] transition-colors">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-purple-500/10 dark:bg-purple-500/20 flex items-center justify-center text-xs font-black text-purple-600 dark:text-purple-400 shrink-0">
                        X
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm font-bold text-[#000000] dark:text-white mb-0.5">Twitter / X</p>
                        <p class="text-[11px] text-[#8c8c8c] dark:text-[#a1a1aa] font-medium">8.92k active reach</p>
                    </div>
                </div>
                <span class="inline-flex px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-purple-500/10 text-purple-600 dark:bg-purple-500/20 dark:text-purple-400">Completed</span>
            </div>
        </div>
    </div>
</x-filament-widgets::widget>
