@extends('layouts.main')

@section('title', 'Cart')

@section('content')
    <div class="container">
        {{-- status u/ added to cart and delete from cart --}}
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h5 class="fw-bold mb-2">Your Cart</h5>

        @if ($carts->isEmpty())
            {{-- validasi kosong --}}
            <div class="d-flex justify-content-center">
                No data in cart yet
            </div>
        @else
            <div class="row">
                @foreach ($carts as $cart)
                    <div class="col-md-3">
                        <div class="card">
                            @if ($cart->property->image)
                                <img src="{{ asset('storage/' . $cart->property->image) }}" class="card-img-top">
                            @else
                                {{-- nanti ini dihapus --}}
                                <img class="card-img-top" src="https://source.unsplash.com/1600x900/?bulding">
                            @endif

                            <div class="card-body">
                                <h5 class="card-title">
                                    @if ($cart->property->sale_type == 'Rent')
                                        ${{ number_format($cart->property->price, 0, '.', ',') }} / month
                                    @else
                                        ${{ number_format($cart->property->price, 0, '.', ',') }}
                                    @endif
                                </h5>

                                <p class="card-text">{{ $cart->property->address }}</p>
                                <div class="d-flex mb-3">
                                    <span class="badge bg-primary me-1">{{ $cart->property->property_type }}</span>
                                    <span class="badge bg-success">{{ $cart->created_at->format('Y-m-d') }}</span>
                                </div>

                                <form action="/cart/{{ $cart->id }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure to delete this property from your cart?')">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex flex-column align-items-center mt-5">
                {{ $carts->links() }}

                {{-- checkout button --}}
                <form action="/cart/checkout/{{ $carts->first()->user->id }}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-dark"
                        onclick="return confirm('Are you sure you want to checkout?')">Checkout</button>
                </form>
            </div>
        @endif
    </div>
@endsection
