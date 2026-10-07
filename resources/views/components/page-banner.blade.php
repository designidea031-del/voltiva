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
        }
        @media (max-width: 767px) {
            .tj-page-header {
                width: calc(100% - 24px) !important;
                margin-left: 12px !important;
                margin-right: 12px !important;
                border-radius: 10px !important;
                min-height: 240px !important;
            }
        }
        @if($mobileImage)
        @media (max-width: 767px) {
            #{{ $uniqueId }}.tj-page-header {
                background-image: url('{{ $mobileImage }}') !important;
            }
        }
        @endif
    </style>

    <div class="page-header-dimmer" style="position: absolute; inset: 0; background: rgba(14, 19, 30, {{ $overlayOpacity }}); z-index: 1; pointer-events: none;"></div>

    <div class="container" style="position: relative; z-index: 2;">
        <div class="row">
            <div class="col-lg-12">
                <div class="tj-page-header-content text-center">
                    <h1 class="tj-page-title" style="color: #ffffff;">{{ $displayTitle }}</h1>

                    @if(!empty($subtitle))
                        <p class="tj-page-subtitle" style="color: rgba(255, 255, 255, 0.9); font-size: 16px; max-width: 680px; margin: 10px auto 16px; font-weight: 500; line-height: 1.55;">
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

