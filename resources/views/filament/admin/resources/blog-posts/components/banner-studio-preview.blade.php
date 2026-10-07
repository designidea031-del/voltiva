@php
    $post = $this->record ?? null;
    $title = $post?->title ?? 'The Future of Smart Modular Switches in Architecture';
    $bannerImg = null;
    if ($post?->banner_image) {
        $bannerImg = url('/storage/' . ltrim($post->banner_image, '/'));
    } elseif (file_exists(public_path('assets/images/bg/pheader-bg.webp'))) {
        $bannerImg = asset('assets/images/bg/pheader-bg.webp');
    } else {
        $bannerImg = 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=1920&auto=format&fit=crop';
    }
@endphp

<div style="margin-bottom: 16px; border: 1.5px solid #e4e4e7; border-radius: 14px; overflow: hidden; background: #09090b; font-family: 'Figtree', system-ui, -apple-system, sans-serif;">
    {{-- Banner Live Canvas --}}
    <div id="bep-banner-canvas" style="position: relative; width: 100%; aspect-ratio: 21/7; min-height: 190px; max-height: 260px; overflow: hidden; display: flex; flex-direction: column; justify-content: flex-end; padding: 24px 30px; background: #18181b;">
        {{-- Background Image --}}
        <img id="bep-banner-img" src="{{ $bannerImg }}" alt="Hero Banner"
            style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: center; transition: all .3s ease;"
            onerror="this.src='https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=1920&auto=format&fit=crop';">

        {{-- Gradient Overlay --}}
        <div id="bep-banner-overlay" style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.55) 60%, rgba(0,0,0,0.85) 100%); pointer-events: none; transition: background .2s ease;"></div>

        {{-- Live Website Watermark Pill --}}
        <div style="position: absolute; top: 14px; right: 16px; display: inline-flex; align-items: center; gap: 6px; padding: 4px 10px; border-radius: 999px; background: rgba(0,0,0,0.65); backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.18); color: #ffffff; font-size: 10.5px; font-weight: 700; letter-spacing: 0.04em;">
            <span style="width: 6px; height: 6px; border-radius: 50%; background: #10b981; box-shadow: 0 0 8px #10b981;"></span>
            LIVE STUDIO PREVIEW
        </div>

        {{-- Content On Banner --}}
        <div style="position: relative; z-index: 2; max-width: 780px;">
            {{-- Breadcrumbs on banner --}}
            <div style="display: flex; align-items: center; gap: 6px; font-size: 11.5px; font-weight: 600; color: rgba(255,255,255,0.85); margin-bottom: 8px; text-shadow: 0 1px 3px rgba(0,0,0,0.8);">
                <span>Home</span>
                <span style="opacity: 0.6;">›</span>
                <span>Blog Articles</span>
                <span style="opacity: 0.6;">›</span>
                <span style="color: #ffffff; font-weight: 700; text-decoration: underline; text-underline-offset: 3px;">Architecture</span>
            </div>

            {{-- Title on banner --}}
            <h2 id="bep-banner-title" style="font-size: clamp(16px, 2.2vw, 24px); font-weight: 900; color: #ffffff; margin: 0 0 8px; line-height: 1.25; letter-spacing: -0.02em; text-shadow: 0 2px 10px rgba(0,0,0,0.9);">
                {{ $title }}
            </h2>

            {{-- Sub-bar info --}}
            <div style="display: flex; align-items: center; gap: 12px; font-size: 11px; font-weight: 600; color: rgba(255,255,255,0.85); text-shadow: 0 1px 4px rgba(0,0,0,0.8);">
                <span>Voltiva Engineering</span>
                <span>•</span>
                <span>27 Sep 2026</span>
                <span>•</span>
                <span>5 Min Read</span>
            </div>
        </div>
    </div>

    {{-- Studio Control Bar Underneath --}}
    <div style="background: #f8fafc; border-top: 1px solid #e2e8f0; padding: 12px 16px; display: grid; grid-template-columns: 1fr 1fr; gap: 14px; align-items: center;">
        <div>
            <div style="font-size: 10.5px; font-weight: 800; color: #18181b; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 6px;">
                Banner Focus Alignment
            </div>
            <div style="display: flex; gap: 6px;">
                <button type="button" onclick="bepSetFocus('top')" id="bep-btn-top"
                    style="padding: 5px 12px; border-radius: 8px; font-size: 11px; font-weight: 700; border: 1.5px solid #cbd5e1; background: #ffffff; color: #18181b; cursor: pointer; transition: all .15s;">
                    TOP
                </button>
                <button type="button" onclick="bepSetFocus('center')" id="bep-btn-center"
                    style="padding: 5px 12px; border-radius: 8px; font-size: 11px; font-weight: 700; border: 1.5px solid #18181b; background: #18181b; color: #ffffff; cursor: pointer; transition: all .15s;">
                    CENTER
                </button>
                <button type="button" onclick="bepSetFocus('bottom')" id="bep-btn-bottom"
                    style="padding: 5px 12px; border-radius: 8px; font-size: 11px; font-weight: 700; border: 1.5px solid #cbd5e1; background: #ffffff; color: #18181b; cursor: pointer; transition: all .15s;">
                    BOTTOM
                </button>
            </div>
        </div>

        <div>
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 6px;">
                <span style="font-size: 10.5px; font-weight: 800; color: #18181b; text-transform: uppercase; letter-spacing: 0.05em;">Dark Overlay Opacity</span>
                <span id="bep-overlay-val" style="font-size: 11px; font-weight: 800; color: #18181b;">55%</span>
            </div>
            <input type="range" min="10" max="90" value="55" id="bep-overlay-range"
                oninput="bepSetOverlay(this.value)"
                style="width: 100%; accent-color: #18181b; cursor: pointer;">
        </div>
    </div>
</div>

<script>
function bepSetFocus(pos) {
    const img = document.getElementById('bep-banner-img');
    if (img) img.style.objectPosition = pos;
    ['top', 'center', 'bottom'].forEach(p => {
        const btn = document.getElementById('bep-btn-' + p);
        if (btn) {
            if (p === pos) {
                btn.style.background = '#18181b';
                btn.style.color = '#ffffff';
                btn.style.borderColor = '#18181b';
            } else {
                btn.style.background = '#ffffff';
                btn.style.color = '#18181b';
                btn.style.borderColor = '#cbd5e1';
            }
        }
    });
}
function bepSetOverlay(val) {
    const overlay = document.getElementById('bep-banner-overlay');
    const label = document.getElementById('bep-overlay-val');
    if (label) label.textContent = val + '%';
    const dec = (val / 100).toFixed(2);
    if (overlay) {
        overlay.style.background = `linear-gradient(180deg, rgba(0,0,0,0.2) 0%, rgba(0,0,0,${dec}) 60%, rgba(0,0,0,0.85) 100%)`;
    }
}
</script>
