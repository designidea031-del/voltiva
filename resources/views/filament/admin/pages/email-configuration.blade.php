<x-filament-panels::page>

<style>
/* ── Design System Tokens (Voltiva Dash Theme) ── */
.emc-wrap * { box-sizing: border-box; }
.emc-wrap {
    font-family: 'Figtree', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    color: #18181b;
}
.dark .emc-wrap { color: #f4f4f5; }

/* ── Hero Header ── */
.emc-hero {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1.25rem;
    background: #ffffff;
    border: 1px solid #e4e4e7;
    border-radius: 18px;
    padding: 1.25rem 1.6rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 1px 3px rgba(0,0,0,.03);
    flex-wrap: wrap;
}
.dark .emc-hero { background: #18181b; border-color: #27272a; }

.emc-icon-box {
    width: 48px; height: 48px;
    border-radius: 14px;
    background: linear-gradient(135deg, #18181b 0%, #3f3f46 100%);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 4px 14px rgba(0,0,0,.15);
}
.dark .emc-icon-box {
    background: linear-gradient(135deg, #27272a 0%, #3f3f46 100%);
    border: 1px solid #52525b;
}
.emc-icon-box svg { width: 22px; height: 22px; stroke: #fff; fill: none; }

/* ── Save Action Button ── */
.emc-btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 22px;
    border-radius: 11px;
    font-size: 13.5px;
    font-weight: 700;
    text-decoration: none;
    background: #18181b;
    color: #ffffff;
    border: 1px solid #18181b;
    transition: all .18s ease;
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(0,0,0,.15);
    white-space: nowrap;
}
.emc-btn-primary:hover {
    background: #000000;
    border-color: #000000;
    box-shadow: 0 4px 14px rgba(0,0,0,.25);
    transform: translateY(-1px);
}
.dark .emc-btn-primary {
    background: #ffffff;
    color: #000000;
    border-color: #ffffff;
}
.dark .emc-btn-primary:hover {
    background: #e4e4e7;
    border-color: #e4e4e7;
}
.emc-btn-primary svg { width: 16px; height: 16px; stroke: currentColor; fill: none; }

/* ── Badges ── */
.emc-badge-configured {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 3px 9px;
    background: rgba(64, 186, 199, 0.12);
    border: 1px solid rgba(64, 186, 199, 0.3);
    border-radius: 9999px;
    font-size: 11.5px;
    font-weight: 700;
    color: #0d9488;
}
.dark .emc-badge-configured {
    background: rgba(64, 186, 199, 0.18);
    color: #40bac7;
    border-color: rgba(64, 186, 199, 0.4);
}
.emc-dot-live {
    width: 6.5px; height: 6.5px;
    border-radius: 50%;
    background: #0d9488;
    box-shadow: 0 0 0 2px rgba(13, 148, 136, 0.2);
    animation: emcPulse 2s infinite;
}
.dark .emc-dot-live { background: #40bac7; box-shadow: 0 0 0 2px rgba(64, 186, 199, 0.3); }

.emc-badge-warning {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 3px 9px;
    background: #fef3c7;
    border: 1px solid #fde68a;
    border-radius: 9999px;
    font-size: 11.5px;
    font-weight: 700;
    color: #b45309;
}
.dark .emc-badge-warning {
    background: rgba(180, 83, 9, 0.2);
    border-color: rgba(180, 83, 9, 0.4);
    color: #fcd34d;
}

@keyframes emcPulse {
    0% { transform: scale(0.95); opacity: 0.8; }
    50% { transform: scale(1.15); opacity: 1; }
    100% { transform: scale(0.95); opacity: 0.8; }
}

/* ── 2-Column Responsive Layout ── */
.emc-layout {
    display: grid;
    grid-template-columns: 1fr 340px;
    gap: 1.5rem;
    align-items: start;
}
@media (max-width: 1080px) {
    .emc-layout { grid-template-columns: 1fr; }
}

/* ── Cards ── */
.emc-card {
    background: #ffffff;
    border: 1px solid #e4e4e7;
    border-radius: 18px;
    padding: 1.4rem 1.6rem;
    box-shadow: 0 1px 3px rgba(0,0,0,.03);
    margin-bottom: 1.5rem;
}
.dark .emc-card { background: #18181b; border-color: #27272a; }

.emc-card-head {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 12px;
    margin-bottom: 1.25rem;
}
.emc-card-head-left {
    display: flex;
    align-items: center;
    gap: 10px;
}
.emc-card-head-icon {
    width: 34px; height: 34px;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    background: #f4f4f5;
    color: #18181b;
    flex-shrink: 0;
}
.dark .emc-card-head-icon { background: #27272a; color: #f4f4f5; }
.emc-card-head-icon svg { width: 18px; height: 18px; stroke: currentColor; fill: none; }

.emc-card-title {
    font-size: 15px;
    font-weight: 700;
    color: #18181b;
    letter-spacing: -0.01em;
}
.dark .emc-card-title { color: #ffffff; }

.emc-card-desc {
    font-size: 12.5px;
    color: #71717a;
    margin-top: 2px;
}
.dark .emc-card-desc { color: #a1a1aa; }

.emc-badge-pill {
    padding: 3px 8px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 700;
    background: #f4f4f5;
    color: #71717a;
    border: 1px solid #e4e4e7;
    white-space: nowrap;
}
.dark .emc-badge-pill {
    background: #27272a;
    color: #a1a1aa;
    border-color: #3f3f46;
}
.emc-badge-pill.teal {
    background: rgba(64, 186, 199, 0.12);
    color: #0d9488;
    border-color: rgba(64, 186, 199, 0.3);
}
.dark .emc-badge-pill.teal {
    background: rgba(64, 186, 199, 0.18);
    color: #40bac7;
    border-color: rgba(64, 186, 199, 0.4);
}

/* ── 1-Click Provider Quick-Fill Grid ── */
.emc-providers-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 12px;
    margin-top: 0.85rem;
}
@media (max-width: 820px) {
    .emc-providers-grid { grid-template-columns: repeat(2, 1fr); }
}
@media (max-width: 480px) {
    .emc-providers-grid { grid-template-columns: 1fr; }
}

.emc-provider-btn {
    border: 1px solid #e4e4e7;
    border-radius: 14px;
    padding: 12px 14px;
    background: #fafafa;
    cursor: pointer;
    transition: all .16s ease;
    text-align: left;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    gap: 10px;
    position: relative;
}
.emc-provider-btn:hover {
    background: #ffffff;
    border-color: #18181b;
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(0,0,0,.05);
}
.dark .emc-provider-btn {
    background: #1f1f23;
    border-color: #2e2e33;
}
.dark .emc-provider-btn:hover {
    background: #27272a;
    border-color: #ffffff;
}

.emc-provider-selected {
    background: #ffffff !important;
    border-color: #18181b !important;
    box-shadow: 0 0 0 2px #18181b !important;
}
.dark .emc-provider-selected {
    background: #27272a !important;
    border-color: #ffffff !important;
    box-shadow: 0 0 0 2px #ffffff !important;
}

.emc-provider-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.emc-provider-icon {
    width: 28px; height: 28px;
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 14px;
    font-weight: 800;
}
.emc-radio-indicator {
    width: 14px; height: 14px;
    border-radius: 50%;
    border: 2px solid #d4d4d8;
    transition: all .15s ease;
}
.emc-provider-selected .emc-radio-indicator {
    border-color: #18181b;
    background: #18181b;
    box-shadow: inset 0 0 0 2.5px #ffffff;
}
.dark .emc-provider-selected .emc-radio-indicator {
    border-color: #ffffff;
    background: #ffffff;
    box-shadow: inset 0 0 0 2.5px #18181b;
}

.emc-provider-name {
    font-size: 13px;
    font-weight: 700;
    color: #18181b;
}
.dark .emc-provider-name { color: #f4f4f5; }

.emc-provider-sub {
    font-size: 11px;
    color: #71717a;
}
.dark .emc-provider-sub { color: #a1a1aa; }

.emc-provider-tag {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-size: 10.5px;
    font-weight: 700;
    color: #52525b;
    background: #f4f4f5;
    padding: 2px 6px;
    border-radius: 5px;
    width: fit-content;
}
.dark .emc-provider-tag {
    background: #27272a;
    color: #d4d4d8;
}

/* ── Form Inputs ── */
.emc-grid-2 {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.15rem;
    margin-bottom: 1.15rem;
}
@media (max-width: 640px) {
    .emc-grid-2 { grid-template-columns: 1fr; }
}

.emc-field {
    display: flex;
    flex-direction: column;
    gap: 6px;
    margin-bottom: 1.15rem;
}
.emc-field:last-child { margin-bottom: 0; }

.emc-label {
    font-size: 12.5px;
    font-weight: 700;
    color: #27272a;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.dark .emc-label { color: #e4e4e7; }
.emc-label .req { color: #ef4444; margin-left: 2px; }

.emc-input-wrap {
    position: relative;
    display: flex;
    align-items: center;
}
.emc-input-icon {
    position: absolute;
    left: 12px;
    width: 17px; height: 17px;
    color: #a1a1aa;
    pointer-events: none;
    stroke: currentColor;
    fill: none;
}
.emc-input-wrap.has-icon .emc-input,
.emc-input-wrap.has-icon .emc-select {
    padding-left: 38px;
}

.emc-input,
.emc-select {
    width: 100%;
    padding: 9px 13px;
    border-radius: 10px;
    border: 1px solid #d4d4d8;
    background: #ffffff;
    font-size: 13px;
    font-family: inherit;
    color: #18181b;
    outline: none;
    transition: all .16s ease;
    box-shadow: 0 1px 2px rgba(0,0,0,.02);
}
.emc-input:focus,
.emc-select:focus {
    border-color: #18181b;
    box-shadow: 0 0 0 3px rgba(24, 24, 27, 0.08);
}
.dark .emc-input,
.dark .emc-select {
    background: #202024;
    border-color: #3f3f46;
    color: #f4f4f5;
}
.dark .emc-input:focus,
.dark .emc-select:focus {
    border-color: #ffffff;
    box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.08);
}

/* ── Custom Theme Dropdown Select ── */
.emc-custom-select-wrapper {
    position: relative;
    width: 100%;
}

.emc-custom-select-btn {
    width: 100%;
    height: 40px;
    padding: 0 13px;
    border-radius: 10px;
    border: 1px solid #d4d4d8;
    background: #ffffff;
    font-size: 13px;
    font-weight: 600;
    font-family: inherit;
    color: #18181b;
    outline: none;
    transition: all .16s ease;
    box-shadow: 0 1px 2px rgba(0,0,0,.02);
    display: flex;
    align-items: center;
    justify-content: space-between;
    cursor: pointer;
    text-align: left;
}
.emc-custom-select-btn:hover {
    border-color: #18181b;
    background: #fafafa;
}
.emc-custom-select-open {
    border-color: #18181b !important;
    box-shadow: 0 0 0 3px rgba(24, 24, 27, 0.08) !important;
}

.dark .emc-custom-select-btn {
    background: #202024;
    border-color: #3f3f46;
    color: #f4f4f5;
}
.dark .emc-custom-select-btn:hover {
    border-color: #ffffff;
    background: #27272a;
}
.dark .emc-custom-select-open {
    border-color: #ffffff !important;
    box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.08) !important;
}

.emc-select-lock-icon {
    width: 17px;
    height: 17px;
    stroke: currentColor;
    color: #71717a;
    fill: none;
    flex-shrink: 0;
}
.dark .emc-select-lock-icon {
    color: #a1a1aa;
}

.emc-custom-select-val {
    font-size: 13px;
    font-weight: 600;
    color: #18181b;
}
.dark .emc-custom-select-val {
    color: #f4f4f5;
}

.emc-custom-select-chevron {
    color: #71717a;
    transition: transform .2s ease;
    flex-shrink: 0;
}
.emc-chevron-rotated {
    transform: rotate(180deg);
}

.emc-custom-select-dropdown {
    position: absolute;
    top: calc(100% + 6px);
    left: 0;
    right: 0;
    background: #ffffff;
    border: 1px solid #e4e4e7;
    border-radius: 14px;
    box-shadow: 0 12px 28px -4px rgba(0, 0, 0, 0.14), 0 6px 12px -4px rgba(0, 0, 0, 0.08);
    padding: 6px;
    z-index: 999;
    display: flex;
    flex-direction: column;
    gap: 3px;
}
.dark .emc-custom-select-dropdown {
    background: #18181b;
    border-color: #27272a;
    box-shadow: 0 16px 36px -4px rgba(0, 0, 0, 0.6);
}

.emc-dropdown-header {
    font-size: 10.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: .08em;
    color: #a1a1aa;
    padding: 6px 10px 4px 10px;
}
.dark .emc-dropdown-header {
    color: #71717a;
}

.emc-dropdown-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 9px 12px;
    border-radius: 9px;
    font-size: 13px;
    font-weight: 600;
    color: #3f3f46;
    background: transparent;
    border: none;
    cursor: pointer;
    transition: all .15s ease;
    text-align: left;
    font-family: inherit;
}
.emc-dropdown-item:hover {
    background: #f4f4f5;
    color: #18181b;
}
.dark .emc-dropdown-item {
    color: #d4d4d8;
}
.dark .emc-dropdown-item:hover {
    background: #27272a;
    color: #ffffff;
}

/* Active Selected Item in Dropdown (Voltiva High-Contrast Black in Light, White in Dark) */
.emc-dropdown-item-active {
    background: #18181b !important;
    color: #ffffff !important;
    font-weight: 700;
}
.dark .emc-dropdown-item-active {
    background: #ffffff !important;
    color: #000000 !important;
}
.emc-dropdown-item-active svg {
    stroke: currentColor;
}

.emc-pw-toggle {
    position: absolute;
    right: 12px;
    background: none;
    border: none;
    cursor: pointer;
    color: #71717a;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 4px;
}
.emc-pw-toggle:hover { color: #18181b; }
.dark .emc-pw-toggle:hover { color: #ffffff; }

.emc-hint {
    font-size: 11.5px;
    color: #71717a;
    line-height: 1.4;
    margin-top: 2px;
}
.dark .emc-hint { color: #a1a1aa; }
.emc-hint a {
    color: #0d9488;
    text-decoration: underline;
    font-weight: 600;
}
.dark .emc-hint a { color: #40bac7; }

/* ── Automation Rows ── */
.emc-auto-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    padding: 1rem;
    border-radius: 12px;
    background: #fafafa;
    border: 1px solid #f4f4f5;
    margin-bottom: 0.85rem;
}
.dark .emc-auto-row {
    background: #1e1e22;
    border-color: #27272a;
}
.emc-auto-left {
    display: flex;
    align-items: center;
    gap: 12px;
}
.emc-auto-icon {
    width: 38px; height: 38px;
    border-radius: 11px;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
}
.emc-auto-title {
    font-size: 13.5px;
    font-weight: 700;
    color: #18181b;
}
.dark .emc-auto-title { color: #ffffff; }
.emc-auto-desc {
    font-size: 12px;
    color: #71717a;
    margin-top: 1px;
}
.dark .emc-auto-desc { color: #a1a1aa; }

.emc-auto-actions {
    display: flex;
    align-items: center;
    gap: 10px;
    flex-shrink: 0;
}

.emc-preview-btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 6px 11px;
    border-radius: 8px;
    font-size: 11.5px;
    font-weight: 600;
    background: #ffffff;
    color: #3f3f46;
    border: 1px solid #d4d4d8;
    cursor: pointer;
    transition: all .15s ease;
}
.emc-preview-btn:hover {
    background: #f4f4f5;
    color: #18181b;
    border-color: #18181b;
}
.dark .emc-preview-btn {
    background: #27272a;
    color: #e4e4e7;
    border-color: #3f3f46;
}
.dark .emc-preview-btn:hover {
    background: #3f3f46;
    color: #ffffff;
}

/* ── Toggle Switch ── */
.emc-switch {
    position: relative;
    display: inline-block;
    width: 44px;
    height: 24px;
}
.emc-switch input {
    opacity: 0;
    width: 0;
    height: 0;
}
.emc-slider {
    position: absolute;
    cursor: pointer;
    top: 0; left: 0; right: 0; bottom: 0;
    background-color: #d4d4d8;
    transition: .2s;
    border-radius: 24px;
}
.emc-slider:before {
    position: absolute;
    content: "";
    height: 18px;
    width: 18px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    transition: .2s;
    border-radius: 50%;
    box-shadow: 0 1px 3px rgba(0,0,0,.2);
}
input:checked + .emc-slider {
    background-color: #18181b;
}
.dark input:checked + .emc-slider {
    background-color: #ffffff;
}
.dark input:checked + .emc-slider:before {
    background-color: #18181b;
}
input:checked + .emc-slider:before {
    transform: translateX(20px);
}

/* ── Card Footer ── */
.emc-card-foot {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    padding-top: 1.15rem;
    margin-top: 1.25rem;
    border-top: 1px solid #f4f4f5;
    flex-wrap: wrap;
}
.dark .emc-card-foot { border-top-color: #27272a; }

/* ── Right Column: Sandbox Terminal ── */
.emc-terminal {
    background: #09090b;
    border: 1px solid #27272a;
    border-radius: 12px;
    padding: 12px 14px;
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
    font-size: 11.5px;
    line-height: 1.6;
    color: #4ade80;
    min-height: 120px;
    max-height: 180px;
    overflow-y: auto;
    margin-top: 12px;
}
.emc-terminal-error { color: #f87171 !important; }

/* ── Telemetry Rows ── */
.emc-telem-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 7px 0;
    font-size: 12.5px;
}
.emc-telem-row:not(:last-child) {
    border-bottom: 1px dashed #f4f4f5;
}
.dark .emc-telem-row:not(:last-child) {
    border-bottom-color: #27272a;
}
.emc-telem-lbl { color: #71717a; font-weight: 500; }
.dark .emc-telem-lbl { color: #a1a1aa; }
.emc-telem-val { font-weight: 600; color: #18181b; }
.dark .emc-telem-val { color: #f4f4f5; }

/* ── Modal Overlay ── */
.emc-modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.6);
    backdrop-filter: blur(4px);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1rem;
}
.emc-modal-card {
    background: #ffffff;
    border-radius: 18px;
    border: 1px solid #e4e4e7;
    width: 100%;
    max-width: 620px;
    max-height: 90vh;
    overflow-y: auto;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    padding: 1.5rem;
}
.dark .emc-modal-card {
    background: #18181b;
    border-color: #27272a;
    color: #f4f4f5;
}
</style>

<div class="emc-wrap">

    <!-- ─────────────────────────────────────────────────────────── -->
    <!-- 1. HERO HEADER                                              -->
    <!-- ─────────────────────────────────────────────────────────── -->
    <div class="emc-hero">
        <div class="flex items-center gap-4">
            <div class="emc-icon-box">
                <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
            </div>
            <div>
                <div class="flex items-center gap-2.5 flex-wrap">
                    <h1 class="text-xl sm:text-2xl font-black tracking-tight text-gray-950 dark:text-white">
                        Email & SMTP Configuration
                    </h1>
                    @if($this->is_configured)
                        <span class="emc-badge-configured">
                            <span class="emc-dot-live"></span>
                            Configured & Active
                        </span>
                    @else
                        <span class="emc-badge-warning">
                            <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                            Setup Required
                        </span>
                    @endif
                </div>
                <p class="text-xs sm:text-sm text-gray-500 dark:text-zinc-400 mt-0.5">
                    Manage your outgoing mail server credentials, staff lead alert distribution list, and automated client responses.
                </p>
            </div>
        </div>

        <button type="button" wire:click="save" wire:loading.attr="disabled" class="emc-btn-primary">
            <svg wire:loading.remove wire:target="save" viewBox="0 0 24 24" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                <polyline points="17 21 17 13 7 13 7 21"></polyline>
                <polyline points="7 3 7 8 15 8"></polyline>
            </svg>
            <svg wire:loading wire:target="save" class="animate-spin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10" stroke-opacity="0.25"></circle>
                <path d="M12 2a10 10 0 0 1 10 10" stroke-linecap="round"></path>
            </svg>
            <span wire:loading.remove wire:target="save">Save Configuration</span>
            <span wire:loading wire:target="save">Saving...</span>
        </button>
    </div>

    <!-- ─────────────────────────────────────────────────────────── -->
    <!-- 2. TWO-COLUMN LAYOUT                                        -->
    <!-- ─────────────────────────────────────────────────────────── -->
    <div class="emc-layout">

        <!-- ── Left Column: Configuration Forms ── -->
        <div>

            <!-- 2.1 1-Click Provider Quick-Fill -->
            <div class="emc-card">
                <div class="emc-card-head">
                    <div class="emc-card-head-left">
                        <div class="emc-card-head-icon text-amber-500">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                            </svg>
                        </div>
                        <div>
                            <h2 class="emc-card-title">1-Click Provider Quick-Fill</h2>
                            <p class="emc-card-desc">Select your email provider to automatically configure host, port, and security protocol:</p>
                        </div>
                    </div>
                    <span class="emc-badge-pill teal">Instant Sync</span>
                </div>

                <div class="emc-providers-grid">
                    <!-- Provider 1: Gmail / Workspace -->
                    <button type="button" 
                            wire:click="selectProvider('gmail')" 
                            class="emc-provider-btn {{ $selectedProvider === 'gmail' ? 'emc-provider-selected' : '' }}">
                        <div class="emc-provider-top">
                            <div class="emc-provider-icon bg-red-50 text-red-600 dark:bg-red-950/40">G</div>
                            <span class="emc-radio-indicator"></span>
                        </div>
                        <div>
                            <div class="emc-provider-name">Gmail / Workspace</div>
                            <div class="emc-provider-sub">Google Cloud Mail</div>
                        </div>
                        <div class="emc-provider-tag">587 • TLS</div>
                    </button>

                    <!-- Provider 2: Hostinger / Titan -->
                    <button type="button" 
                            wire:click="selectProvider('hostinger')" 
                            class="emc-provider-btn {{ $selectedProvider === 'hostinger' ? 'emc-provider-selected' : '' }}">
                        <div class="emc-provider-top">
                            <div class="emc-provider-icon bg-purple-50 text-purple-600 dark:bg-purple-950/40">H</div>
                            <span class="emc-radio-indicator"></span>
                        </div>
                        <div>
                            <div class="emc-provider-name">Hostinger / Titan</div>
                            <div class="emc-provider-sub">Business Mail Server</div>
                        </div>
                        <div class="emc-provider-tag">465 • SSL</div>
                    </button>

                    <!-- Provider 3: cPanel Webmail -->
                    <button type="button" 
                            wire:click="selectProvider('cpanel')" 
                            class="emc-provider-btn {{ $selectedProvider === 'cpanel' ? 'emc-provider-selected' : '' }}">
                        <div class="emc-provider-top">
                            <div class="emc-provider-icon bg-amber-50 text-amber-600 dark:bg-amber-950/40">🌐</div>
                            <span class="emc-radio-indicator"></span>
                        </div>
                        <div>
                            <div class="emc-provider-name">cPanel Webmail</div>
                            <div class="emc-provider-sub">Domain Mail Relay</div>
                        </div>
                        <div class="emc-provider-tag">465 • SSL</div>
                    </button>

                    <!-- Provider 4: Microsoft 365 -->
                    <button type="button" 
                            wire:click="selectProvider('microsoft365')" 
                            class="emc-provider-btn {{ $selectedProvider === 'microsoft365' ? 'emc-provider-selected' : '' }}">
                        <div class="emc-provider-top">
                            <div class="emc-provider-icon bg-blue-50 text-blue-600 dark:bg-blue-950/40">M</div>
                            <span class="emc-radio-indicator"></span>
                        </div>
                        <div>
                            <div class="emc-provider-name">Microsoft 365</div>
                            <div class="emc-provider-sub">Exchange Cloud Mail</div>
                        </div>
                        <div class="emc-provider-tag">587 • TLS</div>
                    </button>
                </div>
            </div>

            <!-- 2.2 SMTP Server Credentials -->
            <div class="emc-card">
                <div class="emc-card-head">
                    <div class="emc-card-head-left">
                        <div class="emc-card-head-icon">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect>
                                <rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect>
                                <line x1="6" y1="6" x2="6.01" y2="6"></line>
                                <line x1="6" y1="18" x2="6.01" y2="18"></line>
                            </svg>
                        </div>
                        <div>
                            <h2 class="emc-card-title">SMTP Server Credentials</h2>
                            <p class="emc-card-desc">Outgoing Mail Transfer Agent (MTA) server coordinates, port routing, and authentication credentials.</p>
                        </div>
                    </div>
                    <span class="emc-badge-pill">SMTP Driver</span>
                </div>

                <div class="emc-grid-2">
                    <div class="emc-field">
                        <label class="emc-label">
                            <span>SMTP Server Host <span class="req">*</span></span>
                        </label>
                        <div class="emc-input-wrap has-icon">
                            <svg class="emc-input-icon" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect>
                                <rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect>
                                <line x1="6" y1="6" x2="6.01" y2="6"></line>
                                <line x1="6" y1="18" x2="6.01" y2="18"></line>
                            </svg>
                            <input type="text" wire:model="mail_host" class="emc-input" placeholder="e.g. smtp.gmail.com">
                        </div>
                        <span class="emc-hint">Direct outgoing server hostname provided by your email host.</span>
                    </div>

                    <div class="emc-field">
                        <label class="emc-label">
                            <span>SMTP Port <span class="req">*</span></span>
                        </label>
                        <div class="emc-input-wrap has-icon">
                            <span class="emc-input-icon font-bold text-xs" style="padding-top:1px;">#</span>
                            <input type="text" wire:model="mail_port" class="emc-input" placeholder="587">
                        </div>
                        <span class="emc-hint">Standard ports: <strong>587</strong> (TLS) or <strong>465</strong> (SSL).</span>
                    </div>
                </div>

                <div class="emc-grid-2">
                    <div class="emc-field" x-data="{
                        open: false,
                        selected: @entangle('mail_encryption'),
                        options: [
                            { value: 'tls', label: 'TLS (STARTTLS - Port 587)', port: '587' },
                            { value: 'ssl', label: 'SSL (Port 465)', port: '465' },
                            { value: 'none', label: 'None (Port 25)', port: '25' }
                        ],
                        getLabel() {
                            let found = this.options.find(o => o.value === this.selected);
                            return found ? found.label : (this.selected ? this.selected.toUpperCase() : 'Select Protocol');
                        },
                        select(val) {
                            this.selected = val;
                            this.open = false;
                        }
                    }">
                        <label class="emc-label">Security Protocol (Encryption)</label>
                        
                        <div class="emc-custom-select-wrapper" @click.outside="open = false" @keydown.escape.window="open = false">
                            <button type="button" 
                                    @click="open = !open" 
                                    class="emc-custom-select-btn" 
                                    :class="{ 'emc-custom-select-open': open }">
                                <div class="flex items-center gap-2.5">
                                    <svg class="emc-select-lock-icon" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <span class="emc-custom-select-val" x-text="getLabel()"></span>
                                </div>
                                <svg class="emc-custom-select-chevron" :class="{ 'emc-chevron-rotated': open }" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="6 9 12 15 18 9"></polyline>
                                </svg>
                            </button>

                            <!-- Dropdown Drawer Panel -->
                            <div x-show="open" 
                                 x-transition:enter="transition ease-out duration-150"
                                 x-transition:enter-start="opacity-0 translate-y-1 scale-98"
                                 x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                                 x-transition:leave="transition ease-in duration-100"
                                 x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                                 x-transition:leave-end="opacity-0 translate-y-1 scale-98"
                                 class="emc-custom-select-dropdown" 
                                 style="display: none;">
                                <div class="emc-dropdown-header">Select Encryption Protocol</div>
                                
                                <template x-for="opt in options" :key="opt.value">
                                    <button type="button" 
                                            @click="select(opt.value)"
                                            class="emc-dropdown-item" 
                                            :class="{ 'emc-dropdown-item-active': selected === opt.value }">
                                        <div class="flex items-center gap-2">
                                            <span class="w-1.5 h-1.5 rounded-full" 
                                                  :class="selected === opt.value ? 'bg-white dark:bg-black' : 'bg-gray-400 dark:bg-zinc-600'"></span>
                                            <span x-text="opt.label"></span>
                                        </div>
                                        <template x-if="selected === opt.value">
                                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                                <polyline points="20 6 9 17 4 12"></polyline>
                                            </svg>
                                        </template>
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="emc-field">
                        <label class="emc-label">
                            <span>SMTP Username / Login Email <span class="req">*</span></span>
                        </label>
                        <div class="emc-input-wrap has-icon">
                            <svg class="emc-input-icon" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <input type="text" wire:model="mail_username" class="emc-input" placeholder="info@voltiva.com">
                        </div>
                    </div>
                </div>

                <div class="emc-field">
                    <label class="emc-label">
                        <span>SMTP Password / App Password</span>
                    </label>
                    <div class="emc-input-wrap has-icon">
                        <svg class="emc-input-icon" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 2l-2 2m-2-2l2 2m-2 2l2-2m-7 7l7-7m-7 7l-2-2m2 2l2 2m-7-2a5 5 0 1 1-7-7 5 5 0 0 1 7 7z"></path>
                        </svg>
                        <input type="{{ $showPassword ? 'text' : 'password' }}" 
                               wire:model="mail_password" 
                               class="emc-input" 
                               placeholder="Enter SMTP password or App Password">
                        <button type="button" wire:click="togglePasswordVisibility" class="emc-pw-toggle" title="Toggle visibility">
                            @if($showPassword)
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line></svg>
                            @else
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            @endif
                        </button>
                    </div>
                    <div class="flex items-center justify-between flex-wrap gap-2 mt-1">
                        <span class="emc-hint">For Gmail / Google Workspace accounts, generate a 16-letter App Password in Google Account Security.</span>
                        <button type="button" wire:click="$set('showGuideModal', true)" class="emc-hint font-bold text-teal-600 dark:text-teal-400 hover:underline">
                            3-Step Setup Guide →
                        </button>
                    </div>
                </div>
            </div>

            <!-- 2.3 Sender Identity & Notification Distribution -->
            <div class="emc-card">
                <div class="emc-card-head">
                    <div class="emc-card-head-left">
                        <div class="emc-card-head-icon text-teal-600 dark:text-teal-400">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="22" y1="2" x2="11" y2="13"></line>
                                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                            </svg>
                        </div>
                        <div>
                            <h2 class="emc-card-title">Sender Identity & Notification Distribution</h2>
                            <p class="emc-card-desc">Sender profile shown in recipient inboxes and internal staff list for incoming inquiry alerts.</p>
                        </div>
                    </div>
                    <span class="emc-badge-pill teal">Identity</span>
                </div>

                <div class="emc-grid-2">
                    <div class="emc-field">
                        <label class="emc-label">
                            <span>Sender Email ("From:") <span class="req">*</span></span>
                        </label>
                        <div class="emc-input-wrap has-icon">
                            <span class="emc-input-icon font-bold text-xs" style="padding-top:1px;">@</span>
                            <input type="email" wire:model="mail_from_address" class="emc-input" placeholder="sales@voltiva.com">
                        </div>
                        <span class="emc-hint">Displayed as the sender address in client inbox headers.</span>
                    </div>

                    <div class="emc-field">
                        <label class="emc-label">
                            <span>Sender Display Name <span class="req">*</span></span>
                        </label>
                        <div class="emc-input-wrap has-icon">
                            <svg class="emc-input-icon" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path>
                                <line x1="7" y1="7" x2="7.01" y2="7"></line>
                            </svg>
                            <input type="text" wire:model="mail_from_name" class="emc-input" placeholder="Voltiva">
                        </div>
                        <span class="emc-hint">Company or brand title shown beside the sender email.</span>
                    </div>
                </div>

                <div class="emc-field">
                    <label class="emc-label">
                        <span>Admin Alert Recipients (Distribution List)</span>
                        <span class="text-xs text-gray-400 font-normal">Separate multiple emails with commas</span>
                    </label>
                    <div class="emc-input-wrap has-icon">
                        <svg class="emc-input-icon" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <input type="text" wire:model="mail_admin_recipients" class="emc-input" placeholder="admin@voltiva.com, sales@voltiva.com">
                    </div>
                    <span class="emc-hint">🔔 Whenever a visitor submits an inquiry on the website, instant notifications are delivered to each recipient.</span>
                </div>
            </div>

            <!-- 2.4 Automation Rules & Email Templates -->
            <div class="emc-card">
                <div class="emc-card-head">
                    <div class="emc-card-head-left">
                        <div class="emc-card-head-icon">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="emc-card-title">Automation Rules & Email Templates</h2>
                            <p class="emc-card-desc">Control automated notification triggers and preview responsive email templates.</p>
                        </div>
                    </div>
                    <span class="emc-badge-pill">Automations</span>
                </div>

                <!-- Rule 1: Instant Admin Lead Alert -->
                <div class="emc-auto-row">
                    <div class="emc-auto-left">
                        <div class="emc-auto-icon bg-blue-50 text-blue-600 dark:bg-blue-950/40">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                        </div>
                        <div>
                            <div class="emc-auto-title">Instant Admin Lead Alert Notifications</div>
                            <div class="emc-auto-desc">Immediately emails designated staff with complete lead data, phone call links & 1-click WhatsApp buttons.</div>
                        </div>
                    </div>

                    <div class="emc-auto-actions">
                        <button type="button" wire:click="$set('showAdminTemplatePreview', true)" class="emc-preview-btn">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            <span>Preview</span>
                        </button>
                        <label class="emc-switch">
                            <input type="checkbox" wire:model="mail_notify_admin_on_lead">
                            <span class="emc-slider"></span>
                        </label>
                    </div>
                </div>

                <!-- Rule 2: Customer Inquiry Auto-Reply -->
                <div class="emc-auto-row">
                    <div class="emc-auto-left">
                        <div class="emc-auto-icon bg-green-50 text-green-600 dark:bg-green-950/40">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg>
                        </div>
                        <div>
                            <div class="emc-auto-title">Customer Inquiry Auto-Reply Acknowledgment</div>
                            <div class="emc-auto-desc">Sends a branded email confirmation thanking prospective clients and reassuring them of quick turnaround.</div>
                        </div>
                    </div>

                    <div class="emc-auto-actions">
                        <button type="button" wire:click="$set('showCustomerTemplatePreview', true)" class="emc-preview-btn">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            <span>Preview</span>
                        </button>
                        <label class="emc-switch">
                            <input type="checkbox" wire:model="mail_autoreply_customer">
                            <span class="emc-slider"></span>
                        </label>
                    </div>
                </div>

                <!-- Rule 3: SSL Certificate Peer Verification -->
                <div class="emc-auto-row">
                    <div class="emc-auto-left">
                        <div class="emc-auto-icon bg-purple-50 text-purple-600 dark:bg-purple-950/40">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                        </div>
                        <div>
                            <div class="emc-auto-title">SSL Certificate Peer Verification</div>
                            <div class="emc-auto-desc">Validates the server certificate authority. Leave enabled for production; can be turned off on local development or self-signed servers.</div>
                        </div>
                    </div>

                    <div class="emc-auto-actions">
                        <label class="emc-switch">
                            <input type="checkbox" wire:model="mail_verify_peer">
                            <span class="emc-slider"></span>
                        </label>
                    </div>
                </div>

                <div class="emc-card-foot">
                    <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-zinc-400">
                        <span class="w-2 h-2 rounded-full bg-teal-500"></span>
                        <span>Settings take effect immediately upon saving.</span>
                    </div>
                    <button type="button" wire:click="save" class="emc-btn-primary">
                        <span>Save Email Configuration</span>
                    </button>
                </div>
            </div>

        </div>

        <!-- ── Right Column: Sandbox, Telemetry & Guidelines ── -->
        <div>

            <!-- 1. Live SMTP Test Sandbox -->
            <div class="emc-card">
                <div class="emc-card-head">
                    <div class="emc-card-head-left">
                        <div class="emc-card-head-icon text-amber-500">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="22" y1="2" x2="11" y2="13"></line>
                                <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                            </svg>
                        </div>
                        <div>
                            <h2 class="emc-card-title">Live SMTP Test Sandbox</h2>
                        </div>
                    </div>
                    <span class="emc-badge-pill teal">● LIVE</span>
                </div>

                <div class="emc-field">
                    <label class="emc-label">Target Test Recipient:</label>
                    <div class="emc-input-wrap has-icon">
                        <svg class="emc-input-icon" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="22" y1="2" x2="11" y2="13"></line>
                            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                        </svg>
                        <input type="email" wire:model="test_recipient" class="emc-input" placeholder="admin@voltiva.com">
                    </div>
                </div>

                <button type="button" 
                        wire:click="sendTestEmail" 
                        wire:loading.attr="disabled"
                        class="w-full mt-2 justify-center emc-btn-primary">
                    <svg wire:loading.remove wire:target="sendTestEmail" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                    <svg wire:loading wire:target="sendTestEmail" class="animate-spin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10" stroke-opacity="0.25"></circle>
                        <path d="M12 2a10 10 0 0 1 10 10" stroke-linecap="round"></path>
                    </svg>
                    <span wire:loading.remove wire:target="sendTestEmail">Send Test Email</span>
                    <span wire:loading wire:target="sendTestEmail">Testing Connection...</span>
                </button>

                <!-- Diagnostic Terminal Console -->
                <div class="emc-terminal">
                    @foreach($testLogs as $log)
                        <div class="{{ str_contains($log, '[FAILED]') ? 'emc-terminal-error' : '' }}">
                            {{ $log }}
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- 2. Mail Telemetry & Readiness -->
            <div class="emc-card">
                <div class="emc-card-head">
                    <div class="emc-card-head-left">
                        <div class="emc-card-head-icon text-teal-600 dark:text-teal-400">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="emc-card-title">Mail Telemetry & Readiness</h2>
                        </div>
                    </div>
                </div>

                <div class="emc-telem-row">
                    <span class="emc-telem-lbl">Protocol Driver:</span>
                    <span class="emc-telem-val uppercase">SMTP</span>
                </div>
                <div class="emc-telem-row">
                    <span class="emc-telem-lbl">Server Host:</span>
                    @if($mail_host)
                        <span class="emc-telem-val font-mono text-xs">{{ $mail_host }}</span>
                    @else
                        <span class="text-xs text-amber-500 font-semibold">Unconfigured</span>
                    @endif
                </div>
                <div class="emc-telem-row">
                    <span class="emc-telem-lbl">Sender Address:</span>
                    @if($mail_from_address)
                        <span class="emc-telem-val font-mono text-xs">{{ $mail_from_address }}</span>
                    @else
                        <span class="text-xs text-amber-500 font-semibold">Unconfigured</span>
                    @endif
                </div>
                <div class="emc-telem-row">
                    <span class="emc-telem-lbl">Inquiry Safe Mode:</span>
                    <span class="text-xs font-bold text-emerald-600 dark:text-emerald-400 flex items-center gap-1">
                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        Always Saved in DB
                    </span>
                </div>
            </div>

            <!-- 3. Essential Guidelines -->
            <div class="emc-card">
                <div class="emc-card-head">
                    <div class="emc-card-head-left">
                        <div class="emc-card-head-icon text-blue-500">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            </svg>
                        </div>
                        <div>
                            <h2 class="emc-card-title">Essential Guidelines</h2>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col gap-3 text-xs text-gray-600 dark:text-zinc-300">
                    <div class="flex items-start gap-2">
                        <span class="text-emerald-500 font-bold">✔</span>
                        <span><strong>Google / Workspace:</strong> Requires a 2-Step Verification App Password (16 characters) instead of account password.</span>
                    </div>

                    <div class="flex items-start gap-2">
                        <span class="text-emerald-500 font-bold">✔</span>
                        <span><strong>cPanel Webmail:</strong> Use <code>mail.yourdomain.com</code> on SSL port <strong>465</strong>.</span>
                    </div>

                    <div class="flex items-start gap-2">
                        <span class="text-emerald-500 font-bold">✔</span>
                        <span><strong>Zero Visitor Loss:</strong> If SMTP credentials expire or fail, incoming inquiries are safely preserved in your <strong>Leads Dashboard</strong> without breaking visitor forms.</span>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- ─────────────────────────────────────────────────────────── -->
    <!-- 3. MODALS (PREVIEWS & GUIDE)                                -->
    <!-- ─────────────────────────────────────────────────────────── -->

    <!-- Admin Lead Alert Preview Modal -->
    @if($showAdminTemplatePreview)
        <div class="emc-modal-overlay" wire:click.self="$set('showAdminTemplatePreview', false)">
            <div class="emc-modal-card">
                <div class="flex items-center justify-between pb-3 mb-4 border-b border-gray-100 dark:border-zinc-800">
                    <h3 class="font-bold text-sm text-gray-900 dark:text-white flex items-center gap-2">
                        <span>🔔</span>
                        <span>Admin Lead Notification Preview</span>
                    </h3>
                    <button type="button" wire:click="$set('showAdminTemplatePreview', false)" class="text-gray-400 hover:text-gray-600 dark:hover:text-white">✕</button>
                </div>

                <div class="p-4 bg-gray-50 dark:bg-zinc-900 rounded-xl border border-gray-200 dark:border-zinc-800 font-sans text-xs">
                    <div class="border-b border-gray-200 dark:border-zinc-700 pb-3 mb-3">
                        <div class="text-[11px] text-gray-400 uppercase tracking-wider font-bold mb-1">New Website Lead Notification</div>
                        <div class="text-base font-black text-gray-900 dark:text-white">{{ $mail_from_name ?: 'Voltiva' }} Leads Center</div>
                    </div>

                    <div class="space-y-2 mb-4">
                        <div><strong>Prospect Name:</strong> Rajesh Kumar Patel</div>
                        <div><strong>Phone:</strong> +91 98250 12345</div>
                        <div><strong>Email:</strong> rajesh.patel@example.com</div>
                        <div><strong>Inquiry Subject:</strong> High Voltage Modular Switches Bulk Supply</div>
                        <div><strong>Message:</strong> Hello, we require pricing and technical specifications for your 240V modular switchboards for a residential project.</div>
                    </div>

                    <div class="flex gap-2 pt-2 border-t border-gray-200 dark:border-zinc-700">
                        <a href="tel:+919825012345" class="px-3 py-1.5 bg-black text-white dark:bg-white dark:text-black rounded-lg font-bold text-[11px] inline-flex items-center gap-1.5">
                            <span>📞 Call Prospect</span>
                        </a>
                        <a href="https://wa.me/919825012345" target="_blank" class="px-3 py-1.5 bg-emerald-600 text-white rounded-lg font-bold text-[11px] inline-flex items-center gap-1.5">
                            <span>💬 WhatsApp Chat</span>
                        </a>
                    </div>
                </div>

                <div class="mt-4 text-right">
                    <button type="button" wire:click="$set('showAdminTemplatePreview', false)" class="px-4 py-1.5 bg-gray-100 dark:bg-zinc-800 text-gray-800 dark:text-white rounded-lg font-bold text-xs">Close</button>
                </div>
            </div>
        </div>
    @endif

    <!-- Customer Auto-Reply Preview Modal -->
    @if($showCustomerTemplatePreview)
        <div class="emc-modal-overlay" wire:click.self="$set('showCustomerTemplatePreview', false)">
            <div class="emc-modal-card">
                <div class="flex items-center justify-between pb-3 mb-4 border-b border-gray-100 dark:border-zinc-800">
                    <h3 class="font-bold text-sm text-gray-900 dark:text-white flex items-center gap-2">
                        <span>✉️</span>
                        <span>Customer Auto-Reply Acknowledgment Preview</span>
                    </h3>
                    <button type="button" wire:click="$set('showCustomerTemplatePreview', false)" class="text-gray-400 hover:text-gray-600 dark:hover:text-white">✕</button>
                </div>

                <div class="p-5 bg-white dark:bg-zinc-900 rounded-xl border border-gray-200 dark:border-zinc-800 font-sans text-xs">
                    <div class="text-center pb-4 border-b border-gray-100 dark:border-zinc-800 mb-4">
                        <div class="text-lg font-extrabold text-gray-950 dark:text-white">{{ $mail_from_name ?: 'Voltiva' }}</div>
                        <div class="text-[11px] text-gray-400 font-medium">Thank You For Reaching Out</div>
                    </div>

                    <p class="text-gray-700 dark:text-zinc-300 leading-relaxed mb-3">
                        Dear Rajesh Kumar,<br><br>
                        Thank you for contacting <strong>{{ $mail_from_name ?: 'Voltiva' }}</strong>! We have successfully received your inquiry regarding <em>"High Voltage Modular Switches Bulk Supply"</em>.
                    </p>

                    <p class="text-gray-700 dark:text-zinc-300 leading-relaxed mb-4">
                        Our engineering and technical sales team is reviewing your requirements and will connect with you within <strong>24 business hours</strong>.
                    </p>

                    <div class="bg-gray-50 dark:bg-zinc-800 p-3 rounded-lg text-[11px] text-gray-500 dark:text-zinc-400">
                        Need immediate assistance? Call our dedicated help desk at <strong>+91 76007 57008</strong> or email <strong>info@voltiva.com</strong>.
                    </div>
                </div>

                <div class="mt-4 text-right">
                    <button type="button" wire:click="$set('showCustomerTemplatePreview', false)" class="px-4 py-1.5 bg-gray-100 dark:bg-zinc-800 text-gray-800 dark:text-white rounded-lg font-bold text-xs">Close</button>
                </div>
            </div>
        </div>
    @endif

    <!-- 3-Step Google Setup Guide Modal -->
    @if($showGuideModal)
        <div class="emc-modal-overlay" wire:click.self="$set('showGuideModal', false)">
            <div class="emc-modal-card">
                <div class="flex items-center justify-between pb-3 mb-4 border-b border-gray-100 dark:border-zinc-800">
                    <h3 class="font-bold text-sm text-gray-900 dark:text-white flex items-center gap-2">
                        <span>🔑</span>
                        <span>Google Workspace / Gmail App Password Guide</span>
                    </h3>
                    <button type="button" wire:click="$set('showGuideModal', false)" class="text-gray-400 hover:text-gray-600 dark:hover:text-white">✕</button>
                </div>

                <div class="space-y-4 text-xs text-gray-600 dark:text-zinc-300">
                    <div class="flex gap-3">
                        <span class="w-6 h-6 rounded-full bg-black text-white dark:bg-white dark:text-black flex items-center justify-center font-bold text-xs shrink-0">1</span>
                        <div>
                            <strong>Enable 2-Step Verification:</strong> Go to <a href="https://myaccount.google.com/security" target="_blank" class="text-teal-600 underline font-semibold">Google Account Security</a> and make sure 2-Step Verification is turned ON.
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <span class="w-6 h-6 rounded-full bg-black text-white dark:bg-white dark:text-black flex items-center justify-center font-bold text-xs shrink-0">2</span>
                        <div>
                            <strong>Search "App passwords":</strong> In the search bar at the top of your Google Account, search for <em>"App passwords"</em>.
                        </div>
                    </div>

                    <div class="flex gap-3">
                        <span class="w-6 h-6 rounded-full bg-black text-white dark:bg-white dark:text-black flex items-center justify-center font-bold text-xs shrink-0">3</span>
                        <div>
                            <strong>Create & Paste 16-Letter Key:</strong> Name the app (e.g. <em>"Voltiva Website"</em>) and click Generate. Copy the 16-letter password (e.g. <code>abcd efgh ijkl mnop</code>) and paste it into the <strong>SMTP Password</strong> field.
                        </div>
                    </div>
                </div>

                <div class="mt-5 text-right">
                    <button type="button" wire:click="$set('showGuideModal', false)" class="px-4 py-1.5 bg-black text-white dark:bg-white dark:text-black rounded-lg font-bold text-xs">Got it</button>
                </div>
            </div>
        </div>
    @endif

</div>

</x-filament-panels::page>
