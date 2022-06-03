<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterOtherController;
use App\Http\Controllers\statusAccountController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::group(['middleware' => 'user'], function () {
    Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction');
    Route::post('/transaction',[TransactionController::class, 'store'])->name('transactionAdd');
    Route::post('/registerAccount',[RegisterOtherController::class, 'store']);
    Route::get('/statusAccount',[statusAccountController::class, 'index'])->name('status');
    Route::get('/report/{id}',[statusAccountController::class, 'report'])->name('report');
});
