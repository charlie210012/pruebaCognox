<?php

namespace App\Services;


class validateContract
{
    static public function contracts()
    {
        $contracts = [
            'Valor a trasnferir nulo'=>'nullValue',
            'Cuentas iguales'=>'equalAccounts',
            'Sin saldo' => 'noBalance',
            'Campos vacios'=>'emptyFields',
            'Crear registro validado'=>'createValidated'
        ];
        return $contracts;
    }
}