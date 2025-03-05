<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RepensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reponses')->insert([
            ['reponse' => 'Laravel', 'question_id' => 5],
            ['reponse' => 'Symfony', 'question_id' => 5],
        ]);
    }
}
