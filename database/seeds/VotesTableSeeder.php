<?php

use Illuminate\Database\Seeder;
use App\Vote;
use Illuminate\Support\Facades\Hash;

class VotesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('votes')->delete();

        Vote::create(array(
                'question' => 'Вопрос 1',
                'answers_json' => json_encode(array(
                    array(
                        'answer' => 'Ответ 1',
                        'count' => 5,
                    ),
                    array(
                        'answer' => 'Ответ 2',
                        'count' => 10,
                    ),
                )),
                'hash' => Hash::make(str_random(32)),
                'is_on_main' => TRUE,
            )
        );
    }

}