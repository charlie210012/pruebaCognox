<?php

namespace Database\Seeders;

use App\Models\account;
use App\Models\permit;
use App\Models\Transaction;
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
            'type'=>2
        ]);

        account::create([
            'type'=>'Ahorro',
            'number'=>294605915,
            'user_id'=>1,
            'status'=>'Activa'
        ]);
        account::create([
            'type'=>'Corriente',
            'number'=>203356564,
            'user_id'=>1,
            'status'=>'Activa'
        ]);

        User::create([
            'name'=>'Administrador',
            'identification'=>123456789,
            'email'=>'admin@cognox.com',
            'password' => Hash::make(1234)
        ]);

        permit::create([
            'user_id'=>2,
            'type'=>1
        ]);

        account::create([
            'type'=>'Ahorro',
            'number'=>123456789,
            'user_id'=>2,
            'status'=>'Activa'
        ]);

        Transaction::create([
            'account_origin'=> 3,
            'user_origin'=>2,
            'account_final'=>1,
            'code'=>Hash::make("3.2.50000000".now()),
            'user_final'=>1,
            'value'=>50000000
        ]);
        Transaction::create([
            'account_origin'=> 3,
            'user_origin'=>2,
            'account_final'=>2,
            'code'=>Hash::make("3.2.2000000".now()),
            'user_final'=>1,
            'value'=>2000000
        ]);
    }
}
