<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Dynamic SEO Meta Tags -->
  <x-seo-head page="blog" title="Blog & Electrical Industry News" />
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
        <x-page-banner page="blog" defaultTitle="Read Blog" currentTitle="Blog" parentTitle="Home" parentRoute="home-2" />
        <!-- end: Breadcrumb Section -->

        <!-- start: Blog Section -->
        <section class="tj-blog-section section-gap slidebar-stickiy-container">
          <div class="container">
            <div class="row row-gap-5">
              <div class="col-lg-8">
                <div class="blog-post-wrapper">
                  <article class="blog-item wow fadeInUp" data-wow-delay=".1s">
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
                      <h3 class="title"><a href="{{ route('blog-details') }}">Unlocking Business Potential: Innovative Solutions
                          for
                          Unmatched Success</a>
                      </h3>
                      <p class="desc">In today’s fast-paced business environment, the key to staying ahead of the
                        competition lies in embracing innovation. At [Company Name], we specialize in unlocking your
                        business’s full potential by providing tailored, forward-thinking solutions that drive growth,
                        efficiency, and lasting success.</p>
                      <a class="text-btn" href="{{ route('blog-details') }}">
                        <span class="btn-text"><span>Read More</span></span>
                        <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                      </a>
                    </div>
                  </article>
                  <article class="blog-item wow fadeInUp" data-wow-delay=".3s">
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
                      <h3 class="title"><a href="{{ route('blog-details') }}">Harnessing Digital Transformation: A Roadmap to
                          Future-Proof Your Business</a>
                      </h3>
                      <p class="desc">In the ever-evolving digital landscape, staying ahead of the curve is essential
                        for
                        business success. Harnessing Digital Transformation is not just about adopting new technologies
                        but
                        about rethinking how your business operates, delivers value, and connects with customers.</p>
                      <a class="text-btn" href="{{ route('blog-details') }}">
                        <span class="btn-text"><span>Read More</span></span>
                        <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                      </a>
                    </div>
                  </article>
                  <article class="blog-item wow fadeInUp" data-wow-delay=".5s">
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
                      <h3 class="title"><a href="{{ route('blog-details') }}">Leading Through Change: Proven Lessons for Effective
                          Change Management in Business</a>
                      </h3>
                      <p class="desc">Change is inevitable, and in today’s fast-paced business landscape, the ability to
                        manage and lead through change is crucial to long-term success. Effective change management
                        empowers
                        organizations to adapt, innovate, and thrive despite leading through change proven challenges.
                      </p>
                      <a class="text-btn" href="{{ route('blog-details') }}">
                        <span class="btn-text"><span>Read More</span></span>
                        <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                      </a>
                    </div>
                  </article>
                  <div class="tj-pagination d-flex">
                    <ul>
                      <li>
                        <span aria-current="page" class="page-numbers current">1</span>
                      </li>
                      <li>
                        <a class="page-numbers" href="#">2</a>
                      </li>
                      <li>
                        <a class="page-numbers" href="#">3</a>
                      </li>
                      <li>
                        <a class="next page-numbers" href="#"><i class="tji-arrow-right-long"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="tj-main-sidebar slidebar-stickiy">
                  <div class="tj-sidebar-widget widget-search wow fadeInUp" data-wow-delay=".1s">
                    <h4 class="widget-title">Search here</h4>
                    <div class="search-box">
                      <form action="#">
                        <input type="search" name="search" id="searchTwo" placeholder="Search here">
                        <button type="submit" value="search">
                          <i class="tji-search"></i>
                        </button>
                      </form>
                    </div>
                  </div>
                  <div class="tj-sidebar-widget tj-recent-posts wow fadeInUp" data-wow-delay=".3s">
                    <h4 class="widget-title">Related post</h4>
                    <ul>
                      <li>
                        <div class="post-thumb">
                          <a href="{{ route('blog-details') }}"> <img src="{{ asset('assets/images/blog/post-1.webp') }}" alt="Blog"></a>
                        </div>
                        <div class="post-content">
                          <h6 class="post-title">
                            <a href="{{ route('blog-details') }}">How to Stay Ahead of the Business Curve</a>
                          </h6>
                          <div class="blog-meta">
                            <ul>
                              <li>04 SEP 2025</li>
                            </ul>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="post-thumb">
                          <a href="{{ route('blog-details') }}"> <img src="{{ asset('assets/images/blog/post-2.webp') }}" alt="Blog"></a>
                        </div>
                        <div class="post-content">
                          <h6 class="post-title">
                            <a href="{{ route('blog-details') }}">How Digital Tools Shaping the Workforce</a>
                          </h6>
                          <div class="blog-meta">
                            <ul>
                              <li>02 JAN 2025</li>
                            </ul>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="post-thumb">
                          <a href="{{ route('blog-details') }}"> <img src="{{ asset('assets/images/blog/post-3.webp') }}" alt="Blog"></a>
                        </div>
                        <div class="post-content">
                          <h6 class="post-title">
                            <a href="{{ route('blog-details') }}">How to Sustainability into your Strategy</a>
                          </h6>
                          <div class="blog-meta">
                            <ul>
                              <li>24 FEB 2025</li>
                            </ul>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                  <div class="tj-sidebar-widget widget-categories wow fadeInUp" data-wow-delay=".5s">
                    <h4 class="widget-title">Categories</h4>
                    <ul>
                      <li><a href="{{ route('blog-details') }}">Innovation<span class="number">(03)</span></a></li>
                      <li><a href="{{ route('blog-details') }}">Leadership<span class="number">(02)</span></a></li>
                      <li><a href="{{ route('blog-details') }}">Technology<span class="number">(03)</span></a></li>
                      <li><a href="{{ route('blog-details') }}">Marketing<span class="number">(06)</span></a></li>
                      <li><a href="{{ route('blog-details') }}">Management<span class="number">(04)</span></a></li>
                    </ul>
                  </div>
                  <div class="tj-sidebar-widget widget-tag-cloud wow fadeInUp" data-wow-delay=".7s">
                    <h4 class="widget-title">Tags</h4>
                    <nav>
                      <div class="tagcloud">
                        <a href="{{ route('blog-details') }}">Growth</a>
                        <a href="{{ route('blog-details') }}">Success</a>
                        <a href="{{ route('blog-details') }}">Innovate</a>
                        <a href="{{ route('blog-details') }}">Lead</a>
                        <a href="{{ route('blog-details') }}">Impact</a>
                        <a href="{{ route('blog-details') }}">Focus</a>
                        <a href="{{ route('blog-details') }}">Tech</a>
                        <a href="{{ route('blog-details') }}">Optimize</a>
                        <a href="{{ route('blog-details') }}">Results</a>
                        <a href="{{ route('blog-details') }}">Drive</a>
                      </div>
                    </nav>
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
