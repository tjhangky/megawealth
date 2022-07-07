<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginAPIController extends Controller
{
    public function authenticate(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
        ]);

        // invalid data type
        if($validator->fails()) {
            return response()->json([
                'message' => 'The given data was invalid',
                'errors' => $validator->errors()
            ]);
        }

        // buat object user
        $user = [
            'email' => $request->email,
            'password' => $request->password
        ];


        if (!Auth::attempt($user)) {
            // gagal login
            return response()->json([
                'status' => 'Login Failed',
            ]);

        }

        // berhasil login
        $token = auth()->user()->createToken('Bearer Token')->accessToken;

        // method createToken diatas ada cacing merah undefined tetapi masih bisa dijalankan
        // semisal code diatas gagal, bisa menggunakan 2 baris code dibawah
        // $user = User::where('email', $request->email)->first();
        // $token = $user->createToken('BearerToken')->accessToken;

        return response()->json([
            'status' => 'Login Successful',
            'Token' => $token
        ]);       
        
    }
}