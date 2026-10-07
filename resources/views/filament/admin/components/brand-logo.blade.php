@php
    $settingRecord = \App\Models\Setting::where('key', 'site_logo')->first();
    $siteLogo = $settingRecord?->value;
    $logoUrl = !empty($siteLogo) ? storage_asset($siteLogo) : null;
    $logoVersion = $settingRecord?->updated_at?->timestamp ?? '1';
    $siteName = \App\Models\Setting::where('key', 'site_name')->value('value') ?? 'Voltiva';
    $adminHeight = (int) (\App\Models\Setting::where('key', 'logo_admin_height')->value('value') ?: 32);
    $logoFit = \App\Models\Setting::where('key', 'logo_fit')->value('value') ?: 'contain';
@endphp

@if($logoUrl)
    <div class="flex items-center py-0.5">
        <!-- Expanded Sidebar: Full Wide Corporate Logo (No circle/avatar) -->
        <div x-show="$store.sidebar.isOpen" class="flex items-center">
            <img src="{{ $logoUrl }}?v={{ $logoVersion }}"
                 alt="{{ $siteName }}"
                 class="w-auto max-w-[190px] transition-all"
                 style="height: {{ $adminHeight }}px; max-height: {{ $adminHeight }}px; width: auto; max-width: 190px; object-fit: {{ $logoFit }}; display: block;">
        </div>

        <!-- Collapsed Sidebar: Compact Logo -->
        <div x-show="!$store.sidebar.isOpen" x-cloak class="flex items-center justify-center">
            <img src="{{ $logoUrl }}?v={{ $logoVersion }}"
                 alt="{{ $siteName }}"
                 class="transition-all"
                 style="height: min({{ $adminHeight }}px, 32px); width: min({{ $adminHeight }}px, 32px); max-height: 2rem; max-width: 2rem; object-fit: {{ $logoFit }}; display: block;">
        </div>
    </div>
@else
    <div class="flex items-baseline gap-1.5 py-1">
        <span class="text-xl font-extrabold tracking-tight text-[#000000] dark:text-white">{{ $siteName }}</span>
        <span class="text-[11px] font-bold uppercase tracking-wider text-[#000000] dark:text-white px-1.5 py-0.5 rounded-md bg-[#e8e8e8] dark:bg-[#3f3f46]">Dash</span>
    </div>
@endif
