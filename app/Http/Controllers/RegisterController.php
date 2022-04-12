<?php

namespace App\Http\Controllers;

use App\Models\Member;
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
            'email' => 'required|email:dns|unique:members',
            'password' => 'required|min:8',
            'confirm-password' => 'required|same:password'
        ]);
        
        // remove confirm-password
        $newMember = Arr::except($validated, ['confirm-password']);
        
        // hash password
        $newMember['password'] = bcrypt($newMember['password']);

        // push ke db
        Member::create($newMember);
        
        return redirect('/')->with('status', 'Register Success');
    }
}
