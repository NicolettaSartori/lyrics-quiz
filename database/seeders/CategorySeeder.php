<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Nicoletta',
            'email' => 'nicoletta.s.s@outlook.com',
            'password' => '$2y$10$xIDWFAq4FtA3r7Iz2GxRe.uXoJM2N24AFCLf9mhnmP1y4IqPbMWbS'
        ]);

        Category::factory()->create([
            'body' => 'Pop',
            'user_id' => 1,
            'path' => Storage::url('pop.jpg')
        ]);

        Category::factory()->create([
            'body' => 'Rap',
            'user_id' => 1,
            'path' => Storage::url('rap.png')
        ]);

        Category::factory()->create([
            'body' => 'Disney',
            'user_id' => 1,
            'path' => Storage::url('disney.jpg')
        ]);

    }
}
