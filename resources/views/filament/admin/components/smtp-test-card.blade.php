<div class="rounded-2xl border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800/90 p-5 shadow-sm">
    <div class="flex items-center gap-3 pb-3 mb-4 border-b border-gray-100 dark:border-gray-700/60">
        <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-orange-100 dark:bg-orange-950/60 text-orange-600 dark:text-orange-400 font-bold text-sm">
            <x-heroicon-o-paper-airplane class="w-5 h-5"/>
        </span>
        <div>
            <h4 class="text-sm font-semibold text-gray-900 dark:text-white">
                Live Mail Delivery Test
            </h4>
            <p class="text-xs text-gray-500 dark:text-gray-400">
                Send an instant test email to any inbox to verify that your SMTP credentials, host, and port are working properly.
            </p>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3 max-w-xl">
        <div class="relative flex-1">
            <div class="pointer-events-none absolute inset-y-0 left-3 flex items-center">
                <x-heroicon-o-envelope class="h-4 w-4 text-gray-400"/>
            </div>
            <input
                type="email"
                wire:model.defer="test_email_recipient"
                placeholder="Enter test recipient email (e.g. your@email.com)"
                class="w-full rounded-xl border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-900 py-2.5 pl-9 pr-3 text-sm text-gray-900 dark:text-white placeholder-gray-400 focus:border-orange-500 focus:outline-none focus:ring-2 focus:ring-orange-500/20 transition shadow-xs"
            />
        </div>

        <button
            type="button"
            wire:click="sendTestEmail"
            wire:loading.attr="disabled"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-orange-600 hover:bg-orange-700 active:bg-orange-800 text-white px-5 py-2.5 text-sm font-semibold shadow-sm transition disabled:opacity-50"
        >
            <span wire:loading.remove wire:target="sendTestEmail" class="inline-flex items-center gap-2">
                <x-heroicon-m-paper-airplane class="w-4 h-4"/>
                <span>Send Test Email</span>
            </span>
            <span wire:loading wire:target="sendTestEmail" class="inline-flex items-center gap-2">
                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>
                <span>Sending...</span>
            </span>
        </button>
    </div>
</div>
