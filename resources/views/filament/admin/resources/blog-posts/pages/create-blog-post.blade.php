<x-filament-panels::page>

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
.bcf-wrap, .bcf-wrap * { box-sizing: border-box; }
.bcf-wrap { font-family: 'Inter', system-ui, sans-serif; }

.bcf-hero {
    display: flex; align-items: center; justify-content: space-between;
    gap: 1rem; flex-wrap: wrap;
    background: #fff; border: 1.5px solid #e4e4e7; border-radius: 16px;
    padding: 1rem 1.4rem; margin-bottom: 1.25rem;
    box-shadow: 0 1px 4px rgba(0,0,0,.05);
}
.dark .bcf-hero { background: #18181b; border-color: #27272a; }

.bcf-hero-icon {
    width: 44px; height: 44px; border-radius: 13px; flex-shrink: 0;
    background: linear-gradient(135deg,#18181b,#3f3f46);
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 4px 12px rgba(0,0,0,.15);
}
.bcf-hero-icon svg { width: 22px; height: 22px; stroke: #fff; fill: none; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }

.bcf-tip {
    display: flex; align-items: flex-start; gap: 10px;
    background: rgba(59,130,246,.05); border: 1px solid rgba(59,130,246,.15);
    border-radius: 12px; padding: 10px 14px; margin-bottom: 1.25rem;
}
.bcf-tip svg { width: 16px; height: 16px; stroke: #3b82f6; fill: none; stroke-width: 2; flex-shrink: 0; margin-top: 1px; }
.bcf-tip p { margin: 0; font-size: 12.5px; color: #3b82f6; line-height: 1.5; }
.bcf-tip strong { font-weight: 700; }

.bcf-btn {
    display: inline-flex; align-items: center; gap: 7px;
    padding: 9px 16px; border-radius: 11px; font-size: 13px; font-weight: 700;
    text-decoration: none; cursor: pointer; border: 1.5px solid; transition: all .15s;
}
.bcf-btn svg { width: 14px; height: 14px; stroke: currentColor; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
.bcf-btn.btn-ghost { background: #f9f9f9; color: #3f3f46; border-color: #e4e4e7; }
.bcf-btn.btn-ghost:hover { background: #f4f4f5; }
.dark .bcf-btn.btn-ghost { background: #27272a; color: #d4d4d8; border-color: #3f3f46; }
.bcf-btn.btn-save { background: #18181b; color: #fff; border-color: #18181b; box-shadow: 0 3px 10px rgba(0,0,0,.18); }
.bcf-btn.btn-save:hover { background: #000; transform: translateY(-1px); box-shadow: 0 5px 14px rgba(0,0,0,.25); }
.dark .bcf-btn.btn-save { background: #fff; color: #000; border-color: #fff; }

.bcf-form-wrap .fi-section {
    border-radius: 14px !important; border: 1.5px solid #e4e4e7 !important;
    overflow: hidden; box-shadow: 0 1px 4px rgba(0,0,0,.04) !important;
    margin-bottom: 14px;
}
.dark .bcf-form-wrap .fi-section { border-color: #27272a !important; }
.bcf-form-wrap .fi-section-header {
    background: #fafafa !important; border-bottom: 1px solid #f0f0f0 !important; padding: 11px 16px !important;
}
.dark .bcf-form-wrap .fi-section-header { background: #1c1c1f !important; border-color: #27272a !important; }
.bcf-form-wrap .fi-section-header-heading { font-size: 13px !important; font-weight: 800 !important; color: #18181b !important; }
.dark .bcf-form-wrap .fi-section-header-heading { color: #f4f4f5 !important; }
.bcf-form-wrap .fi-section-content { padding: 16px !important; }
</style>

<div class="bcf-wrap">

    {{-- ── Hero Header ── --}}
    <div class="bcf-hero">
        <div style="display:flex;align-items:center;gap:12px;">
            <div class="bcf-hero-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/>
                    <line x1="12" y1="18" x2="12" y2="12"/><line x1="9" y1="15" x2="15" y2="15"/>
                </svg>
            </div>
            <div>
                <div style="font-size:11px;font-weight:700;color:#a1a1aa;text-transform:uppercase;letter-spacing:.06em;">✍️ New Article</div>
                <h2 style="margin:3px 0 0;font-size:16px;font-weight:900;color:#18181b;letter-spacing:-0.02em;" class="dark:text-white">
                    Write New Blog Article
                </h2>
                <p style="margin:2px 0 0;font-size:12px;color:#a1a1aa;">Fill in the details below and publish when ready.</p>
            </div>
        </div>
        <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;">
            <a href="{{ \App\Filament\Admin\Resources\BlogPosts\BlogPostResource::getUrl('index') }}" class="bcf-btn btn-ghost">
                <svg viewBox="0 0 24 24"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
                Cancel
            </a>
            <button type="button" wire:click="create" class="bcf-btn btn-save">
                <svg viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/><polyline points="17 21 17 13 7 13"/><polyline points="7 3 7 8 15 8"/></svg>
                Publish Article
            </button>
        </div>
    </div>

    {{-- ── Quick Tips ── --}}
    <div class="bcf-tip">
        <svg viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
        <p><strong>SEO Tip:</strong> Write a title between 30–75 characters, add a 110–165 character meta description, and upload a featured image for the best SEO score. The URL slug is auto-generated from the title.</p>
    </div>

    {{-- ── Main Two-Column Form ── --}}
    <div class="bcf-form-wrap">
        <form wire:submit.prevent="create" id="create-blog-form">
            {{ $this->form }}
        </form>
    </div>

    {{-- Bottom Save Bar --}}
    <div style="margin-top:1.5rem;padding:1rem 1.25rem;background:#fff;border:1.5px solid #e4e4e7;border-radius:16px;display:flex;align-items:center;justify-content:space-between;box-shadow:0 1px 4px rgba(0,0,0,.05);flex-wrap:wrap;gap:10px;" class="dark:bg-zinc-900 dark:border-zinc-800">
        <div style="font-size:12.5px;color:#a1a1aa;font-weight:500;">
            Review all sections before publishing. You can also save as <strong style="color:#f59e0b;">Draft</strong> by toggling Live Status off.
        </div>
        <div style="display:flex;gap:8px;">
            <a href="{{ \App\Filament\Admin\Resources\BlogPosts\BlogPostResource::getUrl('index') }}"
               style="display:inline-flex;align-items:center;gap:6px;padding:9px 16px;border-radius:11px;font-size:13px;font-weight:700;text-decoration:none;background:#f4f4f5;color:#3f3f46;border:1.5px solid #e4e4e7;">
                Cancel
            </a>
            <button type="button" wire:click="create"
                style="display:inline-flex;align-items:center;gap:7px;padding:9px 20px;border-radius:11px;font-size:13px;font-weight:700;background:#18181b;color:#fff;border:none;cursor:pointer;box-shadow:0 3px 10px rgba(0,0,0,.18);"
                onmouseover="this.style.background='#000'" onmouseout="this.style.background='#18181b'">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 2L11 13"/><path d="M22 2L15 22 11 13 2 9l20-7z"/>
                </svg>
                Publish Article
            </button>
        </div>
    </div>

</div>

<x-filament-actions::modals />
</x-filament-panels::page>
