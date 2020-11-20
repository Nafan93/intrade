<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SitemapController extends Controller
{
    public function sitemap() {
        $products = Product::get();
        return view('layouts.sitemap')->with(compact('products'));
    }
}
