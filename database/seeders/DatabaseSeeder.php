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
        $user = User::factory()->create([
           'name' => 'Teke',
           'email' => 'teke@gmail.com',
           'password' => bcrypt('1234567890'),
        ]);

        // Product
        $products  = Product::factory()
            ->count(20)
            ->create();

        // Stock
        for ($i = 1; $i <= 50; $i++) {
            Stock::factory()
                ->for($user)
                ->for($products->random())
                ->create();
        }


    }
}
