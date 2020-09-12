<?php namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use App\Menu;

class MainNavigationComposer{

    public function compose(View $view)
    {
        //Меню
        $menus = Menu::orderBy('order')->get();
        $menuArr = array();
        
        foreach($menus as $menu) {
            $item = array('id' => $menu->id, 'title' => $menu->name, 'url' => $menu->url);
            array_push($menuArr, $item);
        }
        
        $item = array('id' => '7', 'title' => 'Заказать звонок', 'url' => '#contacts', 'order' => '8');
        array_push($menuArr, $item);
        
        
        $view->with('menusm', $menuArr);
       
    }
}