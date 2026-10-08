<style>
/* ============================================================
   VOLTIVA DASH - CONFIRMATION & ACTION MODALS FIX
   Only applies to confirmation/alert dialogs (modals without a form)
   so that form modals (Edit/Create products) are not affected!
   ============================================================ */
/* Centering & Window styling for confirmation dialogs */
.fi-modal-window:not(:has(form)) {
    border-radius: 20px !important;
    overflow: hidden !important;
    box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.35) !important;
    border: 1px solid rgba(0, 0, 0, 0.08) !important;
    background: #ffffff !important;
    max-width: 28rem !important;
    margin: auto !important;
}

/* Modal Header & Icon */
.fi-modal-window:not(:has(form)) .fi-modal-header {
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    justify-content: center !important;
    text-align: center !important;
    padding: 2rem 1.75rem 0.5rem 1.75rem !important;
    border: none !important;
}

.fi-modal-window:not(:has(form)) .fi-modal-icon-ctn {
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    margin: 0 auto 1.25rem auto !important;
    width: 100% !important;
}

.fi-modal-window:not(:has(form)) .fi-modal-icon-bg {
    width: 60px !important;
    height: 60px !important;
    border-radius: 50% !important;
    background-color: #fee2e2 !important;
    border: 6px solid #fef2f2 !important;
    color: #ef4444 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    box-shadow: 0 4px 14px rgba(239, 68, 68, 0.18) !important;
}

.fi-modal-window:not(:has(form)) .fi-modal-icon-bg svg,
.fi-modal-window:not(:has(form)) .fi-modal-icon-bg .fi-icon {
    width: 28px !important;
    height: 28px !important;
    color: #ef4444 !important;
}

.fi-modal-window:not(:has(form)) .fi-modal-heading {
    font-family: 'Figtree', sans-serif !important;
    font-size: 1.35rem !important;
    font-weight: 800 !important;
    color: #0f172a !important;
    text-align: center !important;
    line-height: 1.3 !important;
    margin: 0 auto !important;
    width: 100% !important;
}

.fi-modal-window:not(:has(form)) .fi-modal-description {
    font-family: 'Figtree', sans-serif !important;
    font-size: 0.95rem !important;
    color: #64748b !important;
    text-align: center !important;
    margin: 0.6rem auto 0 auto !important;
    line-height: 1.45 !important;
    width: 100% !important;
}

/* Modal Content (Body) */
.fi-modal-window:not(:has(form)) .fi-modal-content {
    text-align: center !important;
    padding: 0.5rem 1.75rem 1.25rem 1.75rem !important;
    border: none !important;
}

/* Modal Footer */
.fi-modal-window:not(:has(form)) .fi-modal-footer {
    border-top: 1px solid #f1f5f9 !important;
    padding: 1.25rem 1.75rem 1.5rem 1.75rem !important;
    background: #ffffff !important;
    display: block !important;
    width: 100% !important;
}

/* Actions wrapper inside footer */
.fi-modal-window:not(:has(form)) .fi-modal-footer-actions,
.fi-modal-window:not(:has(form)) .fi-modal-actions {
    display: flex !important;
    flex-direction: row !important;
    align-items: center !important;
    justify-content: space-between !important;
    gap: 14px !important;
    width: 100% !important;
}

/* Child item / button wrapper */
.fi-modal-window:not(:has(form)) .fi-modal-footer-actions > *,
.fi-modal-window:not(:has(form)) .fi-modal-actions > * {
    flex: 1 1 50% !important;
    width: 50% !important;
    margin: 0 !important;
    display: flex !important;
}

/* Button styles */
.fi-modal-window:not(:has(form)) .fi-modal-footer-actions .fi-btn,
.fi-modal-window:not(:has(form)) .fi-modal-actions .fi-btn,
.fi-modal-window:not(:has(form)) .fi-modal-footer .fi-btn {
    width: 100% !important;
    min-height: 46px !important;
    height: 46px !important;
    border-radius: 12px !important;
    font-family: 'Figtree', sans-serif !important;
    font-size: 0.925rem !important;
    font-weight: 700 !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    gap: 8px !important;
    cursor: pointer !important;
    transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1) !important;
    text-decoration: none !important;
    box-sizing: border-box !important;
    padding: 0 1rem !important;
}

/* Cancel Button */
.fi-modal-window:not(:has(form)) .fi-modal-footer-actions .fi-btn:not(.fi-color-danger),
.fi-modal-window:not(:has(form)) .fi-modal-footer-actions button:not(.fi-color-danger),
.fi-modal-window:not(:has(form)) .fi-modal-footer .fi-btn:not(.fi-color-danger) {
    background: #ffffff !important;
    color: #475569 !important;
    border: 1.5px solid #d1d5db !important;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05) !important;
}

.fi-modal-window:not(:has(form)) .fi-modal-footer-actions .fi-btn:not(.fi-color-danger):hover,
.fi-modal-window:not(:has(form)) .fi-modal-footer-actions button:not(.fi-color-danger):hover,
.fi-modal-window:not(:has(form)) .fi-modal-footer .fi-btn:not(.fi-color-danger):hover {
    background: #f8fafc !important;
    border-color: #9ca3af !important;
    color: #0f172a !important;
    transform: translateY(-1px) !important;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08) !important;
}

.fi-modal-window:not(:has(form)) .fi-modal-footer-actions .fi-btn:not(.fi-color-danger) *,
.fi-modal-window:not(:has(form)) .fi-modal-footer-actions button:not(.fi-color-danger) *,
.fi-modal-window:not(:has(form)) .fi-modal-footer .fi-btn:not(.fi-color-danger) * {
    color: #475569 !important;
}

