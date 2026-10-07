<?php

namespace App\Filament\Admin\Pages;

use App\Models\Setting;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class SiteSettings extends Page
{
    use WithFileUploads;

    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedCog6Tooth;

    protected static ?string $navigationLabel = 'Site Settings';

    protected static ?string $title = 'Site Settings';

    protected static ?string $slug = 'site-settings';

    protected static ?int $navigationSort = 10;

    protected string $view = 'filament.admin.pages.site-settings';

    public function getBreadcrumbs(): array
    {
        return [
            url('/admin') => 'Dashboard',
            '#' => 'System & Settings',
            '' => 'Site Settings',
        ];
    }

    public function getHeading(): string
    {
        return '';
    }

    // Active Navigation Tab: 'general', 'contact', 'social', 'seo'
    public string $activeTab = 'general';

    // ── Tab 1: General & Branding ───────────────────────────────────────────
    public string $site_name = '';
    public string $site_tagline = '';
    public string $footer_about_text = '';
    public string $copyright_text = '';

    // File uploads
    public $new_header_logo = null;
    public ?string $current_header_logo = null;

    public $new_footer_logo = null;
    public ?string $current_footer_logo = null;

    public $new_favicon = null;
    public ?string $current_favicon = null;

    // ── Logo Adjuster Controls ──────────────────────────────────────────────
    public string $logo_header_height = '38';
    public string $logo_header_max_width = '180';
    public string $logo_mobile_height = '34';
    public string $logo_footer_height = '42';
    public string $logo_admin_height = '32';
    public string $logo_fit = 'contain';
    public string $logo_padding_y = '0';

    // ── Tab 2: Contact & Location ───────────────────────────────────────────
    public string $contact_phone = '';
    public string $contact_email = '';
    public string $contact_whatsapp = '';
    public string $contact_working_hours = '';
    public string $contact_location = '';
    public string $google_map_embed = '';

    // ── Tab 3: Social Networks ──────────────────────────────────────────────
    public string $social_whatsapp = '';
    public string $social_instagram = '';
    public string $social_facebook = '';
    public string $social_linkedin = '';
    public string $social_youtube = '';
    public string $social_twitter = '';
    public string $social_pinterest = '';

    // ── Tab 4: SEO & Analytics ──────────────────────────────────────────────
    public string $meta_title = '';
    public string $meta_description = '';
    public string $meta_keywords = '';
    public string $custom_head_code = '';

    // ── Tab 5: Homepage Video ───────────────────────────────────────────────
    public $new_hero_video = null;
    public ?string $current_hero_video = null;
    public string $hero_video_url = '';
    public string $hero_video_source = 'default'; // 'default', 'upload', 'url'
    public string $hero_video_overlay = '65';

    public function mount(): void
    {
        // Check for tab query param if provided
        $tab = request()->query('tab');
        if (in_array($tab, ['general', 'hero_video', 'contact', 'social', 'seo'])) {
            $this->activeTab = $tab;
        }

        if (!Schema::hasTable('settings')) {
            return;
        }

        $allSettings = Setting::pluck('value', 'key')->toArray();

        // General
        $this->site_name          = $allSettings['site_name'] ?? 'Voltiva';
        $this->site_tagline       = $allSettings['site_tagline'] ?? 'Engineered for Power, Efficiency & Durability';
        $this->footer_about_text  = $allSettings['footer_about_text'] ?? 'Voltiva is a premier manufacturer and supplier of electrical accessories, switches, and high-voltage solutions engineered for efficiency and durability.';
        $this->copyright_text     = $allSettings['copyright_text'] ?? 'Copyright © ' . date('Y') . ' Voltiva. All Rights Reserved. Designed & Developed for Voltiva Dash.';
        $this->current_header_logo = $allSettings['site_logo'] ?? null;
        $this->current_footer_logo = $allSettings['site_logo_dark'] ?? null;
        $this->current_favicon    = $allSettings['site_favicon'] ?? null;

        // Logo Adjuster
        $this->logo_header_height    = $allSettings['logo_header_height'] ?? '38';
        $this->logo_header_max_width = $allSettings['logo_header_max_width'] ?? '180';
        $this->logo_mobile_height    = $allSettings['logo_mobile_height'] ?? '34';
        $this->logo_footer_height    = $allSettings['logo_footer_height'] ?? '42';
        $this->logo_admin_height     = $allSettings['logo_admin_height'] ?? '32';
        $this->logo_fit              = $allSettings['logo_fit'] ?? 'contain';
        $this->logo_padding_y        = $allSettings['logo_padding_y'] ?? '0';

        // Contact
        $this->contact_phone         = $allSettings['contact_phone'] ?? '+91 76007 57008';
        $this->contact_email         = $allSettings['contact_email'] ?? 'info@voltiva.com';
        $this->contact_whatsapp      = $allSettings['contact_whatsapp'] ?? ($allSettings['social_whatsapp'] ?? '+91 76007 57008');
        $this->contact_working_hours = $allSettings['contact_working_hours'] ?? 'Monday - Saturday: 9:00 AM - 7:00 PM (Sunday Closed)';
        $this->contact_location      = $allSettings['contact_location'] ?? 'Sardar Ind. Area, Survey No.137/1-p3p, Plot No. 119/p, Village Padavla - 360 024, Rajkot, Gujarat - India';
        $this->google_map_embed      = $allSettings['google_map_embed'] ?? 'https://maps.google.com/maps?q=Padavla+Rajkot+Gujarat&t=&z=15&ie=UTF8&iwloc=&output=embed';

        // Social
        $this->social_whatsapp  = $allSettings['social_whatsapp'] ?? 'https://wa.me/917600757008';
        $this->social_instagram = $allSettings['social_instagram'] ?? 'https://www.instagram.com/voltiva_official/';
        $this->social_facebook  = $allSettings['social_facebook'] ?? 'https://www.facebook.com/voltiva';
        $this->social_linkedin  = $allSettings['social_linkedin'] ?? 'https://www.linkedin.com/company/voltiva';
        $this->social_youtube   = $allSettings['social_youtube'] ?? 'https://www.youtube.com/@voltiva';
        $this->social_twitter   = $allSettings['social_twitter'] ?? 'https://x.com/voltiva';
        $this->social_pinterest = $allSettings['social_pinterest'] ?? '';

        // SEO & Scripts
        $this->meta_title       = $allSettings['meta_title'] ?? 'Voltiva - High Voltage Solutions & Electrical Manufacturing';
        $this->meta_description = $allSettings['meta_description'] ?? 'Voltiva is a premier manufacturer and supplier of electrical accessories, modular switches, and high-voltage solutions.';
        $this->meta_keywords    = $allSettings['meta_keywords'] ?? 'voltiva, switches, electrical accessories, modular switches, high voltage, electrical solutions, rajkot gujarat';
        $this->custom_head_code = $allSettings['custom_head_code'] ?? '';

        // Homepage Hero Video
        $this->current_hero_video = $allSettings['home_hero_video'] ?? null;
        $this->hero_video_url     = $allSettings['home_hero_video_url'] ?? '';
        $this->hero_video_source  = $allSettings['home_hero_video_source'] ?? ($this->current_hero_video ? 'upload' : (!empty($this->hero_video_url) ? 'url' : 'default'));
        $this->hero_video_overlay = $allSettings['home_hero_video_overlay'] ?? '65';
    }

    public function setTab(string $tab): void
    {
        if (in_array($tab, ['general', 'hero_video', 'contact', 'social', 'seo'])) {
            $this->activeTab = $tab;
        }
    }

    public function resetHeroVideo(): void
    {
        $this->current_hero_video = null;
        $this->new_hero_video = null;
        $this->hero_video_url = '';
        $this->hero_video_source = 'default';
        $this->hero_video_overlay = '65';

        Setting::updateOrCreate(['key' => 'home_hero_video'], ['value' => null]);
        Setting::updateOrCreate(['key' => 'home_hero_video_url'], ['value' => null]);
        Setting::updateOrCreate(['key' => 'home_hero_video_source'], ['value' => 'default']);
        Setting::updateOrCreate(['key' => 'home_hero_video_overlay'], ['value' => '65']);

        try {
            \Illuminate\Support\Facades\Artisan::call('view:clear');
        } catch (\Throwable $e) {}

        Notification::make()
            ->title('Homepage Video Restored')
            ->body('Default Voltiva hero background video (assets/video/board.mp4) has been restored.')
            ->success()
            ->send();
    }

    public function save(): void
    {
        if (!Schema::hasTable('settings')) {
            Notification::make()
                ->title('Settings table does not exist')
                ->danger()
                ->send();
            return;
        }

        // Validate basic inputs
        try {
            $this->validate([
                'site_name' => 'required|string|max:255',
                'contact_email' => 'nullable|email',
                'new_header_logo' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
                'new_footer_logo' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
                'new_favicon' => 'nullable|file|mimes:png,ico,svg,webp,jpeg,jpg|max:2048',
                'new_hero_video' => 'nullable|file|mimes:mp4,webm,ogg,mov,m4v|max:102400',
            ], [
                'new_header_logo.mimes' => 'Header logo must be a PNG, SVG, WEBP, JPG, or GIF file.',
                'new_header_logo.max'   => 'Header logo must not exceed 5MB.',
                'new_footer_logo.mimes' => 'Footer logo must be a PNG, SVG, WEBP, JPG, or GIF file.',
                'new_footer_logo.max'   => 'Footer logo must not exceed 5MB.',
                'new_favicon.mimes'     => 'Favicon must be an ICO, PNG, SVG, or WEBP file.',
                'new_favicon.max'       => 'Favicon must not exceed 2MB.',
                'new_hero_video.mimes'  => 'Hero video must be an MP4, WEBM, OGG, or MOV file.',
                'new_hero_video.max'    => 'Hero video must not exceed 100MB.',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $firstError = collect($e->errors())->flatten()->first() ?? 'Please check the uploaded files.';
            Notification::make()
                ->title('Validation Error')
                ->body($firstError)
                ->danger()
                ->send();
            throw $e;
        }

        // Process File Uploads
        if ($this->new_header_logo) {
            $path = $this->new_header_logo->store('settings/logos', 'public');
            $this->current_header_logo = $path;
            $this->new_header_logo = null;
        }

        if ($this->new_footer_logo) {
            $path = $this->new_footer_logo->store('settings/logos', 'public');
            $this->current_footer_logo = $path;
            $this->new_footer_logo = null;
        }

        if ($this->new_favicon) {
            $path = $this->new_favicon->store('settings/favicons', 'public');
            $this->current_favicon = $path;
            $this->new_favicon = null;
        }

        if ($this->new_hero_video) {
            $path = $this->new_hero_video->store('settings/videos', 'public');
            $this->current_hero_video = $path;
            $this->new_hero_video = null;
            $this->hero_video_source = 'upload';
        } elseif (!empty($this->hero_video_url)) {
            $this->hero_video_source = 'url';
        }

        // Save mapping
        $settings = [
            'site_name'             => $this->site_name,
            'site_tagline'          => $this->site_tagline,
            'footer_about_text'     => $this->footer_about_text,
            'copyright_text'        => $this->copyright_text,
            'site_logo'             => $this->current_header_logo,
            'site_logo_dark'        => $this->current_footer_logo,
            'site_favicon'          => $this->current_favicon,
            'home_hero_video'       => $this->current_hero_video,
            'home_hero_video_url'   => $this->hero_video_url,
            'home_hero_video_source'=> $this->hero_video_source,
            'home_hero_video_overlay' => $this->hero_video_overlay,
            'logo_header_height'    => $this->logo_header_height,
            'logo_header_max_width' => $this->logo_header_max_width,
            'logo_mobile_height'    => $this->logo_mobile_height,
            'logo_footer_height'    => $this->logo_footer_height,
            'logo_admin_height'     => $this->logo_admin_height,
            'logo_fit'              => $this->logo_fit,
            'logo_padding_y'        => $this->logo_padding_y,
            'contact_phone'         => $this->contact_phone,
            'contact_email'         => $this->contact_email,
            'contact_whatsapp'      => $this->contact_whatsapp,
            'contact_working_hours' => $this->contact_working_hours,
            'contact_location'      => $this->contact_location,
            'google_map_embed'      => $this->google_map_embed,
            'social_whatsapp'       => $this->social_whatsapp,
            'social_instagram'      => $this->social_instagram,
            'social_facebook'       => $this->social_facebook,
            'social_linkedin'       => $this->social_linkedin,
            'social_youtube'        => $this->social_youtube,
            'social_twitter'        => $this->social_twitter,
            'social_pinterest'      => $this->social_pinterest,
            'meta_title'            => $this->meta_title,
            'meta_description'      => $this->meta_description,
            'meta_keywords'         => $this->meta_keywords,
            'custom_head_code'      => $this->custom_head_code,
        ];

        foreach ($settings as $key => $val) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $val]
            );
        }

        try {
            \Illuminate\Support\Facades\Artisan::call('view:clear');
        } catch (\Throwable $e) {}

        Notification::make()
            ->title('Site Settings Saved Successfully')
            ->body('All configurations have been updated and are live across the website.')
            ->success()
            ->send();
    }

    public function removeLogo(string $type): void
    {
        if ($type === 'header') {
            $this->new_header_logo = null;
            $this->current_header_logo = null;
            Setting::updateOrCreate(['key' => 'site_logo'], ['value' => null]);
        } elseif ($type === 'footer') {
            $this->new_footer_logo = null;
            $this->current_footer_logo = null;
            Setting::updateOrCreate(['key' => 'site_logo_dark'], ['value' => null]);
        } elseif ($type === 'favicon') {
            $this->new_favicon = null;
            $this->current_favicon = null;
            Setting::updateOrCreate(['key' => 'site_favicon'], ['value' => null]);
        }

        try {
            \Illuminate\Support\Facades\Artisan::call('view:clear');
        } catch (\Throwable $e) {}

        Notification::make()
            ->title(ucfirst($type) . ' logo removed')
            ->success()
            ->send();
    }

    public function refreshMapPreview(): void
    {
        Notification::make()
            ->title('Map Preview Refreshed')
            ->info()
            ->send();
    }

    public function resetLogoAdjuster(): void
    {
        $this->logo_header_height = '38';
        $this->logo_header_max_width = '180';
        $this->logo_mobile_height = '34';
        $this->logo_footer_height = '42';
        $this->logo_admin_height = '32';
        $this->logo_fit = 'contain';
        $this->logo_padding_y = '0';

        Notification::make()
            ->title('Logo Adjuster Reset')
            ->body('Default dimensions restored. Click Save Changes to apply.')
            ->info()
            ->send();
    }

    public function getCleanMapEmbedUrlProperty(): string
    {
        return clean_google_map_embed($this->google_map_embed, $this->contact_location);
    }

    public function getSystemStatusProperty(): array
    {
        $dbName = 'Connected';
        try {
            $dbName = DB::connection()->getDatabaseName();
        } catch (\Throwable $e) {}

        $storageStatus = 'Standard';
        try {
            $storageStatus = file_exists(public_path('storage')) ? 'Symlinked' : 'Standard';
        } catch (\Throwable $e) {}

        return [
            'website' => 'Live',
            'cache' => 'Synced',
            'database' => $dbName,
            'storage' => $storageStatus,
        ];
    }
}
