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
    
    public function calculTransaction(Request $request) {
        // get data from database
        
        $AccountNumber = $request->input('AccountNum');
        return view("account.Transaction", ["acc" => $AccountNumber]);
    }

    public function makeTransaction() {
        return view("account.Transaction");
    }
}
