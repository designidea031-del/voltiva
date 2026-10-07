@php
    $user = filament()->auth()->user();
@endphp
<div class="px-3 pb-3 mt-auto">
    <div class="p-3 bg-gradient-to-b from-slate-50 to-white dark:from-slate-900/90 dark:to-slate-900 rounded-2xl border border-slate-200/80 dark:border-slate-800 shadow-sm flex flex-col gap-2.5">
        <a href="{{ filament()->getProfileUrl() }}" 
           title="Account & Profile Settings"
           class="flex items-center gap-3 p-1 rounded-xl hover:bg-slate-100/60 dark:hover:bg-slate-800/60 transition group">
            <div class="relative shrink-0">
                <div class="h-9 w-9 rounded-xl bg-white dark:bg-zinc-950 border border-slate-200 dark:border-slate-800 flex items-center justify-center text-white font-bold text-xs shadow-md overflow-hidden {{ ($user?->avatar_fit ?? 'contain') === 'contain' ? 'p-1' : 'p-0' }}">
                    @if(!empty($user?->avatar_url))
                        <img src="{{ $user->avatar_url }}?v={{ optional($user?->updated_at)->timestamp ?? time() }}" alt="{{ $user?->name }}" class="w-full h-full rounded-lg" style="object-fit: {{ $user?->avatar_fit ?? 'contain' }}; max-width: 100%; max-height: 100%;">
                    @else
                        <span class="w-full h-full rounded-lg bg-black dark:bg-zinc-800 flex items-center justify-center text-white">{{ str($user?->name ?? 'AD')->substr(0, 2)->upper() }}</span>
                    @endif
                </div>
                <span class="absolute -bottom-0.5 -right-0.5 w-2.5 h-2.5 rounded-full bg-emerald-500 ring-2 ring-white dark:ring-slate-900"></span>
            </div>
            <div class="min-w-0 flex-1">
                <h4 class="text-xs font-bold text-slate-900 dark:text-white truncate leading-tight group-hover:text-black dark:group-hover:text-zinc-200">
                    {{ $user?->name ?? 'Admin' }}
                </h4>
                <div class="flex items-center gap-1.5 mt-0.5">
                    <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[10px] font-bold bg-zinc-100 text-zinc-800 dark:bg-zinc-800 dark:text-zinc-200 border border-zinc-200 dark:border-zinc-700">
                        Admin
                    </span>
                    <span class="text-[10px] text-slate-400 truncate">{{ $user?->email ?? 'admin@voltiva.com' }}</span>
                </div>
            </div>
        </a>

        <form action="{{ filament()->getLogoutUrl() }}" method="post" class="w-full pt-1 border-t border-slate-100 dark:border-slate-800/80">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-1.5 bg-slate-100/80 hover:bg-rose-50 dark:bg-slate-800 dark:hover:bg-rose-950/40 rounded-xl text-xs font-semibold text-slate-600 hover:text-rose-600 dark:text-slate-300 dark:hover:text-rose-400 transition-all border border-slate-200/50 dark:border-slate-700/50">
                <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                </svg>
                Sign out
            </button>
        </form>
    </div>
</div>
