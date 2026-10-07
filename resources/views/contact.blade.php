<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Dynamic SEO Meta Tags -->
  <x-seo-head page="contact" title="Contact Us - Voltiva Customer Support" />
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
        <x-page-banner page="contact" defaultTitle="Contact Us" parentTitle="Home" parentRoute="home-2" />
        <!-- end: Breadcrumb Section -->

        <!-- start: Contact Top Section -->
        <div class="tj-contact-area section-gap">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="sec-heading text-center">
                  <span class="sub-title wow fadeInUp" data-wow-delay=".1s"><i class="tji-box"></i>Contact info</span>
                  <h2 class="sec-title title-anim"><span>Reach</span> Out to Us</h2>
                </div>
              </div>
            </div>
            <div class="row row-gap-4">
              <div class="col-xl-4 col-lg-6 col-sm-6">
                <div class="contact-item style-2 wow fadeInUp h-100" data-wow-delay=".3s">
                  <div class="contact-icon">
                    <i class="tji-location-3"></i>
                  </div>
                  <h3 class="contact-title">Our Location</h3>
                  <p>{{ $settings['contact_location'] ?? 'Sardar Ind. Area, Survey No.137/1-p3p, Plot No. 119/p, Village Padavla - 360 024, Rajkot, Gujarat - India' }}</p>
                </div>
              </div>
              <div class="col-xl-4 col-lg-6 col-sm-6">
                <div class="contact-item style-2 wow fadeInUp h-100" data-wow-delay=".5s">
                  <div class="contact-icon">
                    <i class="tji-envelop"></i>
                  </div>
                  <h3 class="contact-title">Email us</h3>
                  <ul class="contact-list">
                    <li><a href="mailto:{{ $settings['contact_email'] ?? 'info@voltiva.com' }}">{{ $settings['contact_email'] ?? 'info@voltiva.com' }}</a></li>
                  </ul>
                  @if(!empty($settings['contact_working_hours']))
                  <p class="mt-2 text-muted" style="font-size:0.8rem;"><i class="tji-time"></i> {{ $settings['contact_working_hours'] }}</p>
                  @endif
                </div>
              </div>
              <div class="col-xl-4 col-lg-6 col-sm-6">
                <div class="contact-item style-2 wow fadeInUp h-100" data-wow-delay=".7s">
                  <div class="contact-icon">
                    <i class="tji-phone"></i>
                  </div>
                  <h3 class="contact-title">Call us</h3>
                  <ul class="contact-list">
                    <li><a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['contact_phone'] ?? '7600757008') }}">{{ $settings['contact_phone'] ?? '+91 76007 57008' }}</a></li>
                    @if(!empty($settings['contact_whatsapp']))
                    <li><a href="{{ str_starts_with($settings['contact_whatsapp'], 'http') ? $settings['contact_whatsapp'] : ('https://wa.me/' . preg_replace('/[^0-9]/', '', $settings['contact_whatsapp'])) }}" target="_blank" style="color:#059669; font-weight:600;"><i class="fa-brands fa-whatsapp"></i> WhatsApp Chat</a></li>
                    @endif
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end: Contact Top Section -->

        <!-- start: Contact Section -->
        <section class="tj-contact-section-2 section-bottom-gap">
          <div class="container">
            <div class="row">
              <div class="col-lg-6">
                <div class="contact-form wow fadeInUp" data-wow-delay=".1s">
                  <h3 class="title">Feel Free to Get in Touch or Visit our Location.</h3>
                  @if(session('success'))
                  <div class="alert alert-success" style="background:#ecfdf5; border:1px solid #10b981; color:#065f46; padding:16px 20px; border-radius:8px; margin-bottom:24px; font-weight:500;">
                    ✓ {{ session('success') }}
                  </div>
                  @endif
                  <form id="contact-form" action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-input">
                          <input type="text" name="cfName">
                          <label class="cf-label">Full Name <span>*</span></label>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-input">
                          <input type="email" name="cfEmail">
                          <label class="cf-label">Email Address <span>*</span></label>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-input">
                          <input type="tel" name="cfPhone">
                          <label class="cf-label">Phone number <span>*</span></label>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-input">
                          <div class="tj-nice-select-box">
                            <div class="tj-select">
                              <select name="cfSubject">
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
                          <textarea name="cfMessage" id="message"></textarea>
                          <label class="cf-label">Type message <span>*</span></label>
                        </div>
                      </div>
                      <div class="submit-btn">
                        <button class="tj-primary-btn" type="submit">
                          <span class="btn-text"><span>Submit Now</span></span>
                          <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="map-area wow fadeInUp" data-wow-delay=".3s" style="border-radius:14px; overflow:hidden;">
                  <iframe
                    src="{{ clean_google_map_embed($settings['google_map_embed'] ?? null, $settings['contact_location'] ?? null) }}"
                    style="border:0; width:100%; height:100%; min-height:450px;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- end: Contact Section -->

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
