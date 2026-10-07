@php
    $user = filament()->auth()->user();
    $name = $user?->name ?? 'Admin';
    $email = $user?->email ?? '';
    $initials = collect(explode(' ', $name))->map(fn($part) => strtoupper(substr($part, 0, 1)))->take(2)->implode('');
@endphp

<div class="niceadmin-topbar-icons flex items-center gap-2 sm:gap-3">
    <!-- Live Site Pill -->
    <a href="{{ url('/') }}" target="_blank" 
       title="View Public Store"
       class="fi-topbar-live-site-btn inline-flex items-center gap-1.5 px-2.5 sm:px-3.5 py-1.5 rounded-full text-xs font-semibold tracking-tight transition-all">
        <span class="fi-topbar-live-site-dot w-1.5 h-1.5 rounded-full inline-block"></span>
        <span class="hidden sm:inline">Live Site</span>
        <svg class="w-3 h-3 opacity-70" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
        </svg>
    </a>
</div>
