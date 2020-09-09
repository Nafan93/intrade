<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call('MenuTableSeeder');
        $this->call('ProductsTableSeeder');
        $this->call('CategoriesTableSeeder');
        $this->call('ManufacturersTableSeeder');
    }
}
