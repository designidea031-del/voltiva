@php
    $title = $this->data['meta_title'] ?? setting('meta_title', 'Voltiva - High Voltage Solutions & Electrical Manufacturing');
    $desc = $this->data['meta_description'] ?? setting('meta_description', 'Voltiva is a premier manufacturer and supplier of electrical accessories, switches, and high-voltage solutions engineered for efficiency and durability.');
    $url = $this->data['canonical_url'] ?? setting('canonical_url', config('app.url', 'https://voltiva.com'));
    $favicon = setting('site_favicon') ? storage_asset(setting('site_favicon')) : asset('assets/images/fav.png');

    $titleLen = mb_strlen($title ?? '');
    $descLen = mb_strlen($desc ?? '');
@endphp

<div class="mb-4 rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800/90 p-5 shadow-sm">
    <div class="flex flex-wrap items-center justify-between gap-3 pb-3 mb-3 border-b border-gray-100 dark:border-gray-700/60">
        <div class="flex items-center gap-2.5">
            <span class="flex h-8 w-8 items-center justify-center rounded-xl bg-orange-100 dark:bg-orange-950/60 text-orange-600 dark:text-orange-400 font-bold text-sm shadow-xs">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z"/></svg>
            </span>
            <div>
                <h4 class="text-sm font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                    Live Google Search SERP Simulator
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-100 text-emerald-800 dark:bg-emerald-950/60 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-800">
                        ⚡ Real-time Dynamic Preview
                    </span>
                </h4>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    Real-time simulation of how your website snippet appears to users on Google search result pages.
                </p>
            </div>
        </div>

        {{-- Character Count Badges --}}
        <div class="flex items-center gap-2.5 text-xs">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border font-medium {{ $titleLen >= 35 && $titleLen <= 65 ? 'bg-emerald-50 text-emerald-700 border-emerald-200 dark:bg-emerald-950/40 dark:border-emerald-800 dark:text-emerald-300' : 'bg-amber-50 text-amber-700 border-amber-200 dark:bg-amber-950/40 dark:border-amber-800 dark:text-amber-300' }}">
                <span>Title Length:</span>
                <strong>{{ $titleLen }} / 60</strong>
            </span>
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg border font-medium {{ $descLen >= 120 && $descLen <= 165 ? 'bg-emerald-50 text-emerald-700 border-emerald-200 dark:bg-emerald-950/40 dark:border-emerald-800 dark:text-emerald-300' : 'bg-amber-50 text-amber-700 border-amber-200 dark:bg-amber-950/40 dark:border-amber-800 dark:text-amber-300' }}">
                <span>Description Length:</span>
                <strong>{{ $descLen }} / 160</strong>
            </span>
        </div>
    </div>

    {{-- Google SERP Snippet Box --}}
    <div class="rounded-xl border border-gray-200/70 dark:border-gray-700/60 bg-white dark:bg-gray-900/90 p-4 max-w-2xl font-sans shadow-xs">
        {{-- URL Bar --}}
        <div class="flex items-center gap-2 mb-1 text-xs text-gray-700 dark:text-gray-300">
            <img src="{{ $favicon }}" alt="favicon" class="w-4 h-4 rounded-full object-cover border border-gray-200 dark:border-gray-700">
            <div class="flex flex-col">
                <span class="text-[12px] font-medium leading-none text-gray-900 dark:text-gray-100">{{ setting('site_name', 'Voltiva') }}</span>
                <span class="text-[11px] text-gray-500 dark:text-gray-400 leading-none mt-0.5 truncate">{{ $url }}</span>
            </div>
        </div>

        {{-- Meta Title --}}
        <h3 class="text-[18px] font-medium text-[#1a0dab] dark:text-[#8ab4f8] hover:underline cursor-pointer leading-snug mb-1">
            {{ $title ?: 'Voltiva - High Voltage Solutions & Electrical Manufacturing' }}
        </h3>

        {{-- Meta Description --}}
        <p class="text-[13px] text-[#4d5156] dark:text-[#bdc1c6] leading-relaxed line-clamp-2">
            {{ $desc ?: 'Voltiva is a premier manufacturer and supplier of electrical accessories, switches, and high-voltage solutions engineered for efficiency and durability.' }}
        </p>
    </div>
</div>
