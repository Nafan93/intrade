<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Manufacturer extends Model
{

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
