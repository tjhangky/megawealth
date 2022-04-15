@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="text-center">About Our Company</h1>
        <p>Our company was founded blablalbla</p>

        <h3>Our Offices</h3>
        <div class="d-flex">
            @foreach ($offices as $office)
                <div class="card mx-1" style="width: 18rem;">
                    <img class="card-img-top" src="https://source.unsplash.com/1600x900/?bulding" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $office->name }}</h5>
                        <p class="card-text ">{{ $office->address }}</p>
                        <p class="card-text">{{ $office->contact_name }} : {{ $office->contact_phone }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $offices->links() }}
        </div>

    </div>
@endsection
