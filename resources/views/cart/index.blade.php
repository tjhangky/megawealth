@extends('layouts.main')

@section('content')
    <div class="container">
        <p>Your Cart</p>

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
                            <p class="card-text">{{ $cart->property->property_type }}</p>
                            <p class="card-text">{{ $cart->created_at->format('Y-m-d') }}</p>

                            <form action="/cart" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="property_id" value="{{ $cart->property->id }}">
                                <button type="submit" class="btn btn-danger">Cancel</button>
                            </form>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="d-flex justify-content-center mt-5">
                {{-- {{ $carts->links() }} --}}
                <button type="button" class="btn btn-primary">Checkout</button>
            </div>
        @endif
    </div>
@endsection
