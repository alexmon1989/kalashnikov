<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('products')->delete();

        Product::create(array(
                'title' => 'Три медведя',
                'description' => 'Мороженое "Три медведя". Очень вкусное.',
                'category_id' => 5,
                'manufacturer_id' => 1,
                'provider_id' => 1,
                'packing' => 'Обычная упаковка',
                'weight' => '1 кг',
                'enabled' => TRUE,
            )
        );

        Product::create(array(
                'title' => 'Три медведя 2',
                'description' => 'Мороженое "Три медведя 2". Очень вкусное.',
                'category_id' => 5,
                'manufacturer_id' => 1,
                'provider_id' => 1,
                'packing' => 'Обычная упаковка',
                'weight' => '1 кг',
                'enabled' => TRUE,
            )
        );

    }

}