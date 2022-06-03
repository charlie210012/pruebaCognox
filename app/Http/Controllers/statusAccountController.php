<?php

namespace App\Http\Controllers;

use App\Models\account;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class statusAccountController extends Controller
{
    public function index()
    {
        return view('status');
    }

    public function report(Request $request)
    {
        //bug encontrado

       $reports = Transaction::where('account_origin',$request->id)
       ->orWhere('account_final',$request->id)->get();

       $collection = [];

       foreach($reports as $report){

        $values = [
            "fecha" => date('Y-m-d H:i:s',strtotime($report->created_at)),
            "cuenta_origen" => account::find($report->account_origin)->number,
            "cuenta_destino" => account::find($report->account_final)->number,
            "valor" => number_format($report->value,'0',',','.'),
            "Tipo_transaccion" => (Auth::user()->otherAccounts->where('account_id', $report->account_final)->count() == 0)?'Transferencia propia':'Transferencia de terceros'
        ];
        array_push($collection, $values);
       }
       return $collection;
    }

}
