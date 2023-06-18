<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // \App\Models\User::factory(10)->create();
        \App\Models\Category::factory()->create(['name'=>'category 1 ']);
        \App\Models\Category::factory()->create(['name'=>'category 2 ']);
        \App\Models\Category::factory()->create(['name'=>'category 3 ']);
        \App\Models\Category::factory()->create(['name'=>'category 4 ']);



        \App\Models\Status::factory()->create(['name'=>'open','classes'=>'bg-gray-200 text-black']);
        \App\Models\Status::factory()->create(['name'=>'considering','classes'=>'bg-purple-500 text-white']);
        \App\Models\Status::factory()->create(['name'=>'in progress','classes'=>'bg-yellow-500 text-white']);
        \App\Models\Status::factory()->create(['name'=>'implemented','classes'=>'bg-green-500 text-white']);
        \App\Models\Status::factory()->create(['name'=>'closed','classes'=>'bg-red-500 text-white']);

        
        \App\Models\Idea::factory(30)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
