<?php

use Illuminate\Database\Seeder;
use App\ProductManufacturer;

class ProductManufacturersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('product_categories')->delete();

        ProductManufacturer::create(array(
                'title' => 'Производитель 1',
            )
        );

        ProductManufacturer::create(array(
                'title' => 'Производитель 2',
            )
        );

        ProductManufacturer::create(array(
                'title' => 'Производитель 3',
            )
        );


    }

}