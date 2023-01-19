<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\Transaction;
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
        Product::factory(30)->create();
        Transaction::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Administrator',
            'username' => 'admin',
            'password' => bcrypt('12345678'),
        ]);
    }
}
