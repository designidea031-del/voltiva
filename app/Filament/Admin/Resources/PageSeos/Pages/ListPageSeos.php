<?php

namespace App\Filament\Admin\Resources\PageSeos\Pages;

use App\Filament\Admin\Resources\PageSeos\PageSeoResource;
use App\Models\BlogPost;
use App\Models\PageSeo;
use App\Models\Product;
use App\Models\Setting;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\File;

class ListPageSeos extends ListRecords
{
    protected static string $resource = PageSeoResource::class;

    protected string $view = 'filament.admin.resources.page-seos.pages.list-page-seos';

    // Active tab: 'pages', 'products', 'blogs', 'webmaster'
    public ?string $activeTab = 'pages';

    // Search, Filter & Pagination
    public string $search = '';
    public string $statusFilter = 'all'; // all, optimal, needs_work, indexed
    public string $sortOrder = 'name_asc';
    public int $perPage = 15;

    protected function getViewData(): array
    {
        return [
            'stats'         => $this->kpiStats,
            'pages'         => $this->pages,
            'products'      => $this->products,
            'blogs'         => $this->blogs,
            'activeTab'     => $this->activeTab,
            'statusFilter'  => $this->statusFilter,
            'search'        => $this->search,
            'perPage'       => $this->perPage,
            'webmaster'     => $this->webmaster,
            'robotsContent' => $this->robotsContent,
            'sitemapStats'  => app(\App\Services\SitemapService::class)->getStats(),
        ];
    }

    // Webmaster form state
    public array $webmaster = [];
    public string $robotsContent = '';

    protected $queryString = [
        'activeTab'    => ['except' => 'pages'],
        'search'       => ['except' => ''],
        'statusFilter' => ['except' => 'all'],
        'sortOrder'    => ['except' => 'name_asc'],
        'perPage'      => ['except' => 15],
    ];

    public function updatingPerPage(): void
    {
        $this->resetPage();
    }

    public function mount(): void
    {
        parent::mount();

        $this->activeTab = request()->query('tab', $this->activeTab);
        if ($this->activeTab === 'webmaster') {
            $this->redirect(url('/admin/webmaster-analytics'), navigate: true);
            return;
        }

        if (!in_array($this->activeTab, ['pages', 'products', 'blogs'])) {
            $this->activeTab = 'pages';
        }

        $this->loadWebmasterSettings();
    }

    public function setTab(string $tab): void
    {
        if ($tab === 'webmaster') {
            $this->redirect(url('/admin/webmaster-analytics'), navigate: true);
            return;
        }

        if (in_array($tab, ['pages', 'products', 'blogs'])) {
            $this->activeTab = $tab;
            $this->search = '';
            $this->statusFilter = 'all';
            $this->resetPage();
        }
    }

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingStatusFilter(): void
    {
        $this->resetPage();
    }

    public function updatingSortOrder(): void
    {
        $this->resetPage();
    }

    public function loadWebmasterSettings(): void
    {
        $this->webmaster = [
            'google_site_verification' => Setting::where('key', 'google_site_verification')->value('value') ?? '',
            'bing_site_verification'   => Setting::where('key', 'bing_site_verification')->value('value') ?? '',
            'pinterest_verify_code'    => Setting::where('key', 'pinterest_verify_code')->value('value') ?? '',
            'yandex_verify_code'       => Setting::where('key', 'yandex_verify_code')->value('value') ?? '',
            'ga4_enabled'              => (bool)(Setting::where('key', 'ga4_enabled')->value('value') ?? '1'),
            'google_analytics_id'      => Setting::where('key', 'google_analytics_id')->value('value') ?? '',
            'ga4_anonymize_ip'         => (bool)(Setting::where('key', 'ga4_anonymize_ip')->value('value') ?? '1'),
            'gtm_enabled'              => (bool)(Setting::where('key', 'gtm_enabled')->value('value') ?? '0'),
            'gtm_container_id'         => Setting::where('key', 'gtm_container_id')->value('value') ?? '',
            'meta_pixel_enabled'       => (bool)(Setting::where('key', 'meta_pixel_enabled')->value('value') ?? '1'),
            'facebook_pixel_id'        => Setting::where('key', 'facebook_pixel_id')->value('value') ?? '',
            'custom_head_code'         => Setting::where('key', 'custom_head_code')->value('value') ?? '',
            'custom_footer_code'       => Setting::where('key', 'custom_footer_code')->value('value') ?? '',
        ];

        $defaultRobots = "User-agent: *\nDisallow: /admin/\nAllow: /\n\nSitemap: " . url('/sitemap.xml');
        $this->robotsContent = Setting::where('key', 'robots_txt_content')->value('value') ?: $defaultRobots;
    }

