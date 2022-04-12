@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="text-center">Find Your Future Home</h1>
        <form action="/search" method="GET">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter a City, Property, Buy or Rent"
                    aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
            </div>
        </form>
    </div>
@endsection
