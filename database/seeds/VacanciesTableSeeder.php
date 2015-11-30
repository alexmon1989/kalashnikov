<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Vacancy;

class VacanciesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('vacancies')->truncate();

        Vacancy::create([
            'title'     => 'Грузчик',
            'full_text' => 'Описание вакансии',
            'enabled'   => TRUE,
        ]);

        Vacancy::create([
            'title'     => 'Менеджер',
            'full_text' => 'Описание вакансии',
            'enabled'   => TRUE,
        ]);

        Vacancy::create([
            'title'     => 'Экономист',
            'full_text' => 'Описание вакансии',
            'enabled'   => TRUE,
        ]);
    }

}