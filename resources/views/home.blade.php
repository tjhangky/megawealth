@extends('layouts.main')

@section('title', 'Home')

@section('content')

    <div class="container-fluid py-5"
        style="background-image: url('{{ asset('storage/home_banner.jpg') }}'); background-size: cover; background-position: bottom; margin-top: -4em">

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="container py-5">
            <h1 class="text-center fw-bold my-5">Find Your Future Home</h1>
            {{-- kalo admin dia ke manage property, kalo ngga property biasa --}}
            <form action="{{ auth()->user()->is_admin == '1' ? '/manage-property' : '/properties' }}">
                <div class="input-group my-5">
                    <input type="text" class="form-control" placeholder="Enter a City, Property, Buy or Rent"
                        name="search">
                    <button class="btn btn-dark" type="submit">Search</button>
                </div>
            </form>
        </div>

    </div>

@endsection
