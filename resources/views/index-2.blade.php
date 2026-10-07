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
  <header class="header-area header-1 header-absolute  section-gap-x">
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
  <header class="header-area header-1 header-duplicate header-sticky  section-gap-x">
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
        <div class="space-for-header"></div>
        <!-- start: Banner Section -->
        <section class="tj-banner-section section-gap-x">
          <div class="banner-area">
            <div class="banner-left-box">
              <div class="banner-content">
                <span class="sub-title wow fadeInDown" data-wow-delay=".2s">
                  <i class="tji-excellence"></i> Recognized for Excellence
                </span>
                <h1 class="banner-title title-anim">Driving Excellence Through Evolution and
                  <span>Trust.</span>
                </h1>
                <div class="banner-desc-area wow fadeInUp" data-wow-delay=".7s">
                  <a class="banner-link" href="{{ route('about') }}">
                    <span><i class="tji-arrow-right-big"></i></span>
                  </a>
                  <div class="banner-desc">Represents growth, expansion, and modern
                    business solution present growth, expansion.
                  </div>
                </div>
              </div>
              <div class="banner-shape">
                <img src="{{ asset('assets/images/shape/pattern-bg.webp') }}" alt="">
              </div>
            </div>
            <div class="banner-right-box">
              <div class="banner-img">
                <img data-speed="0.8" src="{{ asset('assets/images/hero/hero-img.webp') }}" alt="">
              </div>
              <div class="box-area">
                <div class="customers-box">
                  <div class="customers">
                    <ul>
                      <li class="wow fadeInLeft" data-wow-delay=".5s"><img src="{{ asset('assets/images/testimonial/client-1.webp') }}"
                          alt=""></li>
                      <li class="wow fadeInLeft" data-wow-delay=".6s"><img src="{{ asset('assets/images/testimonial/client-2.webp') }}"
                          alt=""></li>
                      <li class="wow fadeInLeft" data-wow-delay=".7s"><img src="{{ asset('assets/images/testimonial/client-3.webp') }}"
                          alt=""></li>
                      <li class="wow fadeInLeft" data-wow-delay=".8s"><span><i class="tji-plus"></i></span></li>
                    </ul>
                  </div>
                  <div class="customers-number wow fadeInUp" data-wow-delay=".5s">30K</div>
                  <h6 class="customers-text wow fadeInUp" data-wow-delay=".5s">Happy customer we have world-wide.</h6>
                </div>
              </div>
            </div>
          </div>
          <div class="banner-scroll wow fadeInDown" data-wow-delay="2s">
            <a href="#choose" class="scroll-down">
              <span><i class="tji-arrow-down-long"></i></span>
              Scroll Down
            </a>
          </div>
        </section>
        <!-- end: Banner Section -->

        <!-- start: Choose Section -->
        <section id="choose" class="tj-choose-section section-gap">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="sec-heading text-center">
                  <span class="sub-title wow fadeInUp" data-wow-delay=".3s"><i class="tji-box"></i>Choose the
                    Best</span>
                  <h2 class="sec-title title-anim">Empowering Business with <span>Expertise.</span></h2>
                </div>
              </div>
            </div>
            <div class="row row-gap-4 rightSwipeWrap">
              <div class="col-lg-4">
                <div class="choose-box right-swipe">
                  <div class="choose-content">
                    <div class="choose-icon">
                      <i class="tji-innovative"></i>
                    </div>
                    <h4 class="title">Innovative Solutions</h4>
                    <p class="desc">We stay ahead of the curve, leveraging cutting-edge technologies and strategies to
                      keep
                      you competitive in a marketplace.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="choose-box right-swipe">
                  <div class="choose-content">
                    <div class="choose-icon">
                      <i class="tji-award"></i>
                    </div>
                    <h4 class="title">Award-Winning Expertise</h4>
                    <p class="desc">Recognized by industry leaders, our award-winning team has a proven record of
                      delivering
                      excellence across projects.</p>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="choose-box right-swipe">
                  <div class="choose-content">
                    <div class="choose-icon">
                      <i class="tji-support"></i>
                    </div>
                    <h4 class="title">Dedicated Support</h4>
                    <p class="desc">Our team is always available to address your concerns, providing quick and effective
                      solution to keep your business.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: Choose Section -->

        <!-- start: Client Section -->
        <section class="tj-client-section client-section-gap wow fadeInUp" data-wow-delay=".4s">
          <div class="container-fluid client-container">
            <div class="row">
              <div class="col-12">
                <div class="client-content">
                  <h5 class="sec-title">Join Over <span class="client-numbers">1000+</span> Companies with
                    <span class="client-text">{{ $settings['site_name'] ?? 'Voltiva' }}</span> Here
                  </h5>
                </div>
                <div class="swiper client-slider client-slider-1">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide client-item">
                      <div class="client-logo">
                        <img src="{{ asset('assets/images/brands/brand-1.webp') }}" alt="">
                      </div>
                    </div>
                    <div class="swiper-slide client-item">
                      <div class="client-logo">
                        <img src="{{ asset('assets/images/brands/brand-2.webp') }}" alt="">
                      </div>
                    </div>
                    <div class="swiper-slide client-item">
                      <div class="client-logo">
                        <img src="{{ asset('assets/images/brands/brand-3.webp') }}" alt="">
                      </div>
                    </div>
                    <div class="swiper-slide client-item">
                      <div class="client-logo">
                        <img src="{{ asset('assets/images/brands/brand-4.webp') }}" alt="">
                      </div>
                    </div>
                    <div class="swiper-slide client-item">
                      <div class="client-logo">
                        <img src="{{ asset('assets/images/brands/brand-5.webp') }}" alt="">
                      </div>
                    </div>
                    <div class="swiper-slide client-item">
                      <div class="client-logo">
                        <img src="{{ asset('assets/images/brands/brand-6.webp') }}" alt="">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: Client Section -->

        <!-- start: About Section -->
        <section class="tj-about-section section-gap">
          <div class="container">
            <div class="row">
              <div class="col-xl-6 col-lg-6 order-lg-1 order-2">
                <div class="about-img-area wow fadeInLeft" data-wow-delay=".2s">
                  <div class="about-img overflow-hidden">
                    <img data-speed="0.8" src="{{ asset('assets/images/about/about-1.webp') }}" alt="">
                  </div>
                  <div class="box-area">
                    <div class="experience-box wow fadeInUp" data-wow-delay=".3s">
                      <span class="sub-title">Experiences</span>
                      <div class="customers-number">13+</div>
                      <h6 class="customers-text">Decades of Experience, Endless Innovation</h6>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 order-lg-2 order-1">
                <div class="about-content-area style-1 wow fadeInLeft" data-wow-delay=".2s">
                  <div class="sec-heading">
                    <span class="sub-title wow fadeInUp" data-wow-delay=".3s"><i class="tji-box"></i>Get to Know
                      Us</span>
                    <h2 class="sec-title title-anim">Empowering Businesses with Innovation,
                      Expertise, and for <span>Success.</span>
                    </h2>
                  </div>
                  <div class="wow fadeInUp" data-wow-delay=".5s">
                    <a class="text-btn" href="{{ route('about') }}">
                      <span class="btn-text"><span>Learn More</span></span>
                      <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                    </a>
                  </div>
                </div>
                <div class="about-bottom-area">
                  <div class="client-review-cont wow fadeInUp" data-wow-delay=".7s">
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
                    <p class="desc">We believe in building lasting relationships with our clients through trust,
                      innovation,
                      and
                      exceptional service.</p>
                    <div class="client-info-area">
                      <div class="client-info">
                        <h6 class="title">Esther Howard</h6>
                        <span class="designation">Co.Founder</span>
                      </div>
                      <span class="quote-icon"><i class="tji-quote"></i></span>
                    </div>
                  </div>
                  <div class="video-img  wow fadeInUp" data-wow-delay=".9s">
                    <img src="{{ asset('assets/images/about/about-2.webp') }}" alt="">
                    <a class="video-btn video-popup" data-autoplay="true" data-vbtype="video" data-maxwidth="1200px"
                      href="https://www.youtube.com/watch?v=MLpWrANjFbI&amp;ab_channel=eidelchteinadvogados">
                      <span><i class="tji-play"></i></span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: About Section -->

        <!-- start: Service Section -->
        <section class="tj-service-section overflow-hidden section-gap section-gap-x">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="sec-heading text-center">
                  <span class="sub-title text-white wow fadeInUp" data-wow-delay=".3s"><i class="tji-box"></i>Our
                    Solutions</span>
                  <h2 class="sec-title text-white title-anim">Solutions to Transform Your <span>Business.</span></h2>
                </div>
              </div>
            </div>
          </div>
          <div class="container-fluid p-0">
            <div class="row">
              <div class="col-12">
                <div class="service-wrapper wow fadeInUp" data-wow-delay=".4s">
                  <div class="swiper service-slider">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <div class="service-item style-1">
                          <div class="service-img">
                            <img src="{{ asset('assets/images/service/service-1.webp') }}" alt="">
                          </div>
                          <div class="service-icon">
                            <i class="tji-service-1"></i>
                          </div>
                          <div class="service-content">
                            <h4 class="title"><a href="{{ route('service-details') }}">Business Strategy Development</a></h4>
                            <p class="desc">Through a combination of data-driven insights and innovative approaches, we
                              work
                              closely with you to develop customized.</p>
                            <a class="text-btn" href="{{ route('service-details') }}">
                              <span class="btn-text"><span>Learn More</span></span>
                              <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="service-item style-1">
                          <div class="service-img">
                            <img src="{{ asset('assets/images/service/service-5.webp') }}" alt="">
                          </div>
                          <div class="service-icon">
                            <i class="tji-service-2"></i>
                          </div>
                          <div class="service-content">
                            <h4 class="title"><a href="{{ route('service-details') }}">Customer Experience Solutions</a></h4>
                            <p class="desc">Developing personalized customer journeys to increase satisfaction and
                              loyalty
                              of our expansion to keep competitive.</p>
                            <a class="text-btn" href="{{ route('service-details') }}">
                              <span class="btn-text"><span>Learn More</span></span>
                              <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="service-item style-1">
                          <div class="service-img">
                            <img src="{{ asset('assets/images/service/service-6.webp') }}" alt="">
                          </div>
                          <div class="service-icon">
                            <i class="tji-service-3"></i>
                          </div>
                          <div class="service-content">
                            <h4 class="title"><a href="{{ route('service-details') }}">Sustainability and ESG Consulting</a></h4>
                            <p class="desc">Provide tailored strategies that not only drive long-term value but also
                              build
                              trust with stakeholders, investors.</p>
                            <a class="text-btn" href="{{ route('service-details') }}">
                              <span class="btn-text"><span>Learn More</span></span>
                              <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="service-item style-1">
                          <div class="service-img">
                            <img src="{{ asset('assets/images/service/service-7.webp') }}" alt="">
                          </div>
                          <div class="service-icon">
                            <i class="tji-service-4"></i>
                          </div>
                          <div class="service-content">
                            <h4 class="title"><a href="{{ route('service-details') }}">Training and Development Programs</a></h4>
                            <p class="desc">Training and Development Programs are designed to empower employees with the
                              skills, knowledge, and tools they need.</p>
                            <a class="text-btn" href="{{ route('service-details') }}">
                              <span class="btn-text"><span>Learn More</span></span>
                              <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="swiper-pagination-area white-pagination"></div>
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
        </section>
        <!-- end: Service Section -->

        <!-- start: Project Section -->
        <section class="tj-project-section section-gap">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="sec-heading-wrap">
                  <span class="sub-title wow fadeInUp" data-wow-delay=".3s"><i class="tji-box"></i>Proud Projects</span>
                  <div class="heading-wrap-content">
                    <div class="sec-heading">
                      <h2 class="sec-title title-anim">Breaking Boundaries, Building <span>Dreams.</span></h2>
                    </div>
                    <p class="desc wow fadeInUp" data-wow-delay=".5s">We work closely with our clients to understand
                      their
                      unique needs and craft tailored
                      solutions that address challenges.</p>
                    <div class="btn-wrap wow fadeInUp" data-wow-delay=".6s">
                      <a class="tj-primary-btn" href="{{ route('portfolio') }}">
                        <span class="btn-text"><span>More Projects</span></span>
                        <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <div class="project-area tj-arrange-container">
                  <div class="project-item tj-arrange-item">
                    <div class="project-img" data-bg-image="assets/images/project/project-1.webp"></div>
                    <div class="project-content">
                      <span class="categories"><a href="{{ route('portfolio-details') }}">Connect</a></span>
                      <div class="project-text">
                        <h4 class="title"><a href="{{ route('portfolio-details') }}">Event Management Platform</a></h4>
                        <a class="project-btn" href="{{ route('portfolio-details') }}">
                          <i class="tji-arrow-right-long"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="project-item tj-arrange-item">
                    <div class="project-img" data-bg-image="assets/images/project/project-2.webp"></div>
                    <div class="project-content">
                      <span class="categories"><a href="{{ route('portfolio-details') }}">Empower</a></span>
                      <div class="project-text">
                        <h4 class="title"><a href="{{ route('portfolio-details') }}">Digital Marketing Campaign</a></h4>
                        <a class="project-btn" href="{{ route('portfolio-details') }}">
                          <i class="tji-arrow-right-long"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="project-item tj-arrange-item">
                    <div class="project-img" data-bg-image="assets/images/project/project-3.webp"></div>
                    <div class="project-content">
                      <span class="categories"><a href="{{ route('portfolio-details') }}">Support</a></span>
                      <div class="project-text">
                        <h4 class="title"><a href="{{ route('portfolio-details') }}">Interactive Learning Platform</a></h4>
                        <a class="project-btn" href="{{ route('portfolio-details') }}">
                          <i class="tji-arrow-right-long"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                  <div class="project-item tj-arrange-item">
                    <div class="project-img" data-bg-image="assets/images/project/project-4.webp"></div>
                    <div class="project-content">
                      <span class="categories"><a href="{{ route('portfolio-details') }}">Business</a></span>
                      <div class="project-text">
                        <h4 class="title"><a href="{{ route('portfolio-details') }}">Environmental Impact Dashboard</a></h4>
                        <a class="project-btn" href="{{ route('portfolio-details') }}">
                          <i class="tji-arrow-right-long"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: Project Section -->

        <!-- start: Countup Section -->
        <div class="tj-countup-section">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="countup-wrap">
                  <div class="countup-item">
                    <div class="inline-content">
                      <span class="odometer countup-number" data-count="93"></span>
                      <span class="count-plus">%</span>
                    </div>
                    <span class="count-text">Projects Completed.</span>
                    <span class="count-separator" data-bg-image="assets/images/shape/separator.svg"></span>
                  </div>
                  <div class="countup-item">
                    <div class="inline-content">
                      <span class="odometer countup-number" data-count="20"></span>
                      <span class="count-plus">M</span>
                    </div>
                    <span class="count-text">Reach Worldwide</span>
                    <span class="count-separator" data-bg-image="assets/images/shape/separator.svg"></span>
                  </div>
                  <div class="countup-item">
                    <div class="inline-content">
                      <span class="odometer countup-number" data-count="8.5"></span>
                      <span class="count-plus">X</span>
                    </div>
                    <span class="count-text">Faster Growth</span>
                    <span class="count-separator" data-bg-image="assets/images/shape/separator.svg"></span>
                  </div>
                  <div class="countup-item">
                    <div class="inline-content">
                      <span class="odometer countup-number" data-count="100"></span>
                      <span class="count-plus">+</span>
                    </div>
                    <span class="count-text">Awards Archived</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end: Countup Section -->

        <!-- start: Testimonial Section -->
        <section class="tj-testimonial-section section-gap section-gap-x">
          <div class="container">
            <div class="row justify-content-between">
              <div class="col-12">
                <div class="sec-heading-wrap">
                  <span class="sub-title wow fadeInUp" data-wow-delay=".3s"><i class="tji-box"></i>Clients
                    Feedback</span>
                  <div class="heading-wrap-content">
                    <div class="sec-heading">
                      <h2 class="sec-title title-anim">Success <span>Stories</span> Fuel our Innovation.</h2>
                    </div>
                    <div class="slider-navigation d-inline-flex wow fadeInUp" data-wow-delay=".4s">
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
                <div class="testimonial-wrapper wow fadeInUp" data-wow-delay=".5s">
                  <div class="swiper swiper-container testimonial-slider">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <div class="testimonial-item">
                          <span class="quote-icon"><i class="tji-quote"></i></span>
                          <div class="desc">
                            <p>Working with {{ $settings['site_name'] ?? 'Voltiva' }} has been a game-changer for our business. Their team's
                              professionalism,
                              attention to detail, and innovative solutions have helped us streamline operations and
                              achieve
                              our goals faster than we imagined. We truly feel like a valued partner.</p>
                          </div>
                          <div class="testimonial-author">
                            <div class="author-inner">
                              <div class="author-img">
                                <img src="{{ asset('assets/images/testimonial/client-1.webp') }}" alt="">
                              </div>
                              <div class="author-header">
                                <h4 class="title">Guy Hawkins</h4>
                                <span class="designation">Co. Founder</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="testimonial-item">
                          <span class="quote-icon"><i class="tji-quote"></i></span>
                          <div class="desc">
                            <p>The results we’ve seen after partnering with {{ $settings['site_name'] ?? 'Voltiva' }} are beyond our expectations. They not
                              only
                              understood our vision but also brought new ideas to the table that have taken our business
                              to
                              the next level. Their expertise and commitment to success make them a trusted.
                            </p>
                          </div>
                          <div class="testimonial-author">
                            <div class="author-inner">
                              <div class="author-img">
                                <img src="{{ asset('assets/images/testimonial/client-2.webp') }}" alt="">
                              </div>
                              <div class="author-header">
                                <h4 class="title">Ralph Edwards</h4>
                                <span class="designation">Co. Founder</span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="swiper-slide">
                        <div class="testimonial-item">
                          <span class="quote-icon"><i class="tji-quote"></i></span>
                          <div class="desc">
                            <p>We’ve been working with {{ $settings['site_name'] ?? 'Voltiva' }} for years, and they continue to deliver outstanding results.
                              Their team is proactive, responsive, and always goes the extra mile to ensure our needs
                              are
                              met. They’ve become a key contributor to our growth and success that really help us"
                            </p>
                          </div>
                          <div class="testimonial-author">
                            <div class="author-inner">
                              <div class="author-img">
                                <img src="{{ asset('assets/images/testimonial/client-3.webp') }}" alt="">
                              </div>
                              <div class="author-header">
                                <h4 class="title">Devon Lane</h4>
                                <span class="designation">Co. Founder</span>
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
          <div class="bg-shape-1">
            <img src="{{ asset('assets/images/shape/pattern-2.svg') }}" alt="">
          </div>
          <div class="bg-shape-2">
            <img src="{{ asset('assets/images/shape/pattern-3.svg') }}" alt="">
          </div>
        </section>
        <!-- end: Testimonial Section -->

        <!-- start: Faq Section -->
        <section class="tj-faq-section section-gap tj-arrange-container-2">
          <div class="container">
            <div class="row justify-content-between">
              <div class="col-lg-6">
                <div class="faq-img-area tj-arrange-item-2">
                  <div class="faq-img overflow-hidden">
                    <img src="{{ asset('assets/images/faq/faq.webp') }}" alt="">
                    <h2 class="title">Need Help? Start Here...</h2>
                  </div>
                  <div class="box-area ">
                    <div class="call-box">
                      <h4 class="title">Get Started Free Call? </h4>
                      <span class="call-icon"><i class="tji-phone"></i></span>
                      <a class="number" href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['contact_phone'] ?? '7600757008') }}"><span>{{ $settings['contact_phone'] ?? '+91 76007 57008' }}</span></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="accordion tj-faq tj-arrange-item-2" id="faqOne">
                  <div class="accordion-item active">
                    <button class=" faq-title" type="button" data-bs-toggle="collapse" data-bs-target="#faq-1"
                      aria-expanded="true">What services does {{ $settings['site_name'] ?? 'Voltiva' }} offer to clients?</button>
                    <div id="faq-1" class="collapse show" data-bs-parent="#faqOne">
                      <div class="accordion-body faq-text">
                        <p>Getting started is easy! Simply reach out to us through our contact form or give us a call,
                          and
                          we’ll schedule a consultation to discuss your project and how we can best assist you. Our team
                          keeps you informed throughout the process, ensuring quality control and timely delivery.</p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <button class="faq-title collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-2"
                      aria-expanded="false">How do I get started with Corporate Business?</button>
                    <div id="faq-2" class="collapse" data-bs-parent="#faqOne">
                      <div class="accordion-body faq-text">
                        <p>Getting started is easy! Simply reach out to us through our contact form or give us a call,
                          and
                          we’ll schedule a consultation to discuss your project and how we can best assist you. Our team
                          keeps you informed throughout the process, ensuring quality control and timely delivery.</p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <button class="faq-title collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-3"
                      aria-expanded="false">How do you ensure the success of a project?</button>
                    <div id="faq-3" class="collapse" data-bs-parent="#faqOne">
                      <div class="accordion-body faq-text">
                        <p>Getting started is easy! Simply reach out to us through our contact form or give us a call,
                          and
                          we’ll schedule a consultation to discuss your project and how we can best assist you. Our team
                          keeps you informed throughout the process, ensuring quality control and timely delivery.</p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <button class="faq-title collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-4"
                      aria-expanded="false">How long will it take to complete my project?</button>
                    <div id="faq-4" class="collapse" data-bs-parent="#faqOne">
                      <div class="accordion-body faq-text">
                        <p>Getting started is easy! Simply reach out to us through our contact form or give us a call,
                          and
                          we’ll schedule a consultation to discuss your project and how we can best assist you. Our team
                          keeps you informed throughout the process, ensuring quality control and timely delivery.</p>
                      </div>
                    </div>
                  </div>
                  <div class="accordion-item">
                    <button class="faq-title collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-5"
                      aria-expanded="false">Can I track the progress of my project?</button>
                    <div id="faq-5" class="collapse" data-bs-parent="#faqOne">
                      <div class="accordion-body faq-text">
                        <p>Getting started is easy! Simply reach out to us through our contact form or give us a call,
                          and
                          we’ll schedule a consultation to discuss your project and how we can best assist you. Our team
                          keeps you informed throughout the process, ensuring quality control and timely delivery.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: Faq Section -->

        <!-- start: Contact Section -->
        <section class="tj-contact-section section-gap section-gap-x">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="global-map wow fadeInUp" data-wow-delay=".3s">
                  <div class="global-map-img">
                    <img src="{{ asset('assets/images/bg/map.svg') }}" alt="Image">
                    <div class="location-indicator loc-1">
                      <div class="location-tooltip">
                        <span>Head office:</span>
                        <p>{{ $settings['contact_location'] ?? 'Sardar Ind. Area, Survey No.137/1-p3p, Plot No. 119/p, Village Padavla - 360 024, Rajkot, Gujarat - India' }}</p>
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['contact_phone'] ?? '7600757008') }}">P: {{ $settings['contact_phone'] ?? '+91 76007 57008' }}</a>
                        <a href="mailto:{{ $settings['contact_email'] ?? 'info@voltiva.com' }}">M: {{ $settings['contact_email'] ?? 'info@voltiva.com' }}</a>
                      </div>
                    </div>
                    <div class="location-indicator loc-2">
                      <div class="location-tooltip">
                        <span>Corporate Office:</span>
                        <p>{{ $settings['contact_location'] ?? 'Gujarat, India' }}</p>
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['contact_phone'] ?? '7600757008') }}">P: {{ $settings['contact_phone'] ?? '+91 76007 57008' }}</a>
                        <a href="mailto:{{ $settings['contact_email'] ?? 'info@voltiva.com' }}">M: {{ $settings['contact_email'] ?? 'info@voltiva.com' }}</a>
                      </div>
                    </div>
                    <div class="location-indicator loc-3">
                      <div class="location-tooltip">
                        <span>Customer Support:</span>
                        <p>{{ $settings['contact_working_hours'] ?? 'Mon - Sat: 9:00 AM - 6:00 PM' }}</p>
                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['contact_phone'] ?? '7600757008') }}">P: {{ $settings['contact_phone'] ?? '+91 76007 57008' }}</a>
                        <a href="mailto:{{ $settings['contact_email'] ?? 'info@voltiva.com' }}">M: {{ $settings['contact_email'] ?? 'info@voltiva.com' }}</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="contact-form style-2 wow fadeInUp" data-wow-delay=".4s">
                  <div class="sec-heading">
                    <span class="sub-title text-white"><i class="tji-box"></i>Get in Touch</span>
                    <h2 class="sec-title title-anim">Drop Us a <span>Line.</span></h2>
                  </div>
                  <form id="contact-form-2">
                    <div class="row wow fadeInUp" data-wow-delay=".5s">
                      <div class="col-sm-6">
                        <div class="form-input">
                          <input type="text" name="cfName2" placeholder="Full Name *">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-input">
                          <input type="email" name="cfEmail2" placeholder="Email Address *">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-input">
                          <input type="tel" name="cfPhone2" placeholder="Phone number *">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-input">
                          <div class="tj-nice-select-box">
                            <div class="tj-select">
                              <select name="cfSubject2">
                                <option value="0">Chose a option</option>
                                <option value="1">Business Strategy</option>
                                <option value="2">Customer Experience</option>
                                <option value="3">Sustainability and ESG</option>
                                <option value="4">Training and Development</option>
                                <option value="5">IT Support & Maintenance</option>
                                <option value="6">Marketing Strategy</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-input message-input">
                          <textarea name="cfMessage2" id="message" placeholder="Type message *"></textarea>
                        </div>
                      </div>
                      <div class="submit-btn">
                        <button class="tj-primary-btn" type="submit">
                          <span class="btn-text"><span>Send Message</span></span>
                          <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                        </button>
                      </div>
                    </div>
                  </form>
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
        </section>
        <!-- end: Contact Section -->

        <!-- start: Blog Section -->
        <section class="tj-blog-section section-gap">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="sec-heading text-center">
                  <span class="sub-title wow fadeInUp" data-wow-delay=".3s"><i class="tji-box"></i>Insights &
                    Ideas</span>
                  <h2 class="sec-title title-anim">The Ultimate <span>Resource.</span></h2>
                </div>
              </div>
            </div>
            <div class="row row-gap-4">
              <div class="col-xl-4 col-md-6">
                <div class="blog-item wow fadeInUp" data-wow-delay=".4s">
                  <div class="blog-thumb">
                    <a href="{{ route('blog-details') }}"><img src="{{ asset('assets/images/blog/blog-1.webp') }}" alt=""></a>
                    <div class="blog-date">
                      <span class="date">28</span>
                      <span class="month">Feb</span>
                    </div>
                  </div>
                  <div class="blog-content">
                    <div class="blog-meta">
                      <span class="categories"><a href="{{ route('blog-details') }}">Business</a></span>
                      <span>By <a href="{{ route('blog-details') }}">Ellinien Loma</a></span>
                    </div>
                    <h4 class="title"><a href="{{ route('blog-details') }}">Innovative Solutions for every Business Success.</a>
                    </h4>
                    <a class="text-btn" href="{{ route('blog-details') }}">
                      <span class="btn-text"><span>Read More</span></span>
                      <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6">
                <div class="blog-item wow fadeInUp" data-wow-delay=".4s">
                  <div class="blog-thumb">
                    <a href="{{ route('blog-details') }}"><img src="{{ asset('assets/images/blog/blog-2.webp') }}" alt=""></a>
                    <div class="blog-date">
                      <span class="date">28</span>
                      <span class="month">Feb</span>
                    </div>
                  </div>
                  <div class="blog-content">
                    <div class="blog-meta">
                      <span class="categories"><a href="{{ route('blog-details') }}">Business</a></span>
                      <span>By <a href="{{ route('blog-details') }}">Ellinien Loma</a></span>
                    </div>
                    <h4 class="title"><a href="{{ route('blog-details') }}">Harnessing Digital Transform a Roadmap Businesses.</a>
                    </h4>
                    <a class="text-btn" href="{{ route('blog-details') }}">
                      <span class="btn-text"><span>Read More</span></span>
                      <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 col-md-6">
                <div class="blog-item wow fadeInUp" data-wow-delay=".4s">
                  <div class="blog-thumb">
                    <a href="{{ route('blog-details') }}"><img src="{{ asset('assets/images/blog/blog-3.webp') }}" alt=""></a>
                    <div class="blog-date">
                      <span class="date">28</span>
                      <span class="month">Feb</span>
                    </div>
                  </div>
                  <div class="blog-content">
                    <div class="blog-meta">
                      <span class="categories"><a href="{{ route('blog-details') }}">Business</a></span>
                      <span>By <a href="{{ route('blog-details') }}">Ellinien Loma</a></span>
                    </div>
                    <h4 class="title"><a href="{{ route('blog-details') }}">Mastering Change Management Lessons for
                        Businesses.</a>
                    </h4>
                    <a class="text-btn" href="{{ route('blog-details') }}">
                      <span class="btn-text"><span>Read More</span></span>
                      <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                    </a>
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
