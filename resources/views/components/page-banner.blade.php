@props([
    'page' => 'about',
    'defaultTitle' => 'About Us',
    'parentTitle' => 'Home',
    'parentRoute' => 'home-2',
    'subParentTitle' => null,
    'subParentRoute' => null,
    'currentTitle' => null,
    'hideBreadcrumbs' => false,
])

@php
    $banner = \App\Models\PageBanner::forPage($page);
    $displayTitle = ($banner && !empty($banner->title)) ? $banner->title : ($currentTitle ?? $defaultTitle);
    $subtitle = $banner?->subtitle;
    $hasDesktopImage = $banner && !empty($banner->desktop_image);
    $bgImage = $hasDesktopImage 
        ? storage_asset($banner->desktop_image) 
        : (!empty($settings['breadcrumb_' . $page]) 
            ? storage_asset($settings['breadcrumb_' . $page]) 
            : (!empty($settings['breadcrumb_image']) 
                ? storage_asset($settings['breadcrumb_image']) 
                : asset('assets/images/bg/pheader-bg.webp')));
    
    $mobileImage = ($banner && !empty($banner->mobile_image)) ? storage_asset($banner->mobile_image) : null;
    $overlayOpacity = $banner ? ($banner->overlay_opacity / 100) : 0.45;
    $position = $banner?->banner_position ?? 'center';
    $buttonText = $banner?->button_text;
    $buttonLink = $banner?->button_link;
    $uniqueId = 'banner-' . preg_replace('/[^a-zA-Z0-9_-]/', '-', $page);
@endphp

<section id="{{ $uniqueId }}" class="tj-page-header section-gap-x"
         data-bg-image="{{ $bgImage }}"
         style="background-image: url('{{ $bgImage }}'); background-position: {{ $position }}; position: relative; overflow: hidden;">
    
    <style>
        .tj-page-header {
            width: calc(100% - 30px) !important;
            max-width: none !important;
            margin-left: 15px !important;
            margin-right: 15px !important;
            aspect-ratio: 1600 / 533;
            background-size: cover !important;
            background-position: center center !important;
            background-repeat: no-repeat !important;
            border-radius: 14px !important;
            display: flex !important;
            align-items: flex-end !important;
            justify-content: flex-start !important;
            padding-top: clamp(24px, 3.8vw, 55px) !important;
            padding-bottom: clamp(24px, 3.8vw, 55px) !important;
            padding-left: clamp(15px, 2.5vw, 35px) !important;
            padding-right: clamp(15px, 2.5vw, 35px) !important;
            position: relative !important;
            overflow: hidden !important;
        }
        @media (max-width: 767px) {
            .tj-page-header {
                width: calc(100% - 24px) !important;
                margin-left: 12px !important;
                margin-right: 12px !important;
                border-radius: 10px !important;
                min-height: 250px !important;
                padding-bottom: 20px !important;
                padding-left: 15px !important;
                padding-right: 15px !important;
            }
        }
        @if($mobileImage)
        @media (max-width: 767px) {
            #{{ $uniqueId }}.tj-page-header {
                background-image: url('{{ $mobileImage }}') !important;
            }
        }
        @endif
        .tj-page-header .tj-page-header-content {
            text-align: left !important;
        }
        .tj-page-header .tj-page-title {
            color: #ffffff !important;
            font-size: clamp(22px, 3.4vw, 48px) !important;
            font-weight: 700 !important;
            line-height: 1.15 !important;
            margin-bottom: 0 !important;
            text-align: left !important;
            text-shadow: 0 2px 12px rgba(0, 0, 0, 0.45) !important;
        }
        .tj-page-header .tj-page-subtitle {
            color: rgba(255, 255, 255, 0.92) !important;
            font-size: clamp(13px, 1.15vw, 16px) !important;
            max-width: 620px !important;
            margin: 8px 0 14px 0 !important;
            font-weight: 400 !important;
            line-height: 1.55 !important;
            text-align: left !important;
            text-shadow: 0 1px 8px rgba(0, 0, 0, 0.45) !important;
        }
        .tj-page-header .tj-page-link {
            margin-top: clamp(6px, 1vw, 14px) !important;
            display: inline-flex !important;
            align-items: center !important;
            justify-content: flex-start !important;
            gap: clamp(4px, 0.8vw, 8px) !important;
            background: rgba(15, 23, 42, 0.5) !important;
            backdrop-filter: blur(12px) !important;
            -webkit-backdrop-filter: blur(12px) !important;
            border: 1px solid rgba(255, 255, 255, 0.18) !important;
            padding: clamp(4px, 0.6vw, 7px) clamp(10px, 1.2vw, 18px) !important;
            border-radius: 50px !important;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.18) !important;
        }
        .tj-page-header .tj-page-link span {
            color: #ffffff !important;
            font-size: clamp(11px, 1vw, 14px) !important;
        }
        .tj-page-header .tj-page-link span i {
            font-size: clamp(10px, 0.9vw, 13px) !important;
            opacity: 0.85 !important;
        }
        .tj-page-header .tj-page-link span a {
            color: rgba(255, 255, 255, 0.85) !important;
            transition: color 0.2s ease !important;
        }
        .tj-page-header .tj-page-link span a:hover {
            color: #00b4d8 !important;
        }
    </style>

    <div class="page-header-dimmer" style="position: absolute; inset: 0; background: linear-gradient(90deg, rgba(10, 14, 23, {{ min(1, $overlayOpacity + 0.35) }}) 0%, rgba(10, 14, 23, {{ $overlayOpacity }}) 50%, rgba(10, 14, 23, {{ max(0.08, $overlayOpacity - 0.25) }}) 100%); z-index: 1; pointer-events: none;"></div>

    <div class="container" style="position: relative; z-index: 2; width: 100%; max-width: 100%; padding-left: 0; padding-right: 0;">
        <div class="row align-items-end">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="tj-page-header-content text-start">
                    <h1 class="tj-page-title" style="color: #ffffff;">{{ $displayTitle }}</h1>

                    @if(!empty($subtitle))
                        <p class="tj-page-subtitle">
                            {{ $subtitle }}
                        </p>
                    @endif

                    @if(!$hideBreadcrumbs)
                        <div class="tj-page-link">
                            <span><i class="tji-home"></i></span>
                            <span>
                                <a href="{{ route($parentRoute) }}">{{ $parentTitle }}</a>
                            </span>
                            @if(!empty($subParentTitle))
                                <span><i class="tji-arrow-right"></i></span>
                                <span>
                                    @if(!empty($subParentRoute))
                                        <a href="{{ route($subParentRoute) }}">{{ $subParentTitle }}</a>
                                    @else
                                        <span>{{ $subParentTitle }}</span>
                                    @endif
                                </span>
                            @endif
                            <span><i class="tji-arrow-right"></i></span>
                            <span>
                                <span>{{ $currentTitle ?? $defaultTitle }}</span>
                            </span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="page-header-overlay" data-bg-image="{{ asset('assets/images/shape/pheader-overlay.webp') }}" style="z-index: 1;"></div>
</section>

