<x-filament-panels::page>
    <style>
        /* Modern Vertical Tabs Styling matching User Reference */
        .fi-sc-tabs.fi-vertical {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        @media (min-width: 1024px) {
            .fi-sc-tabs.fi-vertical {
                display: flex !important;
                flex-direction: row !important;
                align-items: flex-start !important;
                gap: 1.75rem !important;
            }

            .fi-sc-tabs.fi-vertical > .fi-tabs {
                width: 280px !important;
                min-width: 280px !important;
                flex-shrink: 0 !important;
                display: flex !important;
                flex-direction: column !important;
                background-color: #ffffff;
                border: 1px solid #e5e7eb;
                border-radius: 1rem;
                padding: 0.625rem !important;
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05);
                gap: 0.375rem !important;
                overflow: visible !important;
            }

            .dark .fi-sc-tabs.fi-vertical > .fi-tabs {
                background-color: #111827 !important;
                border-color: #374151 !important;
                box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.4);
            }

            .fi-sc-tabs.fi-vertical > .fi-tabs .fi-tabs-item {
                width: 100% !important;
                display: flex !important;
                align-items: center !important;
                gap: 0.75rem !important;
                padding: 0.75rem 1rem !important;
                border-radius: 0.75rem !important;
                font-weight: 500 !important;
                font-size: 0.875rem !important;
                transition: all 0.15s ease-in-out !important;
                color: #4b5563 !important;
                border: 1px solid transparent !important;
                text-align: left !important;
                justify-content: flex-start !important;
                background: transparent;
            }

            .dark .fi-sc-tabs.fi-vertical > .fi-tabs .fi-tabs-item {
                color: #9ca3af !important;
            }

            .fi-sc-tabs.fi-vertical > .fi-tabs .fi-tabs-item:hover {
                background-color: #f9fafb !important;
                color: #111827 !important;
            }

            .dark .fi-sc-tabs.fi-vertical > .fi-tabs .fi-tabs-item:hover {
                background-color: #1f2937 !important;
                color: #f3f4f6 !important;
            }

            .fi-sc-tabs.fi-vertical > .fi-tabs .fi-tabs-item.fi-active {
                background-color: #fff7ed !important;
                color: #ea580c !important;
                border-color: #fed7aa !important;
                box-shadow: 0 1px 2px 0 rgba(234, 88, 12, 0.08) !important;
                font-weight: 600 !important;
            }

            .dark .fi-sc-tabs.fi-vertical > .fi-tabs .fi-tabs-item.fi-active {
                background-color: rgba(124, 45, 18, 0.3) !important;
                color: #fb923c !important;
                border-color: rgba(154, 52, 18, 0.6) !important;
            }

            .fi-sc-tabs.fi-vertical > .fi-tabs .fi-tabs-item.fi-active svg {
                color: #ea580c !important;
            }

            .dark .fi-sc-tabs.fi-vertical > .fi-tabs .fi-tabs-item.fi-active svg {
                color: #fb923c !important;
            }

            .fi-sc-tabs.fi-vertical > .fi-sc-tabs-tab {
                flex: 1 1 0% !important;
                min-width: 0 !important;
            }
        }
    </style>

    <form wire:submit="save" class="space-y-6">
        {{-- ── Top Header Card (Matching user reference layout) ── --}}
        <div class="rounded-2xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 p-5 shadow-xs transition">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center gap-4">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-orange-100 dark:bg-orange-950/60 text-orange-600 dark:text-orange-400 shadow-xs ring-1 ring-orange-500/20">
                        <x-heroicon-o-cog-6-tooth class="h-6 w-6 animate-[spin_10s_linear_infinite]" />
                    </div>
                    <div>
                        <div class="flex items-center gap-2.5">
                            <h2 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Site Settings
                            </h2>
                            <span class="inline-flex items-center rounded-full bg-orange-50 dark:bg-orange-950/60 px-2.5 py-0.5 text-xs font-semibold text-orange-700 dark:text-orange-300 ring-1 ring-inset ring-orange-600/20">
                                System Config
                            </span>
                        </div>
                        <p class="mt-0.5 text-xs sm:text-sm text-gray-500 dark:text-gray-400">
                            Configure website details, real-time dynamic SEO, branding logos, mail delivery, and external integrations.
                        </p>
                    </div>
                </div>

                <div class="flex items-center gap-3 shrink-0">
                    <x-filament::button
                        type="submit"
                        size="md"
                        color="warning"
                        icon="heroicon-m-check"
                        class="shadow-xs !bg-orange-600 hover:!bg-orange-700 active:!bg-orange-800 text-white"
                    >
                        Save Settings
                    </x-filament::button>
                </div>
            </div>
        </div>

        {{-- ── Main Settings Form with Vertical Tabs ── --}}
        <div>
            {{ $this->form }}
        </div>

        {{-- ── Bottom Sticky-friendly Save Button ── --}}
        <div class="rounded-2xl border border-gray-200 dark:border-gray-800 bg-white dark:bg-gray-900 p-4 shadow-xs">
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center gap-3 text-xs text-gray-500 dark:text-gray-400">
                    <span class="inline-flex items-center gap-1.5 font-medium text-emerald-600 dark:text-emerald-400">
                        <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        Storage: Linked & Ready
                    </span>
                    <span>•</span>
                    <span>PHP {{ phpversion() }}</span>
                    <span>•</span>
                    <span>Laravel v{{ app()->version() }}</span>
                </div>

                <div class="flex items-center gap-3">
                    <x-filament::button
                        type="submit"
                        size="lg"
                        color="warning"
                        icon="heroicon-m-check"
                        class="!bg-orange-600 hover:!bg-orange-700 active:!bg-orange-800 text-white font-semibold"
                    >
                        Save Changes
                    </x-filament::button>
                </div>
            </div>
        </div>
    </form>
</x-filament-panels::page>
