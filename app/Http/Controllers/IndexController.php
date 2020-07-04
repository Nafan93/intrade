<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu; 

class IndexController extends Controller
{
    //

    public function index( Request $request ) 
    {

        $menus = Menu::all();

        $menuArr = array();

        $item = array('id' => '8', 'title' => 'Главная', 'url' => 'home');
        array_push($menuArr, $item);

        foreach($menus as $menu) {
            $item = array('id' => $menu->id, 'title' => $menu->name, 'url' => $menu->url);
            array_push($menuArr, $item);
        }

        $item = array('id' => '7', 'title' => 'Заказать звонок', 'url' => 'callback');
        array_push($menuArr, $item);
        
        return view( 'home', array( 'menuArr' => $menuArr ) );

    }
}
