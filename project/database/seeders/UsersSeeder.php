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
    }

}
