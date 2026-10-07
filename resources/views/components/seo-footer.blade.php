{{-- Dynamic Custom Body / Footer Scripts from Settings --}}
@if(setting('gtm_enabled', '0') == '1' && setting('gtm_container_id'))
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{ setting('gtm_container_id') }}"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
@endif

@if(setting('custom_footer_code'))
    {!! setting('custom_footer_code') !!}
@endif

