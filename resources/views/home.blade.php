@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div class="container-fluid py-5"
        style="background-image: url('{{ asset('storage/misc-images/home_banner.jpg') }}'); background-size: cover; background-position: bottom; margin-top: -4em">

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container py-5">
            <h1 class="text-center fw-bold my-5">Find Your Future Home</h1>

            {{-- kalo admin dia ke manage property, kalo ngga property biasa --}}
            <form action="{{ auth()->check() && auth()->user()->role == 'admin' ? '/manage-property' : '/properties' }}">
                <div class="input-group mt-5">
                    <input type="text" class="form-control" placeholder="Enter a City, Property, Buy or Rent"
                        name="search">
                    <button class="btn btn-dark" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container my-4">
        <div class="row">
            <div class="col-md-4">
                <a href="/properties/buy" class="text-decoration-none text-dark">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('storage/misc-images/buy.jpg') }}" style="width: 150px; height: 150px">
                        <h5>Buy</h5>
                    </div>
                </a>

            </div>
            <div class="col-md-4">
                <a href="/properties/rent" class="text-decoration-none text-dark">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('storage/misc-images/rent.jpg') }}" style="width: 150px; height: 150px">
                        <h5>Rent</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-4">
                <a href="/about-us" class="text-decoration-none text-dark">
                    <div class="d-flex flex-column align-items-center">
                        <img src="{{ asset('storage/misc-images/about.jpg') }}" style="width: 150px; height: 150px">
                        <h5>About Us</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection
