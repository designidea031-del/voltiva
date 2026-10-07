<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Dynamic SEO Meta Tags -->
  <x-seo-head page="about" title="About Us - Voltiva Electrical Solutions" />
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
        <!-- start: Breadcrumb Section -->
        <x-page-banner page="about" defaultTitle="About Us" parentTitle="Home" parentRoute="home-2" />
        <!-- end: Breadcrumb Section -->

        <!-- start: Choose Section -->
        <section id="choose" class="tj-choose-section section-gap">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="sec-heading-wrap">
                  <span class="sub-title wow fadeInUp" data-wow-delay=".3s"><i class="tji-box"></i>Choose the
                    Best</span>
                  <div class="heading-wrap-content">
                    <div class="sec-heading">
                      <h2 class="sec-title title-anim">Empowering Business with <span>Expertise.</span></h2>
                    </div>
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

        <!-- start: About Section -->
        <section class="tj-about-section-2 section-gap section-gap-x">
          <div class="container">
            <div class="row">
              <div class="col-xl-6 col-lg-6 order-lg-1 order-2">
                <div class="about-img-area style-2 wow fadeInLeft" data-wow-delay=".3s">
                  <div class="about-img overflow-hidden">
                    <img data-speed=".8" src="{{ asset('assets/images/about/about-5.webp') }}" alt="">
                  </div>
                  <div class="box-area style-2">
                    <div class="progress-box wow fadeInUp" data-wow-delay=".3s">
                      <h4 class="title">Business Progress</h4>
                      <ul class="tj-progress-list">
                        <li>
                          <h6 class="tj-progress-title">Revenue</h6>
                          <div class="tj-progress">
                            <span class="tj-progress-percent">82%</span>
                            <div class="tj-progress-bar" data-percent="82">
                            </div>
                          </div>
                        </li>
                        <li>
                          <h6 class="tj-progress-title">Satisfaction</h6>
                          <div class="tj-progress">
                            <span class="tj-progress-percent">90%</span>
                            <div class="tj-progress-bar" data-percent="90">
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 order-lg-2 order-1">
                <div class="about-content-area">
                  <div class="sec-heading">
                    <span class="sub-title wow fadeInUp" data-wow-delay=".3s"><i class="tji-box"></i>Get to Know
                      Us</span>
                    <h2 class="sec-title title-anim">Driving Innovation and Excellence for Sustainable Corporate Success
                      <span>Worldwide.</span>
                    </h2>
                  </div>
                </div>
                <div class="about-bottom-area">
                  <div class="mission-vision-box wow fadeInLeft" data-wow-delay=".5s">
                    <h4 class="title">Our Mission</h4>
                    <p class="desc">our mission is empower businesses through innovate best solution, exceptional
                      service.
                    </p>
                    <ul class="list-items">
                      <li><i class="tji-list"></i>Innovation & Excellence</li>
                      <li><i class="tji-list"></i>Exceptional Customer</li>
                      <li><i class="tji-list"></i>Business Growth</li>
                    </ul>
                  </div>
                  <div class="mission-vision-box wow fadeInRight" data-wow-delay=".5s">
                    <h4 class="title">Our Vision</h4>
                    <p class="desc">Our vision is to become a global leader in providing transformative business
                      solutions.
                    </p>
                    <ul class="list-items">
                      <li><i class="tji-list"></i>Global Leadership</li>
                      <li><i class="tji-list"></i>Transformative Impact</li>
                      <li><i class="tji-list"></i>Sustainable Success</li>
                    </ul>
                  </div>
                </div>
                <div class="about-btn-area wow fadeInUp" data-wow-delay=".6s">
                  <a class="tj-primary-btn" href="{{ route('about') }}">
                    <span class="btn-text"><span>Learn More About Us</span></span>
                    <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                  </a>
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
        <!-- end: About Section -->

        <!-- start: Client Section -->
        <section class="tj-client-section client-section-gap-2 wow fadeInUp" data-wow-delay=".4s">
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

        <!-- start: Testimonial Section -->
        <section class="tj-testimonial-section-2 section-bottom-gap">
          <div class="container">
            <div class="row row-gap-3">
              <div class="col-lg-6 order-lg-2">
                <div class="testimonial-img-area wow fadeInUp" data-wow-delay=".3s">
                  <div class="testimonial-img">
                    <img src="{{ asset('assets/images/testimonial/testimonial-img.webp') }}" alt="">
                    <div class="sec-heading style-2">
                      <h2 class="sec-title title-anim">Hear from Our <span>Customer.</span></h2>
                    </div>
                  </div>
                  <div class="box-area">
                    <div class="rating-box wow fadeInUp" data-wow-delay=".5s">
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
              <div class="col-lg-6 order-lg-1">
                <div class="testimonial-wrapper wow fadeInUp" data-wow-delay=".5s">
                  <div class="swiper testimonial-slider-2">
                    <div class="swiper-wrapper">
                      <div class="swiper-slide">
                        <div class="testimonial-item">
                          <span class="quote-icon"><i class="tji-quote"></i></span>
                          <div class="desc">
                            <p>Working with {{ $settings['site_name'] ?? 'Voltiva' }} has been a game-changer for our business. Their team's
                              professionalism,
                              attention to detail, and innovative solutions have helped us streamline operations and
                              achieve
                              our goals faster than we imagined. We truly feel like a valued partner. The results we’ve
                              seen
                              after partnering.</p>
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
        </section>
        <!-- end: Testimonial Section -->

        <!-- start: Team Section -->
        <section class="tj-team-section-3 section-gap section-gap-x">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="sec-heading text-center">
                  <span class="sub-title wow fadeInUp" data-wow-delay=".3s"><i class="tji-box"></i> Meet Our Team</span>
                  <h2 class="sec-title title-anim">Success <span>Stories</span> Fuel our Innovation.</h2>
                </div>
              </div>
            </div>
            <div class="row leftSwipeWrap">
              <div class="col-lg-3 col-sm-6">
                <div class="team-item left-swipe">
                  <div class="team-img">
                    <div class="team-img-inner">
                      <img src="{{ asset('assets/images/team/team-1.webp') }}" alt="">
                    </div>
                    <div class="social-links">
                      <ul>
                        <li><a href="{{ $settings['social_facebook'] ?? 'https://www.facebook.com/' }}" target="_blank"><i
                              class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li><a href="{{ $settings['social_instagram'] ?? 'https://www.instagram.com/' }}" target="_blank"><i
                              class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li><a href="{{ $settings['social_twitter'] ?? 'https://x.com/' }}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                        <li><a href="{{ $settings['social_linkedin'] ?? 'https://www.linkedin.com/' }}" target="_blank"><i
                              class="fa-brands fa-linkedin-in"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="team-content">
                    <h4 class="title"><a href="{{ route('team-details') }}">Eade Marren</a></h4>
                    <span class="designation">Chief Executive</span>
                    <a class="mail-at" href="mailto:{{ $settings['contact_email'] ?? 'info@voltiva.com' }}"><i class="tji-at"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                <div class="team-item left-swipe">
                  <div class="team-img">
                    <div class="team-img-inner">
                      <img src="{{ asset('assets/images/team/team-2.webp') }}" alt="">
                    </div>
                    <div class="social-links">
                      <ul>
                        <li><a href="{{ $settings['social_facebook'] ?? 'https://www.facebook.com/' }}" target="_blank"><i
                              class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li><a href="{{ $settings['social_instagram'] ?? 'https://www.instagram.com/' }}" target="_blank"><i
                              class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li><a href="{{ $settings['social_twitter'] ?? 'https://x.com/' }}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                        <li><a href="{{ $settings['social_linkedin'] ?? 'https://www.linkedin.com/' }}" target="_blank"><i
                              class="fa-brands fa-linkedin-in"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="team-content">
                    <h4 class="title"><a href="{{ route('team-details') }}">Savannah Ngueen</a></h4>
                    <span class="designation">Operations Head</span>
                    <a class="mail-at" href="mailto:{{ $settings['contact_email'] ?? 'info@voltiva.com' }}"><i class="tji-at"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                <div class="team-item left-swipe">
                  <div class="team-img">
                    <div class="team-img-inner">
                      <img src="{{ asset('assets/images/team/team-3.webp') }}" alt="">
                    </div>
                    <div class="social-links">
                      <ul>
                        <li><a href="{{ $settings['social_facebook'] ?? 'https://www.facebook.com/' }}" target="_blank"><i
                              class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li><a href="{{ $settings['social_instagram'] ?? 'https://www.instagram.com/' }}" target="_blank"><i
                              class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li><a href="{{ $settings['social_twitter'] ?? 'https://x.com/' }}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                        <li><a href="{{ $settings['social_linkedin'] ?? 'https://www.linkedin.com/' }}" target="_blank"><i
                              class="fa-brands fa-linkedin-in"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="team-content">
                    <h4 class="title"><a href="{{ route('team-details') }}">Kristin Watson</a></h4>
                    <span class="designation">Marketing Lead</span>
                    <a class="mail-at" href="mailto:{{ $settings['contact_email'] ?? 'info@voltiva.com' }}"><i class="tji-at"></i></a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-sm-6">
                <div class="team-item left-swipe">
                  <div class="team-img">
                    <div class="team-img-inner">
                      <img src="{{ asset('assets/images/team/team-4.webp') }}" alt="">
                    </div>
                    <div class="social-links">
                      <ul>
                        <li><a href="{{ $settings['social_facebook'] ?? 'https://www.facebook.com/' }}" target="_blank"><i
                              class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li><a href="{{ $settings['social_instagram'] ?? 'https://www.instagram.com/' }}" target="_blank"><i
                              class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li><a href="{{ $settings['social_twitter'] ?? 'https://x.com/' }}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                        <li><a href="{{ $settings['social_linkedin'] ?? 'https://www.linkedin.com/' }}" target="_blank"><i
                              class="fa-brands fa-linkedin-in"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="team-content">
                    <h4 class="title"><a href="{{ route('team-details') }}">Darlene Robertson</a></h4>
                    <span class="designation">Business Director</span>
                    <a class="mail-at" href="mailto:{{ $settings['contact_email'] ?? 'info@voltiva.com' }}"><i class="tji-at"></i></a>
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
        <!-- end: Team Section -->

        <!-- start: Faq Section -->
        <section class="tj-faq-section section-gap">
          <div class="container">
            <div class="row justify-content-between">
              <div class="col-lg-4">
                <div class="content-wrap">
                  <div class="sec-heading">
                    <span class="sub-title wow fadeInUp" data-wow-delay=".3s"><i class="tji-box"></i>Common
                      Questions</span>
                    <h2 class="sec-title title-anim">Need <span>Help?</span> Start Here...</h2>
                  </div>
                  <p class="desc wow fadeInUp" data-wow-delay=".6s">We stay ahead of curve, leveraging <br> cutting-edge
                    are
                    technologies and <br> strategies
                    to competitive</p>
                  <div class="wow fadeInUp" data-wow-delay=".8s">
                    <a class="tj-primary-btn" href="{{ route('contact') }}">
                      <span class="btn-text"><span>Request a Call</span></span>
                      <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-lg-8">
                <div class="accordion tj-faq" id="faqOne">
                  <div class="accordion-item active wow fadeInUp" data-wow-delay=".3s">
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
                  <div class="accordion-item wow fadeInUp" data-wow-delay=".4s">
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
                  <div class="accordion-item wow fadeInUp" data-wow-delay=".5s">
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
                  <div class="accordion-item wow fadeInUp" data-wow-delay=".6s">
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
                  <div class="accordion-item wow fadeInUp" data-wow-delay=".7s">
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
