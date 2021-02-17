<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = new User;
        $user->name = 'Teke';
        $user->username = 'teketeke';
        $user->email = 'teke@gmail.com';
        $user->password = bcrypt('1234567890');
        $user->save();

        $profile = new Profile;
        $profile->user_id = 1;
        $profile->description = 'Hola, esto es una descripcion';
        $profile->url = 'google.com';
        $profile->save();

    }
}
