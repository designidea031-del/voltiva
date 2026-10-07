<x-filament-panels::page>
    <!-- Live Testing & Verification Quick Cards -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-2">
        <a href="{{ url('/sitemap.xml') }}" target="_blank" class="flex items-center gap-3 p-4 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 hover:border-amber-500 hover:shadow-md transition-all group">
            <div class="w-10 h-10 rounded-lg bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            </div>
            <div class="min-w-0">
                <div class="text-xs font-semibold uppercase tracking-wider text-gray-400">Live File</div>
                <div class="text-sm font-bold text-gray-900 dark:text-white truncate">sitemap.xml</div>
                <div class="text-[11px] text-emerald-600 dark:text-emerald-400 font-medium">Test in Browser &rarr;</div>
            </div>
        </a>

        <a href="{{ url('/robots.txt') }}" target="_blank" class="flex items-center gap-3 p-4 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 hover:border-amber-500 hover:shadow-md transition-all group">
            <div class="w-10 h-10 rounded-lg bg-blue-500/10 text-blue-600 dark:text-blue-400 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            </div>
            <div class="min-w-0">
                <div class="text-xs font-semibold uppercase tracking-wider text-gray-400">Direct Crawler Config</div>
                <div class="text-sm font-bold text-gray-900 dark:text-white truncate">robots.txt</div>
                <div class="text-[11px] text-blue-600 dark:text-blue-400 font-medium">View Direct &rarr;</div>
            </div>
        </a>

        <a href="https://search.google.com/test/rich-results?url={{ urlencode(url('/')) }}" target="_blank" class="flex items-center gap-3 p-4 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 hover:border-amber-500 hover:shadow-md transition-all group">
            <div class="w-10 h-10 rounded-lg bg-amber-500/10 text-amber-600 dark:text-amber-400 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
            <div class="min-w-0">
                <div class="text-xs font-semibold uppercase tracking-wider text-gray-400">Google Official</div>
                <div class="text-sm font-bold text-gray-900 dark:text-white truncate">Rich Results Test</div>
                <div class="text-[11px] text-amber-600 dark:text-amber-400 font-medium">Validate Schema &rarr;</div>
            </div>
        </a>

        <a href="https://search.google.com/search-console" target="_blank" class="flex items-center gap-3 p-4 rounded-xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 hover:border-amber-500 hover:shadow-md transition-all group">
            <div class="w-10 h-10 rounded-lg bg-purple-500/10 text-purple-600 dark:text-purple-400 flex items-center justify-center shrink-0 group-hover:scale-105 transition-transform">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
            </div>
            <div class="min-w-0">
                <div class="text-xs font-semibold uppercase tracking-wider text-gray-400">Webmaster Console</div>
                <div class="text-sm font-bold text-gray-900 dark:text-white truncate">Search Console</div>
                <div class="text-[11px] text-purple-600 dark:text-purple-400 font-medium">Open Console &rarr;</div>
            </div>
        </a>
    </div>

    <!-- Webmaster Settings Form -->
    <form wire:submit="save">
        {{ $this->form }}

        <div class="mt-6 flex justify-end gap-3">
            <x-filament::button type="submit" size="lg" color="primary">
                Save Webmaster & Analytics Configuration
            </x-filament::button>
        </div>
    </form>
</x-filament-panels::page>
