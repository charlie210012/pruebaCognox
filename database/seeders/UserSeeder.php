<?php

namespace Database\Seeders;

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
    }
}
