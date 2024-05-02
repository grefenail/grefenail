<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'question_prompt' => 'Tell us about yourself and why are you interested in adopting a pet?',
            ],
            [
                'question_prompt' => 'Have you previously owned pets and if yes, what pets and how long did you have them?',
            ],
            [
                'question_prompt' => 'How much time can you spend with the pet each day and are you prepared to financially support the pet? This includes food, vet care, and other expenses.',
            ],
            [
                'question_prompt' => 'Are you prepared to handle pet-related messes and potential behavioral problems?',
            ],
            [
                'question_prompt' => 'Describe a situation where you might need to leave your pet home alone. How long would you be gone and how would you ensure the pet\'s well-being?',
            ],
        ];

        // Insert questions into the database
        DB::table('questions')->insert($questions);
    }
}
