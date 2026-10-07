{{--
    Media Picker Modal — shown inside hintAction modals on Settings page.
    wire:click targets the parent Livewire component (ManageSettings).
--}}
@php
    $allMedia = \App\Models\MediaFile::latest()->get();
    $imageCount    = $allMedia->filter(fn($m) => $m->isImage())->count();
    $videoCount    = $allMedia->filter(fn($m) => str_contains($m->mime_type, 'video'))->count();
    $documentCount = $allMedia->filter(fn($m) => !$m->isImage() && !str_contains($m->mime_type, 'video'))->count();
@endphp

<div
    x-data="{
        search: '',
        tab: 'all',
        selected: null,
        matchesTab(mime) {
            if (this.tab === 'all') return true;
            if (this.tab === 'image') return mime.startsWith('image/');
            if (this.tab === 'video') return mime.startsWith('video/');
            return !mime.startsWith('image/') && !mime.startsWith('video/');
        },
        matchesSearch(name, fileName) {
            if (!this.search) return true;
            const q = this.search.toLowerCase();
            return name.toLowerCase().includes(q) || fileName.toLowerCase().includes(q);
        }
    }"
    class="flex flex-col"
    style="min-height: 500px;"
>
    {{-- ── Header ──────────────────────────────────────────── --}}
    <div class="mb-4 space-y-3">

        {{-- Search + badge row --}}
        <div class="flex items-center gap-3">
            <div class="relative flex-1">
                <div class="pointer-events-none absolute inset-y-0 left-3 flex items-center">
                    <x-heroicon-o-magnifying-glass class="h-4 w-4 text-gray-400"/>
                </div>
                <input
                    type="search"
                    x-model="search"
                    placeholder="Search by name…"
                    class="w-full rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700
                           py-2.5 pl-9 pr-4 text-sm text-gray-800 dark:text-gray-200 placeholder-gray-400
                           focus:border-primary-400 focus:outline-none focus:ring-2 focus:ring-primary-400/30 transition"
                    autofocus
                />
                <button
                    x-show="search"
                    x-on:click="search = ''"
                    class="absolute inset-y-0 right-3 flex items-center text-gray-400 hover:text-gray-600"
                    type="button"
                >
                    <x-heroicon-o-x-mark class="h-4 w-4"/>
                </button>
            </div>
            <span class="shrink-0 rounded-full bg-gray-100 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 px-3 py-1.5 text-xs font-semibold text-gray-600 dark:text-gray-300">
                {{ $allMedia->count() }} files
            </span>
        </div>

        {{-- Tab pills --}}
        <div class="flex items-center gap-1 rounded-xl border border-gray-200 dark:border-gray-600 bg-gray-50 dark:bg-gray-700/50 p-1">
            <button type="button" x-on:click="tab='all'"
                :class="tab==='all' ? 'bg-white dark:bg-gray-800 shadow text-gray-800 dark:text-gray-100 font-semibold' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200'"
                class="flex-1 rounded-lg px-3 py-1.5 text-xs transition-all flex items-center justify-center gap-1.5"
            >
                <x-heroicon-o-squares-2x2 class="h-3.5 w-3.5"/>
                All <span x-show="tab!=='all'" class="ml-0.5 text-gray-400">({{ $allMedia->count() }})</span>
            </button>
            <button type="button" x-on:click="tab='image'"
                :class="tab==='image' ? 'bg-white dark:bg-gray-800 shadow text-gray-800 dark:text-gray-100 font-semibold' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200'"
                class="flex-1 rounded-lg px-3 py-1.5 text-xs transition-all flex items-center justify-center gap-1.5"
            >
                <x-heroicon-o-photo class="h-3.5 w-3.5"/>
                Images <span class="opacity-60">({{ $imageCount }})</span>
            </button>
            <button type="button" x-on:click="tab='video'"
                :class="tab==='video' ? 'bg-white dark:bg-gray-800 shadow text-gray-800 dark:text-gray-100 font-semibold' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200'"
                class="flex-1 rounded-lg px-3 py-1.5 text-xs transition-all flex items-center justify-center gap-1.5"
            >
                <x-heroicon-o-film class="h-3.5 w-3.5"/>
                Videos <span class="opacity-60">({{ $videoCount }})</span>
            </button>
            <button type="button" x-on:click="tab='document'"
                :class="tab==='document' ? 'bg-white dark:bg-gray-800 shadow text-gray-800 dark:text-gray-100 font-semibold' : 'text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200'"
                class="flex-1 rounded-lg px-3 py-1.5 text-xs transition-all flex items-center justify-center gap-1.5"
            >
                <x-heroicon-o-document class="h-3.5 w-3.5"/>
                Docs <span class="opacity-60">({{ $documentCount }})</span>
            </button>
        </div>
    </div>

    {{-- ── Grid ────────────────────────────────────────────── --}}
    @if($allMedia->isEmpty())
    <div class="flex flex-1 flex-col items-center justify-center py-16 text-center">
        <div class="mb-4 flex h-20 w-20 items-center justify-center rounded-2xl bg-gray-100 dark:bg-gray-700 shadow-inner">
            <x-heroicon-o-photo class="h-10 w-10 text-gray-300 dark:text-gray-500"/>
        </div>
        <p class="mb-1 font-semibold text-gray-600 dark:text-gray-400">No media files yet</p>
        <p class="mb-4 text-sm text-gray-400 dark:text-gray-500">Upload files via the Media Library first</p>
        <a
            href="{{ route('filament.admin.resources.media-library.index') }}"
            target="_blank"
            class="inline-flex items-center gap-2 rounded-xl bg-primary-600 hover:bg-primary-700 px-5 py-2.5 text-xs font-semibold text-white shadow-md transition-all"
        >
            <x-heroicon-o-arrow-top-right-on-square class="h-3.5 w-3.5"/>
            Open Media Library
        </a>
    </div>
    @else
    <div class="flex-1 overflow-y-auto pr-0.5 -mr-1" style="max-height: 380px;">
        <div class="grid grid-cols-3 gap-2.5 sm:grid-cols-4 md:grid-cols-5 lg:grid-cols-6">
            @foreach($allMedia as $item)
            <div
                x-show="matchesTab('{{ $item->mime_type }}') && matchesSearch('{{ addslashes(strtolower($item->name)) }}', '{{ addslashes(strtolower($item->file_name)) }}')"
                x-transition:enter="transition duration-100 ease-out"
                x-transition:enter-start="opacity-0 scale-90"
                x-transition:enter-end="opacity-100 scale-100"
                x-on:click="selected = {{ $item->id }}"
                wire:click="selectMediaForField('{{ $fieldKey }}', '{{ $item->file_path }}')"
                :class="selected === {{ $item->id }}
                    ? 'border-primary-500 ring-2 ring-primary-400/50 shadow-md'
                    : 'border-transparent hover:border-primary-300 hover:shadow-sm'"
                class="group relative cursor-pointer overflow-hidden rounded-xl border-2 bg-white dark:bg-gray-800 transition-all duration-150"
                title="{{ $item->name }} · {{ $item->size_formatted }}"
            >
                {{-- Thumbnail --}}
                <div class="relative aspect-square overflow-hidden bg-gray-100 dark:bg-gray-700">
                    @if($item->isImage())
                    <img
                        src="{{ $item->url }}"
                        alt="{{ $item->name }}"
                        class="h-full w-full object-cover transition-transform duration-200 group-hover:scale-105"
                        loading="lazy"
                    />
                    @elseif(str_contains($item->mime_type, 'video'))
                    <div class="flex h-full w-full flex-col items-center justify-center bg-gradient-to-br from-blue-50 to-indigo-100 dark:from-blue-900/30 dark:to-indigo-900/30">
                        <x-heroicon-o-film class="h-8 w-8 text-blue-400"/>
                    </div>
                    @else
                    <div class="flex h-full w-full flex-col items-center justify-center bg-gradient-to-br from-gray-50 to-slate-100 dark:from-gray-700 dark:to-slate-700">
                        <x-heroicon-o-document class="h-8 w-8 text-gray-400"/>
                        <span class="mt-1 text-[9px] font-bold uppercase text-gray-400">{{ pathinfo($item->file_name, PATHINFO_EXTENSION) }}</span>
                    </div>
                    @endif

                    {{-- Selected check overlay --}}
                    <div
                        x-show="selected === {{ $item->id }}"
                        x-transition
                        class="absolute inset-0 flex items-center justify-center bg-primary-500/30 backdrop-blur-[1px]"
                    >
                        <div class="flex h-8 w-8 items-center justify-center rounded-full bg-primary-500 shadow-lg">
                            <x-heroicon-o-check class="h-4 w-4 text-white"/>
                        </div>
                    </div>
                </div>

                {{-- Name --}}
                <div class="px-1.5 py-1.5">
                    <p class="truncate text-[10px] font-medium text-gray-600 dark:text-gray-400 leading-tight">{{ $item->name }}</p>
                    <p class="text-[9px] text-gray-400 dark:text-gray-500">{{ $item->size_formatted }}</p>
                </div>
            </div>
            @endforeach
        </div>

        {{-- No-results state (controlled by Alpine filter) --}}
        <div
            x-cloak
            x-show="!$el.parentElement.querySelector('[x-show]:not([style*=\'display: none\'])')"
            class="flex flex-col items-center justify-center py-12 text-center"
        >
            <x-heroicon-o-magnifying-glass class="mb-3 h-10 w-10 text-gray-300"/>
            <p class="text-sm font-medium text-gray-500 dark:text-gray-400">No files match your search</p>
            <button type="button" x-on:click="search = ''; tab = 'all'" class="mt-2 text-xs text-primary-500 hover:underline">Clear filters</button>
        </div>
    </div>
    @endif

    {{-- ── Footer ──────────────────────────────────────────── --}}
    <div class="mt-4 flex items-center justify-between border-t border-gray-100 dark:border-gray-700 pt-3">
        <p class="flex items-center gap-1.5 text-xs text-gray-400 dark:text-gray-500">
            <x-heroicon-o-cursor-arrow-ripple class="h-3.5 w-3.5"/>
            Click any file to select it instantly
        </p>
        <a
            href="{{ route('filament.admin.resources.media-library.index') }}"
            target="_blank"
            class="inline-flex items-center gap-1.5 rounded-lg border border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-700 px-3 py-1.5 text-[11px] font-semibold text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors shadow-sm"
        >
            <x-heroicon-o-photo class="h-3.5 w-3.5"/>
            Manage Library
            <x-heroicon-o-arrow-top-right-on-square class="h-3 w-3 text-gray-400"/>
        </a>
    </div>
</div>
