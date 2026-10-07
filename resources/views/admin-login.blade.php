<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">

  <!-- Site Title -->
  <title>Admin Login - {{ setting('site_name', 'Voltiva') }}</title>
  @php
      $favicon = setting('site_favicon') ? storage_asset(setting('site_favicon')) : asset('assets/images/fav.png');
      $logo = setting('site_logo') ? storage_asset(setting('site_logo')) : asset('assets/images/logos/logo.webp');
  @endphp


  <!-- Place favicon.ico in the root directory -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ $favicon }}">

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
  <link rel="stylesheet" href="{{ asset('assets/css/shop.css') }}" />
  
  <style>
    .admin-login-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f4f5f8;
        padding: 50px 0;
    }
    .admin-login-wrapper .tj-page__area {
        padding: 0;
    }
    .admin-login-wrapper .woo-login-form {
        margin: 0 auto;
        max-width: 500px;
    }
    .admin-logo {
        text-align: center;
        margin-bottom: 30px;
    }
  </style>
</head>

<body>
  <div class="body-overlay"></div>

  <x-preloader />

  <div class="admin-login-wrapper">
    <section class="full-width tj-page__area">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="tj-page__container">
              <div class="tj-entry__content">
                <div class="woocommerce">
                  
                  <div class="admin-logo">
                    <a href="{{ route('home') }}"><img src="{{ $logo }}" alt="Logo" style="max-height: 60px; width: auto; object-fit: contain;"></a>
                  </div>

                  <div class="woo-login-form">
                    <h3>Admin Login</h3>

                    <form class="woocommerce-form woocommerce-form-login login" method="post" novalidate="">
                      <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="username">Username or email address&nbsp;<span class="required"
                            aria-hidden="true">*</span></label>
                        <input type="text" name="username" id="username" autocomplete="username" value=""
                          required="" aria-required="true">
                      </p>
                      <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                        <label for="password">Password&nbsp;<span class="required"
                            aria-hidden="true">*</span></label>
                        <span class="password-input"><input type="password" name="password" id="password"
                            autocomplete="current-password" required="" aria-required="true"><button type="button"
                            class="show-password-input" aria-label="Show password"
                            aria-describedby="password"></button></span>
                      </p>

                      <div class="row form-row algin-items-center rg-15">
                        <div class="col-6">
                          <label
                            class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                            <input class="woocommerce-form__input woocommerce-form__input-checkbox"
                              name="rememberme" type="checkbox" id="rememberme" value="forever"> <span>Remember
                              me</span>
                          </label>
                        </div>
                        <div class="col-6 text-end">
                          <p class="woocommerce-LostPassword lost_password">
                            <a href="{{ route('password') }}">Lost your password?</a>
                          </p>
                        </div>
                        <div class="col-sm-12">
                          <button type="submit" class="woocommerce-button button woocommerce-form-login__submit"
                            name="login" value="Log in">
                            <span class="btn-text"><span>Login</span></span>
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
      </div>
    </section>
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
</body>

</html>
