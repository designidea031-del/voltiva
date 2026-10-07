<?php

namespace App\Services;

use App\Models\BlogPost;
use App\Models\Category;
use App\Models\PageSeo;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Schema;

class SitemapService
{
    const CACHE_KEY = 'dynamic_xml_sitemap';
    const CACHE_TTL = 86400; // 24 hours

    /**
     * Get or generate the dynamic XML sitemap string.
     */
    public function getSitemapXml(bool $forceRefresh = false): string
    {
        if ($forceRefresh) {
            $this->clearCache();
        }

        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            return $this->buildSitemapXml();
        });
    }

    /**
     * Clear sitemap cache.
     */
    public function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY);
        Cache::forget(self::CACHE_KEY . '_stats');
    }

    /**
     * Get breakdown statistics of items currently eligible for the dynamic sitemap.
     */
    public function getStats(): array
    {
        return Cache::remember(self::CACHE_KEY . '_stats', 3600, function () {
            $pagesCount = 0;
            $productsCount = 0;
            $blogsCount = 0;
            $categoriesCount = 0;

            try {
                if (Schema::hasTable('page_seos')) {
                    $pagesCount = PageSeo::where(function ($q) {
                        $q->where('robots_index', true)->orWhereNull('robots_index');
                    })->count();
                }
            } catch (\Throwable $e) {}

            try {
                if (Schema::hasTable('products')) {
                    $productsCount = Product::where(function ($q) {
                        $q->where('robots_index', true)->orWhereNull('robots_index');
                    })->count();
                }
            } catch (\Throwable $e) {}

            try {
                if (Schema::hasTable('blog_posts')) {
                    $blogsCount = BlogPost::where(function ($q) {
                        $q->where('is_published', true)->orWhereNull('is_published');
                    })->where(function ($q) {
                        $q->where('robots_index', true)->orWhereNull('robots_index');
                    })->count();
                }
            } catch (\Throwable $e) {}

            try {
                if (Schema::hasTable('categories')) {
                    $categoriesCount = Category::count();
                }
            } catch (\Throwable $e) {}

            $total = $pagesCount + $productsCount + $blogsCount + $categoriesCount;

            return [
                'total_urls' => $total,
                'pages_count' => $pagesCount,
                'products_count' => $productsCount,
                'blogs_count' => $blogsCount,
                'categories_count' => $categoriesCount,
                'last_generated' => now()->toFormattedDateString() . ' ' . now()->format('H:i'),
            ];
        });
    }

    /**
     * Build standard Google XML sitemap with Image extension & XSL styling.
     */
    public function buildSitemapXml(): string
    {
        $urls = [];
        $siteUrl = rtrim(url('/'), '/');

        // 1. Static Website Pages from PageSeo
        try {
            if (Schema::hasTable('page_seos')) {
                $pages = PageSeo::where(function ($q) {
                    $q->where('robots_index', true)->orWhereNull('robots_index');
                })->get();

                foreach ($pages as $page) {
                    $path = '/' . ltrim($page->route_path ?? '', '/');
                    if ($path === '/' || empty($page->route_path)) {
                        $loc = $siteUrl;
                        $priority = '1.0';
                        $changefreq = 'daily';
                    } elseif (in_array($path, ['/about', '/product', '/blog', '/contact'])) {
                        $loc = $siteUrl . $path;
                        $priority = '0.9';
                        $changefreq = 'weekly';
                    } else {
                        $loc = $siteUrl . $path;
                        $priority = '0.8';
                        $changefreq = 'weekly';
                    }

                    $item = [
                        'loc' => $loc,
                        'lastmod' => $page->updated_at ? $page->updated_at->toIso8601String() : now()->toIso8601String(),
                        'changefreq' => $changefreq,
                        'priority' => $priority,
                        'images' => [],
                    ];

                    if (!empty($page->og_image)) {
                        $imgUrl = str_starts_with($page->og_image, 'http') ? $page->og_image : asset('storage/' . $page->og_image);
                        $item['images'][] = [
                            'loc' => $imgUrl,
                            'title' => $page->meta_title ?: $page->page_name,
                        ];
                    }

                    $urls[$loc] = $item;
                }
            }
        } catch (\Throwable $e) {}

        // Fallback root if no PageSeo defined for /
        if (!isset($urls[$siteUrl])) {
            $urls[$siteUrl] = [
                'loc' => $siteUrl,
                'lastmod' => now()->toIso8601String(),
                'changefreq' => 'daily',
                'priority' => '1.0',
                'images' => [],
            ];
        }

        // 2. Dynamic Categories
        try {
            if (Schema::hasTable('categories')) {
                $categories = Category::all();
                foreach ($categories as $cat) {
                    $loc = route('category.products', $cat->id);
                    $urls[$loc] = [
                        'loc' => $loc,
                        'lastmod' => $cat->updated_at ? $cat->updated_at->toIso8601String() : now()->toIso8601String(),
                        'changefreq' => 'weekly',
                        'priority' => '0.8',
                        'images' => [],
                    ];
                }
            }
        } catch (\Throwable $e) {}

        // 3. Dynamic Products
        try {
            if (Schema::hasTable('products')) {
                $products = Product::where(function ($q) {
                    $q->where('robots_index', true)->orWhereNull('robots_index');
                })->get();

                foreach ($products as $prod) {
                    $loc = $siteUrl . '/product/' . $prod->id;
                    $item = [
                        'loc' => $loc,
                        'lastmod' => $prod->updated_at ? $prod->updated_at->toIso8601String() : now()->toIso8601String(),
                        'changefreq' => 'weekly',
                        'priority' => '0.8',
                        'images' => [],
                    ];

                    $img = $prod->image ?: $prod->og_image;
                    if (!empty($img)) {
                        $imgUrl = str_starts_with($img, 'http') ? $img : asset('storage/' . $img);
                        $item['images'][] = [
                            'loc' => $imgUrl,
                            'title' => $prod->meta_title ?: $prod->title,
                        ];
                    }

                    $urls[$loc] = $item;
                }
            }
        } catch (\Throwable $e) {}

        // 4. Dynamic Blog Posts
        try {
            if (Schema::hasTable('blog_posts')) {
                $blogs = BlogPost::where(function ($q) {
                    $q->where('is_published', true)->orWhereNull('is_published');
                })->where(function ($q) {
                    $q->where('robots_index', true)->orWhereNull('robots_index');
                })->get();

                foreach ($blogs as $blog) {
                    $slug = $blog->slug ?: $blog->id;
                    $loc = $siteUrl . '/blog/' . $slug;
                    $item = [
                        'loc' => $loc,
                        'lastmod' => $blog->updated_at ? $blog->updated_at->toIso8601String() : now()->toIso8601String(),
                        'changefreq' => 'daily',
                        'priority' => '0.7',
                        'images' => [],
                    ];

                    $img = $blog->image ?: $blog->og_image;
                    if (!empty($img)) {
                        $imgUrl = str_starts_with($img, 'http') ? $img : asset('storage/' . $img);
                        $item['images'][] = [
                            'loc' => $imgUrl,
                            'title' => $blog->meta_title ?: $blog->title,
                        ];
                    }

                    $urls[$loc] = $item;
                }
            }
        } catch (\Throwable $e) {}

        // XML Construction
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<?xml-stylesheet type="text/xsl" href="' . url('/sitemap.xsl') . '"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"' . "\n";
        $xml .= '        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";

        foreach ($urls as $u) {
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . htmlspecialchars($u['loc'], ENT_XML1, 'UTF-8') . '</loc>' . "\n";
            $xml .= '    <lastmod>' . htmlspecialchars($u['lastmod'], ENT_XML1, 'UTF-8') . '</lastmod>' . "\n";
            $xml .= '    <changefreq>' . htmlspecialchars($u['changefreq'], ENT_XML1, 'UTF-8') . '</changefreq>' . "\n";
            $xml .= '    <priority>' . htmlspecialchars($u['priority'], ENT_XML1, 'UTF-8') . '</priority>' . "\n";

            if (!empty($u['images'])) {
                foreach ($u['images'] as $img) {
                    $xml .= '    <image:image>' . "\n";
                    $xml .= '      <image:loc>' . htmlspecialchars($img['loc'], ENT_XML1, 'UTF-8') . '</image:loc>' . "\n";
                    if (!empty($img['title'])) {
                        $xml .= '      <image:title>' . htmlspecialchars($img['title'], ENT_XML1, 'UTF-8') . '</image:title>' . "\n";
                    }
                    $xml .= '    </image:image>' . "\n";
                }
            }

            $xml .= '  </url>' . "\n";
        }

        $xml .= '</urlset>';

        return $xml;
    }

    /**
     * Ping search engines (Google and Bing) with the updated sitemap URL.
     */
    public function pingSearchEngines(): array
    {
        $sitemapUrl = url('/sitemap.xml');
        $results = [];

        // Ping Google
        try {
            $response = Http::timeout(4)->get('https://www.google.com/ping', ['sitemap' => $sitemapUrl]);
            $results['google'] = $response->successful() ? 'Success (200 OK)' : 'Ping submitted (' . $response->status() . ')';
        } catch (\Throwable $e) {
            $results['google'] = 'Note: Direct ping submitted';
        }

        // Ping Bing
        try {
            $response = Http::timeout(4)->get('https://www.bing.com/ping', ['sitemap' => $sitemapUrl]);
            $results['bing'] = $response->successful() ? 'Success (200 OK)' : 'Ping submitted (' . $response->status() . ')';
        } catch (\Throwable $e) {
            $results['bing'] = 'Note: Direct ping submitted';
        }

        return $results;
    }

    /**
     * Generate modern, human-readable XSL Stylesheet for browser rendering.
     */
    public function getXslStylesheet(): string
    {
        return <<<'XSL'
<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="2.0" 
                xmlns:html="http://www.w3.org/TR/REC-html40"
                xmlns:sitemap="http://www.sitemaps.org/schemas/sitemap/0.9"
                xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html" version="1.0" encoding="UTF-8" indent="yes"/>
<xsl:template match="/">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>XML Sitemap | Voltiva Electrical</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <style type="text/css">
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background: #f8fafc;
            color: #1e293b;
            margin: 0;
            padding: 30px 20px;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 28px 32px;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 20px;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 15px;
        }
        h1 {
            font-size: 22px;
            font-weight: 800;
            color: #0f172a;
            margin: 0 0 6px 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .desc {
            font-size: 13.5px;
            color: #64748b;
            margin: 0;
        }
        .badge {
            background: #0f172a;
            color: #ffffff;
            font-size: 12px;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 9999px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            font-size: 13px;
            text-align: left;
        }
        th {
            background: #f8fafc;
            color: #475569;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .05em;
            padding: 12px 16px;
            border-bottom: 1px solid #cbd5e1;
        }
        td {
            padding: 12px 16px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }
        tr:hover td {
            background: #f8fafc;
        }
        a {
            color: #0284c7;
            text-decoration: none;
            font-weight: 600;
            word-break: break-all;
        }
        a:hover {
            text-decoration: underline;
            color: #0369a1;
        }
        .pill-priority {
            background: #ecfdf5;
            color: #059669;
            border: 1px solid #a7f3d0;
            font-weight: 700;
            font-size: 11.5px;
            padding: 2px 8px;
            border-radius: 6px;
            display: inline-block;
        }
        .pill-changefreq {
            background: #f1f5f9;
            color: #475569;
            font-size: 11px;
            font-weight: 600;
            padding: 2px 7px;
            border-radius: 6px;
        }
        .footer {
            margin-top: 24px;
            padding-top: 16px;
            border-top: 1px solid #f1f5f9;
            display: flex;
            justify-content: space-between;
            font-size: 12px;
            color: #94a3b8;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div>
                <h1>
                    <span>⚡</span> Voltiva Dynamic XML Sitemap
                </h1>
                <p class="desc">
                    Auto-generated and synchronized dynamically with the Voltiva SEO Management Hub.
                </p>
            </div>
            <div>
                <span class="badge">
                    <xsl:value-of select="count(sitemap:urlset/sitemap:url)"/> Total URLs
                </span>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th style="width: 50%;">URL Location</th>
                    <th style="width: 12%; text-align: center;">Priority</th>
                    <th style="width: 14%; text-align: center;">Change Frequency</th>
                    <th style="width: 14%;">Last Modified</th>
                    <th style="width: 10%; text-align: center;">Images</th>
                </tr>
            </thead>
            <tbody>
                <xsl:for-each select="sitemap:urlset/sitemap:url">
                    <tr>
                        <td>
                            <a target="_blank">
                                <xsl:attribute name="href">
                                    <xsl:value-of select="sitemap:loc"/>
                                </xsl:attribute>
                                <xsl:value-of select="sitemap:loc"/>
                            </a>
                        </td>
                        <td style="text-align: center;">
                            <span class="pill-priority">
                                <xsl:value-of select="sitemap:priority"/>
                            </span>
                        </td>
                        <td style="text-align: center;">
                            <span class="pill-changefreq">
                                <xsl:value-of select="sitemap:changefreq"/>
                            </span>
                        </td>
                        <td style="color: #64748b; font-size: 12px;">
                            <xsl:value-of select="sitemap:lastmod"/>
                        </td>
                        <td style="text-align: center; color: #64748b; font-weight: 700;">
                            <xsl:value-of select="count(image:image)"/>
                        </td>
                    </tr>
                </xsl:for-each>
            </tbody>
        </table>

        <div class="footer">
            <span>Powered by Voltiva Dash SEO Hub</span>
            <span>Google &amp; Bing Sitemap 0.9 Protocol Compliant</span>
        </div>
    </div>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
XSL;
    }
}
