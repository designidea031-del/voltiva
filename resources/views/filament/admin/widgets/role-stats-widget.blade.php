@php
    $rolesCount = \Spatie\Permission\Models\Role::count();
    $permissionsCount = \Spatie\Permission\Models\Permission::count();
    $usersAssignedCount = \Illuminate\Support\Facades\DB::table('model_has_roles')->distinct('model_id')->count('model_id');
@endphp

<x-filament-widgets::widget>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 w-full mb-2">
        <!-- 1. Active Roles -->
        <div class="rounded-2xl p-5 border border-[#e8e8e8] bg-white shadow-xs dark:bg-[#18181b] dark:border-[#27272a] flex flex-col justify-between min-h-[120px] transition-all hover:shadow-md hover:-translate-y-0.5">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold text-[#71717a] dark:text-[#a1a1aa] mb-1.5 uppercase tracking-wider">Active Roles</p>
                    <div class="flex items-center gap-2.5">
                        <h3 class="text-2xl sm:text-3xl font-extrabold text-[#09090b] dark:text-white tracking-tight leading-none">{{ $rolesCount }}</h3>
                        <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-neutral-900/10 text-neutral-900 dark:bg-white/20 dark:text-white">Active</span>
                    </div>
                </div>
                <div class="w-10 h-10 rounded-xl bg-neutral-100 dark:bg-neutral-800 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-neutral-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z" />
                    </svg>
                </div>
            </div>
            <div class="mt-3">
                <span class="text-xs text-[#a1a1aa] dark:text-[#71717a] font-medium">Security access profiles</span>
            </div>
        </div>

        <!-- 2. System Permissions -->
        <div class="rounded-2xl p-5 border border-[#e8e8e8] bg-white shadow-xs dark:bg-[#18181b] dark:border-[#27272a] flex flex-col justify-between min-h-[120px] transition-all hover:shadow-md hover:-translate-y-0.5">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold text-[#71717a] dark:text-[#a1a1aa] mb-1.5 uppercase tracking-wider">Total Permissions</p>
                    <div class="flex items-center gap-2.5">
                        <h3 class="text-2xl sm:text-3xl font-extrabold text-[#09090b] dark:text-white tracking-tight leading-none">{{ $permissionsCount }}</h3>
                        <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-neutral-900/10 text-neutral-900 dark:bg-white/20 dark:text-white">Capabilities</span>
                    </div>
                </div>
                <div class="w-10 h-10 rounded-xl bg-neutral-100 dark:bg-neutral-800 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-neutral-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z" />
                    </svg>
                </div>
            </div>
            <div class="mt-3">
                <span class="text-xs text-[#a1a1aa] dark:text-[#71717a] font-medium">Granular system operations</span>
            </div>
        </div>

        <!-- 3. Assigned Users -->
        <div class="rounded-2xl p-5 border border-[#e8e8e8] bg-white shadow-xs dark:bg-[#18181b] dark:border-[#27272a] flex flex-col justify-between min-h-[120px] transition-all hover:shadow-md hover:-translate-y-0.5">
            <div class="flex items-start justify-between">
                <div>
                    <p class="text-xs font-semibold text-[#71717a] dark:text-[#a1a1aa] mb-1.5 uppercase tracking-wider">Assigned Users</p>
                    <div class="flex items-center gap-2.5">
                        <h3 class="text-2xl sm:text-3xl font-extrabold text-[#09090b] dark:text-white tracking-tight leading-none">{{ $usersAssignedCount }}</h3>
                        <span class="px-2 py-0.5 rounded-full text-[11px] font-bold bg-neutral-900/10 text-neutral-900 dark:bg-white/20 dark:text-white">Mapped</span>
                    </div>
                </div>
                <div class="w-10 h-10 rounded-xl bg-neutral-100 dark:bg-neutral-800 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-neutral-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                    </svg>
                </div>
            </div>
            <div class="mt-3">
                <span class="text-xs text-[#a1a1aa] dark:text-[#71717a] font-medium">Accounts with active roles</span>
            </div>
        </div>
    </div>
</x-filament-widgets::widget>
