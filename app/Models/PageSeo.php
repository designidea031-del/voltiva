<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageSeo extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_key',
        'page_name',
        'route_path',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'canonical_url',
        'og_image',
        'og_title',
        'og_description',
        'robots_index',
        'robots_follow',
        'schema_markup',
        'schema_type',
        'seo_score',
    ];

    protected $casts = [
        'robots_index' => 'boolean',
        'robots_follow' => 'boolean',
        'seo_score' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public static function forPage(string $key): ?self
    {
        return static::where('page_key', $key)->first();
    }

    public function calculateSeoScore(): int
    {
        $score = 0;
        
        // Title check (10-60 chars)
        $titleLen = mb_strlen($this->meta_title ?? '');
        if ($titleLen >= 30 && $titleLen <= 60) {
            $score += 30;
        } elseif ($titleLen > 0) {
            $score += 15;
        }

        // Description check (70-160 chars)
        $descLen = mb_strlen($this->meta_description ?? '');
        if ($descLen >= 100 && $descLen <= 160) {
            $score += 35;
        } elseif ($descLen > 0) {
            $score += 20;
        }

        // Keywords or OG image
        if (!empty($this->og_image)) {
            $score += 15;
        }
        if (!empty($this->canonical_url)) {
            $score += 10;
        }
        if ($this->robots_index) {
            $score += 10;
        }

        return min(100, $score);
    }
}
