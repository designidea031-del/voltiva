<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'image',
        'description',
        'meta_title',
        'meta_description',
        'parent_id',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function listings()
    {
        return $this->hasMany(Product::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
