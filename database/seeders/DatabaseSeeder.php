<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\Tag::factory(10)->create();
        // \App\Models\Admin::factory(10)->create();
        // \App\Models\Brand::factory(10)->create();
        \App\Models\Influencer::factory(200)->create();
        // \App\Models\Campaign::factory(100)->create();
        // \App\Models\Slugs::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
