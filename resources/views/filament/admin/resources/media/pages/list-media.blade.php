<x-filament-panels::page>

@php $mediaFiles = $this->getMedia(); @endphp

{{-- ══════════════════════════════════════════════════════════════ --}}
{{-- DRAG & DROP UPLOAD ZONE                                       --}}
{{-- ══════════════════════════════════════════════════════════════ --}}
@if($showUploadArea)
<div
    x-data="{
        dragging: false,
        handleDrop(e) {
            this.dragging = false;
            const input = document.getElementById('media-file-input');
            if (input && e.dataTransfer.files.length) {
                const dt = new DataTransfer();
                Array.from(e.dataTransfer.files).forEach(f => dt.items.add(f));
                input.files = dt.files;
                input.dispatchEvent(new Event('change', { bubbles: true }));
            }
        }
    }"
    x-on:dragover.prevent="dragging = true"
    x-on:dragleave.prevent="dragging = false"
    x-on:drop.prevent="handleDrop($event)"
    :class="dragging ? 'border-black dark:border-white bg-[#f8f9fa] dark:bg-[#27272a] scale-[1.01]' : 'border-[#b7b7b7] dark:border-[#3f3f46] bg-white dark:bg-[#18181b]'"
    wire:loading.class="opacity-60 pointer-events-none"
    class="mb-6 rounded-2xl border-2 border-dashed p-8 sm:p-10 text-center transition-all duration-200 shadow-xs"
>
    <div class="mx-auto mb-4 flex h-16 w-16 sm:h-20 sm:w-20 items-center justify-center rounded-2xl bg-[#f4f4f5] dark:bg-[#27272a]">
        <x-heroicon-o-cloud-arrow-up class="h-8 w-8 sm:h-10 sm:w-10 text-[#000000] dark:text-white"/>
    </div>

    <h3 class="mb-1 text-lg sm:text-xl font-bold text-[#000000] dark:text-white">
        Drop files here or <label for="media-file-input" class="cursor-pointer text-[#000000] dark:text-white underline underline-offset-4 font-extrabold hover:text-[#525252]">browse</label>
    </h3>
    <p class="mb-6 text-xs sm:text-sm text-[#8c8c8c] dark:text-[#a1a1aa]">
        Supports: <span class="font-medium text-[#525252] dark:text-[#d4d4d8]">JPEG, PNG, GIF, WebP, SVG, MP4, PDF</span> — max <span class="font-bold">20 MB</span> per file
    </p>

    <input
        type="file"
        multiple
        wire:model="newFiles"
        id="media-file-input"
        class="sr-only"
        accept="image/*,video/mp4,application/pdf,.svg"
    />

    @if(count($newFiles) > 0)
    <div class="mb-5 flex flex-wrap items-center justify-center gap-3">
        <span class="inline-flex items-center gap-2 rounded-xl bg-emerald-500/10 border border-emerald-500/20 px-4 py-2 text-sm font-semibold text-emerald-700 dark:text-emerald-300">
            <x-heroicon-o-check-circle class="h-4 w-4"/>
            {{ count($newFiles) }} file(s) ready to upload
        </span>
    </div>

    <div class="flex items-center justify-center gap-3">
        <button
            wire:click="uploadFiles"
            wire:loading.attr="disabled"
            wire:target="uploadFiles"
            type="button"
            class="inline-flex items-center gap-2 rounded-xl bg-black hover:bg-[#525252] dark:bg-white dark:text-black dark:hover:bg-[#e4e4e7] disabled:opacity-60 px-6 py-2.5 text-xs sm:text-sm font-bold text-white shadow-md transition-all"
        >
            <x-heroicon-o-arrow-up-tray class="h-4 w-4"/>
            <span wire:loading.remove wire:target="uploadFiles">Upload {{ count($newFiles) }} File(s)</span>
            <span wire:loading wire:target="uploadFiles">Uploading…</span>
        </button>
        <button
            type="button"
            wire:click="$set('newFiles', [])"
            class="inline-flex items-center gap-2 rounded-xl border border-[#e8e8e8] dark:border-[#3f3f46] bg-white dark:bg-[#18181b] px-4 py-2.5 text-xs sm:text-sm font-semibold text-[#525252] dark:text-[#d4d4d8] hover:bg-[#f4f4f5] dark:hover:bg-[#27272a] transition-colors"
        >
            <x-heroicon-o-x-mark class="h-4 w-4"/>
            Clear
        </button>
    </div>
    @else
    <div wire:loading wire:target="newFiles" class="flex items-center justify-center gap-2 text-sm text-[#000000] dark:text-white font-semibold">
        Preparing files…
    </div>
    <label
        for="media-file-input"
        class="inline-flex cursor-pointer items-center gap-2 rounded-xl border border-[#b7b7b7] dark:border-[#3f3f46] bg-white dark:bg-[#18181b] px-6 py-2.5 text-xs sm:text-sm font-bold text-[#000000] dark:text-white hover:bg-[#f4f4f5] dark:hover:bg-[#27272a] transition-all"
    >
        <x-heroicon-o-folder-open class="h-4 w-4"/>
        Choose Files
    </label>
    @endif
