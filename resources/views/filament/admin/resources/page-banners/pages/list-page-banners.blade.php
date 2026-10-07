<x-filament-panels::page>
@php
    $totalBanners    = \App\Models\PageBanner::count();
    $activeBanners   = \App\Models\PageBanner::where('is_active', true)->count();
    $inactiveBanners = $totalBanners - $activeBanners;
    $withImages      = \App\Models\PageBanner::whereNotNull('desktop_image')->count();
    $banners         = $this->banners;

    $pageKeyLabels = [
        'home'            => 'Home',
        'about'           => 'About Us',
        'products'        => 'Products',
        'product'         => 'Product (alt)',
        'blogs'           => 'Blogs',
        'blog'            => 'Blog (alt)',
        'contact'         => 'Contact',
        'gallery'         => 'Gallery',
        'shop-details'    => 'Shop Details',
        'product-details' => 'Product Details',
        'custom'          => 'Custom',
    ];
@endphp

<style>
/* ── Design System Tokens ── */
.bnr-wrap * { box-sizing: border-box; }
.bnr-wrap   { font-family: 'Figtree', system-ui, -apple-system, sans-serif; }

/* ── Hero Banner ── */
.bnr-hero {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1.25rem;
    background: #ffffff;
    border: 1px solid #e4e4e7;
    border-radius: 18px;
    padding: 1.2rem 1.5rem;
    margin-bottom: 1.25rem;
    box-shadow: 0 1px 3px rgba(0,0,0,.03);
    flex-wrap: wrap;
}
.dark .bnr-hero { background: #18181b; border-color: #27272a; }

.bnr-icon-box {
    width: 48px; height: 48px;
    border-radius: 14px;
    background: linear-gradient(135deg, #18181b 0%, #3f3f46 100%);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 4px 14px rgba(0,0,0,.15);
}
.dark .bnr-icon-box { background: linear-gradient(135deg, #27272a 0%, #3f3f46 100%); border: 1px solid #52525b; }
.bnr-icon-box svg { width: 22px; height: 22px; stroke: #fff; fill: none; }

.bnr-btn-primary {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 9px 18px; border-radius: 12px;
    font-size: 13px; font-weight: 700; text-decoration: none;
    background: #18181b; color: #fff;
    border: 1px solid #18181b;
    transition: all .18s ease; cursor: pointer;
    box-shadow: 0 2px 8px rgba(0,0,0,.12);
}
.bnr-btn-primary:hover { background: #000; box-shadow: 0 4px 14px rgba(0,0,0,.22); transform: translateY(-1px); }
.dark .bnr-btn-primary { background: #fff; color: #000; border-color: #fff; }
.dark .bnr-btn-primary:hover { background: #e4e4e7; }
.bnr-btn-primary svg { width: 15px; height: 15px; stroke: currentColor; fill: none; flex-shrink: 0; }

/* ── KPI Grid ── */
.bnr-kpi-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1rem;
    margin-bottom: 1.25rem;
}
@media (max-width: 1024px) { .bnr-kpi-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 640px)  { .bnr-kpi-grid { grid-template-columns: 1fr; } }

.bnr-kpi {
    background: #ffffff; border: 1px solid #e4e4e7; border-radius: 16px;
    padding: 1.1rem 1.25rem;
    transition: all .2s ease;
    box-shadow: 0 1px 3px rgba(0,0,0,.03);
}
.dark .bnr-kpi { background: #18181b; border-color: #27272a; }
.bnr-kpi:hover { transform: translateY(-2px); box-shadow: 0 6px 18px rgba(0,0,0,.07); border-color: #a1a1aa; }
.dark .bnr-kpi:hover { border-color: #52525b; box-shadow: 0 6px 18px rgba(0,0,0,.25); }

.kpi-icon-pill {
    width: 38px; height: 38px; border-radius: 11px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.kpi-icon-pill svg { width: 18px; height: 18px; stroke: currentColor; fill: none; stroke-width: 2; }
.kpi-pill-dark   { background: #18181b; color: #fff; }
.dark .kpi-pill-dark { background: #3f3f46; color: #fff; border: 1px solid #52525b; }
.kpi-pill-teal   { background: rgba(64,186,199,.12); color: #40bac7; }
.kpi-pill-green  { background: rgba(16,185,129,.12); color: #10b981; }
.kpi-pill-amber  { background: rgba(245,158,11,.12); color: #f59e0b; }

/* ── Toolbar Card ── */
.bnr-toolbar {
    background: #ffffff; border: 1px solid #e4e4e7; border-radius: 16px;
    padding: 0.9rem 1.25rem; margin-bottom: 1.25rem;
    display: flex; align-items: center; justify-content: space-between;
    gap: 1rem; flex-wrap: wrap;
    box-shadow: 0 1px 3px rgba(0,0,0,.03);
}
.dark .bnr-toolbar { background: #18181b; border-color: #27272a; }

.bnr-search-box {
    display: flex; align-items: center; gap: 8px;
    background: #f4f4f5; border: 1px solid #e4e4e7; border-radius: 11px;
    padding: 7px 12px; width: 100%; max-width: 300px;
    transition: all .15s ease;
}
.dark .bnr-search-box { background: #27272a; border-color: #3f3f46; }
.bnr-search-box:focus-within { border-color: #18181b; background: #fff; box-shadow: 0 0 0 2px rgba(24,24,27,.1); }
.dark .bnr-search-box:focus-within { border-color: #a1a1aa; background: #18181b; box-shadow: 0 0 0 2px rgba(161,161,170,.15); }
.bnr-search-box input {
    border: none; outline: none; background: transparent;
    font-size: 13px; font-weight: 500; width: 100%;
    color: #18181b; font-family: inherit;
}
.dark .bnr-search-box input { color: #f4f4f5; }
.bnr-search-box input::placeholder { color: #a1a1aa; }

.bnr-filter-pill {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;
    border: 1.5px solid #e4e4e7; background: #fff; color: #71717a;
    cursor: pointer; transition: all .15s ease;
}
.bnr-filter-pill:hover { border-color: #a1a1aa; color: #18181b; }
.bnr-filter-pill.active-all  { background: #18181b; border-color: #18181b; color: #fff; }
.bnr-filter-pill.active-on   { background: #10b981; border-color: #10b981; color: #fff; }
.bnr-filter-pill.active-off  { background: #ef4444; border-color: #ef4444; color: #fff; }
.dark .bnr-filter-pill { background: #27272a; border-color: #3f3f46; color: #a1a1aa; }
.dark .bnr-filter-pill:hover { border-color: #71717a; color: #fff; }
.dark .bnr-filter-pill.active-all { background: #fff; border-color: #fff; color: #000; }

/* ── Table Card ── */
.bnr-table-card {
    background: #ffffff; border: 1px solid #e4e4e7; border-radius: 18px;
    overflow: hidden; box-shadow: 0 1px 4px rgba(0,0,0,.03);
}
.dark .bnr-table-card { background: #18181b; border-color: #27272a; }

.bnr-table { width: 100%; border-collapse: collapse; text-align: left; }
.bnr-table th {
    background: #fafafa; border-bottom: 1px solid #e4e4e7;
    font-size: 11px; font-weight: 700; text-transform: uppercase;
    letter-spacing: .05em; color: #71717a; padding: 12px 16px;
}
.dark .bnr-table th { background: #202024; border-bottom-color: #27272a; color: #a1a1aa; }
.bnr-table td {
    padding: 12px 16px; border-bottom: 1px solid #f4f4f5;
    font-size: 13px; color: #18181b; vertical-align: middle;
}
.dark .bnr-table td { border-bottom-color: #27272a; color: #f4f4f5; }
.bnr-table tr:last-child td { border-bottom: none; }
.bnr-table tbody tr { transition: background .12s ease; }
.bnr-table tbody tr:hover { background: #fafafa; }
.dark .bnr-table tbody tr:hover { background: #202024; }
.bnr-table tbody tr.row-selected { background: rgba(64,186,199,.08) !important; }
.dark .bnr-table tbody tr.row-selected { background: rgba(64,186,199,.14) !important; }

/* ── Banner Thumbnail ── */
.bnr-thumb {
    width: 96px; height: 44px; border-radius: 8px;
    object-fit: cover; border: 1px solid #e4e4e7;
    background: #f4f4f5;
}
.dark .bnr-thumb { border-color: #3f3f46; background: #27272a; }
.bnr-thumb-placeholder {
    width: 96px; height: 44px; border-radius: 8px;
    border: 1.5px dashed #d4d4d8; background: #f4f4f5;
    display: flex; align-items: center; justify-content: center;
    color: #a1a1aa;
}
.dark .bnr-thumb-placeholder { border-color: #3f3f46; background: #27272a; color: #52525b; }
.bnr-thumb-placeholder svg { width: 18px; height: 18px; }

/* ── Status Toggle ── */
.bnr-toggle {
    position: relative; display: inline-flex;
    width: 36px; height: 20px; cursor: pointer;
}
.bnr-toggle input { opacity: 0; width: 0; height: 0; }
.bnr-toggle-slider {
    position: absolute; inset: 0;
    background: #d4d4d8; border-radius: 20px;
    transition: background .2s ease;
}
.dark .bnr-toggle-slider { background: #3f3f46; }
.bnr-toggle-slider::before {
    content: '';
    position: absolute; left: 2px; top: 2px;
    width: 16px; height: 16px;
    border-radius: 50%; background: #fff;
    transition: transform .2s ease;
    box-shadow: 0 1px 3px rgba(0,0,0,.2);
}
.bnr-toggle input:checked + .bnr-toggle-slider { background: #10b981; }
.bnr-toggle input:checked + .bnr-toggle-slider::before { transform: translateX(16px); }

/* ── Page Key Badge ── */
.page-key-badge {
    display: inline-flex; align-items: center; gap: 4px;
    padding: 3px 10px; border-radius: 8px; font-size: 11px; font-weight: 700;
    background: #f4f4f5; color: #52525b; border: 1px solid #e4e4e7;
    font-family: ui-monospace, monospace;
    letter-spacing: .02em;
}
.dark .page-key-badge { background: #27272a; border-color: #3f3f46; color: #a1a1aa; }

/* ── Action Buttons ── */
.bnr-action-btn {
    display: inline-flex; align-items: center; justify-content: center;
    width: 32px; height: 32px; border-radius: 8px;
    background: #f4f4f5; border: 1px solid #e4e4e7;
    color: #52525b; transition: all .15s ease; cursor: pointer;
}
.bnr-action-btn:hover { background: #18181b; color: #fff; border-color: #18181b; transform: scale(1.05); }
.dark .bnr-action-btn { background: #27272a; border-color: #3f3f46; color: #d4d4d8; }
.dark .bnr-action-btn:hover { background: #fff; color: #000; border-color: #fff; }
.bnr-action-btn.btn-delete:hover { background: #ef4444; border-color: #ef4444; color: #fff; }
.dark .bnr-action-btn.btn-delete:hover { background: #ef4444; border-color: #ef4444; color: #fff; }

/* ── Floating Dock ── */
.bnr-floating-dock {
    position: fixed; bottom: 24px; left: 50%; transform: translateX(-50%);
    z-index: 99999; display: inline-flex; align-items: center; gap: 10px;
    padding: 7px 12px 7px 16px;
    background: #09090b; border: 1px solid rgba(255,255,255,.15); border-radius: 14px;
    box-shadow: 0 20px 48px -8px rgba(0,0,0,.65), 0 0 0 1px rgba(255,255,255,.08);
    backdrop-filter: blur(16px); -webkit-backdrop-filter: blur(16px);
    animation: bnrDockIn .22s cubic-bezier(.16,1,.3,1) forwards;
    max-width: 95vw;
}
@keyframes bnrDockIn {
    from { opacity:0; transform: translate(-50%,20px) scale(.96); }
    to   { opacity:1; transform: translate(-50%,0) scale(1); }
}
.bnr-dock-count-pill {
    background: #fff; color: #000; font-size: 12px; font-weight: 900;
    min-width: 22px; height: 22px; padding: 0 7px; border-radius: 999px;
    display: inline-flex; align-items: center; justify-content: center;
    box-shadow: 0 1px 4px rgba(0,0,0,.3);
}
.bnr-dock-label { font-size: 12.5px; font-weight: 700; color: #f8fafc; white-space: nowrap; letter-spacing: -.01em; }
.bnr-dock-btn {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 7px 13px; border-radius: 8px; font-size: 12px; font-weight: 700;
    border: none; cursor: pointer; transition: all .15s ease;
    white-space: nowrap; font-family: inherit;
}
.bnr-dock-btn svg { width: 14px; height: 14px; flex-shrink: 0; }
.bnr-dock-btn.dock-delete { background: #dc2626; color: #fff; }
.bnr-dock-btn.dock-delete:hover { background: #b91c1c; transform: translateY(-1px); box-shadow: 0 4px 12px rgba(220,38,38,.35); }
.bnr-dock-btn.dock-cancel { background: rgba(255,255,255,.08); color: #cbd5e1; border: 1px solid rgba(255,255,255,.12); }
.bnr-dock-btn.dock-cancel:hover { background: rgba(255,255,255,.16); color: #fff; border-color: rgba(255,255,255,.2); }

/* ── Delete Modal ── */
.bnr-modal-backdrop {
    position: fixed; inset: 0; z-index: 50;
    background: rgba(0,0,0,.5); backdrop-filter: blur(4px);
    display: flex; align-items: center; justify-content: center; padding: 1rem;
}
.bnr-modal-dialog {
    background: #ffffff; border: 1px solid #e4e4e7; border-radius: 20px;
    width: 100%; max-width: 420px; box-shadow: 0 20px 40px rgba(0,0,0,.15);
    overflow: hidden; animation: bnrModalIn .2s ease-out;
}
.dark .bnr-modal-dialog { background: #18181b; border-color: #27272a; }
@keyframes bnrModalIn {
    from { opacity:0; transform: scale(.96) translateY(8px); }
    to   { opacity:1; transform: scale(1) translateY(0); }
}

/* ── Overlay badge ── */
.overlay-badge {
    display: inline-flex; align-items: center; gap: 3px;
    padding: 2px 8px; border-radius: 6px; font-size: 11px; font-weight: 600;
    background: #f4f4f5; border: 1px solid #e4e4e7; color: #71717a;
}
.dark .overlay-badge { background: #27272a; border-color: #3f3f46; color: #a1a1aa; }
</style>

<div class="bnr-wrap w-full">

    <!-- ─────────────────────────────────────────────────────────── -->
    <!-- 1. HERO HEADER                                              -->
    <!-- ─────────────────────────────────────────────────────────── -->
    <div class="bnr-hero">
        <div class="flex items-center gap-3.5">
            <div class="bnr-icon-box">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
            </div>
            <div>
                <div class="flex items-center gap-2 mb-0.5">
                    <h1 class="text-xl font-extrabold tracking-tight text-gray-900 dark:text-white m-0">
                        Page Banners
                    </h1>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-bold bg-zinc-100 text-zinc-800 dark:bg-zinc-800 dark:text-zinc-300 border border-zinc-200 dark:border-zinc-700">
                        {{ $totalBanners }} {{ Str::plural('Banner', $totalBanners) }}
                    </span>
                </div>
                <p class="text-xs text-gray-500 dark:text-zinc-400 m-0">
                    Manage page-specific hero banners — control images, titles, overlays, and visibility across the site.
                </p>
            </div>
        </div>

        <div class="flex items-center gap-2.5">
            <a href="{{ route('filament.admin.resources.page-banners.create') }}"
               class="bnr-btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span>Add Banner</span>
            </a>
        </div>
    </div>

    <!-- ─────────────────────────────────────────────────────────── -->
    <!-- 2. KPI METRICS                                              -->
    <!-- ─────────────────────────────────────────────────────────── -->
    <div class="bnr-kpi-grid">
        <!-- Total Banners -->
        <div class="bnr-kpi flex items-center gap-3">
            <div class="kpi-icon-pill kpi-pill-dark">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                </svg>
            </div>
            <div>
                <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400 dark:text-zinc-500 m-0">Total Banners</p>
                <h3 class="text-xl font-extrabold text-gray-900 dark:text-white m-0 leading-tight">{{ $totalBanners }}</h3>
                <span class="text-[10px] text-gray-500 dark:text-zinc-400">Across all pages</span>
            </div>
        </div>

        <!-- Active Banners -->
        <div class="bnr-kpi flex items-center gap-3">
            <div class="kpi-icon-pill kpi-pill-green">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
            <div>
                <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400 dark:text-zinc-500 m-0">Active</p>
                <h3 class="text-xl font-extrabold text-gray-900 dark:text-white m-0 leading-tight">{{ $activeBanners }}</h3>
                <span class="text-[10px] text-gray-500 dark:text-zinc-400">Visible on site</span>
            </div>
        </div>

        <!-- Inactive Banners -->
        <div class="bnr-kpi flex items-center gap-3">
            <div class="kpi-icon-pill kpi-pill-amber">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636" />
                </svg>
            </div>
            <div>
                <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400 dark:text-zinc-500 m-0">Inactive</p>
                <h3 class="text-xl font-extrabold text-gray-900 dark:text-white m-0 leading-tight">{{ $inactiveBanners }}</h3>
                <span class="text-[10px] text-gray-500 dark:text-zinc-400">Hidden from site</span>
            </div>
        </div>

        <!-- With Images -->
        <div class="bnr-kpi flex items-center gap-3">
            <div class="kpi-icon-pill kpi-pill-teal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                </svg>
            </div>
            <div>
                <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400 dark:text-zinc-500 m-0">With Images</p>
                <h3 class="text-xl font-extrabold text-gray-900 dark:text-white m-0 leading-tight">{{ $withImages }}</h3>
                <span class="text-[10px] text-gray-500 dark:text-zinc-400">Have desktop images</span>
            </div>
        </div>
    </div>

    <!-- ─────────────────────────────────────────────────────────── -->
    <!-- 3. TOOLBAR                                                  -->
    <!-- ─────────────────────────────────────────────────────────── -->
    <div class="bnr-toolbar">
        <div class="flex items-center gap-3 flex-1 flex-wrap">
            <!-- Search -->
            <div class="bnr-search-box">
                <svg class="w-4 h-4 text-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input type="text"
                       wire:model.live.debounce.300ms="search"
                       placeholder="Search page name, key, title...">
                @if($search)
                    <button type="button" wire:click="$set('search', '')" class="text-gray-400 hover:text-gray-600 dark:hover:text-white">
                        <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                @endif
            </div>

            <!-- Status Filter Pills -->
            <div class="flex items-center gap-1.5">
                <button type="button"
                        wire:click="$set('statusFilter', 'all')"
                        class="bnr-filter-pill {{ $statusFilter === 'all' ? 'active-all' : '' }}">
                    All
                </button>
                <button type="button"
                        wire:click="$set('statusFilter', 'active')"
                        class="bnr-filter-pill {{ $statusFilter === 'active' ? 'active-on' : '' }}">
                    <span class="w-1.5 h-1.5 rounded-full bg-current inline-block"></span>
                    Active
                </button>
                <button type="button"
                        wire:click="$set('statusFilter', 'inactive')"
                        class="bnr-filter-pill {{ $statusFilter === 'inactive' ? 'active-off' : '' }}">
                    <span class="w-1.5 h-1.5 rounded-full bg-current inline-block"></span>
                    Inactive
                </button>
            </div>
        </div>

        <!-- Sort -->
        <div class="flex items-center gap-1.5 text-xs text-gray-500 dark:text-zinc-400">
            <span class="font-medium">Sort by:</span>
            <select wire:model.live="sortOrder"
                    class="text-xs font-semibold py-1.5 px-2.5 rounded-lg border border-gray-200 bg-white dark:border-zinc-800 dark:bg-zinc-900 text-gray-900 dark:text-white outline-none cursor-pointer focus:border-black">
                <option value="page_name_asc">Page Name (A → Z)</option>
                <option value="page_name_desc">Page Name (Z → A)</option>
                <option value="newest">Newest First</option>
                <option value="oldest">Oldest First</option>
            </select>
        </div>
    </div>

    <!-- ─────────────────────────────────────────────────────────── -->
    <!-- 4. BANNERS TABLE                                            -->
    <!-- ─────────────────────────────────────────────────────────── -->
    <div class="bnr-table-card">
        @if($banners->count() > 0)
            <div class="overflow-x-auto">
                <table class="bnr-table">
                    <thead>
                        <tr>
                            <th style="width: 44px; text-align: center;">
                                <input type="checkbox"
                                       wire:model.live="selectAll"
                                       class="rounded border-gray-300 text-black focus:ring-black dark:border-zinc-700 dark:bg-zinc-900 cursor-pointer">
                            </th>
                            <th style="width: 120px;">Desktop Preview</th>
                            <th>Page</th>
                            <th>Content</th>
                            <th>CTA Button</th>
                            <th>Overlay</th>
                            <th style="width: 90px; text-align: center;">Status</th>
                            <th style="text-align: right; width: 100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($banners as $banner)
                            <tr wire:key="banner-{{ $banner->id }}"
                                class="{{ in_array((string) $banner->id, $selectedBanners) ? 'row-selected' : '' }}">

                                <!-- Checkbox -->
                                <td style="text-align: center;">
                                    <input type="checkbox"
                                           wire:model.live="selectedBanners"
                                           value="{{ $banner->id }}"
                                           class="rounded border-gray-300 text-black focus:ring-black dark:border-zinc-700 dark:bg-zinc-900 cursor-pointer">
                                </td>

                                <!-- Desktop Image Thumbnail -->
                                <td>
                                    @if($banner->desktop_image)
                                        <img src="{{ asset('storage/' . ltrim($banner->desktop_image, '/')) }}"
                                             alt="{{ $banner->page_name }}"
                                             class="bnr-thumb"
                                             onerror="this.style.display='none';this.nextElementSibling.style.display='flex';">
                                        <div class="bnr-thumb-placeholder" style="display:none;">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                            </svg>
                                        </div>
                                    @else
                                        <div class="bnr-thumb-placeholder">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                                            </svg>
                                        </div>
                                    @endif
                                </td>

                                <!-- Page Info -->
                                <td>
                                    <div>
                                        <span class="font-bold text-gray-900 dark:text-white block">{{ $banner->page_name }}</span>
                                        <span class="page-key-badge mt-1">{{ $banner->page_key }}</span>
                                    </div>
                                </td>

                                <!-- Content -->
                                <td>
                                    @if($banner->title)
                                        <span class="font-semibold text-gray-900 dark:text-white block text-sm">{{ Str::limit($banner->title, 32) }}</span>
                                    @else
                                        <span class="text-gray-400 dark:text-zinc-600 text-xs italic">No title</span>
                                    @endif
                                    @if($banner->subtitle)
                                        <span class="text-xs text-gray-500 dark:text-zinc-400 block mt-0.5">{{ Str::limit($banner->subtitle, 40) }}</span>
                                    @endif
                                </td>

                                <!-- CTA Button -->
                                <td>
                                    @if($banner->button_text)
                                        <div class="flex flex-col gap-0.5">
                                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-md bg-blue-50 text-blue-700 border border-blue-100 text-xs font-semibold dark:bg-blue-950/30 dark:text-blue-300 dark:border-blue-800">
                                                {{ $banner->button_text }}
                                            </span>
                                            @if($banner->button_link)
                                                <span class="text-[10px] text-gray-400 font-mono">{{ $banner->button_link }}</span>
                                            @endif
                                        </div>
                                    @else
                                        <span class="text-gray-400 dark:text-zinc-600 text-xs">—</span>
                                    @endif
                                </td>

                                <!-- Overlay -->
                                <td>
                                    <span class="overlay-badge">
                                        <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 0 1 .67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 1 1-.671-1.34l.041-.022Z" />
                                        </svg>
                                        {{ $banner->overlay_opacity }}%
                                    </span>
                                </td>

                                <!-- Status Toggle -->
                                <td style="text-align: center;">
                                    <label class="bnr-toggle" title="{{ $banner->is_active ? 'Click to deactivate' : 'Click to activate' }}">
                                        <input type="checkbox"
                                               wire:click="toggleActive({{ $banner->id }})"
                                               {{ $banner->is_active ? 'checked' : '' }}
                                               onchange="return false;">
                                        <span class="bnr-toggle-slider"></span>
                                    </label>
                                </td>

                                <!-- Actions -->
                                <td style="text-align: right;">
                                    <div class="inline-flex items-center gap-1.5">
                                        <a href="{{ route('filament.admin.resources.page-banners.edit', $banner->id) }}"
                                           title="Edit Banner"
                                           class="bnr-action-btn">
                                            <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </a>
                                        <button type="button"
                                                wire:click="confirmSingleDelete({{ $banner->id }})"
                                                title="Delete Banner"
                                                class="bnr-action-btn btn-delete">
                                            <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @include('filament.admin.components.pagination', ['paginator' => $banners, 'pageName' => 'page', 'options' => [10, 12, 20, 50]])

        @else
            <!-- Empty State -->
            <div class="py-16 text-center">
                <div class="w-14 h-14 rounded-2xl bg-zinc-100 dark:bg-zinc-800 text-zinc-400 mx-auto flex items-center justify-center mb-3">
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>
                </div>
                <h3 class="text-sm font-bold text-gray-900 dark:text-white">No banners found</h3>
                <p class="text-xs text-gray-500 dark:text-zinc-400 mt-1 max-w-sm mx-auto">
                    @if($search || $statusFilter !== 'all')
                        No banners matched your current filters. Try adjusting your search or status filter.
                    @else
                        Get started by adding your first page banner.
                    @endif
                </p>
                <div class="mt-4">
                    @if($search || $statusFilter !== 'all')
                        <button type="button"
                                wire:click="$set('search', ''); $set('statusFilter', 'all')"
                                class="text-xs font-semibold text-black dark:text-white underline">
                            Clear filters
                        </button>
                    @else
                        <a href="{{ route('filament.admin.resources.page-banners.create') }}"
                           class="bnr-btn-primary inline-flex">
                            + Add First Banner
                        </a>
                    @endif
                </div>
            </div>
        @endif
    </div>

    <!-- ─────────────────────────────────────────────────────────── -->
    <!-- 5. FLOATING BULK-SELECT DOCK                                -->
    <!-- ─────────────────────────────────────────────────────────── -->
    @if(count($selectedBanners) > 0)
        <div class="bnr-floating-dock">
            <div class="flex items-center gap-2 pr-2">
                <span class="bnr-dock-count-pill">{{ count($selectedBanners) }}</span>
                <span class="bnr-dock-label">{{ count($selectedBanners) === 1 ? 'banner' : 'banners' }} selected</span>
            </div>

            <button type="button"
                    wire:click="confirmBulkDelete"
                    class="bnr-dock-btn dock-delete">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                </svg>
                Delete Selected
            </button>

            <button type="button"
                    wire:click="deselectAll"
                    class="bnr-dock-btn dock-cancel">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
                Cancel
            </button>
        </div>
    @endif

    <!-- ─────────────────────────────────────────────────────────── -->
    <!-- 6. DELETE CONFIRMATION MODAL                                -->
    <!-- ─────────────────────────────────────────────────────────── -->
    @if($showDeleteModal)
        <div class="bnr-modal-backdrop" wire:keydown.escape="cancelDelete">
            <div class="bnr-modal-dialog">
                <!-- Header -->
                <div class="p-5 border-b border-gray-100 dark:border-zinc-800 flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-red-50 dark:bg-red-950/30 border border-red-100 dark:border-red-900 flex items-center justify-center text-red-500 shrink-0">
                        <svg class="w-4.5 h-4.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-sm font-bold text-gray-900 dark:text-white m-0">
                            {{ $isBulkDelete ? 'Delete ' . count($selectedBanners) . ' Banners?' : "Delete \"{$bannerToDeleteName}\"?" }}
                        </h3>
                        <p class="text-[11px] text-gray-500 dark:text-zinc-400 m-0">
                            {{ $isBulkDelete ? 'All selected banners will be permanently removed.' : 'This banner will be permanently removed from the system.' }}
                        </p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="p-5 flex items-center justify-end gap-2">
                    <button type="button"
                            wire:click="cancelDelete"
                            class="px-3.5 py-2 rounded-xl border border-gray-200 text-xs font-semibold text-gray-700 hover:bg-gray-50 dark:border-zinc-800 dark:text-zinc-300 dark:hover:bg-zinc-800 transition">
                        Cancel
                    </button>
                    <button type="button"
                            wire:click="executeDelete"
                            class="px-4 py-2 rounded-xl bg-red-600 hover:bg-red-700 text-white text-xs font-bold transition shadow-sm shadow-red-200 dark:shadow-red-900/20">
                        Yes, Delete
                    </button>
                </div>
            </div>
        </div>
    @endif

</div>
</x-filament-panels::page>
