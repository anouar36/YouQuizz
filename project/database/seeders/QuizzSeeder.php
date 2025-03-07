<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizzSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('quizzs')->insert([
            ['name' => 'PHP Basics','is_active'=>true, 'time' => '00:30:00','Passing_Score'=>'10'],
            ['name' => 'Laravel Fundamentals','is_active'=>false, 'time' => '01:00:00','Passing_Score'=>'10'],
        ]);
    }
}
