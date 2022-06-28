@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <h1 class="text-center mb-5">Find Your Future Home</h1>
        <form action="/properties">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Enter a City, Property, Buy or Rent" name="search">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>
    </div>
@endsection