    public function toggleRobots(int $id, string $type = 'page'): void
    {
        if ($type === 'page') {
            $record = PageSeo::find($id);
            if ($record) {
                $record->robots_index = !$record->robots_index;
                $record->seo_score = $record->calculateSeoScore();
                $record->save();
                app(\App\Services\SitemapService::class)->clearCache();
                Notification::make()
                    ->title($record->robots_index ? 'Page marked as Index, Follow' : 'Page marked as Noindex')
                    ->success()
                    ->send();
            }
        } elseif ($type === 'product') {
            $record = Product::find($id);
            if ($record) {
                $record->robots_index = !$record->robots_index;
                $record->save();
                app(\App\Services\SitemapService::class)->clearCache();
                Notification::make()
                    ->title($record->robots_index ? 'Product marked as Index, Follow' : 'Product marked as Noindex')
                    ->success()
                    ->send();
            }
        } elseif ($type === 'blog') {
            $record = BlogPost::find($id);
            if ($record) {
                $record->robots_index = !$record->robots_index;
                $record->save();
                app(\App\Services\SitemapService::class)->clearCache();
                Notification::make()
                    ->title($record->robots_index ? 'Article marked as Index, Follow' : 'Article marked as Noindex')
                    ->success()
                    ->send();
            }
        }
    }

    public function generateSitemap(): void
    {
        $service = app(\App\Services\SitemapService::class);
        $xml = $service->getSitemapXml(true);
        $stats = $service->getStats();

        try {
            File::put(public_path('sitemap.xml'), $xml);
        } catch (\Throwable $e) {}

        Notification::make()
            ->title('Dynamic Sitemap Regenerated!')
            ->body("Successfully synchronized sitemap with {$stats['total_urls']} live indexed URLs ({$stats['pages_count']} pages, {$stats['products_count']} products, {$stats['blogs_count']} blog articles).")
            ->success()
            ->send();
    }

    public function pingSearchEngines(): void
    {
        $service = app(\App\Services\SitemapService::class);
        $results = $service->pingSearchEngines();

        Notification::make()
            ->title('Search Engines Pinged')
            ->body("Google: {$results['google']} • Bing: {$results['bing']}")
            ->success()
            ->send();
    }

