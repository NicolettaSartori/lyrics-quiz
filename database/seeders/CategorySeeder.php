<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory(5)->create(['super_category' => null]);
        Category::factory(5)->create();
        Question::factory(5)->create();
        for ($i = 1; $i < 6; $i++) {
            Answer::factory(3)->create(['question_id' => $i]);
            Answer::factory()->create(['question_id' => $i, 'is_true' => true]);
        }
    }
}
