<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class AccountTransaction extends Controller
{
    public function showAccounts() {
        // DB conection shalgah 
        $Accounts = DB::table('account')->get();
        return view("account.Account", ['Accounts' => $Accounts]);
    }
    
    public function accountDetails($id) {
        $result = [];
        $transactions = DB::select('SELECT * FROM transaction WHERE transaction_from = ?', [$id]);
        if (empty($transactions)) return view("account.Transaction");
        return view("account.AccountDetails", ["transactions" => $transactions]);
    }

    public function doTransaction(Request $request) {
        $this->validate($request,
        [
            'AccountNum' => 'required|numeric',
            'AccountTo' => 'required|numeric', 
            'Amount' => 'required|numeric', 
            'transactionDesc' => 'required',
        ],
        [
            'AccountNum.required' => 'Дансны дугаар хоосон байж болохгүй',
            'AccountTo.required' => 'Хүлээн авах данс хоосон байж болохгүй',
            'AccountTo.numeric' => 'Хүлээн авах данс зөвхөн тоо байна',
            'AccountNum.numeric' => 'Дансны дугаар зөвхөн тоо байна',
            'Amount.required' => 'Гүйлгээний дүн хоосон байж болохгүй',
            'Amount.numeric' => 'Гүйлгээний дүн зөвхөн тоо байна',
            'transactionDesc.required' => 'Гүйлгээний утга хоосон байж болохгүй'
        ]
        );

        $sender = $request->AccountNum;
        $reciever = $request->AccountTo;
        $amount = $request->Amount;
        $describtion = $request->transactionDesc; 

        $SenderAccountDetails =  DB::select('SELECT * from account WHERE account_number=?', [$sender]);
        $RecieverAccountDetails = DB::select('SELECT * FROM account WHERE account_number=?', [$reciever]);

        $checkSenderAccount =  array_filter($SenderAccountDetails) == [] ? 'Дансны дугаар буруу байна' : null;
        $checkRecieverAccount = array_filter($RecieverAccountDetails)  == [] ? 'Шилжүүлэх дансны дугаар буруу байна' : null;

        if($checkSenderAccount === null && $checkRecieverAccount === null){
           
            if ($SenderAccountDetails[0]->account_balance < $amount) {
                $balance = "Дансны үлдэгдэл хүрэлцэхгүй байна";
                return view('account.Transaction',compact('balance'));
            }
            DB::beginTransaction();
            try{
                DB::table('account')
                   ->where('account_number', $sender)
                   ->update(['account_balance' => $SenderAccountDetails[0]->account_balance - $amount]);
                
                DB::table('account')
                   ->where('account_number', $reciever)
                   ->update(['account_balance' => $RecieverAccountDetails[0]->account_balance + $amount]);
                
                DB::table('transaction')->insert([
                    'transaction_from' => $sender,
                    'transaction_to' => $reciever,
                    'transaction_amount' => $amount,
                    'transaction_description' => $describtion,
                    'created_at' => Carbon::now(),
                ]);
                DB::commit();
            }
            catch(Exception $e) {
                DB::rollback();
            }

            return redirect()->back()->with('success', 'Амжилттай шилжүүлэгдсэн');
        }
        else {
            return view("account.Transaction", ["accountError" => $checkSenderAccount, "recieverError" => $checkRecieverAccount]);
        }
    }

}
 