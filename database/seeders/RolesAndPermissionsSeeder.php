<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // ── Define all permissions grouped by module ───────────────────────
        $permissions = [
            // Products
            'view_products', 'create_products', 'edit_products', 'delete_products',
            // Categories
            'view_categories', 'create_categories', 'edit_categories', 'delete_categories',
            // Sub Categories
            'view_sub_categories', 'create_sub_categories', 'edit_sub_categories', 'delete_sub_categories',
            // Blog Posts
            'view_blog_posts', 'create_blog_posts', 'edit_blog_posts', 'delete_blog_posts',
            // Blog Categories
            'view_blog_categories', 'create_blog_categories', 'edit_blog_categories', 'delete_blog_categories',
            // Users
            'view_users', 'create_users', 'edit_users', 'delete_users',
            // Roles
            'view_roles', 'create_roles', 'edit_roles', 'delete_roles',
            // Permissions
            'view_permissions', 'create_permissions', 'edit_permissions', 'delete_permissions',
            // Media
            'view_media', 'upload_media', 'delete_media',
            // Settings
            'manage_settings',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
        }

        // ── Create / update roles with permissions ─────────────────────────

        // Super Admin — full access (no specific permissions needed, handled via gate)
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
        $superAdmin->syncPermissions(Permission::all());

        // Admin — all except delete roles/permissions and manage settings
        $admin = Role::firstOrCreate(['name' => 'Admin', 'guard_name' => 'web']);
        $admin->syncPermissions(
            Permission::whereNotIn('name', [
                'delete_roles', 'delete_permissions', 'manage_settings',
            ])->get()
        );

        // Editor — view + create + edit content only (no users, roles, permissions)
        $editor = Role::firstOrCreate(['name' => 'Editor', 'guard_name' => 'web']);
        $editor->syncPermissions([
            'view_products', 'create_products', 'edit_products',
            'view_categories', 'create_categories', 'edit_categories',
            'view_sub_categories', 'create_sub_categories', 'edit_sub_categories',
            'view_blog_posts', 'create_blog_posts', 'edit_blog_posts',
            'view_blog_categories', 'create_blog_categories', 'edit_blog_categories',
            'view_media', 'upload_media',
        ]);

        // Viewer — read-only access to content
        $viewer = Role::firstOrCreate(['name' => 'Viewer', 'guard_name' => 'web']);
        $viewer->syncPermissions([
            'view_products', 'view_categories', 'view_sub_categories',
            'view_blog_posts', 'view_blog_categories', 'view_media',
        ]);

        $this->command->info('✅ Roles & Permissions seeded successfully.');
        $this->command->table(
            ['Role', 'Permissions Count'],
            Role::withCount('permissions')->get()->map(fn ($r) => [$r->name, $r->permissions_count])->toArray()
        );
    }
}
