@php
    $post      = $this->record ?? null;
    $title     = $post?->title ?? '';
    $slug      = $post?->slug ?? '';
    $metaTitle = $post?->meta_title ?? '';
    $metaDesc  = $post?->meta_description ?? '';
    $content   = $post?->content ?? '';
    $image     = $post?->image ?? '';
    $imageAlt  = $post?->image_alt ?? '';

    $titleLen  = mb_strlen($title);
    $descLen   = mb_strlen($metaDesc);
    $wordCount = str_word_count(strip_tags($content));

    $checks = [
        ['ok' => $titleLen >= 30 && $titleLen <= 75,   'label' => 'SEO title length (30–75)',    'val' => $titleLen . ' chars'],
        ['ok' => $descLen >= 110 && $descLen <= 165,   'label' => 'Meta description (110–165)',  'val' => $descLen . ' chars'],
        ['ok' => !empty($slug),                         'label' => 'URL slug defined',           'val' => !empty($slug) ? '✓' : '✗'],
        ['ok' => !empty($metaTitle),                   'label' => 'Meta title filled',          'val' => !empty($metaTitle) ? '✓' : '✗'],
        ['ok' => !empty($image),                       'label' => 'Featured image added',       'val' => !empty($image) ? '✓' : '✗'],
        ['ok' => !empty($imageAlt),                    'label' => 'Image alt text set',        'val' => !empty($imageAlt) ? '✓' : '✗'],
        ['ok' => $wordCount >= 200,                    'label' => 'Content length 200+ words',  'val' => $wordCount . ' words'],
    ];

    $score = $post?->seo_score ?? 0;
    if ($score === 0) {
        $passed = count(array_filter($checks, fn($c) => $c['ok']));
        $score = round(($passed / 7) * 100);
    }

    $seoCls    = $score >= 80 ? '#10b981' : ($score >= 55 ? '#f59e0b' : '#ef4444');
    $seoLabel  = $score >= 80 ? 'Great' : ($score >= 55 ? 'Fair' : 'Needs Work');
    $circ      = 175.93;  // 2π × 28
    $dash      = round($circ * ($score / 100), 2);
@endphp

<div class="fi-section" style="background:#fff; border: 1.5px solid #e4e4e7; border-radius: 14px; box-shadow: 0 1px 4px rgba(0,0,0,.04); overflow: hidden; margin-top: 14px; margin-bottom: 14px; font-family: 'Figtree', system-ui, -apple-system, sans-serif;">
    {{-- Card Header --}}
    <div style="display:flex; align-items:center; justify-content:space-between; padding: 12px 16px; background:#fafafa; border-bottom: 1px solid #f0f0f0;">
        <div style="display:flex; align-items:center; gap: 8px;">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#18181b" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 12h-4l-3 9L9 3l-3 9H2"/>
            </svg>
            <span style="font-size: 12px; font-weight: 800; color: #18181b; text-transform: uppercase; letter-spacing: 0.05em;">
                SEO HEALTH SCORE
            </span>
        </div>
        <span style="font-size: 11px; font-weight: 700; color: #71717a; text-decoration: underline; text-underline-offset: 2px; cursor: pointer;">Full detail</span>
    </div>

    {{-- Card Body --}}
    <div style="padding: 16px;">
        {{-- Gauge + Summary --}}
        <div style="display:flex; align-items:center; gap: 14px; margin-bottom: 14px;">
            <div style="position:relative; width: 68px; height: 68px; flex-shrink: 0;">
                <svg width="68" height="68" viewBox="0 0 72 72" style="transform: rotate(-90deg);">
                    <circle cx="36" cy="36" r="28" fill="none" stroke="#f4f4f5" stroke-width="6"/>
                    <circle cx="36" cy="36" r="28" fill="none" stroke="{{ $seoCls }}" stroke-width="6"
                        stroke-linecap="round" stroke-dasharray="{{ $dash }} {{ $circ }}"/>
                </svg>
                <div style="position:absolute; inset:0; display:flex; flex-direction:column; align-items:center; justify-content:center;">
                    <span style="font-size: 16px; font-weight: 900; line-height: 1; color: {{ $seoCls }};">{{ $score }}</span>
                    <span style="font-size: 9px; font-weight: 700; color: #a1a1aa;">/100</span>
                </div>
            </div>
            <div>
                <h4 style="font-size: 13.5px; font-weight: 800; color: #18181b; margin: 0 0 3px;">{{ $seoLabel }}</h4>
                <p style="font-size: 11px; color: #71717a; margin: 0 0 5px; line-height: 1.4;">SEO health for this article. Improve checks below to boost ranking.</p>
                @if($score >= 80)
                <span style="display:inline-flex; align-items:center; gap: 4px; font-size: 11px; font-weight: 800; color: #059669;">
                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="3"><polyline points="20 6 9 17 4 12"/></svg>
                    Well Optimized!
                </span>
                @endif
            </div>
        </div>

        {{-- Checklist --}}
        <div style="display:flex; flex-direction:column; gap: 6px;">
            @foreach($checks as $chk)
            <div style="display:flex; align-items:center; justify-content:space-between; font-size: 11.5px; padding: 5px 9px; border-radius: 8px; border: 1px solid {{ $chk['ok'] ? 'rgba(16,185,129,.2)' : 'rgba(239,68,68,.18)' }}; background: {{ $chk['ok'] ? 'rgba(16,185,129,.04)' : 'rgba(239,68,68,.03)' }}; color: {{ $chk['ok'] ? '#065f46' : '#991b1b' }};">
                <div style="display:flex; align-items:center; gap: 6px;">
                    <span style="width: 6px; height: 6px; border-radius: 50%; background: {{ $chk['ok'] ? '#10b981' : '#ef4444' }}; flex-shrink: 0;"></span>
                    <span style="font-weight: 600;">{{ $chk['label'] }}</span>
                </div>
                <span style="font-weight: 800; font-size: 11px; opacity: .85;">{{ $chk['val'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>
