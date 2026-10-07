<x-filament-panels::page>

<style>
/* ── Design System Tokens (Voltiva Dash) ── */
.seo-wrap * { box-sizing: border-box; }
.seo-wrap   { font-family: 'Figtree', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; }

/* ── Hero Header ── */
.seo-hero {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1.25rem;
    background: #ffffff;
    border: 1px solid #e4e4e7;
    border-radius: 18px;
    padding: 1.25rem 1.6rem;
    margin-bottom: 1.25rem;
    box-shadow: 0 1px 3px rgba(0,0,0,.03);
    flex-wrap: wrap;
}
.dark .seo-hero { background: #18181b; border-color: #27272a; }

.seo-icon-box {
    width: 48px; height: 48px;
    border-radius: 14px;
    background: linear-gradient(135deg, #18181b 0%, #3f3f46 100%);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 4px 14px rgba(0,0,0,.15);
}
.dark .seo-icon-box { background: linear-gradient(135deg, #27272a 0%, #3f3f46 100%); border: 1px solid #52525b; }
.seo-icon-box svg { width: 22px; height: 22px; stroke: #fff; fill: none; }

.seo-btn-primary {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 9px 18px; border-radius: 12px;
    font-size: 13px; font-weight: 700; text-decoration: none;
    background: #18181b; color: #fff;
    border: 1px solid #18181b;
    transition: all .18s ease; cursor: pointer;
    box-shadow: 0 2px 8px rgba(0,0,0,.12);
}
.seo-btn-primary:hover { background: #000; box-shadow: 0 4px 14px rgba(0,0,0,.22); transform: translateY(-1px); }
.dark .seo-btn-primary { background: #fff; color: #000; border-color: #fff; }
.dark .seo-btn-primary:hover { background: #e4e4e7; }
.seo-btn-primary svg { width: 15px; height: 15px; stroke: currentColor; fill: none; flex-shrink: 0; }

.seo-btn-outline {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 8px 16px; border-radius: 11px;
    font-size: 13px; font-weight: 600; text-decoration: none;
    background: #fff; color: #3f3f46;
    border: 1px solid #e4e4e7;
    transition: all .18s ease; cursor: pointer;
}
.seo-btn-outline:hover { background: #f4f4f5; color: #18181b; border-color: #d4d4d8; }
.dark .seo-btn-outline { background: #27272a; color: #e4e4e7; border-color: #3f3f46; }
.dark .seo-btn-outline:hover { background: #3f3f46; color: #fff; }

/* ── KPI Grid ── */
.seo-kpi-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1rem;
    margin-bottom: 1.5rem;
}
@media (max-width: 1024px) { .seo-kpi-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 640px)  { .seo-kpi-grid { grid-template-columns: 1fr; } }

.seo-kpi {
    background: #ffffff; border: 1px solid #e4e4e7; border-radius: 16px;
    padding: 1.15rem 1.3rem;
    transition: all .2s ease;
    box-shadow: 0 1px 3px rgba(0,0,0,.03);
}
.dark .seo-kpi { background: #18181b; border-color: #27272a; }
.seo-kpi:hover { transform: translateY(-2px); box-shadow: 0 6px 18px rgba(0,0,0,.07); border-color: #a1a1aa; }
.dark .seo-kpi:hover { border-color: #52525b; box-shadow: 0 6px 18px rgba(0,0,0,.25); }

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

/* ── Navigation Tabs ── */
.seo-tabs-bar {
    display: flex;
    align-items: center;
    gap: 8px;
    border-bottom: 1px solid #e4e4e7;
    margin-bottom: 1.25rem;
    overflow-x: auto;
    padding-bottom: 2px;
}
.dark .seo-tabs-bar { border-color: #27272a; }

.seo-tab-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 18px;
    border-radius: 12px 12px 0 0;
    font-size: 13.5px;
    font-weight: 600;
    color: #71717a;
    background: transparent;
    border: none;
    border-bottom: 2px solid transparent;
    cursor: pointer;
    transition: all .18s ease;
    white-space: nowrap;
}
.seo-tab-btn:hover {
    color: #18181b;
    background: #f4f4f5;
}
.dark .seo-tab-btn { color: #a1a1aa; }
.dark .seo-tab-btn:hover { color: #fff; background: #27272a; }

.seo-tab-btn.active {
    color: #18181b;
    border-bottom-color: #18181b;
    font-weight: 700;
    background: #ffffff;
}
.dark .seo-tab-btn.active {
    color: #ffffff;
    border-bottom-color: #ffffff;
    background: #18181b;
}

.tab-badge {
    padding: 2px 7px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    background: #e4e4e7;
    color: #3f3f46;
}
.dark .tab-badge { background: #27272a; color: #d4d4d8; }
.seo-tab-btn.active .tab-badge {
    background: #18181b;
    color: #fff;
}
.dark .seo-tab-btn.active .tab-badge {
    background: #ffffff;
    color: #000;
}
.tab-badge-accent {
    background: rgba(64,186,199,.15);
    color: #40bac7;
}

/* ── Filter Toolbar ── */
.seo-toolbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    margin-bottom: 1.25rem;
    flex-wrap: wrap;
}
.seo-filter-group {
    display: flex;
    align-items: center;
    gap: 6px;
    background: #f4f4f5;
    padding: 4px;
    border-radius: 12px;
}
.dark .seo-filter-group { background: #27272a; }

.filter-pill {
    padding: 6px 14px;
    border-radius: 9px;
    font-size: 12.5px;
    font-weight: 600;
    color: #71717a;
    background: transparent;
    border: none;
    cursor: pointer;
    transition: all .15s ease;
}
.dark .filter-pill { color: #a1a1aa; }
.filter-pill:hover { color: #18181b; }
.dark .filter-pill:hover { color: #fff; }
.filter-pill.active {
    background: #ffffff;
    color: #18181b;
    font-weight: 700;
    box-shadow: 0 1px 3px rgba(0,0,0,.08);
}
.dark .filter-pill.active {
    background: #18181b;
    color: #ffffff;
    border: 1px solid #3f3f46;
}

.seo-search-input {
    display: flex;
    align-items: center;
    gap: 8px;
    background: #fff;
    border: 1px solid #e4e4e7;
    border-radius: 11px;
    padding: 6px 12px;
    width: 280px;
}
.dark .seo-search-input { background: #18181b; border-color: #27272a; }
.seo-search-input input {
    border: none; outline: none; background: transparent;
    font-size: 13px; color: inherit; width: 100%;
}

/* ── Refined Table Design ── */
.seo-table-card {
    background: #ffffff;
    border: 1px solid #e4e4e7;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0,0,0,.03);
}
.dark .seo-table-card { background: #18181b; border-color: #27272a; }

.seo-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    font-size: 13px;
    text-align: left;
}
.seo-table th {
    background: #fbfbfb;
    color: #71717a;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .06em;
    padding: 14px 18px;
    border-bottom: 1px solid #e4e4e7;
    white-space: nowrap;
}
.dark .seo-table th { background: #202024; color: #a1a1aa; border-color: #27272a; }

.seo-table td {
    padding: 15px 18px;
    border-bottom: 1px solid #f4f4f5;
    vertical-align: middle;
}
.dark .seo-table td { border-color: #27272a; }
.seo-table tr:hover td { background: #fcfcfd; }
.dark .seo-table tr:hover td { background: #202024; }

/* Page Name & Route cell */
.seo-page-title-link {
    font-size: 13.5px;
    font-weight: 700;
    color: #18181b;
    text-decoration: none;
    transition: color .15s ease;
    display: inline-block;
    margin-bottom: 3px;
}
.seo-page-title-link:hover {
    color: #000;
    text-decoration: underline;
}
.dark .seo-page-title-link { color: #f4f4f5; }
.dark .seo-page-title-link:hover { color: #ffffff; }

.route-badge {
    display: inline-flex;
    align-items: center;
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
    font-size: 11px;
    font-weight: 700;
    padding: 2px 7px;
    border-radius: 6px;
    background: rgba(14, 165, 233, 0.1);
    color: #0284c7;
    border: 1px solid rgba(14, 165, 233, 0.2);
}
.dark .route-badge {
    background: rgba(14, 165, 233, 0.18);
    color: #38bdf8;
    border-color: rgba(56, 189, 248, 0.3);
}

.route-key-tag {
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
    font-size: 11px;
    color: #a1a1aa;
    font-weight: 600;
}

/* Meta Title & Description */
.seo-meta-title-text {
    font-size: 13.5px;
    font-weight: 700;
    color: #18181b;
    line-height: 1.4;
    margin-bottom: 5px;
    max-width: 320px;
}
.dark .seo-meta-title-text { color: #f4f4f5; }

.seo-meta-desc-text {
    font-size: 12.5px;
    color: #52525b;
    line-height: 1.45;
    margin-bottom: 5px;
    max-width: 340px;
}
.dark .seo-meta-desc-text { color: #a1a1aa; }

/* Character Tags (Matching Reference Image 2) */
.char-tag-optimal {
    display: inline-flex;
    align-items: center;
    padding: 2.5px 8px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 700;
    background: #eaf7f0;
    color: #059669;
    border: 1px solid #d1fae5;
}
.dark .char-tag-optimal {
    background: rgba(16, 185, 129, 0.18);
    color: #34d399;
    border-color: rgba(52, 211, 153, 0.3);
}

.char-tag-warn {
    display: inline-flex;
    align-items: center;
    padding: 2.5px 8px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 700;
    background: #fffbeb;
    color: #d97706;
    border: 1px solid #fef3c7;
}
.dark .char-tag-warn {
    background: rgba(245, 158, 11, 0.18);
    color: #fbbf24;
    border-color: rgba(251, 191, 36, 0.3);
}

.char-tag-muted {
    display: inline-flex;
    align-items: center;
    padding: 2.5px 8px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 600;
    background: #f4f4f5;
    color: #71717a;
    border: 1px solid #e4e4e7;
}
.dark .char-tag-muted {
    background: #27272a;
    color: #a1a1aa;
    border-color: #3f3f46;
}

/* Robots 1-Click Capsule (Matching Reference Image 2) */
.robots-toggle-pill {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 14px;
    border-radius: 9999px;
    font-size: 11.5px;
    font-weight: 700;
    cursor: pointer;
    border: 1px solid transparent;
    transition: all .15s ease;
    white-space: nowrap;
}
.robots-pill-index {
    background: #eaf7f0;
    color: #059669;
    border-color: #d1fae5;
}
.robots-pill-index:hover {
    background: #def4e8;
    transform: translateY(-1px);
    box-shadow: 0 2px 6px rgba(16, 185, 129, 0.15);
}
.dark .robots-pill-index {
    background: rgba(16, 185, 129, 0.16);
    color: #34d399;
    border-color: rgba(52, 211, 153, 0.28);
}
.dark .robots-pill-index:hover {
    background: rgba(16, 185, 129, 0.25);
}

.robots-pill-noindex {
    background: #fef2f2;
    color: #dc2626;
    border-color: #fee2e2;
}
.robots-pill-noindex:hover {
    background: #fee2e2;
    transform: translateY(-1px);
    box-shadow: 0 2px 6px rgba(239, 68, 68, 0.15);
}
.dark .robots-pill-noindex {
    background: rgba(239, 68, 68, 0.16);
    color: #f87171;
    border-color: rgba(248, 113, 113, 0.28);
}

/* SEO Health Score Pill & Bar (Matching Reference Image 2) */
.seo-health-wrap {
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}
.health-score-pill {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 3px 10px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
    border: 1px solid transparent;
    line-height: 1.2;
}
.health-pill-high {
    background: #eaf7f0;
    color: #059669;
    border-color: #d1fae5;
}
.dark .health-pill-high {
    background: rgba(16, 185, 129, 0.18);
    color: #34d399;
    border-color: rgba(52, 211, 153, 0.3);
}
.health-pill-mid {
    background: #fffbeb;
    color: #d97706;
    border-color: #fef3c7;
}
.dark .health-pill-mid {
    background: rgba(245, 158, 11, 0.18);
    color: #fbbf24;
    border-color: rgba(251, 191, 36, 0.3);
}
.health-pill-low {
    background: #fef2f2;
    color: #dc2626;
    border-color: #fee2e2;
}
.dark .health-pill-low {
    background: rgba(239, 68, 68, 0.18);
    color: #f87171;
    border-color: rgba(248, 113, 113, 0.3);
}

.health-bar-bg {
    width: 38px;
    height: 3.5px;
    background: #e4e4e7;
    border-radius: 999px;
    margin-top: 5px;
    overflow: hidden;
}
.dark .health-bar-bg { background: #3f3f46; }
.health-bar-fill-high { height: 100%; border-radius: 999px; background: #10b981; }
.health-bar-fill-mid  { height: 100%; border-radius: 999px; background: #f59e0b; }
.health-bar-fill-low  { height: 100%; border-radius: 999px; background: #ef4444; }

/* Actions Group & Edit SEO Button (Matching Reference Image 2) */
.action-buttons-group {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    justify-content: flex-end;
}
.seo-action-edit-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 7px 15px;
    border-radius: 9px;
    font-size: 12.5px;
    font-weight: 600;
    background: #ffffff;
    color: #18181b;
    border: 1px solid #e4e4e7;
    text-decoration: none;
    box-shadow: 0 1px 2px rgba(0,0,0,0.03);
    transition: all .15s ease;
    white-space: nowrap;
}
.seo-action-edit-btn:hover {
    background: #f4f4f5;
    border-color: #d4d4d8;
    color: #000000;
    transform: translateY(-1px);
    box-shadow: 0 3px 8px rgba(0,0,0,0.06);
}
.dark .seo-action-edit-btn {
    background: #27272a;
    color: #f4f4f5;
    border-color: #3f3f46;
}
.dark .seo-action-edit-btn:hover {
    background: #323238;
    color: #ffffff;
    border-color: #52525b;
}
.seo-action-edit-btn svg {
    width: 13px;
    height: 13px;
    stroke: currentColor;
    fill: none;
    stroke-width: 2.2;
    flex-shrink: 0;
}

.action-icon-link {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    border: 1px solid #e4e4e7;
    background: #ffffff;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #71717a;
    text-decoration: none;
    transition: all .15s ease;
}
.action-icon-link:hover {
    background: #18181b;
    color: #ffffff;
    border-color: #18181b;
    transform: translateY(-1px);
}
.dark .action-icon-link {
    background: #27272a;
    border-color: #3f3f46;
    color: #d4d4d8;
}
.dark .action-icon-link:hover {
    background: #ffffff;
    color: #000000;
    border-color: #ffffff;
}

/* ── Custom Voltiva Pagination Bar ── */
.custom-seo-pagination {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    padding: 14px 20px;
    border-top: 1px solid #e4e4e7;
    background: #ffffff;
    flex-wrap: wrap;
}
.dark .custom-seo-pagination {
    background: #18181b;
    border-color: #27272a;
}

.pg-info-group {
    display: flex;
    align-items: center;
    gap: 16px;
    flex-wrap: wrap;
}

.pg-count-text {
    font-size: 13px;
    color: #71717a;
    font-weight: 500;
}
.dark .pg-count-text { color: #a1a1aa; }

.pg-number-highlight {
    font-weight: 700;
    color: #18181b;
}
.dark .pg-number-highlight { color: #ffffff; }

/* ── Custom Animated Per-Page Dropdown Drawer (Matching Image 1) ── */
.pg-per-page-box {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    position: relative;
}
.pg-per-page-label {
    font-size: 13px;
    color: #71717a;
    font-weight: 500;
}
.dark .pg-per-page-label { color: #a1a1aa; }

.pg-dropdown-wrapper {
    position: relative;
    display: inline-block;
}

.pg-dropdown-trigger {
    display: inline-flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    min-width: 60px;
    height: 32px;
    padding: 0 10px;
    background: #ffffff;
    border: 1px solid #d4d4d8;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 700;
    color: #18181b;
    cursor: pointer;
    transition: all .15s ease;
    box-shadow: 0 1px 2px rgba(0,0,0,.04);
}
.pg-dropdown-trigger:hover {
    border-color: #18181b;
    background: #fafafa;
}
.pg-trigger-open {
    border-color: #18181b !important;
    box-shadow: 0 0 0 3px rgba(24, 24, 27, 0.08) !important;
}
.dark .pg-dropdown-trigger {
    background: #27272a;
    border-color: #3f3f46;
    color: #f4f4f5;
}
.dark .pg-dropdown-trigger:hover,
.dark .pg-trigger-open {
    border-color: #a1a1aa !important;
    background: #2e2e33;
    box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.08) !important;
}

.pg-dropdown-chevron {
    transition: transform .2s ease;
    color: #71717a;
    flex-shrink: 0;
}
.pg-chevron-rotated {
    transform: rotate(180deg);
}

.pg-dropdown-drawer {
    position: absolute;
    bottom: calc(100% + 6px);
    left: 0;
    min-width: 125px;
    background: #ffffff;
    border: 1px solid #e4e4e7;
    border-radius: 12px;
    box-shadow: 0 12px 28px -4px rgba(0, 0, 0, 0.15), 0 6px 12px -4px rgba(0, 0, 0, 0.08);
    padding: 5px;
    z-index: 999;
    display: flex;
    flex-direction: column;
    gap: 2px;
}
.dark .pg-dropdown-drawer {
    background: #1f1f23;
    border-color: #3f3f46;
    box-shadow: 0 16px 36px -4px rgba(0, 0, 0, 0.5);
}

.pg-drawer-header {
    font-size: 10px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: .08em;
    color: #a1a1aa;
    padding: 5px 8px 3px 8px;
}
.dark .pg-drawer-header { color: #71717a; }

.pg-drawer-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 6px 9px;
    border-radius: 7px;
    font-size: 12.5px;
    font-weight: 600;
    color: #3f3f46;
    background: transparent;
    border: none;
    cursor: pointer;
    transition: all .12s ease;
    text-align: left;
}
.pg-drawer-item:hover {
    background: #f4f4f5;
    color: #18181b;
}
.dark .pg-drawer-item { color: #d4d4d8; }
.dark .pg-drawer-item:hover {
    background: #2b2b30;
    color: #ffffff;
}

.pg-drawer-item-active {
    background: #18181b !important;
    color: #ffffff !important;
}
.dark .pg-drawer-item-active {
    background: #3f3f46 !important;
    color: #ffffff !important;
}
.pg-drawer-item-active svg {
    stroke: #ffffff;
}

/* Alpine transition animations */
.pg-pop-enter {
    transition: all 0.15s cubic-bezier(0.16, 1, 0.3, 1);
}
.pg-pop-enter-start {
    opacity: 0;
    transform: translateY(6px) scale(0.97);
}
.pg-pop-enter-end {
    opacity: 1;
    transform: translateY(0) scale(1);
}
.pg-pop-leave {
    transition: all 0.1s ease-in;
    opacity: 0;
    transform: translateY(4px) scale(0.97);
}

.pg-controls {
    display: flex;
    align-items: center;
    gap: 6px;
    flex-wrap: wrap;
}

.pg-nav-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 7px 14px;
    border-radius: 10px;
    font-size: 12.5px;
    font-weight: 600;
    background: #ffffff;
    color: #3f3f46;
    border: 1px solid #e4e4e7;
    cursor: pointer;
    transition: all .15s ease;
    text-decoration: none;
    box-shadow: 0 1px 2px rgba(0,0,0,.03);
}
.dark .pg-nav-btn {
    background: #27272a;
    color: #e4e4e7;
    border-color: #3f3f46;
}
.pg-nav-btn:hover:not(:disabled) {
    background: #18181b;
    color: #ffffff;
    border-color: #18181b;
    box-shadow: 0 2px 6px rgba(0,0,0,.12);
}
.dark .pg-nav-btn:hover:not(:disabled) {
    background: #ffffff;
    color: #000000;
    border-color: #ffffff;
}

.pg-disabled {
    opacity: 0.42;
    cursor: not-allowed !important;
    pointer-events: none;
    background: #fafafa !important;
    border-color: #e4e4e7 !important;
    color: #a1a1aa !important;
    box-shadow: none !important;
}
.dark .pg-disabled {
    background: #202023 !important;
    border-color: #27272a !important;
    color: #52525b !important;
}

.pg-numbers-list {
    display: flex;
    align-items: center;
    gap: 5px;
}

.pg-num-btn {
    min-width: 34px;
    height: 34px;
    padding: 0 8px;
    border-radius: 9px;
    font-size: 13px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    background: #ffffff;
    color: #3f3f46;
    border: 1px solid #e4e4e7;
    cursor: pointer;
    transition: all .15s ease;
    box-shadow: 0 1px 2px rgba(0,0,0,.03);
}
.dark .pg-num-btn {
    background: #27272a;
    color: #e4e4e7;
    border-color: #3f3f46;
}
.pg-num-btn:hover:not(.pg-num-active) {
    background: #f4f4f5;
    color: #000000;
    border-color: #d4d4d8;
}
.dark .pg-num-btn:hover:not(.pg-num-active) {
    background: #3f3f46;
    color: #ffffff;
    border-color: #52525b;
}

.pg-num-active {
    background: #18181b !important;
    color: #ffffff !important;
    border-color: #18181b !important;
    font-weight: 700;
    box-shadow: 0 2px 8px rgba(0,0,0,.18) !important;
}
.dark .pg-num-active {
    background: #ffffff !important;
    color: #000000 !important;
    border-color: #ffffff !important;
}

.pg-ellipsis {
    padding: 0 6px;
    font-size: 13px;
    color: #71717a;
    font-weight: 700;
    user-select: none;
}

/* ── Webmaster Hub Form Styles ── */
.webmaster-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.25rem;
}
@media (max-width: 1024px) { .webmaster-grid { grid-template-columns: 1fr; } }

.wm-card {
    background: #ffffff;
    border: 1px solid #e4e4e7;
    border-radius: 16px;
    padding: 1.5rem;
    box-shadow: 0 1px 3px rgba(0,0,0,.03);
}
.dark .wm-card { background: #18181b; border-color: #27272a; }

.wm-header {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 1.25rem;
    padding-bottom: 0.85rem;
    border-bottom: 1px solid #f4f4f5;
}
.dark .wm-header { border-color: #27272a; }

.wm-icon-badge {
    width: 34px; height: 34px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    background: #f4f4f5; color: #18181b;
}
.dark .wm-icon-badge { background: #27272a; color: #fff; }

.wm-field {
    margin-bottom: 1.1rem;
}
.wm-label {
    display: block;
    font-size: 12.5px;
    font-weight: 600;
    color: #3f3f46;
    margin-bottom: 6px;
}
.dark .wm-label { color: #d4d4d8; }

.wm-input, .wm-textarea {
    width: 100%;
    padding: 9px 12px;
    font-size: 13px;
    border-radius: 10px;
    border: 1px solid #e4e4e7;
    background: #fff;
    color: inherit;
    font-family: inherit;
    outline: none;
    transition: border-color .15s ease;
}
.dark .wm-input, .dark .wm-textarea {
    background: #202023;
    border-color: #3f3f46;
}
.wm-input:focus, .wm-textarea:focus {
    border-color: #18181b;
}
.dark .wm-input:focus, .dark .wm-textarea:focus {
    border-color: #a1a1aa;
}
.wm-textarea {
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
    font-size: 12.5px;
    line-height: 1.5;
}

.wm-toggle-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 0;
}
</style>

<div class="seo-wrap">
    {{-- Hero Banner --}}
    <div class="seo-hero">
        <div style="display: flex; align-items: center; gap: 1rem;">
            <div class="seo-icon-box">
                <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div>
            <div>
                <h1 style="font-size: 1.35rem; font-weight: 600; margin: 0; color: inherit; letter-spacing: -0.02em;">
                    SEO Management Hub
                </h1>
                <p style="font-size: 13px; color: #71717a; margin: 3px 0 0 0;">
                    Manage meta tags, OpenGraph previews, JSON-LD structured schemas, and webmaster tools across the entire platform.
                </p>
            </div>
        </div>

        <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
            <a href="{{ url('/') }}" target="_blank" class="seo-btn-outline">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                    <polyline points="15 3 21 3 21 9"></polyline>
                    <line x1="10" y1="14" x2="21" y2="3"></line>
                </svg>
                <span>Preview Website</span>
            </a>
            <button type="button" wire:click="generateSitemap" wire:loading.attr="disabled" class="seo-btn-outline" title="Regenerate dynamic XML sitemap">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/>
                </svg>
                <span wire:loading.remove wire:target="generateSitemap">Sync Sitemap</span>
                <span wire:loading wire:target="generateSitemap">Syncing...</span>
            </button>
            <a href="{{ url('/sitemap.xml') }}" target="_blank" class="seo-btn-primary">
                <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                    <polyline points="2 17 12 22 22 17"></polyline>
                    <polyline points="2 12 12 17 22 12"></polyline>
                </svg>
                <span>XML Sitemap</span>
            </a>
        </div>
    </div>

    {{-- KPI Stat Cards --}}
    <div class="seo-kpi-grid">
        {{-- Card 1: Tracked URLs --}}
        <div class="seo-kpi">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
                <span style="font-size: 12.5px; font-weight: 600; color: #71717a;">Tracked URLs</span>
                <div class="kpi-icon-pill kpi-pill-dark">
                    <svg viewBox="0 0 24 24"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                </div>
            </div>
            <div style="font-size: 1.7rem; font-weight: 600; line-height: 1.1; margin-bottom: 4px;">
                {{ $stats['total_urls'] }} <span style="font-size: 13px; font-weight: 500; color: #71717a;">Total</span>
            </div>
            <div style="font-size: 11.5px; color: #71717a;">
                {{ $stats['pages_count'] }}p • {{ $stats['products_count'] }}prd • {{ $stats['blogs_count'] }}b All Entities
            </div>
        </div>

        {{-- Card 2: SEO Health Score --}}
        <div class="seo-kpi">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
                <span style="font-size: 12.5px; font-weight: 600; color: #71717a;">SEO Health Score</span>
                <div class="kpi-icon-pill kpi-pill-green">
                    <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                </div>
            </div>
            <div style="font-size: 1.7rem; font-weight: 600; line-height: 1.1; margin-bottom: 4px; color: #10b981;">
                {{ $stats['health_score'] }} <span style="font-size: 14px; font-weight: 500; color: #71717a;">/100</span>
            </div>
            <div style="font-size: 11.5px; color: #71717a;">
                Optimal Weighted Catalog
            </div>
        </div>

        {{-- Card 3: Google Indexable --}}
        <div class="seo-kpi">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
                <span style="font-size: 12.5px; font-weight: 600; color: #71717a;">Google Indexable</span>
                <div class="kpi-icon-pill kpi-pill-teal">
                    <svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                </div>
            </div>
            <div style="font-size: 1.7rem; font-weight: 600; line-height: 1.1; margin-bottom: 4px;">
                {{ $stats['total_indexable'] }} <span style="font-size: 13px; font-weight: 500; color: #71717a;">/ {{ $stats['total_urls'] }}</span>
            </div>
            <div style="font-size: 11.5px; color: #71717a;">
                index, follow Active & Visible
            </div>
        </div>

        {{-- Card 4: Social Share Ready --}}
        <div class="seo-kpi">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
                <span style="font-size: 12.5px; font-weight: 600; color: #71717a;">Social Share Ready</span>
                <div class="kpi-icon-pill kpi-pill-amber">
                    <svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                </div>
            </div>
            <div style="font-size: 1.7rem; font-weight: 600; line-height: 1.1; margin-bottom: 4px;">
                {{ $stats['total_social_ready'] }} <span style="font-size: 13px; font-weight: 500; color: #71717a;">Cards</span>
            </div>
            <div style="font-size: 11.5px; color: #71717a;">
                WhatsApp / X Images Configured
            </div>
        </div>
    </div>

    {{-- Tabs Bar --}}
    <div class="seo-tabs-bar">
        <button type="button" wire:click="setTab('pages')" class="seo-tab-btn {{ $activeTab === 'pages' ? 'active' : '' }}">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
            </svg>
            <span>Static Website Pages</span>
            <span class="tab-badge">{{ $stats['pages_count'] }}</span>
        </button>

        <button type="button" wire:click="setTab('products')" class="seo-tab-btn {{ $activeTab === 'products' ? 'active' : '' }}">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <path d="M16 10a4 4 0 0 1-8 0"></path>
            </svg>
            <span>Dynamic Products SEO</span>
            <span class="tab-badge">{{ $stats['products_count'] }} Items</span>
        </button>

        <button type="button" wire:click="setTab('blogs')" class="seo-tab-btn {{ $activeTab === 'blogs' ? 'active' : '' }}">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
            </svg>
            <span>Dynamic Blog Articles SEO</span>
            <span class="tab-badge">{{ $stats['blogs_count'] }} Posts</span>
        </button>

        <a href="{{ url('/admin/webmaster-analytics') }}" wire:navigate class="seo-tab-btn" style="text-decoration: none;" title="Open Dedicated Webmaster & Analytics Module">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="3"></circle>
                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
            </svg>
            <span>Webmaster & Analytics Tools</span>
            <span class="tab-badge tab-badge-accent">Dedicated Hub ↗</span>
        </a>
    </div>

    @if($activeTab !== 'webmaster')
        {{-- Filter Toolbar --}}
        <div class="seo-toolbar">
            <div class="seo-filter-group">
                <button type="button" wire:click="$set('statusFilter', 'all')" class="filter-pill {{ $statusFilter === 'all' ? 'active' : '' }}">
                    All
                </button>
                <button type="button" wire:click="$set('statusFilter', 'optimal')" class="filter-pill {{ $statusFilter === 'optimal' ? 'active' : '' }}">
                    Optimal ≥80%
                </button>
                <button type="button" wire:click="$set('statusFilter', 'needs_work')" class="filter-pill {{ $statusFilter === 'needs_work' ? 'active' : '' }}">
                    Needs Work
                </button>
                <button type="button" wire:click="$set('statusFilter', 'indexed')" class="filter-pill {{ $statusFilter === 'indexed' ? 'active' : '' }}">
                    Indexed
                </button>
            </div>

            <div style="display: flex; align-items: center; gap: 10px;">
                <div class="seo-search-input">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#71717a" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input type="text" wire:model.live.debounce.300ms="search" placeholder="Search pages, routes, titles...">
                </div>
            </div>
        </div>
    @endif

    {{-- TAB 1: Static Website Pages --}}
    @if($activeTab === 'pages')
        <div class="seo-table-card">
            <div style="overflow-x: auto;">
                <table class="seo-table">
                    <thead>
                        <tr>
                            <th style="min-width: 220px;">Page Name & Route</th>
                            <th style="min-width: 280px;">Meta Title & Length</th>
                            <th style="min-width: 300px;">Meta Description</th>
                            <th style="text-align: center; width: 130px;">Robots (1-Click)</th>
                            <th style="text-align: center; width: 110px;">SEO Health</th>
                            <th style="text-align: right; width: 120px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pages as $page)
                            @php
                                $titleLen = mb_strlen($page->meta_title ?? '');
                                $descLen  = mb_strlen($page->meta_description ?? '');
                                $score    = $page->seo_score ?? $page->calculateSeoScore();
                                $scoreClass = $score >= 80 ? 'health-pill-high' : ($score >= 50 ? 'health-pill-mid' : 'health-pill-low');
                                $fillClass  = $score >= 80 ? 'health-bar-fill-high' : ($score >= 50 ? 'health-bar-fill-mid' : 'health-bar-fill-low');
                            @endphp
                            <tr>
                                <td>
                                    <div class="seo-page-title-link">
                                        {{ $page->page_name }}
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 6px; font-size: 11.5px; color: #71717a;">
                                        <span class="route-badge">{{ $page->route_path ?: '/' }}</span>
                                        <span class="route-key-tag">[{{ $page->page_key }}]</span>
                                        <a href="{{ url($page->route_path ?: '/') }}" target="_blank" class="action-icon-link" style="width: 22px; height: 22px; border-radius: 6px;" title="Open live URL">
                                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                                        </a>
                                    </div>
                                </td>

                                <td>
                                    <div class="seo-meta-title-text">
                                        {{ $page->meta_title ?: '— No title defined —' }}
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 6px; flex-wrap: wrap;">
                                        @if($titleLen >= 30 && $titleLen <= 65)
                                            <span class="char-tag-optimal">{{ $titleLen }} chars (Optimal)</span>
                                        @elseif($titleLen > 0)
                                            <span class="char-tag-warn">{{ $titleLen }} chars</span>
                                        @else
                                            <span class="char-tag-muted">0 chars</span>
                                        @endif
                                        <span class="char-tag-muted">{{ $page->schema_type ?: 'WebPage' }}</span>
                                    </div>
                                </td>

                                <td>
                                    <div class="seo-meta-desc-text">
                                        {{ \Illuminate\Support\Str::limit($page->meta_description ?: 'No meta description set yet.', 120) }}
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 6px;">
                                        @if($descLen >= 80 && $descLen <= 165)
                                            <span class="char-tag-optimal">{{ $descLen }} chars (Optimal)</span>
                                        @elseif($descLen > 0)
                                            <span class="char-tag-warn">{{ $descLen }} chars</span>
                                        @else
                                            <span class="char-tag-muted">0 chars</span>
                                        @endif
                                    </div>
                                </td>

                                <td style="text-align: center;">
                                    <button type="button" wire:click="toggleRobots({{ $page->id }}, 'page')" class="robots-toggle-pill {{ $page->robots_index ? 'robots-pill-index' : 'robots-pill-noindex' }}" title="Click to toggle index/noindex">
                                        @if($page->robots_index)
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                            <span>index, follow</span>
                                        @else
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            <span>noindex</span>
                                        @endif
                                    </button>
                                </td>

                                <td style="text-align: center;">
                                    <div class="seo-health-wrap">
                                        <span class="health-score-pill {{ $scoreClass }}">{{ $score }}%</span>
                                        <div class="health-bar-bg">
                                            <div class="{{ $fillClass }}" style="width: {{ $score }}%;"></div>
                                        </div>
                                    </div>
                                </td>

                                <td style="text-align: right;">
                                    <a href="{{ \App\Filament\Admin\Resources\PageSeos\PageSeoResource::getUrl('edit', ['record' => $page->id]) }}" class="seo-action-edit-btn">
                                        <svg viewBox="0 0 24 24"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                        <span>Edit SEO</span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align: center; padding: 40px; color: #71717a;">
                                    No static pages matching current filters.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @include('filament.admin.resources.page-seos.components.pagination', ['paginator' => $pages, 'pageName' => 'pages_page'])
        </div>
    @endif

    {{-- TAB 2: Dynamic Products SEO --}}
    @if($activeTab === 'products')
        <div class="seo-table-card">
            <div style="overflow-x: auto;">
                <table class="seo-table">
                    <thead>
                        <tr>
                            <th style="width: 70px;">Pack</th>
                            <th style="min-width: 220px;">Product & Route</th>
                            <th style="min-width: 260px;">Google Title (Smart Fallback)</th>
                            <th style="min-width: 280px;">Meta Description Snippet</th>
                            <th style="text-align: center; width: 130px;">Robots (1-Click)</th>
                            <th style="text-align: center; width: 110px;">SEO Health</th>
                            <th style="text-align: right; width: 120px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $prod)
                            @php
                                $titleLen = mb_strlen($prod->meta_title ?: ($prod->title . ' | Luxury Switch Catalog | Voltiva'));
                                $descLen  = mb_strlen($prod->meta_description ?: strip_tags($prod->description ?? 'Premium modular electrical accessory with safety compliance.'));
                                $score = $prod->seo_score;
                                $scoreClass = $score >= 80 ? 'health-pill-high' : ($score >= 50 ? 'health-pill-mid' : 'health-pill-low');
                                $fillClass  = $score >= 80 ? 'health-bar-fill-high' : ($score >= 50 ? 'health-bar-fill-mid' : 'health-bar-fill-low');
                                $imgSrc = $prod->image ? (str_starts_with($prod->image, 'http') ? $prod->image : asset('storage/' . $prod->image)) : asset('assets/images/default-product.png');
                            @endphp
                            <tr>
                                <td>
                                    <div style="width: 44px; height: 44px; border-radius: 10px; background: #f4f4f5; border: 1px solid #e4e4e7; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                        <img src="{{ $imgSrc }}" alt="{{ $prod->title }}" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='{{ asset('assets/images/default-product.png') }}'">
                                    </div>
                                </td>

                                <td>
                                    <div class="seo-page-title-link">
                                        {{ $prod->title }}
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 6px; font-size: 11.5px; color: #71717a;">
                                        <span class="route-badge">/product/{{ $prod->id }}</span>
                                        @if($prod->code)
                                            <span class="route-key-tag">SKU: {{ $prod->code }}</span>
                                        @endif
                                        <a href="{{ url('/product/' . $prod->id) }}" target="_blank" class="action-icon-link" style="width: 22px; height: 22px; border-radius: 6px;" title="Open live product">
                                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                                        </a>
                                    </div>
                                </td>

                                <td>
                                    <div class="seo-meta-title-text">
                                        {{ $prod->meta_title ?: $prod->title . ' | Luxury Switch Catalog | Voltiva' }}
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 6px; flex-wrap: wrap;">
                                        @if($titleLen >= 30 && $titleLen <= 65)
                                            <span class="char-tag-optimal">{{ $titleLen }} chars (Optimal)</span>
                                        @elseif($titleLen > 0)
                                            <span class="char-tag-warn">{{ $titleLen }} chars</span>
                                        @endif
                                        <span class="{{ $prod->meta_title ? 'char-tag-optimal' : 'char-tag-muted' }}">
                                            {{ $prod->meta_title ? 'Custom Title' : 'Smart Fallback' }}
                                        </span>
                                    </div>
                                </td>

                                <td>
                                    <div class="seo-meta-desc-text">
                                        {{ \Illuminate\Support\Str::limit($prod->meta_description ?: strip_tags($prod->description ?? 'Premium modular electrical accessory with safety compliance.'), 110) }}
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 6px;">
                                        @if($descLen >= 80 && $descLen <= 165)
                                            <span class="char-tag-optimal">{{ $descLen }} chars (Optimal)</span>
                                        @elseif($descLen > 0)
                                            <span class="char-tag-warn">{{ $descLen }} chars</span>
                                        @endif
                                        <span class="{{ $prod->meta_description ? 'char-tag-optimal' : 'char-tag-muted' }}">
                                            {{ $prod->meta_description ? 'Custom' : 'Auto Excerpt' }}
                                        </span>
                                    </div>
                                </td>

                                <td style="text-align: center;">
                                    <button type="button" wire:click="toggleRobots({{ $prod->id }}, 'product')" class="robots-toggle-pill {{ ($prod->robots_index ?? true) ? 'robots-pill-index' : 'robots-pill-noindex' }}" title="Click to toggle index/noindex">
                                        @if($prod->robots_index ?? true)
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                            <span>index, follow</span>
                                        @else
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            <span>noindex</span>
                                        @endif
                                    </button>
                                </td>

                                <td style="text-align: center;">
                                    <div class="seo-health-wrap">
                                        <span class="health-score-pill {{ $scoreClass }}">{{ $score }}%</span>
                                        <div class="health-bar-bg">
                                            <div class="{{ $fillClass }}" style="width: {{ $score }}%;"></div>
                                        </div>
                                    </div>
                                </td>

                                <td style="text-align: right;">
                                    <a href="{{ \App\Filament\Admin\Resources\Products\ProductResource::getUrl('edit', ['record' => $prod->id]) }}" class="seo-action-edit-btn">
                                        <svg viewBox="0 0 24 24"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                        <span>Edit SEO</span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align: center; padding: 40px; color: #71717a;">
                                    No products found matching filters.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @include('filament.admin.resources.page-seos.components.pagination', ['paginator' => $products, 'pageName' => 'products_page'])
        </div>
    @endif

    {{-- TAB 3: Dynamic Blog Articles SEO --}}
    @if($activeTab === 'blogs')
        <div class="seo-table-card">
            <div style="overflow-x: auto;">
                <table class="seo-table">
                    <thead>
                        <tr>
                            <th style="width: 70px;">Cover</th>
                            <th style="min-width: 220px;">Article & Route</th>
                            <th style="min-width: 260px;">Google Title (Smart Fallback)</th>
                            <th style="min-width: 280px;">Meta Description Snippet</th>
                            <th style="text-align: center; width: 130px;">Robots (1-Click)</th>
                            <th style="text-align: center; width: 110px;">SEO Health</th>
                            <th style="text-align: right; width: 120px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($blogs as $blog)
                            @php
                                $titleLen = mb_strlen($blog->meta_title ?: ($blog->title . ' | Voltiva Journal'));
                                $descLen  = mb_strlen($blog->meta_description ?: strip_tags($blog->excerpt ?: $blog->content));
                                $score = $blog->seo_score;
                                $scoreClass = $score >= 80 ? 'health-pill-high' : ($score >= 50 ? 'health-pill-mid' : 'health-pill-low');
                                $fillClass  = $score >= 80 ? 'health-bar-fill-high' : ($score >= 50 ? 'health-bar-fill-mid' : 'health-bar-fill-low');
                                $imgSrc = $blog->image ? (str_starts_with($blog->image, 'http') ? $blog->image : asset('storage/' . $blog->image)) : asset('assets/images/default-blog.png');
                            @endphp
                            <tr>
                                <td>
                                    <div style="width: 44px; height: 44px; border-radius: 10px; background: #f4f4f5; border: 1px solid #e4e4e7; overflow: hidden; display: flex; align-items: center; justify-content: center;">
                                        <img src="{{ $imgSrc }}" alt="{{ $blog->title }}" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.src='{{ asset('assets/images/default-blog.png') }}'">
                                    </div>
                                </td>

                                <td>
                                    <div class="seo-page-title-link">
                                        {{ $blog->title }}
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 6px; font-size: 11.5px; color: #71717a;">
                                        <span class="route-badge">/blog/{{ $blog->slug }}</span>
                                        @if($blog->category)
                                            <span class="route-key-tag" style="color: #40bac7;">{{ $blog->category->name }}</span>
                                        @endif
                                        <a href="{{ url('/blog/' . $blog->slug) }}" target="_blank" class="action-icon-link" style="width: 22px; height: 22px; border-radius: 6px;" title="Open live article">
                                            <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                                        </a>
                                    </div>
                                </td>

                                <td>
                                    <div class="seo-meta-title-text">
                                        {{ $blog->meta_title ?: $blog->title . ' | Voltiva Journal' }}
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 6px; flex-wrap: wrap;">
                                        @if($titleLen >= 30 && $titleLen <= 65)
                                            <span class="char-tag-optimal">{{ $titleLen }} chars (Optimal)</span>
                                        @elseif($titleLen > 0)
                                            <span class="char-tag-warn">{{ $titleLen }} chars</span>
                                        @endif
                                        <span class="{{ $blog->meta_title ? 'char-tag-optimal' : 'char-tag-muted' }}">
                                            {{ $blog->meta_title ? 'Custom Title' : 'Smart Fallback' }}
                                        </span>
                                    </div>
                                </td>

                                <td>
                                    <div class="seo-meta-desc-text">
                                        {{ \Illuminate\Support\Str::limit($blog->meta_description ?: strip_tags($blog->excerpt ?: $blog->content), 110) }}
                                    </div>
                                    <div style="display: flex; align-items: center; gap: 6px;">
                                        @if($descLen >= 80 && $descLen <= 165)
                                            <span class="char-tag-optimal">{{ $descLen }} chars (Optimal)</span>
                                        @elseif($descLen > 0)
                                            <span class="char-tag-warn">{{ $descLen }} chars</span>
                                        @endif
                                        <span class="{{ $blog->meta_description ? 'char-tag-optimal' : 'char-tag-muted' }}">
                                            {{ $blog->meta_description ? 'Custom' : 'Auto Excerpt' }}
                                        </span>
                                    </div>
                                </td>

                                <td style="text-align: center;">
                                    <button type="button" wire:click="toggleRobots({{ $blog->id }}, 'blog')" class="robots-toggle-pill {{ ($blog->robots_index ?? true) ? 'robots-pill-index' : 'robots-pill-noindex' }}" title="Click to toggle index/noindex">
                                        @if($blog->robots_index ?? true)
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                            <span>index, follow</span>
                                        @else
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            <span>noindex</span>
                                        @endif
                                    </button>
                                </td>

                                <td style="text-align: center;">
                                    <div class="seo-health-wrap">
                                        <span class="health-score-pill {{ $scoreClass }}">{{ $score }}%</span>
                                        <div class="health-bar-bg">
                                            <div class="{{ $fillClass }}" style="width: {{ $score }}%;"></div>
                                        </div>
                                    </div>
                                </td>

                                <td style="text-align: right;">
                                    <a href="{{ \App\Filament\Admin\Resources\BlogPosts\BlogPostResource::getUrl('edit', ['record' => $blog->id]) }}" class="seo-action-edit-btn">
                                        <svg viewBox="0 0 24 24"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>
                                        <span>Edit SEO</span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" style="text-align: center; padding: 40px; color: #71717a;">
                                    No blog articles found matching filters.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @include('filament.admin.resources.page-seos.components.pagination', ['paginator' => $blogs, 'pageName' => 'blogs_page'])
        </div>
    @endif

    {{-- TAB 4: Webmaster & Analytics Tools Dedicated Hub --}}
    @if($activeTab === 'webmaster')
        <div class="webmaster-grid">
            {{-- Card 1: Search Engine Webmaster Verifications --}}
            <div class="wm-card">
                <div class="wm-header">
                    <div class="wm-icon-badge">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    </div>
                    <div>
                        <h3 style="margin: 0; font-size: 14px; font-weight: 700;">1. Search Engine Webmaster Verifications</h3>
                        <p style="margin: 2px 0 0 0; font-size: 12px; color: #71717a;">Verify site ownership across major search engines</p>
                    </div>
                </div>

                <div class="wm-field">
                    <label class="wm-label">Google Search Console Verification Code / HTML Meta</label>
                    <input type="text" wire:model.defer="webmaster.google_site_verification" class="wm-input" placeholder="e.g. google-site-verification=abc123XYZ or token">
                </div>

                <div class="wm-field">
                    <label class="wm-label">Bing Webmaster Code</label>
                    <input type="text" wire:model.defer="webmaster.bing_site_verification" class="wm-input" placeholder="e.g. 5D8F9A7B3C2E1D...">
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                    <div class="wm-field">
                        <label class="wm-label">Pinterest Verification</label>
                        <input type="text" wire:model.defer="webmaster.pinterest_verify_code" class="wm-input" placeholder="p:domain_verify code">
                    </div>
                    <div class="wm-field">
                        <label class="wm-label">Yandex Verification</label>
                        <input type="text" wire:model.defer="webmaster.yandex_verify_code" class="wm-input" placeholder="yandex-verification code">
                    </div>
                </div>

                <button type="button" wire:click="saveWebmasterSettings" class="seo-btn-primary" style="margin-top: 6px;">
                    <svg viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                    <span>Save Webmaster Settings</span>
                </button>
            </div>

            {{-- Card 2: Google Analytics 4 & Tag Manager --}}
            <div class="wm-card">
                <div class="wm-header">
                    <div class="wm-icon-badge">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                    </div>
                    <div>
                        <h3 style="margin: 0; font-size: 14px; font-weight: 700;">2. Google Analytics 4 (GA4) & Tag Manager (GTM)</h3>
                        <p style="margin: 2px 0 0 0; font-size: 12px; color: #71717a;">Real-time traffic analytics and custom tag deployments</p>
                    </div>
                </div>

                <div class="wm-toggle-row">
                    <div>
                        <div style="font-weight: 600; font-size: 13px;">Enable Google Analytics 4 (GA4)</div>
                        <div style="font-size: 11.5px; color: #71717a;">Injects official gtag.js tracking snippet</div>
                    </div>
                    <input type="checkbox" wire:model.defer="webmaster.ga4_enabled" style="width: 18px; height: 18px;">
                </div>

                <div class="wm-field">
                    <label class="wm-label">GA4 Measurement ID</label>
                    <input type="text" wire:model.defer="webmaster.google_analytics_id" class="wm-input" placeholder="G-XXXXXXXXXX">
                </div>

                <div class="wm-toggle-row" style="margin-top: 4px;">
                    <div>
                        <div style="font-weight: 600; font-size: 13px;">Enable Google Tag Manager (GTM)</div>
                        <div style="font-size: 11.5px; color: #71717a;">Injects GTM script into &lt;head&gt; and noscript into &lt;body&gt;</div>
                    </div>
                    <input type="checkbox" wire:model.defer="webmaster.gtm_enabled" style="width: 18px; height: 18px;">
                </div>

                <div class="wm-field">
                    <label class="wm-label">GTM Container ID</label>
                    <input type="text" wire:model.defer="webmaster.gtm_container_id" class="wm-input" placeholder="GTM-XXXXXXX">
                </div>

                <button type="button" wire:click="saveWebmasterSettings" class="seo-btn-primary" style="margin-top: 6px;">
                    <svg viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                    <span>Save Analytics Settings</span>
                </button>
            </div>

            {{-- Card 3: Meta (Facebook & Instagram) Pixel --}}
            <div class="wm-card">
                <div class="wm-header">
                    <div class="wm-icon-badge">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path></svg>
                    </div>
                    <div>
                        <h3 style="margin: 0; font-size: 14px; font-weight: 700;">3. Meta (Facebook & Instagram) Pixel</h3>
                        <p style="margin: 2px 0 0 0; font-size: 12px; color: #71717a;">Track ad conversions and custom audience retargeting</p>
                    </div>
                </div>

                <div class="wm-toggle-row">
                    <div>
                        <div style="font-weight: 600; font-size: 13px;">Enable Meta Pixel Tracking</div>
                        <div style="font-size: 11.5px; color: #71717a;">Fires PageView event on all public customer visits</div>
                    </div>
                    <input type="checkbox" wire:model.defer="webmaster.meta_pixel_enabled" style="width: 18px; height: 18px;">
                </div>

                <div class="wm-field">
                    <label class="wm-label">Meta Pixel ID</label>
                    <input type="text" wire:model.defer="webmaster.facebook_pixel_id" class="wm-input" placeholder="e.g. 123456789012345">
                </div>

                <button type="button" wire:click="saveWebmasterSettings" class="seo-btn-primary" style="margin-top: 6px;">
                    <svg viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                    <span>Save Pixel Settings</span>
                </button>
            </div>

            {{-- Card 4: Dynamic XML Sitemap Engine & Controls --}}
            <div class="wm-card">
                <div class="wm-header">
                    <div class="wm-icon-badge" style="background: rgba(64,186,199,.15); color: #40bac7;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                    </div>
                    <div style="flex: 1;">
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px;">
                            <h3 style="margin: 0; font-size: 14px; font-weight: 700;">Dynamic XML Sitemap Engine</h3>
                            <span class="char-tag-optimal" style="font-size: 11px;">
                                {{ $sitemapStats['total_urls'] ?? 0 }} URLs Indexed
                            </span>
                        </div>
                        <p style="margin: 2px 0 0 0; font-size: 12px; color: #71717a;">
                            Real-time synchronization across Pages, Products, Categories &amp; Articles
                        </p>
                    </div>
                </div>

                {{-- URL Breakdown Tags --}}
                <div style="display: flex; align-items: center; gap: 6px; flex-wrap: wrap; margin-bottom: 12px;">
                    <span class="char-tag-muted" style="font-size: 11.5px;">
                        <strong>{{ $sitemapStats['pages_count'] ?? 0 }}</strong> Static Pages
                    </span>
                    <span class="char-tag-muted" style="font-size: 11.5px;">
                        <strong>{{ $sitemapStats['products_count'] ?? 0 }}</strong> Products
                    </span>
                    <span class="char-tag-muted" style="font-size: 11.5px;">
                        <strong>{{ $sitemapStats['blogs_count'] ?? 0 }}</strong> Articles
                    </span>
                    <span class="char-tag-muted" style="font-size: 11.5px;">
                        <strong>{{ $sitemapStats['categories_count'] ?? 0 }}</strong> Categories
                    </span>
                </div>

                {{-- Endpoint Box --}}
                <div style="background: #f4f4f5; border: 1px solid #e4e4e7; border-radius: 12px; padding: 12px 14px; margin-bottom: 14px;">
                    <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 4px;">
                        <span style="font-size: 11px; font-weight: 700; color: #71717a; text-transform: uppercase;">Public Dynamic Endpoint</span>
                        <span style="font-size: 11px; color: #a1a1aa;">Protocol: Sitemaps 0.9 + Image</span>
                    </div>
                    <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px;">
                        <code style="font-size: 12.5px; font-weight: 700; color: #18181b; word-break: break-all;">
                            {{ url('/sitemap.xml') }}
                        </code>
                        <a href="{{ url('/sitemap.xml') }}" target="_blank" style="color: #71717a;" title="Open in browser">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                        </a>
                    </div>
                </div>

                {{-- Action Controls --}}
                <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                    <button type="button" wire:click="generateSitemap" wire:loading.attr="disabled" class="seo-btn-primary" style="font-size: 12px; padding: 8px 14px;">
                        <svg viewBox="0 0 24 24"><path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/></svg>
                        <span wire:loading.remove wire:target="generateSitemap">Regenerate Dynamic Cache</span>
                        <span wire:loading wire:target="generateSitemap">Regenerating...</span>
                    </button>

                    <button type="button" wire:click="pingSearchEngines" wire:loading.attr="disabled" class="seo-btn-outline" style="font-size: 12px; padding: 8px 14px;" title="Ping Google &amp; Bing about sitemap changes">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="2"></circle><path d="M16.24 7.76a6 6 0 0 1 0 8.49m-8.48-.01a6 6 0 0 1 0-8.49m11.31-2.82a10 10 0 0 1 0 14.14m-14.14 0a10 10 0 0 1 0-14.14"></path></svg>
                        <span wire:loading.remove wire:target="pingSearchEngines">Ping Search Engines</span>
                        <span wire:loading wire:target="pingSearchEngines">Pinging...</span>
                    </button>

                    <a href="{{ url('/sitemap.xml') }}" target="_blank" class="seo-btn-outline" style="font-size: 12px; padding: 8px 14px;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        <span>View Raw XML</span>
                    </a>

                    <a href="https://search.google.com/search-console/sitemaps" target="_blank" class="seo-btn-outline" style="font-size: 12px; padding: 8px 14px;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                        <span>Google Search Console</span>
                    </a>
                </div>
            </div>

            {{-- Card 5: Robots.txt Directives Editor --}}
            <div class="wm-card" style="grid-column: 1 / -1;">
                <div class="wm-header">
                    <div class="wm-icon-badge">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="4 17 10 11 4 5"></polyline><line x1="12" y1="19" x2="20" y2="19"></line></svg>
                    </div>
                    <div style="flex: 1;">
                        <h3 style="margin: 0; font-size: 14px; font-weight: 700;">Robots.txt Directives Editor</h3>
                        <p style="margin: 2px 0 0 0; font-size: 12px; color: #71717a;">Control crawler behavior for Googlebot, Bingbot, and AI crawlers</p>
                    </div>
                    <div style="display: flex; gap: 6px;">
                        <button type="button" wire:click="applyRobotsPreset('recommended')" class="seo-btn-outline" style="font-size: 11.5px; padding: 5px 10px;">
                            Recommended Preset
                        </button>
                        <button type="button" wire:click="applyRobotsPreset('allow_all')" class="seo-btn-outline" style="font-size: 11.5px; padding: 5px 10px;">
                            Allow All
                        </button>
                    </div>
                </div>

                <div class="wm-field">
                    <textarea wire:model.defer="robotsContent" rows="6" class="wm-textarea" placeholder="User-agent: *&#10;Disallow: /admin/&#10;Allow: /"></textarea>
                </div>

                <div style="display: flex; align-items: center; justify-content: space-between;">
                    <span style="font-size: 12px; color: #71717a;">URL: <code>{{ url('/robots.txt') }}</code></span>
                    <button type="button" wire:click="saveRobotsTxt" class="seo-btn-primary">
                        <svg viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                        <span>Save Robots.txt</span>
                    </button>
                </div>
            </div>

            {{-- Card 6: Custom Tracking Scripts --}}
            <div class="wm-card" style="grid-column: 1 / -1;">
                <div class="wm-header">
                    <div class="wm-icon-badge">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                    </div>
                    <div>
                        <h3 style="margin: 0; font-size: 14px; font-weight: 700;">4. Custom Tracking Scripts (Head & Body)</h3>
                        <p style="margin: 2px 0 0 0; font-size: 12px; color: #71717a;">Inject custom CSS, JavaScript, chat widgets, or conversion pixels</p>
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div class="wm-field">
                        <label class="wm-label">Header Scripts (&lt;head&gt;)</label>
                        <textarea wire:model.defer="webmaster.custom_head_code" rows="5" class="wm-textarea" placeholder="<script>/* custom head tag */</script>"></textarea>
                    </div>
                    <div class="wm-field">
                        <label class="wm-label">Footer Scripts (before &lt;/body&gt;)</label>
                        <textarea wire:model.defer="webmaster.custom_footer_code" rows="5" class="wm-textarea" placeholder="<script>/* custom body tag */</script>"></textarea>
                    </div>
                </div>

                <button type="button" wire:click="saveWebmasterSettings" class="seo-btn-primary">
                    <svg viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                    <span>Save Custom Scripts</span>
                </button>
            </div>
        </div>
    @endif
</div>
</x-filament-panels::page>
