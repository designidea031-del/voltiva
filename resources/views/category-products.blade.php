<!doctype html>
<html class="no-js" lang="en">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Dynamic SEO Meta Tags -->
   <x-seo-head page="products" :title="isset($category) ? $category->name . ' - Electrical Products' : 'Category Products'" />
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
            <x-page-banner page="product" :defaultTitle="$category->name" :currentTitle="$category->name" parentTitle="Home" parentRoute="home-2" subParentTitle="Categories" subParentRoute="product" />
            <!-- end: Breadcrumb Section -->

            <!-- start: Shop Section -->
            <div class="tj-product-area section-gap slidebar-stickiy-container">
               <div class="container">
                  <div class="row rg-50">
                     <div class="col-xl-12 col-lg-12 col-md-12">

                        <div class="tj-shop-item-wrapper">
                           
                            <style>
                               /* Subcategory Section Header */
                               .subcategory-header-wrap {
                                  display: flex;
                                  align-items: center;
                                  justify-content: space-between;
                                  flex-wrap: wrap;
                                  gap: 12px;
                                  border-bottom: 2px solid #eef2f5;
                                  padding-bottom: 14px;
                                  margin-bottom: 28px;
                               }
                               .subcategory-title-corporate {
                                  color: #0c1e21;
                                  font-weight: 800;
                                  font-size: 22px;
                                  letter-spacing: 0.3px;
                                  text-transform: uppercase;
                                  position: relative;
                                  margin: 0;
                                  padding-left: 14px;
                                  border-left: 4px solid var(--tj-color-theme-primary, #1e8a8a);
                               }
                               .subcategory-badge-count {
                                  font-size: 12px;
                                  font-weight: 600;
                                  color: #1e8a8a;
                                  background: rgba(30, 138, 138, 0.08);
                                  padding: 6px 14px;
                                  border-radius: 30px;
                                  border: 1px solid rgba(30, 138, 138, 0.15);
                               }

                               /* Corporate Product Card */
                               .accura-product-card {
                                  background: #ffffff;
                                  border: 1px solid #e8eeef;
                                  border-radius: 16px;
                                  padding: 20px;
                                  position: relative;
                                  transition: all 0.35s cubic-bezier(0.16, 1, 0.3, 1);
                                  box-shadow: 0 4px 18px -2px rgba(12, 30, 33, 0.04);
                                  display: flex;
                                  flex-direction: column;
                                  height: 100%;
                                  overflow: hidden;
                               }
                               .accura-product-card::before {
                                  content: '';
                                  position: absolute;
                                  top: 0;
                                  left: 0;
                                  right: 0;
                                  height: 3px;
                                  background: linear-gradient(90deg, #1e8a8a, #43b3b3);
                                  opacity: 0;
                                  transition: opacity 0.35s ease;
                               }
                               .accura-product-card:hover {
                                  transform: translateY(-6px);
                                  border-color: rgba(30, 138, 138, 0.3);
                                  box-shadow: 0 20px 35px -8px rgba(30, 138, 138, 0.14), 0 8px 16px -4px rgba(12, 30, 33, 0.04);
                               }
                               .accura-product-card:hover::before {
                                  opacity: 1;
                               }

                               /* Top Card Bar (Code & Size Badges) */
                               .accura-card-header {
                                  display: flex;
                                  align-items: center;
                                  justify-content: space-between;
                                  gap: 8px;
                                  margin-bottom: 12px;
                               }
                               .accura-card-badge-code {
                                  display: inline-flex;
                                  align-items: center;
                                  gap: 5px;
                                  font-size: 11px;
                                  font-weight: 700;
                                  color: #1e8a8a;
                                  background: rgba(30, 138, 138, 0.08);
                                  padding: 4px 10px;
                                  border-radius: 6px;
                                  text-transform: uppercase;
                                  letter-spacing: 0.5px;
                                  border: 1px solid rgba(30, 138, 138, 0.12);
                               }
                               .accura-card-badge-size {
                                  display: inline-flex;
                                  align-items: center;
                                  gap: 4px;
                                  font-size: 11px;
                                  font-weight: 700;
                                  color: #364e52;
                                  background: #f1f5f6;
                                  padding: 4px 10px;
                                  border-radius: 6px;
                                  letter-spacing: 0.4px;
                                  border: 1px solid #e2e8ea;
                               }

                               /* Card Image Presentation Showcase */
                               .accura-card-image-box {
                                  position: relative;
                                  background: radial-gradient(circle at center, #ffffff 30%, #f4f8f9 100%);
                                  border: 1px solid #edf2f4;
                                  border-radius: 12px;
                                  padding: 18px 12px;
                                  height: 200px;
                                  display: flex;
                                  align-items: center;
                                  justify-content: center;
                                  margin-bottom: 16px;
                                  overflow: hidden;
                               }
                               .accura-card-image-box img {
                                  max-width: 100%;
                                  max-height: 100%;
                                  object-fit: contain;
                                  filter: drop-shadow(0 8px 18px rgba(12, 30, 33, 0.08));
                                  transition: transform 0.45s cubic-bezier(0.16, 1, 0.3, 1);
                               }
                               .accura-product-card:hover .accura-card-image-box img {
                                  transform: scale(1.06);
                               }

                               /* Product Title */
                               .accura-product-title {
                                  color: #0c1e21;
                                  font-size: 16px;
                                  font-weight: 700;
                                  line-height: 1.35;
                                  margin-bottom: 14px;
                                  text-transform: uppercase;
                                  letter-spacing: 0.2px;
                                  text-align: center;
                                  display: flex;
                                  align-items: center;
                                  justify-content: center;
                                  min-height: 44px;
                               }

                               /* Modern Specs Grid */
                               .accura-specs-grid {
                                  display: grid;
                                  grid-template-columns: repeat(2, 1fr);
                                  gap: 8px;
                                  margin-bottom: 16px;
                               }
                               .accura-spec-item {
                                  background: #f8fafb;
                                  border: 1px solid #edf2f4;
                                  border-radius: 8px;
                                  padding: 7px 10px;
                                  display: flex;
                                  flex-direction: column;
                                  gap: 2px;
                                  transition: background 0.2s ease, border-color 0.2s ease;
                               }
                               .accura-product-card:hover .accura-spec-item {
                                  background: #f4f8f9;
                                  border-color: #e2ecf0;
                               }
                               .accura-spec-label {
                                  font-size: 10px;
                                  font-weight: 700;
                                  color: #839598;
                                  text-transform: uppercase;
                                  letter-spacing: 0.5px;
                                  line-height: 1.2;
                               }
                               .accura-spec-value {
                                  font-size: 13px;
                                  font-weight: 700;
                                  color: #111e22;
                                  line-height: 1.2;
                               }

                               /* Card Footer: Price & Action */
                               .accura-card-footer {
                                  border-top: 1px dashed #e2e8ea;
                                  padding-top: 14px;
                                  margin-top: auto;
                                  display: flex;
                                  align-items: center;
                                  justify-content: space-between;
                                  gap: 10px;
                               }
                               .accura-price-group {
                                  display: flex;
                                  flex-direction: column;
                               }
                               .accura-price-tagline {
                                  font-size: 10px;
                                  font-weight: 700;
                                  color: #839598;
                                  text-transform: uppercase;
                                  letter-spacing: 0.5px;
                                  line-height: 1;
                                  margin-bottom: 3px;
                               }
                               .accura-price-value {
                                  font-size: 19px;
                                  font-weight: 800;
                                  color: #0c1e21;
                                  line-height: 1.1;
                               }
                               .accura-price-value .currency {
                                  font-size: 14px;
                                  font-weight: 700;
                                  color: #1e8a8a;
                                  margin-right: 1px;
                               }

                               /* Action Button */
                               .accura-btn-enquire {
                                  display: inline-flex;
                                  align-items: center;
                                  justify-content: center;
                                  gap: 6px;
                                  background: #0c1e21;
                                  color: #ffffff !important;
                                  font-size: 12px;
                                  font-weight: 600;
                                  padding: 8px 14px;
                                  border-radius: 8px;
                                  text-decoration: none;
                                  transition: all 0.25s ease;
                                  white-space: nowrap;
                               }
                               .accura-btn-enquire i {
                                  font-size: 11px;
                                  transition: transform 0.25s ease;
                               }
                               .accura-btn-enquire:hover {
                                  background: #1e8a8a;
                                  box-shadow: 0 4px 12px rgba(30, 138, 138, 0.35);
                               }
                               .accura-btn-enquire:hover i {
                                  transform: translateX(3px);
                               }

                               /* Description if present */
                               .accura-product-desc {
                                  font-size: 13px;
                                  color: #67787a;
                                  line-height: 1.5;
                                  margin-bottom: 12px;
                                  display: -webkit-box;
                                  -webkit-line-clamp: 2;
                                  -webkit-box-orient: vertical;
                                  overflow: hidden;
                               }
                            </style>

                            @forelse($category->subCategories as $subCategory)
                            <div class="subcategory-section mb-5">
                                <div class="subcategory-header-wrap">
                                    <h2 class="subcategory-title-corporate">{{ $subCategory->title }}</h2>
                                    <span class="subcategory-badge-count">
                                        <i class="fa-solid fa-layer-group me-1"></i> {{ $subCategory->products->count() }} {{ \Illuminate\Support\Str::plural('Model', $subCategory->products->count()) }}
                                    </span>
                                </div>
                                
                                <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-1 accura-product-grid">
                                   @forelse($subCategory->products as $product)
                                      <div class="col accura-grid-item">
                                          <div class="accura-product-card">
                                              {{-- Card Header: Code & Size Badges --}}
                                              <div class="accura-card-header">
                                                  @if($product->code)
                                                  <span class="accura-card-badge-code">
                                                      <i class="fa-solid fa-hashtag"></i> {{ $product->code }}
                                                  </span>
                                                  @else
                                                  <span></span>
                                                  @endif

                                                  @if($product->size)
                                                  <span class="accura-card-badge-size">
                                                      <i class="fa-solid fa-microchip"></i> {{ $product->size }}
                                                  </span>
                                                  @endif
                                              </div>

                                              {{-- Showcase Product Image --}}
                                              <div class="accura-card-image-box">
                                                  @if($product->image)
                                                  <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" loading="lazy">
                                                  @else
                                                  <img src="{{ asset('assets/images/product/product-1.webp') }}" alt="{{ $product->title }}" loading="lazy">
                                                  @endif
                                              </div>

                                              {{-- Product Title --}}
                                              <h3 class="accura-product-title" title="{{ $product->title }}">
                                                  {{ $product->title }}
                                              </h3>

                                              {{-- Description if present --}}
                                              @if($product->description)
                                              <div class="accura-product-desc">
                                                 {!! strip_tags($product->description) !!}
                                              </div>
                                              @endif

                                              {{-- Corporate Specifications Grid --}}
                                              <div class="accura-specs-grid">
                                                  @if($product->code)
                                                  <div class="accura-spec-item">
                                                      <span class="accura-spec-label">Code</span>
                                                      <span class="accura-spec-value">{{ $product->code }}</span>
                                                  </div>
                                                  @endif

                                                  @if($product->size)
                                                  <div class="accura-spec-item">
                                                      <span class="accura-spec-label">Module / Size</span>
                                                      <span class="accura-spec-value">{{ $product->size }}</span>
                                                  </div>
                                                  @endif

                                                  @if($product->pkd)
                                                  <div class="accura-spec-item">
                                                      <span class="accura-spec-label">Pkg. Quantity</span>
                                                      <span class="accura-spec-value">{{ $product->pkd }} Pcs</span>
                                                  </div>
                                                  @endif

                                                  <div class="accura-spec-item">
                                                      <span class="accura-spec-label">Series Range</span>
                                                      <span class="accura-spec-value text-truncate" title="{{ $category->name }}">{{ $category->name }}</span>
                                                  </div>
                                              </div>

                                              {{-- Card Footer: MRP & Action --}}
                                              <div class="accura-card-footer">
                                                  <div class="accura-price-group">
                                                      <span class="accura-price-tagline">MRP (Incl. Taxes)</span>
                                                      @if($product->price)
                                                      <span class="accura-price-value">
                                                          <span class="currency">₹</span>{{ is_numeric($product->price) ? number_format((float)$product->price, 2) : $product->price }}
                                                      </span>
                                                      @else
                                                      <span class="accura-price-value" style="font-size: 15px; color: #1e8a8a;">
                                                          On Request
                                                      </span>
                                                      @endif
                                                  </div>

                                                  <a href="{{ route('contact') }}?product={{ urlencode($product->title . ($product->code ? ' (' . $product->code . ')' : '')) }}" class="accura-btn-enquire">
                                                      <span>Enquire</span>
                                                      <i class="fa-solid fa-arrow-right"></i>
                                                  </a>
                                              </div>
                                          </div>
                                      </div>
                                   @empty
                                   <div class="col-12">
                                      <p class="text-muted">No models in this subcategory.</p>
                                   </div>
                                   @endforelse
                                </div>
                            </div>
                            @empty
                            <div class="col-12">
                                <p class="text-center">No subcategories found in this category.</p>
                            </div>
                            @endforelse

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
