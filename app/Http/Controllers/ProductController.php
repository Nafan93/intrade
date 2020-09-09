<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Menu;
use Illuminate\Http\Request;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function catalog()
    {
        $menus = Menu::orderBy('order')->get();
        $menuArr = array();
       
        foreach($menus as $menu) {
            $item = array('id' => $menu->id, 'title' => $menu->name, 'url' => $menu->url);
            array_push($menuArr, $item);
        }

        $item = array('id' => '7', 'title' => 'Заказать звонок', 'url' => 'callback', 'order' => '7');
        array_push($menuArr, $item); 

        $products = Product::all();
        return view ('pages.catalog', array( 'menuArr' => $menuArr))->with('products', $products);
    }
    public function show($url)
    {
        $product = Product::select(['id','name','alias','desc','product_price'])->where('alias', $url)->first();
        
        return view ('pages.showproduct')->with('product', $product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    /*public function show()
    {
        //
    }
    */  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
