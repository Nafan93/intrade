<?php

use Illuminate\Database\Seeder;
use App\Menu;
class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->truncate();
        Menu::create([
            'name' => 'Главная',
            'url' => 'home',
            'order' => '1',
        ]); 
        Menu::create([
            'name' => 'О нас',
            'url' => 'about',
            'order' => '2',
        ]); 
        Menu::create([
            'name' => 'Продукция',
            'url' => 'products',
            'order' => '3',
        ]);
        Menu::create([
            'name' => 'Преимущества',
            'url' => 'advantages',
            'order' => '4',
        ]); 
        Menu::create([
            'name' => 'Партнеры',
            'url' => 'partners',
            'order' => '5',
        ]); 
        Menu::create([
            'name' => 'Контакты',
            'url' => 'contacts',
            'order' => '6',
        ]); 
    }
}