<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Manufacturer;
use App\Category;
use App\Sertificate;
use App\Order;

class Product extends Model
{
    protected $guarded = [
        '_method',
        '_token'
      ];

    public function manufacturers()
    {
        return $this->belongsToMany(Manufacturer::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
 
    public function sertificates()
    {
        return $this->hasMany(Sertificate::class);
    }
    public function order()
    {
        return $this->hasOne(Order::class, 'product_id');
    }
    
    protected static function boot() {
        parent::boot();

        static::creating(function ($product) {
            $product->alias = Str::slug($product->name);
        });
    }
    
}
