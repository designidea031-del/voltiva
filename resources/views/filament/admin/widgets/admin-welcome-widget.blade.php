@php
    $user = filament()->auth()->user();
    $hour = now()->hour;
    $greeting = $hour < 12 ? 'Good Morning' : ($hour < 17 ? 'Good Afternoon' : 'Good Evening');
    $emoji = $hour < 12 ? '☀️' : ($hour < 17 ? '⛅' : '🌙');
    $name = $user?->name ?? 'Admin';
@endphp

<x-filament-widgets::widget>
    <div style="position:relative;overflow:hidden;border-radius:20px;background:linear-gradient(135deg, #000000 0%, #171717 50%, #262626 100%);min-height:220px;box-shadow:0 8px 24px rgba(0,0,0,0.25);">
        <!-- Decorative background glow and circles -->
        <div style="position:absolute;top:-50px;right:180px;width:200px;height:200px;background:rgba(255,255,255,0.04);border-radius:50%;pointer-events:none;"></div>
        <div style="position:absolute;bottom:-30px;left:35%;width:120px;height:120px;background:rgba(255,255,255,0.02);border-radius:50%;pointer-events:none;"></div>

        <div class="flex flex-col-reverse sm:flex-row items-center justify-between min-h-[200px] p-6 sm:p-8 relative z-10 gap-6">
            <!-- Left Text Content -->
            <div class="flex-1 min-w-0 text-center sm:text-left">
                <h2 class="text-xl sm:text-2xl font-extrabold text-white mb-2 tracking-tight leading-tight flex items-center justify-center sm:justify-start gap-2.5 flex-wrap">
                    <span>{{ $greeting }}, {{ $name }}</span>
                    <span class="text-lg sm:text-xl">{{ $emoji }}</span>
                </h2>
                <p class="text-xs sm:text-sm text-white/80 mb-5 leading-relaxed max-w-sm mx-auto sm:mx-0">
                    Stay updated with your store's performance today. Get a quick snapshot of key statistics.
                </p>
                <div>
                    <a href="{{ route('filament.admin.resources.products.index') }}"
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white text-black font-bold text-xs shadow-md shadow-white/10 hover:scale-[1.02] transition-transform">
                        View Full Report
                        <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Right Illustration -->
            <div class="shrink-0 w-44 sm:w-56 md:w-60 h-36 sm:h-44 md:h-48 flex items-end justify-center relative">
                <svg viewBox="0 0 240 190" style="width:100%;height:100%;display:block;overflow:visible;" xmlns="http://www.w3.org/2000/svg">
                    <!-- Bar Chart Columns in background -->
                    <rect x="15"  y="125" width="16" height="65" rx="4" fill="rgba(255,255,255,0.15)"/>
                    <rect x="38"  y="105" width="16" height="85" rx="4" fill="rgba(255,255,255,0.22)"/>
                    <rect x="61"  y="80"  width="16" height="110" rx="4" fill="rgba(255,255,255,0.28)"/>
                    <rect x="84"  y="55"  width="16" height="135" rx="4" fill="rgba(255,255,255,0.35)"/>
                    <rect x="107" y="35"  width="16" height="155" rx="4" fill="rgba(255,255,255,0.45)"/>

                    <!-- Bold Orange Zigzag Upward Arrow -->
                    <polyline points="20,150 55,128 90,105 130,70 175,42" fill="none" stroke="#F59E0B" stroke-width="4.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <polygon points="168,30 188,40 174,54" fill="#F59E0B"/>

                    <!-- === RUNNING CARTOON CHARACTER === -->
                    <!-- Head -->
                    <circle cx="178" cy="40" r="16" fill="#FCD3B3"/>
                    <!-- Hair -->
                    <path d="M164,36 C166,24 178,22 188,24 C193,26 195,33 194,40 C190,32 180,30 167,34 Z" fill="#2E1B0E"/>
                    <circle cx="180" cy="27" r="12" fill="#2E1B0E"/>

                    <!-- Neck -->
                    <rect x="174" y="54" width="8" height="8" rx="2" fill="#FCD3B3"/>

                    <!-- White shirt body -->
                    <path d="M165,60 L193,60 L187,98 L160,98 Z" fill="#FFFFFF"/>
                    <line x1="177" y1="60" x2="173" y2="98" stroke="#E2E8F0" stroke-width="1.5"/>

                    <!-- Orange Briefcase / Package under left arm -->
                    <rect x="135" y="80" width="28" height="19" rx="4" fill="#F59E0B"/>
                    <rect x="135" y="80" width="28" height="7" rx="3" fill="#FBBF24"/>
                    <line x1="149" y1="80" x2="149" y2="99" stroke="#D97706" stroke-width="1.5"/>

                    <!-- Left Arm -->
                    <path d="M166,66 C155,75 148,84 146,94" stroke="#FCD3B3" stroke-width="9" stroke-linecap="round" fill="none"/>

                    <!-- Right Arm -->
                    <path d="M190,66 C202,78 208,90 214,102" stroke="#FCD3B3" stroke-width="9" stroke-linecap="round" fill="none"/>
                    <circle cx="214" cy="103" r="5" fill="#FCD3B3"/>

                    <!-- Left Leg -->
                    <path d="M168,98 L152,126 L140,146" stroke="#1E293B" stroke-width="11" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                    <ellipse cx="140" cy="148" rx="12" ry="6" fill="#F59E0B" transform="rotate(-15, 140, 148)"/>
                    <ellipse cx="146" cy="146" rx="5" ry="3.5" fill="#FFFFFF"/>

                    <!-- Right Leg -->
                    <path d="M182,98 L198,124 L212,145" stroke="#1E293B" stroke-width="11" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                    <ellipse cx="214" cy="148" rx="12" ry="6" fill="#F59E0B" transform="rotate(15, 214, 148)"/>
                    <ellipse cx="220" cy="146" rx="5" ry="3.5" fill="#FFFFFF"/>

                    <!-- Sparkles -->
                    <circle cx="210" cy="38" r="3" fill="#FFFFFF" opacity="0.8"/>
                    <circle cx="150" cy="30" r="2.5" fill="#A3E635" opacity="0.7"/>
                </svg>
            </div>
        </div>
    </div>
</x-filament-widgets::widget>
