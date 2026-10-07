@php
    $logo = !empty($settings['site_logo']) ? storage_asset($settings['site_logo']) : asset('assets/images/logos/logo.webp');
    $phone = $settings['contact_phone'] ?? '7600757008';
    $cleanPhone = preg_replace('/[^0-9+]/', '', $phone);
    $email = $settings['contact_email'] ?? 'info@voltiva.com';
    $location = $settings['contact_location'] ?? 'Sardar Ind. Area, Survey No.137/1-p3p, Plot No. 119/p, Village Padavla - 360 024, Rajkot, Gujarat - India';
    $aboutText = $settings['footer_about_text'] ?? ($settings['site_tagline'] ?? 'Voltiva is a premier manufacturer and supplier of electrical accessories, switches, and high-voltage solutions engineered for efficiency and durability.');
@endphp

<!-- start: Offcanvas Menu (Desktop) -->
<div class="tj-offcanvas-area d-none d-lg-block">
  <div class="hamburger_bg"></div>
  <div class="hamburger_wrapper">
    <div class="hamburger_inner">
      <div class="hamburger_top d-flex align-items-center justify-content-between">
        <div class="hamburger_logo">
          <a href="{{ route('home') }}" class="mobile_logo">
            <img src="{{ $logo }}" alt="{{ $settings['site_name'] ?? 'Logo' }}">
          </a>
        </div>
        <div class="hamburger_close">
          <button class="hamburger_close_btn" type="button" aria-label="Close menu"><i class="fa-thin fa-times"></i></button>
        </div>
      </div>
      <div class="offcanvas-text">
        <p>{{ $aboutText }}</p>
      </div>
      <div class="hamburger-search-area">
        <h5 class="hamburger-title">Search Products</h5>
        <div class="hamburger_search">
          <form method="get" action="{{ route('product') }}">
            <button type="submit" aria-label="Search"><i class="tji-search"></i></button>
            <input type="search" autocomplete="off" name="search" value="" placeholder="Search products...">
          </form>
        </div>
      </div>
      <div class="hamburger-infos">
        <h5 class="hamburger-title">Contact Info</h5>
        <div class="contact-info">
          @if(!empty($phone))
          <div class="contact-item">
            <span class="subtitle">Phone</span>
            <a class="contact-link" href="tel:{{ $cleanPhone }}">{{ $phone }}</a>
          </div>
          @endif
          @if(!empty($email))
          <div class="contact-item">
            <span class="subtitle">Email</span>
            <a class="contact-link" href="mailto:{{ $email }}">{{ $email }}</a>
          </div>
          @endif
          @if(!empty($location))
          <div class="contact-item">
            <span class="subtitle">Location</span>
            <span class="contact-link">{{ $location }}</span>
          </div>
          @endif
        </div>
      </div>
    </div>
    <div class="hamburger-socials">
      <h5 class="hamburger-title">Follow Us</h5>
      <div class="social-links style-3">
        <ul>
          @if(!empty($settings['social_facebook']))
          <li><a href="{{ $settings['social_facebook'] }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook-f"></i></a></li>
          @endif
          @if(!empty($settings['social_instagram']))
          <li><a href="{{ $settings['social_instagram'] }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram"></i></a></li>
          @endif
          @if(!empty($settings['social_whatsapp']))
          <li><a href="{{ $settings['social_whatsapp'] }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-whatsapp"></i></a></li>
          @endif
          @if(!empty($settings['social_twitter']))
          <li><a href="{{ $settings['social_twitter'] }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-x-twitter"></i></a></li>
          @endif
          @if(!empty($settings['social_linkedin']))
          <li><a href="{{ $settings['social_linkedin'] }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin-in"></i></a></li>
          @endif
          @if(!empty($settings['social_youtube']))
          <li><a href="{{ $settings['social_youtube'] }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-youtube"></i></a></li>
          @endif
          @if(!empty($settings['social_pinterest']))
          <li><a href="{{ $settings['social_pinterest'] }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-pinterest"></i></a></li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- end: Offcanvas Menu -->

<!-- start: Hamburger Menu (Mobile) -->
<div class="hamburger-area d-lg-none">
  <div class="hamburger_bg"></div>
  <div class="hamburger_wrapper">
    <div class="hamburger_inner">
      <div class="hamburger_top d-flex align-items-center justify-content-between">
        <div class="hamburger_logo">
          <a href="{{ route('home') }}" class="mobile_logo">
            <img src="{{ $logo }}" alt="{{ $settings['site_name'] ?? 'Logo' }}">
          </a>
        </div>
        <div class="hamburger_close">
          <button class="hamburger_close_btn" type="button" aria-label="Close menu"><i class="fa-thin fa-times"></i></button>
        </div>
      </div>
      <div class="hamburger-search-area">
        <h5 class="hamburger-title">Search Products</h5>
        <div class="hamburger_search">
          <form method="get" action="{{ route('product') }}">
            <button type="submit" aria-label="Search"><i class="tji-search"></i></button>
            <input type="search" autocomplete="off" name="search" value="" placeholder="Search products...">
          </form>
        </div>
      </div>
      <div class="hamburger_menu">
        <div class="mobile_menu"></div>
      </div>
      <div class="hamburger-infos">
        <h5 class="hamburger-title">Contact Info</h5>
        <div class="contact-info">
          @if(!empty($phone))
          <div class="contact-item">
            <span class="subtitle">Phone</span>
            <a class="contact-link" href="tel:{{ $cleanPhone }}">{{ $phone }}</a>
          </div>
          @endif
          @if(!empty($email))
          <div class="contact-item">
            <span class="subtitle">Email</span>
            <a class="contact-link" href="mailto:{{ $email }}">{{ $email }}</a>
          </div>
          @endif
          @if(!empty($location))
          <div class="contact-item">
            <span class="subtitle">Location</span>
            <span class="contact-link">{{ $location }}</span>
          </div>
          @endif
        </div>
      </div>
    </div>
    <div class="hamburger-socials">
      <h5 class="hamburger-title">Follow Us</h5>
      <div class="social-links style-3">
        <ul>
          @if(!empty($settings['social_facebook']))
          <li><a href="{{ $settings['social_facebook'] }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook-f"></i></a></li>
          @endif
          @if(!empty($settings['social_instagram']))
          <li><a href="{{ $settings['social_instagram'] }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram"></i></a></li>
          @endif
          @if(!empty($settings['social_whatsapp']))
          <li><a href="{{ $settings['social_whatsapp'] }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-whatsapp"></i></a></li>
          @endif
          @if(!empty($settings['social_twitter']))
          <li><a href="{{ $settings['social_twitter'] }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-x-twitter"></i></a></li>
          @endif
          @if(!empty($settings['social_linkedin']))
          <li><a href="{{ $settings['social_linkedin'] }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-linkedin-in"></i></a></li>
          @endif
          @if(!empty($settings['social_youtube']))
          <li><a href="{{ $settings['social_youtube'] }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-youtube"></i></a></li>
          @endif
          @if(!empty($settings['social_pinterest']))
          <li><a href="{{ $settings['social_pinterest'] }}" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-pinterest"></i></a></li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- end: Hamburger Menu -->
