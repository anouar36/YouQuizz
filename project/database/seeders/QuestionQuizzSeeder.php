<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\DB; 
use Illuminate\Database\Seeder;

class QuestionQuizzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_quizz')->insert([
            ['question_id' => 5, 'quizz_id' => 3],
            ['question_id' => 6, 'quizz_id' => 3],
        ]);
    }
}
