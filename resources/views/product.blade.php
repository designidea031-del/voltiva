<!doctype html>
<html class="no-js" lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Dynamic SEO Meta Tags -->
   <x-seo-head page="products" title="Electrical Products & Modular Switches" />
   @php
       $site_settings = \App\Models\Setting::pluck('value', 'key')->toArray();
       $logo = isset($site_settings['site_logo']) ? storage_asset($site_settings['site_logo']) : asset('assets/images/logos/logo.webp');
   @endphp

   <!-- CSS here -->
   <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-pro.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/bexon-icons.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/venobox.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/odometer-theme-default.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/meanmenu.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}?v=2.5">
   <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}" />
</head>

<body>
   <div class="body-overlay"></div>

   <x-preloader />

   <!-- back to top start -->
   <div id="tj-back-to-top"><span id="tj-back-to-top-percentage"></span></div>
   <!-- back to top end -->

   <!-- start: Search Popup -->
   <div class="search-popup-overlay"></div>
   <!-- end: Search Popup -->

   <x-offcanvas-menu />

   <!-- start: Header Area -->
   <header class="header-area header-1 section-gap-x">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="header-wrapper">
                  <!-- site logo -->
                  <div class="site_logo">
                     <a class="logo" href="{{ route('home') }}"><img src="{{ $logo }}" alt="Logo"></a>
                  </div>

                              <!-- navigation -->
            <div class="menu-area d-none d-lg-inline-flex align-items-center">
              <nav id="mobile-menu" class="mainmenu">
                <ul>
                  <li><a href="{{ route('home') }}">Home</a></li>
                  <li><a href="{{ route('about') }}">About</a></li>
                  <li><a href="{{ route('product') }}">Product</a></li>
                  <li><a href="{{ route('blog') }}">Blog</a></li>
                  <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
              </nav>
            </div>

                  <!-- header right info -->
                  <div class="header-right-item d-none d-lg-inline-flex">
                     <div class="header-search">
                        <button class="search">
                           <i class="tji-search"></i>
                        </button>
                        <button type="button" class="search_close_btn">
                           <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                 stroke-linejoin="round" />
                              <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                 stroke-linejoin="round" />
                           </svg>
                        </button>
                     </div>
                     <div class="header-button">
                        <a class="tj-primary-btn" href="{{ route('contact') }}">
                           <span class="btn-text"><span>Let’s Talk</span></span>
                           <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                        </a>
                     </div>
                     <div class="menu_bar menu_offcanvas d-none d-lg-inline-flex">
                        <span></span>
                        <span></span>
                        <span></span>
                     </div>
                  </div>

                  <!-- menu bar -->
                  <div class="menu_bar mobile_menu_bar d-lg-none">
                     <span></span>
                     <span></span>
                     <span></span>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Search Popup -->
      <div class="search_popup">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-8">
                  <div class="tj_search_wrapper">
                     <div class="search_form">
                        <form action="#">
                           <div class="search_input">
                              <div class="search-box">
                                 <input class="search-form-input" type="text" placeholder="Type Words and Hit Enter"
                                    required>
                                 <button type="submit">
                                    <i class="tji-search"></i>
                                 </button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- end: Header Area -->

   <!-- start: Header Area -->
   <header class="header-area header-1 header-duplicate header-sticky section-gap-x">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="header-wrapper">
                  <!-- site logo -->
                  <div class="site_logo">
                     <a class="logo" href="{{ route('home') }}"><img src="{{ $logo }}" alt="Logo"></a>
                  </div>

                  <!-- navigation -->
                  <div class="menu-area d-none d-lg-inline-flex align-items-center">
                     <nav class="mainmenu">
                        <ul>
                           
                  <li><a href="{{ route('home') }}">Home</a></li>
                  <li><a href="{{ route('about') }}">About</a></li>
                  <li><a href="{{ route('product') }}">Product</a></li>
                  <li><a href="{{ route('blog') }}">Blog</a></li>
                  <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
                     </nav>
                  </div>

                  <!-- header right info -->
                  <div class="header-right-item d-none d-lg-inline-flex">
                     <div class="header-search">
                        <button class="search">
                           <i class="tji-search"></i>
                        </button>
                        <button type="button" class="search_close_btn">
                           <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                 stroke-linejoin="round" />
                              <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                 stroke-linejoin="round" />
                           </svg>
                        </button>
                     </div>
                     <div class="header-button">
                        <a class="tj-primary-btn" href="{{ route('contact') }}">
                           <span class="btn-text"><span>Let’s Talk</span></span>
                           <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                        </a>
                     </div>
                     <div class="menu_bar menu_offcanvas d-none d-lg-inline-flex">
                        <span></span>
                        <span></span>
                        <span></span>
                     </div>
                  </div>

                  <!-- menu bar -->
                  <div class="menu_bar mobile_menu_bar d-lg-none">
                     <span></span>
                     <span></span>
                     <span></span>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- Search Popup -->
      <div class="search_popup">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-8">
                  <div class="tj_search_wrapper">
                     <div class="search_form">
                        <form action="#">
                           <div class="search_input">
                              <div class="search-box">
                                 <input class="search-form-input" type="text" placeholder="Type Words and Hit Enter"
                                    required>
                                 <button type="submit">
                                    <i class="tji-search"></i>
                                 </button>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </header>
   <!-- end: Header Area -->

   <div id="smooth-wrapper">
      <div id="smooth-content">
         <main id="primary" class="site-main">
            <div class="space-for-header"></div>
            <!-- start: Breadcrumb Section -->
            <style>
               .tj-page-header {
                  width: calc(100% - 30px) !important;
                  max-width: none !important;
                  margin-left: 15px !important;
                  margin-right: 15px !important;
                  aspect-ratio: 1600 / 533 !important;
                  height: auto !important;
                  min-height: unset !important;
                  max-height: unset !important;
                  padding-top: 0 !important;
                  padding-bottom: 0 !important;
                  padding-left: 0 !important;
                  padding-right: 0 !important;
                  display: flex !important;
                  align-items: center !important;
                  justify-content: center !important;
                  background-position: center center !important;
                  background-size: cover !important;
                  background-repeat: no-repeat !important;
                  border-radius: 14px;
                  position: relative;
                  overflow: hidden;
                  z-index: 2;
               }
               @media (max-width: 767px) {
                  .tj-page-header {
                     width: calc(100% - 24px) !important;
                     margin-left: 12px !important;
                     margin-right: 12px !important;
                     border-radius: 10px;
                     min-height: 240px;
                  }
               }
               .tj-page-header > .container {
                  width: 100% !important;
                  position: relative;
                  z-index: 2;
               }
               .tj-page-header .tj-page-title {
                  color: #ffffff !important;
                  font-size: clamp(18px, 3.2vw, 46px) !important;
                  font-weight: 700;
                  line-height: 1.1;
                  margin-bottom: 0;
                  text-align: center;
               }
               .tj-page-header .tj-page-link {
                  margin-top: clamp(4px, 1.2vw, 16px) !important;
                  display: inline-flex;
                  align-items: center;
                  justify-content: center;
                  gap: clamp(4px, 0.8vw, 8px);
                  background: rgba(255, 255, 255, 0.2);
                  backdrop-filter: blur(10px);
                  padding: clamp(2px, 0.6vw, 6px) clamp(8px, 1.5vw, 18px);
                  border-radius: 50px;
               }
               .tj-page-header .tj-page-link span {
                  color: #ffffff;
                  font-size: clamp(10px, 1.1vw, 15px) !important;
               }
               .tj-page-header .tj-page-link span i {
                  font-size: clamp(9px, 1vw, 14px) !important;
               }
            </style>
            <x-page-banner page="product" defaultTitle="Products" parentTitle="Home" parentRoute="home-2" />
            <!-- end: Breadcrumb Section -->

            <!-- start: Shop Section -->
            <div class="tj-product-area section-gap">
               <div class="container">
                  <div class="row">
                     <div class="col-12">

                        <style>
                           /* Catalog Header Intro */
                           .catalog-intro-area {
                              text-align: center;
                              max-width: 860px;
                              margin: 0 auto 40px;
                           }
                           .catalog-pill-badge {
                              display: -webkit-inline-box;
                              display: -ms-inline-flexbox;
                              display: inline-flex;
                              -webkit-box-align: center;
                              -ms-flex-align: center;
                              align-items: center;
                              gap: 6px;
                              font-family: var(--tj-ff-heading);
                              font-size: 13px;
                              letter-spacing: 1.4px;
                              text-transform: uppercase;
                              font-weight: var(--tj-fw-bold);
                              color: var(--tj-color-theme-primary);
                              background-color: var(--tj-color-theme-bg);
                              border: 1px dashed rgba(30, 138, 138, 0.4);
                              padding: 4px 14px;
                              border-radius: 4px;
                              margin-bottom: 16px;
                           }
                           .catalog-pill-badge i {
                              font-size: 16px;
                              color: var(--tj-color-theme-primary);
                           }
                           .catalog-main-title {
                              font-family: var(--tj-ff-heading);
                              color: var(--tj-color-heading-primary);
                              font-size: 42px;
                              font-weight: 700;
                              letter-spacing: -0.5px;
                              line-height: 1.2;
                              margin-bottom: 16px;
                           }
                           .catalog-main-title span {
                              color: var(--tj-color-theme-primary);
                           }
                           @media (max-width: 768px) {
                              .catalog-main-title { font-size: 28px; }
                           }
                           .catalog-subtitle {
                              font-family: var(--tj-ff-body);
                              color: var(--tj-color-text-body);
                              font-size: 16px;
                              line-height: 1.7;
                              max-width: 740px;
                              margin: 0 auto;
                           }

                           /* Trust Strip */
                           .catalog-trust-strip {
                              display: grid;
                              grid-template-columns: repeat(4, 1fr);
                              gap: 20px;
                              margin-top: 35px;
                              margin-bottom: 50px;
                              text-align: left;
                           }
                           @media (max-width: 991px) {
                              .catalog-trust-strip { grid-template-columns: repeat(2, 1fr); gap: 15px; }
                           }
                           @media (max-width: 575px) {
                              .catalog-trust-strip { grid-template-columns: 1fr; }
                           }
                           .trust-card-item {
                              background: var(--tj-color-common-white);
                              border: 1px solid var(--tj-color-border-1);
                              border-radius: 12px;
                              padding: 16px 18px;
                              display: flex;
                              align-items: center;
                              gap: 15px;
                              transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
                              box-shadow: 0 4px 15px rgba(12, 30, 33, 0.03);
                           }
                           .trust-card-item:hover {
                              border-color: var(--tj-color-theme-primary);
                              transform: translateY(-3px);
                              box-shadow: 0 10px 22px rgba(30, 138, 138, 0.12);
                           }
                           .trust-card-icon {
                              width: 46px;
                              height: 46px;
                              border-radius: 10px;
                              background: var(--tj-color-theme-bg);
                              border: 1px solid rgba(30, 138, 138, 0.2);
                              color: var(--tj-color-theme-primary);
                              display: flex;
                              align-items: center;
                              justify-content: center;
                              font-size: 19px;
                              flex-shrink: 0;
                              transition: all 0.3s ease;
                           }
                           .trust-card-item:hover .trust-card-icon {
                              background: var(--tj-color-theme-primary);
                              color: var(--tj-color-common-white);
                           }
                           .trust-card-body strong {
                              display: block;
                              font-family: var(--tj-ff-heading);
                              font-size: 15px;
                              color: var(--tj-color-heading-primary);
                              font-weight: 700;
                              line-height: 1.3;
                              margin-bottom: 3px;
                           }
                           .trust-card-body span {
                              display: block;
                              font-family: var(--tj-ff-body);
                              font-size: 13px;
                              color: var(--tj-color-text-body-3);
                              line-height: 1.3;
                           }

                           /* Section Header */
                           .categories-section-header {
                              display: flex;
                              align-items: center;
                              justify-content: space-between;
                              flex-wrap: wrap;
                              gap: 14px;
                              border-bottom: 2px solid var(--tj-color-grey-1);
                              padding-bottom: 16px;
                              margin-bottom: 32px;
                           }
                           .categories-section-title {
                              font-family: var(--tj-ff-heading);
                              font-size: 22px;
                              font-weight: 700;
                              color: var(--tj-color-heading-primary);
                              text-transform: uppercase;
                              letter-spacing: 0.5px;
                              margin: 0;
                              padding-left: 14px;
                              border-left: 4px solid var(--tj-color-theme-primary);
                              line-height: 1.2;
                           }
                           .categories-count-badge {
                              font-family: var(--tj-ff-heading);
                              font-size: 13px;
                              font-weight: 700;
                              color: var(--tj-color-theme-primary);
                              background: var(--tj-color-theme-bg);
                              padding: 6px 16px;
                              border-radius: 30px;
                              border: 1px solid rgba(30, 138, 138, 0.2);
                           }

                           /* Structured Corporate Category Card (Compact & Sleek) */
                           .corporate-category-card {
                              background: var(--tj-color-common-white);
                              border: 1px solid var(--tj-color-border-1);
                              border-radius: 14px;
                              padding: 16px;
                              position: relative;
                              transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
                              box-shadow: 0 4px 16px -2px rgba(12, 30, 33, 0.04);
                              display: flex;
                              flex-direction: column;
                              height: 100%;
                              overflow: hidden;
                           }
                           .corporate-category-card::before {
                              content: '';
                              position: absolute;
                              top: 0;
                              left: 0;
                              right: 0;
                              height: 3px;
                              background: linear-gradient(90deg, var(--tj-color-theme-primary), #3db2b2);
                              opacity: 0;
                              transition: opacity 0.35s ease;
                           }
                           .corporate-category-card:hover {
                              transform: translateY(-6px);
                              border-color: var(--tj-color-theme-primary);
                              box-shadow: 0 16px 30px -6px rgba(30, 138, 138, 0.16), 0 6px 12px -2px rgba(12, 30, 33, 0.04);
                           }
                           .corporate-category-card:hover::before {
                              opacity: 1;
                           }

                           /* Card Header Bar */
                           .cat-card-header {
                              display: flex;
                              align-items: center;
                              justify-content: space-between;
                              gap: 8px;
                              margin-bottom: 12px;
                           }
                           .cat-badge-series {
                              display: inline-flex;
                              align-items: center;
                              gap: 5px;
                              font-family: var(--tj-ff-heading);
                              font-size: 11px;
                              font-weight: 700;
                              color: var(--tj-color-heading-primary);
                              background: var(--tj-color-grey-1);
                              padding: 3px 8px;
                              border-radius: 5px;
                              text-transform: uppercase;
                              letter-spacing: 0.5px;
                              border: 1px solid var(--tj-color-border-1);
                           }
                           .cat-badge-count {
                              display: inline-flex;
                              align-items: center;
                              gap: 5px;
                              font-family: var(--tj-ff-heading);
                              font-size: 11px;
                              font-weight: 700;
                              color: var(--tj-color-theme-primary);
                              background: var(--tj-color-theme-bg);
                              padding: 3px 8px;
                              border-radius: 5px;
                              border: 1px solid rgba(30, 138, 138, 0.2);
                           }

                           /* Image Stage */
                           .cat-card-image-box {
                              position: relative;
                              background: radial-gradient(circle at center, #ffffff 40%, var(--tj-color-grey-1) 100%);
                              border: 1px solid var(--tj-color-border-1);
                              border-radius: 10px;
                              height: 180px;
                              display: flex;
                              align-items: center;
                              justify-content: center;
                              padding: 14px 10px;
                              margin-bottom: 14px;
                              overflow: hidden;
                           }
                           .cat-card-image-box img {
                              max-width: 100%;
                              max-height: 100%;
                              object-fit: contain;
                              filter: drop-shadow(0 6px 14px rgba(12, 30, 33, 0.08));
                              transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
                           }
                           .corporate-category-card:hover .cat-card-image-box img {
                              transform: scale(1.06);
                           }

                           /* Title */
                           .cat-card-title {
                              font-family: var(--tj-ff-heading);
                              font-size: 18px;
                              font-weight: 700;
                              color: var(--tj-color-heading-primary);
                              margin-bottom: 0;
                              line-height: 1.3;
                              text-align: center;
                           }
                           .cat-card-title a {
                              color: inherit;
                              text-decoration: none;
                              transition: color 0.2s ease;
                           }
                           .corporate-category-card:hover .cat-card-title a {
                              color: var(--tj-color-theme-primary);
                           }

                           /* Footer */
                           .cat-card-footer {
                              border-top: 1px dashed var(--tj-color-border-1);
                              padding-top: 12px;
                              margin-top: 14px;
                              display: flex;
                              align-items: center;
                              justify-content: space-between;
                              gap: 8px;
                           }
                           .cat-stat-info {
                              display: flex;
                              align-items: center;
                              gap: 6px;
                              font-family: var(--tj-ff-body);
                              font-size: 13px;
                              font-weight: 600;
                              color: var(--tj-color-text-body-3);
                           }
                           .cat-stat-info i {
                              color: var(--tj-color-theme-primary);
                           }
                           .btn-cat-explore {
                              background: var(--tj-color-theme-dark);
                              color: var(--tj-color-common-white) !important;
                              font-family: var(--tj-ff-heading);
                              font-size: 12px;
                              font-weight: 700;
                              padding: 8px 16px;
                              border-radius: 6px;
                              display: inline-flex;
                              align-items: center;
                              gap: 6px;
                              text-decoration: none;
                              transition: all 0.25s ease;
                              white-space: nowrap;
                           }
                           .btn-cat-explore i {
                              font-size: 11px;
                              transition: transform 0.25s ease;
                           }
                           .btn-cat-explore:hover {
                              background: var(--tj-color-theme-primary);
                              box-shadow: 0 4px 12px rgba(30, 138, 138, 0.35);
                           }
                           .btn-cat-explore:hover i {
                              transform: translateX(3px);
                           }

                           /* Engineering Highlights Section */
                           .engineering-highlights-wrap {
                              background: var(--tj-color-grey-1);
                              border: 1px solid var(--tj-color-border-1);
                              border-radius: 18px;
                              padding: 45px 35px;
                              margin-top: 60px;
                           }
                           .eng-grid {
                              display: grid;
                              grid-template-columns: repeat(4, 1fr);
                              gap: 20px;
                              margin-top: 32px;
                           }
                           @media (max-width: 991px) {
                              .eng-grid { grid-template-columns: repeat(2, 1fr); }
                           }
                           @media (max-width: 575px) {
                              .eng-grid { grid-template-columns: 1fr; }
                           }
                           .eng-card {
                              background: var(--tj-color-common-white);
                              border: 1px solid var(--tj-color-border-1);
                              border-radius: 12px;
                              padding: 24px;
                              transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
                           }
                           .eng-card:hover {
                              transform: translateY(-4px);
                              border-color: var(--tj-color-theme-primary);
                              box-shadow: 0 10px 24px rgba(30, 138, 138, 0.1);
                           }
                           .eng-card-icon {
                              width: 48px;
                              height: 48px;
                              border-radius: 10px;
                              background: var(--tj-color-theme-bg);
                              border: 1px solid rgba(30, 138, 138, 0.2);
                              color: var(--tj-color-theme-primary);
                              display: flex;
                              align-items: center;
                              justify-content: center;
                              font-size: 20px;
                              margin-bottom: 16px;
                              transition: all 0.3s ease;
                           }
                           .eng-card:hover .eng-card-icon {
                              background: var(--tj-color-theme-primary);
                              color: var(--tj-color-common-white);
                           }
                           .eng-card h4 {
                              font-family: var(--tj-ff-heading);
                              font-size: 16px;
                              font-weight: 700;
                              color: var(--tj-color-heading-primary);
                              margin-bottom: 8px;
                           }
                           .eng-card p {
                              font-family: var(--tj-ff-body);
                              font-size: 13.5px;
                              color: var(--tj-color-text-body);
                              line-height: 1.6;
                              margin: 0;
                           }
                        </style>

                        {{-- 1. Catalog Header Intro --}}
                        <div class="catalog-intro-area">
                           <span class="catalog-pill-badge">
                              <i class="tji-dart-board"></i> Corporate Architectural Catalogue
                           </span>
                           <h2 class="catalog-main-title">Our Product Categories & <span>Series</span></h2>
                           <p class="catalog-subtitle">Explore precision-engineered modular switches, plates, footlights, and architectural accessories designed for modern residential and commercial spaces.</p>

                           {{-- Trust Badges Strip --}}
                           <div class="catalog-trust-strip">
                              <div class="trust-card-item">
                                 <div class="trust-card-icon"><i class="fa-solid fa-shield-halved"></i></div>
                                 <div class="trust-card-body">
                                    <strong>ISI Certified</strong>
                                    <span>Highest Fire Safety</span>
                                 </div>
                              </div>
                              <div class="trust-card-item">
                                 <div class="trust-card-icon"><i class="fa-solid fa-fingerprint"></i></div>
                                 <div class="trust-card-body">
                                    <strong>Ergonomic Click</strong>
                                    <span>100k+ Mechanical Ops</span>
                                 </div>
                              </div>
                              <div class="trust-card-item">
                                 <div class="trust-card-icon"><i class="fa-solid fa-layer-group"></i></div>
                                 <div class="trust-card-body">
                                    <strong>Modular Standard</strong>
                                    <span>1M to 18M Plates</span>
                                 </div>
                              </div>
                              <div class="trust-card-item">
                                 <div class="trust-card-icon"><i class="fa-solid fa-gem"></i></div>
                                 <div class="trust-card-body">
                                    <strong>Virgin Material</strong>
                                    <span>UV-Resistant Finish</span>
                                 </div>
                              </div>
                           </div>
                        </div>

                        {{-- 2. Section Title Bar --}}
                        <div class="categories-section-header">
                           <h3 class="categories-section-title">Available Product Series</h3>
                           <span class="categories-count-badge">
                              <i class="fa-solid fa-grid-2 me-1"></i> {{ $categories->count() }} {{ \Illuminate\Support\Str::plural('Series', $categories->count()) }}
                           </span>
                        </div>

                        {{-- 3. Structured Corporate Category Grid (Compact & Sleek) --}}
                        <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-1">
                           @forelse($categories as $category)
                           @php
                              $categoryProductsCount = $category->subCategories->sum(fn($sub) => $sub->products->count());
                              $categoryImg = storage_asset($category->image, 'assets/images/product/product-1.webp');
                           @endphp
                           <div class="col">
                              <div class="corporate-category-card">
                                 {{-- Card Top Header: Badges cleanly separated above the image --}}
                                 <div class="cat-card-header">
                                    <span class="cat-badge-series">
                                       <i class="fa-solid fa-layer-group"></i> Series
                                    </span>
                                    <span class="cat-badge-count">
                                       <i class="fa-solid fa-boxes-stacked me-1"></i> {{ $categoryProductsCount }} {{ \Illuminate\Support\Str::plural('Model', $categoryProductsCount) }}
                                    </span>
                                 </div>

                                 {{-- Image Stage --}}
                                 <div class="cat-card-image-box">
                                    <a href="{{ route('category.products', $category->id) }}" class="d-flex align-items-center justify-content-center w-100 h-100">
                                       <img src="{{ $categoryImg }}" alt="{{ $category->name }}" loading="lazy">
                                    </a>
                                 </div>

                                 {{-- Title --}}
                                 <h3 class="cat-card-title">
                                    <a href="{{ route('category.products', $category->id) }}">{{ $category->name }}</a>
                                 </h3>

                                 {{-- Card Footer --}}
                                 <div class="cat-card-footer">
                                    <div class="cat-stat-info">
                                       <i class="fa-solid fa-layer-group"></i>
                                       <span>{{ $category->subCategories->count() }} {{ \Illuminate\Support\Str::plural('Range', $category->subCategories->count()) }}</span>
                                    </div>

                                    <a href="{{ route('category.products', $category->id) }}" class="btn-cat-explore">
                                       <span>Explore</span>
                                       <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                 </div>
                              </div>
                           </div>
                           @empty
                           <div class="col-12 text-center py-5">
                              <p class="text-muted">No product categories found.</p>
                           </div>
                           @endforelse
                        </div>

                        {{-- 4. Corporate Engineering & Manufacturing Excellence Highlights --}}
                        <div class="engineering-highlights-wrap">
                           <div class="text-center">
                              <span class="catalog-pill-badge mb-2">
                                 <i class="tji-dart-board"></i> Manufacturing Excellence
                              </span>
                              <h3 class="sec-title" style="font-size: 32px; font-weight: 700; color: var(--tj-color-heading-primary); margin-top: 10px; margin-bottom: 12px;">
                                 Precision Built For Demanding <span>Architecture</span>
                              </h3>
                              <p style="font-family: var(--tj-ff-body); color: var(--tj-color-text-body); font-size: 15px; max-width: 620px; margin: 0 auto; line-height: 1.6;">
                                 Every mechanism and cover plate is manufactured to meet rigorous quality standards for safety, touch sensitivity, and aesthetics.
                              </p>
                           </div>

                           <div class="eng-grid">
                              <div class="eng-card">
                                 <div class="eng-card-icon"><i class="fa-solid fa-fire-flame-curved"></i></div>
                                 <h4>Fire Retardant Grade</h4>
                                 <p>Engineered with self-extinguishing polycarbonates capable of withstanding 850°C glow-wire safety testing.</p>
                              </div>

                              <div class="eng-card">
                                 <div class="eng-card-icon"><i class="fa-solid fa-bolt-lightning"></i></div>
                                 <h4>Silver Alloy Inlay</h4>
                                 <p>Heavy-duty silver contact points ensure low electrical resistance, zero arc welding, and whisper-silent switching.</p>
                              </div>

                              <div class="eng-card">
                                 <div class="eng-card-icon"><i class="fa-solid fa-shield-virus"></i></div>
                                 <h4>Child-Safe Shutters</h4>
                                 <p>Spring-loaded safety shutters automatically seal socket cavities to prevent accidental electrical contact.</p>
                              </div>

                              <div class="eng-card">
                                 <div class="eng-card-icon"><i class="fa-solid fa-wand-magic-sparkles"></i></div>
                                 <h4>Architectural Finish</h4>
                                 <p>UV-stabilized, anti-dust non-yellowing surface treatment ensures spotless long-term elegance on every wall.</p>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
            <!-- end: Shop Section -->

            <!-- start: Cta Section -->
            <section class="tj-cta-section">
               <div class="container">
                  <div class="row">
                     <div class="col-12">
                        <div class="cta-area">
                           <div class="cta-content">
                              <h2 class="title title-anim">Let’s Build Future Together.</h2>
                              <div class="cta-btn wow fadeInUp" data-wow-delay=".6s">
                                 <a class="tj-primary-btn btn-dark" href="{{ route('contact') }}">
                                    <span class="btn-text"><span>Get Started Now</span></span>
                                    <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                                 </a>
                              </div>
                           </div>
                           <div class="cta-img">
                              <img src="{{ asset('assets/images/cta/cta-bg.webp') }}" alt="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <!-- end: Cta Section -->
         </main>

         <!-- start: Footer Section -->
      <x-footer />
      <!-- end: Footer Section -->



         <!-- start: Product details modal Area -->
         <div id="tj-product-modal-1" style="display: none;">
            <div class="single-product woosq-product container">
               <div class="product row ">
                  <div class="col-12 col-md-6 thumbnails">
                     <div class="images tj-quick-details-slider swiper">
                        <div class="swiper-wrapper">
                           <div class="swiper-slide">
                              <div class="thumbnail"><img src="{{ asset('assets/images/product/product-1.webp') }}"
                                    class="attachment-woosq size-woosq" alt=""></div>
                           </div>
                           <div class="swiper-slide">
                              <div class="thumbnail"><img src="{{ asset('assets/images/product/product-2.webp') }}"
                                    class="attachment-woosq size-woosq" alt=""></div>
                           </div>
                           <div class="swiper-slide">
                              <div class="thumbnail"><img src="{{ asset('assets/images/product/product-3.webp') }}"
                                    class="attachment-woosq size-woosq" alt=""></div>
                           </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                     </div>
                  </div>
                  <div class="col-12 col-md-6 summary entry-summary">

                     <div class="summary-content ps-container ps-theme-wpc">
                        <div class="product-stock">
                           <span class="stock in-stock">10 in stock</span>
                        </div>
                        <h3 class="tj-product-details-title">Personal holding earbud</h3>

                        <div class="product-details__short-description">
                           <p>Experience true wireless freedom with our latest earbuds, designed to deliver
                              crystal-clear
                              sound and deep bass in compact, lightweight package. Perfectly crafted for everyday use,
                              these
                              earbuds feature.</p>
                        </div>
                        <div class="tj-product-details-action-wrapper">
                            <a href="{{ route('contact') }}" class="tj-product-details-buy-now-btn w-100">
                               <span class="btn-icon"><i class="fal fa-envelope"></i></span>
                               <span class="btn-text" style="margin-left: 8px;"><span>Inquire Now</span></span>
                            </a>
                        </div>
                        <div class="tj-product-details-query-item d-flex align-items-center">
                           <span>SKU:</span>
                           <p>SV-18</p>
                        </div>
                        <div class="tj-product-details-query-item d-flex align-items-center">
                           <span>Category: </span> <a href="{{ route('product') }}"
                              rel="tag">Modular Accessories</a>
                        </div>
                        <div class="tj-product-details-query-item d-flex align-items-center">
                           <span>Tag:</span> <a href="{{ route('product') }}"
                              rel="tag">Electrical Solutions</a>
                        </div>
                        <div class="ps-scrollbar-x-rail" style="left: 0px; bottom: 0px;">
                           <div class="ps-scrollbar-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                        </div>
                        <div class="ps-scrollbar-y-rail" style="top: 0px; right: 0px;">
                           <div class="ps-scrollbar-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                        </div>
                     </div>

                  </div>
               </div>
            </div>
         </div>
         <!-- end: Product details modal Area -->
      </div>
   </div>
   <!-- JS here -->
   <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
   <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('assets/js/gsap.min.js') }}"></script>
   <script src="{{ asset('assets/js/ScrollSmoother.js') }}"></script>
   <script src="{{ asset('assets/js/gsap-scroll-to-plugin.min.js') }}"></script>
   <script src="{{ asset('assets/js/gsap-scroll-trigger.min.js') }}"></script>
   <script src="{{ asset('assets/js/gsap-split-text.min.js') }}"></script>
   <script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
   <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
   <script src="{{ asset('assets/js/odometer.min.js') }}"></script>
   <script src="{{ asset('assets/js/venobox.min.js') }}"></script>
   <script src="{{ asset('assets/js/appear.min.js') }}"></script>
   <script src="{{ asset('assets/js/wow.min.js') }}"></script>
   <script src="{{ asset('assets/js/meanmenu.js') }}"></script>
   <script src="{{ asset('assets/js/range-slider.js') }}"></script>
   <script src="{{ asset('assets/js/main.js') }}"></script>
   <x-seo-footer />
</body>

</html>
