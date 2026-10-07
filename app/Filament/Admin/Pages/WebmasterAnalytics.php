<?php

namespace App\Filament\Admin\Pages;

use App\Models\Setting;
use App\Services\SitemapService;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\File;

class WebmasterAnalytics extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedCodeBracket;

    protected static ?string $navigationLabel = 'Webmaster & Analytics';

    protected static ?string $title = 'Webmaster & Analytics Tools';

    protected static ?string $slug = 'webmaster-analytics';

    protected static ?int $navigationSort = 9;

    protected string $view = 'filament.admin.pages.webmaster-analytics';


    public function getBreadcrumbs(): array
    {
        return [
            url('/admin') => 'Dashboard',
            '#' => 'Search Engine & Growth',
            '' => 'Webmaster & Analytics Tools',
        ];
    }

    public function getHeading(): string
    {
        return '';
    }

    // Form fields
    public string $google_site_verification = '';
    public string $bing_site_verification = '';
    public string $pinterest_verify_code = '';
    public string $yandex_verify_code = '';

    public bool $ga4_enabled = true;
    public string $google_analytics_id = '';
    public bool $ga4_anonymize_ip = true;

    public bool $gtm_enabled = false;
    public string $gtm_container_id = '';

    public bool $meta_pixel_enabled = true;
    public string $facebook_pixel_id = '';

    public string $custom_head_code = '';
    public string $custom_footer_code = '';

    public string $robotsContent = '';

    // Modal state for Live <head> Inspection
    public bool $showHeadModal = false;

    public function mount(): void
    {
        $this->loadSettings();
    }

    protected function getViewData(): array
    {
        return [
            'google_site_verification' => $this->google_site_verification,
            'bing_site_verification'   => $this->bing_site_verification,
            'pinterest_verify_code'    => $this->pinterest_verify_code,
            'yandex_verify_code'       => $this->yandex_verify_code,
            'ga4_enabled'              => $this->ga4_enabled,
            'google_analytics_id'      => $this->google_analytics_id,
            'ga4_anonymize_ip'         => $this->ga4_anonymize_ip,
            'gtm_enabled'              => $this->gtm_enabled,
            'gtm_container_id'         => $this->gtm_container_id,
            'meta_pixel_enabled'       => $this->meta_pixel_enabled,
            'facebook_pixel_id'        => $this->facebook_pixel_id,
            'custom_head_code'         => $this->custom_head_code,
            'custom_footer_code'       => $this->custom_footer_code,
            'robotsContent'            => $this->robotsContent,
            'showHeadModal'            => $this->showHeadModal,
            'sitemapStats'             => $this->sitemapStats,
            'generatedHeadCode'        => $this->generatedHeadCode,
        ];
    }

    public function loadSettings(): void
    {
        $this->google_site_verification = Setting::where('key', 'google_site_verification')->value('value') ?? '';
        $this->bing_site_verification   = Setting::where('key', 'bing_site_verification')->value('value') ?? '';
        $this->pinterest_verify_code    = Setting::where('key', 'pinterest_verify_code')->value('value') ?? '';
        $this->yandex_verify_code       = Setting::where('key', 'yandex_verify_code')->value('value') ?? '';

        $this->ga4_enabled         = (bool)(Setting::where('key', 'ga4_enabled')->value('value') ?? '1');
        $this->google_analytics_id = Setting::where('key', 'google_analytics_id')->value('value') ?? '';
        $this->ga4_anonymize_ip    = (bool)(Setting::where('key', 'ga4_anonymize_ip')->value('value') ?? '1');

        $this->gtm_enabled      = (bool)(Setting::where('key', 'gtm_enabled')->value('value') ?? '0');
        $this->gtm_container_id = Setting::where('key', 'gtm_container_id')->value('value') ?? '';

        $this->meta_pixel_enabled = (bool)(Setting::where('key', 'meta_pixel_enabled')->value('value') ?? '1');
        $this->facebook_pixel_id  = Setting::where('key', 'facebook_pixel_id')->value('value') ?? '';

        $this->custom_head_code   = Setting::where('key', 'custom_head_code')->value('value') ?? '';
        $this->custom_footer_code = Setting::where('key', 'custom_footer_code')->value('value') ?? '';

        $defaultRobots = "User-agent: *\nDisallow: /admin/\nAllow: /\n\nSitemap: " . url('/sitemap.xml');
        $this->robotsContent = Setting::where('key', 'robots_txt_content')->value('value') ?: $defaultRobots;
    }

    /**
     * Smart parser: Extracts verification token from full meta tag if pasted.
     */
    protected function cleanVerificationToken(string $input): string
    {
        $trimmed = trim($input);
        if (empty($trimmed)) {
            return '';
        }

        // If user pasted `<meta name="google-site-verification" content="TOKEN" />`
        if (preg_match('/content=["\']([^"\']+)["\']/i', $trimmed, $matches)) {
            return trim($matches[1]);
        }

        // If user pasted `google-site-verification=TOKEN`
        if (str_starts_with($trimmed, 'google-site-verification=')) {
            return trim(substr($trimmed, strlen('google-site-verification=')));
        }

        return $trimmed;
    }

    public function save(): void
    {
        // Parse Google site verification
        $cleanedGoogle = $this->cleanVerificationToken($this->google_site_verification);
        $this->google_site_verification = $cleanedGoogle;

        $settings = [
            'google_site_verification' => $this->google_site_verification,
            'bing_site_verification'   => trim($this->bing_site_verification),
            'pinterest_verify_code'    => trim($this->pinterest_verify_code),
            'yandex_verify_code'       => trim($this->yandex_verify_code),
            'ga4_enabled'              => $this->ga4_enabled ? '1' : '0',
            'google_analytics_id'      => trim($this->google_analytics_id),
            'ga4_anonymize_ip'         => $this->ga4_anonymize_ip ? '1' : '0',
            'gtm_enabled'              => $this->gtm_enabled ? '1' : '0',
            'gtm_container_id'         => trim($this->gtm_container_id),
            'meta_pixel_enabled'       => $this->meta_pixel_enabled ? '1' : '0',
            'facebook_pixel_id'        => trim($this->facebook_pixel_id),
            'custom_head_code'         => $this->custom_head_code,
            'custom_footer_code'       => $this->custom_footer_code,
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        app(SitemapService::class)->clearCache();

        Notification::make()
            ->title('Webmaster & Analytics Settings Saved')
            ->body('Tracking IDs, verification tags, and custom scripts have been saved and applied across all public pages.')
            ->success()
            ->send();
    }

    public function saveRobotsTxt(): void
    {
        Setting::updateOrCreate(
            ['key' => 'robots_txt_content'],
            ['value' => $this->robotsContent]
        );

        try {
            $publicPath = public_path('robots.txt');
            File::put($publicPath, $this->robotsContent);
        } catch (\Throwable $e) {}

        Notification::make()
            ->title('Robots.txt Directives Saved')
            ->body('Search engine spider directives have been successfully updated.')
            ->success()
            ->send();
    }

    public function applyRobotsPreset(string $preset): void
    {
        $siteUrl = url('/');
        if ($preset === 'recommended') {
            $this->robotsContent = "User-agent: *\nDisallow: /admin/\nAllow: /\n\nSitemap: {$siteUrl}/sitemap.xml";
        } elseif ($preset === 'allow_all') {
            $this->robotsContent = "User-agent: *\nDisallow:\n\nSitemap: {$siteUrl}/sitemap.xml";
        }

        Notification::make()
            ->title('Preset Applied')
            ->body('Remember to click "Save robots.txt" to save changes.')
            ->info()
            ->send();
    }

    public function generateSitemap(): void
    {
        $service = app(SitemapService::class);
        $xml = $service->getSitemapXml(true);
        $stats = $service->getStats();

        try {
            File::put(public_path('sitemap.xml'), $xml);
        } catch (\Throwable $e) {}

        Notification::make()
            ->title('Dynamic Sitemap Regenerated!')
            ->body("Successfully synchronized sitemap with {$stats['total_urls']} live indexed URLs ({$stats['pages_count']} pages, {$stats['products_count']} products, {$stats['blogs_count']} articles).")
            ->success()
            ->send();
    }

    public function pingSearchEngines(): void
    {
        $service = app(SitemapService::class);
        $results = $service->pingSearchEngines();

        Notification::make()
            ->title('Search Engine Notification Sent')
            ->body("Google: {$results['google']} • Bing: {$results['bing']}")
            ->success()
            ->send();
    }

    public function openHeadModal(): void
    {
        $this->showHeadModal = true;
    }

    public function closeHeadModal(): void
    {
        $this->showHeadModal = false;
    }

    public function getSitemapStatsProperty(): array
    {
        return app(SitemapService::class)->getStats();
    }

    /**
     * Generates a preview string of all live tags that will be injected into <head>.
     */
    public function getGeneratedHeadCodeProperty(): string
    {
        $tags = [];

        if (!empty($this->google_site_verification)) {
            $tags[] = '<!-- Google Search Console -->';
            $tags[] = '<meta name="google-site-verification" content="' . htmlspecialchars($this->google_site_verification) . '">';
        }

        if (!empty($this->bing_site_verification)) {
            $tags[] = '<!-- Bing Webmaster -->';
            $tags[] = '<meta name="msvalidate.01" content="' . htmlspecialchars($this->bing_site_verification) . '">';
        }

        if (!empty($this->pinterest_verify_code)) {
            $tags[] = '<!-- Pinterest Verification -->';
            $tags[] = '<meta name="p:domain_verify" content="' . htmlspecialchars($this->pinterest_verify_code) . '">';
        }

        if (!empty($this->yandex_verify_code)) {
            $tags[] = '<!-- Yandex Verification -->';
            $tags[] = '<meta name="yandex-verification" content="' . htmlspecialchars($this->yandex_verify_code) . '">';
        }

        if ($this->ga4_enabled && !empty($this->google_analytics_id)) {
            $tags[] = '<!-- Google Analytics 4 (GA4) -->';
            $tags[] = '<script async src="https://www.googletagmanager.com/gtag/js?id=' . htmlspecialchars($this->google_analytics_id) . '"></script>';
            $tags[] = '<script>';
            $tags[] = '  window.dataLayer = window.dataLayer || [];';
            $tags[] = '  function gtag(){dataLayer.push(arguments);}';
            $tags[] = "  gtag('js', new Date());";
            $anonymize = $this->ga4_anonymize_ip ? ", { 'anonymize_ip': true }" : '';
            $tags[] = "  gtag('config', '" . htmlspecialchars($this->google_analytics_id) . "'{$anonymize});";
            $tags[] = '</script>';
        }

        if ($this->gtm_enabled && !empty($this->gtm_container_id)) {
            $tags[] = '<!-- Google Tag Manager (GTM) -->';
            $tags[] = "<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':";
            $tags[] = "new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],";
            $tags[] = "j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=";
            $tags[] = "'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);";
            $tags[] = "})(window,document,'script','dataLayer','" . htmlspecialchars($this->gtm_container_id) . "');</script>";
        }

        if ($this->meta_pixel_enabled && !empty($this->facebook_pixel_id)) {
            $tags[] = '<!-- Meta (Facebook) Pixel -->';
            $tags[] = "<script>!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?";
            $tags[] = "n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;";
            $tags[] = "n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;";
            $tags[] = "t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window, document,'script',";
            $tags[] = "'https://connect.facebook.net/en_US/fbevents.js');";
            $tags[] = "fbq('init', '" . htmlspecialchars($this->facebook_pixel_id) . "');";
            $tags[] = "fbq('track', 'PageView');</script>";
        }

        if (!empty($this->custom_head_code)) {
            $tags[] = '<!-- Custom <head> Code -->';
            $tags[] = $this->custom_head_code;
        }

        return implode("\n", $tags);
    }
}
