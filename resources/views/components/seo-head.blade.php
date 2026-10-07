@props([
    'title' => null,
    'description' => null,
    'keywords' => null,
    'image' => null,
    'canonical' => null,
    'type' => 'website',
    'page' => null,
])

@php
    $siteName = setting('site_name', 'Voltiva');
    $currentRouteName = request()->route() ? request()->route()->getName() : '';

    // Determine page identifier
    $pageKey = $page;
    if (!$pageKey) {
        if ($currentRouteName === 'home' || request()->is('/')) {
            $pageKey = 'home';
        } elseif ($currentRouteName === 'about' || request()->is('about*')) {
            $pageKey = 'about';
        } elseif (in_array($currentRouteName, ['product', 'category.products', 'shop-details', 'service', 'service-details']) || request()->is('product*') || request()->is('category*')) {
            $pageKey = 'products';
        } elseif (in_array($currentRouteName, ['blog', 'blog-details']) || request()->is('blog*')) {
            $pageKey = 'blog';
        } elseif ($currentRouteName === 'contact' || request()->is('contact*')) {
            $pageKey = 'contact';
        }
    }

    $pageSeo = null;
    try {
        if ($pageKey && class_exists(\App\Models\PageSeo::class)) {
            $pageSeo = \App\Models\PageSeo::forPage($pageKey);
        }
    } catch (\Throwable $e) {}

    // Dynamic Title resolution
    if (!empty($title)) {
        $metaTitle = str_contains($title, $siteName) ? $title : $title . ' | ' . $siteName;
    } elseif ($pageSeo && !empty($pageSeo->meta_title)) {
        $metaTitle = $pageSeo->meta_title;
    } elseif ($pageKey && setting('seo_' . $pageKey . '_title')) {
        $metaTitle = setting('seo_' . $pageKey . '_title');
    } elseif (setting('meta_title')) {
        $metaTitle = setting('meta_title');
    } else {
        $metaTitle = $siteName . ' - High Voltage Solutions & Electrical Manufacturing';
    }

    // Dynamic Description resolution
    if (!empty($description)) {
        $metaDescription = $description;
    } elseif ($pageSeo && !empty($pageSeo->meta_description)) {
        $metaDescription = $pageSeo->meta_description;
    } elseif ($pageKey && setting('seo_' . $pageKey . '_description')) {
        $metaDescription = setting('seo_' . $pageKey . '_description');
    } elseif (setting('meta_description')) {
        $metaDescription = setting('meta_description');
    } else {
        $metaDescription = 'Voltiva is a premier manufacturer of premium modular switches, electrical accessories, and cutting-edge electrical solutions engineered for safety and durability.';
    }

    // Dynamic Keywords resolution
    if (!empty($keywords)) {
        $metaKeywords = $keywords;
    } elseif ($pageSeo && !empty($pageSeo->meta_keywords)) {
        $metaKeywords = $pageSeo->meta_keywords;
    } elseif ($pageKey && setting('seo_' . $pageKey . '_keywords')) {
        $metaKeywords = setting('seo_' . $pageKey . '_keywords');
    } elseif (setting('meta_keywords')) {
        $metaKeywords = setting('meta_keywords');
    } else {
        $metaKeywords = 'Voltiva, electrical accessories, modular switches, switches manufacturer, electrical solutions, Gujarat India';
    }

    // Canonical URL
    $canonicalUrl = $canonical ?: (setting('canonical_url') ? rtrim(setting('canonical_url'), '/') . request()->getRequestUri() : url()->current());

    // Favicon & Logo resolution
    $favicon = setting('site_favicon') ? storage_asset(setting('site_favicon')) : asset('assets/images/fav.png');
    $primaryLogo = setting('site_logo') ? storage_asset(setting('site_logo')) : asset('assets/images/logos/logo.webp');

    // OG Image resolution
    if (!empty($image)) {
        $metaImage = storage_asset($image);
    } elseif (setting('og_image')) {
        $metaImage = storage_asset(setting('og_image'));
    } else {
        $metaImage = $primaryLogo;
    }

    // Social & Robots
    $ogTitle = setting('og_title') ?: $metaTitle;
    $ogDescription = setting('og_description') ?: $metaDescription;
    if ($pageSeo) {
        $metaRobots = ($pageSeo->robots_index ? 'index' : 'noindex') . ', ' . ($pageSeo->robots_follow ? 'follow' : 'nofollow');
    } else {
        $metaRobots = setting('meta_robots', 'index, follow');
    }
    $author = setting('meta_author', $siteName);
    $twitterCardType = setting('twitter_card_type', 'summary_large_image');
    $twitterSite = setting('twitter_site', '@VoltivaPower');

    // Structured Data Social Links
    $socialLinks = array_filter([
        setting('social_facebook'),
        setting('social_instagram'),
        setting('social_twitter'),
        setting('social_linkedin'),
        setting('social_youtube'),
        setting('social_whatsapp'),
        setting('social_pinterest'),
    ]);

    // Build Schema.org Organization JSON-LD safely in PHP (avoids Blade @context collisions)
    $orgSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => $siteName,
        'url' => url('/'),
        'logo' => $primaryLogo,
    ];
    if (setting('contact_phone')) {
        $orgSchema['contactPoint'] = [
            '@type' => 'ContactPoint',
            'telephone' => setting('contact_phone'),
            'contactType' => 'customer service',
        ];
    }
    if (setting('contact_location')) {
        $orgSchema['address'] = [
            '@type' => 'PostalAddress',
            'streetAddress' => setting('contact_location'),
        ];
    }
    if (!empty($socialLinks)) {
        $orgSchema['sameAs'] = array_values($socialLinks);
    }

    $googleAnalyticsId = setting('google_analytics_id');
    $ga4Enabled = (bool)setting('ga4_enabled', '1');
    $ga4AnonymizeIp = (bool)setting('ga4_anonymize_ip', '1');
    $gtmEnabled = (bool)setting('gtm_enabled', '0');
    $gtmContainerId = setting('gtm_container_id');
    $googleSiteVerification = setting('google_site_verification');
    $bingSiteVerification = setting('bing_site_verification');
    $pinterestVerifyCode = setting('pinterest_verify_code');
    $yandexVerifyCode = setting('yandex_verify_code');
    $facebookPixelId = setting('facebook_pixel_id');
    $metaPixelEnabled = (bool)setting('meta_pixel_enabled', '1');
    $customHeadCode = setting('custom_head_code');
    $schemaOrganization = setting('schema_organization');
