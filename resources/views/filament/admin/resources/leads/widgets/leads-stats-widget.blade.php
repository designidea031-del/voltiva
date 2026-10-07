@php
    $total = \App\Models\Lead::count();
    $new = \App\Models\Lead::where('status', 'new')->count();
    $inProgress = \App\Models\Lead::whereIn('status', ['contacted', 'in_progress'])->count();
    $closed = \App\Models\Lead::where('status', 'closed')->count();
@endphp

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
    <div class="p-4 rounded-xl border border-gray-200 dark:border-zinc-800 bg-white dark:bg-zinc-900 flex items-center justify-between shadow-xs">
        <div>
            <div class="text-[11px] font-bold uppercase tracking-wider text-gray-400">Total Inquiries</div>
            <div class="text-2xl font-black text-gray-900 dark:text-white mt-1">{{ $total }}</div>
            <div class="text-xs text-gray-500 mt-0.5">All customer inquiries</div>
        </div>
        <div class="w-10 h-10 rounded-xl bg-gray-100 dark:bg-zinc-800 text-gray-800 dark:text-gray-200 flex items-center justify-center font-bold text-lg">
            📥
        </div>
    </div>

    <div class="p-4 rounded-xl border border-red-200 dark:border-red-900/50 bg-white dark:bg-zinc-900 flex items-center justify-between shadow-xs">
        <div>
            <div class="text-[11px] font-bold uppercase tracking-wider text-red-500">New / Uncontacted</div>
            <div class="text-2xl font-black text-red-600 dark:text-red-400 mt-1">{{ $new }}</div>
            <div class="text-xs text-red-400 mt-0.5">Immediate follow-up</div>
        </div>
        <div class="w-10 h-10 rounded-xl bg-red-50 dark:bg-red-950/40 text-red-600 dark:text-red-400 flex items-center justify-center font-bold text-lg">
            ⚡
        </div>
    </div>

    <div class="p-4 rounded-xl border border-blue-200 dark:border-blue-900/50 bg-white dark:bg-zinc-900 flex items-center justify-between shadow-xs">
        <div>
            <div class="text-[11px] font-bold uppercase tracking-wider text-blue-500">In Discussion</div>
            <div class="text-2xl font-black text-blue-600 dark:text-blue-400 mt-1">{{ $inProgress }}</div>
            <div class="text-xs text-blue-400 mt-0.5">Active negotiation</div>
        </div>
        <div class="w-10 h-10 rounded-xl bg-blue-50 dark:bg-blue-950/40 text-blue-600 dark:text-blue-400 flex items-center justify-center font-bold text-lg">
            💬
        </div>
    </div>

    <div class="p-4 rounded-xl border border-emerald-200 dark:border-emerald-900/50 bg-white dark:bg-zinc-900 flex items-center justify-between shadow-xs">
        <div>
            <div class="text-[11px] font-bold uppercase tracking-wider text-emerald-500">Converted &amp; Closed</div>
            <div class="text-2xl font-black text-emerald-600 dark:text-emerald-400 mt-1">{{ $closed }}</div>
            <div class="text-xs text-emerald-400 mt-0.5">Successful orders</div>
        </div>
        <div class="w-10 h-10 rounded-xl bg-emerald-50 dark:bg-emerald-950/40 text-emerald-600 dark:text-emerald-400 flex items-center justify-center font-bold text-lg">
            ✓
        </div>
    </div>
</div>
