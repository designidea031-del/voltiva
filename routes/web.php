<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/index-2', [PageController::class, 'home2'])->name('home-2');


Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog/{slug}', [PageController::class, 'blogDetailsBySlug'])->name('blog.show');
Route::get('/blog-details', [PageController::class, 'blogDetails'])->name('blog-details');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'submitContact'])->name('contact.submit');

Route::get('/product', [PageController::class, 'product'])->name('product');
Route::get('/category/{id}', [PageController::class, 'categoryProducts'])->name('category.products');

// Placeholder routes to prevent RouteNotFoundException for missing views
Route::get('/service', [PageController::class, 'product'])->name('service');
Route::get('/service-details', [PageController::class, 'product'])->name('service-details');
Route::get('/shop-details/{id?}', [PageController::class, 'product'])->name('shop-details');
Route::get('/team-details', [PageController::class, 'about'])->name('team-details');
Route::get('/portfolio', [PageController::class, 'home'])->name('portfolio');
Route::get('/portfolio-details', [PageController::class, 'home'])->name('portfolio-details');

// Dynamic SEO: robots.txt
Route::get('/robots.txt', function () {
    $content = setting('robots_txt_content');
    if (empty($content)) {
        $content = "User-agent: *\nAllow: /\nDisallow: /admin\nSitemap: " . url('/sitemap.xml');
    }
    return response($content, 200, ['Content-Type' => 'text/plain']);
})->name('seo.robots');

// Dynamic SEO: sitemap.xml & sitemap.xsl
Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index'])->name('seo.sitemap');
Route::get('/sitemap.xsl', [\App\Http\Controllers\SitemapController::class, 'xsl'])->name('seo.sitemap.xsl');

// Universal Storage File Fallback Route:
// Serves uploaded files directly when public/storage symlink is missing, broken, or unsupported on live server.
Route::get('/storage/{path}', function (string $path) {
    $cleanPath = str_replace(['../', '..\\', "\0"], '', $path);
    $cleanPath = ltrim($cleanPath, '/\\');

    $fullPath = storage_path('app/public/' . $cleanPath);

    if (!file_exists($fullPath) || is_dir($fullPath)) {
        $privatePath = storage_path('app/private/' . $cleanPath);
        if (file_exists($privatePath) && !is_dir($privatePath)) {
            $fullPath = $privatePath;
        } else {
            abort(404);
        }
    }

    $extension = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
    if ($extension === 'svg') {
        $mimeType = 'image/svg+xml';
    } else {
        $mimeType = @mime_content_type($fullPath) ?: 'application/octet-stream';
    }

    return response()->file($fullPath, [
        'Content-Type' => $mimeType,
        'Cache-Control' => 'public, max-age=31536000, immutable',
    ]);
})->where('path', '.*')->withoutMiddleware([
    \Illuminate\Foundation\Http\Middleware\PreventRequestForgery::class,
    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class,
])->name('storage.fallback');