@endphp

<!-- Basic Meta Tags -->
<title>{{ $metaTitle }}</title>
<meta name="description" content="{{ $metaDescription }}">
<meta name="keywords" content="{{ $metaKeywords }}">
<meta name="author" content="{{ $author }}">
<meta name="robots" content="{{ $metaRobots }}">
<link rel="canonical" href="{{ $canonicalUrl }}">

<!-- Site Favicon -->
<link rel="shortcut icon" type="image/x-icon" href="{{ $favicon }}">
<link rel="icon" type="image/svg+xml" href="{{ $favicon }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ $favicon }}">
<link rel="apple-touch-icon" href="{{ $favicon }}">

<!-- Open Graph / Facebook / LinkedIn / WhatsApp -->
<meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta property="og:type" content="{{ $type }}">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:title" content="{{ $ogTitle }}">
<meta property="og:description" content="{{ $ogDescription }}">
<meta property="og:url" content="{{ $canonicalUrl }}">
<meta property="og:image" content="{{ $metaImage }}">
<meta property="og:image:alt" content="{{ $metaTitle }}">

<!-- Twitter Card -->
<meta name="twitter:card" content="{{ $twitterCardType }}">
@if(!empty($twitterSite))
<meta name="twitter:site" content="{{ $twitterSite }}">
<meta name="twitter:creator" content="{{ $twitterSite }}">
@endif
<meta name="twitter:title" content="{{ $ogTitle }}">
<meta name="twitter:description" content="{{ $ogDescription }}">
<meta name="twitter:image" content="{{ $metaImage }}">

