<x-filament-panels::page>

<style>
/* ── Design System Tokens (Voltiva Dash Theme) ── */
.sts-wrap * { box-sizing: border-box; }
.sts-wrap {
    font-family: 'Figtree', system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    color: #18181b;
}
.dark .sts-wrap { color: #f4f4f5; }

/* ── Hero Header ── */
.sts-hero {
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
.dark .sts-hero { background: #18181b; border-color: #27272a; }

.sts-icon-box {
    width: 48px; height: 48px;
    border-radius: 14px;
    background: linear-gradient(135deg, #18181b 0%, #3f3f46 100%);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    box-shadow: 0 4px 14px rgba(0,0,0,.15);
}
.dark .sts-icon-box {
    background: linear-gradient(135deg, #27272a 0%, #3f3f46 100%);
    border: 1px solid #52525b;
}
.sts-icon-box svg { width: 22px; height: 22px; stroke: #fff; fill: none; }

/* ── Save Changes Buttons (Voltiva Primary Theme) ── */
.sts-btn-primary {
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
.sts-btn-primary:hover {
    background: #000000;
    border-color: #000000;
    box-shadow: 0 4px 14px rgba(0,0,0,.25);
    transform: translateY(-1px);
}
.dark .sts-btn-primary {
    background: #ffffff;
    color: #000000;
    border-color: #ffffff;
}
.dark .sts-btn-primary:hover {
    background: #e4e4e7;
    border-color: #e4e4e7;
}
.sts-btn-primary svg { width: 16px; height: 16px; stroke: currentColor; fill: none; }

/* ── Live Sync Badge ── */
.sts-live-badge {
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
.dark .sts-live-badge {
    background: rgba(64, 186, 199, 0.18);
    color: #40bac7;
    border-color: rgba(64, 186, 199, 0.4);
}
.sts-live-dot {
    width: 6.5px; height: 6.5px;
    border-radius: 50%;
    background: #0d9488;
    box-shadow: 0 0 0 2px rgba(13, 148, 136, 0.2);
    animation: stsPulse 2s infinite;
}
.dark .sts-live-dot { background: #40bac7; box-shadow: 0 0 0 2px rgba(64, 186, 199, 0.3); }

@keyframes stsPulse {
    0% { transform: scale(0.95); opacity: 0.8; }
    50% { transform: scale(1.15); opacity: 1; }
    100% { transform: scale(0.95); opacity: 0.8; }
}

/* ── Main Two Column Layout ── */
.sts-layout {
    display: grid;
    grid-template-columns: 290px 1fr;
    gap: 1.5rem;
    align-items: start;
}
@media (max-width: 1024px) {
    .sts-layout { grid-template-columns: 1fr; }
}

/* ── Left Navigation Tabs Card ── */
.sts-nav-card {
    background: #ffffff;
    border: 1px solid #e4e4e7;
    border-radius: 18px;
    padding: 10px;
    box-shadow: 0 1px 3px rgba(0,0,0,.03);
    display: flex;
    flex-direction: column;
    gap: 6px;
}
.dark .sts-nav-card { background: #18181b; border-color: #27272a; }

.sts-nav-btn {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    padding: 12px 14px;
    border-radius: 12px;
    background: transparent;
    border: 1px solid transparent;
    cursor: pointer;
    transition: all .16s ease;
    text-align: left;
    text-decoration: none;
    font-family: inherit;
}
.sts-nav-btn:hover:not(.sts-nav-active) {
    background: #f4f4f5;
    color: #000000;
}
.dark .sts-nav-btn:hover:not(.sts-nav-active) {
    background: #27272a;
    color: #ffffff;
}

.sts-nav-left {
    display: flex;
    align-items: center;
    gap: 10px;
}
.sts-nav-icon-wrap {
    width: 32px; height: 32px;
    border-radius: 9px;
    display: flex; align-items: center; justify-content: center;
    background: #f4f4f5;
    color: #71717a;
    transition: all .16s ease;
    flex-shrink: 0;
}
.dark .sts-nav-icon-wrap { background: #27272a; color: #a1a1aa; }
.sts-nav-icon-wrap svg { width: 17px; height: 17px; stroke: currentColor; fill: none; }

.sts-nav-label {
    font-size: 13.5px;
    font-weight: 600;
    color: #3f3f46;
    transition: color .16s ease;
}
.dark .sts-nav-label { color: #d4d4d8; }

.sts-nav-pill-badge {
    padding: 3px 8px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 700;
    background: #f4f4f5;
    color: #71717a;
    border: 1px solid #e4e4e7;
    transition: all .16s ease;
}
.dark .sts-nav-pill-badge {
    background: #27272a;
    color: #a1a1aa;
    border-color: #3f3f46;
}

/* Active Nav Tab: High-contrast Voltiva Black in Light, Crisp White in Dark */
.sts-nav-active {
    background: #18181b !important;
    border-color: #18181b !important;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.18);
}
.sts-nav-active .sts-nav-icon-wrap {
    background: rgba(255, 255, 255, 0.18);
    color: #ffffff;
}
.sts-nav-active .sts-nav-label {
    color: #ffffff !important;
    font-weight: 700;
}
.sts-nav-active .sts-nav-pill-badge {
    background: rgba(255, 255, 255, 0.18);
    color: #ffffff;
    border-color: rgba(255, 255, 255, 0.25);
}

.dark .sts-nav-active {
    background: #ffffff !important;
    border-color: #ffffff !important;
    box-shadow: 0 4px 14px rgba(255, 255, 255, 0.15);
}
.dark .sts-nav-active .sts-nav-icon-wrap {
    background: rgba(0, 0, 0, 0.12);
    color: #000000;
}
.dark .sts-nav-active .sts-nav-label {
    color: #000000 !important;
    font-weight: 700;
}
.dark .sts-nav-active .sts-nav-pill-badge {
    background: rgba(0, 0, 0, 0.1);
    color: #000000;
    border-color: rgba(0, 0, 0, 0.2);
}

/* ── System Status Card ── */
.sts-status-card {
    background: #ffffff;
    border: 1px solid #e4e4e7;
    border-radius: 18px;
    padding: 1.25rem;
    margin-top: 1rem;
    box-shadow: 0 1px 3px rgba(0,0,0,.03);
}
.dark .sts-status-card { background: #18181b; border-color: #27272a; }

.sts-status-header {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 11.5px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: .08em;
    color: #71717a;
    margin-bottom: 0.85rem;
    padding-bottom: 0.6rem;
    border-bottom: 1px solid #f4f4f5;
}
.dark .sts-status-header { color: #a1a1aa; border-bottom-color: #27272a; }
.sts-status-header svg { width: 14px; height: 14px; stroke: #40bac7; }

.sts-status-row {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 6px 0;
    font-size: 12.5px;
}
.sts-status-row:not(:last-child) {
    border-bottom: 1px dashed #f4f4f5;
}
.dark .sts-status-row:not(:last-child) {
    border-bottom-color: #27272a;
}
.sts-status-lbl { color: #71717a; font-weight: 500; }
.dark .sts-status-lbl { color: #a1a1aa; }
.sts-status-val { font-weight: 600; color: #18181b; }
.dark .sts-status-val { color: #f4f4f5; }

.sts-badge-success {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 2px 7px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 700;
    background: #ecfdf5;
    color: #059669;
    border: 1px solid #a7f3d0;
}
.dark .sts-badge-success {
    background: rgba(5, 150, 105, 0.2);
    color: #34d399;
    border-color: rgba(5, 150, 105, 0.4);
}

.sts-badge-neutral {
    display: inline-flex;
    align-items: center;
    padding: 2px 7px;
    border-radius: 6px;
    font-size: 11px;
    font-weight: 600;
    background: #f4f4f5;
    color: #52525b;
    border: 1px solid #e4e4e7;
}
.dark .sts-badge-neutral {
    background: #27272a;
    color: #d4d4d8;
    border-color: #3f3f46;
}

/* ── Content Cards ── */
.sts-content-card {
    background: #ffffff;
    border: 1px solid #e4e4e7;
    border-radius: 18px;
    padding: 1.5rem;
    box-shadow: 0 1px 3px rgba(0,0,0,.03);
    margin-bottom: 1.5rem;
}
.dark .sts-content-card { background: #18181b; border-color: #27272a; }

.sts-card-head {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 1.35rem;
}
.sts-card-head-icon {
    width: 36px; height: 36px;
    border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    background: #f4f4f5;
    color: #18181b;
    flex-shrink: 0;
}
.dark .sts-card-head-icon { background: #27272a; color: #f4f4f5; }
.sts-card-head-icon svg { width: 19px; height: 19px; stroke: currentColor; fill: none; }

.sts-card-title {
    font-size: 15.5px;
    font-weight: 700;
    color: #18181b;
    letter-spacing: -0.01em;
}
.dark .sts-card-title { color: #ffffff; }

.sts-card-desc {
    font-size: 12.5px;
    color: #71717a;
    margin-top: 2px;
}
.dark .sts-card-desc { color: #a1a1aa; }

/* ── Form Inputs & Layout ── */
.sts-grid-2 {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.15rem;
    margin-bottom: 1.15rem;
}
@media (max-width: 768px) {
    .sts-grid-2 { grid-template-columns: 1fr; }
}

.sts-field {
    display: flex;
    flex-direction: column;
    gap: 6px;
    margin-bottom: 1.15rem;
}
.sts-field:last-child { margin-bottom: 0; }

.sts-label {
    font-size: 12.5px;
    font-weight: 700;
    color: #27272a;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.dark .sts-label { color: #e4e4e7; }
.sts-label .req { color: #ef4444; margin-left: 2px; }

.sts-label-badge {
    font-size: 11px;
    font-weight: 600;
    padding: 2px 7px;
    border-radius: 5px;
    background: #f4f4f5;
    color: #71717a;
    border: 1px solid #e4e4e7;
}
.dark .sts-label-badge {
    background: #27272a;
    color: #a1a1aa;
    border-color: #3f3f46;
}

.sts-label-badge.teal {
    background: rgba(64, 186, 199, 0.12);
    color: #0d9488;
    border-color: rgba(64, 186, 199, 0.3);
}
.dark .sts-label-badge.teal {
    background: rgba(64, 186, 199, 0.18);
    color: #40bac7;
    border-color: rgba(64, 186, 199, 0.4);
}

.sts-input-wrap {
    position: relative;
    display: flex;
    align-items: center;
}
.sts-input-icon {
    position: absolute;
    left: 12px;
    width: 17px; height: 17px;
    color: #a1a1aa;
    pointer-events: none;
    stroke: currentColor;
    fill: none;
}
.sts-input-wrap.has-icon .sts-input {
    padding-left: 38px;
}

.sts-input,
.sts-textarea {
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
.sts-input:focus,
.sts-textarea:focus {
    border-color: #18181b;
    box-shadow: 0 0 0 3px rgba(24, 24, 27, 0.08);
}
.dark .sts-input,
.dark .sts-textarea {
    background: #202024;
    border-color: #3f3f46;
    color: #f4f4f5;
}
.dark .sts-input:focus,
.dark .sts-textarea:focus {
    border-color: #ffffff;
    box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.08);
}

.sts-textarea {
    min-height: 80px;
    resize: vertical;
    line-height: 1.5;
}

.sts-code-textarea {
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace !important;
    background: #09090b !important;
    color: #22c55e !important;
    border-color: #27272a !important;
    font-size: 12.5px !important;
    line-height: 1.55;
    min-height: 140px;
}
.dark .sts-code-textarea {
    background: #0c0d0e !important;
    color: #4ade80 !important;
}

.sts-hint {
    font-size: 11.5px;
    color: #71717a;
    line-height: 1.4;
    margin-top: 2px;
}
.dark .sts-hint { color: #a1a1aa; }

/* ── Card Footer Bar ── */
.sts-card-foot {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 1rem;
    padding-top: 1.15rem;
    margin-top: 1.25rem;
    border-top: 1px solid #f4f4f5;
    flex-wrap: wrap;
}
.dark .sts-card-foot { border-top-color: #27272a; }

.sts-foot-note {
    display: flex;
    align-items: center;
    gap: 7px;
    font-size: 12px;
    font-weight: 500;
    color: #71717a;
}
.dark .sts-foot-note { color: #a1a1aa; }
.sts-foot-note svg { width: 15px; height: 15px; stroke: #0d9488; flex-shrink: 0; }
.dark .sts-foot-note svg { stroke: #40bac7; }

/* ── Visual Asset Upload Containers ── */
.sts-asset-card {
    border: 1px solid #e4e4e7;
    border-radius: 14px;
    padding: 1.15rem;
    background: #fafafa;
    display: flex;
    flex-direction: column;
    gap: 12px;
}
.dark .sts-asset-card {
    background: #1e1e22;
    border-color: #2e2e33;
}

.sts-asset-card-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.sts-asset-title {
    font-size: 13px;
    font-weight: 700;
    color: #18181b;
}
.dark .sts-asset-title { color: #f4f4f5; }

.sts-preview-box {
    border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    padding: 1rem;
    min-height: 110px;
    border: 1px dashed #d4d4d8;
    background: #ffffff;
}
.dark .sts-preview-box {
    border-color: #3f3f46;
    background: #18181b;
}
.sts-preview-box.dark-bg {
    background: #09090b !important;
    border-color: #27272a !important;
}

.sts-preview-img {
    max-height: 70px;
    max-width: 100%;
    object-fit: contain;
}

.sts-upload-btn-wrap {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    flex-wrap: wrap;
}

.sts-upload-label {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 8px 14px;
    border-radius: 9px;
    font-size: 12.5px;
    font-weight: 600;
    background: #ffffff;
    color: #18181b;
    border: 1px solid #d4d4d8;
    cursor: pointer;
    transition: all .16s ease;
    box-shadow: 0 1px 2px rgba(0,0,0,.04);
}
.sts-upload-label:hover {
    background: #f4f4f5;
    border-color: #18181b;
}
.dark .sts-upload-label {
    background: #27272a;
    color: #f4f4f5;
    border-color: #3f3f46;
}
.dark .sts-upload-label:hover {
    background: #3f3f46;
    border-color: #ffffff;
}
.sts-upload-label svg { width: 14px; height: 14px; stroke: currentColor; fill: none; }

.sts-remove-link {
    font-size: 12px;
    font-weight: 600;
    color: #ef4444;
    cursor: pointer;
    background: none;
    border: none;
    padding: 4px 6px;
    text-decoration: underline;
    transition: color .15s ease;
}
.sts-remove-link:hover { color: #dc2626; }

/* ── Browser Tab Mockup for Favicon ── */
.sts-browser-mockup {
    display: flex;
    align-items: center;
    background: #e2e8f0;
    border-radius: 9px 9px 0 0;
    padding: 5px 12px;
    border: 1px solid #cbd5e1;
    border-bottom: none;
    max-width: 260px;
    gap: 8px;
}
.dark .sts-browser-mockup {
    background: #27272a;
    border-color: #3f3f46;
}
.sts-tab-pill {
    display: flex;
    align-items: center;
    gap: 8px;
    background: #ffffff;
    padding: 5px 10px;
    border-radius: 7px 7px 0 0;
    font-size: 11.5px;
    font-weight: 600;
    color: #1e293b;
    box-shadow: 0 -1px 2px rgba(0,0,0,.03);
}
.dark .sts-tab-pill {
    background: #18181b;
    color: #f4f4f5;
}
.sts-tab-favicon {
    width: 15px; height: 15px;
    object-fit: contain;
    border-radius: 3px;
}
.sts-tab-close {
    font-size: 11px;
    color: #94a3b8;
    margin-left: 6px;
}

/* ── Interactive Map Box ── */
.sts-map-preview-box {
    border: 1px solid #e4e4e7;
    border-radius: 14px;
    overflow: hidden;
    background: #fafafa;
    margin-top: 1rem;
}
.dark .sts-map-preview-box {
    border-color: #27272a;
    background: #1f1f23;
}

.sts-map-preview-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 9px 14px;
    background: #f4f4f5;
    border-bottom: 1px solid #e4e4e7;
}
.dark .sts-map-preview-head {
    background: #27272a;
    border-bottom-color: #3f3f46;
}
.sts-map-preview-title {
    display: flex;
    align-items: center;
    gap: 7px;
    font-size: 11px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: .08em;
    color: #52525b;
}
.dark .sts-map-preview-title { color: #d4d4d8; }
.sts-map-preview-title svg { width: 14px; height: 14px; stroke: #40bac7; }

.sts-map-actions {
    display: flex;
    align-items: center;
    gap: 12px;
}
.sts-map-act-btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 11.5px;
    font-weight: 600;
    color: #52525b;
    background: none;
    border: none;
    cursor: pointer;
    text-decoration: none;
    transition: color .15s ease;
}
.sts-map-act-btn:hover { color: #000000; }
.dark .sts-map-act-btn { color: #a1a1aa; }
.dark .sts-map-act-btn:hover { color: #ffffff; }
.sts-map-act-btn svg { width: 12px; height: 12px; stroke: currentColor; fill: none; }

/* ── Logo Adjuster Styles ── */
.sts-adjuster-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.25rem;
    margin-top: 1rem;
}
@media (max-width: 900px) {
    .sts-adjuster-grid { grid-template-columns: 1fr; }
}

.sts-adjust-card {
    background: #fafafa;
    border: 1px solid #e4e4e7;
    border-radius: 14px;
    padding: 1.15rem;
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.dark .sts-adjust-card {
    background: #1e1e22;
    border-color: #2e2e33;
}

.sts-slider-row {
    display: flex;
    align-items: center;
    gap: 12px;
}

.sts-range-input {
    flex: 1;
    height: 6px;
    border-radius: 4px;
    background: #e4e4e7;
    outline: none;
    accent-color: #18181b;
    cursor: pointer;
}
.dark .sts-range-input {
    background: #3f3f46;
    accent-color: #ffffff;
}

.sts-range-val-badge {
    min-width: 62px;
    text-align: center;
    font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
    font-size: 12px;
    font-weight: 700;
    padding: 5px 9px;
    border-radius: 7px;
    background: #ffffff;
    color: #18181b;
    border: 1px solid #d4d4d8;
    box-shadow: 0 1px 2px rgba(0,0,0,.04);
}
.dark .sts-range-val-badge {
    background: #27272a;
    color: #f4f4f5;
    border-color: #3f3f46;
}

.sts-preview-stage {
    border-radius: 14px;
    border: 1px solid #e4e4e7;
    background: #ffffff;
    overflow: hidden;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 10px rgba(0,0,0,.04);
}
.dark .sts-preview-stage {
    border-color: #27272a;
    background: #18181b;
}

.sts-preview-stage-head {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 14px;
    background: #f4f4f5;
    border-bottom: 1px solid #e4e4e7;
    flex-wrap: wrap;
    gap: 8px;
}
.dark .sts-preview-stage-head {
    background: #202024;
    border-bottom-color: #2e2e33;
}

.sts-preview-tab-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 12px;
    border-radius: 8px;
    font-size: 12px;
    font-weight: 600;
    background: transparent;
    color: #71717a;
    border: none;
    cursor: pointer;
    transition: all .16s ease;
}
.sts-preview-tab-btn:hover {
    color: #18181b;
}
.dark .sts-preview-tab-btn:hover {
    color: #f4f4f5;
}
.sts-preview-tab-btn.active {
    background: #ffffff;
    color: #18181b;
    box-shadow: 0 1px 4px rgba(0,0,0,.08);
}
.dark .sts-preview-tab-btn.active {
    background: #2e2e33;
    color: #ffffff;
}
</style>

<div class="sts-wrap">

    <!-- ─────────────────────────────────────────────────────────── -->
    <!-- 1. HERO HEADER                                              -->
    <!-- ─────────────────────────────────────────────────────────── -->
    <div class="sts-hero">
        <div class="flex items-center gap-4">
            <div class="sts-icon-box">
                <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="4" y1="21" x2="4" y2="14"></line>
                    <line x1="4" y1="10" x2="4" y2="3"></line>
                    <line x1="12" y1="21" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12" y2="3"></line>
                    <line x1="20" y1="21" x2="20" y2="16"></line>
                    <line x1="20" y1="12" x2="20" y2="3"></line>
                    <line x1="1" y1="14" x2="7" y2="14"></line>
                    <line x1="9" y1="8" x2="15" y2="8"></line>
                    <line x1="17" y1="16" x2="23" y2="16"></line>
                </svg>
            </div>
            <div>
                <div class="flex items-center gap-2.5 flex-wrap">
                    <h1 class="text-xl sm:text-2xl font-black tracking-tight text-gray-950 dark:text-white">
                        Site Settings
                    </h1>
                    <span class="sts-live-badge">
                        <span class="sts-live-dot"></span>
                        Live Sync
                    </span>
                </div>
                <p class="text-xs sm:text-sm text-gray-500 dark:text-zinc-400 mt-0.5">
                    Manage brand identity, company contact info, social profiles, SEO meta tags, and global website options.
                </p>
            </div>
        </div>

        <button type="button" wire:click="save" wire:loading.attr="disabled" class="sts-btn-primary">
            <svg wire:loading.remove wire:target="save" viewBox="0 0 24 24" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                <polyline points="17 21 17 13 7 13 7 21"></polyline>
                <polyline points="7 3 7 8 15 8"></polyline>
            </svg>
            <svg wire:loading wire:target="save" class="animate-spin" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="12" cy="12" r="10" stroke-opacity="0.25"></circle>
                <path d="M12 2a10 10 0 0 1 10 10" stroke-linecap="round"></path>
            </svg>
            <span wire:loading.remove wire:target="save">Save Changes</span>
            <span wire:loading wire:target="save">Saving...</span>
        </button>
    </div>

    <!-- ─────────────────────────────────────────────────────────── -->
    <!-- 2. TWO-COLUMN LAYOUT                                        -->
    <!-- ─────────────────────────────────────────────────────────── -->
    <div class="sts-layout">

        <!-- ── Left Column: Nav Tabs & System Status ── -->
        <div>
            <div class="sts-nav-card">
                <!-- Tab 1: General & Branding -->
                <button type="button" 
                        wire:click="setTab('general')"
                        class="sts-nav-btn {{ $activeTab === 'general' ? 'sts-nav-active' : '' }}">
                    <div class="sts-nav-left">
                        <div class="sts-nav-icon-wrap">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                            </svg>
                        </div>
                        <span class="sts-nav-label">General & Branding</span>
                    </div>
                    <span class="sts-nav-pill-badge">Core</span>
                </button>

                <!-- Tab 2: Homepage Hero Video -->
                <button type="button" 
                        wire:click="setTab('hero_video')"
                        class="sts-nav-btn {{ $activeTab === 'hero_video' ? 'sts-nav-active' : '' }}">
                    <div class="sts-nav-left">
                        <div class="sts-nav-icon-wrap">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="23 7 16 12 23 17 23 7"></polygon>
                                <rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>
                            </svg>
                        </div>
                        <span class="sts-nav-label">Homepage Video</span>
                    </div>
                    <span class="sts-nav-pill-badge">Hero</span>
                </button>

                <!-- Tab 2: Contact & Location -->
                <button type="button" 
                        wire:click="setTab('contact')"
                        class="sts-nav-btn {{ $activeTab === 'contact' ? 'sts-nav-active' : '' }}">
                    <div class="sts-nav-left">
                        <div class="sts-nav-icon-wrap">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </div>
                        <span class="sts-nav-label">Contact & Location</span>
                    </div>
                    <span class="sts-nav-pill-badge">Info</span>
                </button>

                <!-- Tab 3: Social Networks -->
                <button type="button" 
                        wire:click="setTab('social')"
                        class="sts-nav-btn {{ $activeTab === 'social' ? 'sts-nav-active' : '' }}">
                    <div class="sts-nav-left">
                        <div class="sts-nav-icon-wrap">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="18" cy="5" r="3"></circle>
                                <circle cx="6" cy="12" r="3"></circle>
                                <circle cx="18" cy="19" r="3"></circle>
                                <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                            </svg>
                        </div>
                        <span class="sts-nav-label">Social Networks</span>
                    </div>
                    <span class="sts-nav-pill-badge">Links</span>
                </button>

                <!-- Tab 4: SEO & Analytics -->
                <button type="button" 
                        wire:click="setTab('seo')"
                        class="sts-nav-btn {{ $activeTab === 'seo' ? 'sts-nav-active' : '' }}">
                    <div class="sts-nav-left">
                        <div class="sts-nav-icon-wrap">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </div>
                        <span class="sts-nav-label">SEO & Analytics</span>
                    </div>
                    <span class="sts-nav-pill-badge">Meta</span>
                </button>
            </div>

            <!-- System Status Card -->
            <div class="sts-status-card">
                <div class="sts-status-header">
                    <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    </svg>
                    <span>System Status</span>
                </div>
                <div class="sts-status-row">
                    <span class="sts-status-lbl">Website Status</span>
                    <span class="sts-badge-success">● {{ $this->system_status['website'] }}</span>
                </div>
                <div class="sts-status-row">
                    <span class="sts-status-lbl">Settings Cache</span>
                    <span class="sts-badge-success">● {{ $this->system_status['cache'] }}</span>
                </div>
                <div class="sts-status-row">
                    <span class="sts-status-lbl">Database</span>
                    <span class="sts-status-val font-mono text-xs">{{ $this->system_status['database'] }}</span>
                </div>
                <div class="sts-status-row">
                    <span class="sts-status-lbl">Storage Disk</span>
                    <span class="sts-badge-neutral">{{ $this->system_status['storage'] }}</span>
                </div>
            </div>
        </div>

        <!-- ── Right Column: Tab Content ── -->
        <div>

            <!-- ======================================================= -->
            <!-- TAB 1: GENERAL & BRANDING                               -->
            <!-- ======================================================= -->
            @if($activeTab === 'general')
                <!-- 1.1 Brand & Company Identity -->
                <div class="sts-content-card">
                    <div class="sts-card-head">
                        <div class="sts-card-head-icon">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                        </div>
                        <div>
                            <h2 class="sts-card-title">Brand & Company Identity</h2>
                            <p class="sts-card-desc">Configure your public website name, marketing tagline, and footer notes.</p>
                        </div>
                    </div>

                    <div class="sts-grid-2">
                        <div class="sts-field">
                            <label class="sts-label">
                                <span>Website Title <span class="req">*</span></span>
                            </label>
                            <input type="text" wire:model="site_name" class="sts-input" placeholder="e.g. Voltiva">
                            <span class="sts-hint">Displayed in the browser header bar and search engine previews.</span>
                        </div>

                        <div class="sts-field">
                            <label class="sts-label">Brand Tagline</label>
                            <input type="text" wire:model="site_tagline" class="sts-input" placeholder="e.g. High Voltage Solutions & Modular Switches">
                            <span class="sts-hint">Core motto (e.g. "Engineered for Power, Efficiency & Durability").</span>
                        </div>
                    </div>

                    <div class="sts-field">
                        <label class="sts-label">Footer Mission & About Statement</label>
                        <textarea wire:model="footer_about_text" class="sts-textarea" rows="3" placeholder="Brief summary of company mission..."></textarea>
                        <span class="sts-hint">Introductory paragraph displayed beneath the logo in the website footer.</span>
                    </div>

                    <div class="sts-field">
                        <label class="sts-label">Copyright Notice</label>
                        <input type="text" wire:model="copyright_text" class="sts-input" placeholder="e.g. Copyright © 2026 Voltiva. All Rights Reserved.">
                        <span class="sts-hint">Appears at the very bottom bar of all web pages. HTML tags are supported.</span>
                    </div>

                    <div class="sts-card-foot">
                        <div class="sts-foot-note">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                            <span>Saved changes immediately apply across the entire live website.</span>
                        </div>
                        <button type="button" wire:click="save" class="sts-btn-primary">
                            <span>Save Changes</span>
                        </button>
                    </div>
                </div>

                <!-- 1.2 Brand Logos & Visual Assets -->
                <div class="sts-content-card">
                    <div class="sts-card-head">
                        <div class="sts-card-head-icon">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                <polyline points="21 15 16 10 5 21"></polyline>
                            </svg>
                        </div>
                        <div>
                            <h2 class="sts-card-title">Brand Logos & Visual Assets</h2>
                            <p class="sts-card-desc">Upload brand logos for light/dark displays and website favicon.</p>
                        </div>
                    </div>

                    <div class="sts-grid-2">
                        <!-- Header Logo (Color / Light) -->
                        <div class="sts-asset-card">
                            <div class="sts-asset-card-head">
                                <span class="sts-asset-title">Header Logo (Color / Light)</span>
                                <span class="sts-label-badge">PNG, SVG, WEBP</span>
                            </div>

                            <div class="sts-preview-box">
                                @if($new_header_logo)
                                    @php
                                        $tempHeaderUrl = null;
                                        try {
                                            $tempHeaderUrl = $new_header_logo->temporaryUrl();
                                        } catch (\Throwable $e) {}
                                    @endphp
                                    @if($tempHeaderUrl)
                                        <img src="{{ $tempHeaderUrl }}" alt="Preview" class="sts-preview-img">
                                    @else
                                        <div class="flex items-center gap-1.5 text-xs text-emerald-600 font-semibold py-1">
                                            <span>✓ SVG Selected: {{ $new_header_logo->getClientOriginalName() }}</span>
                                        </div>
                                    @endif
                                @elseif($current_header_logo)
                                    <img src="{{ storage_asset($current_header_logo) }}" alt="Header Logo" class="sts-preview-img">
                                @else
                                    <span class="text-xs text-gray-400 font-medium">No Logo Uploaded</span>
                                @endif
                                <div wire:loading wire:target="new_header_logo" class="text-xs text-teal-600 font-medium animate-pulse py-1">
                                    Uploading logo...
                                </div>
                            </div>

                            @error('new_header_logo')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror

                            <div class="sts-upload-btn-wrap">
                                <label class="sts-upload-label">
                                    <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="17 8 12 3 7 8"></polyline>
                                        <line x1="12" y1="3" x2="12" y2="15"></line>
                                    </svg>
                                    <span>Choose New Header Logo</span>
                                    <input type="file" wire:model="new_header_logo" accept=".svg,.png,.jpg,.jpeg,.webp,image/svg+xml,image/*" class="hidden">
                                </label>

                                @if($current_header_logo || $new_header_logo)
                                    <button type="button" wire:click="removeLogo('header')" class="sts-remove-link">Remove</button>
                                @endif
                            </div>
                        </div>

                        <!-- Footer Logo (White / Dark) -->
                        <div class="sts-asset-card">
                            <div class="sts-asset-card-head">
                                <span class="sts-asset-title">Footer Logo (White / Dark)</span>
                                <span class="sts-label-badge">For Dark Theme</span>
                            </div>

                            <div class="sts-preview-box dark-bg">
                                @if($new_footer_logo)
                                    @php
                                        $tempFooterUrl = null;
                                        try {
                                            $tempFooterUrl = $new_footer_logo->temporaryUrl();
                                        } catch (\Throwable $e) {}
                                    @endphp
                                    @if($tempFooterUrl)
                                        <img src="{{ $tempFooterUrl }}" alt="Preview" class="sts-preview-img">
                                    @else
                                        <div class="flex items-center gap-1.5 text-xs text-emerald-400 font-semibold py-1">
                                            <span>✓ Dark SVG Selected: {{ $new_footer_logo->getClientOriginalName() }}</span>
                                        </div>
                                    @endif
                                @elseif($current_footer_logo)
                                    <img src="{{ storage_asset($current_footer_logo) }}" alt="Dark Logo" class="sts-preview-img">
                                @else
                                    <span class="text-xs text-zinc-500 font-medium">No Dark Logo Uploaded</span>
                                @endif
                                <div wire:loading wire:target="new_footer_logo" class="text-xs text-teal-400 font-medium animate-pulse py-1">
                                    Uploading dark logo...
                                </div>
                            </div>

                            @error('new_footer_logo')
                                <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                            @enderror

                            <div class="sts-upload-btn-wrap">
                                <label class="sts-upload-label">
                                    <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="17 8 12 3 7 8"></polyline>
                                        <line x1="12" y1="3" x2="12" y2="15"></line>
                                    </svg>
                                    <span>Choose New Footer Logo</span>
                                    <input type="file" wire:model="new_footer_logo" accept=".svg,.png,.jpg,.jpeg,.webp,image/svg+xml,image/*" class="hidden">
                                </label>

                                @if($current_footer_logo || $new_footer_logo)
                                    <button type="button" wire:click="removeLogo('footer')" class="sts-remove-link">Remove</button>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Browser Tab Favicon -->
                    <div class="sts-asset-card mt-3">
                        <div class="sts-asset-card-head">
                            <span class="sts-asset-title">Browser Tab Favicon</span>
                            <span class="sts-label-badge">Square (1:1) PNG/ICO/SVG</span>
                        </div>

                        <div class="flex items-center justify-between flex-wrap gap-4 py-2">
                            <!-- Real Browser Tab Mockup -->
                            <div class="sts-browser-mockup">
                                <div class="sts-tab-pill">
                                    @if($new_favicon)
                                        @php
                                            $tempFavUrl = null;
                                            try {
                                                $tempFavUrl = $new_favicon->temporaryUrl();
                                            } catch (\Throwable $e) {}
                                        @endphp
                                        @if($tempFavUrl)
                                            <img src="{{ $tempFavUrl }}" alt="Favicon" class="sts-tab-favicon">
                                        @else
                                            <span class="text-[10px] text-teal-600 font-bold">SVG</span>
                                        @endif
                                    @elseif($current_favicon)
                                        <img src="{{ storage_asset($current_favicon) }}" alt="Favicon" class="sts-tab-favicon">
                                    @else
                                        <span class="w-3.5 h-3.5 rounded-full bg-teal-500 inline-block"></span>
                                    @endif
                                    <span>{{ $site_name ?: 'Voltiva' }} | Home</span>
                                    <span class="sts-tab-close">✕</span>
                                </div>
                            </div>

                            <div class="flex items-center gap-3">
                                <label class="sts-upload-label">
                                    <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                        <polyline points="17 8 12 3 7 8"></polyline>
                                        <line x1="12" y1="3" x2="12" y2="15"></line>
                                    </svg>
                                    <span>Choose New Favicon</span>
                                    <input type="file" wire:model="new_favicon" accept=".ico,.svg,.png,.webp,.jpg,.jpeg,image/x-icon,image/svg+xml,image/*" class="hidden">
                                </label>

                                @if($current_favicon || $new_favicon)
                                    <button type="button" wire:click="removeLogo('favicon')" class="sts-remove-link">Remove</button>
                                @endif
                            </div>
                        </div>
                        @error('new_favicon')
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sts-card-foot">
                        <div class="sts-foot-note">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            </svg>
                            <span>High-resolution transparent PNG or SVG images give the best clarity.</span>
                        </div>
                        <button type="button" wire:click="save" class="sts-btn-primary">
                            <span>Save Changes</span>
                        </button>
                    </div>
                </div>

                <!-- 1.3 Logo Dimensions & Live Adjuster -->
                <div class="sts-content-card" x-data="{ previewMode: 'header' }">
                    <div class="sts-card-head" style="justify-content: space-between; flex-wrap: wrap;">
                        <div class="flex items-start gap-3">
                            <div class="sts-card-head-icon">
                                <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 21v-7"></path>
                                    <path d="M4 10V3"></path>
                                    <path d="M12 21v-9"></path>
                                    <path d="M12 8V3"></path>
                                    <path d="M20 21v-5"></path>
                                    <path d="M20 12V3"></path>
                                    <circle cx="4" cy="14" r="2"></circle>
                                    <circle cx="12" cy="8" r="2"></circle>
                                    <circle cx="20" cy="16" r="2"></circle>
                                </svg>
                            </div>
                            <div>
                                <div class="flex items-center gap-2 flex-wrap">
                                    <h2 class="sts-card-title">Logo Dimensions & Live Adjuster</h2>
                                    <span class="sts-live-badge">
                                        <span class="sts-live-dot"></span>
                                        Live Preview
                                    </span>
                                </div>
                                <p class="sts-card-desc">Fine-tune logo height, maximum width, and scaling fit across all website sections and admin panel.</p>
                            </div>
                        </div>

                        <button type="button" 
                                wire:click="resetLogoAdjuster" 
                                wire:confirm="Are you sure you want to reset logo dimensions to system defaults?"
                                class="sts-upload-label" 
                                style="padding: 6px 12px; font-size: 11.5px; border-radius: 8px;">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 14px; height: 14px;">
                                <path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"></path>
                                <path d="M3 3v5h5"></path>
                            </svg>
                            <span>Reset Defaults</span>
                        </button>
                    </div>

                    @php
                        // Header logo URL for live preview
                        $previewHeaderLogoUrl = null;
                        if ($new_header_logo) {
                            try { $previewHeaderLogoUrl = $new_header_logo->temporaryUrl(); } catch (\Throwable $e) {}
                        }
                        if (!$previewHeaderLogoUrl && $current_header_logo) {
                            $previewHeaderLogoUrl = storage_asset($current_header_logo);
                        }
                        if (!$previewHeaderLogoUrl) {
                            $previewHeaderLogoUrl = asset('assets/images/logos/logo.webp');
                        }

                        // Footer logo URL for live preview
                        $previewFooterLogoUrl = null;
                        if ($new_footer_logo) {
                            try { $previewFooterLogoUrl = $new_footer_logo->temporaryUrl(); } catch (\Throwable $e) {}
                        }
                        if (!$previewFooterLogoUrl && $current_footer_logo) {
                            $previewFooterLogoUrl = storage_asset($current_footer_logo);
                        }
                        if (!$previewFooterLogoUrl) {
                            $previewFooterLogoUrl = $previewHeaderLogoUrl;
                        }
                    @endphp

                    <!-- ── Interactive Live Preview Stage ── -->
                    <div class="sts-preview-stage">
                        <div class="sts-preview-stage-head">
                            <!-- Section Switcher Tabs -->
                            <div class="flex items-center gap-1.5 flex-wrap">
                                <button type="button" 
                                        @click="previewMode = 'header'" 
                                        :class="previewMode === 'header' ? 'active' : ''" 
                                        class="sts-preview-tab-btn">
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="2" y="3" width="20" height="14" rx="2"></rect>
                                        <line x1="8" y1="21" x2="16" y2="21"></line>
                                        <line x1="12" y1="17" x2="12" y2="21"></line>
                                    </svg>
                                    <span>Desktop Header</span>
                                </button>
                                <button type="button" 
                                        @click="previewMode = 'mobile'" 
                                        :class="previewMode === 'mobile' ? 'active' : ''" 
                                        class="sts-preview-tab-btn">
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="5" y="2" width="14" height="20" rx="2"></rect>
                                        <line x1="12" y1="18" x2="12.01" y2="18"></line>
                                    </svg>
                                    <span>Mobile Topbar</span>
                                </button>
                                <button type="button" 
                                        @click="previewMode = 'footer'" 
                                        :class="previewMode === 'footer' ? 'active' : ''" 
                                        class="sts-preview-tab-btn">
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                                    </svg>
                                    <span>Dark Footer</span>
                                </button>
                                <button type="button" 
                                        @click="previewMode = 'admin'" 
                                        :class="previewMode === 'admin' ? 'active' : ''" 
                                        class="sts-preview-tab-btn">
                                    <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="3" width="7" height="7"></rect>
                                        <rect x="14" y="3" width="7" height="7"></rect>
                                        <rect x="14" y="14" width="7" height="7"></rect>
                                        <rect x="3" y="14" width="7" height="7"></rect>
                                    </svg>
                                    <span>Admin Sidebar</span>
                                </button>
                            </div>

                            <!-- Live Spec Badge -->
                            <div class="text-[11px] font-mono font-medium text-gray-500 dark:text-zinc-400">
                                <span x-show="previewMode === 'header'">Height: <strong>{{ $logo_header_height }}px</strong> | Max-W: <strong>{{ $logo_header_max_width }}px</strong> | Fit: <strong>{{ $logo_fit }}</strong></span>
                                <span x-show="previewMode === 'mobile'">Height: <strong>{{ $logo_mobile_height }}px</strong> | Fit: <strong>{{ $logo_fit }}</strong></span>
                                <span x-show="previewMode === 'footer'">Height: <strong>{{ $logo_footer_height }}px</strong> | Fit: <strong>{{ $logo_fit }}</strong></span>
                                <span x-show="previewMode === 'admin'">Height: <strong>{{ $logo_admin_height }}px</strong> | Fit: <strong>{{ $logo_fit }}</strong></span>
                            </div>
                        </div>

                        <!-- 1. Header Simulation -->
                        <div x-show="previewMode === 'header'" class="p-6 bg-white dark:bg-zinc-950 flex flex-col items-center justify-center transition-all">
                            <div class="w-full max-w-4xl border border-gray-200 dark:border-zinc-800 rounded-xl bg-white dark:bg-zinc-900 shadow-sm overflow-hidden">
                                <div class="px-5 py-3 border-b border-gray-100 dark:border-zinc-800 flex items-center justify-between gap-4">
                                    <!-- Scaled Header Logo -->
                                    <div class="flex items-center" style="max-width: {{ $logo_header_max_width }}px;">
                                        <img src="{{ $previewHeaderLogoUrl }}" 
                                             alt="Header Preview" 
                                             style="height: {{ $logo_header_height }}px; max-height: {{ $logo_header_height }}px; max-width: {{ $logo_header_max_width }}px; object-fit: {{ $logo_fit }}; padding: {{ $logo_padding_y }}px 0; display: block;"
                                             class="transition-all duration-200">
                                    </div>
                                    <!-- Simulated Menu Links -->
                                    <div class="hidden sm:flex items-center gap-5 text-xs font-semibold text-gray-600 dark:text-zinc-300">
                                        <span class="text-black dark:text-white font-bold">Home</span>
                                        <span>About Us</span>
                                        <span>Products</span>
                                        <span>Applications</span>
                                        <span>Contact</span>
                                    </div>
                                    <div class="hidden sm:inline-flex px-3 py-1.5 rounded-lg bg-black text-white dark:bg-white dark:text-black text-[11px] font-bold">
                                        Inquire Now
                                    </div>
                                </div>
                                <div class="px-5 py-6 bg-gray-50 dark:bg-zinc-900/50 text-center">
                                    <p class="text-xs text-gray-400 dark:text-zinc-500 font-medium">Header Navigation Bar Simulation</p>
                                </div>
                            </div>
                        </div>

                        <!-- 2. Mobile Topbar Simulation -->
                        <div x-show="previewMode === 'mobile'" x-cloak class="p-6 bg-gray-100 dark:bg-zinc-950 flex items-center justify-center transition-all">
                            <div class="w-[340px] border border-gray-300 dark:border-zinc-800 rounded-2xl bg-white dark:bg-zinc-900 shadow-md overflow-hidden">
                                <div class="px-4 py-3 border-b border-gray-100 dark:border-zinc-800 flex items-center justify-between">
                                    <!-- Hamburger Icon -->
                                    <div class="w-7 h-7 rounded-lg bg-gray-100 dark:bg-zinc-800 flex flex-col justify-center items-center gap-1">
                                        <span class="w-4 h-0.5 bg-gray-700 dark:bg-zinc-300 rounded"></span>
                                        <span class="w-4 h-0.5 bg-gray-700 dark:bg-zinc-300 rounded"></span>
                                        <span class="w-4 h-0.5 bg-gray-700 dark:bg-zinc-300 rounded"></span>
                                    </div>
                                    <!-- Scaled Mobile Logo -->
                                    <div class="flex items-center justify-center">
                                        <img src="{{ $previewHeaderLogoUrl }}" 
                                             alt="Mobile Logo" 
                                             style="height: {{ $logo_mobile_height }}px; max-height: {{ $logo_mobile_height }}px; max-width: 160px; object-fit: {{ $logo_fit }}; display: block;"
                                             class="transition-all duration-200">
                                    </div>
                                    <!-- Search Icon -->
                                    <div class="w-7 h-7 rounded-lg bg-gray-100 dark:bg-zinc-800 flex items-center justify-center text-gray-700 dark:text-zinc-300">
                                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="11" cy="11" r="8"></circle>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                        </svg>
                                    </div>
                                </div>
                                <div class="p-6 text-center text-xs text-gray-400">Mobile Topbar (375px)</div>
                            </div>
                        </div>

                        <!-- 3. Dark Footer Simulation -->
                        <div x-show="previewMode === 'footer'" x-cloak class="p-6 bg-[#09090b] flex flex-col items-center justify-center transition-all">
                            <div class="w-full max-w-2xl border border-zinc-800 rounded-xl bg-[#121215] p-6 shadow-lg">
                                <div class="flex flex-col sm:flex-row items-center sm:items-start justify-between gap-4">
                                    <div>
                                        <img src="{{ $previewFooterLogoUrl }}" 
                                             alt="Footer Logo" 
                                             style="height: {{ $logo_footer_height }}px; max-height: {{ $logo_footer_height }}px; max-width: 260px; object-fit: {{ $logo_fit }}; display: block;"
                                             class="transition-all duration-200">
                                        <p class="text-xs text-zinc-400 mt-3 max-w-xs line-clamp-2">
                                            {{ $footer_about_text ?: 'Voltiva is a premier manufacturer and supplier of electrical accessories and switches.' }}
                                        </p>
                                    </div>
                                    <div class="text-right hidden sm:block">
                                        <span class="text-xs font-bold text-white uppercase tracking-wider">Quick Links</span>
                                        <div class="text-[11px] text-zinc-400 mt-2 space-y-1">
                                            <div>Products Catalog</div>
                                            <div>Quality Assurance</div>
                                            <div>Contact & Support</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 4. Admin Sidebar Simulation -->
                        <div x-show="previewMode === 'admin'" x-cloak class="p-6 bg-zinc-900 flex items-center justify-center transition-all">
                            <div class="w-64 border border-zinc-800 rounded-xl bg-[#18181b] p-4 shadow-xl">
                                <div class="pb-3 border-b border-zinc-800 flex items-center">
                                    <img src="{{ $previewHeaderLogoUrl }}" 
                                         alt="Admin Logo" 
                                         style="height: {{ $logo_admin_height }}px; max-height: {{ $logo_admin_height }}px; max-width: 190px; object-fit: {{ $logo_fit }}; display: block;"
                                         class="transition-all duration-200">
                                </div>
                                <div class="mt-3 space-y-1.5 text-xs text-zinc-400">
                                    <div class="px-2.5 py-1.5 rounded-lg bg-zinc-800 text-white font-medium">Dashboard</div>
                                    <div class="px-2.5 py-1.5 rounded-lg hover:bg-zinc-800/50">Products Catalog</div>
                                    <div class="px-2.5 py-1.5 rounded-lg hover:bg-zinc-800/50">Site Settings</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ── Interactive Sliders Grid ── -->
                    <div class="sts-adjuster-grid">

                        <!-- 1. Header Logo Height (Desktop) -->
                        <div class="sts-adjust-card">
                            <div class="flex items-center justify-between">
                                <label class="sts-label">Header Logo Height (Desktop)</label>
                                <span class="sts-label-badge">Desktop Web</span>
                            </div>
                            <div class="sts-slider-row">
                                <input type="range" 
                                       min="20" 
                                       max="120" 
                                       step="1" 
                                       wire:model.live="logo_header_height" 
                                       class="sts-range-input">
                                <div class="flex items-center gap-1">
                                    <input type="number" 
                                           min="20" 
                                           max="120" 
                                           wire:model.live="logo_header_height" 
                                           class="sts-range-val-badge">
                                    <span class="text-xs text-gray-500 font-bold">px</span>
                                </div>
                            </div>
                            <span class="sts-hint">Controls logo height in desktop top header. Default: <strong>38px</strong> (Recommended: 30px–55px).</span>
                        </div>

                        <!-- 2. Header Logo Max-Width (Desktop) -->
                        <div class="sts-adjust-card">
                            <div class="flex items-center justify-between">
                                <label class="sts-label">Header Logo Max-Width (Desktop)</label>
                                <span class="sts-label-badge">Containment</span>
                            </div>
                            <div class="sts-slider-row">
                                <input type="range" 
                                       min="80" 
                                       max="350" 
                                       step="5" 
                                       wire:model.live="logo_header_max_width" 
                                       class="sts-range-input">
                                <div class="flex items-center gap-1">
                                    <input type="number" 
                                           min="80" 
                                           max="350" 
                                           wire:model.live="logo_header_max_width" 
                                           class="sts-range-val-badge">
                                    <span class="text-xs text-gray-500 font-bold">px</span>
                                </div>
                            </div>
                            <span class="sts-hint">Limits wide horizontal logos from pushing nav menu items. Default: <strong>180px</strong>.</span>
                        </div>

                        <!-- 3. Mobile / Offcanvas Logo Height -->
                        <div class="sts-adjust-card">
                            <div class="flex items-center justify-between">
                                <label class="sts-label">Mobile & Drawer Logo Height</label>
                                <span class="sts-label-badge">Mobile Responsive</span>
                            </div>
                            <div class="sts-slider-row">
                                <input type="range" 
                                       min="18" 
                                       max="80" 
                                       step="1" 
                                       wire:model.live="logo_mobile_height" 
                                       class="sts-range-input">
                                <div class="flex items-center gap-1">
                                    <input type="number" 
                                           min="18" 
                                           max="80" 
                                           wire:model.live="logo_mobile_height" 
                                           class="sts-range-val-badge">
                                    <span class="text-xs text-gray-500 font-bold">px</span>
                                </div>
                            </div>
                            <span class="sts-hint">Controls logo size in phones, tablets, and slide-in drawer menus. Default: <strong>34px</strong>.</span>
                        </div>

                        <!-- 4. Footer Logo Height -->
                        <div class="sts-adjust-card">
                            <div class="flex items-center justify-between">
                                <label class="sts-label">Footer Logo Height</label>
                                <span class="sts-label-badge">Website Footer</span>
                            </div>
                            <div class="sts-slider-row">
                                <input type="range" 
                                       min="20" 
                                       max="100" 
                                       step="1" 
                                       wire:model.live="logo_footer_height" 
                                       class="sts-range-input">
                                <div class="flex items-center gap-1">
                                    <input type="number" 
                                           min="20" 
                                           max="100" 
                                           wire:model.live="logo_footer_height" 
                                           class="sts-range-val-badge">
                                    <span class="text-xs text-gray-500 font-bold">px</span>
                                </div>
                            </div>
                            <span class="sts-hint">Controls brand logo height in the dark website footer section. Default: <strong>42px</strong>.</span>
                        </div>

                        <!-- 5. Admin Sidebar Logo Height -->
                        <div class="sts-adjust-card">
                            <div class="flex items-center justify-between">
                                <label class="sts-label">Admin Sidebar Logo Height</label>
                                <span class="sts-label-badge">Filament Admin</span>
                            </div>
                            <div class="sts-slider-row">
                                <input type="range" 
                                       min="20" 
                                       max="60" 
                                       step="1" 
                                       wire:model.live="logo_admin_height" 
                                       class="sts-range-input">
                                <div class="flex items-center gap-1">
                                    <input type="number" 
                                           min="20" 
                                           max="60" 
                                           wire:model.live="logo_admin_height" 
                                           class="sts-range-val-badge">
                                    <span class="text-xs text-gray-500 font-bold">px</span>
                                </div>
                            </div>
                            <span class="sts-hint">Controls logo height inside this admin sidebar header. Default: <strong>32px</strong>.</span>
                        </div>

                        <!-- 6. Logo Fit & Aspect Ratio -->
                        <div class="sts-adjust-card">
                            <div class="flex items-center justify-between">
                                <label class="sts-label">Image Scaling & Aspect Ratio (Object Fit)</label>
                                <span class="sts-label-badge">Proportions</span>
                            </div>
                            <div class="mt-1">
                                <select wire:model.live="logo_fit" class="sts-input font-medium">
                                    <option value="contain">contain — Preserve aspect ratio without cropping (Recommended)</option>
                                    <option value="scale-down">scale-down — Downscale only if larger than container</option>
                                    <option value="cover">cover — Fill dimensions proportionally (may crop edges)</option>
                                    <option value="fill">fill — Stretch exactly to box bounds</option>
                                </select>
                            </div>
                            <span class="sts-hint">Preserves crisp SVG and PNG vectors without distortion or stretching.</span>
                        </div>

                        <!-- 7. Vertical Padding (Top & Bottom) -->
                        <div class="sts-adjust-card" style="grid-column: 1 / -1;">
                            <div class="flex items-center justify-between">
                                <label class="sts-label">Header Logo Vertical Spacing / Padding</label>
                                <span class="sts-label-badge">Breathing Room</span>
                            </div>
                            <div class="sts-slider-row">
                                <input type="range" 
                                       min="0" 
                                       max="25" 
                                       step="1" 
                                       wire:model.live="logo_padding_y" 
                                       class="sts-range-input">
                                <div class="flex items-center gap-1">
                                    <input type="number" 
                                           min="0" 
                                           max="25" 
                                           wire:model.live="logo_padding_y" 
                                           class="sts-range-val-badge">
                                    <span class="text-xs text-gray-500 font-bold">px</span>
                                </div>
                            </div>
                            <span class="sts-hint">Optional vertical padding added above and below the desktop header logo. Default: <strong>0px</strong>.</span>
                        </div>

                    </div>

                    <div class="sts-card-foot mt-4">
                        <div class="sts-foot-note">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            </svg>
                            <span>Live preview reflects changes instantly. Click Save Changes to publish settings globally.</span>
                        </div>
                        <button type="button" wire:click="save" class="sts-btn-primary">
                            <span>Save Changes</span>
                        </button>
                    </div>
                </div>
            @endif


            <!-- ======================================================= -->
            <!-- TAB: HOMEPAGE HERO VIDEO                                -->
            <!-- ======================================================= -->
            @if($activeTab === 'hero_video')
                <div class="sts-content-card">
                    <div class="sts-card-head">
                        <div class="sts-card-head-icon" style="background: rgba(16, 185, 129, 0.12); color: #10b981;">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polygon points="23 7 16 12 23 17 23 7"></polygon>
                                <rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect>
                            </svg>
                        </div>
                        <div style="flex: 1;">
                            <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px; flex-wrap: wrap;">
                                <h2 class="sts-card-title">Homepage Background Video</h2>
                                <button type="button" wire:click="resetHeroVideo" class="sts-btn-ghost" style="font-size: 12px; padding: 6px 14px; border-radius: 9px; border: 1.5px solid #e4e4e7; background: #ffffff; color: #52525b; cursor: pointer; display: inline-flex; align-items: center; gap: 6px; font-weight: 600; transition: all 0.15s ease;">
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/></svg>
                                    Restore Default Video
                                </button>
                            </div>
                            <p class="sts-card-desc">Upload a custom video or enter an external URL to play continuously in the background of the homepage hero banner.</p>
                        </div>
                    </div>

                    {{-- Live Video Player Preview --}}
                    @php
                        $previewVideoSrc = null;
                        if ($new_hero_video) {
                            try { $previewVideoSrc = $new_hero_video->temporaryUrl(); } catch (\Throwable $e) {}
                        }
                        if (!$previewVideoSrc && $current_hero_video) {
                            $previewVideoSrc = asset('storage/' . ltrim($current_hero_video, '/'));
                        }
                        if (!$previewVideoSrc && !empty($hero_video_url)) {
                            $previewVideoSrc = $hero_video_url;
                        }
                        if (!$previewVideoSrc) {
                            $previewVideoSrc = asset('assets/video/board.mp4');
                        }
                    @endphp

                    <div style="background: #09090b; border-radius: 18px; overflow: hidden; margin-bottom: 22px; border: 1px solid rgba(255, 255, 255, 0.12); box-shadow: 0 14px 34px -8px rgba(0, 0, 0, 0.35);">
                        <div style="padding: 12px 18px; border-bottom: 1px solid rgba(255, 255, 255, 0.08); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 8px;">
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <span style="width: 8px; height: 8px; border-radius: 50%; background: #10b981; display: inline-block;"></span>
                                <span style="font-size: 13px; font-weight: 700; color: #ffffff;">Live Video Player</span>
                                @if($current_hero_video)
                                    <span style="font-size: 11px; padding: 2px 8px; border-radius: 6px; background: rgba(16, 185, 129, 0.2); color: #34d399; font-weight: 700;">Active: Custom Upload</span>
                                @elseif(!empty($hero_video_url))
                                    <span style="font-size: 11px; padding: 2px 8px; border-radius: 6px; background: rgba(59, 130, 246, 0.2); color: #60a5fa; font-weight: 700;">Active: External URL</span>
                                @else
                                    <span style="font-size: 11px; padding: 2px 8px; border-radius: 6px; background: rgba(255, 255, 255, 0.15); color: #e4e4e7; font-weight: 700;">Active: Default (board.mp4)</span>
                                @endif
                            </div>
                            <span style="font-size: 11.5px; color: #a1a1aa; font-family: monospace;">{{ basename($previewVideoSrc) }}</span>
                        </div>
                        <div style="position: relative; width: 100%; aspect-ratio: 16/7; max-height: 340px; background: #000000; display: flex; align-items: center; justify-content: center; overflow: hidden;">
                            <video key="{{ $previewVideoSrc }}" autoplay loop muted playsinline controls style="width: 100%; height: 100%; object-fit: cover;">
                                <source src="{{ $previewVideoSrc }}" type="video/mp4">
                                Your browser does not support HTML5 video.
                            </video>
                        </div>
                    </div>

                    {{-- Form Inputs Grid --}}
                    <div class="sts-grid-2">
                        {{-- 1. Video Upload Field --}}
                        <div class="sts-field">
                            <label class="sts-label">
                                <span>Upload New Video File</span>
                                <span class="sts-label-badge">MP4, WEBM, MOV (Max 100MB)</span>
                            </label>
                            <input type="file" wire:model="new_hero_video" accept="video/mp4,video/webm,video/ogg,video/quicktime" class="sts-input" style="padding: 9px 12px; background: #ffffff;">
                            <span class="sts-hint">Select a video file from your computer. Recommended: H.264 MP4, 1920×1080 landscape, optimized under 30MB for rapid web loading.</span>
                            
                            <div wire:loading wire:target="new_hero_video" style="margin-top: 8px; font-size: 12px; color: #0d9488; font-weight: 600; display: flex; align-items: center; gap: 6px;">
                                <svg class="animate-spin" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10" stroke-opacity="0.25"></circle><path d="M12 2a10 10 0 0 1 10 10"></path></svg>
                                <span>Uploading video preview to server, please wait...</span>
                            </div>
                        </div>

                        {{-- 2. Video External URL Option --}}
                        <div class="sts-field">
                            <label class="sts-label">
                                <span>OR External Video Direct URL (Optional)</span>
                                <span class="sts-label-badge">CDN / HTTPS</span>
                            </label>
                            <input type="url" wire:model="hero_video_url" class="sts-input" placeholder="https://example.com/videos/home-hero.mp4">
                            <span class="sts-hint">If your video is hosted on an external CDN, AWS S3, or media host, paste the direct MP4 link here.</span>
                        </div>
                    </div>

                    {{-- Overlay & Display Controls --}}
                    <div class="sts-grid-2" style="margin-top: 10px;">
                        <div class="sts-field">
                            <label class="sts-label">
                                <span>Dark Overlay Opacity (%)</span>
                                <span class="sts-label-badge teal">{{ $hero_video_overlay }}%</span>
                            </label>
                            <div style="display: flex; align-items: center; gap: 14px;">
                                <input type="range" wire:model.live="hero_video_overlay" min="0" max="95" step="5" style="flex: 1; accent-color: #18181b; cursor: pointer;">
                                <input type="number" wire:model.live="hero_video_overlay" min="0" max="95" class="sts-input" style="width: 80px; text-align: center;">
                            </div>
                            <span class="sts-hint">Controls how dark the semi-transparent black overlay is over the video. Default: 65%.</span>
                        </div>

                        <div class="sts-field" style="justify-content: center;">
                            <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 12px; padding: 14px 16px;">
                                <div style="display: flex; align-items: center; justify-content: space-between; gap: 8px;">
                                    <div>
                                        <div style="font-size: 13px; font-weight: 700; color: #0f172a;">Autoplay &amp; Loop Compatibility</div>
                                        <div style="font-size: 11.5px; color: #64748b; margin-top: 2px;">Videos continuously loop and are muted to guarantee smooth autoplay across modern desktop and mobile browsers.</div>
                                    </div>
                                    <span style="font-size: 11px; padding: 3px 8px; border-radius: 6px; background: #e0f2fe; color: #0369a1; font-weight: 700; white-space: nowrap;">HTML5</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sts-card-foot" style="margin-top: 24px;">
                        <div class="sts-foot-note">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                            <span>Clicking "Save Changes" will immediately update the live homepage background video without any design alteration.</span>
                        </div>
                        <button type="button" wire:click="save" class="sts-btn-primary">
                            <span>Save Changes</span>
                        </button>
                    </div>
                </div>
            @endif


            <!-- ======================================================= -->
            <!-- TAB 2: CONTACT & LOCATION                               -->
            <!-- ======================================================= -->
            @if($activeTab === 'contact')
                <!-- 2.1 Communication & Help Desk -->
                <div class="sts-content-card">
                    <div class="sts-card-head">
                        <div class="sts-card-head-icon">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="sts-card-title">Communication & Help Desk</h2>
                            <p class="sts-card-desc">Direct customer contact numbers and support email addresses.</p>
                        </div>
                    </div>

                    <div class="sts-grid-2">
                        <!-- Customer Care Phone -->
                        <div class="sts-field">
                            <label class="sts-label">Customer Care Phone</label>
                            <div class="sts-input-wrap has-icon">
                                <svg class="sts-input-icon" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                                </svg>
                                <input type="text" wire:model="contact_phone" class="sts-input" placeholder="+91 76007 57008">
                            </div>
                            <span class="sts-hint">Displayed in header, footer, and contact page.</span>
                        </div>

                        <!-- Customer Care Email -->
                        <div class="sts-field">
                            <label class="sts-label">Customer Care Email</label>
                            <div class="sts-input-wrap has-icon">
                                <svg class="sts-input-icon" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>
                                <input type="email" wire:model="contact_email" class="sts-input" placeholder="info@voltiva.com">
                            </div>
                            <span class="sts-hint">Official inquiry email address.</span>
                        </div>

                        <!-- WhatsApp Number -->
                        <div class="sts-field">
                            <label class="sts-label">WhatsApp Number</label>
                            <div class="sts-input-wrap has-icon">
                                <svg class="sts-input-icon" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                </svg>
                                <input type="text" wire:model="contact_whatsapp" class="sts-input" placeholder="+91 76007 57008">
                            </div>
                            <span class="sts-hint">Format with country code (e.g. +91 76007 57008).</span>
                        </div>

                        <!-- Business / Mill Hours -->
                        <div class="sts-field">
                            <label class="sts-label">Business / Mill Hours</label>
                            <div class="sts-input-wrap has-icon">
                                <svg class="sts-input-icon" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <input type="text" wire:model="contact_working_hours" class="sts-input" placeholder="Monday - Saturday: 9:00 AM - 7:00 PM (Sunday Closed)">
                            </div>
                            <span class="sts-hint">Public working schedule shown on the Contact page.</span>
                        </div>
                    </div>

                    <div class="sts-card-foot">
                        <div class="sts-foot-note">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            <span>Visitors can tap phone numbers on mobile devices to call directly.</span>
                        </div>
                        <button type="button" wire:click="save" class="sts-btn-primary">
                            <span>Save Changes</span>
                        </button>
                    </div>
                </div>

                <!-- 2.2 Factory & Office Location -->
                <div class="sts-content-card">
                    <div class="sts-card-head">
                        <div class="sts-card-head-icon">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                        </div>
                        <div>
                            <h2 class="sts-card-title">Factory & Office Location</h2>
                            <p class="sts-card-desc">Full physical address and interactive Google Maps embed configuration.</p>
                        </div>
                    </div>

                    <div class="sts-field">
                        <label class="sts-label">Manufacturing Facility & Office Address</label>
                        <textarea wire:model="contact_location" class="sts-textarea" rows="3" placeholder="Industrial zone, plot number, village/town, city, state, postal code..."></textarea>
                        <span class="sts-hint">Industrial zone, plot number, town, district, state, and postal code.</span>
                    </div>

                    <div class="sts-field">
                        <label class="sts-label">
                            <span>Google Maps Embed URL / Share Link</span>
                            <span class="sts-label-badge teal">Auto-Converts Share Links & Embed Codes</span>
                        </label>
                        <textarea wire:model.lazy="google_map_embed" class="sts-textarea" rows="2" placeholder="https://maps.google.com/maps?q=... or <iframe src='...'></iframe>"></textarea>
                        <span class="sts-hint">Accepts maps.app.goo.gl mobile share links, full place URLs, coordinates, or &lt;iframe&gt; embed codes. The system automatically converts them to an interactive embed.</span>
                    </div>

                    <!-- Interactive Map Preview -->
                    <div class="sts-map-preview-box">
                        <div class="sts-map-preview-head">
                            <div class="sts-map-preview-title">
                                <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon>
                                    <line x1="8" y1="2" x2="8" y2="18"></line>
                                    <line x1="16" y1="6" x2="16" y2="22"></line>
                                </svg>
                                <span>Interactive Map Preview</span>
                            </div>

                            <div class="sts-map-actions">
                                @if(!empty($this->clean_map_embed_url))
                                    <a href="{{ $this->clean_map_embed_url }}" target="_blank" class="sts-map-act-btn">
                                        <span>Open in Maps</span>
                                        <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                                            <polyline points="15 3 21 3 21 9"></polyline>
                                            <line x1="10" y1="14" x2="21" y2="3"></line>
                                        </svg>
                                    </a>
                                @endif

                                <button type="button" wire:click="refreshMapPreview" class="sts-map-act-btn">
                                    <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polyline points="23 4 23 10 17 10"></polyline>
                                        <polyline points="1 20 1 14 7 14"></polyline>
                                        <path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"></path>
                                    </svg>
                                    <span>Refresh Preview</span>
                                </button>
                            </div>
                        </div>

                        @if(!empty($this->clean_map_embed_url))
                            <iframe src="{{ $this->clean_map_embed_url }}"
                                    class="sts-map-iframe"
                                    allowfullscreen=""
                                    loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        @else
                            <div class="p-8 text-center text-xs text-gray-400">
                                Enter a Google Maps URL or address above to view the interactive live map preview.
                            </div>
                        @endif
                    </div>

                    <div class="sts-card-foot">
                        <div class="sts-foot-note">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon>
                            </svg>
                            <span>The map renders smoothly on both desktop and mobile viewports.</span>
                        </div>
                        <button type="button" wire:click="save" class="sts-btn-primary">
                            <span>Save Changes</span>
                        </button>
                    </div>
                </div>
            @endif


            <!-- ======================================================= -->
            <!-- TAB 3: SOCIAL NETWORKS                                  -->
            <!-- ======================================================= -->
            @if($activeTab === 'social')
                <div class="sts-content-card">
                    <div class="sts-card-head">
                        <div class="sts-card-head-icon">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="18" cy="5" r="3"></circle>
                                <circle cx="6" cy="12" r="3"></circle>
                                <circle cx="18" cy="19" r="3"></circle>
                                <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line>
                                <line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line>
                            </svg>
                        </div>
                        <div>
                            <h2 class="sts-card-title">Official Social Network Profiles</h2>
                            <p class="sts-card-desc">Configure the public social icons displayed in the website header and footer.</p>
                        </div>
                    </div>

                    <div class="sts-grid-2">
                        <!-- WhatsApp Direct Link -->
                        <div class="sts-field">
                            <label class="sts-label">WhatsApp Direct Link</label>
                            <div class="sts-input-wrap has-icon">
                                <svg class="sts-input-icon text-green-500" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
                                </svg>
                                <input type="url" wire:model="social_whatsapp" class="sts-input" placeholder="https://wa.me/917600757008?text=...">
                            </div>
                            <span class="sts-hint">Instant click-to-chat link with customer support.</span>
                        </div>

                        <!-- Instagram Profile -->
                        <div class="sts-field">
                            <label class="sts-label">Instagram Profile</label>
                            <div class="sts-input-wrap has-icon">
                                <svg class="sts-input-icon text-pink-500" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                </svg>
                                <input type="url" wire:model="social_instagram" class="sts-input" placeholder="https://www.instagram.com/voltiva_official/">
                            </div>
                            <span class="sts-hint">Official Instagram page handle link.</span>
                        </div>

                        <!-- Facebook Page -->
                        <div class="sts-field">
                            <label class="sts-label">Facebook Page</label>
                            <div class="sts-input-wrap has-icon">
                                <svg class="sts-input-icon text-blue-600" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg>
                                <input type="url" wire:model="social_facebook" class="sts-input" placeholder="https://facebook.com/voltiva">
                            </div>
                            <span class="sts-hint">Official Facebook business page URL.</span>
                        </div>

                        <!-- LinkedIn Company Page -->
                        <div class="sts-field">
                            <label class="sts-label">LinkedIn Company Page</label>
                            <div class="sts-input-wrap has-icon">
                                <svg class="sts-input-icon text-blue-500" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                    <rect x="2" y="9" width="4" height="12"></rect>
                                    <circle cx="4" cy="4" r="2"></circle>
                                </svg>
                                <input type="url" wire:model="social_linkedin" class="sts-input" placeholder="https://linkedin.com/company/voltiva">
                            </div>
                            <span class="sts-hint">Official company LinkedIn page.</span>
                        </div>

                        <!-- YouTube Channel -->
                        <div class="sts-field">
                            <label class="sts-label">YouTube Channel</label>
                            <div class="sts-input-wrap has-icon">
                                <svg class="sts-input-icon text-red-500" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path>
                                    <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
                                </svg>
                                <input type="url" wire:model="social_youtube" class="sts-input" placeholder="https://youtube.com/@voltiva">
                            </div>
                            <span class="sts-hint">Product recipes and processing showcase channel.</span>
                        </div>

                        <!-- X / Twitter Handle -->
                        <div class="sts-field">
                            <label class="sts-label">X / Twitter Handle</label>
                            <div class="sts-input-wrap has-icon">
                                <svg class="sts-input-icon text-gray-800 dark:text-zinc-200" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M4 4l11.733 16h4.267l-11.733 -16z"></path>
                                    <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772"></path>
                                </svg>
                                <input type="url" wire:model="social_twitter" class="sts-input" placeholder="https://x.com/voltiva">
                            </div>
                            <span class="sts-hint">Official brand channel on X.</span>
                        </div>

                        <!-- Pinterest Profile -->
                        <div class="sts-field">
                            <label class="sts-label">Pinterest Profile</label>
                            <div class="sts-input-wrap has-icon">
                                <svg class="sts-input-icon text-red-600" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none">
                                    <line x1="12" y1="4" x2="12" y2="20"></line>
                                    <path d="M8 8a4 4 0 0 1 7.75 1.5c0 3-2 5.5-4 5.5s-2.5-1.5-2.5-3"></path>
                                </svg>
                                <input type="url" wire:model="social_pinterest" class="sts-input" placeholder="https://pinterest.com/voltiva">
                            </div>
                            <span class="sts-hint">Official Pinterest board/profile URL.</span>
                        </div>
                    </div>

                    <div class="sts-card-foot">
                        <div class="sts-foot-note">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path>
                                <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path>
                            </svg>
                            <span>Social channels open in new browser tabs when clicked by visitors.</span>
                        </div>
                        <button type="button" wire:click="save" class="sts-btn-primary">
                            <span>Save Changes</span>
                        </button>
                    </div>
                </div>
            @endif


            <!-- ======================================================= -->
            <!-- TAB 4: SEO & ANALYTICS                                  -->
            <!-- ======================================================= -->
            @if($activeTab === 'seo')
                <!-- 4.1 Search Engine Optimization (SEO) -->
                <div class="sts-content-card">
                    <div class="sts-card-head">
                        <div class="sts-card-head-icon">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </div>
                        <div>
                            <h2 class="sts-card-title">Search Engine Optimization (SEO)</h2>
                            <p class="sts-card-desc">Configure default meta titles and description snippets indexed by Google.</p>
                        </div>
                    </div>

                    <div class="sts-field">
                        <label class="sts-label">Default Meta Title</label>
                        <input type="text" wire:model="meta_title" class="sts-input" placeholder="e.g. Voltiva - High Voltage Solutions & Electrical Manufacturing">
                        <span class="sts-hint">Recommended length: 50–60 characters.</span>
                    </div>

                    <div class="sts-field">
                        <label class="sts-label">Default Meta Description</label>
                        <textarea wire:model="meta_description" class="sts-textarea" rows="3" placeholder="Summary displayed on Google search results..."></textarea>
                        <span class="sts-hint">Summary displayed on Google search results (150–160 characters).</span>
                    </div>

                    <div class="sts-field">
                        <label class="sts-label">Meta Keywords (Comma separated)</label>
                        <textarea wire:model="meta_keywords" class="sts-textarea" rows="2" placeholder="voltiva, switches, electrical accessories, modular switches..."></textarea>
                        <span class="sts-hint">Comma-separated keywords for search indexing.</span>
                    </div>

                    <div class="sts-card-foot">
                        <div class="sts-foot-note">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="12" y1="16" x2="12" y2="12"></line>
                                <line x1="12" y1="8" x2="12.01" y2="8"></line>
                            </svg>
                            <span>Proper meta descriptions improve click-through rates on search engines.</span>
                        </div>
                        <button type="button" wire:click="save" class="sts-btn-primary">
                            <span>Save Changes</span>
                        </button>
                    </div>
                </div>

                <!-- 4.2 Header & Analytics Tracking Scripts -->
                <div class="sts-content-card">
                    <div class="sts-card-head">
                        <div class="sts-card-head-icon">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="16 18 22 12 16 6"></polyline>
                                <polyline points="8 6 2 12 8 18"></polyline>
                            </svg>
                        </div>
                        <div>
                            <h2 class="sts-card-title">Header & Analytics Tracking Scripts</h2>
                            <p class="sts-card-desc">Inject Google Analytics (GA4), Tag Manager, or Meta Pixel code directly into the &lt;head&gt; section.</p>
                        </div>
                    </div>

                    <div class="sts-field">
                        <label class="sts-label">Custom &lt;head&gt; Scripts</label>
                        <textarea wire:model="custom_head_code" 
                                  class="sts-textarea sts-code-textarea" 
                                  rows="6" 
                                  placeholder="<!-- Google Analytics tag (gtag.js) -->&#10;<script async src='https://www.googletagmanager.com/gtag/js?id=G-XXXXX'></script>&#10;<script>&#10;  window.dataLayer = window.dataLayer || [];&#10;  function gtag(){dataLayer.push(arguments);}&#10;  gtag('js', new Date());&#10;  gtag('config', 'G-XXXXX');&#10;</script>"></textarea>
                        <span class="sts-hint">Script tags entered here will be rendered safely in the public website header.</span>
                    </div>

                    <div class="sts-card-foot">
                        <div class="sts-foot-note">
                            <svg viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                            </svg>
                            <span>Only paste verified tracking code from trusted analytics providers.</span>
                        </div>
                        <button type="button" wire:click="save" class="sts-btn-primary">
                            <span>Save Changes</span>
                        </button>
                    </div>
                </div>
            @endif

        </div>
    </div>

</div>

</x-filament-panels::page>
