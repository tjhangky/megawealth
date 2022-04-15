<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\PropertyController;

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
    public function destroy($id)
    {   
        $cart = Cart::find($id);
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
}
