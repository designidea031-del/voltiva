<x-filament-panels::page>
@php
    $post      = $this->record;
    $isLive    = $post?->is_published ?? false;
    $views     = $post?->views ?? 0;
    $seo       = $this->getSeoScore();
    $seoCls    = $seo >= 80 ? '#10b981' : ($seo >= 55 ? '#f59e0b' : '#ef4444');
@endphp

{{-- ──────────────────────────────── STYLES ──────────────────────────────── --}}
<style>
.bep-wrap, .bep-wrap * { box-sizing: border-box; }
.bep-wrap { font-family: 'Figtree', system-ui, -apple-system, sans-serif; }

/* ── Breadcrumb Bar ── */
.bep-breadcrumb {
    display: flex; align-items: center; gap: 6px; flex-wrap: wrap;
    font-size: 12px; font-weight: 500; color: #8c8c8c;
    margin-bottom: 12px;
}
.bep-breadcrumb a { color: #8c8c8c; text-decoration: none; transition: color .15s; }
.bep-breadcrumb a:hover { color: #000000; }
.bep-breadcrumb span { color: #b7b7b7; }

/* ── Page Header ── */
.bep-header {
    display: flex; align-items: flex-start; justify-content: space-between;
    gap: 1rem; flex-wrap: wrap;
    background: #ffffff; border: 1.5px solid #e8e8e8; border-radius: 16px;
    padding: 14px 18px; margin-bottom: 16px;
    box-shadow: 0 1px 4px rgba(0,0,0,.04);
}
.dark .bep-header { background: #18181b; border-color: #27272a; }

.bep-header-left { display: flex; align-items: center; gap: 12px; min-width: 0; flex: 1; }
.bep-page-icon {
    width: 42px; height: 42px; border-radius: 12px; flex-shrink: 0;
    background: #000000;
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 4px 12px rgba(0,0,0,.15);
}
.dark .bep-page-icon { background: #27272a; border: 1px solid #3f3f46; }
.bep-page-icon svg { width: 20px; height: 20px; stroke: #ffffff; fill: none; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }

.bep-page-title {
    font-size: 17px; font-weight: 900; color: #000000; margin: 0 0 4px;
    letter-spacing: -0.025em; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; max-width: 580px;
}
.dark .bep-page-title { color: #f4f4f5; }
.bep-page-meta { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }

/* Badges */
.bep-badge {
    display: inline-flex; align-items: center; gap: 5px;
    padding: 3px 10px; border-radius: 999px;
    font-size: 11px; font-weight: 700; letter-spacing: .01em;
}
.bep-badge.live { background: rgba(16,185,129,.1); color: #059669; border: 1px solid rgba(16,185,129,.2); }
.bep-badge.draft { background: rgba(245,158,11,.1); color: #d97706; border: 1px solid rgba(245,158,11,.2); }
.bep-badge-dot { width: 6px; height: 6px; border-radius: 50%; }
.bep-badge-dot.green { background: #10b981; animation: bep-blink 2s ease infinite; }
.bep-badge-dot.amber { background: #f59e0b; }
@keyframes bep-blink { 0%,100%{opacity:1} 50%{opacity:.35} }

.bep-meta-pill {
    display: inline-flex; align-items: center; gap: 4px;
    font-size: 11.5px; font-weight: 600; color: #525252;
    background: #f4f4f5; border: 1px solid #e4e4e7; border-radius: 8px; padding: 2px 9px;
}
.dark .bep-meta-pill { background: #27272a; border-color: #3f3f46; color: #a1a1aa; }
.bep-meta-pill svg { width: 11px; height: 11px; stroke: currentColor; fill: none; stroke-width: 2; }

/* ── Header Action Buttons ── */
.bep-header-actions { display: flex; align-items: center; gap: 7px; flex-wrap: wrap; flex-shrink: 0; }
.bep-btn {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 8px 15px; border-radius: 10px;
    font-size: 12.5px; font-weight: 600;
    border: 1.5px solid; cursor: pointer; text-decoration: none;
    transition: all .15s ease; white-space: nowrap;
    font-family: 'Figtree', system-ui, sans-serif;
}
.bep-btn svg { width: 13px; height: 13px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
.bep-btn.btn-outline { background: #ffffff !important; color: #525252 !important; border-color: #e4e4e7 !important; }
.bep-btn.btn-outline:hover { background: #f9f9f9 !important; border-color: #b7b7b7 !important; color: #000000 !important; }
.dark .bep-btn.btn-outline { background: #27272a !important; color: #a1a1aa !important; border-color: #3f3f46 !important; }
.bep-btn.btn-preview { background: #ffffff !important; color: #18181b !important; border-color: #e4e4e7 !important; }
.bep-btn.btn-preview:hover { background: #f4f4f5 !important; border-color: #18181b !important; }
.dark .bep-btn.btn-preview { background: #27272a !important; border-color: #3f3f46 !important; color: #ffffff !important; }
.bep-btn.btn-primary {
    background-color: #000000 !important; color: #ffffff !important; border-color: #000000 !important;
    box-shadow: 0 2px 8px rgba(0,0,0,.15);
}
.bep-btn.btn-primary * {
    color: #ffffff !important;
}
.bep-btn.btn-primary:hover { background-color: #27272a !important; border-color: #27272a !important; transform: translateY(-1px); }
.dark .bep-btn.btn-primary { background-color: #ffffff !important; color: #000000 !important; border-color: #ffffff !important; }

/* ── Bottom Save Bar ── */
.bep-bottom-bar {
    margin-top: 16px; padding: 12px 18px;
    background: #ffffff; border: 1.5px solid #e8e8e8; border-radius: 14px;
    display: flex; align-items: center; justify-content: space-between;
    flex-wrap: wrap; gap: 10px;
    box-shadow: 0 1px 4px rgba(0,0,0,.04);
}
.dark .bep-bottom-bar { background: #18181b; border-color: #27272a; }
.bep-bottom-bar-msg { font-size: 12px; color: #525252; display: flex; align-items: center; gap: 7px; font-weight: 500; }
.bep-bottom-bar-msg svg { width: 13px; height: 13px; stroke: #10b981; fill: none; stroke-width: 2.2; }

/* ── Refined Filament Section Overrides ── */
.fi-section {
    border-radius: 14px !important;
    border: 1.5px solid #e8e8e8 !important;
    box-shadow: 0 1px 4px rgba(0,0,0,.03) !important;
    margin-bottom: 14px;
    background: #ffffff !important;
}
.dark .fi-section { border-color: #27272a !important; background: #18181b !important; }
.fi-section-header {
    background: #fafafa !important;
    border-bottom: 1px solid #f0f0f0 !important;
    padding: 11px 16px !important;
}
.dark .fi-section-header { background: #1c1c1f !important; border-color: #27272a !important; }
.fi-section-header-heading {
    font-size: 13px !important; font-weight: 800 !important; color: #000000 !important;
}
.dark .fi-section-header-heading { color: #f4f4f5 !important; }
.fi-section-content { padding: 16px !important; }
</style>

<div class="bep-wrap">

    {{-- ── Breadcrumb ── --}}
    <nav class="bep-breadcrumb">
        <a href="{{ route('filament.admin.pages.dashboard') }}">Dashboard</a>
        <span>›</span>
        <a href="{{ \App\Filament\Admin\Resources\BlogPosts\BlogPostResource::getUrl('index') }}">Blog Articles</a>
        <span>›</span>
        <span style="color:#000000;font-weight:700;">Edit Article</span>
    </nav>

    {{-- ── Page Header ── --}}
    <div class="bep-header">
        <div class="bep-header-left">
            <div class="bep-page-icon">
                <svg viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
            </div>
            <div style="min-width:0;">
                <h1 class="bep-page-title">{{ $post?->title ?? 'Edit Article' }}</h1>
                <div class="bep-page-meta">
                    <span class="bep-badge {{ $isLive ? 'live' : 'draft' }}">
                        <span class="bep-badge-dot {{ $isLive ? 'green' : 'amber' }}"></span>
                        {{ $isLive ? 'Live on Website' : 'Draft (Hidden)' }}
                    </span>
                    @if($views > 0)
                    <span class="bep-meta-pill">
                        <svg viewBox="0 0 24 24"><path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                        {{ number_format($views) }} Views
                    </span>
                    @endif
                    @if($post?->published_at)
                    <span class="bep-meta-pill">
                        <svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        {{ $post->published_at->format('d M Y') }}
                    </span>
                    @endif
                    <span class="bep-meta-pill" style="color:{{ $seoCls }}; font-weight: 700;">SEO {{ $seo }}/100</span>
                </div>
            </div>
        </div>

        <div class="bep-header-actions">
            @if($post?->slug)
            <a href="{{ url('/blog/' . $post->slug) }}" target="_blank" class="bep-btn btn-preview">
                <svg viewBox="0 0 24 24"><path d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                View Live Post
            </a>
            @endif
            <a href="{{ \App\Filament\Admin\Resources\BlogPosts\BlogPostResource::getUrl('index') }}" class="bep-btn btn-outline">
                <svg viewBox="0 0 24 24"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                Back
            </a>
            <button type="button" wire:click="save" class="bep-btn btn-primary">
                <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13"/><polyline points="7 3 7 8 15 8"/></svg>
                Save Changes
            </button>
        </div>
    </div>

    {{-- ── Main Two-Column Filament Form ── --}}
    <form wire:submit.prevent="save" id="bep-main-form">
        {{ $this->form }}
    </form>

    {{-- ── Bottom Save Bar ── --}}
    <div class="bep-bottom-bar">
        <div class="bep-bottom-bar-msg">
            <svg viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
            Changes are applied when you click <strong style="color:#000000;">Save Changes</strong>.
        </div>
        <div style="display:flex;gap:8px;align-items:center;">
            <a href="{{ \App\Filament\Admin\Resources\BlogPosts\BlogPostResource::getUrl('index') }}"
               style="display:inline-flex;align-items:center;gap:6px;padding:9px 16px;border-radius:10px;font-size:12.5px;font-weight:600;background-color:#f4f4f5 !important;color:#525252 !important;border:1.5px solid #e4e4e7 !important;text-decoration:none;font-family:'Figtree',sans-serif;">
                Cancel
            </a>
            <button type="button" wire:click="save"
                style="display:inline-flex;align-items:center;gap:7px;padding:9px 20px;border-radius:10px;font-size:13px;font-weight:600;background-color:#000000 !important;color:#ffffff !important;border:1px solid #000000 !important;cursor:pointer;box-shadow:0 3px 10px rgba(0,0,0,.2);font-family:'Figtree',system-ui,sans-serif;transition:all .15s;"
                onmouseover="this.style.backgroundColor='#27272a'" onmouseout="this.style.backgroundColor='#000000'">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13"/><polyline points="7 3 7 8 15 8"/>
                </svg>
                Save Changes
            </button>
        </div>
    </div>

</div>{{-- /bep-wrap --}}

<x-filament-actions::modals />
</x-filament-panels::page>
