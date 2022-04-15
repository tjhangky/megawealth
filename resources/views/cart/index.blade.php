@extends('layouts.main')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h4>Your Cart</h4>

        @if ($carts->isEmpty())
            <div class="d-flex justify-content-center">
                No data in cart yet
            </div>
        @else
            <div class="d-flex">
                @foreach ($carts as $cart)
                    <div class="card mx-1" style="width: 18rem;">
                        <img class="card-img-top" src="https://source.unsplash.com/1600x900/?bulding" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">
                                @if ($cart->property->sale_type == 'Rent')
                                    ${{ $cart->property->price }} / month
                                @else
                                    ${{ $cart->property->price }}
                                @endif
                            </h5>

                            <p class="card-text">{{ $cart->property->address }}</p>
                            <div class="d-flex">
                                <p class="card-tag">{{ $cart->property->property_type }}</p>
                                <p class="card-tag">{{ $cart->created_at->format('Y-m-d') }}</p>
                            </div>

                            <form action="/cart/{{ $cart->id }}" method="POST">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure to delete this property from your cart?')">Cancel</button>
                            </form>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $carts->links() }}
                <form action="/checkout/{{ $cart->user->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-primary"
                        onclick="return confirm('Are you sure you want to checkout?')">Checkout</button>
                </form>
            </div>
        @endif
    </div>
@endsection
