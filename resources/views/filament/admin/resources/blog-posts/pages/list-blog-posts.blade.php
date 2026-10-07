<x-filament-panels::page>
@php
    $totalCount = \App\Models\BlogPost::count();
    $liveCount  = \App\Models\BlogPost::where('is_published', true)->count();
    $draftCount = \App\Models\BlogPost::where('is_published', false)->count();
    $totalViews = \App\Models\BlogPost::sum('views') ?? 0;
    $categories = \App\Models\BlogCategory::all();
    $posts      = $this->posts;
@endphp

<style>
/* ── Google Font ── */
.blg-wrap * { box-sizing: border-box; }
.blg-wrap   { font-family: 'Figtree', system-ui, -apple-system, sans-serif; }

/* ── Hero Banner ── */
.blg-hero {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    background: #fff;
    border: 1px solid #e4e4e7;
    border-radius: 18px;
    padding: 1.1rem 1.4rem;
    margin-bottom: 1.2rem;
    box-shadow: 0 1px 4px rgba(0,0,0,.05);
    flex-wrap: wrap;
}
.dark .blg-hero { background: #18181b; border-color: #27272a; }

.blg-icon-box {
    width: 46px; height: 46px;
    border-radius: 13px;
    background: linear-gradient(135deg,#18181b 0%,#3f3f46 100%);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 4px 14px rgba(0,0,0,.18);
}
.dark .blg-icon-box { background: linear-gradient(135deg,#27272a 0%,#3f3f46 100%); border: 1px solid #52525b; }

.blg-icon-box svg { width: 22px; height: 22px; color: #fff; stroke: #fff; fill: none; }

.blg-badge {
    display: inline-flex; align-items: center; gap: 5px;
    font-size: 11px; font-weight: 700;
    padding: 3px 9px; border-radius: 999px;
    background: #f4f4f5; color: #18181b; border: 1px solid #e4e4e7;
}
.dark .blg-badge { background: #27272a; color: #d4d4d8; border-color: #3f3f46; }

.blg-btn-primary {
    display: inline-flex; align-items: center; gap: 7px;
    padding: 9px 18px; border-radius: 12px;
    font-size: 13px; font-weight: 700; text-decoration: none;
    background: #18181b; color: #fff;
    border: 1px solid #18181b;
    transition: all .18s ease; cursor: pointer;
    box-shadow: 0 2px 8px rgba(0,0,0,.15);
}
.blg-btn-primary:hover { background: #000; box-shadow: 0 4px 14px rgba(0,0,0,.25); transform: translateY(-1px); }
.dark .blg-btn-primary { background: #fff; color: #000; border-color: #fff; }
.dark .blg-btn-primary:hover { background: #e4e4e7; }
.blg-btn-primary svg { width: 14px; height: 14px; stroke: currentColor; fill: none; flex-shrink: 0; }

/* ── KPI Grid ── */
.blg-kpi-grid {
    display: grid;
    grid-template-columns: repeat(4,1fr);
    gap: 1rem;
    margin-bottom: 1.2rem;
}
@media (max-width:1100px) { .blg-kpi-grid { grid-template-columns: repeat(2,1fr); } }
@media (max-width:640px)  { .blg-kpi-grid { grid-template-columns: 1fr; } }

.blg-kpi {
    background: #fff; border: 1.5px solid #e4e4e7; border-radius: 16px;
    padding: 1.1rem 1.2rem; cursor: pointer;
    transition: all .2s ease;
    box-shadow: 0 1px 4px rgba(0,0,0,.04);
    position: relative; overflow: hidden;
}
.dark .blg-kpi { background: #18181b; border-color: #27272a; }
.blg-kpi:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,.1); border-color: #a1a1aa; }
.dark .blg-kpi:hover { box-shadow: 0 8px 24px rgba(0,0,0,.35); border-color: #52525b; }
.blg-kpi.kpi-active { border-color: #18181b; box-shadow: 0 0 0 3px rgba(24,24,27,.12), 0 6px 18px rgba(0,0,0,.1); }
.dark .blg-kpi.kpi-active { border-color: #a1a1aa; box-shadow: 0 0 0 3px rgba(161,161,170,.2); }

.kpi-pill {
    width: 38px; height: 38px; border-radius: 11px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.kpi-pill svg { width: 18px; height: 18px; stroke: currentColor; fill: none; stroke-width: 2; }
.kpi-pill.pill-dark { background: #18181b; color: #fff; }
.dark .kpi-pill.pill-dark { background: #3f3f46; color: #fff; border: 1px solid #52525b; }
.kpi-pill.pill-green { background: rgba(16,185,129,.12); color: #10b981; }
.kpi-pill.pill-amber { background: rgba(245,158,11,.12); color: #f59e0b; }
.kpi-pill.pill-blue  { background: rgba(59,130,246,.12);  color: #3b82f6; }

.kpi-num {
    font-size: 2rem; font-weight: 900; line-height: 1;
    letter-spacing: -0.03em; margin: 8px 0 6px;
}
.kpi-divider { border: none; border-top: 1px solid #f4f4f5; margin: 0 0 8px; }
.dark .kpi-divider { border-color: #27272a; }
.kpi-footer { display: flex; justify-content: space-between; font-size: 11px; }

/* ── Filter Bar ── */
.blg-filter-bar {
    background: #fff; border: 1px solid #e4e4e7; border-radius: 16px;
    padding: 12px 16px; margin-bottom: 1.2rem;
    box-shadow: 0 1px 4px rgba(0,0,0,.04);
    display: flex; align-items: center; gap: 10px; flex-wrap: wrap;
}
.dark .blg-filter-bar { background: #18181b; border-color: #27272a; }

.blg-search-wrap { position: relative; flex: 1; min-width: 200px; max-width: 320px; }
.blg-search-wrap svg { position: absolute; left: 11px; top: 50%; transform: translateY(-50%); width: 15px; height: 15px; color: #a1a1aa; stroke: currentColor; fill: none; pointer-events: none; }
.blg-search-input {
    width: 100%; padding: 8px 12px 8px 34px;
    background: #f9f9f9; border: 1px solid #e4e4e7; border-radius: 10px;
    font-size: 12.5px; color: #18181b; outline: none;
    transition: border .15s, box-shadow .15s;
}
.dark .blg-search-input { background: #27272a; border-color: #3f3f46; color: #f4f4f5; }
.blg-search-input::placeholder { color: #a1a1aa; }
.blg-search-input:focus { border-color: #18181b; box-shadow: 0 0 0 2px rgba(24,24,27,.12); }
.dark .blg-search-input:focus { border-color: #71717a; box-shadow: 0 0 0 2px rgba(113,113,122,.2); }

.blg-select {
    padding: 8px 32px 8px 12px; min-width: 170px;
    background: #f9f9f9 url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 24 24' fill='none' stroke='%23a1a1aa' stroke-width='2.5' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'/%3E%3C/svg%3E") no-repeat right 10px center;
    border: 1px solid #e4e4e7; border-radius: 10px;
    font-size: 12.5px; color: #18181b; outline: none; cursor: pointer;
    appearance: none; -webkit-appearance: none;
    transition: border .15s;
}
.dark .blg-select { background-color: #27272a; border-color: #3f3f46; color: #f4f4f5; }
.blg-select:focus { border-color: #18181b; }
.dark .blg-select:focus { border-color: #71717a; }

.blg-pills { display: flex; align-items: center; gap: 2px; background: #f4f4f5; padding: 3px; border-radius: 10px; }
.dark .blg-pills { background: #27272a; }
.blg-pill {
    padding: 5px 12px; border-radius: 7px; font-size: 12px; font-weight: 600;
    color: #71717a; background: transparent; border: none; cursor: pointer;
    display: inline-flex; align-items: center; gap: 5px;
    transition: all .15s; white-space: nowrap;
}
.dark .blg-pill { color: #a1a1aa; }
.blg-pill:hover { color: #18181b; background: rgba(0,0,0,.06); }
.dark .blg-pill:hover { color: #fff; background: rgba(255,255,255,.08); }
.blg-pill.pill-on { background: #fff; color: #18181b; box-shadow: 0 1px 4px rgba(0,0,0,.12); font-weight: 700; }
.dark .blg-pill.pill-on { background: #3f3f46; color: #fff; box-shadow: 0 1px 4px rgba(0,0,0,.35); }

.blg-dot { width: 7px; height: 7px; border-radius: 50%; display: inline-block; flex-shrink: 0; }
.blg-dot.d-green { background: #10b981; }
.blg-dot.d-amber { background: #f59e0b; }

.blg-count-tag {
    font-size: 10.5px; font-weight: 700; padding: 1px 6px; border-radius: 6px;
    line-height: 1.5;
}
.blg-count-tag.ct-all   { background: rgba(0,0,0,.08); color: #3f3f46; }
.blg-count-tag.ct-green { background: rgba(16,185,129,.1); color: #059669; }
.blg-count-tag.ct-amber { background: rgba(245,158,11,.1); color: #d97706; }
.dark .blg-count-tag.ct-all { background: rgba(255,255,255,.1); color: #d4d4d8; }

.blg-reset-btn {
    font-size: 12px; font-weight: 600; color: #a1a1aa;
    background: none; border: none; cursor: pointer; padding: 4px 8px;
    border-radius: 7px; display: flex; align-items: center; gap: 4px;
    transition: all .15s;
}
.blg-reset-btn:hover { color: #ef4444; background: rgba(239,68,68,.06); }

/* ── Table Card ── */
.blg-table-card {
    background: #fff; border: 1px solid #e4e4e7; border-radius: 18px;
    overflow: hidden; box-shadow: 0 1px 4px rgba(0,0,0,.05);
}
.dark .blg-table-card { background: #18181b; border-color: #27272a; }

.blg-table-header {
    padding: 12px 18px; border-bottom: 1px solid #f4f4f5;
    display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px;
}
.dark .blg-table-header { border-color: #27272a; }

.blg-table-title-icon {
    width: 28px; height: 28px; border-radius: 8px;
    background: #18181b; color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-size: 13px; font-weight: 900; flex-shrink: 0;
}
.dark .blg-table-title-icon { background: #3f3f46; border: 1px solid #52525b; }

.blg-live-badge {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 4px 10px; border-radius: 999px;
    background: rgba(16,185,129,.08); border: 1px solid rgba(16,185,129,.25);
    font-size: 11px; font-weight: 700; color: #059669;
}
.dark .blg-live-badge { background: rgba(16,185,129,.12); border-color: rgba(16,185,129,.3); color: #34d399; }
.blg-live-badge svg { width: 11px; height: 11px; fill: #10b981; }

/* Header Select Button */
.blg-header-select-btn {
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
.blg-header-select-btn:hover {
    background: #f4f4f5;
    border-color: #d4d4d8;
    color: #18181b;
}
.dark .blg-header-select-btn {
    background: #27272a;
    color: #d4d4d8;
    border-color: #3f3f46;
}
.dark .blg-header-select-btn:hover {
    background: #3f3f46;
    color: #ffffff;
}

/* ── Floating Dock Multi-Select Bar (Voltiva Theme Styled) ── */
.blg-floating-dock {
    position: fixed;
    bottom: 24px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 99999;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 7px 10px 7px 14px;
    background: #09090b;
    border: 1px solid rgba(255, 255, 255, 0.15);
    border-radius: 14px;
    box-shadow: 0 20px 48px -8px rgba(0, 0, 0, 0.65), 0 0 0 1px rgba(255, 255, 255, 0.08);
    backdrop-filter: blur(16px);
    -webkit-backdrop-filter: blur(16px);
    animation: blgDockSlideUp 0.22s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    max-width: 95vw;
}
@keyframes blgDockSlideUp {
    from {
        opacity: 0;
        transform: translate(-50%, 20px) scale(0.96);
    }
    to {
        opacity: 1;
        transform: translate(-50%, 0) scale(1);
    }
}
.blg-dock-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding-right: 6px;
}
.blg-dock-count-pill {
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
.blg-dock-label {
    font-size: 12.5px;
    font-weight: 700;
    color: #f8fafc;
    white-space: nowrap;
    letter-spacing: -0.01em;
}

.blg-dock-btn {
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
.blg-dock-btn svg {
    width: 14px;
    height: 14px;
    flex-shrink: 0;
}

/* Green: Publish All */
.blg-dock-btn.dock-publish {
    background: #059669;
    color: #ffffff;
}
.blg-dock-btn.dock-publish:hover {
    background: #047857;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(5, 150, 105, 0.35);
}

/* Amber: Hide All */
.blg-dock-btn.dock-hide {
    background: #d97706;
    color: #ffffff;
}
.blg-dock-btn.dock-hide:hover {
    background: #b45309;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(217, 119, 6, 0.35);
}

/* Red: Delete Selected */
.blg-dock-btn.dock-delete {
    background: #dc2626;
    color: #ffffff;
}
.blg-dock-btn.dock-delete:hover {
    background: #b91c1c;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(220, 38, 38, 0.35);
}

/* Ghost: Cancel */
.blg-dock-btn.dock-cancel {
    background: rgba(255, 255, 255, 0.08);
    color: #cbd5e1;
    border: 1px solid rgba(255, 255, 255, 0.12);
}
.blg-dock-btn.dock-cancel:hover {
    background: rgba(255, 255, 255, 0.16);
    color: #ffffff;
    border-color: rgba(255, 255, 255, 0.2);
}

/* ── Table ── */
.blg-table { width: 100%; border-collapse: collapse; font-size: 13px; }
.blg-thead th {
    background: #fafafa; border-bottom: 1px solid #f0f0f0;
    padding: 10px 14px; font-size: 10.5px; font-weight: 700;
    text-transform: uppercase; letter-spacing: .06em; color: #a1a1aa;
    white-space: nowrap;
}
.dark .blg-thead th { background: #1c1c1f; border-color: #27272a; }
.blg-thead th:first-child { border-radius: 0; }

.blg-tbody tr { border-bottom: 1px solid #f4f4f5; transition: background .12s; }
.dark .blg-tbody tr { border-color: #27272a; }
.blg-tbody tr:last-child { border-bottom: none; }
.blg-tbody tr:hover { background: rgba(0,0,0,.02); }
.dark .blg-tbody tr:hover { background: rgba(255,255,255,.025); }
.blg-tbody tr.row-selected {
    background: rgba(0, 0, 0, 0.028) !important;
}
.blg-tbody tr.row-selected td:first-child {
    box-shadow: inset 3.5px 0 0 #000000;
}
.dark .blg-tbody tr.row-selected {
    background: rgba(255, 255, 255, 0.045) !important;
}
.dark .blg-tbody tr.row-selected td:first-child {
    box-shadow: inset 3.5px 0 0 #ffffff;
}
.blg-tbody td { padding: 12px 14px; vertical-align: middle; }

/* Thumbnail */
.blg-thumb {
    width: 64px; height: 44px; border-radius: 9px; overflow: hidden;
    background: #f4f4f5; border: 1px solid #e4e4e7; flex-shrink: 0;
    display: flex; align-items: center; justify-content: center;
}
.dark .blg-thumb { background: #27272a; border-color: #3f3f46; }
.blg-thumb img { width: 100%; height: 100%; object-fit: cover; display: block; }
.blg-thumb-placeholder { font-size: 20px; line-height: 1; }

/* Title area */
.blg-post-title {
    font-size: 13.5px; font-weight: 700; color: #18181b;
    text-decoration: none; line-height: 1.3;
    display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;
    transition: color .15s;
}
.dark .blg-post-title { color: #f4f4f5; }
.blg-post-title:hover { color: #3b82f6; }
.blg-post-excerpt {
    font-size: 11.5px; color: #71717a; margin-top: 2px;
    display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;
}
.dark .blg-post-excerpt { color: #a1a1aa; }

.blg-meta-row { display: flex; align-items: center; flex-wrap: wrap; gap: 6px; margin-top: 5px; }
.blg-meta-item { font-size: 10.5px; color: #a1a1aa; display: flex; align-items: center; gap: 3px; }
.blg-meta-item svg { width: 11px; height: 11px; flex-shrink: 0; stroke: currentColor; fill: none; stroke-width: 2; }
.blg-meta-dot { font-size: 10px; color: #d4d4d8; }
.blg-slug { font-family: 'Courier New', monospace; font-size: 10px; color: #a1a1aa; max-width: 140px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }

.blg-seo-tag {
    display: inline-flex; align-items: center; gap: 3px;
    padding: 1px 6px; border-radius: 5px; font-size: 10px; font-weight: 700;
    border: 1px solid;
}
.blg-seo-tag.seo-good   { color: #059669; background: rgba(16,185,129,.08); border-color: rgba(16,185,129,.2); }
.blg-seo-tag.seo-mid    { color: #d97706; background: rgba(245,158,11,.08); border-color: rgba(245,158,11,.2); }
.blg-seo-tag.seo-low    { color: #dc2626; background: rgba(239,68,68,.08); border-color: rgba(239,68,68,.2); }

/* Category tag */
.blg-cat-tag {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 4px 10px; border-radius: 8px; font-size: 11.5px; font-weight: 600;
    background: #f4f4f5; color: #3f3f46; border: 1px solid #e4e4e7; white-space: nowrap;
}
.dark .blg-cat-tag { background: #27272a; color: #d4d4d8; border-color: #3f3f46; }
.blg-cat-tag svg { width: 12px; height: 12px; stroke: currentColor; fill: none; stroke-width: 1.8; }

/* Status badges */
.blg-status-live {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 4px 10px; border-radius: 999px; font-size: 11.5px; font-weight: 700;
    background: rgba(16,185,129,.1); color: #059669; border: 1px solid rgba(16,185,129,.25); white-space: nowrap;
}
.dark .blg-status-live { background: rgba(16,185,129,.12); color: #34d399; border-color: rgba(16,185,129,.3); }
.blg-status-draft {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 4px 10px; border-radius: 999px; font-size: 11.5px; font-weight: 700;
    background: rgba(245,158,11,.1); color: #d97706; border: 1px solid rgba(245,158,11,.25); white-space: nowrap;
}
.dark .blg-status-draft { background: rgba(245,158,11,.12); color: #fbbf24; border-color: rgba(245,158,11,.3); }
.status-dot { width: 6px; height: 6px; border-radius: 50%; flex-shrink: 0; }
.status-dot.sd-green { background: #10b981; }
.status-dot.sd-amber { background: #f59e0b; }

/* Views */
.blg-views { display: flex; align-items: center; gap: 5px; font-size: 13px; font-weight: 700; color: #18181b; }
.dark .blg-views { color: #f4f4f5; }
.blg-views svg { width: 13px; height: 13px; stroke: #a1a1aa; fill: none; stroke-width: 2; }

/* Date */
.blg-date { font-size: 12.5px; font-weight: 600; color: #3f3f46; }
.dark .blg-date { color: #d4d4d8; }
.blg-date-rel { font-size: 10.5px; color: #a1a1aa; margin-top: 2px; }

/* Action buttons */
.blg-actions { display: inline-flex; align-items: center; gap: 4px; }
.blg-act {
    width: 32px; height: 32px; border-radius: 9px;
    border: 1px solid #e4e4e7; background: #fff;
    display: flex; align-items: center; justify-content: center;
    cursor: pointer; transition: all .15s; text-decoration: none; flex-shrink: 0;
}
.dark .blg-act { background: #27272a; border-color: #3f3f46; }
.blg-act svg { width: 14px; height: 14px; stroke: #71717a; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; transition: stroke .15s; }
.blg-act:hover { transform: translateY(-1px); }

.blg-act.act-preview:hover { background: #18181b; border-color: #18181b; }
.blg-act.act-preview:hover svg { stroke: #fff; }
.blg-act.act-live:hover { background: rgba(16,185,129,.1); border-color: #10b981; }
.blg-act.act-live:hover svg { stroke: #10b981; }
.blg-act.act-draft:hover { background: rgba(245,158,11,.1); border-color: #f59e0b; }
.blg-act.act-draft:hover svg { stroke: #f59e0b; }
.blg-act.act-edit:hover { background: rgba(59,130,246,.1); border-color: #3b82f6; }
.blg-act.act-edit:hover svg { stroke: #3b82f6; }
.blg-act.act-del:hover { background: rgba(239,68,68,.1); border-color: #ef4444; }
.blg-act.act-del:hover svg { stroke: #ef4444; }

/* Toggle icon for live/draft */
.blg-act.act-toggle-live svg { stroke: #10b981; }
.blg-act.act-toggle-draft svg { stroke: #a1a1aa; }

/* Checkbox (Voltiva Theme) */
.blg-chk {
    appearance: none;
    -webkit-appearance: none;
    width: 18px;
    height: 18px;
    border-radius: 5px;
    border: 1.5px solid #d4d4d8;
    background: #ffffff;
    cursor: pointer;
    display: inline-grid;
    place-content: center;
    transition: all 0.15s ease;
    vertical-align: middle;
    position: relative;
    flex-shrink: 0;
    margin: 0;
}
.blg-chk:hover {
    border-color: #000000;
    box-shadow: 0 0 0 2.5px rgba(0, 0, 0, 0.08);
}
.blg-chk:checked {
    background: #000000 !important;
    border-color: #000000 !important;
}
.blg-chk:checked::before {
    content: "";
    width: 5px;
    height: 9px;
    border: solid #ffffff;
    border-width: 0 2.2px 2.2px 0;
    transform: rotate(45deg) translate(-0.5px, -1px);
}
.dark .blg-chk {
    border-color: #52525b;
    background: #18181b;
}
.dark .blg-chk:hover {
    border-color: #ffffff;
    box-shadow: 0 0 0 2.5px rgba(255, 255, 255, 0.12);
}
.dark .blg-chk:checked {
    background: #ffffff !important;
    border-color: #ffffff !important;
}
.dark .blg-chk:checked::before {
    border-color: #000000;
}

/* Empty State */
.blg-empty { padding: 56px 16px; text-align: center; }
.blg-empty-icon {
    width: 64px; height: 64px; border-radius: 20px;
    background: #f4f4f5; margin: 0 auto 16px;
    display: flex; align-items: center; justify-content: center;
}
.dark .blg-empty-icon { background: #27272a; }
.blg-empty-icon svg { width: 28px; height: 28px; stroke: #a1a1aa; fill: none; stroke-width: 1.5; }

/* Pagination */
.blg-pagination { padding: 12px 16px; border-top: 1px solid #f4f4f5; }
.dark .blg-pagination { border-color: #27272a; }

/* ── Delete Modal ── */
.blg-modal-overlay {
    position: fixed; inset: 0; z-index: 99999;
    background: rgba(0,0,0,.6); backdrop-filter: blur(4px) saturate(1.2);
    display: flex; align-items: center; justify-content: center; padding: 16px;
    animation: fadeIn .15s ease;
    isolation: isolate;
}
/* ── Premium Delete Confirmation Modal ── */
.blg-modal-overlay {
    position: fixed;
    inset: 0;
    z-index: 100000;
    background: rgba(9, 9, 11, 0.72);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
    animation: blgModalFadeIn 0.18s ease;
    font-family: 'Figtree', system-ui, sans-serif;
}
@keyframes blgModalFadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
.blg-modal-card {
    background: #ffffff;
    border: 1px solid rgba(0, 0, 0, 0.08);
    border-radius: 26px;
    width: 100%;
    max-width: 440px;
    box-shadow: 0 24px 64px -12px rgba(0, 0, 0, 0.35), 0 0 0 1px rgba(0, 0, 0, 0.04);
    animation: blgModalPop 0.22s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
    overflow: hidden;
}
.dark .blg-modal-card {
    background: #141416;
    border-color: #27272a;
    box-shadow: 0 24px 64px -12px rgba(0, 0, 0, 0.7), 0 0 0 1px rgba(255, 255, 255, 0.1);
}
@keyframes blgModalPop {
    from {
        opacity: 0;
        transform: scale(0.93) translateY(10px);
    }
    to {
        opacity: 1;
        transform: scale(1) translateY(0);
    }
}
.blg-modal-close-btn {
    position: absolute;
    top: 18px;
    right: 18px;
    width: 32px;
    height: 32px;
    border-radius: 9px;
    border: 1px solid #e4e4e7;
    background: #f4f4f5;
    color: #71717a;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.15s ease;
}
.blg-modal-close-btn:hover {
    background: #e4e4e7;
    color: #18181b;
}
.dark .blg-modal-close-btn {
    background: #27272a;
    border-color: #3f3f46;
    color: #a1a1aa;
}
.dark .blg-modal-close-btn:hover {
    background: #3f3f46;
    color: #ffffff;
}
.blg-modal-icon-wrap {
    width: 62px;
    height: 62px;
    border-radius: 20px;
    background: rgba(239, 68, 68, 0.08);
    border: 1.5px solid rgba(239, 68, 68, 0.22);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 16px;
    box-shadow: 0 8px 24px -4px rgba(239, 68, 68, 0.2);
}
.dark .blg-modal-icon-wrap {
    background: rgba(239, 68, 68, 0.15);
    border-color: rgba(239, 68, 68, 0.35);
}
.blg-modal-pill-tag {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 3px 11px;
    border-radius: 999px;
    font-size: 11px;
    font-weight: 800;
    background: rgba(239, 68, 68, 0.09);
    color: #ef4444;
    text-transform: uppercase;
    letter-spacing: 0.06em;
    margin-bottom: 12px;
}
.dark .blg-modal-pill-tag {
    background: rgba(239, 68, 68, 0.18);
    color: #f87171;
}
.blg-modal-title {
    font-size: 20px;
    font-weight: 900;
    color: #18181b;
    margin: 0 0 8px;
    letter-spacing: -0.02em;
}
.dark .blg-modal-title {
    color: #ffffff;
}
.blg-modal-desc {
    font-size: 13.5px;
    color: #71717a;
    line-height: 1.6;
    margin: 0 0 20px;
}
.dark .blg-modal-desc {
    color: #a1a1aa;
}
.blg-modal-preview {
    background: #f9fafb;
    border: 1px solid #e4e4e7;
    border-radius: 14px;
    padding: 12px 14px;
    text-align: left;
    margin-bottom: 22px;
}
.dark .blg-modal-preview {
    background: #1c1c1f;
    border-color: #27272a;
}
.blg-modal-actions {
    display: flex;
    align-items: center;
    gap: 10px;
}
.blg-modal-btn-cancel {
    flex: 1;
    padding: 12px 18px;
    border-radius: 12px;
    font-size: 13.5px;
    font-weight: 700;
    background: #f4f4f5;
    color: #3f3f46;
    border: 1.5px solid #e4e4e7;
    cursor: pointer;
    transition: all 0.15s ease;
    font-family: inherit;
    text-align: center;
}
.blg-modal-btn-cancel:hover {
    background: #e4e4e7;
    color: #18181b;
}
.dark .blg-modal-btn-cancel {
    background: #27272a;
    color: #d4d4d8;
    border-color: #3f3f46;
}
.dark .blg-modal-btn-cancel:hover {
    background: #3f3f46;
    color: #ffffff;
}
.blg-modal-btn-delete {
    flex: 1.25;
    padding: 12px 20px;
    border-radius: 12px;
    font-size: 13.5px;
    font-weight: 700;
    background: #ef4444;
    color: #ffffff;
    border: none;
    cursor: pointer;
    box-shadow: 0 4px 16px rgba(239, 68, 68, 0.35);
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    transition: all 0.15s ease;
    font-family: inherit;
}
.blg-modal-btn-delete:hover {
    background: #dc2626;
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(239, 68, 68, 0.45);
}
.blg-modal-btn-delete .blg-btn-idle {
    display: inline-flex;
    align-items: center;
    gap: 7px;
}
.blg-modal-btn-delete .blg-btn-loading {
    display: none;
    align-items: center;
    gap: 6px;
}
</style>

<div class="blg-wrap">

    {{-- ── Breadcrumb ── --}}
    <nav style="display:flex;align-items:center;gap:6px;font-size:12px;color:#a1a1aa;margin-bottom:12px;">
        <a href="/admin" style="color:inherit;text-decoration:none;transition:color .15s;" onmouseover="this.style.color='#18181b'" onmouseout="this.style.color='#a1a1aa'">Dashboard</a>
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
        <span>Applications</span>
        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"/></svg>
        <span style="color:#18181b;font-weight:700;" class="dark:text-white">Blog Articles</span>
    </nav>

    {{-- ── Hero Banner ── --}}
    <div class="blg-hero">
        <div style="display:flex;align-items:center;gap:14px;">
            <div class="blg-icon-box">
                <svg viewBox="0 0 24 24" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1"/>
                    <path d="M21 20a2 2 0 01-2 2h0a2 2 0 01-2-2V7m4 13a2 2 0 002-2V9a2 2 0 00-2-2h-2"/>
                    <line x1="9" y1="8" x2="15" y2="8"/><line x1="9" y1="12" x2="15" y2="12"/><line x1="9" y1="16" x2="13" y2="16"/>
                </svg>
            </div>
            <div>
                <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap;">
                    <h1 style="margin:0;font-size:18px;font-weight:900;color:#18181b;letter-spacing:-0.02em;" class="dark:text-white">Blog Articles</h1>
                    <span class="blg-badge">
                        <span style="width:7px;height:7px;border-radius:50%;background:#10b981;display:inline-block;animation:pulse 2s infinite;"></span>
                        {{ $totalCount }} Total
                    </span>
                </div>
                <p style="margin:3px 0 0;font-size:12.5px;color:#71717a;">Publish, manage, and feature insights, guides, and company news.</p>
            </div>
        </div>
        <a href="{{ \App\Filament\Admin\Resources\BlogPosts\BlogPostResource::getUrl('create') }}" class="blg-btn-primary">
            <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
            Write New Article
        </a>
    </div>

    {{-- ── KPI Cards ── --}}
    <div class="blg-kpi-grid">
        {{-- Total --}}
        <div class="blg-kpi {{ $statusFilter === 'all' ? 'kpi-active' : '' }}" wire:click="filterByStatus('all')" style="cursor:pointer;">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:4px;">
                <span style="font-size:11.5px;font-weight:700;color:#a1a1aa;text-transform:uppercase;letter-spacing:.05em;">Total Articles</span>
                <div class="kpi-pill pill-dark">
                    <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2"/>
                        <line x1="9" y1="8" x2="15" y2="8"/><line x1="9" y1="12" x2="13" y2="12"/>
                    </svg>
                </div>
            </div>
            <div class="kpi-num" style="color:#18181b;" class="dark:text-white">{{ $totalCount }}</div>
            <hr class="kpi-divider">
            <div class="kpi-footer">
                <span style="font-size:11.5px;font-weight:700;color:#3f3f46;" class="dark:text-zinc-400">All Articles</span>
                <span style="font-size:11px;color:#a1a1aa;">Database records</span>
            </div>
        </div>

        {{-- Live --}}
        <div class="blg-kpi {{ $statusFilter === 'published' ? 'kpi-active' : '' }}" wire:click="filterByStatus('published')" style="cursor:pointer;">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:4px;">
                <span style="font-size:11.5px;font-weight:700;color:#a1a1aa;text-transform:uppercase;letter-spacing:.05em;">Live on Website</span>
                <div class="kpi-pill pill-green">
                    <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
            <div class="kpi-num" style="color:#10b981;">{{ $liveCount }}</div>
            <hr class="kpi-divider">
            <div class="kpi-footer">
                <span style="font-size:11.5px;font-weight:700;color:#10b981;">● Published</span>
                <span style="font-size:11px;color:#a1a1aa;">Publicly visible</span>
            </div>
        </div>

        {{-- Drafts --}}
        <div class="blg-kpi {{ $statusFilter === 'draft' ? 'kpi-active' : '' }}" wire:click="filterByStatus('draft')" style="cursor:pointer;">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:4px;">
                <span style="font-size:11.5px;font-weight:700;color:#a1a1aa;text-transform:uppercase;letter-spacing:.05em;">Drafts / Inactive</span>
                <div class="kpi-pill pill-amber">
                    <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
            </div>
            <div class="kpi-num" style="color:#f59e0b;">{{ $draftCount }}</div>
            <hr class="kpi-divider">
            <div class="kpi-footer">
                <span style="font-size:11.5px;font-weight:700;color:#f59e0b;">Drafts</span>
                <span style="font-size:11px;color:#a1a1aa;">Hidden from public</span>
            </div>
        </div>

        {{-- Views --}}
        <div class="blg-kpi">
            <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:4px;">
                <span style="font-size:11.5px;font-weight:700;color:#a1a1aa;text-transform:uppercase;letter-spacing:.05em;">Total Article Reads</span>
                <div class="kpi-pill pill-blue">
                    <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </div>
            </div>
            <div class="kpi-num" style="color:#3b82f6;">{{ number_format($totalViews) }}</div>
            <hr class="kpi-divider">
            <div class="kpi-footer">
                <span style="font-size:11.5px;font-weight:700;color:#3b82f6;">Reader Traffic</span>
                <span style="font-size:11px;color:#a1a1aa;">Cumulative views</span>
            </div>
        </div>
    </div>

    {{-- ── Filter Bar ── --}}
    <div class="blg-filter-bar">
        {{-- Search --}}
        <div class="blg-search-wrap">
            <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <input
                type="text"
                wire:model.live.debounce.300ms="search"
                placeholder="Search articles, keywords…"
                class="blg-search-input"
            >
        </div>

        {{-- Category Select --}}
        <select wire:model.live="categoryFilter" class="blg-select">
            <option value="all">All Categories</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </select>

        {{-- Status Pills --}}
        <div class="blg-pills">
            <button type="button" wire:click="filterByStatus('all')" class="blg-pill {{ $statusFilter === 'all' ? 'pill-on' : '' }}">
                All <span class="blg-count-tag ct-all">{{ $totalCount }}</span>
            </button>
            <button type="button" wire:click="filterByStatus('published')" class="blg-pill {{ $statusFilter === 'published' ? 'pill-on' : '' }}">
                <span class="blg-dot d-green"></span> Live <span class="blg-count-tag ct-green">{{ $liveCount }}</span>
            </button>
            <button type="button" wire:click="filterByStatus('draft')" class="blg-pill {{ $statusFilter === 'draft' ? 'pill-on' : '' }}">
                <span class="blg-dot d-amber"></span> Drafts <span class="blg-count-tag ct-amber">{{ $draftCount }}</span>
            </button>
        </div>

        @if($search || $categoryFilter !== 'all' || $statusFilter !== 'all')
            <button type="button" class="blg-reset-btn"
                wire:click="$set('search', ''); $set('categoryFilter', 'all'); $set('statusFilter', 'all')">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                Reset Filters
            </button>
        @endif
    </div>

    {{-- ── Table Card ── --}}
    <div class="blg-table-card">

        {{-- Table Card Header --}}
        <div class="blg-table-header">
            <div style="display:flex;align-items:center;gap:10px;">
                <div class="blg-table-title-icon">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1"/>
                        <path d="M21 20a2 2 0 01-2 2h0a2 2 0 01-2-2V7m4 13a2 2 0 002-2V9a2 2 0 00-2-2h-2"/>
                        <line x1="9" y1="8" x2="15" y2="8"/>
                        <line x1="9" y1="12" x2="15" y2="12"/>
                        <line x1="9" y1="16" x2="13" y2="16"/>
                    </svg>
                </div>
                <div>
                    <div style="font-size:14px;font-weight:800;color:#18181b;" class="dark:text-white">Articles Directory</div>
                    <div style="font-size:11px;color:#a1a1aa;margin-top:1px;">
                        Showing {{ $posts->firstItem() ?? 0 }}–{{ $posts->lastItem() ?? 0 }} of {{ $posts->total() }} blog posts
                    </div>
                </div>
            </div>
            <div style="display:flex;align-items:center;gap:10px;">
                @if(count($selectedPosts) > 0)
                    <button type="button" wire:click="deselectAll" class="blg-header-select-btn" title="Deselect all items">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="9 11 12 14 22 4"/>
                            <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/>
                        </svg>
                        <span>Deselect All</span>
                    </button>
                @else
                    <button type="button" wire:click="selectAllPosts" class="blg-header-select-btn" title="Select all items">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                        </svg>
                        <span>Select All</span>
                    </button>
                @endif
                <div class="blg-live-badge">
                    <svg viewBox="0 0 8 8" fill="currentColor"><circle cx="4" cy="4" r="4"><animate attributeName="r" values="4;2;4" dur="2s" repeatCount="indefinite"/><animate attributeName="opacity" values="1;.4;1" dur="2s" repeatCount="indefinite"/></circle></svg>
                    ⚡ Instant Live Sync
                </div>
            </div>
        </div>

        {{-- Table --}}
        <div style="overflow-x:auto;width:100%;">
            <table class="blg-table">
                <thead class="blg-thead">
                    <tr>
                        <th style="width:44px;padding-left:18px;">
                            <input type="checkbox" wire:model.live="selectAll" class="blg-chk">
                        </th>
                        <th style="width:88px;">THUMBNAIL</th>
                        <th style="min-width:320px;">ARTICLE TITLE &amp; EXCERPT</th>
                        <th style="min-width:140px;">CATEGORY</th>
                        <th style="min-width:110px;">STATUS</th>
                        <th style="min-width:90px;">VIEWS</th>
                        <th style="min-width:120px;">DATE</th>
                        <th style="min-width:160px;text-align:right;padding-right:18px;">ACTIONS</th>
                    </tr>
                </thead>
                <tbody class="blg-tbody">
                    @forelse($posts as $post)
                    @php
                        $seoScore  = $post->seo_score;
                        $seoCls    = $seoScore >= 80 ? 'seo-good' : ($seoScore >= 55 ? 'seo-mid' : 'seo-low');
                        $isSelected = in_array((string)$post->id, $selectedPosts);
                    @endphp
                    <tr class="{{ $isSelected ? 'row-selected' : '' }}">
                        {{-- Checkbox --}}
                        <td style="padding-left:18px;">
                            <input type="checkbox" wire:model.live="selectedPosts" value="{{ (string)$post->id }}" class="blg-chk">
                        </td>

                        {{-- Thumbnail --}}
                        <td>
                            @php
                                $imgUrl = $post->image ? url('/storage/' . ltrim($post->image, '/')) : null;
                            @endphp
                            <div class="blg-thumb" style="position:relative;overflow:hidden;">
                                @if($imgUrl)
                                    <img
                                        src="{{ $imgUrl }}"
                                        alt="{{ $post->image_alt ?: $post->title }}"
                                        loading="lazy"
                                        style="width:100%;height:100%;object-fit:cover;display:block;"
                                        onerror="this.style.display='none';this.nextElementSibling.style.display='flex';"
                                    >
                                    <div style="display:none;width:100%;height:100%;align-items:center;justify-content:center;flex-direction:column;gap:2px;">
                                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#a1a1aa" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="3" y="3" width="18" height="18" rx="2"/>
                                            <circle cx="8.5" cy="8.5" r="1.5"/>
                                            <polyline points="21 15 16 10 5 21"/>
                                        </svg>
                                    </div>
                                @else
                                    <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;flex-direction:column;gap:2px;">
                                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#a1a1aa" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2"/>
                                            <line x1="9" y1="8" x2="14" y2="8"/>
                                            <line x1="9" y1="12" x2="12" y2="12"/>
                                        </svg>
                                        <span style="font-size:9px;color:#c4c4c8;font-weight:600;letter-spacing:.03em;">NO IMG</span>
                                    </div>
                                @endif
                            </div>
                        </td>

                        {{-- Title + Excerpt + Meta --}}
                        <td>
                            <div style="max-width:480px;">
                                <a href="{{ \App\Filament\Admin\Resources\BlogPosts\BlogPostResource::getUrl('edit', ['record' => $post]) }}"
                                   class="blg-post-title">{{ $post->title }}</a>
                                @if($post->excerpt)
                                    <div class="blg-post-excerpt">{{ $post->excerpt }}</div>
                                @endif
                                <div class="blg-meta-row">
                                    <span class="blg-meta-item">
                                        <svg viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                        {{ $post->author_name ?: 'Admin' }}
                                    </span>
                                    <span class="blg-meta-dot">•</span>
                                    <span class="blg-meta-item">
                                        <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                        {{ $post->read_time }}
                                    </span>
                                    <span class="blg-meta-dot">•</span>
                                    <span class="blg-slug">/blog/{{ $post->slug }}</span>
                                    <span class="blg-meta-dot">•</span>
                                    <span class="blg-seo-tag {{ $seoCls }}">
                                        📊 SEO {{ $seoScore }}/100
                                    </span>
                                </div>
                            </div>
                        </td>

                        {{-- Category --}}
                        <td>
                            <span class="blg-cat-tag">
                                <svg viewBox="0 0 24 24"><path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A2 2 0 013 12V7a4 4 0 014-4z"/></svg>
                                {{ $post->category?->name ?? 'General' }}
                            </span>
                        </td>

                        {{-- Status --}}
                        <td>
                            @if($post->is_published)
                                <span class="blg-status-live">
                                    <span class="status-dot sd-green" style="animation:pulse 2s infinite;"></span>
                                    Live
                                </span>
                            @else
                                <span class="blg-status-draft">
                                    <span class="status-dot sd-amber"></span>
                                    Draft
                                </span>
                            @endif
                        </td>

                        {{-- Views --}}
                        <td>
                            <div class="blg-views">
                                <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                {{ number_format($post->views) }}
                            </div>
                        </td>

                        {{-- Date --}}
                        <td>
                            <div class="blg-date">
                                {{ ($post->published_at ?? $post->created_at)->format('d M, Y') }}
                            </div>
                            <div class="blg-date-rel">
                                {{ ($post->published_at ?? $post->created_at)->diffForHumans() }}
                            </div>
                        </td>

                        {{-- Actions --}}
                        <td style="text-align:right;padding-right:14px;">
                            <div class="blg-actions">
                                {{-- Preview --}}
                                <a href="{{ url('/blog/' . $post->slug) }}" target="_blank"
                                   class="blg-act act-preview" title="View Live Article">
                                    <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4"/>
                                        <polyline points="15 3 21 3 21 9"/>
                                        <line x1="10" y1="14" x2="21" y2="3"/>
                                    </svg>
                                </a>

                                {{-- Toggle Publish --}}
                                <button type="button" wire:click="toggleStatus({{ $post->id }})"
                                    class="blg-act {{ $post->is_published ? 'act-toggle-live' : 'act-toggle-draft' }}"
                                    title="{{ $post->is_published ? 'Unpublish to Draft' : 'Publish Live' }}">
                                    @if($post->is_published)
                                        <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M17 7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h10c2.76 0 5-2.24 5-5s-2.24-5-5-5z"/>
                                            <circle cx="17" cy="12" r="3" fill="#10b981" stroke="#10b981"/>
                                        </svg>
                                    @else
                                        <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M17 7H7c-2.76 0-5 2.24-5 5s2.24 5 5 5h10c2.76 0 5-2.24 5-5s-2.24-5-5-5z"/>
                                            <circle cx="7" cy="12" r="3" fill="#a1a1aa" stroke="#a1a1aa"/>
                                        </svg>
                                    @endif
                                </button>

                                {{-- Edit --}}
                                <a href="{{ \App\Filament\Admin\Resources\BlogPosts\BlogPostResource::getUrl('edit', ['record' => $post]) }}"
                                   class="blg-act act-edit" title="Edit Article">
                                    <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/>
                                        <path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/>
                                    </svg>
                                </a>

                                {{-- Delete --}}
                                <button type="button" wire:click="confirmSingleDelete({{ $post->id }})"
                                    class="blg-act act-del" title="Delete Article">
                                    <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="3 6 5 6 21 6"/>
                                        <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
                                        <path d="M10 11v6"/><path d="M14 11v6"/>
                                        <path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8">
                            <div class="blg-empty">
                                <div class="blg-empty-icon">
                                    <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                                    </svg>
                                </div>
                                <h4 style="font-size:16px;font-weight:800;color:#18181b;margin:0 0 6px;" class="dark:text-white">No Articles Found</h4>
                                <p style="font-size:13px;color:#71717a;margin:0 auto 18px;max-width:360px;line-height:1.6;">
                                    No blog articles match your current filters. Try adjusting your search or write a new article.
                                </p>
                                <a href="{{ \App\Filament\Admin\Resources\BlogPosts\BlogPostResource::getUrl('create') }}"
                                   class="blg-btn-primary" style="margin:0 auto;">
                                    <svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                    Write First Article
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($posts->hasPages())
            <div class="blg-pagination">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</div>

{{-- ── Floating Dock Multi-Select Bar (Voltiva Theme Styled) ── --}}
@if(count($selectedPosts) > 0)
<div class="blg-floating-dock">
    {{-- Selected Count Badge --}}
    <div class="blg-dock-badge">
        <span class="blg-dock-count-pill">{{ count($selectedPosts) }}</span>
        <span class="blg-dock-label">items selected</span>
    </div>

    {{-- Publish All --}}
    <button
        type="button"
        wire:click="bulkToggleStatus(true)"
        class="blg-dock-btn dock-publish"
        title="Publish all selected articles live"
    >
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
            <circle cx="12" cy="12" r="3"/>
        </svg>
        <span>Publish All</span>
    </button>

    {{-- Hide All --}}
    <button
        type="button"
        wire:click="bulkToggleStatus(false)"
        class="blg-dock-btn dock-hide"
        title="Hide all selected articles (move to drafts)"
    >
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
            <line x1="1" y1="1" x2="23" y2="23"/>
        </svg>
        <span>Hide All</span>
    </button>

    {{-- Delete Selected --}}
    <button
        type="button"
        wire:click="confirmBulkDelete"
        class="blg-dock-btn dock-delete"
        title="Delete all selected articles permanently"
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

    {{-- Cancel --}}
    <button
        type="button"
        wire:click="deselectAll"
        class="blg-dock-btn dock-cancel"
        title="Deselect all"
    >
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="6" x2="6" y2="18"/>
            <line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
        <span>Cancel</span>
    </button>
</div>
@endif

{{-- ── Delete Confirmation Modal ── --}}
@if($showDeleteModal)
<div class="blg-modal-overlay" wire:click.self="cancelDelete">
    <div class="blg-modal-card">
        {{-- Close ✕ button --}}
        <button type="button" wire:click="cancelDelete" class="blg-modal-close-btn" title="Close modal">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>

        <div style="padding: 34px 28px 28px; text-align: center;">
            {{-- Warning Tag --}}
            <div>
                <span class="blg-modal-pill-tag">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                        <line x1="12" y1="9" x2="12" y2="13"/>
                        <line x1="12" y1="17" x2="12.01" y2="17"/>
                    </svg>
                    Permanent Action
                </span>
            </div>

            {{-- Icon --}}
            <div class="blg-modal-icon-wrap">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="3 6 5 6 21 6"/>
                    <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
                    <path d="M10 11v6"/><path d="M14 11v6"/>
                    <path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2"/>
                </svg>
            </div>

            {{-- Title --}}
            <h3 class="blg-modal-title">
                @if($isBulkDelete)
                    Delete {{ count($selectedPosts) }} Articles?
                @else
                    Delete Article?
                @endif
            </h3>

            {{-- Description --}}
            <p class="blg-modal-desc">
                @if($isBulkDelete)
                    Are you sure you want to permanently delete <strong style="color:#18181b;" class="dark:text-white">{{ count($selectedPosts) }} selected blog articles</strong>? This action cannot be undone.
                @else
                    Are you sure you want to permanently delete this article? This action <strong style="color:#ef4444;">cannot be undone</strong>.
                @endif
            </p>

            {{-- Preview box --}}
            @if($isBulkDelete)
                <div class="blg-modal-preview">
                    <div style="display:flex;align-items:center;gap:12px;">
                        <div style="width:38px;height:38px;border-radius:11px;background:rgba(239,68,68,0.1);display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2">
                                <polyline points="3 6 5 6 21 6"/>
                                <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
                            </svg>
                        </div>
                        <div style="text-align:left;">
                            <div style="font-size:13px;font-weight:800;color:#18181b;" class="dark:text-white">{{ count($selectedPosts) }} Articles Selected</div>
                            <div style="font-size:11px;color:#71717a;" class="dark:text-[#a1a1aa]">All associated views, content &amp; SEO data will be removed.</div>
                        </div>
                    </div>
                </div>
            @elseif($postToDeleteTitle)
                <div class="blg-modal-preview">
                    <div style="display:flex;align-items:flex-start;gap:10px;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#a1a1aa" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:2px;">
                            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                            <line x1="16" y1="13" x2="8" y2="13"/>
                            <line x1="16" y1="17" x2="8" y2="17"/>
                            <polyline points="10 9 9 9 8 9"/>
                        </svg>
                        <div style="text-align:left;">
                            <div style="font-size:13px;font-weight:700;color:#18181b;line-height:1.45;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;" class="dark:text-white">
                                {{ $postToDeleteTitle }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Action Buttons --}}
            <div class="blg-modal-actions">
                <button
                    type="button"
                    wire:click="cancelDelete"
                    class="blg-modal-btn-cancel"
                >
                    Cancel
                </button>
                <button
                    type="button"
                    wire:click="executeDelete"
                    wire:loading.attr="disabled"
                    class="blg-modal-btn-delete"
                >
                    <span wire:loading.remove wire:target="executeDelete" class="blg-btn-idle">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
                        </svg>
                        <span>Yes, Delete Permanently</span>
                    </span>
                    <span wire:loading.inline-flex wire:target="executeDelete" class="blg-btn-loading">
                        <svg style="animation:blgSpin 1s linear infinite;" width="14" height="14" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="10" stroke="rgba(255,255,255,.3)" stroke-width="3"/>
                            <path d="M12 2a10 10 0 0110 10" stroke="#fff" stroke-width="3" stroke-linecap="round"/>
                        </svg>
                        <span>Deleting…</span>
                    </span>
                </button>
            </div>
        </div>
    </div>
</div>
@endif

<style>
@keyframes blgFadeIn { from{opacity:0} to{opacity:1} }
@keyframes blgZoomIn { from{opacity:0;transform:scale(.93)} to{opacity:1;transform:scale(1)} }
@keyframes blgSpin   { from{transform:rotate(0deg)} to{transform:rotate(360deg)} }
@keyframes pulse { 0%,100%{opacity:1} 50%{opacity:.4} }
@keyframes spin  { from{transform:rotate(0deg)} to{transform:rotate(360deg)} }
</style>
</x-filament-panels::page>
