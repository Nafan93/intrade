<?php

namespace App;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [
        '_method',
        '_token'
      ];

      public function product()
      {
          return $this->belongsTo(Product::class);
      }
}
