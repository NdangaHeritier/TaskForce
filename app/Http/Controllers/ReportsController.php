<?php

namespace App\Http\Controllers;
use App\Models\Accounts;
use App\Models\TransactionsIn;
use App\Models\TransactionsOut;
use App\Models\ExpenseCategories;
use App\Models\SubCategories;
use App\Models\BudgetLimit;
use Carbon\Carbon;
use Session;

use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index ()
    {

        if (Session::has("NewSession"))
        {
            $Dairly_in=TransactionsIn::whereDate('created_at', Carbon::today())
            ->get();
            $Dairly_out=TransactionsOut::whereDate('created_at', Carbon::today())
            ->get();

            $Weekly_in=TransactionsIn::whereBetween('created_at', [Carbon::now()->startOfWeek()->toDateTimeString(), Carbon::now()->endOfWeek()->toDateTimeString()])
            ->get();
            $Weekly_out=TransactionsOut::whereBetween('created_at', [Carbon::now()->startOfWeek()->toDateTimeString(), Carbon::now()->endOfWeek()->toDateTimeString()])
            ->get();

            $Monthly_in=TransactionsIn::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->get();
            $Monthly_out=TransactionsOut::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->get();

            $Yearly_in=TransactionsIn::whereYear('created_at', Carbon::now()->year)
            ->get();
            $Yearly_out=TransactionsOut::whereYear('created_at', Carbon::now()->year)
            ->get();

            //Add Parent tables details..
            foreach($Dairly_in as $record){
                $record['account']=Accounts::find($record->account_id);
            }
            foreach($Dairly_out as $record){
                $record['account']=Accounts::find($record->account_id);
                $record['category']=SubCategories::find($record->sub_category_id);
            }

            foreach($Weekly_in as $record){
                $record['account']=Accounts::find($record->account_id);
            }
            foreach($Weekly_out as $record){
                $record['account']=Accounts::find($record->account_id);
                $record['category']=SubCategories::find($record->sub_category_id);
            }

            foreach($Monthly_in as $record){
                $record['account']=Accounts::find($record->account_id);
            }
            foreach($Monthly_out as $record){
                $record['account']=Accounts::find($record->account_id);
                $record['category']=SubCategories::find($record->sub_category_id);
            }

            foreach($Yearly_in as $record){
                $record['account']=Accounts::find($record->account_id);
            }
            foreach($Yearly_out as $record){
                $record['account']=Accounts::find($record->account_id);
                $record['category']=SubCategories::find($record->sub_category_id);
            }

            //Return Details display view....
            return view('pannel.reports', compact('Dairly_in', 'Weekly_in', 'Monthly_in', 'Yearly_in', 'Dairly_out', 'Weekly_out', 'Monthly_out', 'Yearly_out'));
        }
        else{
            return redirect('/login')->with('fail message', 'login first to access reports!');
        }
        
    }

    public function budgetLimit () 
    {
        if (Session::has("NewSession")){
            $limits=BudgetLimit::all();
            foreach($limits as $limit){
                $limit['expense']= SubCategories::find($limit->sub_category_id);
            }

            $expenses=SubCategories::all();

            return view('pannel.set-budget-limit', compact('limits', 'expenses'));
        }
        else{
            return redirect('/login')->with('fail message', 'Login to set your limits!');
        }
    }

    public function setLimit (Request $request) 
    {
        if (Session::has("NewSession")){
            $request->validate([
                'expense'=>'required',
                'amount'=> 'required'
            ]);

            $new= new BudgetLimit([
                'sub_category_id'=>$request->expense,
                'limit_amount'=>$request->amount
            ]);
            $new->save();

            return redirect('/set-budget');
        }
        else{
            return redirect('/login')->with('fail message', 'Login to set your limits!');
        }
    }
}
