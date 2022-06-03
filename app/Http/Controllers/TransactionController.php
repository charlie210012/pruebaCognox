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
        $responseValidations = validateContract::contracts();

        $validation = new responseValidation();

        foreach($responseValidations as $responseValidation){

            $method = '\\App\\Services\\Answers\\'.$responseValidation;

            if(!empty($validation->response(new $method,$request)))
            {
                return $validation->response(new $method,$request);
            }
            

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