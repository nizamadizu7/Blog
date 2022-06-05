<?php

namespace Database\Seeders;

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
        \App\Models\Category::create([
            'name' => 'News',
            'slug' => 'news',
        ]);
        \App\Models\Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);
        \App\Models\Category::create([
            'name' => 'Branding',
            'slug' => 'branding',
        ]);
        \App\Models\Post::factory(10)->create();
    }
}
