@extends('layouts.main')

@section('content')
    <div class="container">
        <h1 class="text-center mb-5">Find Your Future Home</h1>
        <form action="/properties">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter a City, Property, Buy or Rent" name="search">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
@endsection
