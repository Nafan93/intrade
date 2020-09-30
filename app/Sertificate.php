<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
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
}
 