<!-- Webmaster Verification -->
@if(!empty($googleSiteVerification))
<meta name="google-site-verification" content="{{ $googleSiteVerification }}">
@endif
@if(!empty($bingSiteVerification))
<meta name="msvalidate.01" content="{{ $bingSiteVerification }}">
@endif
@if(!empty($pinterestVerifyCode))
<meta name="p:domain_verify" content="{{ $pinterestVerifyCode }}">
@endif
@if(!empty($yandexVerifyCode))
<meta name="yandex-verification" content="{{ $yandexVerifyCode }}">
@endif

<!-- Google Tag Manager (GTM) Head Script -->
@if($gtmEnabled && !empty($gtmContainerId))
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','{{ $gtmContainerId }}');</script>
@endif

<!-- Google Analytics (GA4) -->
@if($ga4Enabled && !empty($googleAnalyticsId))
<script async src="https://www.googletagmanager.com/gtag/js?id={{ $googleAnalyticsId }}"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  @if($ga4AnonymizeIp)
  gtag('config', '{{ $googleAnalyticsId }}', { 'anonymize_ip': true });
  @else
  gtag('config', '{{ $googleAnalyticsId }}');
  @endif
</script>
@endif

<!-- Meta / Facebook Pixel -->
@if($metaPixelEnabled && !empty($facebookPixelId))
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '{{ $facebookPixelId }}');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id={{ $facebookPixelId }}&ev=PageView&noscript=1"
/></noscript>
@endif

<!-- Structured Data (JSON-LD Organization Schema) -->
<script type="application/ld+json">
{!! json_encode($orgSchema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) !!}
</script>

<!-- Custom User JSON-LD Schema (if defined) -->
@if(!empty($schemaOrganization))
<script type="application/ld+json">
{!! $schemaOrganization !!}
</script>
@endif

<!-- Custom Header Code Injection -->
@if(!empty($customHeadCode))
{!! $customHeadCode !!}
@endif

<!-- Dynamic Site Logo Styles (Configured via Admin Site Settings) -->
<style id="voltiva-dynamic-logo-styles">
:root {
  --site-logo-height: {{ setting('logo_header_height', '38') }}px;
  --site-logo-max-width: {{ setting('logo_header_max_width', '180') }}px;
  --site-logo-mobile-height: {{ setting('logo_mobile_height', '34') }}px;
  --site-logo-footer-height: {{ setting('logo_footer_height', '42') }}px;
  --site-logo-fit: {{ setting('logo_fit', 'contain') }};
  --site-logo-padding-y: {{ setting('logo_padding_y', '0') }}px;
}

/* Desktop Header Logo */
.site_logo .logo,
.site_logo a.logo,
.site_logo a {
  max-width: var(--site-logo-max-width) !important;
  width: auto !important;
  display: inline-flex !important;
  align-items: center !important;
}

.site_logo .logo img,
.site_logo a img,
.header-wrapper .site_logo img,
.site_logo img {
  height: var(--site-logo-height) !important;
  max-height: var(--site-logo-height) !important;
  max-width: var(--site-logo-max-width) !important;
  width: auto !important;
  object-fit: var(--site-logo-fit) !important;
  padding-top: var(--site-logo-padding-y) !important;
  padding-bottom: var(--site-logo-padding-y) !important;
  transition: all 0.2s ease-in-out;
}

/* Mobile & Offcanvas Header Logo */
.hamburger_logo img,
.mobile_logo img,
.hamburger_top .mobile_logo img,
.tj-offcanvas-area .hamburger_logo img,
.hamburger-area .hamburger_logo img {
  height: var(--site-logo-mobile-height) !important;
  max-height: var(--site-logo-mobile-height) !important;
  width: auto !important;
  max-width: 100% !important;
  object-fit: var(--site-logo-fit) !important;
}

/* Footer Logo */
.footer-logo {
  max-width: 280px !important;
  display: inline-block !important;
}

.footer-logo img,
.tj-footer-section .footer-logo img {
  height: var(--site-logo-footer-height) !important;
  max-height: var(--site-logo-footer-height) !important;
  width: auto !important;
  max-width: 100% !important;
  object-fit: var(--site-logo-fit) !important;
}
</style>

