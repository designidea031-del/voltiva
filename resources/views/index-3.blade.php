<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Dynamic SEO Meta Tags -->
  <x-seo-head page="home" />
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
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
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
  <header class="header-area header-2 header-absolute section-gap-x">
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
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                      <input class="search-form-input" type="text" placeholder="Type Words and Hit Enter" required>
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
  <header class="header-area header-2 header-duplicate header-sticky section-gap-x">
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
                  <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
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
                      <input class="search-form-input" type="text" placeholder="Type Words and Hit Enter" required>
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
        @php
          $homeBanner = \App\Models\PageBanner::forPage('home');
          $homeTitle = ($homeBanner && !empty($homeBanner->title) && $homeBanner->title !== 'Home Page') ? $homeBanner->title : 'Leading Future for Business.';
          $homeSubtitle = $homeBanner?->subtitle ?: 'Committed to delivering innovative solutions that drive success. With a focus on quality.';
          $homeBtnText = $homeBanner?->button_text ?: 'Get Started';
          $homeBtnLink = $homeBanner?->button_link ?: route('contact');
          
          // Dynamic Hero Video from Site Settings
          $heroVideoSetting = setting('home_hero_video');
          $heroVideoUrl = setting('home_hero_video_url');
          $heroVideoSource = setting('home_hero_video_source', 'default');
          $heroOverlaySetting = setting('home_hero_video_overlay');

          $heroVideoSrc = asset('assets/video/board.mp4');
          if ($heroVideoSource === 'url' && !empty($heroVideoUrl)) {
              $heroVideoSrc = $heroVideoUrl;
          } elseif ($heroVideoSource === 'upload' && !empty($heroVideoSetting)) {
              $heroVideoSrc = storage_asset($heroVideoSetting, 'assets/video/board.mp4');
          } elseif (!empty($heroVideoSetting)) {
              $heroVideoSrc = storage_asset($heroVideoSetting, 'assets/video/board.mp4');
          } elseif (!empty($heroVideoUrl)) {
              $heroVideoSrc = $heroVideoUrl;
          }

          $homeOverlayOpacity = 0.65;
          if ($heroOverlaySetting !== null && $heroOverlaySetting !== '') {
              $homeOverlayOpacity = ((float) $heroOverlaySetting) / 100;
          } elseif ($homeBanner && $homeBanner->overlay_opacity !== null) {
              $homeOverlayOpacity = $homeBanner->overlay_opacity / 100;
          }

          $homeBgImage = ($homeBanner && !empty($homeBanner->desktop_image)) ? asset('storage/' . ltrim($homeBanner->desktop_image, '/')) : null;
        @endphp
        <!-- start: Banner Section -->
        <style>
          .tj-slider-section.hero-custom-frame {
            position: relative;
            overflow: hidden;
            height: calc(100vh - 30px) !important;
            min-height: 600px;
            margin: 15px 15px 0 15px !important;
            border-radius: 16px !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: flex-end !important;
            align-items: flex-start !important;
          }
          .tj-slider-section.hero-custom-frame .hero-content-container {
            position: relative;
            z-index: 2;
            width: 100%;
            margin-top: auto;
            padding-left: clamp(24px, 3.5vw, 50px);
            padding-right: clamp(24px, 3.5vw, 50px);
            padding-bottom: 70px;
          }
          .tj-slider-section.hero-custom-frame .slider-wrapper {
            padding: 0 !important;
          }
          .tj-slider-section.hero-custom-frame .slider-content {
            max-width: 640px;
            text-align: left;
          }
          .tj-slider-section.hero-custom-frame .slider-title {
            color: #fff;
            font-size: clamp(2.2rem, 4.2vw, 3.8rem);
            font-weight: 500;
            line-height: 1.15;
            letter-spacing: -0.02em;
            margin-bottom: 14px;
            text-shadow: 0 2px 12px rgba(0, 0, 0, 0.45);
          }
          .tj-slider-section.hero-custom-frame .slider-desc {
            color: rgba(255, 255, 255, 0.88);
            font-size: clamp(1rem, 1.15vw, 1.15rem);
            font-weight: 400;
            line-height: 1.55;
            margin-bottom: 24px;
            max-width: 520px;
            text-shadow: 0 1px 8px rgba(0, 0, 0, 0.45);
          }
          @media (max-width: 767px) {
            .tj-slider-section.hero-custom-frame {
              margin: 12px 12px 0 12px !important;
              height: calc(100vh - 24px) !important;
              border-radius: 14px !important;
              min-height: 520px;
            }
            .tj-slider-section.hero-custom-frame .hero-content-container {
              padding-left: 20px;
              padding-right: 20px;
              padding-bottom: 40px;
            }
          }
          .about-content-area-2 {
            justify-content: flex-start;
          }
          .about-content-area-2 .about-content {
            max-width: 100% !important;
            width: 100% !important;
            margin-inline-start: 0 !important;
          }
        </style>
        <section class="tj-slider-section hero-custom-frame" style="@if($homeBgImage) background-image: url('{{ $homeBgImage }}'); background-size: cover; background-position: {{ $homeBanner->banner_position ?? 'center' }}; @endif">
          @if(!$homeBgImage)
          <video autoplay loop muted playsinline style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: 0;">
            <source src="{{ $heroVideoSrc }}" type="video/mp4">
          </video>
          @endif
          <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(14, 19, 30, {{ $homeOverlayOpacity }}); z-index: 1;"></div>
          
          <div class="hero-content-container">
            <div class="slider-wrapper">
              <div class="slider-content">
                <h1 class="slider-title">{!! $homeTitle !!}</h1>
                <div class="slider-desc" style="margin-bottom: 0;">{{ $homeSubtitle }}</div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: Banner Section -->



        <!-- start: About Section -->
        <section class="tj-about-section section-gap">
          <div class="container">
            <div class="row row-gap-4">
              <div class="col-lg-4 col-md-6 order-lg-1 order-3">
                <div class="countup-item style-2 wow fadeInUp" data-wow-delay=".1s">
                  <span class="count-icon"><i class="tji-complete"></i></span>
                  <span class="steps">01.</span>
                  <div class="count-inner">
                    <div class="inline-content">
                      <span class="odometer countup-number" data-count="20">0</span>
                      <span class="count-plus">+</span>
                    </div>
                    <span class="count-text">Year of Experience</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-8 col-sm-12 order-lg-2 order-1">
                <div class="about-content-area-2 wow fadeInUp" data-wow-delay=".3s">
                  <div class="about-content">
                    <div class="sec-heading style-2">
                      <span class="sub-title">Get to Know Us</span>
                      <h2 class="sec-title title-highlight">Driving into Excellence & Innovation: Your Trusted Partner
                        for
                        Sustainable Business Success.
                      </h2>
                    </div>
                    <div class="wow fadeInUp" data-wow-delay=".3s">
                      <a class="text-btn" href="{{ route('about') }}">
                        <span class="btn-text"><span>Learn More</span></span>
                        <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                      </a>
                    </div>
                  </div>
                  <!-- <div class="video-img wow fadeInRight" data-wow-delay=".7s">
                    <img src="{{ asset('assets/images/about/about-3.webp') }}" alt="Image">
                    <a class="video-btn video-popup" data-autoplay="true" data-vbtype="video" data-maxwidth="1200px"
                      href="https://www.youtube.com/watch?v=MLpWrANjFbI&amp;ab_channel=eidelchteinadvogados">
                      <span><i class="tji-play"></i></span>
                    </a>
                  </div> -->
                </div>
              </div>
              <div class="col-lg-4 col-md-6 order-lg-3 order-2">
                <div class="countup-item style-2 wow fadeInUp" data-wow-delay=".3s">
                  <span class="count-icon"><i class="tji-user"></i></span>
                  <span class="steps">02.</span>
                  <div class="count-inner">
                    <div class="inline-content">
                      <span class="odometer countup-number" data-count="3">0</span>
                      <span class="count-plus">k</span>
                    </div>
                    <span class="count-text">Satisfied customers</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 order-lg-4 order-4">
                <div class="countup-item style-2 wow fadeInUp" data-wow-delay=".5s">
                  <span class="count-icon"><i class="tji-worldwide"></i></span>
                  <span class="steps">03.</span>
                  <div class="count-inner">
                    <div class="inline-content">
                      <span class="odometer countup-number" data-count="46">0</span>
                      <span class="count-plus">+</span>
                    </div>
                    <span class="count-text">Team</span>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6 order-lg-5 order-5">
                <div class="countup-item style-2 wow fadeInUp" data-wow-delay=".7s">
                  <span class="count-icon"><i class="tji-growth"></i></span>
                  <span class="steps">04.</span>
                  <div class="count-inner">
                    <div class="inline-content">
                      <span class="odometer countup-number" data-count="98">0</span>
                      <span class="count-plus">%</span>
                    </div>
                    <span class="count-text">Product Range</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: About Section -->

        <!-- start: Service Section -->
        <section class="tj-service-section service-2 section-gap section-gap-x slidebar-stickiy-container">
          <div class="container">
            <div class="row">
              <div class="col-lg-4">
                <div class="content-wrap  slidebar-stickiy">
                  <div class="sec-heading style-2">
                    <span class="sub-title wow fadeInUp" data-wow-delay=".3s">Why Choosing Us</span>
                    <h2 class="sec-title text-white text-anim">Benefits Of Choosing Us – Leading Electrical Accessories Manufacturers In
                      <span>India</span>
                    </h2>
                  </div>
                  <div class="wow fadeInUp" data-wow-delay=".6s">
                    <a class="tj-primary-btn" href="{{ route('service') }}">
                      <span class="btn-text"><span>More Services</span></span>
                      <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="service-wrapper-2">
                  <div class="service-item-wrapper tj-fadein-right-on-scroll">
                    <div class="service-item style-2 ">
                      <div class="title-area">
                        <div class="service-icon">
                          <i class="tji-service-1"></i>
                        </div>
                        <h4 class="title"><a href="{{ route('service-details') }}">Superior Product Quality</a></h4>
                      </div>
                      <div class="service-content">
                        <p class="desc">Our switches undergo rigorous testing to ensure durability and long-lasting performance.</p>
                      </div>
                    </div>
                  </div>

                  <div class="service-item-wrapper tj-fadein-right-on-scroll">
                    <div class="service-item style-2">
                      <div class="title-area">
                        <div class="service-icon">
                          <i class="tji-service-2"></i>
                        </div>
                        <h4 class="title"><a href="{{ route('service-details') }}">More Product Range</a></h4>
                      </div>
                      <div class="service-content">
                        <p class="desc">We offer switches, plates, regulators, and more, ensuring all your needs are met.</p>
                      </div>
                    </div>
                  </div>

                  <div class="service-item-wrapper tj-fadein-right-on-scroll">
                    <div class="service-item style-2">
                      <div class="title-area">
                        <div class="service-icon">
                          <i class="tji-service-3"></i>
                        </div>
                        <h4 class="title"><a href="{{ route('service-details') }}">Competitive Dealer Pricing</a></h4>
                      </div>
                      <div class="service-content">
                        <p class="desc">Attractive pricing structures enable higher profit margins without compromising on product quality.</p>
                      </div>
                    </div>
                  </div>

                  <div class="service-item-wrapper tj-fadein-right-on-scroll">
                    <div class="service-item style-2">
                      <div class="title-area">
                        <div class="service-icon">
                          <i class="tji-service-4"></i>
                        </div>
                        <h4 class="title"><a href="{{ route('service-details') }}">Fast and Reliable Shipping</a></h4>
                      </div>
                      <div class="service-content">
                        <p class="desc">We prioritize prompt delivery, ensuring you receive your inventory on time, every time.</p>
                      </div>
                    </div>
                  </div>

                  <div class="service-item-wrapper tj-fadein-right-on-scroll">
                    <div class="service-item style-2">
                      <div class="title-area">
                        <div class="service-icon">
                          <i class="tji-user"></i>
                        </div>
                        <h4 class="title"><a href="{{ route('service-details') }}">Customer Support</a></h4>
                      </div>
                      <div class="service-content">
                        <p class="desc">Our experienced team provides prompt assistance and guidance for all product-related inquiries.</p>
                      </div>
                    </div>
                  </div>

                  <div class="service-item-wrapper tj-fadein-right-on-scroll">
                    <div class="service-item style-2">
                      <div class="title-area">
                        <div class="service-icon">
                          <i class="tji-service-6"></i>
                        </div>
                        <h4 class="title"><a href="{{ route('service-details') }}">Custom Solutions Available</a></h4>
                      </div>
                      <div class="service-content">
                        <p class="desc">We collaborate with dealers to develop tailored products that meet unique customer requirements.</p>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="bg-shape-1">
            <img src="{{ asset('assets/images/shape/pattern-2.svg') }}" alt="">
          </div>
          <div class="bg-shape-2">
            <img src="{{ asset('assets/images/shape/pattern-3.svg') }}" alt="">
          </div>
          <div class="bg-shape-3">
            <img src="{{ asset('assets/images/shape/shape-blur.svg') }}" alt="">
          </div>
        </section>
        <!-- end: Service Section -->

        <!-- start: Product Carousel Section -->
        <!-- start: Voltiva Prime Modular Flat Plate Showcase Section (Full Width) -->
        <!-- start: Voltiva Prime Modular Flat Plate Showcase Section (Proper Multi-Element Design) -->
        <section class="tj-prime-showcase-section">
          <div class="prime-stage-canvas">

            <!-- Background Architectural Grid & Grey Tone Panel -->
            <div class="prime-bg-grid" aria-hidden="true">
              <div class="prime-bg-panel-grey"></div>
              <div class="prime-bg-center-line"></div>
            </div>

            <!-- Top-Right Official Brand Logo -->
            <div class="prime-corner-brand prime-brand-top">
              <img src="{{ asset('assets/images/product/prime-voltiva-logo-hd.png') }}" 
                   alt="Voltiva - Powering Your Ambition" 
                   loading="lazy" />
            </div>

            <!-- Bottom-Left Official Prime Series Badge -->
            <div class="prime-corner-brand prime-brand-bottom">
              <img src="{{ asset('assets/images/product/prime-badge-logo-hd.png') }}" 
                   alt="PRIME modular flat plate" 
                   loading="lazy" />
            </div>

            <!-- Layer 1: Background Monumental Typography (Directly UNDER Switchboard) -->
            <div class="prime-bg-text-layer" aria-hidden="true">
              <span class="p-line p-line-1">PREMIUM</span>
              <span class="p-line p-line-2">MODULAR</span>
              <span class="p-line p-line-3">PLATE</span>
            </div>

            <!-- Layer 2: Center 3D Floating Switchboard Plate (Overlapping the Typography) -->
            <div class="prime-switch-layer">
              <a href="{{ route('product') }}" class="prime-switch-link" title="Explore Voltiva Prime Modular Flat Plate Collection">
                <img src="{{ asset('assets/images/product/prime-modular-plate-isolated.png') }}" 
                     alt="Voltiva Prime Modular Flat Plate" 
                     class="prime-switch-img" />
              </a>
            </div>

            <!-- Layer 3: Bottom-Right Typography & Cyan Accent Bar -->
            <div class="prime-bottom-statement" aria-hidden="true">
              <span class="prime-script-text">seamless fit</span>
              <div class="prime-statement-title">
                <span class="word-sleek">SLEEK</span>
                <span class="word-design">
                  DESIGN
                  <span class="prime-cyan-accent"></span>
                </span>
              </div>
            </div>

          </div>

          <style>
            @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@600;700&family=Montserrat:wght@900&family=Outfit:wght@800;900&display=swap');

            .tj-prime-showcase-section {
              position: relative;
              width: 100%;
              background: #ffffff;
              overflow: hidden;
              padding: 0;
              margin: 0;
              box-sizing: border-box;
              display: flex;
              align-items: center;
              justify-content: center;
              user-select: none;
            }

            /* Proportional Stage Canvas locked to exact 1786 / 1258 geometric aspect ratio */
            .prime-stage-canvas {
              position: relative;
              width: 100%;
              max-width: 1600px;
              aspect-ratio: 1786 / 1258;
              margin: 0 auto;
              overflow: hidden;
              background: #ffffff;
              container-type: inline-size;
            }

            /* Background Grid, Architectural Fold Line & Lower Grey Surface */
            .prime-bg-grid {
              position: absolute;
              inset: 0;
              z-index: 1;
              pointer-events: none;
            }
            .prime-bg-panel-grey {
              position: absolute;
              left: 0;
              top: 47.85%;
              width: 57%;
              bottom: 0;
              background: #e6e6e7;
            }
            .prime-bg-center-line {
              position: absolute;
              left: 50%;
              top: 0;
              bottom: 0;
              width: 1px;
              background: rgba(0, 0, 0, 0.08);
            }

            /* Corner Brand Logos */
            .prime-corner-brand {
              position: absolute;
              z-index: 7;
              pointer-events: none;
              user-select: none;
            }
            .prime-brand-top {
              top: 2.7%;
              right: 2.4%;
              width: 12.15cqi;
              max-width: 220px;
            }
            .prime-brand-top img {
              width: 100%;
              height: auto;
              display: block;
            }
            .prime-brand-bottom {
              bottom: 2.8%;
              left: 2.1%;
              width: 9.24cqi;
              max-width: 170px;
            }
            .prime-brand-bottom img {
              width: 100%;
              height: auto;
              display: block;
            }

            /* Layer 1: Massive Architectural Typography (Sits UNDER the Switchboard) */
            .prime-bg-text-layer {
              position: absolute;
              top: 4.77%;
              left: 5.15%;
              z-index: 2;
              display: flex;
              flex-direction: column;
              line-height: 0.88;
              font-family: 'Montserrat', sans-serif;
              font-weight: 900;
              font-size: clamp(38px, 9.75cqi, 156px);
              letter-spacing: -0.015em;
              pointer-events: none;
              user-select: none;
            }
            .prime-bg-text-layer .p-line-1,
            .prime-bg-text-layer .p-line-2 {
              color: #e6e6e7;
              display: block;
            }
            .prime-bg-text-layer .p-line-3 {
              color: #ffffff;
              -webkit-text-stroke: clamp(1px, 0.12cqi, 2.5px) #e6e6e7;
              display: block;
            }

            /* Layer 2: Center 3D Floating Switchboard Plate (Overlaps Text Layer) */
            .prime-switch-layer {
              position: absolute;
              top: 10.89%;
              left: 7.33%;
              width: 85.33%;
              z-index: 5;
              text-align: center;
            }
            .prime-switch-link {
              display: block;
              position: relative;
              width: 100%;
              cursor: pointer;
              text-decoration: none;
            }
            .prime-switch-img {
              width: 100%;
              height: auto;
              display: block;
              filter: drop-shadow(0 25px 42px rgba(0, 0, 0, 0.20)) drop-shadow(0 10px 18px rgba(0, 0, 0, 0.12));
              transition: transform 0.5s cubic-bezier(0.16, 1, 0.3, 1), filter 0.5s ease;
            }
            .prime-switch-link:hover .prime-switch-img {
              transform: translateY(-5px) scale(1.012);
              filter: drop-shadow(0 32px 52px rgba(0, 0, 0, 0.26)) drop-shadow(0 14px 22px rgba(0, 0, 0, 0.16));
            }

            /* Layer 3: Bottom-Right Statement with Script and Cyan Bar */
            .prime-bottom-statement {
              position: absolute;
              right: 2.52%;
              bottom: 8.5%;
              z-index: 6;
              text-align: right;
              display: flex;
              flex-direction: column;
              align-items: flex-end;
              pointer-events: none;
              user-select: none;
            }
            .prime-script-text {
              font-family: 'Caveat', cursive;
              font-size: clamp(22px, 4.8cqi, 76px);
              font-weight: 600;
              color: #70757d;
              line-height: 1;
              margin-bottom: -0.4cqi;
              margin-right: 0.3cqi;
              transform: rotate(-1.5deg);
            }
            .prime-statement-title {
              display: flex;
              align-items: baseline;
              gap: 0.25em;
              font-family: 'Montserrat', 'Outfit', sans-serif;
              font-weight: 900;
              font-size: clamp(28px, 6.2cqi, 98px);
              letter-spacing: 0.02em;
              color: #c8cfdb;
              line-height: 0.92;
            }
            .word-design {
              position: relative;
              display: inline-block;
            }
            .prime-cyan-accent {
              position: absolute;
              bottom: -0.55cqi;
              left: 0;
              width: 100%;
              height: clamp(3px, 0.42cqi, 6px);
              background: #42bcc8;
              border-radius: 4px;
            }

            /* Mobile and Tablet fallback safety */
            @media (max-width: 767px) {
              .prime-stage-canvas {
                aspect-ratio: 1786 / 1258;
              }
            }
          </style>
        </section>
        <!-- end: Voltiva Prime Modular Flat Plate Showcase Section -->
        <!-- end: Voltiva Prime Modular Flat Plate Showcase Section -->


        <!-- end: Project Section -->

        <!-- start: Working process Section -->
        <div class="tj-working-process section-gap section-gap-x">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="sec-heading-wrap">
                  <span class="sub-title wow fadeInUp" data-wow-delay=".3s">Our Process</span>
                  <div class="heading-wrap-content">
                    <div class="sec-heading style-2">
                      <h2 class="sec-title text-anim">Seamless Process, Great <span>Results.</span></h2>
                    </div>
                    <p class="desc wow fadeInUp" data-wow-delay=".5s">Developing personalized customer journeys to
                      increase
                      satisfaction and loyalty.</p>
                    <div class="btn-wrap wow fadeInUp" data-wow-delay=".6s">
                      <a class="tj-primary-btn" href="{{ route('contact') }}">
                        <span class="btn-text"><span>Request a Call</span></span>
                        <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="working-process-area">
                  <div class="process-item wow fadeInLeft" data-wow-delay=".5s">
                    <div class="process-step">
                      <span>01</span>
                    </div>
                    <div class="process-content">
                      <h4 class="title">Discovery & Planning</h4>
                      <p class="desc">The first step in our process is understanding your unique business needs,
                        objectives,
                        and our cutomes challenges.</p>
                    </div>
                  </div>
                  <div class="process-item wow fadeInLeft" data-wow-delay=".7s">
                    <div class="process-step">
                      <span>02</span>
                    </div>
                    <div class="process-content">
                      <h4 class="title">Execution & Delivery</h4>
                      <p class="desc">Once the plan is in place, our team moves forward with execution, turning
                        strategies
                        into actiony to deliver.</p>
                    </div>
                  </div>
                  <div class="process-item wow fadeInLeft" data-wow-delay=".9s">
                    <div class="process-step">
                      <span>03</span>
                    </div>
                    <div class="process-content">
                      <h4 class="title">Review & Support</h4>
                      <p class="desc">After project completion, we conduct a thorough review to ensure everything aligns
                        with your goals and requirements.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="bg-shape-1">
            <img src="{{ asset('assets/images/shape/pattern-2.svg') }}" alt="">
          </div>
          <div class="bg-shape-2">
            <img src="{{ asset('assets/images/shape/pattern-3.svg') }}" alt="">
          </div>
        </div>
        <!-- end: Working process Section -->

        <!-- start: Testimonial Section -->
        <section class="tj-testimonial-section-2 section-gap">
          <div class="container">
            <div class="row row-gap-3">
              <div class="col-lg-6">
                <div class="testimonial-img-area wow fadeInUp" data-wow-delay=".3s">
                  <div class="testimonial-img">
                    <img data-speed=".8" src="{{ asset('assets/images/testimonial/testimonial-img.webp') }}" alt="">
                    <div class="sec-heading style-2">
                      <h2 class="sec-title text-anim">Hear from Our <span>Customer.</span></h2>
                    </div>
                  </div>
                  <div class="box-area">
                    <div class="rating-box wow fadeInUp" data-wow-delay=".3s">
                      <h2 class="title">4.9</h2>
                      <div class="rating-area">
                        <div class="star-ratings">
                          <div class="fill-ratings" style="width: 100%">
                            <span>★★★★★</span>
                          </div>
                          <div class="empty-ratings">
                            <span>★★★★★</span>
                          </div>
                        </div>
                      </div>
                      <span class="rating-text">(80+ Clients Reviews)</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="testimonial-wrapper wow fadeInUp" data-wow-delay=".5s">
                  <div class="swiper testimonial-slider-2">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <div class="testimonial-item">
                          <span class="quote-icon"><i class="tji-quote"></i></span>
                          <div class="desc">
                            <p>GOLEK provides durable and high-quality modular accessories. Highly recommended for reliability!</p>
                          </div>
                          <div class="testimonial-author">
                            <div class="author-inner">
                              <div class="author-img">
                                <img src="{{ asset('assets/images/testimonial/client-1.webp') }}" alt="">
                              </div>
                              <div class="author-header">
                                <h4 class="title">Rajesh Patel</h4>
                                <span class="designation">Founder & CEO</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="testimonial-item">
                          <span class="quote-icon"><i class="tji-quote"></i></span>
                          <div class="desc">
                            <p>Great service and consistent product quality. GOLEK always delivers on time.</p>
                          </div>
                          <div class="testimonial-author">
                            <div class="author-inner">
                              <div class="author-img">
                                <img src="{{ asset('assets/images/testimonial/client-2.webp') }}" alt="">
                              </div>
                              <div class="author-header">
                                <h4 class="title">Harsh Patel</h4>
                                <span class="designation">Manager</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="testimonial-item">
                          <span class="quote-icon"><i class="tji-quote"></i></span>
                          <div class="desc">
                            <p>Innovative solutions and excellent customer service. GOLEK is a trusted partner!</p>
                          </div>
                          <div class="testimonial-author">
                            <div class="author-inner">
                              <div class="author-img">
                                <img src="{{ asset('assets/images/testimonial/client-3.webp') }}" alt="">
                              </div>
                              <div class="author-header">
                                <h4 class="title">Ali Hassan</h4>
                                <span class="designation">Founder</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="testimonial-item">
                          <span class="quote-icon"><i class="tji-quote"></i></span>
                          <div class="desc">
                            <p>The best in electrical accessories. GOLEK ensures safety and efficiency in all products.</p>
                          </div>
                          <div class="testimonial-author">
                            <div class="author-inner">
                              <div class="author-img">
                                <img src="{{ asset('assets/images/testimonial/client-1.webp') }}" alt="">
                              </div>
                              <div class="author-header">
                                <h4 class="title">Suresh Patel</h4>
                                <span class="designation">Director</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="testimonial-item">
                          <span class="quote-icon"><i class="tji-quote"></i></span>
                          <div class="desc">
                            <p>High performance and cutting-edge technology. GOLEK's products never disappoint!</p>
                          </div>
                          <div class="testimonial-author">
                            <div class="author-inner">
                              <div class="author-img">
                                <img src="{{ asset('assets/images/testimonial/client-2.webp') }}" alt="">
                              </div>
                              <div class="author-header">
                                <h4 class="title">Mohan Singh</h4>
                                <span class="designation">CEO</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="testimonial-item">
                          <span class="quote-icon"><i class="tji-quote"></i></span>
                          <div class="desc">
                            <p>GOLEK offers top-notch quality and excellent after-sales service. Highly reliable!</p>
                          </div>
                          <div class="testimonial-author">
                            <div class="author-inner">
                              <div class="author-img">
                                <img src="{{ asset('assets/images/testimonial/client-3.webp') }}" alt="">
                              </div>
                              <div class="author-header">
                                <h4 class="title">Vijay Desai</h4>
                                <span class="designation">Director</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-pagination-area"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: Testimonial Section -->





        <!-- start: Blog Section -->
        <section class="tj-blog-section-2 section-gap">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="sec-heading-wrap">
                  <span class="sub-title wow fadeInUp" data-wow-delay=".3s">Read Blogs</span>
                  <div class="heading-wrap-content">
                    <div class="sec-heading style-2">
                      <h2 class="sec-title text-anim">Strategies and <span>Insights.</span></h2>
                    </div>
                    <div class="wow fadeInUp" data-wow-delay=".5s">
                      <p class="desc">Developing personalized customer journeys to increase satisfaction and loyalty.
                      </p>
                    </div>
                    <div class="slider-navigation d-none d-md-inline-flex wow fadeInUp" data-wow-delay=".7s">
                      <div class="slider-prev">
                        <span class="anim-icon">
                          <i class="tji-arrow-left"></i>
                          <i class="tji-arrow-left"></i>
                        </span>
                      </div>
                      <div class="slider-next">
                        <span class="anim-icon">
                          <i class="tji-arrow-right"></i>
                          <i class="tji-arrow-right"></i>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="blog-wrapper wow fadeIn" data-wow-delay=".5s">
                  <div class="swiper blog-slider">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <div class="blog-item style-2">
                          <div class="blog-thumb">
                            <a href="{{ route('blog-details') }}"><img src="{{ asset('assets/images/blog/blog-4.webp') }}" alt=""></a>
                            <div class="blog-date">
                              <span class="date">28</span>
                              <span class="month">Feb</span>
                            </div>
                          </div>
                          <div class="blog-content">
                            <div class="title-area">
                              <div class="blog-meta">
                                <span class="categories"><a href="{{ route('blog-details') }}">Business</a></span>
                                <span>By <a href="{{ route('blog-details') }}">Ellinien Loma</a></span>
                              </div>
                              <h4 class="title"><a href="{{ route('blog-details') }}">Harnessing Digital Transform a Roadmap
                                  Businesses.</a></h4>
                            </div>
                            <a class="text-btn" href="{{ route('blog-details') }}">
                              <span class="btn-text"><span>Read More</span></span>
                              <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="blog-item style-2">
                          <div class="blog-thumb">
                            <a href="{{ route('blog-details') }}"><img src="{{ asset('assets/images/blog/blog-5.webp') }}" alt=""></a>
                            <div class="blog-date">
                              <span class="date">28</span>
                              <span class="month">Feb</span>
                            </div>
                          </div>
                          <div class="blog-content">
                            <div class="title-area">
                              <div class="blog-meta">
                                <span class="categories"><a href="{{ route('blog-details') }}">Business</a></span>
                                <span>By <a href="{{ route('blog-details') }}">Ellinien Loma</a></span>
                              </div>
                              <h4 class="title"><a href="{{ route('blog-details') }}">Mastering Change Management Lessons for
                                  Businesses.</a></h4>
                            </div>
                            <a class="text-btn" href="{{ route('blog-details') }}">
                              <span class="btn-text"><span>Read More</span></span>
                              <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-pagination-area"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: Blog Section -->

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
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <x-seo-footer />
</body>

</html>
