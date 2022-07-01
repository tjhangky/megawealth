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
Route::middleware('guest')->controller(RegisterController::class)->group(function() {
    Route::get('/register', 'index');
    Route::post('/register', 'store');
});

Route::controller(LoginController::class)->group(function() {
    Route::get('/login', 'index')->name('login')->middleware('guest');
    Route::post('/login','authenticate')->middleware('guest');
    Route::post('/logout', 'logout');
});
// Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
// Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
// Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
// Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
// Route::post('/logout', [LoginController::class, 'logout']);

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

Route::prefix('cart')->middleware('member')->group(function() {
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
Route::middleware('admin')->prefix('manage-company')->group(function() {
    Route::get('/', [ManageOfficeController::class, 'index']);
    Route::get('/create', [ManageOfficeController::class, 'create']);
    Route::post('/', [ManageOfficeController::class, 'store']);
    Route::get('/{office}/edit', [ManageOfficeController::class, 'edit']);
    Route::put('/manage-company/{office}', [ManageOfficeController::class, 'update']);
    Route::delete('/manage-company/{office}', [ManageOfficeController::class, 'destroy']);
});

// Route::get('/manage-company', [ManageOfficeController::class, 'index'])->middleware('admin');
// Route::get('/manage-company/create', [ManageOfficeController::class, 'create'])->middleware('admin');
// Route::post('/manage-company', [ManageOfficeController::class, 'store']);
// Route::get('/manage-company/{office}/edit', [ManageOfficeController::class, 'edit'])->middleware('admin');
// Route::put('/manage-company/{office}', [ManageOfficeController::class, 'update']);
// Route::delete('/manage-company/{office}', [ManageOfficeController::class, 'destroy']);

// manage properties

Route::middleware('admin')->prefix('manage-property')->group(function() {
    Route::get('/', [ManagePropertyController::class, 'index'])->middleware('admin');
    Route::get('create', [ManagePropertyController::class, 'create'])->middleware('admin');
    Route::post('/', [ManagePropertyController::class, 'store']);
    Route::get('/{property}/edit', [ManagePropertyController::class, 'edit'])->middleware('admin');
    Route::put('/{property}', [ManagePropertyController::class, 'update']);
    Route::delete('/{property}', [ManagePropertyController::class, 'destroy']);
    Route::put('/{property}/finish', [ManagePropertyController::class, 'finish']);
});
// Route::get('/manage-property', [ManagePropertyController::class, 'index'])->middleware('admin');
// Route::get('/manage-property/create', [ManagePropertyController::class, 'create'])->middleware('admin');
// Route::post('/manage-property', [ManagePropertyController::class, 'store']);
// Route::get('/manage-property/{property}/edit', [ManagePropertyController::class, 'edit'])->middleware('admin');
// Route::put('/manage-property/{property}', [ManagePropertyController::class, 'update']);
// Route::delete('/manage-property/{property}', [ManagePropertyController::class, 'destroy']);
// Route::put('/manage-property/{property}/finish', [ManagePropertyController::class, 'finish']);