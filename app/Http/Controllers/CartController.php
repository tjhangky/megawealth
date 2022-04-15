<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

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
        $cart = [
            'user_id' => auth()->user()->id,
            'property_id' => $request->property_id,
        ];
        Cart::create($cart);
        return redirect('/cart')->with('status', 'Property added to cart!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        Cart::find($id)->delete();
        return redirect('/cart')->with('status', 'Property has been removed from cart!');
    }
}
