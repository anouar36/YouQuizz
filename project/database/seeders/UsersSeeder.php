<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $admin = Role::where('nameRole','admin')->first();;
        $Candidat = Role::where('nameRole','candidat')->first();;
        $staf = Role::where('nameRole','staf')->first();;
        User::truncate();

       User::create([
        "name"=> "Anouar",
        "email"=> "anouarechcharai@gmail.com",
        "password"=> Hash::make("anwar36flow"),
        "role_id"=> $admin->id,
       ]);

       User::create([
        "name"=> "aya",
        "email"=> "aya@gmail.com",
        "password"=> Hash::make("anwar36flow"),
        "role_id"=> $admin->id,
       ]);

       User::create([
        "name" => "Omar",
        "email" => "omar@gmail.com",
        "password" => Hash::make("omar1234"),
        "role_id" => $staf->id, 
       ]);
    
        User::create([
            "name" => "Fatima",
            "email" => "fatima@gmail.com",
            "password" => Hash::make("fatima5678"),
            "role_id" => $staf->id,
        ]);
        
        User::create([
            "name" => "Youssef",
            "email" => "youssef@gmail.com",
            "password" => Hash::make("youssef91011"),
            "role_id" => $staf->id,
        ]);
        
        User::create([
            "name" => "Salma",
            "email" => "salma@gmail.com",
            "password" => Hash::make("salma1213"),
            "role_id" => $staf->id,
        ]);
    }

}
