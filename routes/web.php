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
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout']);

// GUEST & MEMBER
Route::get('/', function () {
    return view('home');
});

Route::get('/about-us', [OfficeController::class, 'index']);

Route::prefix('properties')->group(function() {
    Route::get('/', [PropertyController::class, 'index']);
    Route::get('/buy', [PropertyController::class, 'buy']);
    Route::get('/rent', [PropertyController::class, 'rent']);
});

Route::prefix('cart')->middleware('auth')->group(function() {
    Route::get('/', [CartController::class, 'index']);
    Route::post('/', [CartController::class, 'store']);
    Route::delete('/{cart}', [CartController::class, 'destroy']);
    Route::delete('/checkout/{id}', [CartController::class, 'checkout']);
});
// Route::get('/cart', [CartController::class, 'index'])->middleware('auth');
// Route::post('/cart', [CartController::class, 'store'])->middleware('auth');
// Route::delete('/cart/{cart}', [CartController::class, 'destroy']);
// Route::delete('/cart/checkout/{id}', [CartController::class, 'checkout']);


// ADMIN
// manage company
Route::get('/manage-company', [ManageOfficeController::class, 'index'])->middleware('admin');
Route::get('/manage-company/create', [ManageOfficeController::class, 'create'])->middleware('admin');
Route::post('/manage-company', [ManageOfficeController::class, 'store']);
Route::get('/manage-company/{office}/edit', [ManageOfficeController::class, 'edit'])->middleware('admin');
Route::put('/manage-company/{office}', [ManageOfficeController::class, 'update']);
Route::delete('/manage-company/{office}', [ManageOfficeController::class, 'destroy']);

// manage properties
Route::get('/manage-property', [ManagePropertyController::class, 'index'])->middleware('admin');
Route::get('/manage-property/create', [ManagePropertyController::class, 'create'])->middleware('admin');
Route::post('/manage-property', [ManagePropertyController::class, 'store']);
Route::get('/manage-property/{property}/edit', [ManagePropertyController::class, 'edit'])->middleware('admin');
Route::put('/manage-property/{property}', [ManagePropertyController::class, 'update']);
Route::delete('/manage-property/{property}', [ManagePropertyController::class, 'destroy']);
// Route::resource('/manage-property', ManagePropertyController::class)->middleware('auth');
// Route::put('/manage-property/{property}/finish', [ManagePropertyController::class, 'finish']);