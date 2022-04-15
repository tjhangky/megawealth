@extends('layouts.main')

@section('content')
    <div class="container">
        @yield('info')

        @if ($properties->isEmpty())
            <div class="d-flex justify-content-center">
                No Properties Found.
            </div>
        @else
            <div class="d-flex">
                @foreach ($properties as $property)
                    <div class="card mx-1" style="width: 18rem;">
                        <img class="card-img-top" src="https://source.unsplash.com/1600x900/?bulding" alt="Card image cap">
                        <div class="card-body">
                            @if ($property->sale_type == 'Rent')
                                <h5 class="card-title">${{ $property->price }} / month</h5>
                            @else
                                <h5 class="card-title">${{ $property->price }}</h5>
                            @endif

                            <p class="card-text">{{ $property->address }}</p>
                            <div class="d-flex">
                                <p class="card-tag">{{ $property->property_type }}</p>
                            </div>

                            <form action="/cart" method="POST">
                                @csrf
                                <input type="hidden" name="property_id" value="{{ $property->id }}">
                                <button type="submit" class="btn btn-primary"
                                    onclick="return confirm('Add property to cart?')">
                                    @if ($property->sale_type == 'Rent')
                                        Rent
                                    @else
                                        Buy
                                    @endif
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $properties->links() }}
            </div>
        @endif



    </div>
@endsection
