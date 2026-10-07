<div class="space-y-4 text-sm text-gray-800 dark:text-gray-200">
    <!-- Header with customer badge & status -->
    <div class="flex items-center justify-between pb-3 border-b border-gray-200 dark:border-gray-800">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-amber-500/10 text-amber-600 dark:text-amber-400 flex items-center justify-center font-bold text-base">
                {{ strtoupper(substr($lead->name, 0, 1)) }}
            </div>
            <div>
                <h4 class="font-bold text-base text-gray-900 dark:text-white leading-tight">{{ $lead->name }}</h4>
                <p class="text-xs text-gray-500 dark:text-gray-400">Received {{ $lead->created_at?->format('d M Y \a\t h:i A') }} ({{ $lead->created_at?->diffForHumans() }})</p>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <span class="px-2.5 py-1 text-xs font-semibold rounded-full 
                @if($lead->status === 'new') bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-300
                @elseif($lead->status === 'contacted') bg-amber-100 text-amber-700 dark:bg-amber-900/40 dark:text-amber-300
                @elseif($lead->status === 'in_progress') bg-blue-100 text-blue-700 dark:bg-blue-900/40 dark:text-blue-300
                @elseif($lead->status === 'closed') bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300
                @else bg-gray-100 text-gray-700 dark:bg-gray-800 dark:text-gray-300 @endif">
                {{ ucfirst(str_replace('_', ' ', $lead->status)) }}
            </span>
            <span class="px-2 py-1 text-xs font-medium rounded-md bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400 border border-gray-200 dark:border-gray-700">
                {{ $lead->source ?? 'Contact Page' }}
            </span>
        </div>
    </div>

    <!-- Contact quick actions -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 py-1">
        @if($lead->phone)
        <a href="tel:{{ $lead->phone }}" class="flex items-center gap-2 px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-800/60 border border-gray-200 dark:border-gray-700 hover:border-amber-500 transition-colors">
            <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            <div class="min-w-0">
                <div class="text-[11px] uppercase tracking-wider text-gray-500 font-semibold">Phone / WhatsApp</div>
                <div class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ $lead->phone }}</div>
            </div>
        </a>
        @endif

        @if($lead->email)
        <a href="mailto:{{ $lead->email }}" class="flex items-center gap-2 px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-800/60 border border-gray-200 dark:border-gray-700 hover:border-amber-500 transition-colors">
            <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            <div class="min-w-0">
                <div class="text-[11px] uppercase tracking-wider text-gray-500 font-semibold">Email</div>
                <div class="text-sm font-medium text-gray-900 dark:text-white truncate">{{ $lead->email }}</div>
            </div>
        </a>
        @endif
    </div>

    @if($lead->subject || $lead->product_name)
    <div class="p-3 rounded-lg bg-amber-500/5 border border-amber-500/20">
        @if($lead->subject)
        <div class="text-xs font-bold uppercase tracking-wider text-amber-600 dark:text-amber-400 mb-0.5">Subject / Requirement</div>
        <div class="font-semibold text-gray-900 dark:text-white mb-2">{{ $lead->subject }}</div>
        @endif
        @if($lead->product_name)
        <div class="text-xs text-gray-600 dark:text-gray-400">
            <span class="font-semibold">Interested Product:</span> {{ $lead->product_name }}
        </div>
        @endif
    </div>
    @endif

    <!-- Message Content -->
    <div class="space-y-1.5">
        <label class="text-xs font-bold uppercase tracking-wider text-gray-500 dark:text-gray-400">Customer Inquiry Message</label>
        <div class="p-4 rounded-lg bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 whitespace-pre-line text-sm leading-relaxed text-gray-800 dark:text-gray-200">
            {{ $lead->message }}
        </div>
    </div>

    <!-- Admin Notes -->
    @if($lead->admin_notes)
    <div class="space-y-1.5">
        <label class="text-xs font-bold uppercase tracking-wider text-amber-600 dark:text-amber-400">Internal Follow-Up Notes</label>
        <div class="p-3 rounded-lg bg-yellow-50 dark:bg-yellow-950/30 border border-yellow-200 dark:border-yellow-800/50 whitespace-pre-line text-xs text-yellow-900 dark:text-yellow-200">
            {{ $lead->admin_notes }}
        </div>
    </div>
    @endif

    @if($lead->ip_address)
    <div class="text-[11px] text-gray-400 text-right">
        Origin IP: {{ $lead->ip_address }}
    </div>
    @endif
</div>
