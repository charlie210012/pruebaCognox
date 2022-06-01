<?php

namespace Database\Seeders;

use App\Models\account;
use App\Models\permit;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Carlos Andres Arevalo Cortes',
            'identification'=>1144170160,
            'email'=>'carevalo@cognox.com',
            'password' => Hash::make(2205)
        ]);

        permit::create([
            'user_id'=>1,
            'type'=>1
        ]);

        account::create([
            'type'=>'Ahorro',
            'number'=>89460591512,
            'user_id'=>1,
            'status'=>'Activa'
        ]);
        account::create([
            'type'=>'Corriente',
            'number'=>82033565646,
            'user_id'=>1,
            'status'=>'Activa'
        ]);


    }
}
