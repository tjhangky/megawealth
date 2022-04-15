@extends('layouts.main')

@section('content')
    <div class="container">
        <p>Your Cart</p>

        <div class="d-flex">
            @foreach ($carts as $cart)
                <div class="card mx-1" style="width: 18rem;">
                    <img class="card-img-top" src="https://source.unsplash.com/1600x900/?bulding" alt="Card image cap">
                    <div class="card-body">
                        @if ($cart->property->sale_type == 'Rent')
                            <h5 class="card-title">${{ $cart->property_id->->price }} / month</h5>
                        @else
                            <h5 class="card-title">${{ $cart->property_id->->price }}</h5>
                        @endif

                        <p class="card-text">{{ $cart->property_id->->address }}</p>
                        <p class="card-text">{{ $cart->property_id->y->property_type }}</p>
                        @if ($cart->property_id->->sale_type == 'Rent')
                            <button type="button" class="btn btn-primary">Rent</button>
                        @else
                            <button type="button" class="btn btn-primary">Buy</button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $properties->links() }}
        </div>

    </div>
@endsection
