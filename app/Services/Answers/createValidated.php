<?php

namespace App\Services\Answers;

use App\Models\Transaction;
use App\Services\Implementations\validationsAnswers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class createValidated implements validationsAnswers
{
    public function outPut($request)
    {
        if(Auth::user()->otherAccounts->where('account_id', $request->account_final)->count() == 0)
        {
            $hash = $request->account_origin.Auth::user()->id.$request->value.now();

            $transaction = Transaction::create([
                'account_origin'=> $request->account_origin,
                'user_origin'=>Auth::user()->id,
                'account_final'=>$request->account_final,
                'code'=>Hash::make($hash),
                'user_final'=>Auth::user()->id,
                'value'=>intval(str_replace('.','',$request->value))
            ]);
        }else{

            if(Auth::user()->otherAccounts->where('account_id', $request->account_final)->first()->account->status !== "Activa"){
                return response([
                    'status'=>'Error',
                    'mensaje'=>'La cuenta de destino no esta habiliditada'
                ]);
            }

            $hash = $request->account_origin.Auth::user()->id.$request->value.now();

            $transaction = Transaction::create([
                'account_origin'=> $request->account_origin,
                'user_origin'=>Auth::user()->id,
                'account_final'=>$request->account_final,
                'code'=>Hash::make($hash),
                'user_final'=>Auth::user()->otherAccounts->where('account_id', $request->account_final)->first()->user_other_account,
                'value'=>intval(str_replace('.','',$request->value))
            ]);
        }
        
        if($transaction){
            return response([
                'status'=>'OK',
                'mensaje'=>'La transferencia entre cuentas se realizo sastifactoriamente, codigo de transaccion '.$transaction->code,
            ]);
        }
        
    }
}