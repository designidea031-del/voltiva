# Laravel Admin Panel — Master Build Prompt (for Antigravity)

Copy everything below into Antigravity as your project instructions / first prompt.

---

## ROLE

You are a senior Laravel backend + Filament admin panel developer. Build a **fully functional, secure, production-grade admin panel** for my website. Work in an **iterative build → test → fix loop**: after every module, verify it actually works (routes load, forms save, validation triggers, no errors in logs) before moving to the next module. Do NOT tell me a feature is "done" unless you have verified it end-to-end with no errors. If something fails, fix it and re-test automatically — keep looping on that module until it is 100% correct, then move on. At the very end, give me a final verification report confirming every module works.

## TECH STACK

- Laravel 11 (latest stable)
- Filament v3 as the admin panel framework (Livewire-based)
- Spatie `laravel-permission` for Roles & Permissions
- MySQL database
- Spatie `laravel-medialibrary` for image/file uploads (products, blog, categories)
- Laravel's built-in validation + Form Requests (no raw validation in controllers)
- Slug generation via `spatie/laravel-sluggable`
- Activity logging via `spatie/laravel-activitylog` (who changed what, when)

## GLOBAL NON-FUNCTIONAL REQUIREMENTS (apply to every module)

1. **Security**
   - CSRF protection on all forms (Filament handles this — verify it's not bypassed)
   - All inputs validated server-side via Form Requests / Filament validation rules, not just frontend
   - Authorization via Laravel Policies + Spatie permissions on every resource (a user without permission must get 403, test this)
   - Mass-assignment protected (`$fillable` or `$guarded` correctly set on every model)
   - SQL injection safe (Eloquent/query builder only, no raw string-concatenated queries)
   - File upload validation: restrict mime types, max size, sanitize filenames
   - Rate limiting on login and any public-facing forms
   - `.env` secrets never hardcoded; no debug info leaked in production error pages
2. **Code quality**
   - PSR-12 formatting
   - Thin controllers — logic in Form Requests / Services / Actions, not controllers or Filament resource classes directly
   - Meaningful model relationships (e.g. Category hasMany SubCategory, Product belongsTo Category/SubCategory)
   - Migrations must be reversible (`down()` implemented correctly)
   - Seeders + factories for every model so I can test with sample data immediately
3. **UI/UX**
   - Clean, professional Filament theme, consistent icons, sensible grouping in the sidebar navigation
   - Tables: searchable, sortable, filterable, paginated
   - Forms: proper field types (rich text editor for blog/product descriptions, image upload with preview, select/dropdown for relationships, toggle for status)
   - Success/error notifications on every action
   - Responsive on mobile/tablet
4. **Performance**
   - Eager load relationships to avoid N+1 queries (verify with Laravel Debugbar or `DB::listen`)
   - Indexes on foreign keys and frequently filtered columns (slug, status, category_id, etc.)

## MODULES TO BUILD (in this order — complete and verify each before the next)

### 1. Project setup
- Fresh Laravel 11 install, install Filament v3, Spatie permission, medialibrary, sluggable, activitylog
- Configure `.env`, run base migrations, create Filament admin user
- Verify: I can log into `/admin` with no errors

### 2. Roles & Permissions
- Roles: Super Admin, Admin, Editor, Viewer (adjust if you have a better default set)
- Permissions per module: view, create, edit, delete (e.g. `products.view`, `products.create`...)
- Filament resource to manage Roles & Permissions (Super Admin only)
- Verify: create a test "Editor" user, confirm they can only do what their permissions allow

### 3. User Management
- User list, create/edit/delete, assign role(s)
- Profile photo, status (active/inactive)
- Verify: deactivated user cannot log in

### 4. Category & Sub-Category
- `categories` table: name, slug, image, status, description, meta title/description (SEO)
- `sub_categories` table: belongs to category, same fields
- Nested display in Filament (category with expandable sub-categories, or a parent_id select)
- Verify: deleting a category with sub-categories is handled safely (block delete OR cascade — confirm with me which, default = block with a warning if sub-categories exist)

### 5. Products
- Fields: name, slug, SKU, category_id, sub_category_id, price, sale_price, stock quantity, short description, long description (rich text), multiple images (gallery via medialibrary), status (draft/published), featured (yes/no), meta title/description
- Product variants if relevant (size/color) — ask me before building this, it adds complexity
- Verify: create a product with multiple images, confirm images display correctly, stock updates correctly

### 6. Blog
- `blog_categories` table
- `blog_posts` table: title, slug, category_id, author_id (linked to user), featured image, excerpt, rich text body, status (draft/scheduled/published), published_at, meta title/description
- Verify: scheduled post doesn't show as published until its `published_at` time

### 7. Settings (single, non-repeating config page)
- Site name, logo, favicon, contact email/phone, address, social media links, SEO defaults, maintenance mode toggle
- Store via a `settings` key-value table (not scattered `.env` edits), use a Filament custom settings page
- Verify: changing a setting reflects immediately without needing to redeploy

### 8. Profile Page (for the logged-in admin user)
- Update name, email, password (with current-password confirmation), avatar
- Verify: password change actually re-hashes and old password no longer works

### 9. Dashboard
- Widget cards: total products, total orders (if applicable), total blog posts, total users
- Simple chart (e.g. products added per month, or posts published per month)
- Verify: numbers match actual database counts

### 10. (Optional — tell me if you want these; don't build unless I confirm)
- Orders / Inventory management
- Coupon/discount codes
- Newsletter subscribers
- Contact form submissions inbox
- Multi-language content

## EXECUTION RULES FOR THE AI LOOP

1. Build one module fully (migration → model → policy → Filament resource → seeder).
2. Run `php artisan migrate:fresh --seed` and load the relevant admin page yourself — check for errors in `storage/logs/laravel.log` and browser console.
3. Test create, edit, delete, and permission-denial for that module.
4. If any error, bug, or broken validation appears — fix it immediately and re-run step 2–3. Do not proceed until it passes clean.
5. Only after a module is fully verified, move to the next module.
6. Keep a running checklist and show me progress after each module (✅ done & verified / ⚠️ built but issue found & fixed / ❌ blocked, needs my input).
7. Never mark the whole project "complete" until every module in the list above is ✅.
8. If you're unsure about a business-logic decision (e.g. cascade delete, variant support, tax rules), stop and ask me a specific question rather than guessing.

## FINAL DELIVERABLE

At the end, give me:
- Final module-by-module verification checklist (all ✅)
- Default login credentials for each role you seeded
- List of any assumptions you made that I should review
- Any `.env` values I need to fill in myself (mail, storage disk, etc.)

---

**Start with Module 1 (Project setup) now. After each module, pause and report status before continuing to the next.**
