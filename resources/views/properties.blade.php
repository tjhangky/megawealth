@extends('layouts.main')

@section('content')
    <div class="container">
        <p>Showing Search Results for "{{ request('search') }}"</p>

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

                        <p class="card-text ">{{ $property->address }}</p>
                        <p class="card-text">{{ $property->property_type }}</p>
                        <p class="card-text">{{ $property->sale_type }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{-- {{ $properties->links() }} --}}
        </div>

    </div>
@endsection
