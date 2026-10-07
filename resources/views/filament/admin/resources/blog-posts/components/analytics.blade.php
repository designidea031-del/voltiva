@php
    $post      = $this->record ?? null;
    $views     = $post?->views ?? 0;
    $content   = $post?->content ?? '';
    $words     = str_word_count(strip_tags($content));
    $readTime  = $post?->read_time ?? (max(1, ceil($words / 200)) . ' min read');
@endphp

<div class="fi-section" style="background:#fff; border: 1.5px solid #e4e4e7; border-radius: 14px; box-shadow: 0 1px 4px rgba(0,0,0,.04); overflow: hidden; margin-top: 14px; margin-bottom: 14px; font-family: 'Figtree', system-ui, -apple-system, sans-serif;">
    {{-- Card Header --}}
    <div style="display:flex; align-items:center; gap: 8px; padding: 12px 16px; background:#fafafa; border-bottom: 1px solid #f0f0f0;">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="#18181b" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="18" y1="20" x2="18" y2="10"/>
            <line x1="12" y1="20" x2="12" y2="4"/>
            <line x1="6" y1="20" x2="6" y2="14"/>
        </svg>
        <span style="font-size: 12px; font-weight: 800; color: #18181b; text-transform: uppercase; letter-spacing: 0.05em;">
            ARTICLE ANALYTICS
        </span>
    </div>

    {{-- Card Body --}}
    <div style="padding: 14px;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 8px;">
            <div style="background: #f9fafb; border: 1px solid #f0f0f0; border-radius: 10px; padding: 10px; text-align: center;">
                <span style="font-size: 17px; font-weight: 900; color: #18181b; display: block; line-height: 1.2;">{{ number_format($views) }}</span>
                <span style="font-size: 9.5px; font-weight: 700; color: #a1a1aa; text-transform: uppercase; letter-spacing: 0.05em;">TOTAL VIEWS</span>
            </div>
            <div style="background: #f9fafb; border: 1px solid #f0f0f0; border-radius: 10px; padding: 10px; text-align: center;">
                <span style="font-size: 17px; font-weight: 900; color: #18181b; display: block; line-height: 1.2;">{{ number_format($words) }}</span>
                <span style="font-size: 9.5px; font-weight: 700; color: #a1a1aa; text-transform: uppercase; letter-spacing: 0.05em;">WORD COUNT</span>
            </div>
            <div style="grid-column: span 2; background: #f9fafb; border: 1px solid #f0f0f0; border-radius: 10px; padding: 10px; text-align: center;">
                <span style="font-size: 14px; font-weight: 900; color: #18181b; display: block; line-height: 1.2;">{{ $readTime }}</span>
                <span style="font-size: 9.5px; font-weight: 700; color: #a1a1aa; text-transform: uppercase; letter-spacing: 0.05em;">ESTIMATED READ TIME</span>
            </div>
        </div>
    </div>
</div>
