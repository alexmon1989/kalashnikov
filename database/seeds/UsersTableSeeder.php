<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->truncate();

        User::create(array(
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin1234'),
            )
        );
    }

}