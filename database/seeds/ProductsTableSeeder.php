<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
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

        DB::table('products')->truncate();
        Product::create([
            'name' => 'Метилацетат',
            'alias' => 'methylacetate',
            'image' => '',
            'description' => 'применяется как заменитель ацетона, в органическом синтезе, 
                            производстве красок, а также в качестве растворителя. Представляет 
                            собой прозрачную жидкость, растворимую в воде. Со спиртом и эфиром 
                            смешивается в любых соотношениях.',
            'show_on_home' => true,
            'product_price' => '38000',
            'meta_title' => 'Метилацетат',
            'meta_keywords' => 'Метилацетат опт, купить метилацетат' ,
            'meta_description' => 'ООО "Интрейд" реализует метилацетат'
        ]);
        Product::create([
            'name' => 'Ацетон',
            'alias' => 'acetone',
            'image' => '',
            'description' => '
                            Бесцветная легкоподвижная летучая жидкость с характерным запахом. 
                            Полностью смешивается с водой и большинством органических растворителей. 
                            Ацетон - хороший растворитель вещества. Прекурсор. Применяется в 
                            лакокрасочной промышленности, используется при производстве пластмасс, 
                            синтетического каучука и химических волокон, служит сырьем для синтеза 
                            многих других органических продуктов.',
            'show_on_home' => true,
            'product_price' => '23000',
            'meta_title' => 'Ацетон',
            'meta_keywords' => 'Ацетон опт, купить ацетон' ,
            'meta_description' => 'ООО "Интрейд" реализует ацетон'
        ]);
        Product::create([
            'name' => 'Бутилацетат',
            'alias' => 'butylacetate',
            'image' => '',
            'description' => '
                            Эфир нормальный бутиловый уксусной кислоты С6Н12О12.
                            Предназначен для использования в качестве растворителя в различных отраслях 
                            промышленности, а также для синтеза химических продуктов.',
            'show_on_home' => false,
            'product_price' => '86000',
            'meta_title' => 'Бутилацетат',
            'meta_keywords' => 'Бутилацетат опт, купить бутилацетат' ,
            'meta_description' => 'ООО "Интрейд" реализует бутилацетат'
        ]); 

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
