<?php

use Illuminate\Database\Seeder;
use App\GalleryImage;

class GalleryImagesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('gallery_images')->delete();

        GalleryImage::create(array(
                'category_id' => 1,
                'description' => 'Фотоотчёт 11.05.2015',
                'is_on_main' => TRUE,
                'file_name' => '1.jpg'
            )
        );
    }

}