.fi-modal-window:not(:has(form)) .fi-modal-footer-actions .fi-btn:not(.fi-color-danger):hover *,
.fi-modal-window:not(:has(form)) .fi-modal-footer-actions button:not(.fi-color-danger):hover *,
.fi-modal-window:not(:has(form)) .fi-modal-footer .fi-btn:not(.fi-color-danger):hover * {
    color: #0f172a !important;
}

/* Delete / Danger Button */
.fi-modal-window:not(:has(form)) .fi-modal-footer-actions .fi-btn.fi-color-danger,
.fi-modal-window:not(:has(form)) .fi-modal-footer-actions button.fi-color-danger,
.fi-modal-window:not(:has(form)) .fi-modal-footer .fi-btn.fi-color-danger,
.fi-modal-window:not(:has(form)) .fi-btn.fi-color-danger:not(.fi-outlined) {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%) !important;
    color: #ffffff !important;
    border: 1px solid #dc2626 !important;
    box-shadow: 0 4px 14px rgba(220, 38, 38, 0.35) !important;
}

.fi-modal-window:not(:has(form)) .fi-modal-footer-actions .fi-btn.fi-color-danger:hover,
.fi-modal-window:not(:has(form)) .fi-modal-footer-actions button.fi-color-danger:hover,
.fi-modal-window:not(:has(form)) .fi-modal-footer .fi-btn.fi-color-danger:hover,
.fi-modal-window:not(:has(form)) .fi-btn.fi-color-danger:not(.fi-outlined):hover {
    background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%) !important;
    border-color: #b91c1c !important;
    color: #ffffff !important;
    box-shadow: 0 6px 20px rgba(220, 38, 38, 0.45) !important;
    transform: translateY(-1px) !important;
}

.fi-modal-window:not(:has(form)) .fi-modal-footer-actions .fi-btn.fi-color-danger *,
.fi-modal-window:not(:has(form)) .fi-modal-footer-actions button.fi-color-danger *,
.fi-modal-window:not(:has(form)) .fi-modal-footer .fi-btn.fi-color-danger *,
.fi-modal-window:not(:has(form)) .fi-btn.fi-color-danger:not(.fi-outlined) * {
    color: #ffffff !important;
    fill: currentColor !important;
}

/* Dark Mode */
html.dark .fi-modal-window:not(:has(form)),
.dark .fi-modal-window:not(:has(form)) {
    background: #18181b !important;
    border-color: #27272a !important;
}
html.dark .fi-modal-window:not(:has(form)) .fi-modal-heading,
.dark .fi-modal-window:not(:has(form)) .fi-modal-heading {
    color: #f4f4f5 !important;
}
html.dark .fi-modal-window:not(:has(form)) .fi-modal-description,
.dark .fi-modal-window:not(:has(form)) .fi-modal-description {
    color: #a1a1aa !important;
}
html.dark .fi-modal-window:not(:has(form)) .fi-modal-footer,
.dark .fi-modal-window:not(:has(form)) .fi-modal-footer {
    background: #18181b !important;
    border-top-color: #27272a !important;
}
html.dark .fi-modal-window:not(:has(form)) .fi-modal-footer-actions .fi-btn:not(.fi-color-danger),
html.dark .fi-modal-window:not(:has(form)) .fi-modal-footer .fi-btn:not(.fi-color-danger),
.dark .fi-modal-window:not(:has(form)) .fi-modal-footer-actions .fi-btn:not(.fi-color-danger),
.dark .fi-modal-window:not(:has(form)) .fi-modal-footer .fi-btn:not(.fi-color-danger) {
    background: #27272a !important;
    color: #e4e4e7 !important;
    border-color: #3f3f46 !important;
}
html.dark .fi-modal-window:not(:has(form)) .fi-modal-footer-actions .fi-btn:not(.fi-color-danger):hover,
html.dark .fi-modal-window:not(:has(form)) .fi-modal-footer .fi-btn:not(.fi-color-danger):hover,
.dark .fi-modal-window:not(:has(form)) .fi-modal-footer-actions .fi-btn:not(.fi-color-danger):hover,
.dark .fi-modal-window:not(:has(form)) .fi-modal-footer .fi-btn:not(.fi-color-danger):hover {
    background: #3f3f46 !important;
    border-color: #52525b !important;
    color: #ffffff !important;
}
html.dark .fi-modal-window:not(:has(form)) .fi-modal-footer-actions .fi-btn:not(.fi-color-danger) *,
html.dark .fi-modal-window:not(:has(form)) .fi-modal-footer .fi-btn:not(.fi-color-danger) *,
.dark .fi-modal-window:not(:has(form)) .fi-modal-footer-actions .fi-btn:not(.fi-color-danger) *,
.dark .fi-modal-window:not(:has(form)) .fi-modal-footer .fi-btn:not(.fi-color-danger) * {
    color: #e4e4e7 !important;
}
html.dark .fi-modal-window:not(:has(form)) .fi-modal-footer-actions .fi-btn:not(.fi-color-danger):hover *,
html.dark .fi-modal-window:not(:has(form)) .fi-modal-footer .fi-btn:not(.fi-color-danger):hover *,
.dark .fi-modal-window:not(:has(form)) .fi-modal-footer-actions .fi-btn:not(.fi-color-danger):hover *,
.dark .fi-modal-window:not(:has(form)) .fi-modal-footer .fi-btn:not(.fi-color-danger):hover * {
    color: #ffffff !important;
}
</style>
