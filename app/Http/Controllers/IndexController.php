<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu; 
use App\Product;
Use App\Category;
use App\Manufacturer;

class IndexController extends Controller
{
    public function index( Request $request ) 
    {
        //Меню
        $menus = Menu::orderBy('order')->get();
        $menuArr = array();
        
        foreach($menus as $menu) {
            $item = array('id' => $menu->id, 'title' => $menu->name, 'url' => $menu->url);
            array_push($menuArr, $item);
        }
        
        $item = array('id' => '7', 'title' => 'Заказать звонок', 'url' => 'callback', 'order' => '8');
        array_push($menuArr, $item); 
        
        

        $products = Product::select(
            ['id','name','alias','short_desc','product_price','show_on_home'])
            ->where('show_on_home', '1')
            ->get();
       
        return view( 'pages.home', array( 'menuArr' => $menuArr))->with('products', $products);
    }
}