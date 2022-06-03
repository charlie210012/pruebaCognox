<?php

namespace App\Services\Answers;

use App\Services\Implementations\validationsAnswers;
use Illuminate\Support\Facades\Auth;

class noBalance implements validationsAnswers
{
    public function outPut($request)
    {
         if((Auth::user()->consolidateds->where('account_id',$request->account_origin)->first()->value) < (intval(str_replace('.','',$request->value))))
        {
            return response([
                'status'=>'Error',
                'mensaje'=>'No tienes saldo suficiente en tu cuenta para realizar la transacción'
            ]);
        }
    }
}