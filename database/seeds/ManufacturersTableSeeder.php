<?php

use Illuminate\Database\Seeder;
use App\Manufacturer;

class ManufacturersTableSeeder extends Seeder
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

        DB::table('manufacturers')->truncate();
        Manufacturer::create([

            'name' => 'Невиномысский азот',
            'desc' => '',
            'site' => '',
            'meta_title' => '',
            'meta_keywords' => '' ,
            'meta_description' => ''
        ]); 
        Manufacturer::create([
            
            'name' => 'Новокуйбышевская нефтехимическая компания',
            'desc' => '',
            'site' => '',
            'meta_title' => '',
            'meta_keywords' => '' ,
            'meta_description' => ''
        ]); 
        Manufacturer::create([
            
            'name' => 'Уфаоргсинтез',
            'desc' => '',
            'site' => '',
            'meta_title' => '',
            'meta_keywords' => '' ,
            'meta_description' => ''
        ]); 

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
