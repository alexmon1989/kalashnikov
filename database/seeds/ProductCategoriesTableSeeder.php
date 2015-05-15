<?php

use Illuminate\Database\Seeder;
use App\ProductCategory;

class ProductCategoriesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('product_categories')->delete();

        ProductCategory::create(array(
                'title' => 'Мороженое',
                'enabled' => TRUE,
                'file_name' => '1.jpg',
                'description' => 'Мороженое',
            )
        );

        ProductCategory::create(array(
                'title' => 'Пломбир',
                'enabled' => TRUE,
                'file_name' => '2.jpg',
                'description' => 'Пломбир',
                'parent_id' => 1,
            )
        );

        ProductCategory::create(array(
                'title' => 'Сливочное',
                'enabled' => TRUE,
                'file_name' => '3.jpg',
                'description' => 'Сливочное',
                'parent_id' => 1,
            )
        );
    }

}