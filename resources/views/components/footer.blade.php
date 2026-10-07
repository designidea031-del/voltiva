<footer class="tj-footer-section footer-1 section-gap-x">
  <div class="footer-main-area">
     <div class="container">
        <div class="row justify-content-between">
           
           <!-- Column 1: Logo & About Text -->
           <div class="col-xl-4 col-lg-4 col-md-6">
              <div class="footer-widget wow fadeInUp" data-wow-delay=".1s">
                 <div class="footer-logo">
                    <a href="{{ route('home') }}">
                       @if(!empty($settings['site_logo_dark']))
                           <img src="{{ storage_asset($settings['site_logo_dark']) }}" alt="{{ $settings['site_name'] ?? 'Logo' }}">
                        @elseif(!empty($settings['site_logo']))
                          <img src="{{ storage_asset($settings['site_logo']) }}" alt="{{ $settings['site_name'] ?? 'Logo' }}">
                       @else
                          <img src="{{ asset('assets/images/logos/logo.webp') }}" alt="{{ $settings['site_name'] ?? 'Logo' }}">
                       @endif
                    </a>
                 </div>
                 <div class="footer-text">
                    <p>{{ $settings['footer_about_text'] ?? 'Voltiva is a premier manufacturer and supplier of electrical accessories, switches, and high-voltage solutions engineered for efficiency and durability.' }}</p>
                 </div>
              </div>
           </div>

           <!-- Column 2: Contact Us -->
           <div class="col-xl-4 col-lg-4 col-md-6">
              <div class="footer-widget widget-contact style-2 wow fadeInUp" data-wow-delay=".3s">
                 <h5 class="title">CONTACT US</h5>
                 <div class="footer-contact-info">
                    <div class="contact-item">
                       <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['contact_phone'] ?? '7600757008') }}">
                           <i class="tji-phone"></i> {{ $settings['contact_phone'] ?? '7600757008' }}
                       </a>
                    </div>
                    <div class="contact-item">
                       <a href="mailto:{{ $settings['contact_email'] ?? 'info@voltiva.com' }}">
                           <i class="tji-envelop"></i> {{ $settings['contact_email'] ?? 'info@voltiva.com' }}
                       </a>
                    </div>
                    <div class="contact-item">
                       <span><i class="tji-location-3"></i> {{ $settings['contact_location'] ?? 'Sardar Ind. Area, Survey No.137/1-p3p, Plot No. 119/p, Village Padavla - 360 024, Rajkot, Gujarat - India' }}</span>
                    </div>
                 </div>
              </div>
           </div>

           <!-- Column 3: Social Media -->
           <div class="col-xl-4 col-lg-4 col-md-6">
              <div class="footer-widget wow fadeInUp" data-wow-delay=".5s">
                 <h5 class="title">Social Media</h5>
                 <div class="social-links">
                    <ul>
                       @if(!empty($settings['social_facebook']))
                       <li><a href="{{ $settings['social_facebook'] }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                       @endif
                       @if(!empty($settings['social_instagram']))
                       <li><a href="{{ $settings['social_instagram'] }}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                       @endif
                       @if(!empty($settings['social_whatsapp']))
                       <li><a href="{{ $settings['social_whatsapp'] }}" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></li>
                       @endif
                       @if(!empty($settings['social_youtube']))
                       <li><a href="{{ $settings['social_youtube'] }}" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                       @endif
                       @if(!empty($settings['social_twitter']))
                       <li><a href="{{ $settings['social_twitter'] }}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                       @endif
                       @if(!empty($settings['social_linkedin']))
                       <li><a href="{{ $settings['social_linkedin'] }}" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                       @endif
                       @if(!empty($settings['social_pinterest']))
                       <li><a href="{{ $settings['social_pinterest'] }}" target="_blank"><i class="fa-brands fa-pinterest"></i></a></li>
                       @endif
                    </ul>
                 </div>
              </div>
           </div>

        </div>
     </div>
  </div>
  <div class="tj-copyright-area">
     <div class="container">
        <div class="row">
           <div class="col-12">
              <div class="copyright-content-area">
                 <div class="footer-contact">
                    <ul>
                       <li>
                          <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['contact_phone'] ?? '7600757008') }}">
                             <span class="icon"><i class="tji-phone-2"></i></span>
                             <span class="text">{{ $settings['contact_phone'] ?? '7600757008' }}</span>
                          </a>
                       </li>
                       <li>
                          <a href="mailto:{{ $settings['contact_email'] ?? 'info@voltiva.com' }}">
                             <span class="icon"><i class="tji-envelop-2"></i></span>
                             <span class="text">{{ $settings['contact_email'] ?? 'info@voltiva.com' }}</span>
                          </a>
                       </li>
                    </ul>
                 </div>
                 <div class="social-links">
                    <ul>
                       @if(!empty($settings['social_facebook']))
                       <li><a href="{{ $settings['social_facebook'] }}" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                       @endif
                       @if(!empty($settings['social_instagram']))
                       <li><a href="{{ $settings['social_instagram'] }}" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                       @endif
                       @if(!empty($settings['social_twitter']))
                       <li><a href="{{ $settings['social_twitter'] }}" target="_blank"><i class="fa-brands fa-x-twitter"></i></a></li>
                       @endif
                       @if(!empty($settings['social_linkedin']))
                       <li><a href="{{ $settings['social_linkedin'] }}" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a></li>
                       @endif
                       @if(!empty($settings['social_youtube']))
                       <li><a href="{{ $settings['social_youtube'] }}" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                       @endif
                       @if(!empty($settings['social_whatsapp']))
                       <li><a href="{{ $settings['social_whatsapp'] }}" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></li>
                       @endif
                    </ul>
                 </div>
                 <div class="copyright-text">
                    <p>{{ $settings['copyright_text'] ?? '© ' . date('Y') . ' Voltiva. All Rights Reserved.' }}</p>
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
</footer>
