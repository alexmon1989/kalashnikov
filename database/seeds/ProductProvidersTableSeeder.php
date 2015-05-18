<?php

use Illuminate\Database\Seeder;
use App\ProductProvider;

class ProductProvidersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('product_categories')->delete();

        ProductProvider::create(array(
                'title' => 'Поставщик 1',
            )
        );

        ProductProvider::create(array(
                'title' => 'Поставщик 2',
            )
        );

        ProductProvider::create(array(
                'title' => 'Поставщик 3',
            )
        );


    }

}