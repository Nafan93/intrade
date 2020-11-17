<?php

use Illuminate\Database\Seeder;
use App\Permission;
class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissins')->truncate();
        Permission::create([
            'name' => 'Admin',
            'slug' => 'admin',
        ]); 
       
    }
}