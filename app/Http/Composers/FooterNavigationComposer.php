<?php namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use App\Menu;

class FooterNavigationComposer {

    public function compose(View $view) {

        $view->with('menusf', Menu::orderBy('order')->get());
       
    }
}
