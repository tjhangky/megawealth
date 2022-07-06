<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
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
                // ambil objek property
                $property = Property::find($transactiondetail->property_id);
                $newData = [
                    'transaction_date' => $transaction->created_at->toDateString(),
                    'transaction_id' => $transaction->id,
                    'id' => $transactiondetail->property,
                    'type_of_sales' => $property->sale_type,
                    'building_type' => $property->property_type,
                    'price' => $property->price,
                    'location' => $property->address,
                    'image_path' => $property->image
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
