<x-filament-panels::page>
    @php
        $user = filament()->auth()->user();
        $name = $user?->name ?? 'Admin';
        $email = $user?->email ?? 'admin@voltiva.com';
        $phone = $user?->phone ?? '+91 76007 57008';
        $avatarFit = $this->avatar_fit ?? ($user?->avatar_fit ?? 'contain');
        $roles = $user?->getRoleNames() ?? collect(['Admin']);
        $primaryRole = $roles->first() ?? 'Admin';
        $initials = collect(explode(' ', $name))->map(fn($part) => strtoupper(substr($part, 0, 1)))->take(2)->implode('');
        $joined = $user?->created_at ? $user->created_at->format('M Y') : 'Sep 2026';
        $avatarUrl = $user?->avatar_url;
    @endphp

    <div class="voltiva-profile-root space-y-6">

        <!-- ───────────────────────────────────────────────────────────── -->
        <!-- 1. BREADCRUMBS & TOP HEADER                                   -->
        <!-- ───────────────────────────────────────────────────────────── -->
        <div class="rounded-2xl border border-gray-200/80 bg-white p-5 shadow-xs dark:border-zinc-800 dark:bg-zinc-900/90">
            <!-- Breadcrumbs -->
            <nav class="flex items-center gap-2 text-xs font-medium text-gray-500 dark:text-zinc-400 mb-3">
                <a href="{{ route('filament.admin.pages.dashboard') }}" class="flex items-center gap-1.5 hover:text-black dark:hover:text-white transition">
                    <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    Dashboard
                </a>
                <span>&rsaquo;</span>
                <span class="hover:text-black dark:hover:text-white transition cursor-default">Settings</span>
                <span>&rsaquo;</span>
                <span class="text-black dark:text-white font-semibold">Profile Settings</span>
            </nav>

            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div class="flex items-center gap-3.5">
                    <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-black text-white dark:bg-zinc-800 dark:text-zinc-100 shadow-sm">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                        </svg>
                    </div>
                    <div>
                        <div class="flex items-center gap-2.5 flex-wrap">
                            <h1 class="text-lg sm:text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Account &amp; Profile Settings
                            </h1>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/40 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800/50">
                                {{ $primaryRole }}
                            </span>
                        </div>
                        <p class="text-xs text-gray-500 dark:text-zinc-400 mt-0.5">
                            Manage your administrator profile, update login credentials, and configure account security settings.
                        </p>
                    </div>
                </div>

                <div>
                    <a href="{{ route('filament.admin.pages.dashboard') }}"
                       class="inline-flex items-center gap-2 rounded-xl border border-gray-200 bg-white px-3.5 py-2 text-xs font-semibold text-gray-700 shadow-2xs transition hover:bg-gray-50 hover:border-gray-300 dark:border-zinc-800 dark:bg-zinc-900 dark:text-zinc-200 dark:hover:bg-zinc-800">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                        </svg>
                        Dashboard
                    </a>
                </div>
            </div>
        </div>

        <!-- ───────────────────────────────────────────────────────────── -->
        <!-- 2. TWO-COLUMN MAIN CONTENT                                    -->
        <!-- ───────────────────────────────────────────────────────────── -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">

            <!-- ========================================================= -->
            <!-- LEFT COLUMN: Profile Card & Security Tips (4 Cols)        -->
            <!-- ========================================================= -->
            <div class="lg:col-span-4 space-y-6">

                <!-- Profile Card -->
                <div class="rounded-2xl border border-gray-200/80 bg-white p-6 shadow-xs dark:border-zinc-800 dark:bg-zinc-900/90 text-center relative">
                    
                    <!-- Avatar with Camera Badge -->
                    <div class="relative mx-auto w-32 h-32 mb-4">
                        <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-gray-100 dark:border-zinc-800 bg-white dark:bg-zinc-950 shadow-md flex items-center justify-center {{ $avatarFit === 'contain' ? 'p-3' : 'p-0' }}">
                            @if($avatarUrl)
                                <img src="{{ $avatarUrl }}?v={{ optional($user?->updated_at)->timestamp ?? time() }}"
                                     alt="{{ $name }}"
                                     style="object-fit: {{ $avatarFit }}; max-width: 100%; max-height: 100%; display: block;"
                                     class="w-full h-full rounded-full transition-all">
                            @else
                                <div class="w-full h-full rounded-full bg-gradient-to-br from-black via-zinc-900 to-zinc-800 text-white flex items-center justify-center text-3xl font-extrabold shadow-inner dark:from-zinc-800 dark:to-zinc-900">
                                    {{ $initials ?: 'AD' }}
                                </div>
                            @endif
                        </div>

                        <!-- Camera Action Button Badge -->
                        <label for="avatar_upload_input"
                               title="Click to change photo"
                               class="absolute bottom-1 right-1 w-9 h-9 rounded-full bg-black text-white dark:bg-white dark:text-black flex items-center justify-center cursor-pointer shadow-lg hover:scale-110 transition-transform border-2 border-white dark:border-zinc-900">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                            </svg>
                        </label>
                        <!-- Hidden input wired to Livewire -->
                        <input type="file"
                               id="avatar_upload_input"
                               wire:model.live="avatar_file"
                               accept="image/png,image/jpeg,image/jpg,image/webp,image/svg+xml,.svg"
                               class="hidden">
                    </div>

                    <!-- Upload loading indicator -->
                    <div wire:loading wire:target="avatar_file" class="text-xs text-gray-500 dark:text-zinc-400 mb-2">
                        <span class="inline-flex items-center gap-1.5 font-medium">
                            <svg class="animate-spin h-3.5 w-3.5 text-black dark:text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Uploading image...
                        </span>
                    </div>

                    @error('avatar_file')
                        <p class="text-[11px] text-rose-500 mb-2 font-medium">{{ $message }}</p>
                    @enderror

                    <!-- User Name & Verified Badge -->
                    <div class="flex items-center justify-center gap-1.5">
                        <h2 class="text-base font-bold text-gray-900 dark:text-white">{{ $name }}</h2>
                        <span class="inline-flex items-center justify-center w-4 h-4 rounded-full bg-emerald-500 text-white text-[10px]" title="Verified Administrator">
                            ✓
                        </span>
                    </div>
                    <p class="text-xs text-gray-500 dark:text-zinc-400 mt-0.5 truncate">{{ $email }}</p>

                    <!-- Role Pill -->
                    <div class="mt-2.5">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-gray-100 text-gray-800 dark:bg-zinc-800 dark:text-zinc-300 border border-gray-200 dark:border-zinc-700">
                            {{ $primaryRole }}
                        </span>
                    </div>

                    <!-- Action Buttons: Change Photo & Remove -->
                    <div class="mt-4 flex items-center justify-center gap-2">
                        <label for="avatar_upload_input"
                               class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-gray-200 bg-white text-xs font-semibold text-gray-700 hover:bg-gray-50 hover:border-gray-300 dark:border-zinc-800 dark:bg-zinc-900 dark:text-zinc-200 dark:hover:bg-zinc-800 cursor-pointer shadow-2xs transition">
                            <svg class="w-3.5 h-3.5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                            </svg>
                            Change Photo
                        </label>

                        @if($avatarUrl)
                            <button type="button"
                                    wire:click="removeAvatar"
                                    wire:confirm="Are you sure you want to remove your profile photo?"
                                    class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg border border-rose-200 bg-rose-50/50 text-xs font-semibold text-rose-600 hover:bg-rose-100 hover:border-rose-300 dark:border-rose-900/50 dark:bg-rose-950/30 dark:text-rose-400 dark:hover:bg-rose-900/50 cursor-pointer shadow-2xs transition">
                                <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                                Remove
                            </button>
                        @endif
                    </div>

                    <!-- Fitting Toggles: Fit Logo vs Fill Photo -->
                    <div class="mt-3 flex items-center justify-center gap-1.5 p-1 bg-gray-100 dark:bg-zinc-950 rounded-xl inline-flex mx-auto border border-gray-200 dark:border-zinc-800">
                        <button type="button"
                                wire:click="setAvatarFit('contain')"
                                class="px-2.5 py-1 rounded-lg text-[11px] font-semibold transition flex items-center gap-1 {{ $avatarFit === 'contain' ? 'bg-white dark:bg-zinc-800 text-black dark:text-white shadow-xs' : 'text-gray-500 dark:text-zinc-400 hover:text-black dark:hover:text-white' }}">
                            <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
                            </svg>
                            Fit Logo
                        </button>
                        <button type="button"
                                wire:click="setAvatarFit('cover')"
                                class="px-2.5 py-1 rounded-lg text-[11px] font-semibold transition flex items-center gap-1 {{ $avatarFit === 'cover' ? 'bg-white dark:bg-zinc-800 text-black dark:text-white shadow-xs' : 'text-gray-500 dark:text-zinc-400 hover:text-black dark:hover:text-white' }}">
                            <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            Fill Photo
                        </button>
                    </div>

                    <!-- Divider -->
                    <div class="my-5 border-t border-gray-100 dark:border-zinc-800"></div>

                    <!-- Metadata Rows -->
                    <div class="space-y-3 text-left text-xs">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500 dark:text-zinc-400 flex items-center gap-1.5">
                                📅 Member Since:
                            </span>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $joined }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500 dark:text-zinc-400 flex items-center gap-1.5">
                                📞 Contact Phone:
                            </span>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $phone }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-500 dark:text-zinc-400 flex items-center gap-1.5">
                                🟢 Account Status:
                            </span>
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-700 dark:bg-emerald-950/40 dark:text-emerald-400 border border-emerald-200 dark:border-emerald-800">
                                Active
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Security Tips Card -->
                <div class="rounded-2xl border border-gray-200/80 bg-white p-5 shadow-xs dark:border-zinc-800 dark:bg-zinc-900/90 text-left">
                    <div class="flex items-center gap-2 mb-3.5">
                        <div class="flex h-7 w-7 items-center justify-center rounded-lg bg-gray-100 text-black dark:bg-zinc-800 dark:text-white">
                            <svg class="w-4 h-4 text-emerald-600 dark:text-emerald-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                            </svg>
                        </div>
                        <h3 class="text-xs font-bold text-gray-900 dark:text-white uppercase tracking-wider">
                            Security Tips
                        </h3>
                    </div>

                    <ul class="space-y-2.5 text-xs text-gray-600 dark:text-zinc-300">
                        <li class="flex items-start gap-2">
                            <span class="text-emerald-500 font-bold shrink-0">✓</span>
                            <span>Use a unique password with at least 8 characters.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-emerald-500 font-bold shrink-0">✓</span>
                            <span>Always logout when accessing from shared or public devices.</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <span class="text-emerald-500 font-bold shrink-0">✓</span>
                            <span>Ensure your recovery contact email is valid and up to date.</span>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- ========================================================= -->
            <!-- RIGHT COLUMN: Personal Information & Password (8 Cols)     -->
            <!-- ========================================================= -->
            <div class="lg:col-span-8 space-y-6">

                <!-- ───────────────────────────────────────────────────── -->
                <!-- CARD 1: Personal Information                          -->
                <!-- ───────────────────────────────────────────────────── -->
                <div class="rounded-2xl border border-gray-200/80 bg-white p-6 shadow-xs dark:border-zinc-800 dark:bg-zinc-900/90">
                    <div class="flex items-start gap-3.5 mb-6">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-black dark:bg-zinc-800 dark:text-white">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Zm6-10.125a1.875 1.875 0 1 1-3.75 0 1.875 1.875 0 0 1 3.75 0Zm1.294 6.336a6.721 6.721 0 0 1-3.17.789 6.721 6.721 0 0 1-3.168-.789 3.376 3.376 0 0 1 6.338 0Z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-sm font-bold text-gray-900 dark:text-white">Personal Information</h2>
                            <p class="text-xs text-gray-500 dark:text-zinc-400 mt-0.5">
                                Update your administrator full name, official email address, and primary contact phone.
                            </p>
                        </div>
                    </div>

                    <form wire:submit.prevent="savePersonalInfo" class="space-y-4">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- Full Name -->
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 dark:text-zinc-300 mb-1.5">
                                    Full Name <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                        </svg>
                                    </div>
                                    <input type="text"
                                           wire:model="name"
                                           required
                                           placeholder="Admin Name"
                                           class="w-full rounded-xl border border-gray-200 bg-white py-2 pl-9 pr-3 text-xs text-gray-900 focus:border-black focus:ring-1 focus:ring-black dark:border-zinc-800 dark:bg-zinc-950 dark:text-zinc-100 dark:focus:border-white dark:focus:ring-white transition shadow-2xs">
                                </div>
                                @error('name') <span class="text-[11px] text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Email Address -->
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 dark:text-zinc-300 mb-1.5">
                                    Email Address <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                        </svg>
                                    </div>
                                    <input type="email"
                                           wire:model="email"
                                           required
                                           placeholder="admin@voltiva.com"
                                           class="w-full rounded-xl border border-gray-200 bg-white py-2 pl-9 pr-3 text-xs text-gray-900 focus:border-black focus:ring-1 focus:ring-black dark:border-zinc-800 dark:bg-zinc-950 dark:text-zinc-100 dark:focus:border-white dark:focus:ring-white transition shadow-2xs">
                                </div>
                                @error('email') <span class="text-[11px] text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Contact Phone Number -->
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 dark:text-zinc-300 mb-1.5">
                                    Contact Phone Number
                                </label>
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                        </svg>
                                    </div>
                                    <input type="text"
                                           wire:model="phone"
                                           placeholder="+91 97254 27725"
                                           class="w-full rounded-xl border border-gray-200 bg-white py-2 pl-9 pr-3 text-xs text-gray-900 focus:border-black focus:ring-1 focus:ring-black dark:border-zinc-800 dark:bg-zinc-950 dark:text-zinc-100 dark:focus:border-white dark:focus:ring-white transition shadow-2xs">
                                </div>
                                @error('phone') <span class="text-[11px] text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Assigned System Role (System Managed) -->
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 dark:text-zinc-300 mb-1.5 flex items-center justify-between">
                                    <span>Assigned System Role</span>
                                    <span class="text-[10px] text-gray-400 font-normal">System Managed</span>
                                </label>
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                        <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                                        </svg>
                                    </div>
                                    <input type="text"
                                           value="{{ $primaryRole }}"
                                           disabled
                                           class="w-full rounded-xl border border-gray-200 bg-gray-50/80 py-2 pl-9 pr-3 text-xs text-gray-600 dark:border-zinc-800 dark:bg-zinc-900/60 dark:text-zinc-400 cursor-not-allowed select-none">
                                </div>
                            </div>
                        </div>

                        <!-- Footer Note & Submit Button -->
                        <div class="pt-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 border-t border-gray-100 dark:border-zinc-800/80">
                            <span class="text-[11px] text-gray-500 dark:text-zinc-400 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                </svg>
                                Changes will reflect immediately across all admin sessions.
                            </span>

                            <button type="submit"
                                    wire:loading.attr="disabled"
                                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-black text-white dark:bg-white dark:text-black px-4 py-2 text-xs font-bold hover:bg-zinc-800 dark:hover:bg-zinc-200 transition shadow-sm cursor-pointer disabled:opacity-50">
                                <span wire:loading.remove wire:target="savePersonalInfo" class="flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                    Save Profile Changes
                                </span>
                                <span wire:loading wire:target="savePersonalInfo" class="flex items-center gap-1.5">
                                    <svg class="animate-spin h-3.5 w-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Saving...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- ───────────────────────────────────────────────────── -->
                <!-- CARD 2: Security & Password                           -->
                <!-- ───────────────────────────────────────────────────── -->
                <div class="rounded-2xl border border-gray-200/80 bg-white p-6 shadow-xs dark:border-zinc-800 dark:bg-zinc-900/90"
                     x-data="{
                        newPass: '',
                        showCurrent: false,
                        showNew: false,
                        showConfirm: false,
                        get hasLength() { return this.newPass.length >= 8 },
                        get hasUpper() { return /[A-Z]/.test(this.newPass) },
                        get hasNumber() { return /[0-9]/.test(this.newPass) },
                        get hasSymbol() { return /[^A-Za-z0-9]/.test(this.newPass) },
                        get score() {
                            let s = 0;
                            if (this.hasLength) s++;
                            if (this.hasUpper) s++;
                            if (this.hasNumber) s++;
                            if (this.hasSymbol) s++;
                            return s;
                        },
                        get strengthLabel() {
                            if (!this.newPass) return 'Enter password';
                            if (this.score <= 1) return 'Weak';
                            if (this.score === 2 || this.score === 3) return 'Medium';
                            return 'Strong';
                        },
                        get strengthColor() {
                            if (!this.newPass) return 'text-gray-400';
                            if (this.score <= 1) return 'text-rose-500';
                            if (this.score === 2 || this.score === 3) return 'text-amber-500';
                            return 'text-emerald-500';
                        }
                     }">

                    <div class="flex items-start gap-3.5 mb-6">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gray-100 text-black dark:bg-zinc-800 dark:text-white">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-sm font-bold text-gray-900 dark:text-white">Security &amp; Password</h2>
                            <p class="text-xs text-gray-500 dark:text-zinc-400 mt-0.5">
                                Ensure your account remains safe with a strong, randomized password combination.
                            </p>
                        </div>
                    </div>

                    <form wire:submit.prevent="updateSecurityPassword" class="space-y-4">

                        <!-- Current Password -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-700 dark:text-zinc-300 mb-1.5">
                                Current Password <span class="text-rose-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                    </svg>
                                </div>
                                <input :type="showCurrent ? 'text' : 'password'"
                                       wire:model="current_password"
                                       required
                                       placeholder="Enter current password to authorize changes"
                                       class="w-full rounded-xl border border-gray-200 bg-white py-2 pl-9 pr-10 text-xs text-gray-900 focus:border-black focus:ring-1 focus:ring-black dark:border-zinc-800 dark:bg-zinc-950 dark:text-zinc-100 dark:focus:border-white dark:focus:ring-white transition shadow-2xs">
                                
                                <button type="button"
                                        @click="showCurrent = !showCurrent"
                                        tabindex="-1"
                                        class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-black dark:hover:text-white transition">
                                    <svg x-show="!showCurrent" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                    <svg x-show="showCurrent" x-cloak class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                    </svg>
                                </button>
                            </div>
                            @error('current_password') <span class="text-[11px] text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                        </div>

                        <!-- New Password & Confirm Password -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- New Password -->
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 dark:text-zinc-300 mb-1.5">
                                    New Password <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                                        </svg>
                                    </div>
                                    <input :type="showNew ? 'text' : 'password'"
                                           wire:model="new_password"
                                           x-model="newPass"
                                           required
                                           placeholder="Minimum 8 characters"
                                           class="w-full rounded-xl border border-gray-200 bg-white py-2 pl-9 pr-10 text-xs text-gray-900 focus:border-black focus:ring-1 focus:ring-black dark:border-zinc-800 dark:bg-zinc-950 dark:text-zinc-100 dark:focus:border-white dark:focus:ring-white transition shadow-2xs">

                                    <button type="button"
                                            @click="showNew = !showNew"
                                            tabindex="-1"
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-black dark:hover:text-white transition">
                                        <svg x-show="!showNew" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                        <svg x-show="showNew" x-cloak class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                        </svg>
                                    </button>
                                </div>
                                @error('new_password') <span class="text-[11px] text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>

                            <!-- Confirm New Password -->
                            <div>
                                <label class="block text-xs font-semibold text-gray-700 dark:text-zinc-300 mb-1.5">
                                    Confirm New Password <span class="text-rose-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </div>
                                    <input :type="showConfirm ? 'text' : 'password'"
                                           wire:model="new_password_confirmation"
                                           required
                                           placeholder="Re-type new password"
                                           class="w-full rounded-xl border border-gray-200 bg-white py-2 pl-9 pr-10 text-xs text-gray-900 focus:border-black focus:ring-1 focus:ring-black dark:border-zinc-800 dark:bg-zinc-950 dark:text-zinc-100 dark:focus:border-white dark:focus:ring-white transition shadow-2xs">

                                    <button type="button"
                                            @click="showConfirm = !showConfirm"
                                            tabindex="-1"
                                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-black dark:hover:text-white transition">
                                        <svg x-show="!showConfirm" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                        <svg x-show="showConfirm" x-cloak class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                        </svg>
                                    </button>
                                </div>
                                @error('new_password_confirmation') <span class="text-[11px] text-rose-500 mt-1 block">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- 3-Segment Strength Meter Bar & Label -->
                        <div class="mt-4 pt-3 border-t border-gray-100 dark:border-zinc-800/80">
                            <div class="flex items-center justify-between text-xs mb-2">
                                <span class="text-gray-500 dark:text-zinc-400 font-medium">Password Strength:</span>
                                <span class="font-bold text-xs" :class="strengthColor" x-text="strengthLabel">Enter password</span>
                            </div>

                            <!-- 3 Segment Bar -->
                            <div class="grid grid-cols-3 gap-2 h-1.5 w-full mb-3.5">
                                <div class="rounded-full transition-all duration-300"
                                     :class="{
                                        'bg-gray-200 dark:bg-zinc-800': score === 0,
                                        'bg-rose-500': score === 1,
                                        'bg-amber-500': score >= 2
                                     }"></div>
                                <div class="rounded-full transition-all duration-300"
                                     :class="{
                                        'bg-gray-200 dark:bg-zinc-800': score <= 1,
                                        'bg-amber-500': score === 2 || score === 3,
                                        'bg-emerald-500': score >= 4
                                     }"></div>
                                <div class="rounded-full transition-all duration-300"
                                     :class="{
                                        'bg-gray-200 dark:bg-zinc-800': score <= 3,
                                        'bg-emerald-500': score >= 4
                                     }"></div>
                            </div>

                            <!-- 4 Requirements Checklist Grid -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-xs">
                                <div class="flex items-center gap-2" :class="hasLength ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-gray-400 dark:text-zinc-500'">
                                    <span class="w-3.5 h-3.5 rounded-full flex items-center justify-center text-[10px] border"
                                          :class="hasLength ? 'border-emerald-500 bg-emerald-50 dark:bg-emerald-950/40 text-emerald-600 dark:text-emerald-400' : 'border-gray-300 dark:border-zinc-700'">
                                        <span x-show="hasLength">✓</span>
                                    </span>
                                    <span>At least 8 characters</span>
                                </div>

                                <div class="flex items-center gap-2" :class="hasUpper ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-gray-400 dark:text-zinc-500'">
                                    <span class="w-3.5 h-3.5 rounded-full flex items-center justify-center text-[10px] border"
                                          :class="hasUpper ? 'border-emerald-500 bg-emerald-50 dark:bg-emerald-950/40 text-emerald-600 dark:text-emerald-400' : 'border-gray-300 dark:border-zinc-700'">
                                        <span x-show="hasUpper">✓</span>
                                    </span>
                                    <span>At least 1 uppercase letter</span>
                                </div>

                                <div class="flex items-center gap-2" :class="hasNumber ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-gray-400 dark:text-zinc-500'">
                                    <span class="w-3.5 h-3.5 rounded-full flex items-center justify-center text-[10px] border"
                                          :class="hasNumber ? 'border-emerald-500 bg-emerald-50 dark:bg-emerald-950/40 text-emerald-600 dark:text-emerald-400' : 'border-gray-300 dark:border-zinc-700'">
                                        <span x-show="hasNumber">✓</span>
                                    </span>
                                    <span>At least 1 number (0–9)</span>
                                </div>

                                <div class="flex items-center gap-2" :class="hasSymbol ? 'text-emerald-600 dark:text-emerald-400 font-medium' : 'text-gray-400 dark:text-zinc-500'">
                                    <span class="w-3.5 h-3.5 rounded-full flex items-center justify-center text-[10px] border"
                                          :class="hasSymbol ? 'border-emerald-500 bg-emerald-50 dark:bg-emerald-950/40 text-emerald-600 dark:text-emerald-400' : 'border-gray-300 dark:border-zinc-700'">
                                        <span x-show="hasSymbol">✓</span>
                                    </span>
                                    <span>At least 1 symbol (!@#$)</span>
                                </div>
                            </div>
                        </div>

                        <!-- Footer Note & Update Security Password Button -->
                        <div class="pt-4 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 border-t border-gray-100 dark:border-zinc-800/80">
                            <span class="text-[11px] text-gray-500 dark:text-zinc-400 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                                </svg>
                                After updating password, keep your new credentials safely noted.
                            </span>

                            <button type="submit"
                                    wire:loading.attr="disabled"
                                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-black text-white dark:bg-white dark:text-black px-4 py-2 text-xs font-bold hover:bg-zinc-800 dark:hover:bg-zinc-200 transition shadow-sm cursor-pointer disabled:opacity-50">
                                <span wire:loading.remove wire:target="updateSecurityPassword" class="flex items-center gap-1.5">
                                    <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                    </svg>
                                    Update Security Password
                                </span>
                                <span wire:loading wire:target="updateSecurityPassword" class="flex items-center gap-1.5">
                                    <svg class="animate-spin h-3.5 w-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Updating...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
</x-filament-panels::page>
