<?php

use Illuminate\Database\Seeder;
use App\Slider;

class SlidersImagesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('sliders')->delete();

        Slider::create(array(
                'title' => 'Cвяжитесь с нами любым удобным способом',
                'description_1' => 'Звоните, пишите,',
                'description_2' => 'мы быстро ответим на любой вопрос',
                'file_name' => '1.jpg',
                'url' => 'http://localhost/kalashnikov/public/contacts',
                'btn_text' => 'Узнать подробнее',
                'order' => 1,
            )
        );

        Slider::create(array(
                'title' => 'Скидки на макароны и мучную продукцию',
                'description_1' => 'Только в мае! Специальные 20% скидки',
                'description_2' => 'на макароны ведущих производителей',
                'file_name' => '2.jpg',
                'url' => 'http://localhost/kalashnikov/public/news/show/4',
                'btn_text' => 'Узнать подробнее',
                'order' => 2,
            )
        );
    }

}