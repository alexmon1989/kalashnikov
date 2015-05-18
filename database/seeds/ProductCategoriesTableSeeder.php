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
                'file_name' => 'o0cJXohgMd.jpg',
                'description' => 'Мороженое',
            )
        );

        ProductCategory::create(array(
                'title' => 'Макароны',
                'enabled' => TRUE,
                'file_name' => 'gNcXpdyEFp.jpg',
                'description' => 'Макароны',
            )
        );

        ProductCategory::create(array(
                'title' => 'Чай',
                'enabled' => TRUE,
                'file_name' => 'b2fbr4B4bI.jpg',
                'description' => 'Чай',
            )
        );

        ProductCategory::create(array(
                'title' => 'Консервы',
                'enabled' => TRUE,
                'file_name' => 'nCTVgpUSJI.jpg',
                'description' => 'Консервы',
            )
        );


    }

}