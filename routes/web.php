<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\ExpensesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ReportsController;

Route::get('/', function () {
    return view("index");
});
Route::get('/login', function () {
    return view("login");
});

// account management..

Route::get('/accounts', [AccountsController::class, 'all']);
Route::post('/accounts/create', [AccountsController::class, 'addAccount'])->name("account.post");
Route::post('/accounts', [AccountsController::class, 'rechargeAccount'])->name("recharge.post");

Route::post('/login', [AuthController::class, 'verifyLogin'])->name("login.post");
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', [AuthController::class, 'dashboard']);

// expenses and spending routes....

Route::get('/expenses', [ExpensesController::class, 'index']);
Route::post('/expenses/add-category', [ExpensesController::class, 'createCategory'])->name("category.post");
Route::post('/expenses/add-sub-category', [ExpensesController::class, 'createSubCategory'])->name("subcategory.post");

Route::post('/expenses/delete-category', [ExpensesController::class, 'deleteCategory'])->name("delete.category");
Route::post('/expenses/delete-sub', [ExpensesController::class, 'deleteSubCategory'])->name("deletesub");


// Transactions routes..

Route::get('/transactions', [ExpensesController::class, 'transactions']);

Route::get('/spend', [ExpensesController::class, 'spend']);
Route::post('/spend/start-spend', [ExpensesController::class, 'startSpend'])->name('start.spend');
Route::post('/spend/next-step', [ExpensesController::class, 'step1'])->name('step1.post');
Route::post('/spend/last-step', [ExpensesController::class, 'step2'])->name('step2.post');
Route::post('/spend/finish', [ExpensesController::class, 'finish'])->name('finish.post');

Route::get('/spend/start-spend', [ExpensesController::class, 'spend']);
Route::get('/spend/next-step', [ExpensesController::class, 'spend']);
Route::get('/spend/last-step', [ExpensesController::class, 'spend']);
Route::get('/spend/finish', [ExpensesController::class, 'spend']);

Route::get('/reports', [ReportsController::class, 'index']);


// Setting limit not to exeed while spending..

Route::get('/set-budget', [ReportsController::class, 'budgetLimit']);
Route::post('/set-budget', [ReportsController::class, 'setLimit'])->name('setBudget.post');

// logout

Route::get('/logout', [AuthController::class, 'logout']);

// Route::get('/newuser', [AuthController::class, 'createUser']);