</div>
@endif

{{-- ══════════════════════════════════════════════════════════════ --}}
{{-- TOOLBAR                                                       --}}
{{-- ══════════════════════════════════════════════════════════════ --}}
<div class="mb-5 space-y-3">
    <div class="flex flex-wrap items-center gap-3">
        {{-- Search --}}
        <div class="relative flex-1 min-w-[200px] max-w-sm">
            <div class="pointer-events-none absolute inset-y-0 left-3.5 flex items-center">
                <x-heroicon-o-magnifying-glass class="h-4 w-4 text-[#8c8c8c]"/>
            </div>
            <input
                type="search"
                placeholder="Search files…"
                wire:model.live.debounce.300ms="search"
                class="w-full rounded-full border border-[#e8e8e8] dark:border-[#27272a] bg-white dark:bg-[#18181b]
                       py-2 pl-10 pr-4 text-xs sm:text-sm text-[#000000] dark:text-white placeholder-[#8c8c8c]
                       shadow-xs focus:border-[#000000] dark:focus:border-white focus:outline-none focus:ring-2 focus:ring-black/10 dark:focus:ring-white/10 transition"
            />
        </div>

        {{-- Type Filter Pills --}}
        <div class="flex items-center rounded-xl border border-[#e8e8e8] dark:border-[#27272a] bg-white dark:bg-[#18181b] p-1 shadow-xs gap-0.5 overflow-x-auto max-w-full">
            @foreach([
                ['all',      'All',       'heroicon-o-squares-2x2'],
                ['image',    'Images',    'heroicon-o-photo'],
                ['video',    'Videos',    'heroicon-o-film'],
                ['document', 'Documents', 'heroicon-o-document'],
            ] as [$val, $label, $icon])
            <button
                type="button"
                wire:click="$set('filterType', '{{ $val }}')"
                @class([
                    'inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-xs font-bold transition-all duration-150 shrink-0',
                    'bg-[#000000] text-white dark:bg-white dark:text-black shadow-xs' => $filterType === $val,
                    'text-[#525252] dark:text-[#a1a1aa] hover:bg-[#f4f4f5] dark:hover:bg-[#27272a]' => $filterType !== $val,
                ])
            >
                <x-dynamic-component :component="$icon" class="h-3.5 w-3.5"/>
                {{ $label }}
            </button>
            @endforeach
        </div>

        {{-- Stats --}}
        <div class="ml-auto flex items-center gap-2 text-xs text-[#8c8c8c] dark:text-[#a1a1aa]">
            <x-heroicon-o-photo class="h-3.5 w-3.5"/>
            <span>
                <span class="font-bold text-[#000000] dark:text-white">{{ $mediaFiles->count() }}</span>
                file(s)
            </span>
        </div>
    </div>

    {{-- Bulk Actions bar --}}
    @if(count($selectedIds) > 0)
    <div class="flex items-center gap-3 rounded-xl border border-amber-500/20 bg-amber-500/10 px-4 py-2.5 flex-wrap">
        <span class="rounded-lg bg-amber-500/20 px-2.5 py-1 text-xs font-bold text-amber-800 dark:text-amber-200">
            {{ count($selectedIds) }} selected
        </span>
        <button
            type="button"
            wire:click="bulkDelete"
            wire:confirm="Delete {{ count($selectedIds) }} selected file(s)? This cannot be undone."
            class="inline-flex items-center gap-1.5 rounded-lg bg-rose-600 hover:bg-rose-700 px-3 py-1.5 text-xs font-bold text-white transition-colors shadow-xs"
        >
            <x-heroicon-o-trash class="h-3.5 w-3.5"/>
            Delete Selected
        </button>
        <button
            type="button"
            wire:click="selectAll"
            class="inline-flex items-center gap-1.5 rounded-lg border border-[#e8e8e8] dark:border-[#3f3f46] bg-white dark:bg-[#18181b] px-3 py-1.5 text-xs font-semibold text-[#525252] dark:text-[#d4d4d8] hover:bg-[#f4f4f5] dark:hover:bg-[#27272a] transition-colors"
        >
            <x-heroicon-o-check-circle class="h-3.5 w-3.5"/>
            Select All
        </button>
        <button
            type="button"
            wire:click="clearSelection"
            class="ml-auto inline-flex items-center gap-1.5 text-xs text-[#8c8c8c] hover:text-[#000000] dark:hover:text-white transition-colors"
        >
            <x-heroicon-o-x-mark class="h-3.5 w-3.5"/>
            Clear
        </button>
    </div>
    @endif
</div>

{{-- ══════════════════════════════════════════════════════════════ --}}
{{-- EMPTY STATE                                                   --}}
{{-- ══════════════════════════════════════════════════════════════ --}}
@if($mediaFiles->isEmpty())
<div class="flex flex-col items-center justify-center rounded-2xl border border-dashed border-[#e8e8e8] dark:border-[#27272a] bg-white dark:bg-[#18181b] py-24 px-4 text-center">
    <div class="relative mb-5">
        <div class="flex h-20 w-20 items-center justify-center rounded-3xl bg-[#f4f4f5] dark:bg-[#27272a]">
            @if($search)
                <x-heroicon-o-magnifying-glass class="h-10 w-10 text-[#8c8c8c]"/>
            @else
                <x-heroicon-o-photo class="h-10 w-10 text-[#8c8c8c]"/>
            @endif
        </div>
    </div>
    <h3 class="mb-1 text-lg sm:text-xl font-bold text-[#000000] dark:text-white">
        {{ $search ? "No results for \"$search\"" : 'Your media library is empty' }}
    </h3>
    <p class="mb-6 max-w-xs text-xs sm:text-sm text-[#8c8c8c] dark:text-[#a1a1aa]">
        {{ $search ? 'Try searching with a different keyword.' : 'Upload your first images or files to get started.' }}
    </p>
    @if(!$search)
    <button
        type="button"
        wire:click="$set('showUploadArea', true)"
        class="inline-flex items-center gap-2 rounded-xl bg-black hover:bg-[#525252] dark:bg-white dark:text-black dark:hover:bg-[#e4e4e7] px-5 py-2.5 text-xs sm:text-sm font-bold text-white shadow-md transition-all"
    >
        <x-heroicon-o-arrow-up-tray class="h-4 w-4"/>
        Upload Your First File
    </button>
    @else
    <button
        type="button"
        wire:click="$set('search', '')"
        class="inline-flex items-center gap-2 rounded-xl border border-[#e8e8e8] dark:border-[#3f3f46] bg-white dark:bg-[#18181b] px-4 py-2 text-xs sm:text-sm font-semibold text-[#525252] dark:text-[#d4d4d8] hover:bg-[#f4f4f5] dark:hover:bg-[#27272a] transition-colors"
    >
        <x-heroicon-o-x-mark class="h-4 w-4"/>
        Clear Search
    </button>
    @endif
</div>

{{-- ══════════════════════════════════════════════════════════════ --}}
{{-- MEDIA GRID                                                    --}}
{{-- ══════════════════════════════════════════════════════════════ --}}
@else
<div class="grid grid-cols-2 gap-3.5 sm:gap-4 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-6 2xl:grid-cols-7">
    @foreach($mediaFiles as $media)
    @php $isSelected = in_array($media->id, $selectedIds); @endphp
    <div
        x-data="{ copied: false }"
        @class([
            'group relative flex flex-col overflow-hidden rounded-2xl border transition-all duration-200 cursor-default shadow-xs hover:shadow-md bg-white dark:bg-[#18181b]',
            'border-black dark:border-white ring-2 ring-black/20 dark:ring-white/20' => $isSelected,
            'border-[#e8e8e8] dark:border-[#27272a] hover:border-[#b7b7b7] dark:hover:border-[#3f3f46]' => !$isSelected,
        ])
    >
        {{-- Checkbox --}}
        <button
            type="button"
            wire:click="toggleSelect({{ $media->id }})"
            @class([
                'absolute left-2.5 top-2.5 z-10 flex h-6 w-6 items-center justify-center rounded-lg border transition-all duration-150 shadow-xs',
                'border-black bg-black text-white dark:border-white dark:bg-white dark:text-black' => $isSelected,
                'border-white/80 bg-white/70 text-transparent opacity-0 group-hover:opacity-100 hover:border-black hover:bg-white dark:border-black/50 dark:bg-black/50' => !$isSelected,
            ])
        >
            @if($isSelected)
            <x-heroicon-o-check class="h-3.5 w-3.5"/>
            @endif
        </button>

        {{-- Thumbnail --}}
        <div class="relative aspect-square overflow-hidden bg-[#f4f4f5] dark:bg-[#27272a]">
            @if($media->isImage())
            <img
                src="{{ $media->url }}"
                alt="{{ $media->alt_text ?? $media->name }}"
                class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-105"
                loading="lazy"
            />
            @elseif(str_contains($media->mime_type, 'video'))
            <div class="flex h-full w-full flex-col items-center justify-center gap-2 bg-[#f4f4f5] dark:bg-[#27272a]">
                <x-heroicon-o-film class="h-10 w-10 text-[#525252] dark:text-[#a1a1aa]"/>
                <span class="text-[10px] font-bold uppercase tracking-wider text-[#525252] dark:text-[#a1a1aa]">Video</span>
            </div>
            @else
            <div class="flex h-full w-full flex-col items-center justify-center gap-2 bg-[#f4f4f5] dark:bg-[#27272a]">
                <x-heroicon-o-document class="h-10 w-10 text-[#525252] dark:text-[#a1a1aa]"/>
                <span class="text-[10px] font-bold uppercase tracking-wider text-[#525252] dark:text-[#a1a1aa]">{{ strtoupper(pathinfo($media->file_name, PATHINFO_EXTENSION)) }}</span>
            </div>
            @endif

            {{-- Extension badge --}}
            <span class="absolute right-2 top-2 rounded-md bg-black/60 backdrop-blur-xs px-1.5 py-0.5 text-[9px] font-bold uppercase tracking-wide text-white">
                {{ strtoupper(pathinfo($media->file_name, PATHINFO_EXTENSION)) }}
            </span>
        </div>

        {{-- File Info --}}
        <div class="flex flex-1 flex-col px-3 py-2.5">
            <p class="truncate text-xs font-bold text-[#000000] dark:text-white leading-snug" title="{{ $media->name }}">
                {{ $media->name }}
            </p>
            <div class="mt-1 flex items-center justify-between text-[11px] text-[#8c8c8c] dark:text-[#71717a]">
                <span>{{ $media->size_formatted }}</span>
                <span>{{ $media->created_at->diffForHumans(null, true) }}</span>
            </div>
        </div>

        {{-- Action Buttons (on hover) --}}
        <div class="absolute inset-0 flex flex-col items-center justify-center gap-2 bg-black/75 backdrop-blur-xs opacity-0 transition-opacity duration-200 group-hover:opacity-100 p-3">
            {{-- Copy URL --}}
            <button
                type="button"
                x-on:click="
                    navigator.clipboard.writeText('{{ $media->url }}');
                    copied = true;
                    setTimeout(() => copied = false, 2500);
                "
                class="inline-flex items-center gap-1.5 rounded-xl bg-white text-black px-3.5 py-1.5 text-xs font-bold shadow-md hover:bg-[#f4f4f5] transition-all w-32 justify-center"
            >
                <template x-if="!copied">
                    <span class="inline-flex items-center gap-1.5">
                        <x-heroicon-o-clipboard-document class="h-3.5 w-3.5 shrink-0"/>
                        Copy URL
                    </span>
                </template>
                <template x-if="copied">
                    <span class="inline-flex items-center gap-1.5 text-emerald-600">
                        <x-heroicon-o-check class="h-3.5 w-3.5 shrink-0"/>
                        Copied!
                    </span>
                </template>
            </button>

            {{-- View --}}
            <a
                href="{{ $media->url }}"
                target="_blank"
                class="inline-flex items-center gap-1.5 rounded-xl bg-white/20 hover:bg-white/30 text-white px-3.5 py-1.5 text-xs font-bold shadow-xs w-32 justify-center transition-all"
            >
                <x-heroicon-o-arrow-top-right-on-square class="h-3.5 w-3.5"/>
                Open File
            </a>

            {{-- Delete --}}
            <button
                type="button"
                wire:click="deleteMedia({{ $media->id }})"
                wire:confirm="Permanently delete '{{ addslashes($media->name) }}'?"
                class="inline-flex items-center gap-1.5 rounded-xl bg-rose-600 hover:bg-rose-700 text-white px-3.5 py-1.5 text-xs font-bold shadow-xs w-32 justify-center transition-all"
            >
                <x-heroicon-o-trash class="h-3.5 w-3.5"/>
                Delete
            </button>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-6 flex items-center justify-center">
    <span class="rounded-full bg-white dark:bg-[#18181b] border border-[#e8e8e8] dark:border-[#27272a] px-4 py-1.5 text-xs text-[#8c8c8c] dark:text-[#a1a1aa] font-medium shadow-xs">
        Showing {{ $mediaFiles->count() }} file(s)
        @if(count($selectedIds) > 0)
         · <span class="font-bold text-[#000000] dark:text-white">{{ count($selectedIds) }} selected</span>
        @endif
    </span>
</div>
@endif

</x-filament-panels::page>
