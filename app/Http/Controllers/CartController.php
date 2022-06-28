<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\PropertyController;
use App\Models\TransactionDetail;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // MASIH MANUAL TAR GANTI
        if (auth()->user()->is_admin == true) {
            abort(403, 'Unauthorized access.');
        }

        $carts = Cart::where('user_id', auth()->user()->id)->latest()->paginate(4);
        return view('cart.index', compact('carts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // MASIH MANUAL TAR GANTI
        if (auth()->user()->is_admin == true) {
            return redirect()->back()->with('status', 'Admin cannot make a transaction.');
            // abort(403, 'Unauthorized access.');
        }
        
        $cart = [
            'user_id' => auth()->user()->id,
            'property_id' => $request->property_id,
        ];
        Cart::create($cart);

        // change property status to 'Cart'
        $property_controller = new PropertyController;
        $status = 'Cart';
        $property_controller->update($status, $request->property_id);

        return redirect('/cart')->with('status', 'Property added to cart!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {   
        $property_id = $cart->property_id;
        $cart->delete();

        // change property status to 'Open' if no longer exist in cart
        $property_exist = Cart::where('property_id', $property_id)->exists();
        if (!$property_exist) {
            $status = 'Open';
            $property_controller = new PropertyController;
            $property_controller->update($status, $property_id);
        }

        return redirect('/cart')->with('status', 'Property has been removed from cart!');
    }

    public function checkout($id) {
        //buat transaksi baru
        $newTransaction = [
            'user_id' => $id
        ];
        $transaction = Transaction::create($newTransaction);

        // ambil semua cart punya user -> buatin detail traksaksi untuk tiap properti
        $carts = Cart::where('user_id', $id)->get();
        foreach ($carts as $cart) {
            $transactiondetail = [
                'transaction_id' => $transaction->id,
                'property_id' => $cart->property->id
            ];

            TransactionDetail::create($transactiondetail);
        }

        Cart::where('user_id', $id)->delete();
        return redirect('/')->with('status', 'Checkout Successful!');
    }
}