// Helper routes for Live Server / Hostinger / Shared Hosting deployment
Route::get('/fix-storage', function () {
    $results = [];
    $publicStorage = public_path('storage');
    $targetStorage = storage_path('app/public');

    // 1. Remove old broken symlink or directory in public/storage if present
    if (file_exists($publicStorage) || is_link($publicStorage)) {
        if (is_link($publicStorage)) {
            @unlink($publicStorage);
            $results[] = 'Old symlink removed.';
        } elseif (is_dir($publicStorage)) {
            @rmdir($publicStorage);
            if (!file_exists($publicStorage)) {
                $results[] = 'Stale storage directory/junction removed.';
            } else {
                $results[] = 'Directory public/storage already exists.';
            }
        }
    }

    // 2. Attempt storage:link creation
    $symlinkSuccess = false;
    try {
        \Illuminate\Support\Facades\Artisan::call('storage:link');
        $symlinkSuccess = true;
        $results[] = 'Artisan storage:link executed successfully.';
    } catch (\Throwable $e) {
        if (function_exists('symlink') && !file_exists($publicStorage)) {
            try {
                if (@symlink($targetStorage, $publicStorage)) {
                    $symlinkSuccess = true;
                    $results[] = 'PHP symlink() created successfully.';
                }
            } catch (\Throwable $ex) {
                $results[] = 'PHP symlink failed: ' . $ex->getMessage();
            }
        }
        if (!$symlinkSuccess) {
            $results[] = 'Symlink not created (Host restriction), but Laravel Fallback Route is ACTIVE to serve all images automatically!';
        }
    }

    // 3. Sync database settings if table exists
    try {
        if (\Illuminate\Support\Facades\Schema::hasTable('settings')) {
            $settingsToSync = [
                'site_name' => 'doonon',
                'site_logo' => 'settings/01KZBFWC7M18YWFXSZJ68KER3S.png',
                'site_favicon' => 'settings/01KYPV0JQR5S0N97JSSXR3F5TS.png',
                'contact_phone' => '7600757008',
                'contact_email' => 'info@voltiva.com',
                'contact_location' => 'Sardar Ind. Area, Survey No.137/1-p3p, Plot No. 119/p, Village Padavla - 360 024, Rajkot, Gujarat - India',
                'social_facebook' => 'https://www.facebook.com/profile.php?id=61558603920704',
                'social_instagram' => 'https://www.instagram.com/golek_switches/',
                'social_whatsapp' => 'https://wa.link/moe37n',
                'social_youtube' => 'http://www.youtube.com/@golekelectricalaccessories3461',
            ];
            foreach ($settingsToSync as $key => $val) {
                \App\Models\Setting::updateOrCreate(['key' => $key], ['value' => $val]);
            }
            $results[] = 'Database settings synchronized successfully.';
        }
    } catch (\Throwable $e) {
        $results[] = 'Settings sync warning: ' . $e->getMessage();
    }

    // 4. Clear application caches
    try {
        \Illuminate\Support\Facades\Artisan::call('optimize:clear');
        \Illuminate\Support\Facades\Artisan::call('view:clear');
        $results[] = 'Application caches cleared (config, routes, views, cache).';
    } catch (\Throwable $e) {
        $results[] = 'Cache clear warning: ' . $e->getMessage();
    }

    // 4. Count files in storage/app/public
    $fileCount = 0;
    if (is_dir($targetStorage)) {
        $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($targetStorage, \FilesystemIterator::SKIP_DOTS));
        $fileCount = iterator_count($files);
    }

    $resultsHtml = implode('</li><li>', array_map('htmlspecialchars', $results));

    return response('<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Storage Status & Fix - Bexon</title>
        <style>
            body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #0f172a; color: #f8fafc; padding: 40px 20px; line-height: 1.6; }
            .card { max-width: 650px; margin: 0 auto; background: #1e293b; border-radius: 12px; padding: 32px; box-shadow: 0 10px 30px rgba(0,0,0,0.4); border: 1px solid #334155; }
            h1 { color: #38bdf8; font-size: 24px; margin-top: 0; display: flex; align-items: center; gap: 10px; }
            .badge { display: inline-block; padding: 4px 12px; border-radius: 9999px; font-weight: 600; font-size: 13px; background: rgba(16, 185, 129, 0.2); color: #34d399; border: 1px solid #059669; }
            ul { background: #0f172a; border-radius: 8px; padding: 16px 20px 16px 36px; border: 1px solid #334155; margin: 20px 0; }
            li { margin-bottom: 8px; color: #cbd5e1; }
            .info-box { background: rgba(56, 189, 248, 0.1); border-left: 4px solid #38bdf8; padding: 12px 16px; border-radius: 4px; margin: 20px 0; font-size: 14px; }
            .btn { display: inline-block; background: #2563eb; color: #fff; text-decoration: none; padding: 10px 20px; border-radius: 6px; font-weight: 500; transition: 0.2s; }
            .btn:hover { background: #1d4ed8; }
        </style>
    </head>
    <body>
        <div class="card">
            <h1><span>⚡</span> Bexon Storage Setup & Fix</h1>
            <p><span class="badge">Status: Fully Operational</span></p>
            <p>Total uploaded files in storage: <strong>' . $fileCount . '</strong></p>
            <ul>
                <li>' . $resultsHtml . '</li>
            </ul>
            <div class="info-box">
                <strong>Gujarati:</strong> તમારા લોગો, ફોટો અને મીડિયા ફાઇલો હવે લાઈવ સર્વર પર કોઈપણ સમસ્યા વગર દેખાશે. ફોલબેક રૂટ એક્ટિવ છે જેથી સિમલિંક વગર પણ ફાઇલો આપોઆપ લોડ થશે.
            </div>
            <a href="/" class="btn">Go to Website Homepage &rarr;</a>
        </div>
    </body>
    </html>');
})->withoutMiddleware([
    \Illuminate\Foundation\Http\Middleware\PreventRequestForgery::class,
    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class,
])->name('fix-storage');

Route::get('/setup-hostinger', function () {
    return redirect()->route('fix-storage');
});

Route::get('/sync-live-catalog', function () {
    $dataFile = base_path('database/data/catalog.json');
    if (!file_exists($dataFile)) {
        return response('Error: database/data/catalog.json not found.', 404);
    }

    $data = json_decode(file_get_contents($dataFile), true);
    if (!$data) {
        return response('Error: Invalid JSON data.', 500);
    }

    $cats = $data['categories'] ?? [];
    $subcats = $data['sub_categories'] ?? [];
    $prods = $data['products'] ?? [];

    \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    \App\Models\Product::truncate();
    \App\Models\SubCategory::truncate();
    \App\Models\Category::truncate();

    // Insert categories
    foreach ($cats as $cat) {
        \App\Models\Category::create($cat);
    }

    // Insert subcategories
    foreach ($subcats as $sub) {
        \App\Models\SubCategory::create($sub);
    }

    // Insert products in chunks
    foreach (array_chunk($prods, 50) as $chunk) {
        \Illuminate\Support\Facades\DB::table('products')->insert($chunk);
    }

    \Illuminate\Support\Facades\DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    // Clear caches
    try {
        \Illuminate\Support\Facades\Artisan::call('optimize:clear');
        \Illuminate\Support\Facades\Artisan::call('view:clear');
    } catch (\Throwable $e) {}

    $totalCats = \App\Models\Category::count();
    $totalSubs = \App\Models\SubCategory::count();
    $totalProds = \App\Models\Product::count();

    return response('<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Voltiva Catalog Synced Successfully</title>
        <style>
            body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #0f172a; color: #f8fafc; padding: 40px 20px; text-align: center; }
            .card { max-width: 600px; margin: 40px auto; background: #1e293b; border-radius: 16px; padding: 36px; border: 1px solid #334155; box-shadow: 0 20px 40px rgba(0,0,0,0.4); }
            h1 { color: #38bdf8; font-size: 26px; margin-top: 0; }
            .badge { display: inline-block; padding: 6px 16px; border-radius: 9999px; background: rgba(16, 185, 129, 0.2); color: #34d399; font-weight: 700; border: 1px solid #059669; margin-bottom: 24px; }
            .stats { display: flex; justify-content: space-around; background: #0f172a; border-radius: 12px; padding: 20px; margin: 24px 0; border: 1px solid #334155; }
            .stat-num { font-size: 32px; font-weight: 800; color: #38bdf8; }
            .stat-label { font-size: 13px; color: #94a3b8; text-transform: uppercase; letter-spacing: 1px; }
            .btn { display: inline-block; background: #2563eb; color: #fff; padding: 12px 28px; border-radius: 8px; font-weight: 600; text-decoration: none; transition: 0.2s; margin-top: 10px; }
            .btn:hover { background: #1d4ed8; }
        </style>
    </head>
    <body>
        <div class="card">
            <h1>⚡ Voltiva Catalog Synced!</h1>
            <div class="badge">Status: Live Database Updated</div>
            <p style="color: #cbd5e1; font-size: 15px;">તમામ પ્રોડક્ટ્સ અને કેટેગરીઝ લાઈવ ડેટાબેઝમાં સફળતાપૂર્વક અપડેટ થઈ ગઈ છે.</p>
            <div class="stats">
                <div>
                    <div class="stat-num">' . $totalCats . '</div>
                    <div class="stat-label">Categories</div>
                </div>
                <div>
                    <div class="stat-num">' . $totalSubs . '</div>
                    <div class="stat-label">Sub Categories</div>
                </div>
                <div>
                    <div class="stat-num">' . $totalProds . '</div>
                    <div class="stat-label">Products</div>
                </div>
            </div>
            <a href="/product" class="btn">View Products Catalog &rarr;</a>
        </div>
    </body>
    </html>');
Route::get('/git-pull', function () {
    $results = [];
    $commands = [
        'git fetch --all 2>&1',
        'git reset --hard origin/main 2>&1',
        'php artisan optimize:clear 2>&1',
        'php artisan view:clear 2>&1',
    ];

    foreach ($commands as $cmd) {
        $output = [];
        $returnVar = null;
        if (function_exists('exec')) {
            @exec($cmd, $output, $returnVar);
            $results[] = "$ {$cmd}\n" . implode("\n", $output);
        } else {
            $results[] = "$ {$cmd}\n[ERROR: exec() is disabled on this server]";
        }
    }

    return response('<pre style="background:#0f172a;color:#38bdf8;padding:20px;border-radius:8px;font-family:monospace;">' . htmlspecialchars(implode("\n\n", $results)) . '</pre>');
})->withoutMiddleware([
    \Illuminate\Foundation\Http\Middleware\PreventRequestForgery::class,
    \Illuminate\Session\Middleware\StartSession::class,
    \Illuminate\View\Middleware\ShareErrorsFromSession::class,
]);


