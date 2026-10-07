@props([
    'paginator',
    'pageName' => 'page',
    'options' => [10, 12, 20, 50],
])

@php
    $currentPage = $paginator->currentPage();
    $lastPage = $paginator->lastPage();
    $total = $paginator->total();
    $firstItem = $paginator->firstItem() ?? 0;
    $lastItem = $paginator->lastItem() ?? 0;

    // Window calculation for page numbers
    $elements = [];
    if ($lastPage <= 7) {
        for ($i = 1; $i <= $lastPage; $i++) {
            $elements[] = $i;
        }
    } else {
        $elements[] = 1;
        if ($currentPage <= 3) {
            $elements[] = 2;
            $elements[] = 3;
            $elements[] = 4;
            $elements[] = '...';
            $elements[] = $lastPage;
        } elseif ($currentPage >= $lastPage - 2) {
            $elements[] = '...';
            $elements[] = $lastPage - 3;
            $elements[] = $lastPage - 2;
            $elements[] = $lastPage - 1;
            $elements[] = $lastPage;
        } else {
            $elements[] = '...';
            $elements[] = $currentPage - 1;
            $elements[] = $currentPage;
            $elements[] = $currentPage + 1;
            $elements[] = '...';
            $elements[] = $lastPage;
        }
    }
@endphp

@if($total > 0)
<div class="custom-voltiva-pagination">
    {{-- Left: Record counts & Per Page selector --}}
    <div class="pg-info-group">
        <div class="pg-count-text">
            Showing <span class="pg-number-highlight">{{ $firstItem }}</span> to <span class="pg-number-highlight">{{ $lastItem }}</span> of <span class="pg-number-highlight">{{ $total }}</span> results
        </div>

        <div class="pg-per-page-box" x-data="{ open: false }">
            <span class="pg-per-page-label">Per page:</span>
            <div class="pg-dropdown-wrapper" @click.outside="open = false">
                <button type="button" @click="open = !open" class="pg-dropdown-trigger" :class="{ 'pg-trigger-open': open }">
                    <span>{{ $paginator->perPage() }}</span>
                    <svg class="pg-dropdown-chevron" :class="{ 'pg-chevron-rotated': open }" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </button>

                <div x-show="open" 
                     x-transition:enter="pg-pop-enter"
                     x-transition:enter-start="pg-pop-enter-start"
                     x-transition:enter-end="pg-pop-enter-end"
                     x-transition:leave="pg-pop-leave"
                     class="pg-dropdown-drawer" 
                     style="display: none;">
                    <div class="pg-drawer-header">Rows per page</div>
                    @foreach($options as $opt)
                        <button type="button" 
                                wire:click="$set('perPage', {{ $opt }})" 
                                @click="open = false" 
                                class="pg-drawer-item {{ $paginator->perPage() == $opt ? 'pg-drawer-item-active' : '' }}">
                            <span>{{ $opt }}</span>
                            @if($paginator->perPage() == $opt)
                                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12"></polyline>
                                </svg>
                            @endif
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    {{-- Right: Pagination Buttons --}}
    @if($lastPage > 1)
        <div class="pg-controls">
            {{-- Previous Page Button --}}
            @if($paginator->onFirstPage())
                <button type="button" class="pg-nav-btn pg-disabled" disabled aria-disabled="true">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                    <span>Previous</span>
                </button>
            @else
                <button type="button" wire:click="previousPage('{{ $pageName }}')" class="pg-nav-btn">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                    <span>Previous</span>
                </button>
            @endif

            {{-- Numbered Page Buttons --}}
            <div class="pg-numbers-list">
                @foreach($elements as $el)
                    @if($el === '...')
                        <span class="pg-ellipsis">…</span>
                    @elseif($el == $currentPage)
                        <button type="button" class="pg-num-btn pg-num-active" aria-current="page">
                            {{ $el }}
                        </button>
                    @else
                        <button type="button" wire:click="gotoPage({{ $el }}, '{{ $pageName }}')" class="pg-num-btn">
                            {{ $el }}
                        </button>
                    @endif
                @endforeach
            </div>

            {{-- Next Page Button --}}
            @if($paginator->hasMorePages())
                <button type="button" wire:click="nextPage('{{ $pageName }}')" class="pg-nav-btn">
                    <span>Next</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            @else
                <button type="button" class="pg-nav-btn pg-disabled" disabled aria-disabled="true">
                    <span>Next</span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
            @endif
        </div>
    @endif
</div>
@endif
