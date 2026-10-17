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

   <div class="catalog-page-wrapper">
      <div class="catalog-page-content">
         <main id="primary" class="site-main">
            <div class="space-for-header"></div>


            <!-- start: Breadcrumb Section -->
            <x-page-banner page="product" :defaultTitle="$category->name" :currentTitle="$category->name" parentTitle="Home" parentRoute="home-2" subParentTitle="Categories" subParentRoute="product" />
            <!-- end: Breadcrumb Section -->

            <!-- start: Shop Section -->
            <div class="tj-product-area section-gap slidebar-stickiy-container">
               <div class="container">

                  <!-- Mobile Categories Toggle Button (Voltiva Theme) -->
                  <div class="d-lg-none mb-3">
                     <button type="button" class="voltiva-mobile-cat-btn" id="voltivaMobileCatToggle">
                        <span class="d-inline-flex align-items-center gap-2">
                           <i class="fa-solid fa-layer-group" style="color: var(--tj-color-theme-primary, #1e8a8a);"></i>
                           <span style="font-weight: 800; letter-spacing: 0.5px;">CATEGORIES ({{ isset($categories) ? $categories->count() : 0 }})</span>
                        </span>
                        <span class="d-inline-flex align-items-center gap-2">
                           <span class="badge" style="font-size: 11px; background: rgba(30, 138, 138, 0.1); color: #1e8a8a; border: 1px solid rgba(30, 138, 138, 0.2);">Browse Series</span>
                           <i class="fa-solid fa-chevron-down toggle-chevron" id="voltivaMobileChevron"></i>
                        </span>
                     </button>
                  </div>

                  <div class="row g-4 rg-50">
                     <!-- Left Sticky Sidebar Column (Voltiva Theme & Reference Layout) -->
                     <div class="col-xl-3 col-lg-4 col-md-12 voltiva-sidebar-col">
                        <aside class="voltiva-sidebar-card" id="voltivaCategorySidebar">
                           <!-- Header Box (Theme-Harmonized) -->
                           <div class="voltiva-sidebar-header-box">
                              <div class="d-flex align-items-center gap-2">
                                 <i class="fa-solid fa-layer-group" style="color: var(--tj-color-theme-primary, #1e8a8a); font-size: 14px;"></i>
                                 <h2 class="voltiva-sidebar-header-title">CATEGORIES</h2>
                              </div>
                              @if(isset($categories))
                              <span class="voltiva-sidebar-badge-total">{{ $categories->count() }}</span>
                              @endif
                           </div>

                           <!-- Instant Search Input with Clear Action -->
                           <div class="voltiva-cat-search-wrap">
                              <input type="text" 
                                     id="voltivaCatSearch" 
                                     class="voltiva-cat-search-input" 
                                     placeholder="Search series or plate..." 
                                     autocomplete="off">
                              <button type="button" id="voltivaCatSearchClear" class="voltiva-cat-clear-btn" style="display:none;" title="Clear search">
                                 <i class="fa-solid fa-xmark"></i>
                              </button>
                              <i class="fa-solid fa-magnifying-glass voltiva-cat-search-icon" id="voltivaCatSearchIcon"></i>
                           </div>

                           <!-- Categories Navigation List -->
                           <ul class="voltiva-cat-nav-list" id="voltivaCatList">
                              @if(isset($categories) && $categories->count() > 0)
                                 @foreach($categories as $catItem)
                                    @php
                                       $isActive = ($catItem->id == $category->id);
                                       $itemCount = $catItem->total_products_count ?? $catItem->products_count ?? 0;
                                    @endphp
                                    <li class="voltiva-cat-nav-item" data-cat-name="{{ strtolower($catItem->name) }}">
                                       <a href="{{ route('category.products', $catItem->id) }}" 
                                          class="voltiva-cat-nav-link {{ $isActive ? 'is-active' : '' }}"
                                          title="{{ $catItem->name }}">
                                          <span class="cat-label">
                                             <span class="cat-title-text">{{ $catItem->name }}</span>
                                             <span class="cat-count">({{ $itemCount }})</span>
                                          </span>
                                          <i class="fa-solid fa-chevron-right cat-chevron"></i>
                                       </a>

                                       {{-- If active, display interactive subcategory filter & jump links --}}
                                       @if($isActive && $category->subCategories->count() > 0)
                                       <div class="voltiva-subcat-jump-box">
                                          <div class="voltiva-subcat-jump-header">
                                             <i class="fa-solid fa-sliders"></i>
                                             <span>Series Sub-groups</span>
                                          </div>
                                          <ul class="voltiva-subcat-jump-list">
                                             <li class="voltiva-subcat-jump-item">
                                                <a href="#subcategory-all" class="voltiva-subcat-jump-link active-subcat" data-filter-subcat="all">
                                                   <span class="text-truncate">All Series Models</span>
                                                   <span class="subcat-badge">{{ $category->products->count() ?: $itemCount }}</span>
                                                </a>
                                             </li>
                                             @foreach($category->subCategories as $subItem)
                                             <li class="voltiva-subcat-jump-item">
                                                <a href="#subcategory-{{ $subItem->id }}" class="voltiva-subcat-jump-link" data-filter-subcat="{{ $subItem->id }}">
                                                   <span class="text-truncate">{{ $subItem->title }}</span>
                                                   <span class="subcat-badge">{{ $subItem->products->count() }}</span>
                                                </a>
                                             </li>
                                             @endforeach
                                          </ul>
                                       </div>
                                       @endif
                                    </li>
                                 @endforeach
                              @endif
                           </ul>
                        </aside>
                     </div>

                     <!-- Right Products Content Column -->
                     <div class="col-xl-9 col-lg-8 col-md-12">
                        <div class="tj-shop-item-wrapper">
                            
                             <style>
                                /* =======================================================
                                   VOLTIVA CATEGORY SIDEBAR (STICKY ON TOP)
                                ======================================================= */
                                .tj-product-area,
                                .slidebar-stickiy-container,
                                .catalog-page-wrapper,
                                .catalog-page-content,
                                #smooth-wrapper,
                                #smooth-content,
                                .site-main {
                                   overflow: visible !important;
                                }

                                .voltiva-sidebar-col {
                                   position: relative !important;
                                   align-self: stretch !important;
                                }

                                .voltiva-sidebar-card {
                                   background: #ffffff;
                                   border: 1.5px solid #dce8ea;
                                   border-radius: 18px;
                                   padding: 16px 14px;
                                   position: -webkit-sticky !important;
                                   position: sticky !important;
                                   top: 100px !important;
                                   height: calc(100vh - 120px) !important;
                                   max-height: calc(100vh - 120px) !important;
                                   display: flex !important;
                                   flex-direction: column !important;
                                   overflow: hidden !important;
                                   box-shadow: 0 12px 35px -8px rgba(12, 30, 33, 0.08);
                                   z-index: 99 !important;
                                   margin-bottom: 30px;
                                }

                                /* Top Header Box */
                                .voltiva-sidebar-header-box {
                                   background: #f8fafb;
                                   border: 1.5px solid #dce5e6;
                                   border-radius: 12px;
                                   padding: 12px 14px;
                                   margin-bottom: 12px;
                                   display: flex;
                                   align-items: center;
                                   justify-content: space-between;
                                   transition: border-color 0.2s ease;
                                   flex-shrink: 0 !important;
                                }
                                .voltiva-sidebar-header-box:hover {
                                   border-color: #1e8a8a;
                                }
                                .voltiva-sidebar-header-title {
                                   font-size: 13.5px;
                                   font-weight: 800;
                                   color: #0c1e21;
                                   letter-spacing: 1.4px;
                                   text-transform: uppercase;
                                   margin: 0;
                                   line-height: 1.2;
                                }
                                .voltiva-sidebar-badge-total {
                                   font-size: 11px;
                                   font-weight: 700;
                                   background: rgba(30, 138, 138, 0.1);
                                   color: #1e8a8a;
                                   padding: 2px 8px;
                                   border-radius: 20px;
                                   border: 1px solid rgba(30, 138, 138, 0.2);
                                }

                                /* Instant Search Box */
                                .voltiva-cat-search-wrap {
                                   position: relative;
                                   margin-bottom: 12px;
                                   flex-shrink: 0 !important;
                                }
                                .voltiva-cat-search-input {
                                   width: 100%;
                                   background: #f8fafb;
                                   border: 1px solid #dce5e6;
                                   border-radius: 9px;
                                   padding: 8px 32px 8px 12px;
                                   font-size: 12.5px;
                                   color: #0c1e21;
                                   outline: none;
                                   transition: all 0.2s ease;
                                }
                                .voltiva-cat-search-input:focus {
                                   border-color: #1e8a8a;
                                   background: #ffffff;
                                   box-shadow: 0 0 0 3px rgba(30, 138, 138, 0.14);
                                }
                                .voltiva-cat-search-input::placeholder {
                                   color: #8c9b9d;
                                }
                                .voltiva-cat-search-icon {
                                   position: absolute;
                                   right: 12px;
                                   top: 50%;
                                   transform: translateY(-50%);
                                   color: #8c9b9d;
                                   font-size: 12px;
                                   pointer-events: none;
                                }
                                .voltiva-cat-clear-btn {
                                   position: absolute;
                                   right: 10px;
                                   top: 50%;
                                   transform: translateY(-50%);
                                   background: none;
                                   border: none;
                                   color: #8c9b9d;
                                   cursor: pointer;
                                   padding: 2px 6px;
                                   font-size: 12px;
                                   line-height: 1;
                                }
                                .voltiva-cat-clear-btn:hover {
                                   color: #0c1e21;
                                }

                                /* Category List - Internal Smooth Scroll inside Sticky Sidebar */
                                .voltiva-cat-nav-list {
                                   list-style: none;
                                   padding: 0;
                                   margin: 0;
                                   flex: 1 1 0 !important;
                                   min-height: 0 !important;
                                   overflow-y: auto !important;
                                   overflow-x: hidden !important;
                                   padding-right: 4px;
                                }
                                .voltiva-cat-nav-list::-webkit-scrollbar {
                                   width: 4px;
                                }
                                .voltiva-cat-nav-list::-webkit-scrollbar-track {
                                   background: #f1f5f5;
                                   border-radius: 10px;
                                }
                                .voltiva-cat-nav-list::-webkit-scrollbar-thumb {
                                   background: #c2d1d2;
                                   border-radius: 10px;
                                }
                                .voltiva-cat-nav-list::-webkit-scrollbar-thumb:hover {
                                   background: #1e8a8a;
                                }

                                .voltiva-cat-nav-item {
                                   margin-bottom: 4px;
                                }
                                .voltiva-cat-nav-link {
                                   display: flex;
                                   align-items: center;
                                   justify-content: space-between;
                                   padding: 10px 12px;
                                   border-radius: 9px;
                                   color: #364e52;
                                   font-size: 13px;
                                   font-weight: 600;
                                   text-decoration: none;
                                   border: 1.5px solid transparent;
                                   transition: all 0.2s cubic-bezier(0.16, 1, 0.3, 1);
                                   line-height: 1.35;
                                   background: transparent;
                                }
                                .voltiva-cat-nav-link:hover {
                                   background: #f4f8f8;
                                   border-color: #dce5e6;
                                   color: #0c1e21;
                                }
                                .voltiva-cat-nav-link .cat-label {
                                   display: flex;
                                   align-items: center;
                                   gap: 7px;
                                   min-width: 0;
                                   flex: 1;
                                }
                                .voltiva-cat-nav-link .cat-title-text {
                                   overflow: hidden;
                                   text-overflow: ellipsis;
                                   white-space: nowrap;
                                   flex: 1;
                                   min-width: 0;
                                }
                                .voltiva-cat-nav-link .cat-count {
                                   color: #8c9b9d;
                                   font-weight: 500;
                                   font-size: 12px;
                                   flex-shrink: 0;
                                }
                                .voltiva-cat-nav-link:hover .cat-count {
                                   color: #1e8a8a;
                                }
                                .voltiva-cat-nav-link .cat-chevron {
                                   font-size: 10px;
                                   color: #adbabb;
                                   transition: all 0.2s ease;
                                   flex-shrink: 0;
                                }
                                .voltiva-cat-nav-link:hover .cat-chevron {
                                   color: #1e8a8a;
                                   transform: translateX(2px);
                                }

                                /* ACTIVE CATEGORY - VOLTIVA THEME HIGHLIGHT */
                                .voltiva-cat-nav-link.is-active {
                                   background: linear-gradient(135deg, rgba(30, 138, 138, 0.12) 0%, rgba(30, 138, 138, 0.04) 100%) !important;
                                   border: 1.5px solid #1e8a8a !important;
                                   color: #0c1e21 !important;
                                   font-weight: 700;
                                   box-shadow: 0 4px 14px rgba(30, 138, 138, 0.15);
                                }
                                .voltiva-cat-nav-link.is-active .cat-title-text {
                                   color: #0c1e21;
                                }
                                .voltiva-cat-nav-link.is-active .cat-count {
                                   color: #1e8a8a !important;
                                   font-weight: 700;
                                }
                                .voltiva-cat-nav-link.is-active .cat-chevron {
                                   color: #1e8a8a !important;
                                   transform: translateX(1px);
                                   font-size: 11px;
                                }

                                /* Subcategory Jump Box */
                                .voltiva-subcat-jump-box {
                                   background: #f8fafb;
                                   border: 1px dashed #d5e2e3;
                                   border-radius: 8px;
                                   margin: 6px 3px 10px 8px;
                                   padding: 8px 10px;
                                }
                                .voltiva-subcat-jump-header {
                                   font-size: 10px;
                                   font-weight: 700;
                                   text-transform: uppercase;
                                   letter-spacing: 0.6px;
                                   color: #1e8a8a;
                                   margin-bottom: 5px;
                                   display: flex;
                                   align-items: center;
                                   gap: 4px;
                                }
                                .voltiva-subcat-jump-list {
                                   list-style: none;
                                   padding: 0;
                                   margin: 0;
                                }
                                .voltiva-subcat-jump-item {
                                   margin-bottom: 3px;
                                }
                                .voltiva-subcat-jump-link {
                                   display: flex;
                                   align-items: center;
                                   justify-content: space-between;
                                   font-size: 11.5px;
                                   color: #40575b;
                                   font-weight: 600;
                                   padding: 4px 6px;
                                   border-radius: 5px;
                                   text-decoration: none;
                                   transition: all 0.2s ease;
                                   border: 1px solid transparent;
                                }
                                .voltiva-subcat-jump-link:hover,
                                .voltiva-subcat-jump-link.active-subcat {
                                   color: #0c1e21;
                                   background: #ffffff;
                                   border-color: #dce5e6;
                                }
                                .voltiva-subcat-jump-link.active-subcat {
                                   border-color: #1e8a8a;
                                   color: #1e8a8a;
                                }
                                .voltiva-subcat-jump-link .subcat-badge {
                                   font-size: 10px;
                                   color: #1e8a8a;
                                   background: rgba(30, 138, 138, 0.08);
                                   padding: 1px 5px;
                                   border-radius: 8px;
                                   font-weight: 700;
                                }

                                /* Mobile Drawer Button */
                                .voltiva-mobile-cat-btn {
                                   display: none;
                                   width: 100%;
                                   background: #ffffff;
                                   color: #0c1e21;
                                   border: 1.5px solid #dce5e6;
                                   border-radius: 12px;
                                   padding: 12px 18px;
                                   font-size: 13.5px;
                                   font-weight: 700;
                                   align-items: center;
                                   justify-content: space-between;
                                   cursor: pointer;
                                   transition: all 0.2s ease;
                                   box-shadow: 0 4px 14px rgba(12, 30, 33, 0.04);
                                }
                                .voltiva-mobile-cat-btn:hover {
                                   border-color: #1e8a8a;
                                }
                                .voltiva-mobile-cat-btn .toggle-chevron {
                                   transition: transform 0.25s ease;
                                }
                                .voltiva-mobile-cat-btn.active .toggle-chevron {
                                   transform: rotate(180deg);
                                }

                                 @media (max-width: 991px) {
                                    .voltiva-mobile-cat-btn {
                                       display: flex !important;
                                    }
                                    .voltiva-sidebar-card {
                                       display: none !important;
                                    }
                                    .voltiva-sidebar-card.mobile-open {
                                       display: flex !important;
                                       position: relative !important;
                                       top: 0 !important;
                                       max-height: 480px !important;
                                       margin-bottom: 25px !important;
                                    }
                                 }

                                 @media (min-width: 992px) {
                                    .voltiva-mobile-cat-btn {
                                       display: none !important;
                                    }
                                    .voltiva-sidebar-col {
                                       display: block !important;
                                       align-self: stretch !important;
                                       position: relative !important;
                                    }
                                    .voltiva-sidebar-card {
                                       display: flex !important;
                                    }
                                 }

                                /* =======================================================
                                   VOLTIVA ACTIVE SERIES HERO BANNER (REFINED LUXURY DESIGN)
                                ======================================================= */
                                .voltiva-cat-header-strip {
                                   background: linear-gradient(135deg, #ffffff 0%, #f7fbfb 50%, #ffffff 100%);
                                   border: 1.5px solid #dbe7e9;
                                   border-top: 4px solid var(--tj-color-theme-primary, #1e8a8a);
                                   border-radius: 20px;
                                   padding: 24px 28px;
                                   margin-bottom: 32px;
                                   box-shadow: 0 14px 40px -10px rgba(12, 30, 33, 0.08), 0 2px 6px rgba(12, 30, 33, 0.02);
                                   position: relative;
                                   overflow: hidden;
                                }

                                /* Subtle decorative flare */
                                .voltiva-cat-header-strip::after {
                                   content: "";
                                   position: absolute;
                                   top: -80px;
                                   right: -80px;
                                   width: 220px;
                                   height: 220px;
                                   background: radial-gradient(circle, rgba(30, 138, 138, 0.08) 0%, rgba(30, 138, 138, 0) 70%);
                                   border-radius: 50%;
                                   pointer-events: none;
                                }

                                .voltiva-hero-badge-wrap {
                                   display: flex;
                                   align-items: center;
                                   gap: 8px;
                                   margin-bottom: 8px;
                                }

                                .voltiva-strip-badge {
                                   display: inline-flex;
                                   align-items: center;
                                   gap: 7px;
                                   font-size: 11px;
                                   font-weight: 800;
                                   text-transform: uppercase;
                                   letter-spacing: 0.9px;
                                   color: #156d6d;
                                   background: rgba(30, 138, 138, 0.1);
                                   padding: 5px 12px;
                                   border-radius: 20px;
                                   border: 1px solid rgba(30, 138, 138, 0.22);
                                }

                                .voltiva-pulse-dot {
                                   width: 7px;
                                   height: 7px;
                                   border-radius: 50%;
                                   background: #1e8a8a;
                                   box-shadow: 0 0 0 0 rgba(30, 138, 138, 0.7);
                                   animation: voltivaPulse 1.8s infinite;
                                }

                                @keyframes voltivaPulse {
                                   0% {
                                      box-shadow: 0 0 0 0 rgba(30, 138, 138, 0.7);
                                   }
                                   70% {
                                      box-shadow: 0 0 0 7px rgba(30, 138, 138, 0);
                                   }
                                   100% {
                                      box-shadow: 0 0 0 0 rgba(30, 138, 138, 0);
                                   }
                                }

                                .voltiva-strip-title {
                                   font-size: 28px;
                                   font-weight: 800;
                                   color: #0c1e21;
                                   margin: 0 0 6px 0;
                                   text-transform: uppercase;
                                   letter-spacing: 0.4px;
                                   line-height: 1.25;
                                }

                                .voltiva-strip-desc {
                                   font-size: 14px;
                                   color: #556c70;
                                   margin: 0;
                                   line-height: 1.55;
                                   max-width: 680px;
                                }

                                /* Executive Metric Widget (Right Box) */
                                .voltiva-hero-metric-card {
                                   display: flex;
                                   align-items: center;
                                   gap: 14px;
                                   background: #ffffff;
                                   border: 1.5px solid #e1ebed;
                                   border-radius: 14px;
                                   padding: 12px 20px;
                                   box-shadow: 0 6px 18px rgba(12, 30, 33, 0.04);
                                   flex-shrink: 0;
                                   transition: all 0.25s ease;
                                }

                                .voltiva-hero-metric-card:hover {
                                   border-color: #1e8a8a;
                                   box-shadow: 0 8px 24px rgba(30, 138, 138, 0.12);
                                }

                                .metric-icon-box {
                                   width: 46px;
                                   height: 46px;
                                   border-radius: 12px;
                                   background: linear-gradient(135deg, rgba(30, 138, 138, 0.15) 0%, rgba(30, 138, 138, 0.06) 100%);
                                   color: #1e8a8a;
                                   display: flex;
                                   align-items: center;
                                   justify-content: center;
                                   font-size: 19px;
                                   flex-shrink: 0;
                                }

                                .metric-number-wrap {
                                   display: flex;
                                   align-items: baseline;
                                   gap: 4px;
                                   line-height: 1;
                                }

                                .metric-number {
                                   font-size: 26px;
                                   font-weight: 900;
                                   color: #0c1e21;
                                   letter-spacing: -0.5px;
                                }

                                .metric-unit {
                                   font-size: 11px;
                                   font-weight: 700;
                                   color: #1e8a8a;
                                   text-transform: uppercase;
                                   letter-spacing: 0.5px;
                                }

                                .metric-label {
                                   display: block;
                                   font-size: 10.5px;
                                   font-weight: 700;
                                   color: #829699;
                                   text-transform: uppercase;
                                   letter-spacing: 0.8px;
                                   margin-top: 3px;
                                }

                                /* Integrated Search Bar & Stats Deck */
                                .voltiva-command-bar {
                                   margin-top: 20px;
                                   padding-top: 18px;
                                   border-top: 1px solid #e3edef;
                                }

                                .voltiva-model-search-box {
                                   position: relative;
                                   display: flex;
                                   align-items: center;
                                }

                                .voltiva-model-search-box .search-icon {
                                   position: absolute;
                                   left: 15px;
                                   color: #7b9194;
                                   font-size: 14px;
                                   pointer-events: none;
                                }

                                .voltiva-model-search-box .voltiva-model-search-input {
                                   width: 100%;
                                   height: 46px;
                                   padding: 10px 42px 10px 42px;
                                   background: #ffffff;
                                   border: 1.5px solid #d5e3e5;
                                   border-radius: 12px;
                                   font-size: 13.5px;
                                   color: #0c1e21;
                                   outline: none;
                                   box-shadow: inset 0 2px 4px rgba(12, 30, 33, 0.02);
                                   transition: all 0.25s ease;
                                }

                                .voltiva-model-search-box .voltiva-model-search-input:focus {
                                   border-color: #1e8a8a;
                                   box-shadow: 0 0 0 4px rgba(30, 138, 138, 0.15);
                                }

                                .voltiva-model-search-box .voltiva-model-search-input::placeholder {
                                   color: #8a9c9f;
                                }

                                .voltiva-model-search-box .search-badge-hint {
                                   position: absolute;
                                   right: 42px;
                                   font-size: 10.5px;
                                   font-weight: 700;
                                   color: #1e8a8a;
                                   background: rgba(30, 138, 138, 0.09);
                                   padding: 3px 8px;
                                   border-radius: 6px;
                                   text-transform: uppercase;
                                   letter-spacing: 0.5px;
                                   pointer-events: none;
                                }

                                .voltiva-model-search-box .clear-icon {
                                   position: absolute;
                                   right: 12px;
                                   background: #eef3f4;
                                   border: none;
                                   color: #556c70;
                                   cursor: pointer;
                                   width: 24px;
                                   height: 24px;
                                   border-radius: 50%;
                                   display: flex;
                                   align-items: center;
                                   justify-content: center;
                                   font-size: 11px;
                                   transition: all 0.2s ease;
                                }

                                .voltiva-model-search-box .clear-icon:hover {
                                   background: #1e8a8a;
                                   color: #ffffff;
                                }

                                /* Results counter chip */
                                .voltiva-filter-stats-pill {
                                   display: inline-flex;
                                   align-items: center;
                                   gap: 6px;
                                   background: #ffffff;
                                   border: 1px solid #d9e6e8;
                                   border-radius: 20px;
                                   padding: 8px 16px;
                                   font-size: 12.5px;
                                   font-weight: 600;
                                   color: #4b6266;
                                   box-shadow: 0 2px 6px rgba(12, 30, 33, 0.03);
                                }

                                /* Subcategory Navigation Strip */
                                .voltiva-subcat-nav-strip {
                                   margin-top: 16px;
                                   padding-top: 14px;
                                   border-top: 1px dashed #dbe6e8;
                                }

                                .voltiva-subcat-strip-label {
                                   font-size: 11px;
                                   font-weight: 800;
                                   color: #7b9194;
                                   text-transform: uppercase;
                                   letter-spacing: 0.8px;
                                   display: flex;
                                   align-items: center;
                                   gap: 5px;
                                }

                                .voltiva-subcat-pills-bar {
                                   display: flex;
                                   align-items: center;
                                   gap: 8px;
                                   overflow-x: auto;
                                   padding: 6px 2px 8px 2px;
                                   scrollbar-width: thin;
                                   scrollbar-color: #c2d5d6 transparent;
                                }

                                .voltiva-subcat-pills-bar::-webkit-scrollbar {
                                   height: 4px;
                                }

                                .voltiva-subcat-pills-bar::-webkit-scrollbar-track {
                                   background: transparent;
                                }

                                .voltiva-subcat-pills-bar::-webkit-scrollbar-thumb {
                                   background: #c8d8d9;
                                   border-radius: 10px;
                                }

                                .voltiva-subcat-pill-item {
                                   display: inline-flex;
                                   align-items: center;
                                   gap: 7px;
                                   font-size: 12.5px;
                                   font-weight: 600;
                                   color: #3b5054;
                                   background: #ffffff;
                                   border: 1.5px solid #dce5e7;
                                   border-radius: 22px;
                                   padding: 6px 14px;
                                   white-space: nowrap;
                                   cursor: pointer;
                                   transition: all 0.22s cubic-bezier(0.16, 1, 0.3, 1);
                                   outline: none;
                                   box-shadow: 0 2px 6px rgba(12, 30, 33, 0.03);
                                }

                                .voltiva-subcat-pill-item:hover {
                                   color: #0c1e21;
                                   border-color: #1e8a8a;
                                   background: #f4f9f9;
                                   transform: translateY(-1px);
                                   box-shadow: 0 4px 10px rgba(30, 138, 138, 0.12);
                                }

                                .voltiva-subcat-pill-item .pill-count {
                                   font-size: 11px;
                                   font-weight: 800;
                                   background: #edf3f4;
                                   color: #1e8a8a;
                                   padding: 2px 7px;
                                   border-radius: 12px;
                                   transition: all 0.2s ease;
                                }

                                .voltiva-subcat-pill-item:hover .pill-count {
                                   background: rgba(30, 138, 138, 0.15);
                                }

                                .voltiva-subcat-pill-item.is-active {
                                   background: linear-gradient(135deg, #1e8a8a 0%, #156d6d 100%) !important;
                                   color: #ffffff !important;
                                   border-color: #1e8a8a !important;
                                   box-shadow: 0 6px 18px rgba(30, 138, 138, 0.3) !important;
                                   transform: translateY(-1px);
                                }

                                .voltiva-subcat-pill-item.is-active .pill-count {
                                   background: #ffffff !important;
                                   color: #1e8a8a !important;
                                   box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                                }

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

                                /* Corporate Product Card (Professional Architectural Electrical Style) */
                                .accura-product-card {
                                   background: #ffffff;
                                   border: 1.5px solid #e2ecee;
                                   border-radius: 16px;
                                   padding: 18px;
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
                                   transform: translateY(-5px);
                                   border-color: #1e8a8a;
                                   box-shadow: 0 16px 36px -6px rgba(12, 30, 33, 0.09), 0 4px 12px rgba(30, 138, 138, 0.06);
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
                                   border: 1px solid rgba(30, 138, 138, 0.16);
                                }
                                .accura-card-badge-size {
                                   display: inline-flex;
                                   align-items: center;
                                   gap: 5px;
                                   font-size: 11px;
                                   font-weight: 700;
                                   color: #435b5e;
                                   background: #f1f6f7;
                                   padding: 4px 10px;
                                   border-radius: 6px;
                                   letter-spacing: 0.4px;
                                   border: 1px solid #e1ebed;
                                }

                                /* Card Image Presentation Showcase */
                                .accura-card-image-box {
                                   position: relative;
                                   background: radial-gradient(circle at center, #ffffff 40%, #f4f8f9 100%);
                                   border: 1px solid #eef3f5;
                                   border-radius: 12px;
                                   padding: 16px 12px;
                                   height: 200px;
                                   display: flex;
                                   align-items: center;
                                   justify-content: center;
                                   margin-bottom: 14px;
                                   overflow: hidden;
                                   transition: border-color 0.3s ease;
                                }
                                .accura-product-card:hover .accura-card-image-box {
                                   border-color: #dceaea;
                                }
                                .accura-card-image-box img {
                                   max-width: 100%;
                                   max-height: 100%;
                                   object-fit: contain;
                                   filter: drop-shadow(0 6px 14px rgba(12, 30, 33, 0.08));
                                   transition: transform 0.45s cubic-bezier(0.16, 1, 0.3, 1);
                                }
                                .accura-product-card:hover .accura-card-image-box img {
                                   transform: scale(1.06);
                                }

                                /* Product Title */
                                .accura-product-title {
                                   color: #0c1e21;
                                   font-size: 17px;
                                   font-weight: 800;
                                   line-height: 1.3;
                                   margin-bottom: 6px;
                                   text-align: center;
                                   letter-spacing: 0.2px;
                                }

                                /* Unified Specifications Card (Replacing awkward fragmented grey boxes) */
                                .accura-specs-card {
                                   display: grid;
                                   grid-template-columns: repeat(2, 1fr);
                                   gap: 1px;
                                   background: #e2ecee;
                                   border: 1px solid #e2ecee;
                                   border-radius: 10px;
                                   overflow: hidden;
                                   margin-bottom: 16px;
                                }
                                .accura-specs-card .spec-cell {
                                   background: #f8fafb;
                                   padding: 8px 10px;
                                   display: flex;
                                   flex-direction: column;
                                   gap: 2px;
                                   min-width: 0;
                                   transition: background 0.2s ease;
                                }
                                .accura-product-card:hover .accura-specs-card .spec-cell {
                                   background: #f1f6f7;
                                }
                                .accura-specs-card .spec-label {
                                   font-size: 9px;
                                   font-weight: 700;
                                   color: #84999c;
                                   text-transform: uppercase;
                                   letter-spacing: 0.6px;
                                   display: flex;
                                   align-items: center;
                                   gap: 4px;
                                   line-height: 1.1;
                                }
                                .accura-specs-card .spec-label i {
                                   font-size: 8.5px;
                                   color: #1e8a8a;
                                }
                                .accura-specs-card .spec-value {
                                   font-size: 12.5px;
                                   font-weight: 700;
                                   color: #0c1e21;
                                   line-height: 1.2;
                                   white-space: nowrap;
                                   overflow: hidden;
                                   text-overflow: ellipsis;
                                }

                                /* Backward-compatibility for specs grid if any */
                                .accura-specs-grid {
                                   display: grid;
                                   grid-template-columns: repeat(2, 1fr);
                                   gap: 6px;
                                   margin-bottom: 16px;
                                }
                                .accura-spec-item {
                                   background: #f8fafb;
                                   border: 1px solid #edf2f4;
                                   border-radius: 8px;
                                   padding: 6px 10px;
                                   display: flex;
                                   flex-direction: column;
                                   gap: 2px;
                                }
                                .accura-spec-label {
                                   font-size: 9px;
                                   font-weight: 700;
                                   color: #839598;
                                   text-transform: uppercase;
                                   letter-spacing: 0.5px;
                                }
                                .accura-spec-value {
                                   font-size: 12.5px;
                                   font-weight: 700;
                                   color: #111e22;
                                }

                                /* Card Footer: Price & Action */
                                .accura-card-footer {
                                   border-top: 1px dashed #dbe5e7;
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
                                   font-size: 9.5px;
                                   font-weight: 700;
                                   color: #84989b;
                                   text-transform: uppercase;
                                   letter-spacing: 0.5px;
                                   margin-bottom: 2px;
                                   line-height: 1;
                                }
                                .accura-price-value {
                                   font-size: 20px;
                                   font-weight: 800;
                                   color: #0c1e21;
                                   line-height: 1;
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
                                   gap: 7px;
                                   background: #0c1e21;
                                   color: #ffffff !important;
                                   font-size: 12.5px;
                                   font-weight: 700;
                                   padding: 9px 16px;
                                   border-radius: 8px;
                                   text-decoration: none;
                                   border: none;
                                   cursor: pointer;
                                   outline: none;
                                   transition: all 0.25s cubic-bezier(0.16, 1, 0.3, 1);
                                   white-space: nowrap;
                                   box-shadow: 0 2px 6px rgba(12, 30, 33, 0.1);
                                }
                                .accura-btn-enquire i {
                                   font-size: 11px;
                                   transition: transform 0.2s ease;
                                }
                                .accura-btn-enquire:hover {
                                   background: #1e8a8a;
                                   box-shadow: 0 4px 14px rgba(30, 138, 138, 0.35);
                                   transform: translateY(-1px);
                                }
                                .accura-btn-enquire:hover i {
                                   transform: translateX(3px);
                                }
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

                             <!-- Category Header Strip & Interactive Filter Toolbar (Refined Active Series Hero Banner) -->
                             <div class="voltiva-cat-header-strip mb-4">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                                   <div>
                                      <div class="voltiva-hero-badge-wrap">
                                         <span class="voltiva-strip-badge">
                                            <span class="voltiva-pulse-dot"></span>
                                            <i class="fa-solid fa-bolt-lightning"></i> Active Series Catalog
                                         </span>
                                      </div>
                                      <h1 class="voltiva-strip-title">{{ $category->name }}</h1>
                                      @if($category->description)
                                      <p class="voltiva-strip-desc">{{ $category->description }}</p>
                                      @else
                                      <p class="voltiva-strip-desc">Explore our premium {{ $category->name }} range designed for superior durability, modern aesthetics, and safety.</p>
                                      @endif
                                   </div>

                                   @php
                                      $totalCategoryModels = \App\Models\Product::where('category_id', $category->id)->count();
                                      if ($totalCategoryModels === 0) {
                                         $totalCategoryModels = $category->subCategories->sum(fn($s) => $s->products->count());
                                      }
                                   @endphp
                                   <div class="voltiva-hero-metric-card">
                                      <div class="metric-icon-box">
                                         <i class="fa-solid fa-boxes-stacked"></i>
                                      </div>
                                      <div class="metric-content">
                                         <div class="metric-number-wrap">
                                            <span class="metric-number" id="voltivaModelCountDisplay">{{ $totalCategoryModels }}</span>
                                            <span class="metric-unit">Models</span>
                                         </div>
                                         <span class="metric-label">Total in Series</span>
                                      </div>
                                   </div>
                                </div>

                                <!-- Live Model Search Bar & Stats inside Header Strip -->
                                <div class="voltiva-command-bar">
                                   <div class="row align-items-center g-3">
                                      <div class="col-lg-7 col-md-6 col-12">
                                         <div class="voltiva-model-search-box">
                                            <i class="fa-solid fa-magnifying-glass search-icon"></i>
                                            <input type="text" id="voltivaModelSearch" class="voltiva-model-search-input" placeholder="Search models by name, code (e.g. 5001) or size..." autocomplete="off">
                                            <button type="button" id="voltivaModelSearchClear" class="clear-icon" style="display: none;" title="Clear search">
                                               <i class="fa-solid fa-xmark"></i>
                                            </button>
                                            
                                         </div>
                                      </div>
                                      <div class="col-lg-5 col-md-6 col-12 text-md-end">
                                         <div class="voltiva-filter-stats-pill" id="voltivaFilterStats">
                                            <i class="fa-solid fa-eye" style="color: #1e8a8a;"></i>
                                            <span>Showing <strong id="voltivaVisibleCount" class="text-dark">{{ $totalCategoryModels }}</strong> of {{ $totalCategoryModels }} models</span>
                                         </div>
                                      </div>
                                   </div>
                                </div>

                                @if($category->subCategories->count() > 0)
                                <div class="voltiva-subcat-nav-strip">
                                   <div class="d-flex align-items-center justify-content-between mb-2">
                                      <span class="voltiva-subcat-strip-label">
                                         <i class="fa-solid fa-sliders me-1" style="color: #1e8a8a;"></i> Filter by Sub-Group:
                                      </span>
                                   </div>
                                   <div class="voltiva-subcat-pills-bar">
                                      <button type="button" class="voltiva-subcat-pill-item is-active" data-filter-subcat="all">
                                         <span>All Models</span>
                                         <span class="pill-count">{{ $totalCategoryModels }}</span>
                                      </button>
                                      @foreach($category->subCategories as $subPill)
                                         @if($subPill->products->count() > 0)
                                         <button type="button" class="voltiva-subcat-pill-item" data-filter-subcat="{{ $subPill->id }}">
                                            <span>{{ $subPill->title }}</span>
                                            <span class="pill-count">{{ $subPill->products->count() }}</span>
                                         </button>
                                         @endif
                                      @endforeach
                                   </div>
                                </div>
                                @endif
                             </div>

                             @forelse($category->subCategories as $subCategory)
                             @if($subCategory->products->count() > 0)
                             <div class="subcategory-section mb-5" id="subcategory-{{ $subCategory->id }}" data-subcat-section-id="{{ $subCategory->id }}">
                                 <div class="subcategory-header-wrap">
                                     <h2 class="subcategory-title-corporate">{{ $subCategory->title }}</h2>
                                     <span class="subcategory-badge-count">
                                         <i class="fa-solid fa-layer-group me-1"></i> <span class="subcat-visible-count">{{ $subCategory->products->count() }}</span> / {{ $subCategory->products->count() }} {{ \Illuminate\Support\Str::plural('Model', $subCategory->products->count()) }}
                                     </span>
                                 </div>
                                 
                                 <div class="row g-4 row-cols-xxl-3 row-cols-xl-3 row-cols-lg-2 row-cols-md-2 row-cols-sm-2 row-cols-1 accura-product-grid">
                                    @forelse($subCategory->products as $product)
                                       <div class="col accura-grid-item" 
                                            data-title="{{ strtolower($product->title) }}" 
                                            data-code="{{ strtolower($product->code ?? '') }}" 
                                            data-size="{{ strtolower($product->size ?? '') }}" 
                                            data-subcat-id="{{ $subCategory->id }}">
                                           <div class="accura-product-card">
                                                {{-- Card Header: Code & Size Badges --}}
                                                <div class="accura-card-header">
                                                    <span class="accura-card-badge-code">
                                                        <i class="fa-solid fa-hashtag"></i> {{ $product->code ?? 'MODEL' }}
                                                    </span>
                                                    <span class="accura-card-badge-size">
                                                        <i class="fa-solid fa-microchip"></i> {{ $product->size ?? 'Standard' }}
                                                    </span>
                                                </div>

                                                {{-- Showcase Product Image --}}
                                                <div class="accura-card-image-box">
                                                    <img src="{{ storage_asset($product->image, 'assets/images/product/product-1.webp') }}" alt="{{ $product->title }}" loading="lazy">
                                                </div>

                                                {{-- Product Title --}}
                                                <h3 class="accura-product-title" title="{{ $product->title }}">
                                                    {{ $product->title }}
                                                </h3>

                                                {{-- Description with Elegant Fallback for Grid Symmetry --}}
                                                @if($product->description && strcasecmp(strip_tags($product->description), strip_tags($product->title)) !== 0)
                                                <div class="accura-product-desc">
                                                   {{ Str::limit(trim(explode("\n", strip_tags($product->description))[0]), 110) }}
                                                </div>
                                                @else
                                                <div class="accura-product-desc">
                                                   Pure finish with high-durability contact points and smooth actuation.
                                                </div>
                                                @endif

                                                {{-- Professional 4-Quadrant Specifications Panel --}}
                                                <div class="accura-specs-card">
                                                    <div class="spec-cell">
                                                        <span class="spec-label"><i class="fa-solid fa-barcode"></i> CODE</span>
                                                        <span class="spec-value" title="{{ $product->code ?? 'N/A' }}">{{ $product->code ? '#' . $product->code : 'N/A' }}</span>
                                                    </div>
                                                    <div class="spec-cell">
                                                        <span class="spec-label"><i class="fa-solid fa-boxes-packing"></i> PKG. QTY</span>
                                                        <span class="spec-value">{{ $product->pkd ? $product->pkd . ' Pcs' : '20 Pcs' }}</span>
                                                    </div>
                                                    <div class="spec-cell">
                                                        <span class="spec-label"><i class="fa-solid fa-sliders"></i> MODULE</span>
                                                        <span class="spec-value">{{ $product->size ?? 'Standard' }}</span>
                                                    </div>
                                                    <div class="spec-cell">
                                                        <span class="spec-label"><i class="fa-solid fa-shield-halved"></i> SERIES</span>
                                                        <span class="spec-value text-truncate" title="{{ $category->name }}">{{ $category->name }}</span>
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
                             <div class="subcategory-section mb-5" id="subcategory-direct" data-subcat-section-id="direct">
                                 <div class="subcategory-header-wrap">
                                     <h2 class="subcategory-title-corporate">{{ $category->name }} - Additional Models</h2>
                                     <span class="subcategory-badge-count">
                                         <i class="fa-solid fa-layer-group me-1"></i> <span class="subcat-visible-count">{{ $directProducts->count() }}</span> / {{ $directProducts->count() }} {{ \Illuminate\Support\Str::plural('Model', $directProducts->count()) }}
                                     </span>
                                 </div>
                                 <div class="row g-4 row-cols-xxl-3 row-cols-xl-3 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 accura-product-grid">
                                     @foreach($directProducts as $product)
                                        <div class="col accura-grid-item"
                                             data-title="{{ strtolower($product->title) }}" 
                                             data-code="{{ strtolower($product->code ?? '') }}" 
                                             data-size="{{ strtolower($product->size ?? '') }}" 
                                             data-subcat-id="direct">
                                            <div class="accura-product-card">
                                                <div class="accura-card-header">
                                                    <span class="accura-card-badge-code">
                                                        <i class="fa-solid fa-hashtag"></i> {{ $product->code ?? 'MODEL' }}
                                                    </span>
                                                    <span class="accura-card-badge-size">
                                                        <i class="fa-solid fa-microchip"></i> {{ $product->size ?? 'Standard' }}
                                                    </span>
                                                </div>

                                                <div class="accura-card-image-box">
                                                    <img src="{{ storage_asset($product->image, 'assets/images/product/product-1.webp') }}" alt="{{ $product->title }}" loading="lazy">
                                                </div>

                                                <h3 class="accura-product-title" title="{{ $product->title }}">
                                                    {{ $product->title }}
                                                </h3>

                                                @if($product->description && strcasecmp(strip_tags($product->description), strip_tags($product->title)) !== 0)
                                                <div class="accura-product-desc" title="{{ strip_tags($product->description) }}">
                                                   {{ Str::limit(trim(explode("\n", strip_tags($product->description))[0]), 110) }}
                                                </div>
                                                @else
                                                <div class="accura-product-desc">
                                                   Pure finish with high-durability contact points and smooth actuation.
                                                </div>
                                                @endif

                                                <div class="accura-specs-card">
                                                    <div class="spec-cell">
                                                        <span class="spec-label"><i class="fa-solid fa-barcode"></i> CODE</span>
                                                        <span class="spec-value" title="{{ $product->code ?? 'N/A' }}">{{ $product->code ? '#' . $product->code : 'N/A' }}</span>
                                                    </div>
                                                    <div class="spec-cell">
                                                        <span class="spec-label"><i class="fa-solid fa-boxes-packing"></i> PKG. QTY</span>
                                                        <span class="spec-value">{{ $product->pkd ? $product->pkd . ' Pcs' : '20 Pcs' }}</span>
                                                    </div>
                                                    <div class="spec-cell">
                                                        <span class="spec-label"><i class="fa-solid fa-sliders"></i> MODULE</span>
                                                        <span class="spec-value">{{ $product->size ?? 'Standard' }}</span>
                                                    </div>
                                                    <div class="spec-cell">
                                                        <span class="spec-label"><i class="fa-solid fa-shield-halved"></i> SERIES</span>
                                                        <span class="spec-value text-truncate" title="{{ $category->name }}">{{ $category->name }}</span>
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

                             <!-- No Matching Products Found (Live Search State) -->
                             <div id="voltivaNoProductsFound" class="col-12 py-5 text-center" style="display: none;">
                                <div style="max-width: 440px; margin: 0 auto; background: #ffffff; border: 1px solid #dce5e6; border-radius: 16px; padding: 36px 24px; box-shadow: 0 10px 25px rgba(0,0,0,0.03);">
                                   <div style="width: 56px; height: 56px; border-radius: 50%; background: rgba(30, 138, 138, 0.1); color: #1e8a8a; display: flex; align-items: center; justify-content: center; font-size: 22px; margin: 0 auto 16px auto;">
                                      <i class="fa-solid fa-magnifying-glass"></i>
                                   </div>
                                   <h4 style="font-size: 18px; font-weight: 700; color: #0c1e21; margin-bottom: 8px;">No matching models found</h4>
                                   <p style="font-size: 13.5px; color: #67787a; margin-bottom: 18px;">We couldn't find any models matching your search query. Try a different model name, code, or module size.</p>
                                   <button type="button" id="voltivaResetFilterBtn" class="accura-btn-enquire" style="padding: 9px 20px;">
                                      <i class="fa-solid fa-rotate-left me-1"></i> Reset Search Filter
                                   </button>
                                </div>
                             </div>

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

      // ── Voltiva Category Sidebar Search & Clear ──
      const catSearchInput = document.getElementById('voltivaCatSearch');
      const catSearchClear = document.getElementById('voltivaCatSearchClear');
      const catSearchIcon = document.getElementById('voltivaCatSearchIcon');
      const catItems = document.querySelectorAll('.voltiva-cat-nav-item');

      if (catSearchInput && catItems.length > 0) {
         function filterSidebarCategories() {
            const query = catSearchInput.value.trim().toLowerCase();
            if (query.length > 0) {
               if (catSearchClear) catSearchClear.style.display = 'block';
               if (catSearchIcon) catSearchIcon.style.display = 'none';
            } else {
               if (catSearchClear) catSearchClear.style.display = 'none';
               if (catSearchIcon) catSearchIcon.style.display = 'block';
            }

            catItems.forEach(item => {
               const catName = item.getAttribute('data-cat-name') || '';
               if (!query || catName.includes(query)) {
                  item.style.display = '';
               } else {
                  item.style.display = 'none';
               }
            });
         }

         catSearchInput.addEventListener('input', filterSidebarCategories);

         if (catSearchClear) {
            catSearchClear.addEventListener('click', function () {
               catSearchInput.value = '';
               filterSidebarCategories();
               catSearchInput.focus();
            });
         }
      }

      // ── Interactive In-Category Model Search & Subcategory Filtering ──
      const modelSearchInput = document.getElementById('voltivaModelSearch');
      const modelSearchClear = document.getElementById('voltivaModelSearchClear');
      const visibleCountEl = document.getElementById('voltivaVisibleCount');
      const noResultsBox = document.getElementById('voltivaNoProductsFound');
      const resetFilterBtn = document.getElementById('voltivaResetFilterBtn');
      const allProductCards = document.querySelectorAll('.accura-grid-item');
      const allSubcatSections = document.querySelectorAll('.subcategory-section');
      const filterPills = document.querySelectorAll('.voltiva-subcat-pill-item');
      const sidebarSubcatLinks = document.querySelectorAll('.voltiva-subcat-jump-link');

      let currentSubcatFilter = 'all';

      function applyModelFilters() {
         const searchQuery = (modelSearchInput ? modelSearchInput.value : '').trim().toLowerCase();
         
         if (modelSearchClear) {
            modelSearchClear.style.display = searchQuery ? 'inline-flex' : 'none';
         }

         let totalVisible = 0;

         allSubcatSections.forEach(section => {
            const sectionSubcatId = section.getAttribute('data-subcat-section-id');
            const sectionCards = section.querySelectorAll('.accura-grid-item');
            let sectionVisibleCount = 0;

            const isSubcatMatch = (currentSubcatFilter === 'all' || currentSubcatFilter === sectionSubcatId);

            if (!isSubcatMatch) {
               section.style.display = 'none';
               sectionCards.forEach(card => card.style.display = 'none');
            } else {
               sectionCards.forEach(card => {
                  const title = card.getAttribute('data-title') || '';
                  const code = card.getAttribute('data-code') || '';
                  const size = card.getAttribute('data-size') || '';

                  const matchesSearch = !searchQuery || 
                     title.includes(searchQuery) || 
                     code.includes(searchQuery) || 
                     size.includes(searchQuery);

                  if (matchesSearch) {
                     card.style.display = '';
                     sectionVisibleCount++;
                     totalVisible++;
                  } else {
                     card.style.display = 'none';
                  }
               });

               // Show section only if at least one card is visible
               if (sectionVisibleCount > 0) {
                  section.style.display = '';
               } else {
                  section.style.display = 'none';
               }

               // Update subcat visible counter if present
               const subcatBadge = section.querySelector('.subcat-visible-count');
               if (subcatBadge) {
                  subcatBadge.textContent = sectionVisibleCount;
               }
            }
         });

         // Update total count
         if (visibleCountEl) {
            visibleCountEl.textContent = totalVisible;
         }

         // Show/hide zero result state
         if (noResultsBox) {
            noResultsBox.style.display = (totalVisible === 0) ? 'block' : 'none';
         }
      }

      if (modelSearchInput) {
         modelSearchInput.addEventListener('input', applyModelFilters);
      }

      if (modelSearchClear) {
         modelSearchClear.addEventListener('click', function () {
            modelSearchInput.value = '';
            applyModelFilters();
            modelSearchInput.focus();
         });
      }

      if (resetFilterBtn) {
         resetFilterBtn.addEventListener('click', function () {
            if (modelSearchInput) modelSearchInput.value = '';
            setActiveSubcategory('all');
            applyModelFilters();
         });
      }

      function setActiveSubcategory(subcatId, shouldScroll = false) {
         currentSubcatFilter = subcatId;

         // Sync top pills
         filterPills.forEach(pill => {
            const pillId = pill.getAttribute('data-filter-subcat');
            if (pillId === subcatId) {
               pill.classList.add('is-active');
            } else {
               pill.classList.remove('is-active');
            }
         });

         // Sync sidebar links
         sidebarSubcatLinks.forEach(link => {
            const linkId = link.getAttribute('data-filter-subcat');
            if (linkId === subcatId) {
               link.classList.add('active-subcat');
            } else {
               link.classList.remove('active-subcat');
            }
         });

         applyModelFilters();

         if (shouldScroll) {
            let targetEl = null;
            if (subcatId === 'all') {
               targetEl = document.querySelector('.voltiva-cat-header-strip');
            } else {
               targetEl = document.getElementById('subcategory-' + subcatId);
            }

            if (targetEl) {
               const headerOffset = 110;
               const elementPosition = targetEl.getBoundingClientRect().top;
               const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

               window.scrollTo({
                  top: offsetPosition,
                  behavior: 'smooth'
               });

               targetEl.style.transition = 'box-shadow 0.4s ease, transform 0.4s ease';
               targetEl.style.transform = 'scale(1.006)';
               setTimeout(() => {
                  targetEl.style.transform = '';
               }, 600);
            }
         }
      }

      // Top Filter Pill clicks
      filterPills.forEach(pill => {
         pill.addEventListener('click', function (e) {
            e.preventDefault();
            const subcatId = this.getAttribute('data-filter-subcat');
            setActiveSubcategory(subcatId, false);
         });
      });

      // Sidebar subcategory jump/filter links
      sidebarSubcatLinks.forEach(link => {
         link.addEventListener('click', function (e) {
            e.preventDefault();
            const subcatId = this.getAttribute('data-filter-subcat');
            setActiveSubcategory(subcatId, true);

            // Close mobile drawer if open
            if (sidebarCard && sidebarCard.classList.contains('mobile-open')) {
               sidebarCard.classList.remove('mobile-open');
               if (mobileToggleBtn) mobileToggleBtn.classList.remove('active');
            }
         });
      });

      // ── Mobile Sidebar Drawer Toggle ──
      const mobileToggleBtn = document.getElementById('voltivaMobileCatToggle');
      const sidebarCard = document.getElementById('voltivaCategorySidebar');
      if (mobileToggleBtn && sidebarCard) {
         mobileToggleBtn.addEventListener('click', function () {
            sidebarCard.classList.toggle('mobile-open');
            mobileToggleBtn.classList.toggle('active');
         });
      }

      // Auto scroll active category into view inside sidebar
      const activeCatItem = document.querySelector('.voltiva-cat-nav-link.is-active');
      const catList = document.getElementById('voltivaCatList');
      if (activeCatItem && catList) {
         setTimeout(() => {
            const itemTop = activeCatItem.offsetTop;
            if (itemTop > 200) {
               catList.scrollTop = itemTop - 100;
            }
         }, 300);
      }
   });
   </script>
</body>

</html>
