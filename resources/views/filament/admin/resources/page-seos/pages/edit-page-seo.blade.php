<x-filament-panels::page>
@php
    $titleLength = mb_strlen($meta_title);
    $descLength = mb_strlen($meta_description);

    $logoUrl = asset('assets/images/logo.png');
    $ogImgUrl = $og_image ? (str_starts_with($og_image, 'http') ? $og_image : asset('storage/' . $og_image)) : $logoUrl;

    $scoreColor = $seo_score >= 80 ? '#10b981' : ($seo_score >= 50 ? '#f59e0b' : '#ef4444');
    $scoreLabel = $seo_score >= 80 ? 'Optimal' : ($seo_score >= 50 ? 'Needs Attention' : 'Critical');
@endphp

<style>
/* ── Edit SEO Page Design Tokens ── */
.edit-seo-wrap * { box-sizing: border-box; }
.edit-seo-wrap   { font-family: 'Figtree', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; }

/* ── Top Bar ── */
.edit-top-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1.25rem;
    background: #ffffff;
    border: 1px solid #e4e4e7;
    border-radius: 18px;
    padding: 1.2rem 1.6rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 1px 3px rgba(0,0,0,.03);
    flex-wrap: wrap;
}
.dark .edit-top-bar { background: #18181b; border-color: #27272a; }

.back-hub-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    font-size: 13px;
    font-weight: 600;
    color: #71717a;
    text-decoration: none;
    transition: color .15s ease;
}
.back-hub-btn:hover { color: #18181b; }
.dark .back-hub-btn:hover { color: #fff; }

.btn-primary-action {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 9px 18px; border-radius: 12px;
    font-size: 13px; font-weight: 700; text-decoration: none;
    background: #18181b; color: #fff;
    border: 1px solid #18181b;
    transition: all .18s ease; cursor: pointer;
    box-shadow: 0 2px 8px rgba(0,0,0,.12);
}
.btn-primary-action:hover { background: #000; box-shadow: 0 4px 14px rgba(0,0,0,.22); transform: translateY(-1px); }
.dark .btn-primary-action { background: #fff; color: #000; border-color: #fff; }
.dark .btn-primary-action:hover { background: #e4e4e7; }

.btn-secondary-action {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 8px 16px; border-radius: 11px;
    font-size: 13px; font-weight: 600; text-decoration: none;
    background: #fff; color: #3f3f46;
    border: 1px solid #e4e4e7;
    transition: all .18s ease; cursor: pointer;
}
.btn-secondary-action:hover { background: #f4f4f5; color: #18181b; border-color: #d4d4d8; }
.dark .btn-secondary-action { background: #27272a; color: #e4e4e7; border-color: #3f3f46; }
.dark .btn-secondary-action:hover { background: #3f3f46; color: #fff; }

/* ── Two Column Grid ── */
.seo-layout-grid {
    display: grid;
    grid-template-columns: 1fr 380px;
    gap: 1.5rem;
    align-items: start;
}
@media (max-width: 1200px) {
    .seo-layout-grid { grid-template-columns: 1fr; }
}

/* ── Section Cards ── */
.edit-card {
    background: #ffffff;
    border: 1px solid #e4e4e7;
    border-radius: 16px;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 1px 3px rgba(0,0,0,.03);
}
.dark .edit-card { background: #18181b; border-color: #27272a; }

.edit-card-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 1.25rem;
    padding-bottom: 0.85rem;
    border-bottom: 1px solid #f4f4f5;
}
.dark .edit-card-header { border-color: #27272a; }

.edit-card-title {
    display: flex;
    align-items: center;
    gap: 10px;
}
.card-icon-pill {
    width: 34px; height: 34px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    background: #f4f4f5; color: #18181b;
}
.dark .card-icon-pill { background: #27272a; color: #fff; }
.card-icon-pill svg { width: 17px; height: 17px; stroke: currentColor; fill: none; stroke-width: 2; }

/* ── Inputs & Labels ── */
.field-group {
    margin-bottom: 1.25rem;
}
.field-label-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 6px;
}
.field-label {
    font-size: 13px;
    font-weight: 700;
    color: #27272a;
}
.dark .field-label { color: #f4f4f5; }

.char-counter {
    font-size: 11.5px;
    font-weight: 600;
}
.char-good { color: #10b981; }
.char-warn { color: #f59e0b; }
.char-muted{ color: #71717a; }

.field-input, .field-textarea, .field-select {
    width: 100%;
    padding: 10px 14px;
    font-size: 13.5px;
    border-radius: 11px;
    border: 1px solid #e4e4e7;
    background: #fff;
    color: inherit;
    font-family: inherit;
    outline: none;
    transition: all .15s ease;
}
.dark .field-input, .dark .field-textarea, .dark .field-select {
    background: #202023;
    border-color: #3f3f46;
}
.field-input:focus, .field-textarea:focus, .field-select:focus {
    border-color: #18181b;
    box-shadow: 0 0 0 3px rgba(24,24,27,.06);
}
.dark .field-input:focus, .dark .field-textarea:focus, .dark .field-select:focus {
    border-color: #a1a1aa;
    box-shadow: 0 0 0 3px rgba(255,255,255,.06);
}

.field-help {
    font-size: 11.5px;
    color: #71717a;
    margin-top: 5px;
}

/* ── Keyword Suggestions ── */
.keyword-chips-wrap {
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
    margin-top: 8px;
}
.keyword-chip {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 4px 10px;
    border-radius: 20px;
    font-size: 11.5px;
    font-weight: 600;
    background: #f4f4f5;
    color: #52525b;
    border: 1px solid #e4e4e7;
    cursor: pointer;
    transition: all .15s ease;
}
.dark .keyword-chip { background: #27272a; color: #d4d4d8; border-color: #3f3f46; }
.keyword-chip:hover {
    background: #18181b;
    color: #fff;
    border-color: #18181b;
}
.dark .keyword-chip:hover {
    background: #fff;
    color: #000;
    border-color: #fff;
}

/* ── Sidebar Sticky Styles ── */
.seo-sticky-sidebar {
    position: sticky;
    top: 1.5rem;
    display: flex;
    flex-direction: column;
    gap: 1.25rem;
}

/* ── Score Gauge Card ── */
.gauge-card {
    background: #ffffff;
    border: 1px solid #e4e4e7;
    border-radius: 16px;
    padding: 1.5rem;
    text-align: center;
    box-shadow: 0 1px 3px rgba(0,0,0,.03);
}
.dark .gauge-card { background: #18181b; border-color: #27272a; }

.gauge-svg-wrap {
    position: relative;
    width: 140px;
    height: 140px;
    margin: 0 auto 12px;
}
.gauge-center-text {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}
.gauge-score-number {
    font-size: 2.2rem;
    font-weight: 600;
    line-height: 1;
    color: inherit;
}
.gauge-score-label {
    font-size: 11px;
    font-weight: 600;
    color: #71717a;
    text-transform: uppercase;
    letter-spacing: .05em;
}

/* ── SERP Preview Card ── */
.serp-card {
    background: #ffffff;
    border: 1px solid #e4e4e7;
    border-radius: 16px;
    padding: 1.25rem;
    box-shadow: 0 1px 3px rgba(0,0,0,.03);
}
.dark .serp-card { background: #18181b; border-color: #27272a; }

.serp-switch-bar {
    display: flex;
    align-items: center;
    gap: 4px;
    background: #f4f4f5;
    padding: 3px;
    border-radius: 10px;
}
.dark .serp-switch-bar { background: #27272a; }
.serp-tab-btn {
    padding: 4px 10px;
    font-size: 11.5px;
    font-weight: 600;
    border: none;
    background: transparent;
    color: #71717a;
    border-radius: 7px;
    cursor: pointer;
    transition: all .15s ease;
}
.serp-tab-btn.active {
    background: #ffffff;
    color: #18181b;
    box-shadow: 0 1px 2px rgba(0,0,0,.06);
}
.dark .serp-tab-btn.active {
    background: #18181b;
    color: #ffffff;
}

.google-serp-box {
    background: #ffffff;
    border: 1px solid #e4e4e7;
    border-radius: 12px;
    padding: 14px;
    margin-top: 10px;
    font-family: Roboto, Arial, sans-serif;
}
.dark .google-serp-box { background: #202023; border-color: #27272a; }

.google-serp-header {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 6px;
}
.google-favicon {
    width: 22px; height: 22px; border-radius: 50%;
    background: #f1f3f4; display: flex; align-items: center; justify-content: center;
    overflow: hidden;
}
.google-site-name { font-size: 13px; font-weight: 500; color: #202124; }
.dark .google-site-name { color: #e8eaed; }
.google-site-url { font-size: 11.5px; color: #4d5156; word-break: break-all; }
.dark .google-site-url { color: #bdc1c6; }

.google-serp-title {
    font-size: 16px;
    font-weight: 500;
    color: #1a0dab;
    line-height: 1.3;
    margin-bottom: 4px;
    word-break: break-word;
    cursor: pointer;
}
.dark .google-serp-title { color: #8ab4f8; }
.google-serp-desc {
    font-size: 12.5px;
    color: #4d5156;
    line-height: 1.45;
    word-break: break-word;
}
.dark .google-serp-desc { color: #bdc1c6; }

/* ── Social Card Preview ── */
.social-card-preview {
    border: 1px solid #e4e4e7;
    border-radius: 12px;
    overflow: hidden;
    margin-top: 10px;
    background: #ffffff;
}
.dark .social-card-preview { background: #202023; border-color: #27272a; }
.social-preview-img {
    width: 100%;
    height: 160px;
    object-fit: cover;
    background: #f4f4f5;
    display: block;
}
.social-preview-content {
    padding: 12px;
}
.social-preview-domain {
    font-size: 11px;
    text-transform: uppercase;
    color: #71717a;
    font-weight: 700;
    letter-spacing: .04em;
    margin-bottom: 3px;
}
.social-preview-title {
    font-size: 13.5px;
    font-weight: 700;
    color: inherit;
    line-height: 1.3;
    margin-bottom: 4px;
}
.social-preview-desc {
    font-size: 11.5px;
    color: #71717a;
    line-height: 1.4;
}

/* ── Checklist ── */
.checklist-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 8px 0;
    border-bottom: 1px solid #f4f4f5;
    font-size: 12.5px;
}
.dark .checklist-item { border-color: #27272a; }
.checklist-item:last-child { border-bottom: none; }

.check-icon-pass { color: #10b981; }
.check-icon-fail { color: #ef4444; }
</style>

<div class="edit-seo-wrap">
    {{-- Top Action Bar --}}
    <div class="edit-top-bar">
        <div>
            <a href="{{ \App\Filament\Admin\Resources\PageSeos\PageSeoResource::getUrl('index') }}" class="back-hub-btn">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="19" y1="12" x2="5" y2="12"></line>
                    <polyline points="12 19 5 12 12 5"></polyline>
                </svg>
                <span>Back to SEO Hub</span>
            </a>
            <h1 style="font-size: 1.4rem; font-weight: 600; margin: 4px 0 0 0; color: inherit; letter-spacing: -0.02em;">
                Configure SEO: {{ $page->page_name }}
            </h1>
        </div>

        <div style="display: flex; align-items: center; gap: 10px;">
            <button type="button" wire:click="smartAutoGenerate" class="btn-secondary-action">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"></path></svg>
                <span>Smart Auto-Generate</span>
            </button>
            <button type="button" wire:click="save" class="btn-primary-action">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                <span>Save Changes (Ctrl+S)</span>
            </button>
        </div>
    </div>

    {{-- Main Grid --}}
    <div class="seo-layout-grid">
        {{-- LEFT COLUMN: Forms --}}
        <div>
            {{-- Section 1: Core Search Engine Metadata --}}
            <div class="edit-card">
                <div class="edit-card-header">
                    <div class="edit-card-title">
                        <div class="card-icon-pill">
                            <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                        </div>
                        <div>
                            <h3 style="margin: 0; font-size: 14.5px; font-weight: 700;">Core Search Engine Metadata</h3>
                            <p style="margin: 2px 0 0 0; font-size: 12px; color: #71717a;">Primary title tag, meta description, and crawler indexing rules</p>
                        </div>
                    </div>
                </div>

                {{-- Meta Title --}}
                <div class="field-group">
                    <div class="field-label-row">
                        <label class="field-label">Google Meta Title (Title Tag)</label>
                        <span class="char-counter {{ $titleLength >= 30 && $titleLength <= 65 ? 'char-good' : ($titleLength > 65 ? 'char-warn' : 'char-muted') }}">
                            {{ $titleLength }} / 60 characters recommended
                        </span>
                    </div>
                    <input type="text" wire:model.live.debounce.250ms="meta_title" class="field-input" placeholder="e.g. Luxury Modular Switches | Voltiva Electrical Accessories">
                    <div class="field-help">Keep between 30 and 60 characters for optimal visibility without truncation on SERP.</div>
                </div>

                {{-- Meta Description --}}
                <div class="field-group">
                    <div class="field-label-row">
                        <label class="field-label">Google Meta Description Snippet</label>
                        <span class="char-counter {{ $descLength >= 80 && $descLength <= 165 ? 'char-good' : ($descLength > 165 ? 'char-warn' : 'char-muted') }}">
                            {{ $descLength }} / 160 characters recommended
                        </span>
                    </div>
                    <textarea rows="3" wire:model.live.debounce.250ms="meta_description" class="field-textarea" placeholder="Provide a compelling overview of what customers will discover on this page..."></textarea>
                    <div class="field-help">Concise summary shown under the blue link in search results. Optimal range: 80 - 160 chars.</div>
                </div>

                {{-- Meta Keywords & Suggestions --}}
                <div class="field-group">
                    <div class="field-label-row">
                        <label class="field-label">Target Meta Keywords</label>
                        <span style="font-size: 11.5px; color: #71717a;">Comma separated</span>
                    </div>
                    <input type="text" wire:model.live.debounce.300ms="meta_keywords" class="field-input" placeholder="modular switches, electric switch, voltiva plates, designer switch">
                    
                    <div style="margin-top: 10px;">
                        <span style="font-size: 11.5px; font-weight: 700; color: #71717a; text-transform: uppercase;">Suggested High-Intent Keywords:</span>
                        <div class="keyword-chips-wrap">
                            @foreach($suggestedKeywords as $kw)
                                <button type="button" wire:click="addKeyword('{{ $kw }}')" class="keyword-chip">
                                    <span>+</span>
                                    <span>{{ $kw }}</span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>

                {{-- Canonical URL & Robots --}}
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                    <div class="field-group">
                        <label class="field-label" style="display: block; margin-bottom: 6px;">Canonical URL</label>
                        <input type="url" wire:model.defer="canonical_url" class="field-input" placeholder="{{ url($page->route_path ?: '/') }}">
                        <div class="field-help">Prevents duplicate content penalties</div>
                    </div>

                    <div class="field-group">
                        <label class="field-label" style="display: block; margin-bottom: 6px;">Robots Directives</label>
                        <select wire:model.live="robots" class="field-select">
                            <option value="index, follow">index, follow (Standard Ranking - Recommended)</option>
                            <option value="noindex, follow">noindex, follow (Hide page, follow links)</option>
                            <option value="index, nofollow">index, nofollow (Index page, do not pass link juice)</option>
                            <option value="noindex, nofollow">noindex, nofollow (Hidden from search engine crawlers)</option>
                        </select>
                        <div class="field-help">Controls whether search spiders index this page</div>
                    </div>
                </div>
            </div>

            {{-- Section 2: Social Media Open Graph & Twitter Cards --}}
            <div class="edit-card">
                <div class="edit-card-header">
                    <div class="edit-card-title">
                        <div class="card-icon-pill">
                            <svg viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
                        </div>
                        <div>
                            <h3 style="margin: 0; font-size: 14.5px; font-weight: 700;">Social Media Open Graph & Twitter Cards</h3>
                            <p style="margin: 2px 0 0 0; font-size: 12px; color: #71717a;">Appearance when shared on WhatsApp, Facebook, LinkedIn, X, and iMessage</p>
                        </div>
                    </div>
                </div>

                <div class="field-group">
                    <label class="field-label" style="display: block; margin-bottom: 6px;">OpenGraph Title (og:title)</label>
                    <input type="text" wire:model.live.debounce.250ms="og_title" class="field-input" placeholder="Title for social media shares">
                </div>

                <div class="field-group">
                    <label class="field-label" style="display: block; margin-bottom: 6px;">OpenGraph Description (og:description)</label>
                    <textarea rows="2" wire:model.live.debounce.250ms="og_description" class="field-textarea" placeholder="Brief teaser summary for social share previews..."></textarea>
                </div>

                <div class="field-group">
                    <label class="field-label" style="display: block; margin-bottom: 6px;">Social Share Image (og:image - 1200x630px Recommended)</label>
                    <div style="display: flex; gap: 15px; align-items: center;">
                        <div style="width: 80px; height: 50px; border-radius: 8px; border: 1px solid #e4e4e7; overflow: hidden; background: #f4f4f5; display: flex; align-items: center; justify-content: center;">
                            <img src="{{ $ogImgUrl }}" alt="OG Preview" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>
                        <div style="flex: 1;">
                            <input type="file" wire:model="og_image_file" class="field-input" accept="image/*">
                        </div>
                        <button type="button" wire:click="resetOgImage" class="btn-secondary-action" style="font-size: 12px; padding: 7px 12px;">
                            Reset to Logo
                        </button>
                    </div>
                </div>
            </div>

            {{-- Section 3: Structured Data & JSON-LD Schema --}}
            <div class="edit-card">
                <div class="edit-card-header">
                    <div class="edit-card-title">
                        <div class="card-icon-pill">
                            <svg viewBox="0 0 24 24"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                        </div>
                        <div>
                            <h3 style="margin: 0; font-size: 14.5px; font-weight: 700;">Structured Data & JSON-LD Schema</h3>
                            <p style="margin: 2px 0 0 0; font-size: 12px; color: #71717a;">Schema.org microdata for Google Rich Snippets, Knowledge Panels, and FAQs</p>
                        </div>
                    </div>
                    <button type="button" wire:click="autoGenerateSchema" class="btn-secondary-action" style="font-size: 12px; padding: 6px 12px;">
                        Auto-Generate Schema
                    </button>
                </div>

                <div class="field-group">
                    <label class="field-label" style="display: block; margin-bottom: 6px;">Schema.org Entity Type</label>
                    <select wire:model="schema_type" class="field-select">
                        <option value="WebPage">WebPage (General Informational)</option>
                        <option value="Organization">Organization / Brand</option>
                        <option value="Product">Product / Hardware Accessory</option>
                        <option value="Article">Article / News / Blog</option>
                        <option value="LocalBusiness">LocalBusiness / Showroom</option>
                        <option value="FAQPage">FAQPage (Q&A Accordion)</option>
                        <option value="ContactPage">ContactPage</option>
                    </select>
                </div>

                <div class="field-group">
                    <label class="field-label" style="display: block; margin-bottom: 6px;">Custom JSON-LD Markup</label>
                    <textarea rows="7" wire:model.defer="schema_markup" class="field-textarea" style="font-family: ui-monospace, Consolas, monospace; font-size: 12px; line-height: 1.5;" placeholder="{&#10;  &quot;&#64;context&quot;: &quot;https://schema.org&quot;,&#10;  &quot;&#64;type&quot;: &quot;WebPage&quot;&#10;}"></textarea>
                    <div class="field-help">Output directly inside &lt;script type="application/ld+json"&gt; on live frontend</div>
                </div>

                <div style="display: flex; justify-content: flex-end; margin-top: 15px;">
                    <button type="button" wire:click="save" class="btn-primary-action">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                        <span>Save SEO Changes</span>
                    </button>
                </div>
            </div>
        </div>

        {{-- RIGHT COLUMN: Sticky Real-time Previews & Diagnostics --}}
        <div class="seo-sticky-sidebar">
            {{-- Score Gauge Card --}}
            <div class="gauge-card">
                <div style="font-size: 13px; font-weight: 700; color: #71717a; text-transform: uppercase; letter-spacing: .05em; margin-bottom: 12px;">
                    SEO Health Diagnostic
                </div>

                <div class="gauge-svg-wrap">
                    @php
                        $radius = 56;
                        $circumference = 2 * pi() * $radius;
                        $dashoffset = $circumference - ($seo_score / 100) * $circumference;
                    @endphp
                    <svg width="140" height="140" style="transform: rotate(-90deg);">
                        <circle cx="70" cy="70" r="{{ $radius }}" stroke="#e4e4e7" stroke-width="9" fill="transparent" />
                        <circle cx="70" cy="70" r="{{ $radius }}" stroke="{{ $scoreColor }}" stroke-width="9" fill="transparent"
                                stroke-dasharray="{{ $circumference }}" stroke-dashoffset="{{ $dashoffset }}" stroke-linecap="round"
                                style="transition: stroke-dashoffset .5s ease, stroke .3s ease;" />
                    </svg>
                    <div class="gauge-center-text">
                        <div class="gauge-score-number" style="color: {{ $scoreColor }};">
                            {{ $seo_score }}
                        </div>
                        <div class="gauge-score-label">
                            Score / 100
                        </div>
                    </div>
                </div>

                <div style="display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 700; background: rgba(16,185,129,.12); color: {{ $scoreColor }};">
                    {{ $scoreLabel }}
                </div>
            </div>

            {{-- Google SERP Preview Card --}}
            <div class="serp-card">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
                    <div style="font-size: 12.5px; font-weight: 700;">Google SERP Preview</div>
                    <div class="serp-switch-bar">
                        <button type="button" wire:click="$set('devicePreview', 'desktop')" class="serp-tab-btn {{ $devicePreview === 'desktop' ? 'active' : '' }}">
                            Desktop
                        </button>
                        <button type="button" wire:click="$set('devicePreview', 'mobile')" class="serp-tab-btn {{ $devicePreview === 'mobile' ? 'active' : '' }}">
                            Mobile
                        </button>
                    </div>
                </div>

                <div class="google-serp-box">
                    <div class="google-serp-header">
                        <div class="google-favicon">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="#4285F4"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14.5v-9l6 4.5-6 4.5z"/></svg>
                        </div>
                        <div>
                            <div class="google-site-name">Voltiva Electricals</div>
                            <div class="google-site-url">{{ url($page->route_path ?: '/') }}</div>
                        </div>
                    </div>

                    <div class="google-serp-title">
                        {{ $meta_title ?: $page->page_name . ' | Voltiva Next-Gen Modular Switches' }}
                    </div>

                    <div class="google-serp-desc">
                        {{ \Illuminate\Support\Str::limit($meta_description ?: 'Explore premium electrical switches and architectural fittings crafted for supreme safety and durability.', 140) }}
                    </div>
                </div>
            </div>

            {{-- Social Share Preview Card --}}
            <div class="serp-card">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 8px;">
                    <div style="font-size: 12.5px; font-weight: 700;">Social Media Share Card</div>
                    <div class="serp-switch-bar">
                        <button type="button" wire:click="$set('socialPreview', 'whatsapp')" class="serp-tab-btn {{ $socialPreview === 'whatsapp' ? 'active' : '' }}">
                            WhatsApp / FB
                        </button>
                        <button type="button" wire:click="$set('socialPreview', 'twitter')" class="serp-tab-btn {{ $socialPreview === 'twitter' ? 'active' : '' }}">
                            Twitter / X
                        </button>
                    </div>
                </div>

                <div class="social-card-preview">
                    <img src="{{ $ogImgUrl }}" alt="OG Card" class="social-preview-img" onerror="this.src='{{ asset('assets/images/logo.png') }}'">
                    <div class="social-preview-content">
                        <div class="social-preview-domain">voltiva.com</div>
                        <div class="social-preview-title">
                            {{ $og_title ?: $meta_title ?: $page->page_name }}
                        </div>
                        <div class="social-preview-desc">
                            {{ \Illuminate\Support\Str::limit($og_description ?: $meta_description ?: 'Architectural luxury electrical fittings and modular switches.', 90) }}
                        </div>
                    </div>
                </div>
            </div>

            {{-- On-Page SEO Checklist --}}
            <div class="serp-card">
                <div style="font-size: 12.5px; font-weight: 700; margin-bottom: 10px;">
                    On-Page SEO Checklist
                </div>

                @foreach($checklist as $item)
                    <div class="checklist-item">
                        <div style="display: flex; align-items: center; gap: 8px;">
                            @if($item['pass'])
                                <svg class="check-icon-pass" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            @else
                                <svg class="check-icon-fail" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                            @endif
                            <span style="font-size: 12px; font-weight: 500;">{{ $item['label'] }}</span>
                        </div>
                        <span style="font-size: 11px; font-weight: 600; color: #71717a;">{{ $item['current'] }}</span>
                    </div>
                @endforeach
            </div>

            {{-- Entity Metadata --}}
            <div class="serp-card">
                <div style="font-size: 12px; font-weight: 700; color: #71717a; text-transform: uppercase; margin-bottom: 8px;">
                    Page Entity Metadata
                </div>
                <div style="font-size: 12px; line-height: 1.6; color: #71717a;">
                    <div><strong>Page Key:</strong> <code>{{ $page->page_key }}</code></div>
                    <div><strong>Live Route:</strong> <code>{{ $page->route_path }}</code></div>
                    <div><strong>Last Updated:</strong> {{ $page->updated_at ? $page->updated_at->diffForHumans() : 'Just now' }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-filament-panels::page>
