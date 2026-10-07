@php
    $showPreloader = false;
    $status = $settings['preloader_status'] ?? true;
    
    // Check if toggle might be returning a string "0" or "1"
    if (is_string($status)) {
        $status = $status === '1' || $status === 'true';
    }

    if ($status) {
        $displayType = $settings['preloader_display_type'] ?? 'all';
        $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
        
        if ($displayType === 'all') {
            $showPreloader = true;
        } elseif ($displayType === 'home' && in_array($currentRoute, ['home', 'index', 'home-2', 'home-3', 'home-4', 'home-5', 'home-6', 'home-7', 'home-8', 'home-9', 'home-10', 'home-11'])) {
            $showPreloader = true;
        } elseif ($displayType === 'custom') {
            $customRoutes = $settings['preloader_custom_routes'] ?? [];
            if (is_string($customRoutes)) {
                $customRoutes = json_decode($customRoutes, true) ?? [];
            }
            if (is_array($customRoutes) && in_array($currentRoute, $customRoutes)) {
                $showPreloader = true;
            }
        }
    }

    $preloaderType = $settings['preloader_type'] ?? 'default';
    $preloaderText = $settings['preloader_text'] ?? 'Loading...';
@endphp

@if($showPreloader)
  <!-- Preloader Start -->
  <div class="tj-preloader is-loading">
    <div class="tj-preloader-inner">
      <div class="tj-preloader-ball-wrap">
        
        @if($preloaderType === 'image' && !empty($settings['preloader_image']))
            <div style="display: flex; justify-content: center; align-items: center; height: 100%;">
                <img src="{{ asset('storage/' . $settings['preloader_image']) }}" alt="{{ $preloaderText }}" style="max-width: 150px; max-height: 150px;">
            </div>
        @elseif($preloaderType === 'text')
            <div id="tj-weave-anim" class="tj-preloader-text" style="font-size: 24px; font-weight: bold; letter-spacing: 2px;">{{ $preloaderText }}</div>
        @else
            <div class="tj-preloader-ball-inner-wrap">
              <div class="tj-preloader-ball-inner">
                <div class="tj-preloader-ball"></div>
              </div>
              <div class="tj-preloader-ball-shadow"></div>
            </div>
            <div id="tj-weave-anim" class="tj-preloader-text">{{ $preloaderText }}</div>
        @endif

      </div>
    </div>
    <div class="tj-preloader-overlay"></div>
  </div>
  <!-- Preloader end -->
@endif
