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
         Users::factory(1)->create();
        Images::factory(400)->create();
    }
}
