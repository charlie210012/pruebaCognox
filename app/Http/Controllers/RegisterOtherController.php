<?php

namespace App\Http\Controllers;

use App\Models\account;
use App\Models\registerOther;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterOtherController extends Controller
{
    public function store(Request $request)
    {
        if($request->account_register == 0){
            return response([
                'status'=>'Error',
                'mensaje'=>'Debes seleccionar una cuenta para matricular'
            ]); 
        }

        $validate = registerOther::where([
            'account_id'=>$request->account_register,
            'user_id'=>Auth::user()->id,
            'user_other_account'=>account::find($request->account_register)->user_id
        ])->first();

        if($validate){
            return response([
                'status'=>'Error',
                'mensaje'=>'La cuenta ya fue inscrita',
            ]);
        }else{
            $register = registerOther::create([
                'account_id'=>$request->account_register,
                'user_id'=>Auth::user()->id,
                'user_other_account'=>account::find($request->account_register)->user_id
            ]);
    
            if($register){
                return response([
                    'status'=>'OK',
                    'mensaje'=>'El registo de la cuenta de terceros fue exitosa',
                ]);
            }
        }

       
    }

    
}
