<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Dynamic SEO Meta Tags -->
  <x-seo-head page="blog" title="Blog Details - Voltiva" type="article" />
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
        <x-page-banner page="blog-details" defaultTitle="Blog Details" parentTitle="Home" parentRoute="home-2" subParentTitle="Blog" subParentRoute="blog" :currentTitle="$post?->title ? \Illuminate\Support\Str::limit($post->title, 40) : 'Blog Details'" />
        <!-- end: Breadcrumb Section -->

        <!-- start: Blog Section -->
        <section class="tj-blog-section section-gap slidebar-stickiy-container">
          <div class="container">
            <div class="row row-gap-5">
              <div class="col-lg-8">
                <div class="post-details-wrapper">
                  <div class="blog-images wow fadeInUp" data-wow-delay=".1s">
                    <img src="{{ asset('assets/images/blog/blog-1.webp') }}" alt="Images">
                  </div>
                  <h2 class="title title-anim">Unlocking Business Potential: Innovative Solutions for Unmatched Success
                  </h2>
                  <div class="blog-category-two wow fadeInUp" data-wow-delay=".3s">
                    <div class="category-item">
                      <div class="cate-images">
                        <img src="{{ asset('assets/images/testimonial/client-2.webp') }}" alt="Images">
                      </div>
                      <div class="cate-text">
                        <span class="degination">Authored by</span>
                        <h6 class="title"><a href="{{ route('blog-details') }}">Burdee Nicolas</a></h6>
                      </div>
                    </div>
                    <div class="category-item">
                      <div class="cate-icons">
                        <i class="tji-calendar"></i>
                      </div>
                      <div class="cate-text">
                        <span class="degination">Date Released</span>
                        <h6 class="text">29 December, 2025</h6>
                      </div>
                    </div>
                    <div class="category-item">
                      <div class="cate-icons">
                        <i class="tji-comment"></i>
                      </div>
                      <div class="cate-text">
                        <span class="degination">Comments</span>
                        <h6 class="text">03 Comments</h6>
                      </div>
                    </div>
                  </div>
                  <div class="blog-text">
                    <p class="wow fadeInUp" data-wow-delay=".3s">In today’s competitive landscape, businesses must
                      continuously adapt and innovate to thrive.
                      Unlocking Business Potential means identifying untapped opportunities and leveraging innovative
                      solutions to drive growth, enhance efficiency, and foster lasting success. At [Company Name], we
                      believe that success is not just about working harder—it's about working smarter. By harnessing
                      cutting-edge technologies, data-driven insights, and creative problem-solving, we provide
                      businesses
                      with the tools and strategies needed to stay ahead.</p>
                    <p class="wow fadeInUp" data-wow-delay=".3s">The curve. Whether you're looking to streamline
                      operations,
                      enhance customer experiences, or explore
                      new market opportunities, our tailored solutions are designed to empower your business to achieve
                      unparalleled success. With a focus on sustainability, scalability, and adaptability, we help your
                      business.</p>
                    <blockquote class="wow fadeInUp" data-wow-delay=".3s">
                      <p>The true entrepreneur is a doer, not a dreamer. Innovation is the catalyst that transforms
                        ideas
                        into reality. In today’s fast-paced world, success depends not on just surviving change.</p>
                      <cite>Kevin Hooks</cite>
                    </blockquote>
                    <h3 class="wow fadeInUp" data-wow-delay=".3s">Kye lessons of Business Potential</h3>
                    <p class="wow fadeInUp" data-wow-delay=".3s">Unlocking your business potential requires more than
                      just
                      vision and ambition—it involves strategic
                      thinking, adaptability, and an unwavering commitment to growth. Over time, successful businesses
                      have
                      learned essential lessons that allow them to not only survive but thrive in an ever-changing
                      marketplace. One of the most important lessons is understanding the need for continuous
                      innovation.
                    </p>
                    <div class="images-wrap">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="image-box wow fadeInUp" data-wow-delay=".3s">
                            <img src="{{ asset('assets/images/blog/blog-9.webp') }}" alt="Image">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="image-box wow fadeInUp" data-wow-delay=".5s">
                            <img src="{{ asset('assets/images/blog/blog-10.webp') }}" alt="Image">
                          </div>
                        </div>
                      </div>
                    </div>
                    <p class="wow fadeInUp" data-wow-delay=".3s">Lastly, effective leadership that inspires and
                      motivates
                      employees, customers, and stakeholders is
                      essential in steering the business toward achieving its full potential. By applying these lessons,
                      businesses can unlock new opportunities, overcome obstacles, and reach new levels of success.</p>
                    <ul class="wow fadeInUp" data-wow-delay=".3s">
                      <li><span><i class="tji-check"></i></span>Embrace Innovation</li>
                      <li><span><i class="tji-check"></i></span>Customer-Centric Approach</li>
                      <li><span><i class="tji-check"></i></span>Effective Leadership</li>
                      <li><span><i class="tji-check"></i></span>Operational Efficiency</li>
                      <li><span><i class="tji-check"></i></span>Scalable Systems</li>
                      <li><span><i class="tji-check"></i></span>Resilience</li>
                      <li><span><i class="tji-check"></i></span>Continuous Learning</li>
                    </ul>
                    <div class="blog-video wow fadeInUp" data-wow-delay=".3s">
                      <img src="{{ asset('assets/images/blog/blog-video.webp') }}" alt="Video">
                      <a class="video-btn video-popup" data-autoplay="true" data-vbtype="video" data-maxwidth="1200px"
                        href="https://www.youtube.com/watch?v=MLpWrANjFbI&amp;ab_channel=eidelchteinadvogados">
                        <span><i class="tji-play"></i></span>
                      </a>
                    </div>
                    <h3 class="wow fadeInUp" data-wow-delay=".3s">Conclusions</h3>
                    <p class="wow fadeInUp" data-wow-delay=".3s">Unlocking your business’s full potential is a journey
                      that
                      requires vision, innovation, and strategic
                      on our execution. By embracing key lessons such as leveraging data, focusing on customer are
                      experience, fostering of adaptability, and nurturing effective leadership, businesses can thrive
                      in an
                      ever-evolving marketplace..</p>
                    <p class="wow fadeInUp" data-wow-delay=".3s"> The ability to continuously learn, collaborate, and
                      optimize operations will not only drive growth
                      but ensure long-term sustainability. Remember, the path to success is not linear.</p>
                  </div>
                  <div class="tj-tags-post wow fadeInUp" data-wow-delay=".3s">
                    <div class="tagcloud">
                      <span>Tags:</span>
                      <a href="{{ route('blog') }}">Growth</a>
                      <a href="{{ route('blog') }}">Success</a>
                      <a href="{{ route('blog') }}">Innovate</a>
                    </div>
                    <div class="post-share">
                      <ul>
                        <li> Share:</li>
                        <li><a href="{{ $settings['social_facebook'] ?? 'https://www.facebook.com/' }}" target="_blank"><i
                              class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li><a href="{{ $settings['social_twitter'] ?? 'https://x.com/' }}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                        <li><a href="{{ $settings['social_instagram'] ?? 'https://www.instagram.com/' }}" target="_blank"><i
                              class="fa-brands fa-instagram"></i></a>
                        </li>
                        <li><a href="{{ $settings['social_linkedin'] ?? 'https://www.linkedin.com/' }}" target="_blank"><i
                              class="fa-brands fa-linkedin-in"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="tj-post__navigation wow fadeInUp" data-wow-delay=".3s">
                    <!-- previous post -->
                    <div class="tj-nav__post previous">
                      <div class="tj-nav-post__nav prev_post">
                        <a href="{{ route('blog-details') }}"><span><i class="tji-arrow-left"></i></span>Previous</a>
                      </div>
                    </div>
                    <div class="tj-nav-post__grid">
                      <a href="{{ route('blog') }}"><i class="tji-window"></i></a>
                    </div>
                    <!-- next post -->
                    <div class="tj-nav__post next">
                      <div class="tj-nav-post__nav next_post">
                        <a href="{{ route('blog-details') }}">Next<span><i class="tji-arrow-right"></i></span></a>
                      </div>
                    </div>
                  </div>

                  <div class="tj-comments-container">
                    <div class="tj-comments-wrap">
                      <div class="comments-title">
                        <h3 class="title">Top Comments (02)</h3>
                      </div>
                      <div class="tj-latest-comments">
                        <ul>
                          <li class="tj-comment">
                            <div class="comment-content">
                              <div class="comment-avatar">
                                <img src="{{ asset('assets/images/blog/avatar-1.webp') }}" alt="Image">
                              </div>
                              <div class="comments-header">
                                <div class="avatar-name">
                                  <h6 class="title">
                                    <a href="{{ route('blog-details') }}">Great insights!</a>
                                  </h6>
                                </div>
                                <div class="comment-text">
                                  <span class="date">June 18, 2024 at 06:00 pm</span>
                                  <a class="reply" href="{{ route('blog-details') }}">Reply</a>
                                </div>
                                <div class="desc">
                                  <p>"I completely agree that embracing innovation and leveraging data are crucial for
                                    any
                                    business looking to stay competitive in today's market. The focus on leadership and
                                    adaptability really resonated with me. Looking forward to implementing these
                                    strategies"
                                  </p>
                                </div>
                              </div>
                            </div>
                          </li>
                          <li class="tj-comment">
                            <ul class="children">
                              <li class="tj-comment">
                                <div class="comment-content">
                                  <div class="comment-avatar">
                                    <img src="{{ asset('assets/images/blog/avatar-2.webp') }}" alt="Image">
                                  </div>
                                  <div class="comments-header">
                                    <div class="avatar-name">
                                      <h6 class="title">
                                        <a href="{{ route('blog-details') }}">This was a fantastic read</a>
                                      </h6>
                                    </div>
                                    <div class="comment-text">
                                      <span class="date">June 18, 2024 at 06:00 pm</span>
                                      <a class="reply" href="{{ route('blog-details') }}">Reply</a>
                                    </div>
                                    <div class="desc">
                                      <p>"The lessons on customer-centric approaches and operational efficiency are
                                        especially
                                        relevant. It's inspiring to see how these core principles can truly unlock a
                                        business's
                                        potential. Thanks for sharing such valuable content!"</p>
                                    </div>
                                  </div>
                                </div>
                              </li>
                            </ul>
                          </li>
                          <li class="tj-comment">
                            <div class="comment-content">
                              <div class="comment-avatar">
                                <img src="{{ asset('assets/images/blog/avatar-2.webp') }}" alt="Image">
                              </div>
                              <div class="comments-header">
                                <div class="avatar-name">
                                  <h6 class="title">
                                    <a href="{{ route('blog-details') }}">This was a fantastic read</a>
                                  </h6>
                                </div>
                                <div class="comment-text">
                                  <span class="date">June 18, 2024 at 06:00 pm</span>
                                  <a class="reply" href="{{ route('blog-details') }}">Reply</a>
                                </div>
                                <div class="desc">
                                  <p>"The lessons on customer-centric approaches and operational efficiency are
                                    especially
                                    relevant. It's inspiring to see how these core principles can truly unlock a
                                    business's
                                    potential. Thanks for sharing such valuable content!"</p>
                                </div>
                              </div>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <div class="tj-comments__container">
                      <div class="comment-respond">
                        <h3 class="comment-reply-title">Leave a Comment</h3>
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-input">
                              <textarea id="comment" name="message" placeholder="Write Your Comment *"></textarea>
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-input">
                              <input type="text" id="name" name="name" placeholder="Full Name *" required="">
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-input">
                              <input type="email" id="emailOne" name="name" placeholder="Your Email *" required="">
                            </div>
                          </div>
                          <div class="col-lg-4">
                            <div class="form-input">
                              <input type="text" id="website" name="name" placeholder="Website" required="">
                            </div>
                          </div>
                          <div class="comments-btn">
                            <button class="tj-primary-btn" type="submit">
                              <span class="btn-text"><span>Submit Now</span></span>
                              <span class="btn-icon"><i class="tji-arrow-right-long"></i></span>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
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
