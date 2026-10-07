<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'blog_category_id', 'title', 'slug', 'excerpt', 'content', 'image', 'image_alt',
        'is_published', 'published_at', 'views', 'author_name', 'tags',
        'meta_title', 'meta_description', 'meta_keywords', 'banner_image', 'banner_position',
        'canonical_url', 'og_image', 'robots_index', 'robots_follow'
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'robots_index' => 'boolean',
        'robots_follow' => 'boolean',
        'published_at' => 'datetime',
        'views' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function getReadTimeAttribute(): string
    {
        $words = str_word_count(strip_tags($this->content ?? ''));
        $minutes = max(1, ceil($words / 200));
        return $minutes . ' min read';
    }

    public function getSeoScoreAttribute(): int
    {
        $score = 0;
        $titleLen = strlen($this->title ?? '');
        if ($titleLen >= 30 && $titleLen <= 75) $score += 20;
        elseif ($titleLen > 0) $score += 10;

        if (!empty($this->slug)) $score += 15;

        $metaTitleLen = strlen($this->meta_title ?? '');
        if ($metaTitleLen >= 40 && $metaTitleLen <= 65) $score += 15;
        elseif ($metaTitleLen > 0 || $titleLen > 0) $score += 10;

        $descLen = strlen($this->meta_description ?? '');
        if ($descLen >= 110 && $descLen <= 165) $score += 20;
        elseif ($descLen > 0 || !empty($this->excerpt)) $score += 10;

        $wordCount = str_word_count(strip_tags($this->content ?? ''));
        if ($wordCount >= 200) $score += 15;
        elseif ($wordCount > 40) $score += 8;

        if (!empty($this->image)) {
            $score += 10;
            if (!empty($this->image_alt)) $score += 5;
        }

        return min(100, max(30, $score));
    }
}

