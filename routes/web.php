<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ManageOfficeController;
use App\Http\Controllers\ManagePropertyController;

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

// Auth
Route::middleware('guest')
    ->controller(AuthController::class)
    ->group(function() {
        Route::get('/register', 'index_register');
        Route::post('/register', 'store');
        Route::get('/login', 'index_login')->name('login');
        Route::post('/login','authenticate');
});
Route::post('/logout', [AuthController::class, 'logout']);


// Home, About, Properties
Route::get('/', function () {
    return view('home');
});

Route::get('/about-us', [OfficeController::class, 'index']);

Route::prefix('properties')
    ->group(function() {
        Route::get('/', [PropertyController::class, 'index']);
        Route::get('/buy', [PropertyController::class, 'buy']);
        Route::get('/rent', [PropertyController::class, 'rent']);
});

// Cart
Route::middleware('member')
    ->prefix('cart')
    ->group(function() {
        Route::get('/', [CartController::class, 'index']);
        Route::post('/', [CartController::class, 'store']);
        Route::delete('/{cart}', [CartController::class, 'destroy']);
        Route::delete('/checkout/{id}', [CartController::class, 'checkout']);
});


// manage company
Route::middleware('admin')
    ->prefix('manage-company')
    ->group(function() {
        Route::get('/', [ManageOfficeController::class, 'index']);
        Route::get('/create', [ManageOfficeController::class, 'create']);
        Route::post('/', [ManageOfficeController::class, 'store']);
        Route::get('/{office}/edit', [ManageOfficeController::class, 'edit']);
        Route::put('/{office}', [ManageOfficeController::class, 'update']);
        Route::delete('/{office}', [ManageOfficeController::class, 'destroy']);
});

// manage properties
Route::middleware('admin')
    ->prefix('manage-property')
    ->group(function() {
        Route::get('/', [ManagePropertyController::class, 'index']);
        Route::get('/create', [ManagePropertyController::class, 'create']);
        Route::post('/', [ManagePropertyController::class, 'store']);
        Route::get('/{property}/edit', [ManagePropertyController::class, 'edit']);
        Route::put('/{property}', [ManagePropertyController::class, 'update']);
        Route::delete('/{property}', [ManagePropertyController::class, 'destroy']);
        Route::put('/{property}/finish', [ManagePropertyController::class, 'finish']);
});