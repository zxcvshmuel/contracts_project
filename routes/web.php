<?php

use App\Http\Controllers\ContractController;
use App\Mail\ContractSend;
use App\Mail\ContractSent;
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

Route::get('/', function () {
    return view('components.layouts.welcome');
});

Route::get('contract/{contract}/view/', [ContractController::class, 'show'])->name('contract.view');
Route::Post('contract/{contract}/update/', [ContractController::class, 'update'])->name('contract.update');
