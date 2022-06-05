<?php

namespace Database\Seeders;

use App\Models\account;
use App\Models\permit;
use App\Models\registerOther;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class CredencialDosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Ana Valentina Ochoa',
            'identification'=>111245661,
            'email'=>'Aocho@cognox.com',
            'password' => Hash::make(1234)
        ]);

        permit::create([
            'user_id'=>3,
            'type'=>2
        ]);

        account::create([
            'type'=>'Ahorro',
            'number'=>25454555,
            'user_id'=>3,
            'status'=>'Activa'
        ]);
        account::create([
            'type'=>'Corriente',
            'number'=>2245545,
            'user_id'=>3,
            'status'=>'Bloqueada'
        ]);

      
        Transaction::create([
            'account_origin'=> 3,
            'user_origin'=>2,
            'account_final'=>4,
            'code'=>Hash::make("3.2.50000000".now()),
            'user_final'=>3,
            'value'=>4575755
        ]);
        Transaction::create([
            'account_origin'=> 3,
            'user_origin'=>2,
            'account_final'=>5,
            'code'=>Hash::make("3.2.2000000".now()),
            'user_final'=>3,
            'value'=>2000000
        ]);

        registerOther::create([
            'account_id'=>4,
            'user_id'=>2,
            'user_other_account'=>3
        ]);

        registerOther::create([
            'account_id'=>5,
            'user_id'=>2,
            'user_other_account'=>3
        ]);
    }
}
