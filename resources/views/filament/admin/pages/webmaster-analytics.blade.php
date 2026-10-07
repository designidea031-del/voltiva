<x-filament-panels::page>

<style>
/* ── Design System Tokens (Voltiva Dash Monochrome & Theme Accents) ── */
.wma-wrap * { box-sizing: border-box; }
.wma-wrap   { font-family: 'Figtree', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; color: #18181b; }
.dark .wma-wrap { color: #f4f4f5; }

/* ── Hero Header ── */
.wma-hero {
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
.dark .wma-hero { background: #18181b; border-color: #27272a; }

.wma-icon-box {
    width: 48px; height: 48px;
    border-radius: 14px;
    background: linear-gradient(135deg, #18181b 0%, #3f3f46 100%);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 4px 14px rgba(0,0,0,.15);
}
.dark .wma-icon-box { background: linear-gradient(135deg, #27272a 0%, #3f3f46 100%); border: 1px solid #52525b; }
.wma-icon-box svg { width: 22px; height: 22px; stroke: #fff; fill: none; }

/* ── Voltiva Theme Primary Button (Black in Light, Crisp White in Dark) ── */
.wma-btn-primary {
    display: inline-flex; align-items: center; gap: 8px;
    padding: 9px 18px; border-radius: 11px;
    font-size: 13px; font-weight: 700; text-decoration: none;
    background: #18181b; color: #ffffff;
    border: 1px solid #18181b;
    transition: all .18s ease; cursor: pointer;
    box-shadow: 0 2px 8px rgba(0,0,0,.12);
}
.wma-btn-primary:hover { background: #000000; border-color: #000000; box-shadow: 0 4px 14px rgba(0,0,0,.22); transform: translateY(-1px); }
.dark .wma-btn-primary { background: #ffffff; color: #000000; border-color: #ffffff; }
.dark .wma-btn-primary:hover { background: #e4e4e7; border-color: #e4e4e7; }
.wma-btn-primary svg { width: 15px; height: 15px; stroke: currentColor; fill: none; }

.wma-btn-outline {
    display: inline-flex; align-items: center; gap: 7px;
    padding: 8px 15px; border-radius: 10px;
    font-size: 12.5px; font-weight: 600; text-decoration: none;
    background: #ffffff; color: #3f3f46;
    border: 1px solid #e4e4e7;
    transition: all .15s ease; cursor: pointer;
}
.wma-btn-outline:hover { background: #f4f4f5; color: #18181b; border-color: #d4d4d8; }
.dark .wma-btn-outline { background: #27272a; color: #e4e4e7; border-color: #3f3f46; }
.dark .wma-btn-outline:hover { background: #3f3f46; color: #fff; }

/* ── 4 Top KPI Status Cards ── */
.wma-kpi-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1rem;
    margin-bottom: 1.5rem;
}
@media (max-width: 1024px) { .wma-kpi-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 640px)  { .wma-kpi-grid { grid-template-columns: 1fr; } }

.wma-kpi-card {
    background: #ffffff;
    border: 1px solid #e4e4e7;
    border-radius: 16px;
    padding: 1.15rem 1.25rem;
    box-shadow: 0 1px 3px rgba(0,0,0,.03);
    transition: all .18s ease;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.dark .wma-kpi-card { background: #18181b; border-color: #27272a; }
.wma-kpi-card:hover { transform: translateY(-2px); box-shadow: 0 6px 18px rgba(0,0,0,.06); }

.wma-kpi-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    margin-bottom: 10px;
}
.wma-kpi-icon-pill {
    width: 36px; height: 36px;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 8px;
}
.wma-kpi-icon-pill svg { width: 18px; height: 18px; }

.kpi-icon-neutral { background: #f4f4f5; color: #18181b; }
.dark .kpi-icon-neutral { background: #27272a; color: #f4f4f5; }
.kpi-icon-teal    { background: rgba(64,186,199,.12); color: #0891b2; }
.dark .kpi-icon-teal { background: rgba(64,186,199,.18); color: #38bdf8; }
.kpi-icon-blue    { background: #f0f9ff; color: #0284c7; }
.dark .kpi-icon-blue { background: rgba(14,165,233,.18); color: #38bdf8; }
.kpi-icon-green   { background: #ecfdf5; color: #10b981; }
.dark .kpi-icon-green { background: rgba(16,185,129,.18); color: #34d399; }

.wma-status-badge {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 3px 9px;
    border-radius: 999px;
    font-size: 11px;
    font-weight: 700;
}
.badge-neutral { background: #f4f4f5; color: #71717a; border: 1px solid #e4e4e7; }
.dark .badge-neutral { background: #27272a; color: #a1a1aa; border-color: #3f3f46; }
.badge-red     { background: #fef2f2; color: #dc2626; border: 1px solid #fee2e2; }
.dark .badge-red { background: rgba(239,68,68,.18); color: #f87171; border-color: rgba(239,68,68,.3); }
.badge-blue    { background: #f0f9ff; color: #0284c7; border: 1px solid #e0f2fe; }
.dark .badge-blue { background: rgba(14,165,233,.18); color: #38bdf8; border-color: rgba(14,165,233,.3); }
.badge-green   { background: #ecfdf5; color: #059669; border: 1px solid #d1fae5; }
.dark .badge-green { background: rgba(16,185,129,.18); color: #34d399; border-color: rgba(16,185,129,.3); }

.wma-kpi-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-top: 10px;
    border-top: 1px solid #f4f4f5;
    margin-top: 12px;
    font-size: 11.5px;
}
.dark .wma-kpi-footer { border-color: #27272a; }
.wma-kpi-footer a { color: #18181b; text-decoration: none; font-weight: 700; }
.dark .wma-kpi-footer a { color: #f4f4f5; }
.wma-kpi-footer a:hover { text-decoration: underline; }

/* ── Section Cards ── */
.wma-section-card {
    background: #ffffff;
    border: 1px solid #e4e4e7;
    border-radius: 18px;
    padding: 1.5rem 1.75rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 1px 3px rgba(0,0,0,.03);
}
.dark .wma-section-card { background: #18181b; border-color: #27272a; }

.wma-section-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 1.4rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid #f4f4f5;
}
.dark .wma-section-header { border-color: #27272a; }

.wma-section-num {
    width: 30px; height: 30px;
    border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    font-size: 13px; font-weight: 600;
    flex-shrink: 0;
    background: #f4f4f5;
    color: #18181b;
    border: 1px solid #e4e4e7;
}
.dark .wma-section-num { background: #27272a; color: #f4f4f5; border-color: #3f3f46; }

.wma-label {
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 13px;
    font-weight: 700;
    color: #27272a;
    margin-bottom: 6px;
}
.dark .wma-label { color: #e4e4e7; }
.wma-label a { color: #18181b; text-decoration: none; font-size: 12px; font-weight: 600; }
.dark .wma-label a { color: #f4f4f5; }
.wma-label a:hover { text-decoration: underline; }

.wma-input {
    width: 100%;
    height: 42px;
    padding: 0 14px;
    font-size: 13px;
    border-radius: 10px;
    border: 1px solid #d4d4d8;
    background: #ffffff;
    color: inherit;
    font-family: inherit;
    outline: none;
    transition: all .15s ease;
}
.dark .wma-input { background: #202024; border-color: #3f3f46; color: #fff; }
.wma-input:focus { border-color: #18181b; box-shadow: 0 0 0 3px rgba(24,24,27,.06); }
.dark .wma-input:focus { border-color: #a1a1aa; box-shadow: 0 0 0 3px rgba(255,255,255,.06); }

.wma-textarea {
    width: 100%;
    padding: 12px 14px;
    font-size: 12.5px;
    border-radius: 10px;
    border: 1px solid #d4d4d8;
    background: #18181b;
    color: #38bdf8;
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
    line-height: 1.5;
    outline: none;
    resize: vertical;
    transition: all .15s ease;
}
.dark .wma-textarea { background: #121215; border-color: #3f3f46; color: #38bdf8; }
.wma-textarea:focus { border-color: #52525b; }

.wma-subtext {
    font-size: 11.5px;
    color: #71717a;
    margin-top: 5px;
}
.dark .wma-subtext { color: #a1a1aa; }

.wma-info-callout {
    background: #f8fafc;
    border: 1px solid #e2e8f0;
    border-radius: 10px;
    padding: 8px 12px;
    font-size: 12px;
    color: #475569;
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 8px;
}
.dark .wma-info-callout { background: #1e1e24; border-color: #2e2e38; color: #94a3b8; }

/* ── Toggle Switch ── */
.wma-switch-wrap {
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    user-select: none;
}
.wma-switch {
    width: 38px;
    height: 22px;
    border-radius: 999px;
    background: #e4e4e7;
    position: relative;
    transition: background .2s ease;
}
.wma-switch-active { background: #10b981 !important; }
.dark .wma-switch { background: #3f3f46; }
.wma-switch-knob {
    width: 18px;
    height: 18px;
    border-radius: 50%;
    background: #ffffff;
    position: absolute;
    top: 2px;
    left: 2px;
    transition: transform .2s ease;
    box-shadow: 0 1px 3px rgba(0,0,0,.15);
}
.wma-knob-active { transform: translateX(16px); }

/* ── Sticky Save Row ── */
.wma-save-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
    background: #ffffff;
    border: 1px solid #e4e4e7;
    border-radius: 16px;
    padding: 1.1rem 1.6rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 4px 14px rgba(0,0,0,.04);
    flex-wrap: wrap;
}
.dark .wma-save-bar { background: #18181b; border-color: #27272a; }

/* ── Bottom 2-Card Row (Sitemap & Robots) ── */
.wma-bottom-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.25rem;
    margin-bottom: 2rem;
}
@media (max-width: 1024px) { .wma-bottom-grid { grid-template-columns: 1fr; } }

.wma-modal-overlay {
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0,0,0,0.6);
    backdrop-filter: blur(4px);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 20px;
}
.wma-modal-card {
    background: #ffffff;
    border: 1px solid #e4e4e7;
    border-radius: 20px;
    max-width: 800px;
    width: 100%;
    max-height: 85vh;
    display: flex;
    flex-direction: column;
    box-shadow: 0 20px 40px rgba(0,0,0,0.25);
    overflow: hidden;
}
.dark .wma-modal-card { background: #18181b; border-color: #27272a; color: #fff; }
</style>

<div class="wma-wrap">

    {{-- Hero Banner --}}
    <div class="wma-hero">
        <div style="display: flex; align-items: center; gap: 1rem;">
            <div class="wma-icon-box">
                <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="16 18 22 12 16 6"></polyline>
                    <polyline points="8 6 2 12 8 18"></polyline>
                </svg>
            </div>
            <div>
                <div style="display: flex; align-items: center; gap: 8px; flex-wrap: wrap;">
                    <h1 style="font-size: 1.35rem; font-weight: 600; margin: 0; letter-spacing: -0.02em;">
                        Webmaster &amp; Analytics Tools
                    </h1>
                    <span style="background: rgba(16,185,129,.12); color: #059669; border: 1px solid rgba(16,185,129,.25); font-size: 11px; font-weight: 700; padding: 2px 8px; border-radius: 6px;">
                        ⚡ Realtime Tracking
                    </span>
                    <span style="background: rgba(64,186,199,.12); color: #0891b2; border: 1px solid rgba(64,186,199,.25); font-size: 11px; font-weight: 700; padding: 2px 8px; border-radius: 6px;">
                        Google &amp; Meta
                    </span>
                </div>
                <p style="font-size: 13px; color: #71717a; margin: 4px 0 0 0;">
                    Centralized hub to connect Google Search Console, Google Analytics 4 (GA4), Tag Manager, Meta Pixel, and manage real-time XML sitemaps.
                </p>
            </div>
        </div>

        <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
            <button type="button" wire:click="openHeadModal" class="wma-btn-outline">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                <span>Inspect Live &lt;head&gt; Code</span>
            </button>
            <a href="{{ url('/sitemap.xml') }}" target="_blank" class="wma-btn-outline">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                <span>Live XML Sitemap</span>
            </a>
            <a href="{{ url('/admin/page-seos') }}" class="wma-btn-primary">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                <span>Page SEO Hub</span>
            </a>
        </div>
    </div>

    {{-- Top 4 KPI Status Cards --}}
    <div class="wma-kpi-grid">
        {{-- Card 1: Search Console --}}
        <div class="wma-kpi-card">
            <div>
                <div class="wma-kpi-header">
                    <div>
                        <div class="wma-kpi-icon-pill kpi-icon-neutral">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                        </div>
                        <div style="font-size: 13.5px; font-weight: 600;">Search Console</div>
                        <div style="font-size: 11px; color: #71717a;">Google SERP</div>
                    </div>
                    @if(!empty($google_site_verification))
                        <span class="wma-status-badge badge-green">● Connected</span>
                    @else
                        <span class="wma-status-badge badge-neutral">● Needs Token</span>
                    @endif
                </div>

                <div style="margin-top: 6px;">
                    <div style="font-size: 11px; color: #71717a;">Verification Status:</div>
                    <div style="font-size: 13px; font-weight: 700; color: {{ !empty($google_site_verification) ? '#10b981' : '#71717a' }};">
                        {{ !empty($google_site_verification) ? 'Configured & Active' : 'Not configured yet' }}
                    </div>
                </div>
            </div>

            <div class="wma-kpi-footer">
                <a href="https://search.google.com/search-console" target="_blank">Open Search Console ↗</a>
                <span style="color: #a1a1aa;">SERP Indexing</span>
            </div>
        </div>

        {{-- Card 2: GA4 Analytics --}}
        <div class="wma-kpi-card">
            <div>
                <div class="wma-kpi-header">
                    <div>
                        <div class="wma-kpi-icon-pill kpi-icon-teal">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                        </div>
                        <div style="font-size: 13.5px; font-weight: 600;">GA4 Analytics</div>
                        <div style="font-size: 11px; color: #71717a;">Google Analytics 4</div>
                    </div>
                    @if($ga4_enabled && !empty($google_analytics_id))
                        <span class="wma-status-badge badge-green">● Active</span>
                    @else
                        <span class="wma-status-badge badge-neutral">● No ID</span>
                    @endif
                </div>

                <div style="margin-top: 6px;">
                    <div style="font-size: 11px; color: #71717a;">Measurement ID:</div>
                    <div style="font-size: 13px; font-weight: 700; font-family: ui-monospace, monospace;">
                        {{ $google_analytics_id ?: 'G-XXXXXXXXXX' }}
                    </div>
                </div>
            </div>

            <div class="wma-kpi-footer">
                <a href="https://analytics.google.com" target="_blank">Open GA4 Dashboard ↗</a>
                <span style="color: #a1a1aa;">Realtime Stats</span>
            </div>
        </div>

        {{-- Card 3: Tag & Pixel --}}
        <div class="wma-kpi-card">
            <div>
                <div class="wma-kpi-header">
                    <div>
                        <div class="wma-kpi-icon-pill kpi-icon-blue">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><rect x="2" y="2" width="20" height="20" rx="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path></svg>
                        </div>
                        <div style="font-size: 13.5px; font-weight: 600;">Tag &amp; Pixel</div>
                        <div style="font-size: 11px; color: #71717a;">GTM / Meta Tracking</div>
                    </div>
                    @if($gtm_enabled || ($meta_pixel_enabled && !empty($facebook_pixel_id)))
                        <span class="wma-status-badge badge-green">● Active</span>
                    @else
                        <span class="wma-status-badge badge-neutral">● Inactive</span>
                    @endif
                </div>

                <div style="margin-top: 6px;">
                    <div style="font-size: 11px; color: #71717a;">Container / Pixel:</div>
                    <div style="font-size: 13px; font-weight: 700; font-family: ui-monospace, monospace; text-overflow: ellipsis; overflow: hidden; white-space: nowrap;">
                        {{ $gtm_container_id ?: ($facebook_pixel_id ? 'Pixel: ' . $facebook_pixel_id : 'Not configured') }}
                    </div>
                </div>
            </div>

            <div class="wma-kpi-footer">
                <a href="https://tagmanager.google.com" target="_blank">Open Tag Manager ↗</a>
                <span style="color: #a1a1aa;">Container</span>
            </div>
        </div>

        {{-- Card 4: XML Sitemap --}}
        <div class="wma-kpi-card">
            <div>
                <div class="wma-kpi-header">
                    <div>
                        <div class="wma-kpi-icon-pill kpi-icon-green">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
                        </div>
                        <div style="font-size: 13.5px; font-weight: 600;">XML Sitemap</div>
                        <div style="font-size: 11px; color: #71717a;">Search Engine Index</div>
                    </div>
                    <span class="wma-status-badge badge-green">● 100% Live</span>
                </div>

                <div style="margin-top: 6px;">
                    <div style="font-size: 11px; color: #71717a;">Indexed URLs Count:</div>
                    <div style="font-size: 13px; font-weight: 600; color: #10b981;">
                        {{ $sitemapStats['total_urls'] ?? 0 }} Total URLs in /sitemap.xml
                    </div>
                </div>
            </div>

            <div class="wma-kpi-footer" x-data="{ copied: false }">
                <button type="button" @click="navigator.clipboard.writeText('{{ url('/sitemap.xml') }}'); copied = true; setTimeout(() => copied = false, 2000)" style="background: none; border: none; color: inherit; font-size: 11.5px; font-weight: 700; cursor: pointer; padding: 0;">
                    <span x-show="!copied">⎘ Copy URL</span>
                    <span x-show="copied" style="color: #10b981;">✓ Copied!</span>
                </button>
                <a href="{{ url('/sitemap.xml') }}" target="_blank">View XML ↗</a>
            </div>
        </div>
    </div>

    {{-- SECTION 1: Search Engine Webmaster Verifications --}}
    <div class="wma-section-card">
        <div class="wma-section-header">
            <div class="wma-section-num">1</div>
            <div>
                <h2 style="font-size: 14.5px; font-weight: 600; margin: 0;">1. Search Engine Webmaster Verifications</h2>
                <p style="font-size: 12px; color: #71717a; margin: 2px 0 0 0;">
                    Verify site ownership in Google Search Console, Bing, Pinterest, and Yandex to index pages and track search impressions.
                </p>
            </div>
        </div>

        {{-- Google Search Console --}}
        <div style="margin-bottom: 1.25rem;">
            <div class="wma-label">
                <span>Google Search Console HTML Verification Token</span>
                <a href="https://search.google.com/search-console" target="_blank">Get Verification Token from Google ↗</a>
            </div>
            <input type="text" wire:model.defer="google_site_verification" class="wma-input" placeholder='e.g. google-site-verification=XXXXXXXXXXXXXXXXXXXX or paste full <meta name="google-site-verification" content="..." />'>
            <div class="wma-info-callout">
                <span>💡</span>
                <span><strong>Smart Parser:</strong> You can paste either the full meta tag or just the verification code. The system will automatically inject <code>&lt;meta name="google-site-verification" content="..."&gt;</code> into the public &lt;head&gt;.</span>
            </div>
        </div>

        {{-- Bing & Pinterest in 2-column grid --}}
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem; margin-bottom: 1.25rem;">
            <div>
                <div class="wma-label">
                    <span>Bing Webmaster Verification Code (msvalidate.01)</span>
                </div>
                <input type="text" wire:model.defer="bing_site_verification" class="wma-input" placeholder="e.g. 7A8B9C001E2F3G4H5I6J7K8L9M0N">
                <div class="wma-subtext">Outputs &lt;meta name="msvalidate.01" content="..."&gt; in header.</div>
            </div>

            <div>
                <div class="wma-label">
                    <span>Pinterest Domain Verification</span>
                </div>
                <input type="text" wire:model.defer="pinterest_verify_code" class="wma-input" placeholder="e.g. 8a7b6c5d4e3f2g1h">
                <div class="wma-subtext">Outputs &lt;meta name="p:domain_verify" content="..."&gt; in header.</div>
            </div>
        </div>

        {{-- Yandex --}}
        <div>
            <div class="wma-label">
                <span>Yandex Webmaster Verification</span>
            </div>
            <input type="text" wire:model.defer="yandex_verify_code" class="wma-input" placeholder="e.g. a1b2c3d4e5f6g7h8">
            <div class="wma-subtext">Outputs &lt;meta name="yandex-verification" content="..."&gt; in header.</div>
        </div>
    </div>

    {{-- SECTION 2: Google Analytics 4 (GA4) & Tag Manager (GTM) --}}
    <div class="wma-section-card">
        <div class="wma-section-header">
            <div class="wma-section-num">2</div>
            <div>
                <h2 style="font-size: 14.5px; font-weight: 600; margin: 0;">2. Google Analytics 4 (GA4) &amp; Tag Manager (GTM)</h2>
                <p style="font-size: 12px; color: #71717a; margin: 2px 0 0 0;">
                    Track live visitors, page views, wholesale inquiries, button clicks, and marketing campaigns.
                </p>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem;">
            {{-- GA4 Card --}}
            <div style="background: #fafafa; border: 1px solid #e4e4e7; border-radius: 14px; padding: 1.2rem;" class="dark:bg-zinc-900 dark:border-zinc-800">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                        <span style="font-weight: 700; font-size: 13.5px;">Google Analytics 4</span>
                    </div>
                    <label class="wma-switch-wrap">
                        <input type="checkbox" wire:model.defer="ga4_enabled" style="display: none;">
                        <div class="wma-switch {{ $ga4_enabled ? 'wma-switch-active' : '' }}" wire:click="$toggle('ga4_enabled')">
                            <div class="wma-switch-knob {{ $ga4_enabled ? 'wma-knob-active' : '' }}"></div>
                        </div>
                        <span style="font-size: 12px; font-weight: 700; color: {{ $ga4_enabled ? '#10b981' : '#71717a' }};">
                            {{ $ga4_enabled ? 'Active' : 'Inactive' }}
                        </span>
                    </label>
                </div>

                <div style="margin-bottom: 10px;">
                    <label class="wma-label">GA4 Measurement ID</label>
                    <input type="text" wire:model.defer="google_analytics_id" class="wma-input" placeholder="e.g. G-71X8XZ9ABC">
                    <div class="wma-subtext">Found under Admin &gt; Data Streams &gt; Web Stream Details in GA4.</div>
                </div>

                <div style="display: flex; align-items: center; gap: 8px; margin-top: 12px;">
                    <input type="checkbox" id="anonymize_ip" wire:model.defer="ga4_anonymize_ip" style="width: 16px; height: 16px; accent-color: #18181b;">
                    <label for="anonymize_ip" style="font-size: 12.5px; font-weight: 600; color: #3f3f46; cursor: pointer;" class="dark:text-zinc-300">
                        Anonymize IP Addresses <span style="font-weight: 400; color: #71717a;">(Enhanced visitor privacy)</span>
                    </label>
                </div>
            </div>

            {{-- GTM Card --}}
            <div style="background: #fafafa; border: 1px solid #e4e4e7; border-radius: 14px; padding: 1.2rem;" class="dark:bg-zinc-900 dark:border-zinc-800">
                <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 1rem;">
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg>
                        <span style="font-weight: 700; font-size: 13.5px;">Google Tag Manager</span>
                    </div>
                    <label class="wma-switch-wrap">
                        <input type="checkbox" wire:model.defer="gtm_enabled" style="display: none;">
                        <div class="wma-switch {{ $gtm_enabled ? 'wma-switch-active' : '' }}" wire:click="$toggle('gtm_enabled')">
                            <div class="wma-switch-knob {{ $gtm_enabled ? 'wma-knob-active' : '' }}"></div>
                        </div>
                        <span style="font-size: 12px; font-weight: 700; color: {{ $gtm_enabled ? '#10b981' : '#71717a' }};">
                            {{ $gtm_enabled ? 'Active' : 'Inactive' }}
                        </span>
                    </label>
                </div>

                <div style="margin-bottom: 10px;">
                    <label class="wma-label">GTM Container ID</label>
                    <input type="text" wire:model.defer="gtm_container_id" class="wma-input" placeholder="e.g. GTM-N8K9XZP">
                    <div class="wma-subtext">Outputs official GTM head script and body noscript iframe container.</div>
                </div>

                <div class="wma-info-callout" style="margin-top: 12px;">
                    <span>💡</span>
                    <span>Use GTM if you want to deploy custom event tags, conversion triggers, or heatmaps without modifying source code.</span>
                </div>
            </div>
        </div>
    </div>

    {{-- SECTION 3: Meta (Facebook & Instagram) Pixel --}}
    <div class="wma-section-card">
        <div class="wma-section-header">
            <div class="wma-section-num">3</div>
            <div>
                <h2 style="font-size: 14.5px; font-weight: 600; margin: 0;">3. Meta (Facebook &amp; Instagram) Pixel</h2>
                <p style="font-size: 12px; color: #71717a; margin: 2px 0 0 0;">
                    Measure Facebook ad conversions and build custom retargeting audiences for Voltiva electrical products.
                </p>
            </div>
        </div>

        <div style="display: flex; align-items: center; justify-content: space-between; gap: 1.5rem; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 280px;">
                <label class="wma-label">Meta Pixel ID</label>
                <input type="text" wire:model.defer="facebook_pixel_id" class="wma-input" placeholder="e.g. 123456789012345">
                <div class="wma-subtext">Found in Meta Events Manager &gt; Data Sources.</div>
            </div>

            <div style="min-width: 220px; background: #fafafa; border: 1px solid #e4e4e7; border-radius: 12px; padding: 12px 16px;" class="dark:bg-zinc-900 dark:border-zinc-800">
                <div style="font-size: 12px; font-weight: 700; margin-bottom: 2px;">Meta Pixel Status</div>
                <div style="font-size: 11px; color: #71717a; margin-bottom: 8px;">Inject Facebook conversion tracking script</div>
                <label class="wma-switch-wrap">
                    <input type="checkbox" wire:model.defer="meta_pixel_enabled" style="display: none;">
                    <div class="wma-switch {{ $meta_pixel_enabled ? 'wma-switch-active' : '' }}" wire:click="$toggle('meta_pixel_enabled')">
                        <div class="wma-switch-knob {{ $meta_pixel_enabled ? 'wma-knob-active' : '' }}"></div>
                    </div>
                    <span style="font-size: 12px; font-weight: 700; color: {{ $meta_pixel_enabled ? '#10b981' : '#71717a' }};">
                        {{ $meta_pixel_enabled ? 'Active' : 'Inactive' }}
                    </span>
                </label>
            </div>
        </div>
    </div>

    {{-- SECTION 4: Custom Tracking Scripts (Head & Body) --}}
    <div class="wma-section-card">
        <div class="wma-section-header">
            <div class="wma-section-num">4</div>
            <div>
                <h2 style="font-size: 14.5px; font-weight: 600; margin: 0;">4. Custom Tracking Scripts (Head &amp; Body)</h2>
                <p style="font-size: 12px; color: #71717a; margin: 2px 0 0 0;">
                    Inject custom JavaScript tags, chat widgets, or conversion tracking code safely.
                </p>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.25rem;">
            <div>
                <label class="wma-label">Custom &lt;head&gt; Scripts</label>
                <textarea wire:model.defer="custom_head_code" rows="6" class="wma-textarea" placeholder="<!-- Paste Microsoft Clarity, Hotjar, or custom tracking tags here -->"></textarea>
                <div class="wma-subtext">Rendered right before the closing &lt;/head&gt; tag on public pages.</div>
            </div>

            <div>
                <label class="wma-label">Custom Body / Footer Scripts</label>
                <textarea wire:model.defer="custom_footer_code" rows="6" class="wma-textarea" placeholder="<!-- Paste WhatsApp chat widget, chatbot scripts, or conversion pixels here -->"></textarea>
                <div class="wma-subtext">Rendered right before the closing &lt;/body&gt; tag on public pages.</div>
            </div>
        </div>
    </div>

    {{-- Sticky Save Bar --}}
    <div class="wma-save-bar">
        <div style="display: flex; align-items: center; gap: 8px; font-size: 12.5px; color: #059669; font-weight: 600;">
            <span>🛡️</span>
            <span>All changes take effect immediately across all website pages with zero downtime.</span>
        </div>

        <button type="button" wire:click="save" wire:loading.attr="disabled" class="wma-btn-primary">
            <svg viewBox="0 0 24 24"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
            <span wire:loading.remove wire:target="save">Save Webmaster &amp; Analytics Settings</span>
            <span wire:loading wire:target="save">Saving Settings...</span>
        </button>
    </div>

    {{-- BOTTOM 2-COLUMN ROW: Dynamic XML Sitemap & Robots.txt --}}
    <div class="wma-bottom-grid">
        {{-- Card Left: Real-time Dynamic XML Sitemap --}}
        <div class="wma-section-card" style="margin-bottom: 0;">
            <div class="wma-section-header">
                <div class="wma-section-num">⚡</div>
                <div style="flex: 1;">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <h3 style="font-size: 14px; font-weight: 600; margin: 0;">Real-time Dynamic XML Sitemap</h3>
                        <span class="wma-status-badge badge-green">100% Live</span>
                    </div>
                    <p style="font-size: 12px; color: #71717a; margin: 2px 0 0 0;">
                        Automatically updated sitemap for Google Search Console.
                    </p>
                </div>
            </div>

            <div style="margin-bottom: 12px;" x-data="{ copied: false }">
                <div style="font-size: 11px; font-weight: 700; color: #71717a; text-transform: uppercase; margin-bottom: 5px;">Public Sitemap URL</div>
                <div style="display: flex; align-items: center; gap: 8px;">
                    <input type="text" readonly value="{{ url('/sitemap.xml') }}" class="wma-input" style="font-family: ui-monospace, monospace; font-size: 12px; font-weight: 600; background: #f8fafc;" class="dark:bg-zinc-900">
                    <button type="button" @click="navigator.clipboard.writeText('{{ url('/sitemap.xml') }}'); copied = true; setTimeout(() => copied = false, 2000)" class="wma-btn-outline" style="white-space: nowrap; height: 42px;">
                        <span x-show="!copied">Copy</span>
                        <span x-show="copied" style="color: #10b981; font-weight: 700;">Copied!</span>
                    </button>
                    <a href="{{ url('/sitemap.xml') }}" target="_blank" class="wma-btn-outline" style="white-space: nowrap; height: 42px;">
                        <span>Open ↗</span>
                    </a>
                </div>
            </div>

            <div style="background: #fafafa; border: 1px solid #e4e4e7; border-radius: 12px; padding: 12px 14px; margin-bottom: 14px;" class="dark:bg-zinc-900 dark:border-zinc-800">
                <div style="display: flex; flex-direction: column; gap: 6px; font-size: 12px; color: #3f3f46;" class="dark:text-zinc-300">
                    <div style="display: flex; align-items: center; gap: 7px;">
                        <span style="color: #10b981; font-weight: 600;">✓</span>
                        <span>Includes all <strong>{{ $sitemapStats['pages_count'] ?? 0 }} static pages</strong> with changefreq and priority.</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 7px;">
                        <span style="color: #10b981; font-weight: 600;">✓</span>
                        <span>Includes all <strong>{{ $sitemapStats['products_count'] ?? 0 }} products</strong> with Google image tags.</span>
                    </div>
                    <div style="display: flex; align-items: center; gap: 7px;">
                        <span style="color: #10b981; font-weight: 600;">✓</span>
                        <span>Includes all <strong>{{ $sitemapStats['blogs_count'] ?? 0 }} published blog articles</strong> with publication timestamps.</span>
                    </div>
                </div>
            </div>

            <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                <button type="button" wire:click="generateSitemap" wire:loading.attr="disabled" class="wma-btn-outline" style="flex: 1;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21.5 2v6h-6M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/></svg>
                    <span wire:loading.remove wire:target="generateSitemap">Sync Cache</span>
                    <span wire:loading wire:target="generateSitemap">Syncing...</span>
                </button>
                <a href="https://search.google.com/search-console/sitemaps" target="_blank" class="wma-btn-outline" style="flex: 2; justify-content: center;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
                    <span>Submit to Google Search Console</span>
                </a>
            </div>
        </div>

        {{-- Card Right: Robots.txt Directives Editor --}}
        <div class="wma-section-card" style="margin-bottom: 0;">
            <div class="wma-section-header">
                <div class="wma-section-num">🤖</div>
                <div style="flex: 1;">
                    <h3 style="font-size: 14px; font-weight: 600; margin: 0;">Robots.txt Directives Editor</h3>
                    <p style="font-size: 12px; color: #71717a; margin: 2px 0 0 0;">
                        Guide search crawler bots and point to XML sitemap.
                    </p>
                </div>
            </div>

            <div style="margin-bottom: 12px;">
                <textarea wire:model.defer="robotsContent" rows="6" class="wma-textarea" style="background: #18181b; color: #f4f4f5; font-size: 12px;"></textarea>
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px; flex-wrap: wrap;">
                <button type="button" wire:click="applyRobotsPreset('recommended')" class="wma-btn-outline" style="font-size: 11.5px; padding: 6px 12px;">
                    🔧 Recommended Preset
                </button>
                <div style="display: flex; gap: 8px;">
                    <a href="{{ url('/robots.txt') }}" target="_blank" class="wma-btn-outline" style="font-size: 11.5px; padding: 6px 12px;">
                        View Live ↗
                    </a>
                    <button type="button" wire:click="saveRobotsTxt" wire:loading.attr="disabled" class="wma-btn-primary" style="font-size: 11.5px; padding: 6px 14px;">
                        <span wire:loading.remove wire:target="saveRobotsTxt">💾 Save robots.txt</span>
                        <span wire:loading wire:target="saveRobotsTxt">Saving...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Live <head> Code Inspection Modal --}}
    @if($showHeadModal)
        <div class="wma-modal-overlay" wire:click.self="closeHeadModal">
            <div class="wma-modal-card">
                <div style="display: flex; align-items: center; justify-content: space-between; padding: 16px 22px; border-bottom: 1px solid #e4e4e7;" class="dark:border-zinc-800">
                    <div style="display: flex; align-items: center; gap: 10px;">
                        <div style="width: 32px; height: 32px; border-radius: 8px; background: #18181b; color: #fff; display: flex; align-items: center; justify-content: center;" class="dark:bg-zinc-800">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="16 18 22 12 16 6"></polyline><polyline points="8 6 2 12 8 18"></polyline></svg>
                        </div>
                        <div>
                            <h3 style="margin: 0; font-size: 14.5px; font-weight: 600;">Live HTML &lt;head&gt; Code Preview</h3>
                            <p style="margin: 0; font-size: 11.5px; color: #71717a;">Exact tags generated and injected into public customer pages</p>
                        </div>
                    </div>
                    <button type="button" wire:click="closeHeadModal" style="background: none; border: none; font-size: 20px; color: #71717a; cursor: pointer; line-height: 1;">&times;</button>
                </div>

                <div style="padding: 18px 22px; overflow-y: auto; flex: 1;">
                    <div style="position: relative;" x-data="{ copied: false }">
                        <button type="button" @click="navigator.clipboard.writeText($refs.codeblock.innerText); copied = true; setTimeout(() => copied = false, 2000)" class="wma-btn-outline" style="position: absolute; top: 10px; right: 10px; font-size: 11px; padding: 4px 10px; z-index: 10;">
                            <span x-show="!copied">Copy Code</span>
                            <span x-show="copied" style="color: #10b981; font-weight: 700;">Copied!</span>
                        </button>
                        <pre x-ref="codeblock" style="background: #18181b; color: #38bdf8; padding: 18px 20px; border-radius: 12px; font-family: ui-monospace, monospace; font-size: 12px; line-height: 1.6; overflow-x: auto; margin: 0; white-space: pre-wrap;">{{ $generatedHeadCode }}</pre>
                    </div>
                </div>

                <div style="display: flex; justify-content: flex-end; gap: 10px; padding: 14px 22px; border-top: 1px solid #e4e4e7; background: #fafafa;" class="dark:border-zinc-800 dark:bg-zinc-900">
                    <button type="button" wire:click="closeHeadModal" class="wma-btn-primary">
                        Close Preview
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
</x-filament-panels::page>
