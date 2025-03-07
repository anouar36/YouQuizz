<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;



class StatuStafsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statu_stafs')->insert([
            [
                'disponibilite' => true,
                'jour' => Carbon::now()->toDateString(),  
                'event_date_debut' => Carbon::now()->format('Y-m-d H:i:s'),  
                'event_date_fin' => Carbon::now()->addHour()->format('Y-m-d H:i:s'),  
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'disponibilite' => false,
                'jour' => Carbon::now()->addDays(1)->toDateString(),  
                'event_date_debut' => Carbon::now()->addDays(1)->format('Y-m-d H:i:s'),
                'event_date_fin' => Carbon::now()->addDays(1)->addHour()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'disponibilite' => false,
                'jour' => Carbon::now()->addDays(3)->toDateString(),
                'event_date_debut' => Carbon::now()->addDays(3)->format('Y-m-d H:i:s'),
                'event_date_fin' => Carbon::now()->addDays(3)->addHour()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'disponibilite' => false,
                'jour' => Carbon::now()->addDays(4)->toDateString(),
                'event_date_debut' => Carbon::now()->addDays(4)->format('Y-m-d H:i:s'),
                'event_date_fin' => Carbon::now()->addDays(4)->addHour()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'disponibilite' => false,
                'jour' => Carbon::now()->addDays(5)->toDateString(),
                'event_date_debut' => Carbon::now()->addDays(5)->format('Y-m-d H:i:s'),
                'event_date_fin' => Carbon::now()->addDays(5)->addHour()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            
        ]);
    }
}
