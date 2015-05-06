<?php

use Illuminate\Database\Seeder;
use App\News;

class NewsTableSeeder extends Seeder {

    public function run()
    {
        DB::table('news')->truncate();

        News::create(array(
                'title' => 'Мы обновили наш сайт',
                'full_text' => 'Завершились работы по редизайну сайта ИП Калашников.',
                'preview_text_small' => 'Завершились работы по редизайну сайта ИП Калашников.',
                'preview_text_mid' => 'Завершились работы по редизайну сайта ИП Калашников.',
                'thumbnail' => 'news-1.jpg',
                'is_on_main' => TRUE,
            )
        );

        News::create(array(
                'title' => 'Совместная промо-акция с магазинами «Магнит»',
                'full_text' => 'Получите скидку на молочную продукцию в магазинах сети «Магнит», предъявив карту покупателя ИП Калашников.',
                'preview_text_small' => 'Получите скидку на молочную продукцию в магазинах сети «Магнит».',
                'preview_text_mid' => 'Получите скидку на молочную продукцию в магазинах сети «Магнит».',
                'thumbnail' => 'news-2.jpg',
                'is_on_main' => TRUE,
            )
        );

        News::create(array(
                'title' => 'Открыта вакансия экономиста',
                'full_text' => 'Компании ИП Калашников требуется опытный экономист. Присылайте свои резюме.',
                'preview_text_small' => 'Компании ИП Калашников требуется опытный экономист.',
                'preview_text_mid' => 'Компании ИП Калашников требуется опытный экономист.',
                'thumbnail' => 'news-3.jpg',
                'is_on_main' => TRUE,
            )
        );

        News::create(array(
                'title' => 'В ассортименте компании появилась паста фирмы Bellisimo',
                'full_text' => 'ИП Калашников эксклюзивно поставляет итальянские макароны высочайшего качества от компании Bellisimo.',
                'preview_text_small' => 'ИП Калашников эксклюзивно поставляет макароны Bellisimo.',
                'preview_text_mid' => 'ИП Калашников эксклюзивно поставляет макароны Bellisimo.',
                'thumbnail' => 'news-4.jpg',
                'is_on_main' => TRUE,
            )
        );
    }

}