@php
    $recentLeads = \App\Models\Lead::latest()->take(5)->get();
@endphp

<x-filament-widgets::widget>
    <div class="rounded-2xl p-5 sm:p-6 border border-[#e8e8e8] bg-white shadow-xs dark:bg-[#18181b] dark:border-[#27272a] w-full">
        <!-- Header -->
        <div class="flex items-center justify-between pb-4 border-b border-gray-100 dark:border-gray-800">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-xl bg-red-500/10 text-red-600 dark:text-red-400 flex items-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <h3 class="text-base font-bold text-[#000000] dark:text-white">Recent Customer Inquiries</h3>
                    <p class="text-xs text-gray-500 dark:text-gray-400">Incoming prospective client requests and dealership queries</p>
                </div>
            </div>
            <a href="{{ url('/admin/leads') }}" class="text-xs font-bold text-amber-600 dark:text-amber-400 hover:underline flex items-center gap-1">
                View All Inquiries &rarr;
            </a>
        </div>

        <!-- Table / List -->
        <div class="overflow-x-auto mt-2">
            <table class="w-full text-left text-sm">
                <thead>
                    <tr class="text-[11px] font-bold uppercase tracking-wider text-gray-400 border-b border-gray-100 dark:border-gray-800/60">
                        <th class="py-3 px-2">Customer</th>
                        <th class="py-3 px-2">Requirement / Subject</th>
                        <th class="py-3 px-2">Source</th>
                        <th class="py-3 px-2">Status</th>
                        <th class="py-3 px-2 text-right">Received</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 dark:divide-gray-800/40">
                    @forelse($recentLeads as $lead)
                    <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-800/30 transition-colors">
                        <td class="py-3 px-2">
                            <div class="font-bold text-gray-900 dark:text-white">{{ $lead->name }}</div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">{{ $lead->phone ?? $lead->email }}</div>
                        </td>
                        <td class="py-3 px-2">
                            <div class="text-gray-800 dark:text-gray-200 font-medium truncate max-w-xs">{{ $lead->subject ?? 'General Inquiry' }}</div>
                            <div class="text-xs text-gray-400 truncate max-w-xs">{{ Str::limit($lead->message, 50) }}</div>
                        </td>
                        <td class="py-3 px-2">
                            <span class="inline-block px-2 py-0.5 text-[11px] font-semibold rounded bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-300">
                                {{ $lead->source }}
                            </span>
                        </td>
                        <td class="py-3 px-2">
                            <span class="inline-block px-2.5 py-0.5 text-xs font-semibold rounded-full 
                                @if($lead->status === 'new') bg-red-100 text-red-700 dark:bg-red-900/40 dark:text-red-300
                                @elseif($lead->status === 'contacted') bg-amber-100 text-amber-700 dark:bg-amber-900/40 dark:text-amber-300
                                @elseif($lead->status === 'in_progress') bg-blue-100 text-blue-700 dark:bg-blue-900/40 dark:text-blue-300
                                @elseif($lead->status === 'closed') bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300
                                @else bg-gray-100 text-gray-700 dark:bg-gray-800 dark:text-gray-300 @endif">
                                {{ ucfirst(str_replace('_', ' ', $lead->status)) }}
                            </span>
                        </td>
                        <td class="py-3 px-2 text-right text-xs text-gray-500 dark:text-gray-400 whitespace-nowrap">
                            {{ $lead->created_at?->diffForHumans() }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-6 text-center text-gray-400">
                            No inquiries received yet.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-filament-widgets::widget>
