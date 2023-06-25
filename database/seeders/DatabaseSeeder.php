<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Idea;
use App\Models\User;
use App\Models\Vote;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'med',
            'email' => 'memad@gmail.com'
        ]);

        User::factory(19)->create();

        // \App\Models\User::factory(10)->create();
        Category::factory()->create(['name' => 'category 1 ']);
        Category::factory()->create(['name' => 'category 2 ']);
        Category::factory()->create(['name' => 'category 3 ']);
        Category::factory()->create(['name' => 'category 4 ']);



        Status::factory()->create(['name' => 'open', 'classes' => 'bg-gray-200 text-black']);
        Status::factory()->create(['name' => 'considering', 'classes' => 'bg-purple-500 text-white']);
        Status::factory()->create(['name' => 'in progress', 'classes' => 'bg-yellow-500 text-white']);
        Status::factory()->create(['name' => 'implemented', 'classes' => 'bg-green-500 text-white']);
        Status::factory()->create(['name' => 'closed', 'classes' => 'bg-red-500 text-white']);


        Idea::factory(100)->create();


        //generate unique votes ensure idea_id and user_is are unique for each row 
        foreach (range(1, 20) as $user_id) {
            foreach (range(1, 100) as $idea_id) {
                if ($idea_id % 2 == 0) {
                    Vote::factory()->create([
                        'user_id' => $user_id,
                        'idea_id' => $idea_id,
                    ]);
                }
            }
        }
    }
}
