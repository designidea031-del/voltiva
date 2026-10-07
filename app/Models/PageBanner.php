<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_key',
        'page_name',
        'title',
        'subtitle',
        'desktop_image',
        'mobile_image',
        'banner_position',
        'overlay_opacity',
        'button_text',
        'button_link',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'overlay_opacity' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public static function forPage(string $key): ?self
    {
        $aliases = [
            'products' => 'product',
            'product' => 'products',
            'blogs' => 'blog',
            'blog' => 'blogs',
            'product-details' => 'shop-details',
            'shop-details' => 'product-details',
            'home' => 'home',
        ];
        $searchKey = $aliases[$key] ?? $key;

        return static::where(function ($q) use ($key, $searchKey) {
            $q->where('page_key', $key)->orWhere('page_key', $searchKey);
        })->where('is_active', true)->first();
    }

    public function getDesktopImageUrlAttribute(): ?string
    {
        return $this->desktop_image ? asset('storage/' . ltrim($this->desktop_image, '/')) : null;
    }

    public function getMobileImageUrlAttribute(): ?string
    {
        return $this->mobile_image ? asset('storage/' . ltrim($this->mobile_image, '/')) : null;
    }
}
