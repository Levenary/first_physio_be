<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CustomerController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', [LoginController::class, 'loginFunction']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/logout', [LoginController::class, 'logOutFunction']);
    Route::get('/profile', [LoginController::class, 'profileFunction']);
});

Route::resource('customers', CustomerController::class);

Route::get('/deatail', [CustomerController::class, 'show']);//->middleware(['auth:sanctum']);
Route::post('/CreateUser', [CustomerController::class, 'store']);//->middleware(['auth:sanctum']);