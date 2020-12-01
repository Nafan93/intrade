<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Product;

class Sertificate extends Model
{
    protected $guarded = [
        '_method',
        '_token'
      ];
      
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id' , 'id');
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($sertificate) {
            $sertificate->slug = Str::slug($sertificate->title);
        });
    }
}
 