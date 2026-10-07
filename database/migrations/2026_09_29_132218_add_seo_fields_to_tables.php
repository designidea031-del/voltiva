<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (Schema::hasTable('page_seos')) {
            Schema::table('page_seos', function (Blueprint $table) {
                if (!Schema::hasColumn('page_seos', 'og_title')) {
                    $table->string('og_title')->nullable()->after('og_image');
                }
                if (!Schema::hasColumn('page_seos', 'og_description')) {
                    $table->text('og_description')->nullable()->after('og_title');
                }
                if (!Schema::hasColumn('page_seos', 'schema_type')) {
                    $table->string('schema_type')->nullable()->default('WebPage')->after('schema_markup');
                }
            });
        }

        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                if (!Schema::hasColumn('products', 'meta_title')) {
                    $table->string('meta_title')->nullable()->after('description');
                }
                if (!Schema::hasColumn('products', 'meta_description')) {
                    $table->text('meta_description')->nullable()->after('meta_title');
                }
                if (!Schema::hasColumn('products', 'meta_keywords')) {
                    $table->text('meta_keywords')->nullable()->after('meta_description');
                }
                if (!Schema::hasColumn('products', 'canonical_url')) {
                    $table->string('canonical_url')->nullable()->after('meta_keywords');
                }
                if (!Schema::hasColumn('products', 'og_image')) {
                    $table->string('og_image')->nullable()->after('canonical_url');
                }
                if (!Schema::hasColumn('products', 'robots_index')) {
                    $table->boolean('robots_index')->default(true)->after('og_image');
                }
                if (!Schema::hasColumn('products', 'robots_follow')) {
                    $table->boolean('robots_follow')->default(true)->after('robots_index');
                }
            });
        }

        if (Schema::hasTable('blog_posts')) {
            Schema::table('blog_posts', function (Blueprint $table) {
                if (!Schema::hasColumn('blog_posts', 'canonical_url')) {
                    $table->string('canonical_url')->nullable()->after('meta_keywords');
                }
                if (!Schema::hasColumn('blog_posts', 'og_image')) {
                    $table->string('og_image')->nullable()->after('canonical_url');
                }
                if (!Schema::hasColumn('blog_posts', 'robots_index')) {
                    $table->boolean('robots_index')->default(true)->after('og_image');
                }
                if (!Schema::hasColumn('blog_posts', 'robots_follow')) {
                    $table->boolean('robots_follow')->default(true)->after('robots_index');
                }
            });
        }
    }

    public function down(): void
    {
    }
};
