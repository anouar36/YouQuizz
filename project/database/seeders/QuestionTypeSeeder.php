<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_types')->insert([
            ['type' => 'Multiple Choice'],
            ['type' => 'True/False'],
            ['type' => 'Short Answer'],
        ]);
    }
}
