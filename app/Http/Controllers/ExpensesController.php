<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Accounts;
use App\Models\TransactionsIn;
use App\Models\TransactionsOut;
use App\Models\ExpenseCategories;
use App\Models\SubCategories;
use Session;

class ExpensesController extends Controller
{
    public function index ()
    {
        if(Session::has("NewSession")){
            $categories= ExpenseCategories::all();
            foreach($categories as $category){
                $subs= SubCategories::where("expense_category_id", "=", $category->id)->get();
                $category['subs']=$subs;
            }
            return view('pannel.expenses', compact('categories'));
        }
        else{
            return redirect("/login")->with("fail message", "Login to manage your expenses.");
        }        
    }

    public function createCategory(Request $request)
    {
        if(Session::has("NewSession")){
            $request->validate([
                'name'=> 'required'
            ]);

            $newCategory= new ExpenseCategories([
                'name'=> $request->name,
            ]);

            $newCategory->save();
            
            return redirect("/expenses")->with("success message", "Expense Category Added successfully!");
        }
        else{
            return redirect("/login")->with("fail message", "Login to manage your expenses.");
        }
    }

    public function createSubCategory(Request $request)
    {
        if(Session::has("NewSession")){
            $request->validate([
                'categoryId'=>'required',
                'name'=> 'required'
            ]);

            $newSubCategory= new SubCategories([
                'name'=> $request->name,
                'expense_category_id'=> $request->categoryId
            ]);

            $newSubCategory->save();
            
            return redirect("/expenses")->with("success message", "Expense Sub-Category Added successfully!");
        }
        else{
            return redirect("/login")->with("fail message", "Login to manage your expenses.");
        }
    }

    // transactions...

    public function transactions()
    {
        $accounts= Accounts::all();
        foreach($accounts as $account){
            $ins= TransactionsIn::where('account_id', '=', $account->id)->orderByDesc('created_at')->get();
            $outs= TransactionsOut::where('account_id', '=', $account->id)->orderByDesc('created_at')->get();
            foreach($outs as $out){
                $out['category']= SubCategories::where('id','=', $out->sub_category_id)->first();
            }
            $account['ins']=$ins;
            $account['outs']=$outs;
        }
        return view('pannel.transactions', compact('accounts'));
    }

    public function spend()
    {
        if (Session::has("NewSession")){

            
            $accounts= Accounts::all();
            $categories= ExpenseCategories::all();
            foreach($categories as $category){
                $category['subs']=SubCategories::where('expense_category_id', '=', $category->id)->get();
            }
            
            return view('pannel.spend', compact('accounts', 'categories'));
        }
        else
        {
            return redirect('/login')->with("fail message", "Login first to register your expense!");
        }
    }
    public function startSpend()
    {
        if (Session::has("NewSession")){

            $accounts= Accounts::all();

            session()->put("step1", 'start');
            return view('pannel.spend', compact('accounts'));
        }
        else
        {
            return redirect('/login')->with("fail message", "Login first to register your expense!");
        }
    }public function step1(Request $request)
    {
        if (Session::has("NewSession")){

            $request->validate([
                'account_id'=>'required'
            ]);

            $newTransaction=new TransactionsOut([
                'account_id'=>$request->account_id
            ]);
            $newTransaction->save();
            Session::pull("step1");
            session()->put("step2", $newTransaction);

            $categories= ExpenseCategories::all();
            foreach($categories as $category){
                $category['subs']=SubCategories::where('expense_category_id', '=', $category->id)->get();
            }
            return view('pannel.spend', compact('categories'));
        }
        else
        {
            return redirect('/login')->with("fail message", "Login first to register your expense!");
        }
    }
    public function step2(Request $request)
    {
        if (Session::has("NewSession")){

            $request->validate([
                'category'=>'required'
            ]);

            $transaction= TransactionsOut::find(Session::get("step2")->id);
            $transaction['sub_category_id']=$request->category;
            $transaction->save();

            Session::pull("step2");
            session()->put("step3", $transaction);

            return view('pannel.spend');
        }
        else
        {
            return redirect('/login')->with("fail message", "Login first to register your expense!");
        }
    }
    public function finish(Request $request)
    {
        if (Session::has("NewSession")){

            $request->validate([
                'amount'=>'required'
            ]);
            if(Accounts::find(Session::get("step3")->account_id)->balance >= $request->amount){
                
                $transaction= TransactionsOut::find(Session::get("step3")->id);
                $transaction['amount']=$request->amount;
                $transaction->save();

                Session::pull("step3");
                return redirect('/transactions');
            }
            else{
                return back()->with("fail message", "Unsufficient account balance! please consider recharging account balance!");
            }
        }
        else
        {
            return redirect('/login')->with("fail message", "Login first to register your expense!");
        }
    }
}
