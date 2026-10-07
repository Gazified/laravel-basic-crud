<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'apple',
            'qty' => 2,
            'price' => 5.00,
            'description' => 'fgdfg',
        ]);

        Product::create([
            'name' => 'apple',
            'qty' => 2,
            'price' => 3.00,
            'description' => 'adsfdsa',
        ]);

        Product::create([
            'name' => 'apple',
            'qty' => 2,
            'price' => 5.00,
            'description' => 'asdfasd',
        ]);
    }
}
