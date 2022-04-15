<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CartController;

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

// auth
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// content for guest and authenticated user
Route::get('/', function () {
    return view('home');
});

Route::get('/about-us', [OfficeController::class, 'index']);
Route::get('/properties', [PropertyController::class, 'index']);
Route::get('/properties/buy', [PropertyController::class, 'buy']);
Route::get('/properties/rent', [PropertyController::class, 'rent']);

Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart', [CartController::class, 'store']);
Route::delete('/cart', [CartController::class, 'destroy']);

// content for admin