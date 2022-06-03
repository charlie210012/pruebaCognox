<?php

namespace Database\Seeders;

use App\Models\account;
use App\Models\permit;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class CredencialTresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Otro fulano',
            'identification'=>13533556,
            'email'=>'fulano@cognox.com',
            'password' => Hash::make(1234)
        ]);

        permit::create([
            'user_id'=>4,
            'type'=>2
        ]);
    }
}
