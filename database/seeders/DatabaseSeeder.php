<?php

namespace Database\Seeders;

use App\Models\Images;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // \App\Models\Images::factory(10)->create([
        //     'url' => "https://api.unsplash.com/photos/random",
        //     'name' => fake()->text()
        // ]);
        // Images::factory(10)->create();
        User::factory(10)->create();
        Images::factory(10)->create();
    }
}
