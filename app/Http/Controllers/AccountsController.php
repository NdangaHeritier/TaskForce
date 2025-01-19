<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounts;
use App\Models\TransactionsIn;
use App\Models\TransactionsOut;
use Session;

class AccountsController extends Controller
{
    public function all()
    {
        if(Session::has("NewSession"))
        {
            $accounts= Accounts::all();
            foreach($accounts as $account){
                $ins= TransactionsIn::where("account_id", "=", $account->id)->count();
                $outs= TransactionsOut::where("account_id", "=", $account->id)->count();
                $total_transactions= $ins+$outs;

                $account['transactions']=$total_transactions;
            }
            return view("pannel.accounts", compact('accounts'));
        }
        else{
            return redirect("/login")->with("fail message", "Login to access your account!");
        }
    }

    public function addAccount(Request $request)
    {
        $request->validate([
            'type'=>'required',
            'title'=>'required'
        ]);
        if (Session::has("NewSession")){
            $newAccount= new Accounts([
                'type'=> $request->type,
                'title'=> $request->title,
                'balance'=>0
            ]);
            $newAccount->save();
            return redirect("/accounts")->with("success message", "Account Added Successfully!");
        }
        else{
            return redirect("/login")->with("fail message", "Login to add your new account!");
        }
    }


    // recharge the account balance...

    public function rechargeAccount(Request $request)
    {
        $request->validate([
            'account_id'=>'required',
            'amount'=>'required'
        ]);
        if (Session::has("NewSession")){

            $account= Accounts::find($request->account_id);

            $newAmount=$account['balance'] + intval($request->amount);
            $account['balance']= $newAmount;
            $account->save();

            $trans= new TransactionsIn([
                'amount'=>$request->amount,
                'account_id'=>$request->account_id
            ]);
            $trans->save();

            return back()->with("success message", "Account recharged successfully with amount $newAmount.");
        }
        else{
            return redirect("/login")->with("fail message", "Login to add your new account!");
        }
    }
}
