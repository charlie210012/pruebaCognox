<?php

namespace App\Http\Controllers;

use App\Models\account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Services\responseValidation;
use App\Services\validateContract;

class TransactionController extends Controller
{
    public function index()
    {

        $transferencias = $this->consultTransaccion();
        $otherAccounts = account::where('user_id','!=',Auth::user()->id)->get();
        return view('transaction',[
            'otherAccounts'=>$otherAccounts,
            'transferencias'=>$transferencias
        ]);
    }
    

    public function store(Request $request)
    {
        //Esta clase tiene una unica funcion que retorna el array de validaciones que debe cumplir
        //la app antes de generar una transacción mirar archivo app\Services\validateContract.php
        $responseValidations = validateContract::contracts();

        // Estamos instanciando la clase que nos permite hacer la inversion de dependencias
        //mediante una interface revisar app\Services\Implementations\validationsAnswers.php 
        //tambien revisar app\Services\responseValidation.php
        $validation = new responseValidation();

        
        foreach($responseValidations as $responseValidation){
            //Ahora se esta recorriendo los contratos de validacion para instanciar su clase
            $method = '\\App\\Services\\Answers\\'.$responseValidation;

            //Por ultimo solo mostramos un error si estes existe
            //En caso contrario continuará con el proceso 
            if(!empty($validation->response(new $method,$request))){
               return $validation->response(new $method,$request);
            }
        }

        //El principio abierto cerrado dice que toda clase o entidad debe estar abierta 
        //a extension, pero cerrada a modificacion.

        //aplicando este principio si llega a existir una nueva validación solo la añadimos
        //a validateContract y creamos la clase en el directorio Answers con eso este metodo
        // No debera ser tocado nunca mas, cumplienco con el principio abierto - cerrado. 

        $hash = $request->account_origin.Auth::user()->id.$request->value.now();

        $transaction = Transaction::create([
            'account_origin'=> $request->account_origin,
            'user_origin'=>Auth::user()->id,
            'account_final'=>$request->account_final,
            'code'=>Hash::make($hash),
            'user_final'=>Auth::user()->otherAccounts->where('account_id', $request->account_final)->count() == 0?
            Auth::user()->id:
            Auth::user()->otherAccounts->where('account_id', $request->account_final)->first()->user_other_account,
            'value'=>intval(str_replace('.','',$request->value))
        ]);

        if($transaction){
            return response([
                'status'=>'OK',
                'mensaje'=>Auth::user()->otherAccounts->where('account_id', $request->account_final)->count() == 0?
                'La transferencia entre cuentas se realizo sastifactoriamente, codigo de transaccion '.$transaction->code:
                    'La transferencia a cuentas de terceros se realizo sastifactoriamente, codigo de transaccion '.$transaction->code,
            ]);
        }

    }


    public function consultTransaccion()
    {
        $transactions = Transaction::where('user_final',Auth::user()->id)
        ->orWhere('user_origin',Auth::user()->id)->latest()->take(6)->get();

        $collection = [];

        foreach($transactions as  $transaction){
 
         $values = [
             "fecha" => date('Y-m-d H:i:s',strtotime($transaction->created_at)),
             "usuario_origen" => User::find($transaction->user_origin)->name,
             "usuario_destino" => User::find($transaction->user_final)->name,
             "valor" => number_format($transaction->value,'0',',','.'),
             "Tipo_transaccion" => Auth::user()->id == $transaction->user_origin?'Transferiste a':'Te transfirió'
         ];
         array_push($collection, $values);
        }
        return $collection;
    }
}