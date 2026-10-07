<x-filament-panels::page>
@php
    $totalCategories = \App\Models\BlogCategory::count();
    $totalArticles   = \App\Models\BlogPost::count();
    $topCategory     = \App\Models\BlogCategory::withCount('posts')->orderBy('posts_count', 'desc')->first();
    $categoriesWithPosts = \App\Models\BlogCategory::has('posts')->count();
    $coveragePct = $totalCategories > 0 ? round(($categoriesWithPosts / $totalCategories) * 100) : 0;
    $categories      = $this->categories;
@endphp

<style>
/* ── Design System Tokens (Voltiva Monochrome & Cyan) ── */
.bcat-wrap * { box-sizing: border-box; }
.bcat-wrap   { font-family: 'Figtree', system-ui, -apple-system, sans-serif; }

/* ── Hero Banner ── */
.bcat-hero {
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
.dark .bcat-hero { background: #18181b; border-color: #27272a; }

.bcat-icon-box {
    width: 48px; height: 48px;
    border-radius: 14px;
    background: linear-gradient(135deg, #18181b 0%, #3f3f46 100%);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 4px 14px rgba(0,0,0,.15);
}
.dark .bcat-icon-box { background: linear-gradient(135deg, #27272a 0%, #3f3f46 100%); border: 1px solid #52525b; }
.bcat-icon-box svg { width: 22px; height: 22px; color: #fff; stroke: #fff; fill: none; }

.bcat-btn-primary {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 9px 18px; border-radius: 12px;
    font-size: 13px; font-weight: 700; text-decoration: none;
    background: #18181b; color: #fff;
    border: 1px solid #18181b;
    transition: all .18s ease; cursor: pointer;
    box-shadow: 0 2px 8px rgba(0,0,0,.12);
}
.bcat-btn-primary:hover { background: #000; box-shadow: 0 4px 14px rgba(0,0,0,.22); transform: translateY(-1px); }
.dark .bcat-btn-primary { background: #fff; color: #000; border-color: #fff; }
.dark .bcat-btn-primary:hover { background: #e4e4e7; }
.bcat-btn-primary svg { width: 15px; height: 15px; stroke: currentColor; fill: none; flex-shrink: 0; }

/* ── KPI Grid ── */
.bcat-kpi-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1rem;
    margin-bottom: 1.25rem;
}
@media (max-width: 1024px) { .bcat-kpi-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 640px)  { .bcat-kpi-grid { grid-template-columns: 1fr; } }

.bcat-kpi {
    background: #ffffff; border: 1px solid #e4e4e7; border-radius: 16px;
    padding: 1.1rem 1.25rem;
    transition: all .2s ease;
    box-shadow: 0 1px 3px rgba(0,0,0,.03);
}
.dark .bcat-kpi { background: #18181b; border-color: #27272a; }
.bcat-kpi:hover { transform: translateY(-2px); box-shadow: 0 6px 18px rgba(0,0,0,.07); border-color: #a1a1aa; }
.dark .bcat-kpi:hover { border-color: #52525b; box-shadow: 0 6px 18px rgba(0,0,0,.25); }

.kpi-icon-pill {
    width: 38px; height: 38px; border-radius: 11px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.kpi-icon-pill svg { width: 18px; height: 18px; stroke: currentColor; fill: none; stroke-width: 2; }
.kpi-pill-dark { background: #18181b; color: #fff; }
.dark .kpi-pill-dark { background: #3f3f46; color: #fff; border: 1px solid #52525b; }
.kpi-pill-teal { background: rgba(64, 186, 199, 0.12); color: #40bac7; }
.kpi-pill-green { background: rgba(16, 185, 129, 0.12); color: #10b981; }
.kpi-pill-purple { background: rgba(139, 92, 246, 0.12); color: #8b5cf6; }

/* ── Toolbar Card ── */
.bcat-toolbar {
    background: #ffffff; border: 1px solid #e4e4e7; border-radius: 16px;
    padding: 0.9rem 1.25rem; margin-bottom: 1.25rem;
    display: flex; align-items: center; justify-content: space-between;
    gap: 1rem; flex-wrap: wrap;
    box-shadow: 0 1px 3px rgba(0,0,0,.03);
}
.dark .bcat-toolbar { background: #18181b; border-color: #27272a; }

.bcat-search-box {
    display: flex; align-items: center; gap: 8px;
    background: #f4f4f5; border: 1px solid #e4e4e7; border-radius: 11px;
    padding: 7px 12px; width: 100%; max-width: 320px;
    transition: all .15s ease;
}
.dark .bcat-search-box { background: #27272a; border-color: #3f3f46; }
.bcat-search-box:focus-within { border-color: #18181b; background: #fff; box-shadow: 0 0 0 2px rgba(24,24,27,.1); }
.dark .bcat-search-box:focus-within { border-color: #a1a1aa; background: #18181b; box-shadow: 0 0 0 2px rgba(161,161,170,.15); }
.bcat-search-box input {
    border: none; outline: none; background: transparent;
    font-size: 13px; font-weight: 500; width: 100%;
    color: #18181b; font-family: inherit;
}
.dark .bcat-search-box input { color: #f4f4f5; }
.bcat-search-box input::placeholder { color: #a1a1aa; }

/* ── Table Card ── */
.bcat-table-card {
    background: #ffffff; border: 1px solid #e4e4e7; border-radius: 18px;
    overflow: hidden; box-shadow: 0 1px 4px rgba(0,0,0,.03);
}
.dark .bcat-table-card { background: #18181b; border-color: #27272a; }

.bcat-table { width: 100%; border-collapse: collapse; text-align: left; }
.bcat-table th {
    background: #fafafa; border-bottom: 1px solid #e4e4e7;
    font-size: 11px; font-weight: 700; text-transform: uppercase;
    letter-spacing: .05em; color: #71717a; padding: 12px 18px;
}
.dark .bcat-table th { background: #202024; border-bottom-color: #27272a; color: #a1a1aa; }
.bcat-table td {
    padding: 14px 18px; border-bottom: 1px solid #f4f4f5;
    font-size: 13px; color: #18181b; vertical-align: middle;
}
.dark .bcat-table td { border-bottom-color: #27272a; color: #f4f4f5; }
.bcat-table tr:last-child td { border-bottom: none; }
.bcat-table tbody tr { transition: background .12s ease; }
.bcat-table tbody tr:hover { background: #fafafa; }
.dark .bcat-table tbody tr:hover { background: #202024; }

/* ── Action Buttons ── */
.bcat-action-btn {
    display: inline-flex; align-items: center; justify-content: center;
    width: 32px; height: 32px; border-radius: 8px;
    background: #f4f4f5; border: 1px solid #e4e4e7;
    color: #52525b; transition: all .15s ease; cursor: pointer;
}
.bcat-action-btn:hover { background: #18181b; color: #fff; border-color: #18181b; transform: scale(1.05); }
.dark .bcat-action-btn { background: #27272a; border-color: #3f3f46; color: #d4d4d8; }
.dark .bcat-action-btn:hover { background: #fff; color: #000; border-color: #fff; }
.bcat-action-btn.btn-delete:hover { background: #ef4444; border-color: #ef4444; color: #fff; }
.dark .bcat-action-btn.btn-delete:hover { background: #ef4444; border-color: #ef4444; color: #fff; }

/* ── Modal Popups ── */
.bcat-modal-backdrop {
    position: fixed; inset: 0; z-index: 50;
    background: rgba(0,0,0,0.5); backdrop-filter: blur(4px);
    display: flex; align-items: center; justify-content: center;
    padding: 1rem;
}
.bcat-modal-dialog {
    background: #ffffff; border: 1px solid #e4e4e7; border-radius: 20px;
    width: 100%; max-width: 480px; box-shadow: 0 20px 40px rgba(0,0,0,.15);
    overflow: hidden; animation: bcatModalIn .2s ease-out;
}
.dark .bcat-modal-dialog { background: #18181b; border-color: #27272a; }
@keyframes bcatModalIn {
    from { opacity: 0; transform: scale(0.96) translateY(8px); }
    to   { opacity: 1; transform: scale(1) translateY(0); }
}
.bcat-input {
    width: 100%; padding: 9px 13px; font-size: 13px; font-weight: 500;
    border-radius: 11px; border: 1px solid #e4e4e7; background: #fafafa;
    color: #18181b; outline: none; transition: all .15s ease;
    font-family: inherit;
}
.dark .bcat-input { background: #27272a; border-color: #3f3f46; color: #fff; }
.bcat-input:focus { border-color: #18181b; background: #fff; box-shadow: 0 0 0 2px rgba(24,24,27,.08); }
.dark .bcat-input:focus { border-color: #a1a1aa; background: #18181b; box-shadow: 0 0 0 2px rgba(161,161,170,.15); }

/* Header Select Button */
.bcat-header-select-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
    background: #ffffff;
    color: #3f3f46;
    border: 1.2px solid #e4e4e7;
    cursor: pointer;
    transition: all 0.15s ease;
}
.bcat-header-select-btn:hover {
    background: #f4f4f5;
    border-color: #d4d4d8;
    color: #18181b;
}
.dark .bcat-header-select-btn {
    background: #27272a;
    color: #d4d4d8;
    border-color: #3f3f46;
}
.dark .bcat-header-select-btn:hover {
    background: #3f3f46;
    color: #ffffff;
}

/* ── Floating Dock Multi-Select Bar (Voltiva Theme Styled) ── */
.bcat-floating-dock {
    position: fixed;
    bottom: 24px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 99999;
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 7px 12px 7px 16px;
    background: #09090b;
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 14px;
    box-shadow: 0 20px 48px -8px rgba(0, 0, 0, 0.65), 0 0 0 1px rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    animation: bcatDockSlideUp 0.22s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    max-width: 95vw;
}
@keyframes bcatDockSlideUp {
    from {
        opacity: 0;
        transform: translate(-50%, 20px) scale(0.96);
    }
    to {
        opacity: 1;
        transform: translate(-50%, 0) scale(1);
    }
}
.bcat-dock-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding-right: 6px;
}
.bcat-dock-count-pill {
    background: #ffffff;
    color: #000000;
    font-size: 12px;
    font-weight: 900;
    min-width: 22px;
    height: 22px;
    padding: 0 7px;
    border-radius: 999px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.3);
}
.bcat-dock-label {
    font-size: 12.5px;
    font-weight: 700;
    color: #f8fafc;
    white-space: nowrap;
    letter-spacing: -0.01em;
}

.bcat-dock-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 7px 13px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 700;
    border: none;
    cursor: pointer;
    transition: all 0.15s ease;
    white-space: nowrap;
    font-family: inherit;
    text-decoration: none;
}
.bcat-dock-btn svg {
    width: 14px;
    height: 14px;
    flex-shrink: 0;
}
.bcat-dock-btn.dock-delete {
    background: #dc2626;
    color: #ffffff;
}
.bcat-dock-btn.dock-delete:hover {
    background: #b91c1c;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.35);
}
.bcat-dock-btn.dock-cancel {
    background: rgba(255, 255, 255, 0.08);
    color: #cbd5e1;
    border: 1px solid rgba(255, 255, 255, 0.12);
}
.bcat-dock-btn.dock-cancel:hover {
    background: rgba(255, 255, 255, 0.16);
    color: #ffffff;
    border-color: rgba(255, 255, 255, 0.2);
}

.bcat-table tbody tr.row-selected {
    background: rgba(64, 186, 199, 0.08) !important;
}
.dark .bcat-table tbody tr.row-selected {
    background: rgba(64, 186, 199, 0.14) !important;
}
</style>

<div class="bcat-wrap w-full">

    <!-- ───────────────────────────────────────────────────────────── -->
    <!-- 1. HERO BANNER & BREADCRUMBS                                  -->
    <!-- ───────────────────────────────────────────────────────────── -->
    <div class="bcat-hero">
        <div class="flex items-center gap-3.5">
            <div class="bcat-icon-box">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                </svg>
            </div>
            <div>
                <div class="flex items-center gap-2 mb-0.5">
                    <h1 class="text-xl font-extrabold tracking-tight text-gray-900 dark:text-white m-0">
                        Blog Categories
                    </h1>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-bold bg-zinc-100 text-zinc-800 dark:bg-zinc-800 dark:text-zinc-300 border border-zinc-200 dark:border-zinc-700">
                        {{ $totalCategories }} {{ Str::plural('Topic', $totalCategories) }}
                    </span>
                </div>
                <p class="text-xs text-gray-500 dark:text-zinc-400 m-0">
                    Organize blog articles, customize URL slugs, and manage content taxonomy for Voltiva.
                </p>
            </div>
        </div>

        <div class="flex items-center gap-2.5">
            <a href="{{ route('filament.admin.resources.blogs.index') }}"
               class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl border border-gray-200 bg-white text-xs font-semibold text-gray-700 shadow-2xs hover:bg-gray-50 hover:border-gray-300 dark:border-zinc-800 dark:bg-zinc-900 dark:text-zinc-200 dark:hover:bg-zinc-800 transition">
                <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                </svg>
                View Articles
            </a>

            <button type="button"
                    wire:click="openCreateModal"
                    class="bcat-btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                <span>New Category</span>
            </button>
        </div>
    </div>

    <!-- ───────────────────────────────────────────────────────────── -->
    <!-- 2. KPI METRIC STRIP (4 CARDS)                                 -->
    <!-- ───────────────────────────────────────────────────────────── -->
    <div class="bcat-kpi-grid">
        <!-- 1. Total Topics -->
        <div class="bcat-kpi flex items-center gap-3">
            <div class="kpi-icon-pill kpi-pill-dark">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                </svg>
            </div>
            <div>
                <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400 dark:text-zinc-500 m-0">
                    Total Categories
                </p>
                <h3 class="text-xl font-extrabold text-gray-900 dark:text-white m-0 leading-tight">
                    {{ $totalCategories }}
                </h3>
                <span class="text-[10px] text-gray-500 dark:text-zinc-400">Content classifications</span>
            </div>
        </div>

        <!-- 2. Linked Articles -->
        <div class="bcat-kpi flex items-center gap-3">
            <div class="kpi-icon-pill kpi-pill-teal">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
            </div>
            <div>
                <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400 dark:text-zinc-500 m-0">
                    Linked Articles
                </p>
                <h3 class="text-xl font-extrabold text-gray-900 dark:text-white m-0 leading-tight">
                    {{ $totalArticles }}
                </h3>
                <span class="text-[10px] text-gray-500 dark:text-zinc-400">Published in blog</span>
            </div>
        </div>

        <!-- 3. Top Category -->
        <div class="bcat-kpi flex items-center gap-3">
            <div class="kpi-icon-pill kpi-pill-purple">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
            </div>
            <div class="min-w-0">
                <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400 dark:text-zinc-500 m-0">
                    Most Active Topic
                </p>
                <h3 class="text-base font-extrabold text-gray-900 dark:text-white m-0 leading-tight truncate" title="{{ $topCategory?->name ?? 'None' }}">
                    {{ $topCategory?->name ?? 'None' }}
                </h3>
                <span class="text-[10px] text-gray-500 dark:text-zinc-400">
                    {{ $topCategory?->posts_count ?? 0 }} {{ Str::plural('article', $topCategory?->posts_count ?? 0) }}
                </span>
            </div>
        </div>

        <!-- 4. Topic Coverage -->
        <div class="bcat-kpi flex items-center gap-3">
            <div class="kpi-icon-pill kpi-pill-green">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
            </div>
            <div>
                <p class="text-[11px] font-bold uppercase tracking-wider text-gray-400 dark:text-zinc-500 m-0">
                    Coverage Rate
                </p>
                <h3 class="text-xl font-extrabold text-gray-900 dark:text-white m-0 leading-tight">
                    {{ $coveragePct }}%
                </h3>
                <span class="text-[10px] text-gray-500 dark:text-zinc-400">{{ $categoriesWithPosts }} of {{ $totalCategories }} utilized</span>
            </div>
        </div>
    </div>

    <!-- ───────────────────────────────────────────────────────────── -->
    <!-- 3. SEARCH & ACTIONS TOOLBAR                                   -->
    <!-- ───────────────────────────────────────────────────────────── -->
    <div class="bcat-toolbar">
        <div class="flex items-center gap-3 flex-1 flex-wrap">
            <!-- Search Input -->
            <div class="bcat-search-box">
                <svg class="w-4 h-4 text-gray-400 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                <input type="text"
                       wire:model.live.debounce.300ms="search"
                       placeholder="Search category, slug, or details...">
                @if($search)
                    <button type="button" wire:click="$set('search', '')" class="text-gray-400 hover:text-gray-600 dark:hover:text-white">
                        <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                @endif
            </div>

            <!-- Sort Dropdown -->
            <div class="flex items-center gap-1.5 text-xs text-gray-500 dark:text-zinc-400">
                <span class="font-medium">Sort by:</span>
                <select wire:model.live="sortOrder"
                        class="text-xs font-semibold py-1.5 px-2.5 rounded-lg border border-gray-200 bg-white dark:border-zinc-800 dark:bg-zinc-900 text-gray-900 dark:text-white outline-none cursor-pointer focus:border-black">
                    <option value="name_asc">Name (A &rarr; Z)</option>
                    <option value="name_desc">Name (Z &rarr; A)</option>
                    <option value="posts_desc">Most Articles First</option>
                    <option value="newest">Newest Added First</option>
                </select>
            </div>
        </div>
    </div>

    <!-- ───────────────────────────────────────────────────────────── -->
    <!-- 4. MODERN CATEGORY TABLE                                      -->
    <!-- ───────────────────────────────────────────────────────────── -->
    <div class="bcat-table-card">
        @if($categories->count() > 0)
            <div class="overflow-x-auto">
                <table class="bcat-table">
                    <thead>
                        <tr>
                            <th style="width: 44px; text-align: center;">
                                <input type="checkbox"
                                       wire:model.live="selectAll"
                                       class="rounded border-gray-300 text-black focus:ring-black dark:border-zinc-700 dark:bg-zinc-900 cursor-pointer">
                            </th>
                            <th>Category</th>
                            <th>Slug / Route</th>
                            <th>Articles Count</th>
                            <th>Created Date</th>
                            <th style="text-align: right; width: 140px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr wire:key="category-{{ $category->id }}" class="{{ in_array((string) $category->id, $selectedCategories) ? 'row-selected' : '' }}">
                                <!-- Checkbox -->
                                <td style="text-align: center;">
                                    <input type="checkbox"
                                           wire:model.live="selectedCategories"
                                           value="{{ $category->id }}"
                                           class="rounded border-gray-300 text-black focus:ring-black dark:border-zinc-700 dark:bg-zinc-900 cursor-pointer">
                                </td>

                                <!-- Category Name & Description -->
                                <td>
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-xl bg-zinc-100 dark:bg-zinc-800 border border-zinc-200 dark:border-zinc-700 flex items-center justify-center text-zinc-900 dark:text-white shrink-0">
                                            <svg class="w-4 h-4 text-[#40bac7]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="font-bold text-gray-900 dark:text-white block">
                                                {{ $category->name }}
                                            </span>
                                            @if($category->description)
                                                <p class="text-xs text-gray-500 dark:text-zinc-400 mt-0.5 line-clamp-1 max-w-sm">
                                                    {{ $category->description }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <!-- Slug Badge -->
                                <td>
                                    <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg bg-gray-100 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 text-xs font-mono text-gray-700 dark:text-zinc-300">
                                        <span class="opacity-50">/</span>{{ $category->slug }}
                                    </div>
                                </td>

                                <!-- Linked Articles Badge -->
                                <td>
                                    <a href="{{ url('/admin/blogs?categoryFilter=' . $category->id) }}"
                                       title="View {{ $category->name }} articles"
                                       class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold {{ $category->posts_count > 0 ? 'bg-emerald-50 text-emerald-700 border border-emerald-200 dark:bg-emerald-950/40 dark:text-emerald-400 dark:border-emerald-800' : 'bg-gray-100 text-gray-500 border border-gray-200 dark:bg-zinc-800 dark:text-zinc-400 dark:border-zinc-700' }} hover:scale-105 transition-transform">
                                        <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>
                                        {{ $category->posts_count }} {{ Str::plural('Article', $category->posts_count) }}
                                    </a>
                                </td>

                                <!-- Created Date -->
                                <td>
                                    <span class="text-xs font-medium text-gray-700 dark:text-zinc-300 block">
                                        {{ $category->created_at?->format('d M Y') ?? '—' }}
                                    </span>
                                    <span class="text-[10px] text-gray-400 dark:text-zinc-500">
                                        {{ $category->created_at?->diffForHumans() ?? '' }}
                                    </span>
                                </td>

                                <!-- Actions -->
                                <td style="text-align: right;">
                                    <div class="inline-flex items-center gap-1.5">
                                        <!-- View Articles Link -->
                                        <a href="{{ url('/admin/blogs?categoryFilter=' . $category->id) }}"
                                           title="Filter articles by this topic"
                                           class="bcat-action-btn">
                                            <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                            </svg>
                                        </a>

                                        <!-- Edit Modal Button -->
                                        <button type="button"
                                                wire:click="openEditModal({{ $category->id }})"
                                                title="Edit Category"
                                                class="bcat-action-btn">
                                            <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                            </svg>
                                        </button>

                                        <!-- Delete Confirmation Button -->
                                        <button type="button"
                                                wire:click="confirmSingleDelete({{ $category->id }})"
                                                title="Delete Category"
                                                class="bcat-action-btn btn-delete">
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

            <!-- Pagination Bar -->
            <div class="px-5 py-3 border-t border-gray-100 dark:border-zinc-800 flex items-center justify-between text-xs text-gray-500">
                <span>Showing {{ $categories->firstItem() ?? 0 }} to {{ $categories->lastItem() ?? 0 }} of {{ $categories->total() }} topics</span>
                <div>
                    {{ $categories->links() }}
                </div>
            </div>
        @else
            <!-- Empty State -->
            <div class="py-16 text-center">
                <div class="w-14 h-14 rounded-2xl bg-zinc-100 dark:bg-zinc-800 text-zinc-400 mx-auto flex items-center justify-center mb-3">
                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
                    </svg>
                </div>
                <h3 class="text-sm font-bold text-gray-900 dark:text-white">No categories found</h3>
                <p class="text-xs text-gray-500 dark:text-zinc-400 mt-1 max-w-sm mx-auto">
                    @if($search)
                        No blog categories matched "{{ $search }}". Try refining your search query.
                    @else
                        Get started by creating your first blog topic category.
                    @endif
                </p>
                <div class="mt-4">
                    @if($search)
                        <button type="button" wire:click="$set('search', '')" class="text-xs font-semibold text-black dark:text-white underline">Clear search</button>
                    @else
                        <button type="button" wire:click="openCreateModal" class="bcat-btn-primary">
                            <span>+ Create First Category</span>
                        </button>
                    @endif
                </div>
            </div>
        @endif
    </div>

    <!-- ───────────────────────────────────────────────────────────── -->
    <!-- 5. CREATE CATEGORY MODAL POPUP                                -->
    <!-- ───────────────────────────────────────────────────────────── -->
    @if($showCreateModal)
        <div class="bcat-modal-backdrop" wire:keydown.escape="closeCreateModal">
            <div class="bcat-modal-dialog">
                <div class="p-5 border-b border-gray-100 dark:border-zinc-800 flex items-center justify-between">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-lg bg-black text-white dark:bg-zinc-800 flex items-center justify-center">
                            <svg class="w-4 h-4 text-[#40bac7]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-gray-900 dark:text-white m-0">New Blog Category</h3>
                            <p class="text-[11px] text-gray-500 dark:text-zinc-400 m-0">Add a new topic for editorial articles</p>
                        </div>
                    </div>
                    <button type="button" wire:click="closeCreateModal" class="text-gray-400 hover:text-gray-600 dark:hover:text-white">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form wire:submit.prevent="saveCreateCategory" class="p-5 space-y-4">
                    <!-- Category Name -->
                    <div>
                        <label class="block text-xs font-bold text-gray-800 dark:text-zinc-200 mb-1">
                            Category Name <span class="text-rose-500">*</span>
                        </label>
                        <input type="text"
                               wire:model.live.debounce.250ms="createName"
                               placeholder="e.g. Electrical Safety & Standards"
                               class="bcat-input"
                               autofocus>
                        @error('createName')
                            <p class="text-[11px] text-rose-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div>
                        <label class="block text-xs font-bold text-gray-800 dark:text-zinc-200 mb-1">
                            URL Slug <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative flex items-center">
                            <span class="absolute left-3 text-xs text-gray-400 font-mono select-none">/blog/</span>
                            <input type="text"
                                   wire:model="createSlug"
                                   placeholder="electrical-safety"
                                   class="bcat-input pl-14 font-mono">
                        </div>
                        @error('createSlug')
                            <p class="text-[11px] text-rose-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-xs font-bold text-gray-800 dark:text-zinc-200 mb-1">
                            Description <span class="text-gray-400 font-normal">(Optional)</span>
                        </label>
                        <textarea wire:model="createDescription"
                                  rows="3"
                                  placeholder="Brief overview of topics and articles covered under this category..."
                                  class="bcat-input"></textarea>
                        @error('createDescription')
                            <p class="text-[11px] text-rose-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-3 border-t border-gray-100 dark:border-zinc-800 flex items-center justify-end gap-2">
                        <button type="button"
                                wire:click="closeCreateModal"
                                class="px-3.5 py-2 rounded-xl border border-gray-200 text-xs font-semibold text-gray-700 hover:bg-gray-50 dark:border-zinc-800 dark:text-zinc-300 dark:hover:bg-zinc-800 transition">
                            Cancel
                        </button>
                        <button type="submit"
                                class="bcat-btn-primary">
                            <span>Save Category</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <!-- ───────────────────────────────────────────────────────────── -->
    <!-- 6. EDIT CATEGORY MODAL POPUP                                  -->
    <!-- ───────────────────────────────────────────────────────────── -->
    @if($showEditModal)
        <div class="bcat-modal-backdrop" wire:keydown.escape="closeEditModal">
            <div class="bcat-modal-dialog">
                <div class="p-5 border-b border-gray-100 dark:border-zinc-800 flex items-center justify-between">
                    <div class="flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-lg bg-black text-white dark:bg-zinc-800 flex items-center justify-center">
                            <svg class="w-4 h-4 text-[#40bac7]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-bold text-gray-900 dark:text-white m-0">Edit Category</h3>
                            <p class="text-[11px] text-gray-500 dark:text-zinc-400 m-0">Update category details and URL slug</p>
                        </div>
                    </div>
                    <button type="button" wire:click="closeEditModal" class="text-gray-400 hover:text-gray-600 dark:hover:text-white">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <form wire:submit.prevent="saveEditCategory" class="p-5 space-y-4">
                    <!-- Category Name -->
                    <div>
                        <label class="block text-xs font-bold text-gray-800 dark:text-zinc-200 mb-1">
                            Category Name <span class="text-rose-500">*</span>
                        </label>
                        <input type="text"
                               wire:model.live.debounce.250ms="editName"
                               class="bcat-input"
                               autofocus>
                        @error('editName')
                            <p class="text-[11px] text-rose-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Slug -->
                    <div>
                        <label class="block text-xs font-bold text-gray-800 dark:text-zinc-200 mb-1">
                            URL Slug <span class="text-rose-500">*</span>
                        </label>
                        <div class="relative flex items-center">
                            <span class="absolute left-3 text-xs text-gray-400 font-mono select-none">/blog/</span>
                            <input type="text"
                                   wire:model="editSlug"
                                   class="bcat-input pl-14 font-mono">
                        </div>
                        @error('editSlug')
                            <p class="text-[11px] text-rose-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-xs font-bold text-gray-800 dark:text-zinc-200 mb-1">
                            Description <span class="text-gray-400 font-normal">(Optional)</span>
                        </label>
                        <textarea wire:model="editDescription"
                                  rows="3"
                                  class="bcat-input"></textarea>
                        @error('editDescription')
                            <p class="text-[11px] text-rose-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-3 border-t border-gray-100 dark:border-zinc-800 flex items-center justify-end gap-2">
                        <button type="button"
                                wire:click="closeEditModal"
                                class="px-3.5 py-2 rounded-xl border border-gray-200 text-xs font-semibold text-gray-700 hover:bg-gray-50 dark:border-zinc-800 dark:text-zinc-300 dark:hover:bg-zinc-800 transition">
                            Cancel
                        </button>
                        <button type="submit"
                                class="bcat-btn-primary">
                            <span>Update Changes</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    <!-- ───────────────────────────────────────────────────────────── -->
    <!-- 7. DELETE CONFIRMATION MODAL POPUP                            -->
    <!-- ───────────────────────────────────────────────────────────── -->
    @if($showDeleteModal)
        <div class="bcat-modal-backdrop" wire:keydown.escape="cancelDelete">
            <div class="bcat-modal-dialog">
                <div class="p-5 text-center">
                    <div class="w-12 h-12 rounded-full bg-rose-100 text-rose-600 dark:bg-rose-950/40 dark:text-rose-400 mx-auto flex items-center justify-center mb-3">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </div>

                    <h3 class="text-base font-extrabold text-gray-900 dark:text-white">
                        @if($isBulkDelete)
                            Delete {{ count($selectedCategories) }} Selected Categories?
                        @else
                            Delete "{{ $categoryToDeleteName }}"?
                        @endif
                    </h3>

                    <p class="text-xs text-gray-500 dark:text-zinc-400 mt-1 max-w-xs mx-auto">
                        @if($categoryToDeleteCount > 0)
                            <span class="text-amber-600 font-semibold block mb-1">
                                ⚠️ Caution: This category currently has {{ $categoryToDeleteCount }} {{ Str::plural('article', $categoryToDeleteCount) }} attached.
                            </span>
                        @endif
                        Are you sure you want to delete this category? This action cannot be undone.
                    </p>

                    <div class="mt-5 flex items-center justify-center gap-2">
                        <button type="button"
                                wire:click="cancelDelete"
                                class="px-4 py-2 rounded-xl border border-gray-200 text-xs font-semibold text-gray-700 hover:bg-gray-50 dark:border-zinc-800 dark:text-zinc-300 dark:hover:bg-zinc-800 transition">
                            Cancel
                        </button>
                        <button type="button"
                                wire:click="executeDelete"
                                class="px-4 py-2 rounded-xl bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold shadow-xs transition">
                            Yes, Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- ── Floating Dock Multi-Select Bar (Voltiva Theme Styled) ── --}}
    @if(count($selectedCategories) > 0)
    <div class="bcat-floating-dock">
        {{-- Selected Count Badge --}}
        <div class="bcat-dock-badge">
            <span class="bcat-dock-count-pill">{{ count($selectedCategories) }}</span>
            <span class="bcat-dock-label">{{ count($selectedCategories) === 1 ? 'category selected' : 'categories selected' }}</span>
        </div>

        {{-- Delete Selected --}}
        <button
            type="button"
            wire:click="confirmBulkDelete"
            class="bcat-dock-btn dock-delete"
            title="Delete all selected categories permanently"
        >
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="3 6 5 6 21 6"/>
                <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
                <path d="M10 11v6"/>
                <path d="M14 11v6"/>
                <path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2"/>
            </svg>
            <span>Delete Selected</span>
        </button>

        {{-- Cancel / Deselect --}}
        <button
            type="button"
            wire:click="deselectAll"
            class="bcat-dock-btn dock-cancel"
            title="Cancel selection"
        >
            <span>Cancel</span>
        </button>
    </div>
    @endif

</div>
</x-filament-panels::page>
