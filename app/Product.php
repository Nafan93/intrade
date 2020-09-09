<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Manufacturer;
use App\Category;

class Product extends Model
{

    public function manufacturers()
    {
        return $this->belongsToMany(Manufacturer::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    
   
}
