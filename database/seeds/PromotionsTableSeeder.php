<?php

use Illuminate\Database\Seeder;
use App\Promotion;

class PromotionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotions')->truncate();

        Promotion::create(array(
                'title' => 'Новая акция на макароны',
                'full_text' => 'Приобритите макароны со скидкой 95%.',
                'preview_text' => 'Скидка 95% на макароны.',
                'thumbnail' => '1.jpg',
                'enabled' => TRUE,
            )
        );
    }
}
