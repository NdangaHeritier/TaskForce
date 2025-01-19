<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Accounts;
use App\Models\TransactionsIn;
use App\Models\TransactionsOut;
use App\Models\ExpenseCategories;
use App\Models\SubCategories;
use Hash;
use Session;

class AuthController extends Controller
{

    // public function createUser () 
    // {
    //     $newUser= new User([
    //         'name'=> 'Eric',
    //         'email' => 'eric23@coa.com',
    //         'password'=> 'erci@budgeterX10'
    //     ]);
    //     $newUser->save();
    //     return redirect("/login")->with('success message', "user created successfully!");
    // }

    public function login ()
    {
        if (Session::has("NewSession"))
        {
            return redirect('/dashboard')->with('success message', "You're allset. Start Manage your Expenses!");
        }
        else{            
            return view ("login");
        }
    }
    public function verifyLogin (Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        $user= User::where('email', '=', $request->email)->first();

        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put("NewSession", $user);
                return redirect("/dashboard")->with("success message", "Signed in Successfully");
            }
            else{
                return back()->with("fail message", "Incorrect Password!");
            }
        }
        else{
            return back()->with("fail message", "Incorrect Email!");
        }
    }

    // Dashboard

    public function dashboard () {
        if (Session::has("NewSession"))
        {
            $accounts= Accounts::all()->count();
            $balance= Accounts::all()->sum('balance');
            $ins=TransactionsIn::all()->count();
            $outs=TransactionsOut::all()->count();
            $transactions=$ins+$outs;
            $expenses= TransactionsOut::all()->sum('amount');

            $savings= $balance-$expenses;
            return view('pannel.default', compact('accounts', 'balance', 'transactions', 'expenses', 'savings'));
        }
        else{
            return redirect('/login')->with('fail message', 'login first!');
        }
    }

    public function logout()
    {
        if(Session::has("NewSession")){
            Session::pull("NewSession");
            return redirect("/");
        }
        else{
            return redirect('/login')->with("fail message", "Activate Your Session!");
        }
    }
}
