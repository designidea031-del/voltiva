@php
    $post = $this->record ?? null;
    $title = $post?->title ?? 'this article';
@endphp

<div x-data="{ showModal: false, deleting: false }"
     class="fi-section"
     style="background: rgba(239, 68, 68, 0.04); border: 1.5px solid rgba(239, 68, 68, 0.22); border-radius: 14px; overflow: hidden; margin-top: 14px; padding: 14px 16px; font-family: 'Figtree', system-ui, -apple-system, sans-serif;">

    {{-- Danger Zone Card Header --}}
    <div style="display: flex; align-items: center; gap: 7px; margin-bottom: 6px;">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
            <line x1="12" y1="9" x2="12" y2="13"/>
            <line x1="12" y1="17" x2="12.01" y2="17"/>
        </svg>
        <span style="font-size: 12px; font-weight: 700; color: #ef4444; letter-spacing: 0.02em;">
            Danger Zone
        </span>
    </div>

    <p style="font-size: 11.5px; color: #71717a; margin: 0 0 12px; line-height: 1.45;">
        Permanently delete this article and all its associated data. This action <strong>cannot be undone</strong>.
    </p>

    {{-- Delete Trigger Button --}}
    <button type="button"
        @click="showModal = true"
        style="display: inline-flex; align-items: center; gap: 7px; padding: 9px 16px; border-radius: 9px; font-size: 12px; font-weight: 600; background-color: #ef4444 !important; color: #ffffff !important; border: 1px solid #dc2626 !important; cursor: pointer; box-shadow: 0 2px 8px rgba(239,68,68,.3); font-family: 'Figtree', system-ui, -apple-system, sans-serif; transition: all .15s ease;"
        onmouseover="this.style.backgroundColor='#dc2626'; this.style.transform='translateY(-1px)';"
        onmouseout="this.style.backgroundColor='#ef4444'; this.style.transform='none';">
        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="3 6 5 6 21 6"/>
            <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
            <path d="M10 11v6"/>
            <path d="M14 11v6"/>
            <path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2"/>
        </svg>
        <span style="color: #ffffff !important;">Delete This Article</span>
    </button>

    {{-- Premium Delete Confirmation Modal (Teleported to Body) --}}
    <template x-teleport="body">
        <div
            x-show="showModal"
            x-cloak
            @keydown.escape.window="if (!deleting) showModal = false"
            style="position: fixed; inset: 0; z-index: 100000; display: flex; align-items: center; justify-content: center; padding: 20px; font-family: 'Figtree', system-ui, -apple-system, sans-serif;"
            role="dialog"
            aria-modal="true"
            aria-labelledby="confirm-modal-title"
        >
            {{-- Dark Blur Backdrop --}}
            <div
                x-show="showModal"
                x-transition:enter="ease-out duration-200"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="ease-in duration-150"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click="if (!deleting) showModal = false"
                style="position: fixed; inset: 0; background: rgba(9, 9, 11, 0.72); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);"
            ></div>

            {{-- Modal Card --}}
            <div
                x-show="showModal"
                x-transition:enter="ease-out duration-220 cubic-bezier(0.16, 1, 0.3, 1)"
                x-transition:enter-start="opacity-0 scale-90 translate-y-3"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-90 translate-y-3"
                style="position: relative; width: 100%; max-width: 440px; background: #ffffff; border-radius: 26px; border: 1px solid rgba(0, 0, 0, 0.08); box-shadow: 0 24px 64px -12px rgba(0, 0, 0, 0.35), 0 0 0 1px rgba(0, 0, 0, 0.04); overflow: hidden; z-index: 100001; box-sizing: border-box;"
                @click.stop
            >
                {{-- Close ✕ button --}}
                <button
                    type="button"
                    @click="showModal = false"
                    :disabled="deleting"
                    style="position: absolute; top: 18px; right: 18px; width: 32px; height: 32px; border-radius: 9px; border: 1px solid #e4e4e7; background: #f4f4f5; color: #71717a; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.15s ease;"
                    onmouseover="this.style.background='#e4e4e7'; this.style.color='#18181b';"
                    onmouseout="this.style.background='#f4f4f5'; this.style.color='#71717a';"
                    title="Close modal"
                >
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>

                <div style="padding: 34px 28px 28px; text-align: center;">
                    {{-- Warning Tag --}}
                    <div>
                        <span style="display: inline-flex; align-items: center; gap: 5px; padding: 4px 12px; border-radius: 999px; font-size: 11px; font-weight: 800; background: rgba(239, 68, 68, 0.09); color: #ef4444; text-transform: uppercase; letter-spacing: 0.06em; margin-bottom: 14px;">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                                <line x1="12" y1="9" x2="12" y2="13"/>
                                <line x1="12" y1="17" x2="12.01" y2="17"/>
                            </svg>
                            Permanent Action
                        </span>
                    </div>

                    {{-- Icon Badge --}}
                    <div style="width: 62px; height: 62px; border-radius: 20px; background: rgba(239, 68, 68, 0.08); border: 1.5px solid rgba(239, 68, 68, 0.22); display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; box-shadow: 0 8px 24px -4px rgba(239, 68, 68, 0.2);">
                        <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="3 6 5 6 21 6"/>
                            <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
                            <path d="M10 11v6"/>
                            <path d="M14 11v6"/>
                            <path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2"/>
                        </svg>
                    </div>

                    {{-- Title --}}
                    <h3 id="confirm-modal-title" style="font-size: 20px; font-weight: 900; color: #18181b; margin: 0 0 8px; letter-spacing: -0.02em;">
                        Delete Article?
                    </h3>

                    {{-- Description --}}
                    <p style="font-size: 13.5px; color: #71717a; line-height: 1.6; margin: 0 0 20px;">
                        Are you sure you want to permanently delete this article? This action <strong style="color: #ef4444;">cannot be undone</strong>.
                    </p>

                    {{-- Preview Box --}}
                    <div style="background: #f9fafb; border: 1px solid #e4e4e7; border-radius: 14px; padding: 12px 14px; text-align: left; margin-bottom: 22px;">
                        <div style="display: flex; align-items: flex-start; gap: 10px;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#a1a1aa" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0; margin-top: 2px;">
                                <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                                <polyline points="14 2 14 8 20 8"/>
                                <line x1="16" y1="13" x2="8" y2="13"/>
                                <line x1="16" y1="17" x2="8" y2="17"/>
                                <polyline points="10 9 9 9 8 9"/>
                            </svg>
                            <div style="text-align: left;">
                                <div style="font-size: 13px; font-weight: 700; color: #18181b; line-height: 1.45; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                    {{ $title }}
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div style="display: flex; align-items: center; gap: 10px;">
                        {{-- Cancel Button --}}
                        <button
                            type="button"
                            @click="showModal = false"
                            :disabled="deleting"
                            style="flex: 1; padding: 12px 18px; border-radius: 12px; font-size: 13.5px; font-weight: 700; background: #f4f4f5; color: #3f3f46; border: 1.5px solid #e4e4e7; cursor: pointer; transition: all 0.15s ease; font-family: inherit; text-align: center;"
                            onmouseover="this.style.background='#e4e4e7'; this.style.color='#18181b';"
                            onmouseout="this.style.background='#f4f4f5'; this.style.color='#3f3f46';"
                        >
                            Cancel
                        </button>

                        {{-- Yes, Delete Permanently Button --}}
                        <button
                            type="button"
                            @click="deleting = true; @this.call('delete')"
                            :disabled="deleting"
                            style="flex: 1.25; padding: 12px 20px; border-radius: 12px; font-size: 13.5px; font-weight: 700; background: #ef4444 !important; color: #ffffff !important; border: none !important; cursor: pointer; box-shadow: 0 4px 16px rgba(239, 68, 68, 0.35); display: flex; align-items: center; justify-content: center; gap: 7px; transition: all 0.15s ease; font-family: inherit;"
                            onmouseover="this.style.background='#dc2626 !important'; this.style.transform='translateY(-1px)';"
                            onmouseout="this.style.background='#ef4444 !important'; this.style.transform='none';"
                        >
                            {{-- Idle state (visible when NOT deleting) --}}
                            <span x-show="!deleting" style="display: inline-flex; align-items: center; gap: 7px; color: #ffffff !important;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="3 6 5 6 21 6"/>
                                    <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
                                </svg>
                                <span>Yes, Delete Permanently</span>
                            </span>

                            {{-- Loading state (strictly hidden when NOT deleting) --}}
                            <span x-show="deleting" x-cloak style="display: none;" :style="deleting ? 'display: inline-flex; align-items: center; gap: 6px; color: #ffffff !important;' : 'display: none;'">
                                <svg style="animation: spin 1s linear infinite;" width="14" height="14" viewBox="0 0 24 24" fill="none">
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
    </template>
</div>
