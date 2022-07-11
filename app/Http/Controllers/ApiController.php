<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
        ]);

        if($validator->fails()) {
            // data ga valid
            return response()->json([
                'message' => 'The given data was invalid',
                'errors' => $validator->errors()
            ], 422);

        } 
        // data valid, buat object user
        $newUser = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ];

        User::create($newUser);
        
        return response()->json([
            'status' => 'Register Success'
        ], 200);

    }

    public function login(Request $request) {
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

    public function transaction($email) {
        if (!Auth::guard('api')->check()) {
            return response()->json([
                'status' => 'false',
                'error' => 'Email Unauthenticated'
            ], 401);
        }
        // get user dari email
        $user = User::where('email', $email)->first();

        // ambil semua transaksi user
        $transactions = Transaction::where('user_id', $user->id)->get();

        // buat collection baru buat kirim response
        $data = new Collection();

        // loop setiap transaksi
        foreach ($transactions as $transaction) {
            // ambil semua detail transaksi
            $transactiondetails = TransactionDetail::where('transaction_id', $transaction->id)->get();

            // loop setiap detail transaksi
            foreach ($transactiondetails as $transactiondetail) {
                
                // buat detail transaksi
                $newData = [
                    'transaction_date' => $transaction->created_at->toDateString(),
                    'transaction_id' => $transaction->id,
                    'id' => $transactiondetail->property->id,
                    'type_of_sales' => $transactiondetail->property->sale_type,
                    'building_type' => $transactiondetail->property->property_type,
                    'price' => $transactiondetail->property->price,
                    'location' => $transactiondetail->property->address,
                    'image_path' => $transactiondetail->property->image
                ];
                $data->push($newData);
            }
        }

        // kirim response sesuai format
        return response()->json([
            'data' => $data,
            'user_id' => [
                'id' => $user->id
            ]
        ]);
    }
}
