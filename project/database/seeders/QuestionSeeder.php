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
        DB::table('questions')->insert([
            ['question' => 'What is the best PHP framework?','Difficulty'=>'Esye', 'type_id' => 1, 'quizz_id' => 1],
            ['question' => 'Is PHP a server-side language?','Difficulty'=>'Hard', 'type_id' => 2, 'quizz_id' => 1],
        ]);
    }
}
