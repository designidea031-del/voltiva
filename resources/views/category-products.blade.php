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
            <x-page-banner page="product" :defaultTitle="$category->name" :currentTitle="$category->name" parentTitle="Home" parentRoute="home-2" subParentTitle="Categories" subParentRoute="product" />
            <!-- end: Breadcrumb Section -->

            <!-- start: Shop Section -->
            <div class="tj-product-area section-gap slidebar-stickiy-container">
               <div class="container">
                  <div class="row rg-50">
                     <div class="col-xl-12 col-lg-12 col-md-12">

                        <div class="tj-shop-item-wrapper">
                            
                             <style>
                                /* Subcategory Section - Transparent container without outer box */
                                .subcategory-section {
                                   margin-bottom: 50px;
                                   position: relative;
                                }

                                .subcategory-header-wrap {
                                   display: flex;
                                   align-items: center;
                                   justify-content: space-between;
                                   flex-wrap: wrap;
                                   gap: 14px;
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
                                   line-height: 1.2;
                                }
                                .subcategory-badge-count {
                                   font-size: 12px;
                                   font-weight: 700;
                                   color: #1e8a8a;
                                   background: rgba(30, 138, 138, 0.08);
                                   padding: 6px 14px;
                                   border-radius: 30px;
                                   border: 1px solid rgba(30, 138, 138, 0.15);
                                   white-space: nowrap;
                                }

                                /* Corporate Product Card (Separate individual boxes) */
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
                                   margin-right: 1px;
                                   color: #1e8a8a;
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
                                   border: none;
                                   cursor: pointer;
                                   outline: none;
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

                                /* Voltiva Product Enquiry Modal Styling */
                                                                /* Product Modal High Z-Index & Backdrop Fix */
                                #productEnquiryModal {
                                   z-index: 100005 !important;
                                }
                                .modal-backdrop {
                                   z-index: 100000 !important;
                                }
                                .modal-backdrop.show {
                                   opacity: 0.65 !important;
                                }

                                .voltiva-enquiry-modal-content {
                                   border-radius: 20px !important;
                                   border: 1px solid rgba(0, 0, 0, 0.08) !important;
                                   box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.35) !important;
                                   overflow: hidden !important;
                                }
                                .voltiva-enquiry-header {
                                   background: #f8fafc;
                                   border-bottom: 1px solid #edf2f7;
                                   padding: 1.25rem 1.75rem;
                                }
                                .voltiva-modal-icon-badge {
                                   width: 42px;
                                   height: 42px;
                                   border-radius: 12px;
                                   background: rgba(30, 138, 138, 0.12);
                                   display: flex;
                                   align-items: center;
                                   justify-content: center;
                                   color: #1e8a8a;
                                   font-size: 1.15rem;
                                }
                                .voltiva-modal-product-summary {
                                   background: #f8fafc;
                                   border: 1px solid #edf2f7;
                                   border-radius: 14px;
                                   padding: 16px;
                                }
                                .modal-product-img-wrap {
                                   width: 82px;
                                   height: 82px;
                                   border-radius: 12px;
                                   background: #ffffff;
                                   border: 1px solid #e2e8f0;
                                   display: flex;
                                   align-items: center;
                                   justify-content: center;
                                   padding: 6px;
                                   overflow: hidden;
                                }
                                .modal-product-img-wrap img {
                                   max-width: 100%;
                                   max-height: 100%;
                                   object-fit: contain;
                                }
                                .voltiva-enquiry-modal-content .form-control:focus {
                                   border-color: #1e8a8a;
                                   box-shadow: 0 0 0 3px rgba(30, 138, 138, 0.15);
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
                             
                                 /* 3-Card Responsive Refinements */
                                 .accura-card-image-box {
                                    height: 220px;
                                 }
                                 @media (max-width: 1199px) {
                                    .accura-card-image-box {
                                       height: 205px;
                                    }
                                 }
                                 @media (max-width: 991px) {
                                    .accura-card-image-box {
                                       height: 200px;
                                    }
                                    .subcategory-title-corporate {
                                       font-size: 19px;
                                    }
                                 }
                                 @media (max-width: 767px) {
                                    .accura-product-card {
                                       padding: 16px;
                                    }
                                    .accura-card-image-box {
                                       height: 185px;
                                       padding: 12px 8px;
                                    }
                                    .subcategory-title-corporate {
                                       font-size: 17px;
                                       padding-left: 10px;
                                    }
                                    .subcategory-badge-count {
                                       font-size: 11px;
                                       padding: 4px 10px;
                                    }
                                    .accura-product-title {
                                       font-size: 15px;
                                       min-height: auto;
                                       margin-bottom: 10px;
                                    }
                                 }
                                 @media (max-width: 575px) {
                                    .accura-specs-grid {
                                       gap: 6px;
                                    }
                                    .accura-spec-item {
                                       padding: 6px 8px;
                                    }
                                    .accura-price-value {
                                       font-size: 17px;
                                    }
                                 }
                              </style>

                             @forelse($category->subCategories as $subCategory)
                             @if($subCategory->products->count() > 0)
                             <div class="subcategory-section mb-5">
                                 <div class="subcategory-header-wrap">
                                     <h2 class="subcategory-title-corporate">{{ $subCategory->title }}</h2>
                                     <span class="subcategory-badge-count">
                                         <i class="fa-solid fa-layer-group me-1"></i> {{ $subCategory->products->count() }} {{ \Illuminate\Support\Str::plural('Model', $subCategory->products->count()) }}
                                     </span>
                                 </div>
                                 
                                 <div class="row g-4 row-cols-xxl-3 row-cols-xl-3 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 accura-product-grid">
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
                                                   <img src="{{ storage_asset($product->image, 'assets/images/product/product-1.webp') }}" alt="{{ $product->title }}" loading="lazy">
                                               </div>

                                               {{-- Product Title --}}
                                               <h3 class="accura-product-title" title="{{ $product->title }}">
                                                   {{ $product->title }}
                                               </h3>

                                               {{-- Description if present & distinct --}}
                                               @if($product->description && strcasecmp(strip_tags($product->description), strip_tags($product->title)) !== 0)
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

                                                   <button type="button" 
                                                            class="accura-btn-enquire btn-open-enquiry-modal"
                                                            data-title="{{ $product->title }}"
                                                            data-code="{{ $product->code ?? '' }}"
                                                            data-size="{{ $product->size ?? '' }}"
                                                            data-pkd="{{ $product->pkd ? $product->pkd . ' Pcs' : '' }}"
                                                            data-price="{{ is_numeric($product->price) ? '₹' . number_format((float)$product->price, 2) : ($product->price ? '₹' . $product->price : 'On Request') }}"
                                                            data-image="{{ storage_asset($product->image, 'assets/images/product/product-1.webp') }}"
                                                            data-series="{{ $category->name }}">
                                                        <span>Enquire</span>
                                                        <i class="fa-solid fa-arrow-right"></i>
                                                    </button>
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
                             @endif
                             @empty
                             @endforelse

                             {{-- Direct Category Products (if any are created without a subcategory) --}}
                             @php
                                 $directProducts = $category->products->whereNull('sub_category_id');
                             @endphp
                             @if($directProducts->count() > 0)
                             <div class="subcategory-section mb-5">
                                 <div class="subcategory-header-wrap">
                                     <h2 class="subcategory-title-corporate">{{ $category->name }} - Additional Models</h2>
                                     <span class="subcategory-badge-count">
                                         <i class="fa-solid fa-layer-group me-1"></i> {{ $directProducts->count() }} {{ \Illuminate\Support\Str::plural('Model', $directProducts->count()) }}
                                     </span>
                                 </div>
                                 <div class="row g-4 row-cols-xxl-3 row-cols-xl-3 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 accura-product-grid">
                                     @foreach($directProducts as $product)
                                        <div class="col accura-grid-item">
                                            <div class="accura-product-card">
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

                                                <div class="accura-card-image-box">
                                                    <img src="{{ storage_asset($product->image, 'assets/images/product/product-1.webp') }}" alt="{{ $product->title }}" loading="lazy">
                                                </div>

                                                <h3 class="accura-product-title" title="{{ $product->title }}">
                                                    {{ $product->title }}
                                                </h3>

                                                @if($product->description && strcasecmp(strip_tags($product->description), strip_tags($product->title)) !== 0)
                                                <div class="accura-product-desc">
                                                   {!! strip_tags($product->description) !!}
                                                </div>
                                                @endif

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

                                                    <button type="button" 
                                                            class="accura-btn-enquire btn-open-enquiry-modal"
                                                            data-title="{{ $product->title }}"
                                                            data-code="{{ $product->code ?? '' }}"
                                                            data-size="{{ $product->size ?? '' }}"
                                                            data-pkd="{{ $product->pkd ? $product->pkd . ' Pcs' : '' }}"
                                                            data-price="{{ is_numeric($product->price) ? '₹' . number_format((float)$product->price, 2) : ($product->price ? '₹' . $product->price : 'On Request') }}"
                                                            data-image="{{ storage_asset($product->image, 'assets/images/product/product-1.webp') }}"
                                                            data-series="{{ $category->name }}">
                                                        <span>Enquire</span>
                                                        <i class="fa-solid fa-arrow-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                     @endforeach
                                 </div>
                             </div>
                             @endif

                             @if($category->subCategories->count() === 0 && $directProducts->count() === 0)
                             <div class="col-12 py-5 text-center">
                                 <p class="text-muted">No products currently available in this category.</p>
                             </div>
                             @endif

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



                  
      </div>
   </div>
   <!-- start: Dynamic Product Enquiry Modal -->
         <div class="modal fade" id="productEnquiryModal" tabindex="-1" aria-labelledby="productEnquiryModalLabel" aria-hidden="true" style="z-index: 99999;">
            <div class="modal-dialog modal-dialog-centered modal-lg">
               <div class="modal-content voltiva-enquiry-modal-content">
                  
                  <!-- Modal Header -->
                  <div class="modal-header voltiva-enquiry-header">
                     <div class="d-flex align-items-center gap-3">
                        <div class="voltiva-modal-icon-badge">
                           <i class="fa-solid fa-file-lines"></i>
                        </div>
                        <div>
                           <h5 class="modal-title mb-0 fw-bold text-dark" id="productEnquiryModalLabel">Product Inquiry</h5>
                           <small class="text-muted">Direct factory quotation & technical specifications</small>
                        </div>
                     </div>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>

                  <div class="modal-body p-4">
                     
                     <!-- Product Quick Summary Card -->
                     <div class="voltiva-modal-product-summary mb-4">
                        <div class="row align-items-center g-3">
                           <div class="col-auto">
                              <div class="modal-product-img-wrap">
                                 <img id="enquiryModalProductImg" src="" alt="Product Image" loading="lazy">
                              </div>
                           </div>
                           <div class="col">
                              <div class="d-flex flex-wrap align-items-center gap-2 mb-1">
                                 <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 py-1 font-monospace" id="enquiryModalProductCode"># ----</span>
                                 <span class="badge bg-light text-dark border px-2 py-1" id="enquiryModalProductSize">--</span>
                                 <span class="badge bg-light text-secondary border px-2 py-1" id="enquiryModalProductSeries">Series</span>
                              </div>
                              <h4 class="fw-bold mb-1 text-dark" id="enquiryModalProductTitle" style="font-size: 1.15rem;"></h4>
                              <div class="d-flex align-items-center gap-3">
                                 <span class="fw-bold text-success fs-5" id="enquiryModalProductPrice">₹0.00</span>
                                 <span class="text-muted small" id="enquiryModalProductPkd"></span>
                              </div>
                           </div>
                        </div>
                     </div>

                     <!-- Success Message Container (Hidden by default) -->
                     <div id="enquirySuccessBox" class="text-center py-4" style="display: none;">
                        <div class="mb-3">
                           <i class="fa-solid fa-circle-check text-success" style="font-size: 4rem;"></i>
                        </div>
                        <h4 class="fw-bold text-dark mb-2">Inquiry Submitted Successfully!</h4>
                        <p class="text-muted mb-4 mx-auto" style="max-width: 480px;" id="enquirySuccessText">
                           Thank you! Your inquiry has been sent to our sales & engineering team. We will contact you with pricing and details shortly.
                        </p>
                        <div class="d-flex justify-content-center gap-2">
                           <button type="button" class="btn btn-dark px-4 py-2 rounded-pill" data-bs-dismiss="modal">Close Window</button>
                           <a id="enquirySuccessWhatsAppBtn" href="#" target="_blank" class="btn btn-success px-4 py-2 rounded-pill">
                              <i class="fa-brands fa-whatsapp me-1"></i> Open in WhatsApp
                           </a>
                        </div>
                     </div>

                     <!-- Inquiry Form -->
                     <form id="voltivaProductEnquiryForm" method="POST" action="{{ route('contact.submit') }}">
                        @csrf
                        <input type="hidden" name="cfSubject" id="enquiryHiddenSubject" value="">
                        <input type="hidden" name="product_title" id="enquiryHiddenTitle" value="">
                        <input type="hidden" name="product_code" id="enquiryHiddenCode" value="">
                        <input type="hidden" name="source" value="Product Detail Modal">

                        <div id="enquiryErrorAlert" class="alert alert-danger py-2 px-3 small mb-3" style="display: none;"></div>

                        <div class="row g-3">
                           <!-- Full Name -->
                           <div class="col-md-6">
                              <label class="form-label fw-semibold small text-secondary">Your Name <span class="text-danger">*</span></label>
                              <div class="input-group">
                                 <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-user"></i></span>
                                 <input type="text" name="cfName" id="enquiryInputName" class="form-control border-start-0 ps-1" placeholder="Enter your full name" required>
                              </div>
                           </div>

                           <!-- Phone Number -->
                           <div class="col-md-6">
                              <label class="form-label fw-semibold small text-secondary">Phone Number <span class="text-danger">*</span></label>
                              <div class="input-group">
                                 <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-phone"></i></span>
                                 <input type="tel" name="cfPhone" id="enquiryInputPhone" class="form-control border-start-0 ps-1" placeholder="e.g. +91 98765 43210" required>
                              </div>
                           </div>

                           <!-- Email Address -->
                           <div class="col-md-6">
                              <label class="form-label fw-semibold small text-secondary">Email Address <span class="text-muted fw-normal">(Optional)</span></label>
                              <div class="input-group">
                                 <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-envelope"></i></span>
                                 <input type="email" name="cfEmail" id="enquiryInputEmail" class="form-control border-start-0 ps-1" placeholder="e.g. name@example.com">
                              </div>
                           </div>

                           <!-- Quantity Required -->
                           <div class="col-md-6">
                              <label class="form-label fw-semibold small text-secondary">Estimated Quantity <span class="text-muted fw-normal">(Optional)</span></label>
                              <div class="input-group">
                                 <span class="input-group-text bg-light border-end-0 text-muted"><i class="fa-solid fa-boxes-stacked"></i></span>
                                 <input type="text" name="quantity" id="enquiryInputQuantity" class="form-control border-start-0 ps-1" placeholder="e.g. 50 Pcs / 1 Box">
                              </div>
                           </div>

                           <!-- Message -->
                           <div class="col-12">
                              <label class="form-label fw-semibold small text-secondary">Message / Notes <span class="text-danger">*</span></label>
                              <textarea name="cfMessage" id="enquiryInputMessage" rows="3" class="form-control" placeholder="Specify your requirements or questions..." required></textarea>
                           </div>
                        </div>

                        <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mt-4 pt-2 border-top">
                           <a id="enquiryDirectWhatsAppBtn" href="#" target="_blank" class="btn btn-outline-success d-inline-flex align-items-center gap-2 fw-semibold px-3 py-2 rounded-3">
                              <i class="fa-brands fa-whatsapp fs-5"></i>
                              <span>Chat on WhatsApp</span>
                           </a>

                           <div class="d-flex gap-2">
                              <button type="button" class="btn btn-light px-3 py-2 rounded-3 border" data-bs-dismiss="modal">Cancel</button>
                              <button type="submit" id="enquirySubmitBtn" class="btn btn-dark d-inline-flex align-items-center gap-2 fw-semibold px-4 py-2 rounded-3" style="background:#0c1e21; border-color:#0c1e21;">
                                 <span id="enquirySubmitBtnSpinner" class="spinner-border spinner-border-sm" style="display: none;" role="status"></span>
                                 <span id="enquirySubmitBtnText">Send Inquiry</span>
                                 <i class="fa-solid fa-paper-plane" id="enquirySubmitBtnIcon"></i>
                              </button>
                           </div>
                        </div>
                     </form>

                  </div>
               </div>
            </div>
         </div>
         <!-- end: Dynamic Product Enquiry Modal -->

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
   <!-- Product Enquiry Modal Interactive JavaScript -->
   <script>
   document.addEventListener('DOMContentLoaded', function () {
      const modalEl = document.getElementById('productEnquiryModal');
      if (!modalEl) return;

      if (modalEl.parentElement !== document.body) { document.body.appendChild(modalEl); }
      const bsModal = new bootstrap.Modal(modalEl);
      const form = document.getElementById('voltivaProductEnquiryForm');
      const successBox = document.getElementById('enquirySuccessBox');
      const errorAlert = document.getElementById('enquiryErrorAlert');
      const submitBtn = document.getElementById('enquirySubmitBtn');
      const submitSpinner = document.getElementById('enquirySubmitBtnSpinner');
      const submitText = document.getElementById('enquirySubmitBtnText');
      const submitIcon = document.getElementById('enquirySubmitBtnIcon');
      const directWaBtn = document.getElementById('enquiryDirectWhatsAppBtn');
      const successWaBtn = document.getElementById('enquirySuccessWhatsAppBtn');

      const waPhone = '{{ preg_replace("/[^0-9]/", "", $site_settings["contact_whatsapp"] ?? $site_settings["contact_phone"] ?? "917600757008") }}';

      // Click handler for all Enquire buttons
      document.querySelectorAll('.btn-open-enquiry-modal').forEach(btn => {
         btn.addEventListener('click', function (e) {
            e.preventDefault();

            const title = this.dataset.title || '';
            const code = this.dataset.code || '';
            const size = this.dataset.size || '';
            const price = this.dataset.price || '';
            const image = this.dataset.image || '';
            const series = this.dataset.series || '';
            const pkd = this.dataset.pkd || '';

            // Reset modal states
            form.style.display = 'block';
            successBox.style.display = 'none';
            errorAlert.style.display = 'none';
            errorAlert.textContent = '';
            submitBtn.disabled = false;
            submitSpinner.style.display = 'none';
            submitText.textContent = 'Send Inquiry';
            submitIcon.style.display = 'inline-block';

            // Populate Product Summary
            document.getElementById('enquiryModalProductTitle').textContent = title;
            document.getElementById('enquiryModalProductImg').src = image;
            document.getElementById('enquiryModalProductImg').alt = title;

            const codeBadge = document.getElementById('enquiryModalProductCode');
            if (code) {
               codeBadge.textContent = '#' + code;
               codeBadge.style.display = 'inline-block';
            } else {
               codeBadge.style.display = 'none';
            }

            const sizeBadge = document.getElementById('enquiryModalProductSize');
            if (size) {
               sizeBadge.textContent = size;
               sizeBadge.style.display = 'inline-block';
            } else {
               sizeBadge.style.display = 'none';
            }

            document.getElementById('enquiryModalProductSeries').textContent = series || 'Voltiva Series';
            document.getElementById('enquiryModalProductPrice').textContent = price || 'On Request';
            document.getElementById('enquiryModalProductPkd').textContent = pkd ? 'Pkg: ' + pkd : '';

            // Hidden fields
            document.getElementById('enquiryHiddenSubject').value = 'Inquiry: ' + title + (code ? ' (' + code + ')' : '');
            document.getElementById('enquiryHiddenTitle').value = title;
            document.getElementById('enquiryHiddenCode').value = code;

            // Pre-fill message
            const defaultMsg = `Hello Voltiva Team,\nI am interested in purchasing ${title}${code ? ' (Code: ' + code + ')' : ''}.\nPlease provide quotation and availability details.`;
            document.getElementById('enquiryInputMessage').value = defaultMsg;

            // WhatsApp link
            const waText = encodeURIComponent(`Hello Voltiva, I am interested in: ${title} (Code: ${code}, Series: ${series}). Please share quotation.`);
            const waUrl = `https://wa.me/${waPhone}?text=${waText}`;
            if (directWaBtn) directWaBtn.href = waUrl;
            if (successWaBtn) successWaBtn.href = waUrl;

            bsModal.show();
         });
      });

      // Form submit AJAX
      form.addEventListener('submit', function (e) {
         e.preventDefault();

         submitBtn.disabled = true;
         submitSpinner.style.display = 'inline-block';
         submitText.textContent = 'Sending...';
         submitIcon.style.display = 'none';
         errorAlert.style.display = 'none';

         const formData = new FormData(form);

         fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
               'X-Requested-With': 'XMLHttpRequest',
               'Accept': 'application/json'
            }
         })
         .then(response => {
            if (!response.ok) {
               return response.json().then(err => Promise.reject(err));
            }
            return response.json();
         })
         .then(data => {
            // Success
            form.style.display = 'none';
            successBox.style.display = 'block';
            const prodTitle = document.getElementById('enquiryHiddenTitle').value;
            const name = document.getElementById('enquiryInputName').value;
            document.getElementById('enquirySuccessText').innerHTML = 
               `Thank you <strong>${name}</strong>! Your inquiry for <strong>${prodTitle}</strong> has been received successfully. Our team will contact you shortly.`;
         })
         .catch(err => {
            submitBtn.disabled = false;
            submitSpinner.style.display = 'none';
            submitText.textContent = 'Send Inquiry';
            submitIcon.style.display = 'inline-block';

            let msg = 'An error occurred while submitting your inquiry. Please try again or chat with us on WhatsApp.';
            if (err && err.message) msg = err.message;
            if (err && err.errors) {
               const firstKey = Object.keys(err.errors)[0];
               if (firstKey) msg = err.errors[firstKey][0];
            }
            errorAlert.textContent = msg;
            errorAlert.style.display = 'block';
         });
      });
   });
   </script>
</body>

</html>
