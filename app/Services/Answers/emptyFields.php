<?php

namespace App\Services\Answers;

use App\Services\Implementations\validationsAnswers;

class emptyFields implements validationsAnswers
{
    public function outPut($request)
    {
        foreach($request->all() as $item)
        {
            if($item==0 || $item == NULL){
                return response([
                    'status'=>'Error',
                    'mensaje'=>'Hacen falta datos requeridos'
                ]);
            }
        }
        
    }
}