<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role ;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
       

        Role::insert([
            'nameRole' => 'admin',
        ]);
        Role::insert([
            'nameRole' => 'candidat',
        ]);
        
        // Role::create([
        //     "user_id" => $admin->id,
        //     "nameRole"=> "admin",
        // ]);

        // Role::create([
        //     "user_id" => $Candidat->id,
        //     "nameRole"=> "Candidat",
        // ]);
    }
}
