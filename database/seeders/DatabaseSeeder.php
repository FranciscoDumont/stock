<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Stock;
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

        // User
        $user = new User;
        $user->name = 'Teke';
//        $user->username = 'teketeke';
        $user->email = 'teke@gmail.com';
        $user->password = bcrypt('1234567890');
        $user->save();

        // Product
        $product = new Product();
        $product->name = 'Hola';
        $product->save();

        // Stock
        $stock = new Stock();
        $stock->stock = 2;
        $stock->user()->associate($user);
        $stock->product()->associate($product);
        $stock->save();

        // Todo
        // Hacer unos seeders piolas con factory

    }
}
