<?php

namespace App\Services\Answers;

use App\Services\Implementations\validationsAnswers;

class nullValue implements validationsAnswers
{
    public function outPut($request)
    {
        if($request->value == 0){
                return response([
                    'status'=>'Error',
                    'mensaje'=>'El valor a transferir no puede ser menor o igual a cero'
                ]); 
            }
        
    }
}