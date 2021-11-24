<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountTransaction extends Controller
{
    public function showAccounts() {
        return view("account.Account");
    }
    
    public function showTransaction() {
        // all transaction

    }

    public function makeTransaction() {
        return view("account.Transaction");
    }
}
