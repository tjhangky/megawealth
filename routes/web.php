<?php

use App\Models\Office;
use App\Models\Property;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

// register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// content
Route::get('/', function () {
    return view('home');
});

Route::get('/about-us', function () {
    $offices = Office::paginate(5);
    return view('about-us', compact('offices'));
});

Route::get('/properties', function () {
    if (request('search')) {
        $properties = Property::query()
            ->where('property_type', 'like', '%' . request('search') . '%')
            ->orWhere('address', 'like', '%' . request('search') . '%')
            ->orWhere('sale_type', 'like', '%' . request('search') . '%')
            ->get();
    } else {
        $properties = Property::all();
    }

    // $properties->get();
    return view('properties', compact('properties'));
});