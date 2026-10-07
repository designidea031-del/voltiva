<x-filament-panels::page>
@php
    $totalCount = \App\Models\Lead::count();
    $newCount = \App\Models\Lead::where('status', 'new')->count();
    $contactedCount = \App\Models\Lead::where('status', 'contacted')->count();
    $closedCount = \App\Models\Lead::where('status', 'closed')->count();
    $leads = $this->leads;
@endphp

<div class="leads-module-container text-gray-800 dark:text-zinc-200" style="font-family: 'Figtree', system-ui, -apple-system, sans-serif;">
    <style>
        .leads-hero-banner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1.25rem;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 1.25rem 1.5rem;
            margin-bottom: 1.35rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
            flex-wrap: wrap;
        }
        .dark .leads-hero-banner {
            background: #18181b;
            border-color: #27272a;
        }
        .leads-hero-icon-badge {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #000000;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
            flex-shrink: 0;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.12);
        }
        .dark .leads-hero-icon-badge {
            background: #27272a;
            color: #ffffff;
            border: 1px solid #3f3f46;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.3);
        }
        .leads-count-chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 3px 9px;
            border-radius: 999px;
            background: #f4f4f5;
            color: #18181b;
            border: 1px solid #e4e4e7;
        }
        .dark .leads-count-chip {
            background: #27272a;
            color: #f4f4f5;
            border-color: #3f3f46;
        }
        .leads-metrics-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.15rem;
            margin-bottom: 1.35rem;
        }
        @media (max-width: 1024px) {
            .leads-metrics-grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 640px) {
            .leads-metrics-grid { grid-template-columns: 1fr; }
        }
        .leads-kpi-card {
            display: flex;
            flex-direction: column;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 1.15rem 1.25rem;
            text-decoration: none;
            transition: all 0.2s ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04);
            cursor: pointer;
        }
        .dark .leads-kpi-card {
            background: #18181b;
            border-color: #27272a;
        }
        .leads-kpi-card:hover {
            transform: translateY(-2px);
            border-color: #000000;
            box-shadow: 0 8px 20px -4px rgba(0, 0, 0, 0.08);
        }
        .dark .leads-kpi-card:hover {
            border-color: #525252;
            box-shadow: 0 8px 20px -4px rgba(0, 0, 0, 0.35);
        }
        .leads-kpi-card.active-filter {
            border-color: #000000;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.15), 0 8px 18px -4px rgba(0, 0, 0, 0.08);
        }
        .dark .leads-kpi-card.active-filter {
            border-color: #ffffff;
            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.2), 0 8px 18px -4px rgba(0, 0, 0, 0.35);
        }
        .kpi-icon-pill {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.95rem;
            position: relative;
        }
        .kpi-icon-pill.orange { background: #000000; color: #ffffff; }
        .dark .kpi-icon-pill.orange { background: #27272a; color: #ffffff; border: 1px solid #3f3f46; }
        .kpi-icon-pill.red    { background: rgba(239, 68, 68, 0.12); color: #ef4444; }
        .kpi-icon-pill.blue   { background: rgba(59, 130, 246, 0.12); color: #3b82f6; }
        .kpi-icon-pill.green  { background: rgba(16, 185, 129, 0.12); color: #10b981; }

        .kpi-pulse-ring {
            position: absolute;
            inset: -3px;
            border-radius: 12px;
            border: 2px solid #ef4444;
            animation: leadPulseRing 1.8s infinite;
            opacity: 0;
        }
        @keyframes leadPulseRing {
            0% { transform: scale(0.9); opacity: 0.8; }
            50% { transform: scale(1.15); opacity: 0; }
            100% { transform: scale(1.15); opacity: 0; }
        }

        .kpi-number {
            font-size: 1.85rem;
            font-weight: 800;
            line-height: 1.1;
            letter-spacing: -0.02em;
        }
        .kpi-number.text-red   { color: #ef4444; }
        .kpi-number.text-blue  { color: #3b82f6; }
        .kpi-number.text-green { color: #10b981; }

        /* Filter Pills */
        .btn-filter-pill {
            padding: 5px 12px;
            font-size: 0.785rem;
            font-weight: 600;
            border-radius: 8px;
            color: #64748b;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.15s ease;
            cursor: pointer;
            background: transparent;
            border: none;
        }
        .dark .btn-filter-pill { color: #a1a1aa; }
        .btn-filter-pill:hover {
            color: #000000;
            background: rgba(0, 0, 0, 0.05);
        }
        .dark .btn-filter-pill:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.08);
        }
        .btn-filter-pill.active {
            background: #000000;
            color: #ffffff;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15);
        }
        .dark .btn-filter-pill.active {
            background: #ffffff;
            color: #000000;
        }
        .pill-dot { width: 6px; height: 6px; border-radius: 50%; display: inline-block; }
        .pill-dot.red   { background: #ef4444; }
        .pill-dot.blue  { background: #3b82f6; }
        .pill-dot.green { background: #10b981; }

        /* Action Buttons */
        .action-btn-pill {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            background: #ffffff;
            color: #64748b;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.15s ease;
        }
        .dark .action-btn-pill {
            background: #18181b;
            border-color: #27272a;
            color: #a1a1aa;
        }
        .action-btn-pill:hover { transform: translateY(-1px); }
        .action-btn-pill.wa:hover    { background: #25D366; border-color: #25D366; color: #ffffff; }
        .action-btn-pill.call:hover  { background: #000000; border-color: #000000; color: #ffffff; }
        .dark .action-btn-pill.call:hover { background: #ffffff; border-color: #ffffff; color: #000000; }
        .action-btn-pill.view:hover  { background: #000000; border-color: #000000; color: #ffffff; }
        .dark .action-btn-pill.view:hover { background: #ffffff; border-color: #ffffff; color: #000000; }
        .action-btn-pill.notes:hover { background: #525252; border-color: #525252; color: #ffffff; }
        .action-btn-pill.delete:hover{ background: #ef4444; border-color: #ef4444; color: #ffffff; }

        .lead-status-badge {
            border: 1px solid transparent;
            cursor: pointer;
            user-select: none;
            display: inline-flex;
            align-items: center;
            font-size: 0.75rem;
            font-weight: 700;
            transition: all 0.15s ease;
        }
        .lead-status-badge.status-new {
            background-color: rgba(239, 68, 68, 0.1);
            color: #dc2626;
            border-color: rgba(239, 68, 68, 0.25);
        }
        .lead-status-badge.status-new .status-indicator-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: #ef4444;
            box-shadow: 0 0 0 2px rgba(239, 68, 68, 0.25);
        }
        .lead-status-badge.status-contacted {
            background-color: rgba(59, 130, 246, 0.1);
            color: #2563eb;
            border-color: rgba(59, 130, 246, 0.25);
        }
        .lead-status-badge.status-contacted .status-indicator-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.25);
        }
        .lead-status-badge.status-closed {
            background-color: rgba(16, 185, 129, 0.1);
            color: #059669;
            border-color: rgba(16, 185, 129, 0.25);
        }
        .lead-status-badge.status-closed .status-indicator-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: #10b981;
            box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.25);
        }
        .lead-status-badge:hover {
            transform: translateY(-0.5px);
            filter: brightness(0.96);
        }

        .lead-status-select {
            appearance: none;
            -webkit-appearance: none;
            padding: 4px 22px 4px 10px;
            border-radius: 999px;
            font-size: 0.775rem;
            font-weight: 700;
            cursor: pointer;
            border: 1.5px solid transparent;
            background-position: right 6px center;
            background-repeat: no-repeat;
            background-size: 8px;
            transition: all 0.2s;
        }
        .lead-status-select.status-new {
            background-color: rgba(239, 68, 68, 0.12);
            color: #dc2626;
            border-color: rgba(239, 68, 68, 0.25);
        }
        .lead-status-select.status-contacted {
            background-color: rgba(59, 130, 246, 0.12);
            color: #2563eb;
            border-color: rgba(59, 130, 246, 0.25);
        }
        .lead-status-select.status-closed {
            background-color: rgba(16, 185, 129, 0.12);
            color: #059669;
            border-color: rgba(16, 185, 129, 0.25);
        }

        /* Floating Dock Multi-Select Bar (Voltiva Theme Styled) */
        .leads-floating-dock {
            position: fixed;
            bottom: 24px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 7px 12px 7px 16px;
            background: #09090b;
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 14px;
            box-shadow: 0 20px 48px -8px rgba(0, 0, 0, 0.65), 0 0 0 1px rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            animation: leadsDockSlideUp 0.22s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            max-width: 95vw;
        }
        @keyframes leadsDockSlideUp {
            from {
                opacity: 0;
                transform: translate(-50%, 20px) scale(0.96);
            }
            to {
                opacity: 1;
                transform: translate(-50%, 0) scale(1);
            }
        }
        .leads-dock-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding-right: 6px;
        }
        .leads-dock-count-pill {
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
        .leads-dock-label {
            font-size: 12.5px;
            font-weight: 700;
            color: #f8fafc;
            white-space: nowrap;
            letter-spacing: -0.01em;
        }
        .leads-dock-btn {
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
        }
        .leads-dock-btn svg {
            width: 14px;
            height: 14px;
            flex-shrink: 0;
        }
        .leads-dock-btn.dock-contacted {
            background: rgba(59, 130, 246, 0.2);
            color: #60a5fa;
            border: 1px solid rgba(59, 130, 246, 0.35);
        }
        .leads-dock-btn.dock-contacted:hover {
            background: #2563eb;
            color: #ffffff;
            transform: translateY(-1px);
        }
        .leads-dock-btn.dock-closed {
            background: rgba(16, 185, 129, 0.2);
            color: #34d399;
            border: 1px solid rgba(16, 185, 129, 0.35);
        }
        .leads-dock-btn.dock-closed:hover {
            background: #059669;
            color: #ffffff;
            transform: translateY(-1px);
        }
        .leads-dock-btn.dock-delete {
            background: #dc2626;
            color: #ffffff;
        }
        .leads-dock-btn.dock-delete:hover {
            background: #b91c1c;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.35);
        }
        .leads-dock-btn.dock-cancel {
            background: rgba(255, 255, 255, 0.08);
            color: #cbd5e1;
            border: 1px solid rgba(255, 255, 255, 0.12);
        }
        .leads-dock-btn.dock-cancel:hover {
            background: rgba(255, 255, 255, 0.16);
            color: #ffffff;
            border-color: rgba(255, 255, 255, 0.2);
        }
    </style>

    <!-- ── 1. Top Breadcrumb & Hero Banner ─────────────────────────────────── -->
    <div class="leads-hero-banner">
        <div class="flex items-center gap-4 flex-1 min-w-[280px]">
            <div class="leads-hero-icon-badge">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
            </div>
            <div>
                <div class="flex items-center gap-2.5 mb-1 flex-wrap">
                    <h1 class="text-xl font-black text-gray-900 dark:text-white tracking-tight">Customer Inquiries &amp; Leads</h1>
                    <span class="leads-count-chip">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2 1.5 3 3.5 3h9c2 0 3.5-1 3.5-3V7c0-2-1.5-3-3.5-3h-9C5.5 4 4 5 4 7z"/></svg>
                        {{ $totalCount }} Total
                    </span>
                </div>
                <p class="text-xs text-gray-500 dark:text-gray-400 m-0 leading-relaxed">
                    Real-time wholesale leads and customer inquiries captured automatically via website contact forms and product inquiries.
                </p>
            </div>
        </div>

        <!-- Header Action Buttons -->
        <div class="flex items-center gap-2.5 flex-wrap">
            <button type="button" wire:click="exportCsv" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-bold border border-gray-200 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-gray-700 dark:text-gray-200 hover:border-emerald-500 hover:text-emerald-600 transition-all shadow-2xs">
                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                <span>Export CSV</span>
            </button>

            <a href="{{ url('/contact') }}" target="_blank" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-bold border border-gray-200 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-gray-700 dark:text-gray-200 hover:border-blue-500 hover:text-blue-600 transition-all shadow-2xs">
                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                <span>Public Form</span>
            </a>

            <button type="button" wire:click="$refresh" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-bold bg-[#000000] text-white hover:bg-[#27272a] dark:bg-white dark:text-black dark:hover:bg-zinc-200 transition-all shadow-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
                <span>Refresh</span>
            </button>
        </div>
    </div>

    <!-- ── 2. Four KPI Metric Cards Grid ───────────────────────────────────── -->
    <div class="leads-metrics-grid">
        <!-- 1. Total Inquiries -->
        <div wire:click="filterByStatus('all')" class="leads-kpi-card {{ $statusFilter === 'all' ? 'active-filter' : '' }}">
            <div class="flex items-center justify-between mb-2">
                <span class="text-[11px] font-bold uppercase tracking-wider text-gray-400">Total Inquiries</span>
                <div class="kpi-icon-pill orange">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/></svg>
                </div>
            </div>
            <div class="kpi-number text-gray-900 dark:text-white mb-2">{{ $totalCount }}</div>
            <div class="flex items-center justify-between text-[11px] text-gray-500 mt-auto">
                <span class="inline-flex items-center gap-1 font-semibold px-1.5 py-0.5 rounded bg-gray-100 dark:bg-zinc-800 text-gray-600 dark:text-gray-300">
                    All channels
                </span>
                <span>Lifetime capture</span>
            </div>
        </div>

        <!-- 2. New Inquiries -->
        <div wire:click="filterByStatus('new')" class="leads-kpi-card {{ $statusFilter === 'new' ? 'active-filter' : '' }}">
            <div class="flex items-center justify-between mb-2">
                <span class="text-[11px] font-bold uppercase tracking-wider text-red-500">New Inquiries</span>
                <div class="kpi-icon-pill red">
                    @if($newCount > 0)
                        <span class="kpi-pulse-ring"></span>
                    @endif
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
                </div>
            </div>
            <div class="kpi-number text-red mb-2">{{ $newCount }}</div>
            <div class="flex items-center justify-between text-[11px] mt-auto">
                <span class="inline-flex items-center gap-1 font-semibold px-1.5 py-0.5 rounded bg-red-50 dark:bg-red-950/40 text-red-600 dark:text-red-400">
                    Action Needed
                </span>
                <span class="text-gray-400">Unread requests</span>
            </div>
        </div>

        <!-- 3. Contacted -->
        <div wire:click="filterByStatus('contacted')" class="leads-kpi-card {{ $statusFilter === 'contacted' ? 'active-filter' : '' }}">
            <div class="flex items-center justify-between mb-2">
                <span class="text-[11px] font-bold uppercase tracking-wider text-blue-500">Contacted</span>
                <div class="kpi-icon-pill blue">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                </div>
            </div>
            <div class="kpi-number text-blue mb-2">{{ $contactedCount }}</div>
            <div class="flex items-center justify-between text-[11px] mt-auto">
                <span class="inline-flex items-center gap-1 font-semibold px-1.5 py-0.5 rounded bg-blue-50 dark:bg-blue-950/40 text-blue-600 dark:text-blue-400">
                    Active Discussions
                </span>
                <span class="text-gray-400">In progress</span>
            </div>
        </div>

        <!-- 4. Closed & Converted -->
        <div wire:click="filterByStatus('closed')" class="leads-kpi-card {{ $statusFilter === 'closed' ? 'active-filter' : '' }}">
            <div class="flex items-center justify-between mb-2">
                <span class="text-[11px] font-bold uppercase tracking-wider text-emerald-500">Closed &amp; Converted</span>
                <div class="kpi-icon-pill green">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
            </div>
            <div class="kpi-number text-green mb-2">{{ $closedCount }}</div>
            <div class="flex items-center justify-between text-[11px] mt-auto">
                <span class="inline-flex items-center gap-1 font-semibold px-1.5 py-0.5 rounded bg-emerald-50 dark:bg-emerald-950/40 text-emerald-600 dark:text-emerald-400">
                    Deal Won
                </span>
                <span class="text-gray-400">Completed orders</span>
            </div>
        </div>
    </div>

    <!-- ── 3. Search & Filter Bar ─────────────────────────────────────────── -->
    <div class="p-3.5 mb-5 rounded-2xl border border-gray-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 shadow-xs flex flex-wrap items-center justify-between gap-3">
        <div class="flex items-center gap-2.5 flex-1 min-w-[260px] flex-wrap">
            <!-- Search Input -->
            <div class="relative flex-1 min-w-[220px]">
                <input
                    type="text"
                    wire:model.live.debounce.300ms="search"
                    placeholder="Search customer, phone, email, product, or notes..."
                    class="w-full pl-9 pr-4 py-2 rounded-xl text-xs bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:border-[#000000] dark:focus:border-white focus:ring-1 focus:ring-[#000000] dark:focus:ring-white transition-all"
                >
                <svg class="w-4 h-4 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>

            <!-- Source Custom Dropdown -->
            <div class="relative min-w-[170px]" x-data="{ open: false }" @click.outside="open = false">
                <button
                    type="button"
                    @click="open = !open"
                    class="w-full flex items-center justify-between gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 text-gray-800 dark:text-gray-200 hover:border-gray-300 dark:hover:border-zinc-600 focus:outline-none focus:ring-1 focus:ring-black dark:focus:ring-white transition-all shadow-2xs cursor-pointer"
                >
                    <span class="flex items-center gap-2.5 truncate">
                        @if($sourceFilter === 'all')
                            <span class="text-sm">🌐</span> <span class="font-medium">All Sources</span>
                        @elseif($sourceFilter === 'Contact Page')
                            <span class="text-sm">✉️</span> <span class="font-medium">Contact Form</span>
                        @elseif($sourceFilter === 'Product Inquiry')
                            <span class="text-sm">🌾</span> <span class="font-medium">Product Inquiry</span>
                        @elseif($sourceFilter === 'Direct Call')
                            <span class="text-sm">📞</span> <span class="font-medium">Direct Call</span>
                        @elseif($sourceFilter === 'WhatsApp')
                            <span class="text-sm">💬</span> <span class="font-medium">WhatsApp</span>
                        @else
                            <span class="text-sm">🌐</span> <span class="font-medium">{{ $sourceFilter }}</span>
                        @endif
                    </span>
                    <svg class="w-3.5 h-3.5 text-gray-400 shrink-0 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <!-- Floating Dropdown Menu -->
                <div
                    x-show="open"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 -translate-y-1 scale-98"
                    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                    x-transition:leave-end="opacity-0 -translate-y-1 scale-98"
                    x-cloak
                    class="absolute left-0 mt-2 w-60 rounded-2xl bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-800 shadow-2xl shadow-black/15 p-2 z-50 overflow-hidden text-xs"
                >
                    @php
                        $sourceOptions = [
                            'all' => ['icon' => '🌐', 'label' => 'All Sources'],
                            'Contact Page' => ['icon' => '✉️', 'label' => 'Contact Form'],
                            'Product Inquiry' => ['icon' => '🌾', 'label' => 'Product Inquiry'],
                            'Direct Call' => ['icon' => '📞', 'label' => 'Direct Call'],
                            'WhatsApp' => ['icon' => '💬', 'label' => 'WhatsApp'],
                        ];
                    @endphp

                    <div class="space-y-1">
                        @foreach($sourceOptions as $val => $opt)
                            <button
                                type="button"
                                wire:click="$set('sourceFilter', '{{ $val }}')"
                                @click="open = false"
                                class="w-full flex items-center justify-between px-3.5 py-2.5 rounded-xl text-left transition-colors cursor-pointer {{ $sourceFilter === $val ? 'bg-zinc-100 dark:bg-zinc-800 text-black dark:text-white font-bold' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100/70 dark:hover:bg-zinc-800/70 font-medium' }}"
                            >
                                <span class="flex items-center gap-3">
                                    <span class="text-sm shrink-0">{{ $opt['icon'] }}</span>
                                    <span>{{ $opt['label'] }}</span>
                                </span>
                                @if($sourceFilter === $val)
                                    <svg class="w-4 h-4 text-black dark:text-white shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                @endif
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Sort Custom Dropdown -->
            <div class="relative min-w-[160px]" x-data="{ open: false }" @click.outside="open = false">
                <button
                    type="button"
                    @click="open = !open"
                    class="w-full flex items-center justify-between gap-3 px-4 py-2.5 rounded-xl text-xs font-semibold bg-white dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 text-gray-800 dark:text-gray-200 hover:border-gray-300 dark:hover:border-zinc-600 focus:outline-none focus:ring-1 focus:ring-black dark:focus:ring-white transition-all shadow-2xs cursor-pointer"
                >
                    <span class="flex items-center gap-2.5 truncate">
                        @if($sortOrder === 'desc')
                            <span class="text-sm">⬇️</span> <span class="font-medium">Newest First</span>
                        @else
                            <span class="text-sm">⬆️</span> <span class="font-medium">Oldest First</span>
                        @endif
                    </span>
                    <svg class="w-3.5 h-3.5 text-gray-400 shrink-0 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                <!-- Floating Dropdown Menu -->
                <div
                    x-show="open"
                    x-transition:enter="transition ease-out duration-150"
                    x-transition:enter-start="opacity-0 -translate-y-1 scale-98"
                    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                    x-transition:leave="transition ease-in duration-100"
                    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                    x-transition:leave-end="opacity-0 -translate-y-1 scale-98"
                    x-cloak
                    class="absolute left-0 mt-2 w-52 rounded-2xl bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-800 shadow-2xl shadow-black/15 p-2 z-50 overflow-hidden text-xs"
                >
                    <div class="space-y-1">
                        <button
                            type="button"
                            wire:click="$set('sortOrder', 'desc')"
                            @click="open = false"
                            class="w-full flex items-center justify-between px-3.5 py-2.5 rounded-xl text-left transition-colors cursor-pointer {{ $sortOrder === 'desc' ? 'bg-zinc-100 dark:bg-zinc-800 text-black dark:text-white font-bold' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100/70 dark:hover:bg-zinc-800/70 font-medium' }}"
                        >
                            <span class="flex items-center gap-3">
                                <span class="text-sm shrink-0">⬇️</span>
                                <span>Newest First</span>
                            </span>
                            @if($sortOrder === 'desc')
                                <svg class="w-4 h-4 text-black dark:text-white shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            @endif
                        </button>

                        <button
                            type="button"
                            wire:click="$set('sortOrder', 'oldest')"
                            @click="open = false"
                            class="w-full flex items-center justify-between px-3.5 py-2.5 rounded-xl text-left transition-colors cursor-pointer {{ $sortOrder === 'oldest' ? 'bg-zinc-100 dark:bg-zinc-800 text-black dark:text-white font-bold' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100/70 dark:hover:bg-zinc-800/70 font-medium' }}"
                        >
                            <span class="flex items-center gap-3">
                                <span class="text-sm shrink-0">⬆️</span>
                                <span>Oldest First</span>
                            </span>
                            @if($sortOrder === 'oldest')
                                <svg class="w-4 h-4 text-black dark:text-white shrink-0 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                            @endif
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Status Pills -->
        <div class="flex items-center gap-1 p-1 bg-gray-100 dark:bg-zinc-800 rounded-xl">
            <button type="button" wire:click="filterByStatus('all')" class="btn-filter-pill {{ $statusFilter === 'all' ? 'active' : '' }}">
                All <span class="text-[10px] px-1.5 py-0.2 rounded-full bg-black/10 dark:bg-white/10 font-bold">{{ $totalCount }}</span>
            </button>
            <button type="button" wire:click="filterByStatus('new')" class="btn-filter-pill {{ $statusFilter === 'new' ? 'active' : '' }}">
                <span class="pill-dot red"></span> New <span class="text-[10px] px-1.5 py-0.2 rounded-full bg-red-100 dark:bg-red-900/60 font-bold text-red-600 dark:text-red-400">{{ $newCount }}</span>
            </button>
            <button type="button" wire:click="filterByStatus('contacted')" class="btn-filter-pill {{ $statusFilter === 'contacted' ? 'active' : '' }}">
                <span class="pill-dot blue"></span> Contacted <span class="text-[10px] px-1.5 py-0.2 rounded-full bg-blue-100 dark:bg-blue-900/60 font-bold text-blue-600 dark:text-blue-400">{{ $contactedCount }}</span>
            </button>
            <button type="button" wire:click="filterByStatus('closed')" class="btn-filter-pill {{ $statusFilter === 'closed' ? 'active' : '' }}">
                <span class="pill-dot green"></span> Closed <span class="text-[10px] px-1.5 py-0.2 rounded-full bg-emerald-100 dark:bg-emerald-900/60 font-bold text-emerald-600 dark:text-emerald-400">{{ $closedCount }}</span>
            </button>
        </div>
    </div>

    <!-- ── 4. Customer Inquiries Directory Table ───────────────────────────── -->
    <div class="rounded-2xl border border-gray-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 overflow-hidden shadow-xs">
        <div class="p-4 border-b border-gray-100 dark:border-zinc-800 flex items-center justify-between flex-wrap gap-2">
            <div class="flex items-center gap-2.5">
                <span class="w-6 h-6 rounded-md bg-[#000000] text-white dark:bg-white dark:text-black flex items-center justify-center font-black text-xs shadow-2xs">B</span>
                <div>
                    <h3 class="text-sm font-bold text-gray-900 dark:text-white">Customer Inquiries Directory</h3>
                    <div class="text-[11px] text-gray-400">
                        Showing {{ $leads->firstItem() ?? 0 }}–{{ $leads->lastItem() ?? 0 }} of {{ $leads->total() }} captured inquiries. Click row or actions for full CRM history.
                    </div>
                </div>
            </div>
            <div class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 dark:bg-emerald-950/40 text-emerald-600 dark:text-emerald-400 text-[11px] font-bold border border-emerald-200 dark:border-emerald-800">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-ping"></span>
                <span>⚡ Instant AJAX Status</span>
            </div>
        </div>

        <div class="overflow-x-auto w-full">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-50/70 dark:bg-zinc-800/50 text-[11px] font-bold uppercase tracking-wider text-gray-400 border-b border-gray-100 dark:border-zinc-800">
                        <th class="py-3 px-4 w-10">
                            <input type="checkbox" wire:model.live="selectAll" class="rounded border-gray-300 dark:border-zinc-700 text-[#000000] focus:ring-[#000000] dark:text-white cursor-pointer">
                        </th>
                        <th class="py-3 px-4 min-w-[220px]">CUSTOMER &amp; CONTACT</th>
                        <th class="py-3 px-4 min-w-[190px]">PRODUCT &amp; REQUIREMENT</th>
                        <th class="py-3 px-4 min-w-[280px]">INQUIRY MESSAGE &amp; NOTES</th>
                        <th class="py-3 px-4 min-w-[120px]">SOURCE</th>
                        <th class="py-3 px-4 min-w-[140px]">STATUS</th>
                        <th class="py-3 px-4 text-right min-w-[170px]">QUICK ACTIONS</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-zinc-800 text-xs">
                    @forelse($leads as $lead)
                        <tr class="hover:bg-zinc-500/[0.03] dark:hover:bg-zinc-800/40 transition-colors {{ in_array((string)$lead->id, $selectedLeads) ? 'bg-[#40bac7]/10 dark:bg-[#40bac7]/15' : ($lead->status === 'new' ? 'bg-red-500/[0.015]' : '') }}">
                            <td class="py-3.5 px-4">
                                <input type="checkbox" wire:model.live="selectedLeads" value="{{ (string) $lead->id }}" class="rounded border-gray-300 dark:border-zinc-700 text-[#000000] focus:ring-[#000000] dark:text-white cursor-pointer">
                            </td>

                            <!-- Customer & Contact -->
                            <td class="py-3.5 px-4">
                                <div class="flex items-start gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-gray-700 to-black text-white flex items-center justify-center font-bold text-xs shrink-0 shadow-xs">
                                        {{ strtoupper(substr($lead->name, 0, 2)) }}
                                    </div>
                                    <div class="min-w-0">
                                        <div class="flex items-center gap-1.5 flex-wrap">
                                            <button type="button" wire:click="openDetails({{ $lead->id }})" class="font-bold text-gray-900 dark:text-white hover:text-[#525252] dark:hover:text-zinc-300 transition-colors text-left truncate max-w-[160px]">
                                                {{ $lead->name }}
                                            </button>
                                            <span class="text-[10px] font-mono px-1.5 py-0.2 rounded bg-gray-100 dark:bg-zinc-800 text-gray-500 font-semibold">#{{ str_pad($lead->id, 4, '0', STR_PAD_LEFT) }}</span>
                                            @if($lead->status === 'new')
                                                <span class="w-2 h-2 rounded-full bg-red-500 shadow-[0_0_0_2px_rgba(239,68,68,0.25)]"></span>
                                            @endif
                                        </div>
                                        <div class="mt-1 space-y-0.5">
                                            @if($lead->phone)
                                                <div class="flex items-center gap-1 text-[11px] text-gray-600 dark:text-gray-300">
                                                    <svg class="w-3 h-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                                    <a href="tel:{{ $lead->phone }}" class="hover:underline">{{ $lead->phone }}</a>
                                                </div>
                                            @endif
                                            @if($lead->email)
                                                <div class="flex items-center gap-1 text-[11px] text-gray-500 dark:text-gray-400 truncate max-w-[180px]">
                                                    <svg class="w-3 h-3 text-gray-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                                    <a href="mailto:{{ $lead->email }}" class="hover:underline truncate">{{ $lead->email }}</a>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="text-[10px] text-gray-400 mt-1 italic">
                                            {{ $lead->created_at?->diffForHumans() }}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <!-- Product & Requirement -->
                            <td class="py-3.5 px-4">
                                <div class="space-y-1">
                                    <div class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded-md bg-zinc-100 dark:bg-zinc-800 text-zinc-900 dark:text-zinc-100 text-xs font-bold border border-zinc-200 dark:border-zinc-700">
                                        ⚡ {{ $lead->product_name ?? 'General Requirement' }}
                                    </div>
                                    <div class="text-[11px] text-gray-600 dark:text-gray-400 font-medium line-clamp-2">
                                        {{ $lead->subject ?? 'Inquiry via Website' }}
                                    </div>
                                </div>
                            </td>

                            <!-- Inquiry Message & Notes -->
                            <td class="py-3.5 px-4">
                                <div class="space-y-1.5 max-w-[340px]">
                                    <div wire:click="openDetails({{ $lead->id }})" class="p-2 rounded-lg bg-gray-50 dark:bg-zinc-800 border-l-2 border-[#000000] dark:border-zinc-400 cursor-pointer hover:bg-zinc-100 dark:hover:bg-zinc-700/60 transition-colors">
                                        <p class="text-[11px] text-gray-700 dark:text-gray-300 line-clamp-2 m-0 leading-relaxed">
                                            <span class="text-[#000000] dark:text-zinc-300 font-bold font-serif">“</span>{{ $lead->message }}<span class="text-[#000000] dark:text-zinc-300 font-bold font-serif">”</span>
                                        </p>
                                    </div>

                                    <!-- Notes Box -->
                                    <div wire:click="openNotes({{ $lead->id }})" class="flex items-center gap-1.5 px-2 py-1 rounded bg-zinc-100 dark:bg-zinc-800/80 border border-dashed border-zinc-300 dark:border-zinc-700 text-[10px] text-zinc-700 dark:text-zinc-300 cursor-pointer hover:bg-zinc-200 dark:hover:bg-zinc-700 transition-colors">
                                        <svg class="w-3 h-3 text-zinc-500 dark:text-zinc-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                        <span class="truncate flex-1">{{ $lead->admin_notes ?: '+ Add admin note...' }}</span>
                                    </div>
                                </div>
                            </td>

                            <!-- Source -->
                            <td class="py-3.5 px-4">
                                <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-[10px] font-bold bg-gray-100 dark:bg-zinc-800 text-gray-700 dark:text-gray-300 border border-gray-200 dark:border-zinc-700">
                                    {{ $lead->source ?? 'Contact Form' }}
                                </span>
                            </td>

                            <!-- Status Custom Interactive Alpine.js Dropdown -->
                            <td class="py-3.5 px-4">
                                <div x-data="{ open: false }" class="relative inline-block text-left" @click.outside="open = false">
                                    <button
                                        type="button"
                                        @click="open = !open"
                                        class="lead-status-badge status-{{ $lead->status }} px-2.5 py-1 rounded-full text-xs font-semibold gap-1.5 shadow-2xs cursor-pointer flex items-center border"
                                    >
                                        <span class="status-indicator-dot"></span>
                                        <span>{{ ucfirst($lead->status) }}</span>
                                        <svg class="w-3 h-3 text-current opacity-70 transition-transform duration-200" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7"/>
                                        </svg>
                                    </button>

                                    <div
                                        x-show="open"
                                        x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="transform opacity-0 scale-95 -translate-y-1"
                                        x-transition:enter-end="transform opacity-100 scale-100 translate-y-0"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="transform opacity-100 scale-100 translate-y-0"
                                        x-transition:leave-end="transform opacity-0 scale-95 -translate-y-1"
                                        class="absolute left-0 mt-1.5 w-36 rounded-xl bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-800 shadow-xl z-30 p-1 space-y-0.5"
                                        style="display: none;"
                                    >
                                        <button
                                            type="button"
                                            @click="open = false; $wire.updateLeadStatus({{ $lead->id }}, 'new')"
                                            class="w-full flex items-center gap-2 px-2.5 py-1.5 rounded-lg text-xs font-semibold transition-colors cursor-pointer {{ $lead->status === 'new' ? 'bg-red-50 dark:bg-red-950/40 text-red-600 dark:text-red-400 font-bold' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100/70 dark:hover:bg-zinc-800/70' }}"
                                        >
                                            <span class="w-2 h-2 rounded-full bg-red-500 shrink-0 shadow-[0_0_0_2px_rgba(239,68,68,0.2)]"></span>
                                            <span>New</span>
                                            @if($lead->status === 'new')
                                                <svg class="w-3.5 h-3.5 text-red-600 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                            @endif
                                        </button>
                                        <button
                                            type="button"
                                            @click="open = false; $wire.updateLeadStatus({{ $lead->id }}, 'contacted')"
                                            class="w-full flex items-center gap-2 px-2.5 py-1.5 rounded-lg text-xs font-semibold transition-colors cursor-pointer {{ $lead->status === 'contacted' ? 'bg-blue-50 dark:bg-blue-950/40 text-blue-600 dark:text-blue-400 font-bold' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100/70 dark:hover:bg-zinc-800/70' }}"
                                        >
                                            <span class="w-2 h-2 rounded-full bg-blue-500 shrink-0 shadow-[0_0_0_2px_rgba(59,130,246,0.2)]"></span>
                                            <span>Contacted</span>
                                            @if($lead->status === 'contacted')
                                                <svg class="w-3.5 h-3.5 text-blue-600 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                            @endif
                                        </button>
                                        <button
                                            type="button"
                                            @click="open = false; $wire.updateLeadStatus({{ $lead->id }}, 'closed')"
                                            class="w-full flex items-center gap-2 px-2.5 py-1.5 rounded-lg text-xs font-semibold transition-colors cursor-pointer {{ $lead->status === 'closed' ? 'bg-emerald-50 dark:bg-emerald-950/40 text-emerald-600 dark:text-emerald-400 font-bold' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100/70 dark:hover:bg-zinc-800/70' }}"
                                        >
                                            <span class="w-2 h-2 rounded-full bg-emerald-500 shrink-0 shadow-[0_0_0_2px_rgba(16,185,129,0.2)]"></span>
                                            <span>Closed</span>
                                            @if($lead->status === 'closed')
                                                <svg class="w-3.5 h-3.5 text-emerald-600 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                                            @endif
                                        </button>
                                    </div>
                                </div>
                            </td>

                            <!-- Quick Actions -->
                            <td class="py-3.5 px-4 text-right">
                                <div class="inline-flex items-center gap-1.5 justify-end">
                                    <!-- WhatsApp -->
                                    @php
                                        $cleanPhone = preg_replace('/[^0-9]/', '', $lead->phone ?? '');
                                        if (strlen($cleanPhone) === 10) $cleanPhone = '91' . $cleanPhone;
                                    @endphp
                                    @if($cleanPhone)
                                        <a
                                            href="https://wa.me/{{ $cleanPhone }}?text={{ urlencode('Hello ' . $lead->name . ', thank you for contacting Voltiva regarding ' . ($lead->product_name ?? 'your requirement') . '.') }}"
                                            target="_blank"
                                            title="Chat on WhatsApp"
                                            class="action-btn-pill wa"
                                        >
                                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                                        </a>
                                    @endif

                                    <!-- Phone Call -->
                                    @if($lead->phone)
                                        <a href="tel:{{ $lead->phone }}" title="Direct Phone Call" class="action-btn-pill call">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                                        </a>
                                    @endif

                                    <!-- View Details Modal -->
                                    <button type="button" wire:click="openDetails({{ $lead->id }})" title="View Details" class="action-btn-pill view">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </button>

                                    <!-- Edit Notes -->
                                    <button type="button" wire:click="openNotes({{ $lead->id }})" title="Follow-up Notes" class="action-btn-pill notes">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </button>

                                    <!-- Delete with Confirmation Modal -->
                                    <button type="button" wire:click="confirmSingleDelete({{ $lead->id }})" title="Delete Inquiry" class="action-btn-pill delete">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-14 px-4 text-center">
                                <div class="w-16 h-16 rounded-full bg-gray-100 dark:bg-zinc-800 text-gray-400 flex items-center justify-center mx-auto mb-3 text-2xl">
                                    📥
                                </div>
                                <h4 class="text-base font-bold text-gray-900 dark:text-white mb-1">No Inquiries Recorded</h4>
                                <p class="text-xs text-gray-500 dark:text-gray-400 max-w-md mx-auto leading-relaxed">
                                    Wholesale inquiries submitted through the public Contact Us page will automatically populate here.
                                </p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($leads->hasPages())
            <div class="p-4 border-t border-gray-100 dark:border-zinc-800">
                {{ $leads->links() }}
            </div>
        @endif
    </div>

    <!-- ── 5. Full Lead Details Modal ─────────────────────────────────────── -->
    @if($showDetailsModal && $activeLead)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-xs">
            <div class="bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-800 rounded-2xl w-full max-w-2xl overflow-hidden shadow-2xl animate-in fade-in zoom-in-95 duration-150">
                <div class="p-5 border-b border-gray-100 dark:border-zinc-800 flex items-center justify-between">
                    <div>
                        <h3 class="text-base font-bold text-gray-900 dark:text-white">Customer Inquiry Details</h3>
                        <div class="text-xs text-gray-400">Lead #{{ str_pad($activeLead->id, 4, '0', STR_PAD_LEFT) }} • Received {{ $activeLead->created_at?->format('d M Y, h:i A') }}</div>
                    </div>
                    <button type="button" wire:click="closeDetails" class="w-8 h-8 rounded-lg bg-gray-100 dark:bg-zinc-800 text-gray-500 hover:text-red-500 flex items-center justify-center">
                        ✕
                    </button>
                </div>

                <div class="p-5 space-y-4 max-h-[70vh] overflow-y-auto">
                    <!-- Customer Summary Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div class="p-3 rounded-xl bg-gray-50 dark:bg-zinc-800/60 border border-gray-100 dark:border-zinc-800">
                            <div class="text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">Customer Name</div>
                            <div class="text-sm font-bold text-gray-900 dark:text-white">{{ $activeLead->name }}</div>
                        </div>

                        <div class="p-3 rounded-xl bg-gray-50 dark:bg-zinc-800/60 border border-gray-100 dark:border-zinc-800">
                            <div class="text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">Phone Number</div>
                            <div class="text-sm font-bold text-gray-900 dark:text-white flex items-center gap-2">
                                <span>{{ $activeLead->phone ?: 'Not provided' }}</span>
                                @if($activeLead->phone)
                                    <a href="tel:{{ $activeLead->phone }}" class="text-xs text-[#000000] dark:text-white font-semibold underline">Call</a>
                                @endif
                            </div>
                        </div>

                        <div class="p-3 rounded-xl bg-gray-50 dark:bg-zinc-800/60 border border-gray-100 dark:border-zinc-800">
                            <div class="text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">Email Address</div>
                            <div class="text-sm font-bold text-gray-900 dark:text-white truncate">
                                @if($activeLead->email)
                                    <a href="mailto:{{ $activeLead->email }}" class="text-[#000000] dark:text-white font-semibold hover:underline">{{ $activeLead->email }}</a>
                                @else
                                    <span class="text-gray-400 font-normal">Not provided</span>
                                @endif
                            </div>
                        </div>

                        <div class="p-3 rounded-xl bg-gray-50 dark:bg-zinc-800/60 border border-gray-100 dark:border-zinc-800">
                            <div class="text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-1">Current Status &amp; Source</div>
                            <div class="flex items-center gap-2">
                                <span class="lead-status-select status-{{ $activeLead->status }} inline-block pointer-events-none">
                                    {{ ucfirst($activeLead->status) }}
                                </span>
                                <span class="text-xs text-gray-500">• {{ $activeLead->source }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Product Requirement & Subject -->
                    <div class="p-3 rounded-xl bg-zinc-100 dark:bg-zinc-800/70 border border-zinc-200 dark:border-zinc-700">
                        <div class="text-[10px] font-bold uppercase tracking-wider text-zinc-500 dark:text-zinc-400 mb-1">Product Requirement / Subject</div>
                        <div class="text-xs font-bold text-gray-900 dark:text-white">{{ $activeLead->subject }}</div>
                        @if($activeLead->product_name)
                            <div class="text-xs text-zinc-600 dark:text-zinc-400 mt-1">Product: {{ $activeLead->product_name }}</div>
                        @endif
                    </div>

                    <!-- Message Body -->
                    <div class="p-4 rounded-xl bg-gray-50 dark:bg-zinc-800/60 border border-gray-100 dark:border-zinc-800">
                        <div class="text-[10px] font-bold uppercase tracking-wider text-gray-400 mb-2">Customer Message</div>
                        <div class="text-xs text-gray-800 dark:text-gray-200 leading-relaxed whitespace-pre-line">{{ $activeLead->message }}</div>
                    </div>

                    <!-- Admin Notes -->
                    @if($activeLead->admin_notes)
                        <div class="p-3.5 rounded-xl bg-blue-500/[0.05] border border-blue-500/20">
                            <div class="text-[10px] font-bold uppercase tracking-wider text-blue-600 dark:text-blue-400 mb-1">Admin Follow-up Notes</div>
                            <div class="text-xs text-gray-800 dark:text-gray-200">{{ $activeLead->admin_notes }}</div>
                        </div>
                    @endif
                </div>

                <div class="p-4 border-t border-gray-100 dark:border-zinc-800 bg-gray-50/50 dark:bg-zinc-800/40 flex items-center justify-between">
                    <div>
                        @if($activeLead->phone)
                            <a
                                href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $activeLead->phone) }}?text={{ urlencode('Hello ' . $activeLead->name . ', regarding your inquiry on Voltiva...') }}"
                                target="_blank"
                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-bold bg-[#25D366] text-white hover:opacity-90"
                            >
                                WhatsApp Customer
                            </a>
                        @endif
                    </div>
                    <button type="button" wire:click="closeDetails" class="px-4 py-1.5 rounded-lg text-xs font-bold bg-gray-200 dark:bg-zinc-700 text-gray-800 dark:text-white hover:bg-gray-300">
                        Close
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- ── 6. Admin Follow-up Notes Modal ──────────────────────────────────── -->
    @if($showNotesModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-xs">
            <div class="bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-800 rounded-2xl w-full max-w-md overflow-hidden shadow-2xl animate-in fade-in zoom-in-95 duration-150">
                <div class="p-5 border-b border-gray-100 dark:border-zinc-800 flex items-center justify-between">
                    <div>
                        <h3 class="text-base font-bold text-gray-900 dark:text-white">Admin Follow-up Notes</h3>
                        <div class="text-xs text-gray-400">Save private CRM notes for this inquiry.</div>
                    </div>
                    <button type="button" wire:click="closeNotes" class="w-8 h-8 rounded-lg bg-gray-100 dark:bg-zinc-800 text-gray-500 hover:text-red-500 flex items-center justify-center">
                        ✕
                    </button>
                </div>

                <div class="p-5 space-y-3">
                    <textarea
                        wire:model="noteText"
                        rows="4"
                        placeholder="e.g. Called customer on 29 Sept. Quotation for 500 units sent via email..."
                        class="w-full p-3 rounded-xl text-xs bg-gray-50 dark:bg-zinc-800 border border-gray-200 dark:border-zinc-700 text-gray-900 dark:text-white placeholder-gray-400 focus:outline-none focus:border-[#000000] dark:focus:border-white focus:ring-1 focus:ring-[#000000] dark:focus:ring-white transition-all"
                    ></textarea>
                </div>

                <div class="p-4 border-t border-gray-100 dark:border-zinc-800 bg-gray-50/50 dark:bg-zinc-800/40 flex items-center justify-end gap-2">
                    <button type="button" wire:click="closeNotes" class="px-3.5 py-1.5 rounded-lg text-xs font-bold text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-zinc-800">
                        Cancel
                    </button>
                    <button type="button" wire:click="saveNotes" class="px-4 py-1.5 rounded-lg text-xs font-bold bg-[#000000] text-white hover:bg-[#27272a] dark:bg-white dark:text-black dark:hover:bg-zinc-200 transition-all">
                        Save Notes
                    </button>
                </div>
            </div>
        </div>
    @endif

    <!-- ── 7. Custom Delete Confirmation Alert Modal ────────────────────────── -->
    @if($showDeleteModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/60 backdrop-blur-xs animate-in fade-in duration-150">
            <div class="bg-white dark:bg-zinc-900 border border-gray-200 dark:border-zinc-800 rounded-3xl w-full max-w-md overflow-hidden shadow-2xl animate-in zoom-in-95 duration-150">
                <div class="p-6 text-center">
                    <!-- Danger Icon with glowing ring -->
                    <div class="w-14 h-14 rounded-2xl bg-red-100 dark:bg-red-950/60 text-red-600 dark:text-red-400 flex items-center justify-center mx-auto mb-4 border border-red-200 dark:border-red-900/60 shadow-inner">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                        </svg>
                    </div>

                    <h3 class="text-lg font-extrabold text-gray-900 dark:text-white mb-2">
                        @if($isBulkDelete)
                            Delete {{ count($selectedLeads) }} Selected Inquiries?
                        @else
                            Delete Inquiry #{{ str_pad($leadToDeleteId, 4, '0', STR_PAD_LEFT) }}?
                        @endif
                    </h3>

                    <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed max-w-sm mx-auto mb-6">
                        @if($isBulkDelete)
                            Are you sure you want to permanently delete these <strong>{{ count($selectedLeads) }} customer inquiries</strong>? All associated details and admin follow-up notes will be permanently removed. This action cannot be undone.
                        @else
                            Are you sure you want to permanently delete this customer inquiry? All associated message history and admin notes will be permanently erased.
                        @endif
                    </p>

                    <div class="flex items-center justify-center gap-3">
                        <button
                            type="button"
                            wire:click="cancelDelete"
                            class="px-5 py-2.5 rounded-xl text-xs font-bold text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-zinc-800 hover:bg-gray-200 dark:hover:bg-zinc-700 transition-colors cursor-pointer"
                        >
                            Cancel
                        </button>
                        <button
                            type="button"
                            wire:click="executeDelete"
                            wire:loading.attr="disabled"
                            class="px-5 py-2.5 rounded-xl text-xs font-bold text-white bg-red-600 hover:bg-red-700 transition-all cursor-pointer shadow-lg shadow-red-600/20 flex items-center gap-2"
                        >
                            <span wire:loading.remove wire:target="executeDelete">Yes, Delete Permanently</span>
                            <span wire:loading wire:target="executeDelete" class="inline-flex items-center gap-1.5">
                                <svg class="animate-spin h-3.5 w-3.5 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                                <span>Deleting...</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- ── Floating Dock Multi-Select Bar (Voltiva Theme Styled) ── --}}
    @if(count($selectedLeads) > 0)
    <div class="leads-floating-dock">
        {{-- Selected Count Badge --}}
        <div class="leads-dock-badge">
            <span class="leads-dock-count-pill">{{ count($selectedLeads) }}</span>
            <span class="leads-dock-label">{{ count($selectedLeads) === 1 ? 'inquiry selected' : 'inquiries selected' }}</span>
        </div>

        {{-- Mark Contacted --}}
        <button
            type="button"
            wire:click="bulkUpdateStatus('contacted')"
            class="leads-dock-btn dock-contacted"
            title="Mark all selected inquiries as contacted"
        >
            <span class="w-2 h-2 rounded-full bg-blue-400"></span>
            <span>Contacted</span>
        </button>

        {{-- Mark Closed --}}
        <button
            type="button"
            wire:click="bulkUpdateStatus('closed')"
            class="leads-dock-btn dock-closed"
            title="Mark all selected inquiries as closed/won"
        >
            <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
            <span>Closed</span>
        </button>

        {{-- Delete Selected --}}
        <button
            type="button"
            wire:click="confirmBulkDelete"
            class="leads-dock-btn dock-delete"
            title="Delete all selected inquiries permanently"
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
            class="leads-dock-btn dock-cancel"
            title="Cancel selection"
        >
            <span>Cancel</span>
        </button>
    </div>
    @endif

</div>
</x-filament-panels::page>
