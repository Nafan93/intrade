<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Product;

class Category extends Model
{
    protected $guarded = [
        '_method',
        '_token'
      ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($category) {
            $category->category_alias = Str::slug($category->category_name);

            $category->meta_title = $category->category_name;
        });
    }
}
