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
        if (Schema::hasTable('blog_posts')) {
            Schema::table('blog_posts', function (Blueprint $table) {
                if (!Schema::hasColumn('blog_posts', 'views')) {
                    $table->unsignedBigInteger('views')->default(0)->after('is_published');
                }
                if (!Schema::hasColumn('blog_posts', 'author_name')) {
                    $table->string('author_name')->nullable()->default('Admin')->after('views');
                }
                if (!Schema::hasColumn('blog_posts', 'image_alt')) {
                    $table->string('image_alt')->nullable()->after('image');
                }
                if (!Schema::hasColumn('blog_posts', 'tags')) {
                    $table->string('tags')->nullable()->after('author_name');
                }
                if (!Schema::hasColumn('blog_posts', 'meta_title')) {
                    $table->string('meta_title')->nullable()->after('tags');
                }
                if (!Schema::hasColumn('blog_posts', 'meta_description')) {
                    $table->text('meta_description')->nullable()->after('meta_title');
                }
                if (!Schema::hasColumn('blog_posts', 'meta_keywords')) {
                    $table->text('meta_keywords')->nullable()->after('meta_description');
                }
                if (!Schema::hasColumn('blog_posts', 'banner_image')) {
                    $table->string('banner_image')->nullable()->after('meta_keywords');
                }
                if (!Schema::hasColumn('blog_posts', 'banner_position')) {
                    $table->string('banner_position')->nullable()->default('center')->after('banner_image');
                }
            });
        }

        if (Schema::hasTable('galleries')) {
            Schema::table('galleries', function (Blueprint $table) {
                if (!Schema::hasColumn('galleries', 'video_source')) {
                    $table->string('video_source')->nullable()->default('url')->after('type');
                }
                if (!Schema::hasColumn('galleries', 'video_file')) {
                    $table->string('video_file')->nullable()->after('video_url');
                }
            });
        }

        if (Schema::hasTable('page_banners')) {
            Schema::table('page_banners', function (Blueprint $table) {
                if (!Schema::hasColumn('page_banners', 'banner_position')) {
                    $table->string('banner_position')->nullable()->default('center')->after('mobile_image');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Safe down
    }
};
