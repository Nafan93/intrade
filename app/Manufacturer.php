<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Product;
use App\Category;

class Manufacturer extends Model
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

        static::creating(function ($manufacturer) {
            $manufacturer->manufacturer_alias = Str::slug($manufacturer->name);

            $manufacturer->meta_title = $manufacturer->name;
        });
    }
}
