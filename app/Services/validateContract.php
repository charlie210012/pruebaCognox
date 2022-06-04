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
            'Cuenta de terceros no habilitada'=>'cuentaOtherValidated', 
        ];
        return $contracts;
    }
}