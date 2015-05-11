<?php

use Illuminate\Database\Seeder;
use App\GalleryCategory;

class GalleryCategoriesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('gallery_categories')->delete();

        GalleryCategory::create(array(
                'title' => 'Фотоотчёт 11.05.2015',
            )
        );

        GalleryCategory::create(array(
                'title' => 'Фотоотчёт 12.05.2015',
            )
        );
    }

}