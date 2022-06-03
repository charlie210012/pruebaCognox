<?php

namespace App\Services\Answers;

use App\Services\Implementations\validationsAnswers;

class equalAccounts implements validationsAnswers
{
    public function outPut($request)
    {
        if($request->account_origin == $request->account_final )
        {
            return response([
                'status'=>'Error',
                'mensaje'=>'La cuenta de origen debe ser diferente a la cuenta destino'
            ]);  
        }
        
    }
}