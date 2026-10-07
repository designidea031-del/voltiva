<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use App\Filament\Admin\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\Width;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;

use Swis\Filament\Backgrounds\FilamentBackgroundsPlugin;
use pxlrbt\FilamentSpotlight\SpotlightPlugin;
use Awcodes\Overlook\OverlookPlugin;
use Awcodes\Overlook\Widgets\OverlookWidget;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->brandName('Voltiva Dash')
            ->brandLogo(fn () => new HtmlString(view('filament.admin.components.brand-logo')->render()))
            ->brandLogoHeight('2.5rem')
            ->favicon(function () {
                $user = filament()->auth()->user();
                if (!empty($user?->avatar_url)) {
                    return $user->avatar_url;
                }
                try {
                    if (Schema::hasTable('settings')) {
                        $fav = Setting::where('key', 'site_favicon')->value('value');
                        if (!empty($fav)) {
                            return asset('storage/' . ltrim($fav, '/'));
                        }
                    }
                } catch (\Throwable $e) {}
                return asset('assets/images/fav.png');
            })
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->login()
            ->profile(\App\Filament\Admin\Pages\EditProfile::class, isSimple: false)
            ->darkMode(false)
            ->sidebarCollapsibleOnDesktop()
            ->collapsibleNavigationGroups(false)
            ->sidebarWidth('15.5rem')
            ->collapsedSidebarWidth('4.5rem')
            ->maxContentWidth(Width::Full)
            ->colors([
                'primary' => Color::hex('#000000'),
                'success' => Color::hex('#525252'),
                'info' => Color::hex('#8c8c8c'),
                'warning' => Color::hex('#b7b7b7'),
                'danger' => Color::hex('#ef4444'),
                'gray' => Color::Zinc,
            ])
            ->font('Figtree')
            ->plugins([
                SpotlightPlugin::make(),
            ])

            ->renderHook(
                \Filament\View\PanelsRenderHook::HEAD_START,
                fn (): string => '<script>
                    (function() {
                        try {
                            localStorage.setItem("theme", "light");
                            document.documentElement.classList.remove("dark");
                        } catch (e) {}
                    })();
                </script>'
            )
            ->renderHook(
                \Filament\View\PanelsRenderHook::HEAD_END,
                fn (): string => '<script src="' . asset('js/apexcharts.min.js') . '"></script>' . Blade::render('@include("filament.admin.modal-styles")')
            )
            ->renderHook(
                'panels::topbar.start',
                fn (): string => Blade::render('@include("filament.admin.topbar-start")')
            )
            ->renderHook(
                'panels::topbar.end',
                fn (): string => Blade::render('@include("filament.admin.topbar-end")')
            )
            ->renderHook(
                'panels::footer',
                fn (): string => Blade::render('@include("filament.admin.footer")')
            )
            ->renderHook(
                \Filament\Tables\View\TablesRenderHook::SELECTION_INDICATOR_ACTIONS_BEFORE,
                fn (): string => Blade::render('
                    <button
                        type="button"
                        wire:click="mountAction(\'delete\', {}, {table: true, bulk: true})"
                        class="fi-ta-dock-delete-btn"
                        title="Delete selected records"
                    >
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="3 6 5 6 21 6"/>
                            <path d="M19 6l-1 14a2 2 0 01-2 2H8a2 2 0 01-2-2L5 6"/>
                            <path d="M10 11v6"/><path d="M14 11v6"/>
                            <path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2"/>
                        </svg>
                        <span>Delete Selected</span>
                    </button>
                ')
            )
            ->resources([
                \App\Filament\Admin\Resources\Products\ProductResource::class,
                \App\Filament\Admin\Resources\Categories\CategoryResource::class,
                \App\Filament\Admin\Resources\SubCategories\SubCategoryResource::class,
                \App\Filament\Admin\Resources\BlogPosts\BlogPostResource::class,
                \App\Filament\Admin\Resources\BlogCategories\BlogCategoryResource::class,
                \App\Filament\Admin\Resources\Leads\LeadResource::class,
                \App\Filament\Admin\Resources\PageBanners\PageBannerResource::class,
                \App\Filament\Admin\Resources\PageSeos\PageSeoResource::class,
            ])
            ->pages([
                Dashboard::class,
                \App\Filament\Admin\Pages\WebmasterAnalytics::class,
                \App\Filament\Admin\Pages\SiteSettings::class,
                \App\Filament\Admin\Pages\EmailConfiguration::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Admin/Widgets'), for: 'App\Filament\Admin\Widgets')
            ->widgets([])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
