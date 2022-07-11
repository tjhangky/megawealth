<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAPIController;
use App\Http\Controllers\RegisterAPIController;
use App\Http\Controllers\TransactionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(ApiController::class)
    ->group(function () {
        Route::post('/register', 'register');
        Route::post('/login', 'login');
        Route::get('/transaction/{id}', 'transaction');
});

// Route::post('/register', [RegisterAPIController::class, 'store']);
// Route::post('/login', [LoginAPIController::class, 'authenticate']);
// Route::get('/transaction/{id}', [TransactionController::class, 'show']);
// Route::middleware('auth:api')->get('/transaction/{id}', [TransactionController::class, 'show']);