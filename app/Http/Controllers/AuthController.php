<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    // Register
    public function index_register() 
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
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
        return redirect('/login')->with('status', 'Register Success');
    }

    // Login
    public function index_login()
    {
        return view('login.index');
    }

    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
        ]);

        // generate cookie kalo remember me
        if($request->remember) {
            Cookie::queue('loginCookie', $request->input('email'), 5);
        }

        if (Auth::attempt($validated, $request->remember)) {
            // jika berhasil login
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('status', 'Login Failed! Please check your credentials.');
        
    }

    // logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
