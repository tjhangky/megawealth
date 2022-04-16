<?php


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

// AUTHENTICATION
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// GUEST & MEMBER
Route::get('/', function () {
    return view('home');
});

Route::get('/about-us', [OfficeController::class, 'index']);
Route::get('/properties', [PropertyController::class, 'index']);
Route::get('/properties/buy', [PropertyController::class, 'buy']);
Route::get('/properties/rent', [PropertyController::class, 'rent']);

Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
Route::post('/cart', [CartController::class, 'store']);
Route::delete('/cart/{cart}', [CartController::class, 'destroy']);
Route::delete('/checkout/{id}', [CartController::class, 'checkout']);


// ADMIN
// manage company
Route::get('/manage-company', [ManageOfficeController::class, 'index'])->middleware('auth');
Route::get('/manage-company/create', [ManageOfficeController::class, 'create'])->middleware('auth');
Route::post('/manage-company', [ManageOfficeController::class, 'store']);
Route::get('/manage-company/{office}/edit', [ManageOfficeController::class, 'edit'])->middleware('auth');
Route::put('/manage-company/{office}', [ManageOfficeController::class, 'update']);
Route::delete('/manage-company/{office}', [ManageOfficeController::class, 'destroy']);

// manage properties
Route::resource('/manage-property', ManagePropertyController::class)->middleware('auth');
Route::put('/manage-property/{property}/finish', [ManagePropertyController::class, 'finish']);