<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request ;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index');
    }

    public function store(Request $request) {
        // validasi
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
            'confirm-password' => 'required|same:password'
        ]);
        
        // remove confirm-password
        $newUser = Arr::except($validated, ['confirm-password']);
        
        // hash password
        $newUser['password'] = bcrypt($newUser['password']);

        // push ke db
        User::create($newUser);
        return redirect('/')->with('status', 'Register Success');
    }
}
