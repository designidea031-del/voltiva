# Filament Admin Panel Implementation Plan

I have read the master prompt for the new Filament-based Admin Panel. This is a robust plan that involves setting up Filament v3, Roles & Permissions, Media Library, Sluggable, Activity Logs, and a suite of highly requested modules. 

Since we already have an existing Laravel installation and database tables from our previous work (`categories`, `listings`, `admin_users`), we will need to adapt the prompt to safely integrate with the current environment without destroying existing data.

## Proposed Changes

### Module 1: Project Setup & Packages
- Install and configure packages: 
  - `filament/filament` v3
  - `spatie/laravel-permission`
  - `spatie/laravel-medialibrary`
  - `spatie/laravel-sluggable`
  - `spatie/laravel-activitylog`
- Publish their respective configuration files and migrations.
- Set up the Filament panel provider (`AdminPanelProvider`).

### Module 2: Roles & Permissions
- Implement Spatie Roles & Permissions.
- Create standard roles (Super Admin, Admin, Editor, Viewer).
- Build the `RoleResource` and `PermissionResource` for Filament.

### Module 3: User Management
- We currently have `admin_users` and default `users` tables. We will migrate entirely to the standard Laravel `User` model for Filament administration, as Filament strongly prefers using the default `User` model. We will seed it with your previous admin credentials.
- Build the `UserResource` in Filament to manage users, avatars, and roles.

### Module 4: Category & Sub-Category
- Adapt the existing `categories` table. Add new fields required by the prompt (`image`, `description`, `meta_title`, `meta_description`, `parent_id` for sub-categories).
- Build the `CategoryResource` with a hierarchical UI (parent-child).

### Module 5: Products (Listings)
- We will adapt our existing `listings` table into the new "Products" module, renaming it if desired, or adding the newly required fields (SKU, sale_price, stock_quantity, long_description, etc.)
- Integrate Spatie MediaLibrary for a multiple-image gallery.

### Module 6: Blog
- Create new migrations and models for `BlogCategory` and `BlogPost`.
- Build the `BlogPostResource` and `BlogCategoryResource`.

### Module 7 & 8: Settings and Profile
- Implement a key-value settings table and a custom Filament Settings Page.
- Implement the Profile Page for the logged-in admin (password reset, avatar upload).

### Module 9: Dashboard
- Build custom Filament widgets (Stats Overview, Charts) hooked into our database.

> [!WARNING] 
> **Database Changes**
> Because we are switching to Filament, we will need to add new columns to our existing `categories` and `listings` tables. We will also transition from the custom `admin_users` table to the standard `users` table so Filament's built-in auth works seamlessly.

## Resolved Decisions

Based on user feedback, the following decisions have been made:
1. **Products Table:** We will rename the existing `listings` table to `products` (and rename related models/resources).
2. **Product Fields:** The `products` (or product variants) will include the specific fields requested from the example: `code`, `description`, `size`, `price`, `pkd` (packaging/quantity), and `image`. 
3. **Sub-categories Deletion:** We will set up cascading deletion for sub-categories.
4. **Optional Modules:** We will focus on the core modules and the product structure defined above.

## Verification Plan

Following your prompt's rules, I will execute this via an iterative loop:
1. I will complete one Module at a time.
2. I will test it locally via the browser and logs.
3. Once verified, I will pause and ask you to review the Module before I proceed to the next one. 
4. The running checklist will be maintained in a `task.md` artifact.
