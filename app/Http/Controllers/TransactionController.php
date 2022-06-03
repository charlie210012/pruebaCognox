<?php

namespace App\Http\Controllers;

use App\Models\account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    public function index()
    {
        $otherAccounts = account::where('user_id','!=',Auth::user()->id)->get();
        return view('Transaction',[
            'otherAccounts'=>$otherAccounts
        ]);
    }
    

    public function store(Request $request)
    {
        if($request->account_origin == $request->account_final )
        {
            return response([
                'status'=>'Error',
                'mensaje'=>'La cuenta de origen debe ser diferente a la cuenta destino'
            ]);  
        }
        $response = $this->validation($request);

        if($request->value == 0){
            return response([
                'status'=>'Error',
                'mensaje'=>'El valor a transferir no puede ser menor o igual a cero'
            ]); 
        }
        if((Auth::user()->consolidateds->where('account_id',$request->account_origin)->first()->value) < (intval(str_replace('.','',$request->value))))
        {
            return response([
                'status'=>'Error',
                'mensaje'=>'No tienes saldo suficiente en tu cuenta para realizar la transacción'
            ]);
        }

        if($response)
        {
            return response([
                'status'=>'Error',
                'mensaje'=>'Hacen falta datos requeridos'
            ]);
        };

        
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

    public function validation($request)
    {
        foreach($request->all() as $item)
        {
            if($item==0 || $item == NULL){
                return true;
            }
        }
    }
}