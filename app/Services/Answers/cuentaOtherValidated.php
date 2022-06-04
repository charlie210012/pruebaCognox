<?php

namespace App\Services\Answers;

use App\Models\Transaction;
use App\Services\Implementations\validationsAnswers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class cuentaOtherValidated implements validationsAnswers
{
    public function outPut($request)
    {
        if(Auth::user()->otherAccounts->where('account_id', $request->account_final)->count() !== 0)
        {
            
          if(Auth::user()->otherAccounts->where('account_id', $request->account_final)->first()->account->status !== "Activa"){
                return response([
                    'status'=>'Error',
                    'mensaje'=>'La cuenta de destino no esta habiliditada'
                ]);
            }
        }
        
    }
}