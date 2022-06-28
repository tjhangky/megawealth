<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::prefix('v1')->group(function() {
//     Route::resource('/books', BookController::class)->except([
//         'create', 'edit'
//     ]);
// });

Route::post('/register', [RegisterAPIController::class, 'store']);
Route::post('/login', [LoginAPIController::class, 'authenticate']);
Route::middleware('auth:api')->get('/transaction/{id}', [TransactionController::class, 'show']);
