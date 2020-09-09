<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
      
        DB::table('categories')->truncate();
        Category::create([
            'category_name' => 'Спирты',
            'category_alias' => 'alcohol',
            'category_img' => '',
            'meta_title' => 'Спирты | ООО "Интрейд"',
            'meta_keywords' => 'Спирты, метанол' ,
            'meta_description' => 'Оптовая продажа спирты в ассортименте ООО "Интрейд" '
        ]); 
        Category::create([
            'category_name' => 'Растворители',
            'category_alias' => 'solvent',
            'category_img' => '',
            'meta_title' => 'Растворители | ООО "Интрейд"',
            'meta_keywords' => 'Растворители, метанол' ,
            'meta_description' => 'Оптовая продажа растворители в ассортименте ООО "Интрейд" '
        ]);
        Category::create([
            'category_name' => 'Эфиры',
            'category_alias' => 'esters',
            'category_img' => '',
            'meta_title' => 'Эфиры | ООО "Интрейд"',
            'meta_keywords' => 'Эфиры, метанол' ,
            'meta_description' => 'Оптовая продажа эфиров в ассортименте ООО "Интрейд" '
        ]);
        Category::create([
            'category_name' => 'Топлива',
            'category_alias' => 'fuel',
            'category_img' => '',
            'meta_title' => 'Топлива | ООО "Интрейд"',
            'meta_keywords' => 'Топлива, метанол' ,
            'meta_description' => 'Оптовая продажа топлива в ассортименте ООО "Интрейд" '
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
