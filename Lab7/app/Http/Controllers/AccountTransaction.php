<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountTransaction extends Controller
{
    public function showAccounts() {
        // DB conection shalgah 
        $Accounts = DB::table('account')->get();
        return view("account.Account", ['Accounts' => $Accounts]);
    }
    

    public function doTransaction(Request $request) {
        $inputValidation = $request->validate([
            'AccountNum' => ['bail', 'required', 'numeric'],
            'AccountTo' => ['bail', 'required', 'numeric'],
            'Amount' => ['bail', 'required', 'numeric'],
            'transactionDesc' => ['bail', 'required']
        ]);
        $sender = $request->AccountNum;
        $reciever = $request->AccountTo;
        $amount = $request->Amount;
        $describtion = $request->transactionDesc; 

        // DB::table('test')->insert([
        //     'value' => $sender
        // ]);

        

        return view("account.Transaction", compact('sender'));
    }

}
