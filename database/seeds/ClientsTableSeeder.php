<?php

use Illuminate\Database\Seeder;
use App\Client;

class ClientsImagesTableSeeder extends Seeder {

    public function run()
    {
        DB::table('clients')->delete();

        $clients = ['Магнит', 'Забава', 'Стэйтон', 'Лента', 'Ашан', 'Метро', "О'кей", 'Пятёрочка'];

        foreach ($clients as $key => $value)
        {
            Client::create(array(
                    'title' => $value,
                    'file_name' => ($key+1).'.jpg',
                    'enabled' => 1,
                )
            );
        }
    }

}