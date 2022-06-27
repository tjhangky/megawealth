<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterAPIController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
        ]);

        if($validator->fails()) {
            return response()->json([
                'message' => 'The given data was invalid',
                'errors' => $validator->errors()
                
            ]);
        } else {

            // INI STORE REQUEST KE DATABASE
            $newUser = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ];

            User::create($newUser);
            
            return response()->json([
                'status' => 'Register Success'
            ]);
        }


        // $validated = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email:dns|unique:users',
        //     'password' => 'required|min:8',
        // ]);
        
        // $newUser = $validated;

        // $newUser['password'] = bcrypt($newUser['password']);

        // User::create($newUser);
    }

}
