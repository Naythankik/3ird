<?php

namespace Database\Seeders;

use App\Models\Images;
use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(SellersSeeder::class);
        $this->call(ProductsSeeder::class);
    
        Users::factory(30)->create();
        Images::factory(100)->create();
    }
}
