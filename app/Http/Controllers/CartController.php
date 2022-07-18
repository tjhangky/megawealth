<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Property;
use App\Models\Transaction;
use Illuminate\Http\Request;
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
        // cek kalo properti udah ada di cart
        $already_in_cart = Cart::where('user_id', auth()->user()->id);
        if($already_in_cart->where('property_id', $request->property_id)->exists()) {
            return redirect('/cart')->with('status', 'Property already in your cart!');
        };
        
        // buat cart baru
        $cart = [
            'user_id' => auth()->user()->id,
            'property_id' => $request->property_id,
        ];
        Cart::create($cart);

        // update property status to cart
        Property::find($request->property_id)->update(['status' => 'Cart']);

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

        // ganti property status to 'Open' kalo gaada di cart siapapun
        $property_exist = Cart::where('property_id', $property_id)->exists();
        if (!$property_exist) {
            Property::find($property_id)->update(['status' => 'Open']);
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

            // ubah status properti jadi complete + delete semua cart yg ada properti yg di checkout
            $property = Property::find($cart->property_id);
            $property->update(['status' => 'Transaction Completed']);
            // delete cart user yang checkout
            Cart::where('property_id', $cart->property_id)->delete();
        }

        return redirect('/')->with('status', 'Checkout Successful!');
    }
}
