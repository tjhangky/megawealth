<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8',
        ]);

        // data valid, buat object user
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

    public function login(Request $request) {

        $validated = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8',
        ]);

        if (!Auth::attempt($validated)) {
            // gagal login
            return response()->json([
                'status' => 'Login Failed',
            ]);

        }

        // berhasil login
        $token = $request->user()->createToken('Bearer Token')->accessToken;

        return response()->json([
            'status' => 'Login Successful',
            'token' => $token
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
