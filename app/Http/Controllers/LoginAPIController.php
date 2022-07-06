<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginAPIController extends Controller
{
    public function authenticate(Request $request) {
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
        
        
        $user = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // invalid credential
        if (!Auth::attempt($user)) {

            return response()->json([
                'status' => 'Login Failed',
            ]);
        } else {

            // $token = auth()->user()->createToken('Bearer Token')->accessToken;
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('BearerToken')->accessToken;
            return response()->json([
                'status' => 'Login Successful',
                'Token' => $token
            ]);       
        }
        
        
        
        

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Bearer Token')->accessToken;
                return response()->json([
                    'status' => 'Login Successful',
                    'Token' => $token
                ]);
            } else {
                return response()->json([
                    'status' => 'Login Failed',
                ]);
            }
        } else {
            return response()->json([
                'status' => 'Login Failed',
            ]);
        }
    }
}