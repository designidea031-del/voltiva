<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'products';

    protected $fillable = [
        'title',
        'code',
        'description',
        'size',
        'price',
        'pkd',
        'image',
        'category_id',
        'sub_category_id',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'og_image',
        'robots_index',
        'robots_follow',
    ];

    protected $casts = [
        'robots_index' => 'boolean',
        'robots_follow' => 'boolean',
    ];

    public function getSeoScoreAttribute(): int
    {
        $score = 0;
        $title = $this->meta_title ?: $this->title;
        $titleLen = mb_strlen($title ?? '');
        if ($titleLen >= 30 && $titleLen <= 65) {
            $score += 35;
        } elseif ($titleLen > 0) {
            $score += 20;
        }

        $desc = $this->meta_description ?: strip_tags($this->description ?? '');
        $descLen = mb_strlen($desc ?? '');
        if ($descLen >= 80 && $descLen <= 165) {
            $score += 35;
        } elseif ($descLen > 0) {
            $score += 20;
        }

        if (!empty($this->og_image) || !empty($this->image)) {
            $score += 15;
        }
        if (!empty($this->meta_keywords)) {
            $score += 15;
        }

        return min(100, max(20, $score));
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