    public function saveWebmasterSettings(): void
    {
        foreach ($this->webmaster as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => is_bool($value) ? ($value ? '1' : '0') : (string)$value]
            );
        }

        Notification::make()
            ->title('Webmaster & Analytics Settings Saved')
            ->success()
            ->body('Tracking IDs, verification tags, and custom scripts have been updated successfully.')
            ->send();
    }

    public function saveRobotsTxt(): void
    {
        Setting::updateOrCreate(
            ['key' => 'robots_txt_content'],
            ['value' => $this->robotsContent]
        );

        // Optionally write to public/robots.txt if allowed
        try {
            $publicPath = public_path('robots.txt');
            File::put($publicPath, $this->robotsContent);
        } catch (\Throwable $e) {}

        Notification::make()
            ->title('Robots.txt Saved')
            ->success()
            ->body('Search engine spider directives have been successfully updated.')
            ->send();
    }

    public function applyRobotsPreset(string $preset): void
    {
        $siteUrl = url('/');
        if ($preset === 'recommended') {
            $this->robotsContent = "User-agent: *\nDisallow: /admin/\nAllow: /\n\nSitemap: {$siteUrl}/sitemap.xml";
        } elseif ($preset === 'allow_all') {
            $this->robotsContent = "User-agent: *\nAllow: /\n\nSitemap: {$siteUrl}/sitemap.xml";
        } elseif ($preset === 'disallow_all') {
            $this->robotsContent = "User-agent: *\nDisallow: /";
        }
        $this->saveRobotsTxt();
    }

    public function getKpiStatsProperty(): array
    {
        $pagesCount = PageSeo::count();
        $productsCount = Product::count();
        $blogsCount = BlogPost::count();
        $totalUrls = $pagesCount + $productsCount + $blogsCount;

        // Scores
        $pageScores = PageSeo::pluck('seo_score')->toArray();
        $avgScore = count($pageScores) ? round(array_sum($pageScores) / count($pageScores)) : 88;

        // Indexable
        $indexablePages = PageSeo::where('robots_index', true)->count();
        $indexableProducts = Product::where('robots_index', true)->count();
        $indexableBlogs = BlogPost::where('robots_index', true)->count();
        $totalIndexable = $indexablePages + $indexableProducts + $indexableBlogs;

        // Social Share Ready
        $socialPages = PageSeo::whereNotNull('og_image')->where('og_image', '!=', '')->count();
        $socialProducts = Product::where(function ($q) {
            $q->whereNotNull('og_image')->where('og_image', '!=', '')
              ->orWhere(function ($q2) {
                  $q2->whereNotNull('image')->where('image', '!=', '');
              });
        })->count();
        $socialBlogs = BlogPost::where(function ($q) {
            $q->whereNotNull('og_image')->where('og_image', '!=', '')
              ->orWhere(function ($q2) {
                  $q2->whereNotNull('image')->where('image', '!=', '');
              });
        })->count();
        $totalSocialReady = $socialPages + $socialProducts + $socialBlogs;

        return [
            'total_urls'        => $totalUrls,
            'pages_count'       => $pagesCount,
            'products_count'    => $productsCount,
            'blogs_count'       => $blogsCount,
            'health_score'      => $avgScore,
            'total_indexable'   => $totalIndexable,
            'total_social_ready'=> $totalSocialReady,
        ];
    }

    public function getPagesProperty()
    {
        $query = PageSeo::query();

        if ($this->search) {
            $s = '%' . $this->search . '%';
            $query->where(function ($q) use ($s) {
                $q->where('page_name', 'like', $s)
                  ->orWhere('page_key', 'like', $s)
                  ->orWhere('route_path', 'like', $s)
                  ->orWhere('meta_title', 'like', $s)
                  ->orWhere('meta_description', 'like', $s);
            });
        }

        if ($this->statusFilter === 'optimal') {
            $query->where('seo_score', '>=', 80);
        } elseif ($this->statusFilter === 'needs_work') {
            $query->where('seo_score', '<', 80);
        } elseif ($this->statusFilter === 'indexed') {
            $query->where('robots_index', true);
        }

        if ($this->sortOrder === 'name_asc') {
            $query->orderBy('page_name', 'asc');
        } elseif ($this->sortOrder === 'name_desc') {
            $query->orderBy('page_name', 'desc');
        } elseif ($this->sortOrder === 'score_desc') {
            $query->orderBy('seo_score', 'desc');
        } elseif ($this->sortOrder === 'score_asc') {
            $query->orderBy('seo_score', 'asc');
        }

        return $query->paginate($this->perPage, ['*'], 'pages_page');
    }

    public function getProductsProperty()
    {
        $query = Product::query();

        if ($this->search) {
            $s = '%' . $this->search . '%';
            $query->where(function ($q) use ($s) {
                $q->where('title', 'like', $s)
                  ->orWhere('code', 'like', $s)
                  ->orWhere('meta_title', 'like', $s);
            });
        }

        if ($this->statusFilter === 'optimal') {
            $query->whereRaw('(CASE WHEN meta_title IS NOT NULL AND meta_description IS NOT NULL THEN 1 ELSE 0 END) = 1');
        } elseif ($this->statusFilter === 'needs_work') {
            $query->whereRaw('(CASE WHEN meta_title IS NULL OR meta_description IS NULL THEN 1 ELSE 0 END) = 1');
        } elseif ($this->statusFilter === 'indexed') {
            $query->where('robots_index', true);
        }

        return $query->orderBy('id', 'desc')->paginate($this->perPage, ['*'], 'products_page');
    }

    public function getBlogsProperty()
    {
        $query = BlogPost::with('category');

        if ($this->search) {
            $s = '%' . $this->search . '%';
            $query->where(function ($q) use ($s) {
                $q->where('title', 'like', $s)
                  ->orWhere('slug', 'like', $s)
                  ->orWhere('meta_title', 'like', $s);
            });
        }

        if ($this->statusFilter === 'optimal') {
            $query->whereRaw('(CASE WHEN meta_title IS NOT NULL AND meta_description IS NOT NULL THEN 1 ELSE 0 END) = 1');
        } elseif ($this->statusFilter === 'needs_work') {
            $query->whereRaw('(CASE WHEN meta_title IS NULL OR meta_description IS NULL THEN 1 ELSE 0 END) = 1');
        } elseif ($this->statusFilter === 'indexed') {
            $query->where('robots_index', true);
        }

        return $query->orderBy('id', 'desc')->paginate($this->perPage, ['*'], 'blogs_page');
    }
}
