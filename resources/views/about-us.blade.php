@extends('layouts.main')

@section('title', 'About Us')

@section('content')
    <div class="container-fluid py-5"
        style="background-image: url('{{ asset('storage/misc-images/about_banner.jpg') }}'); background-size: cover; background-position: center; margin-top: -4em">
        <h1 class="text-center my-5 fw-bold text-light">About Our Company</h1>
        <div class="container my-5">
            <p class="text-light">Our company was founded at 2008 by our founder Renanda. At that time, we started as law
                firm specializing in
                real
                estate and construction. In 2012, our company expanded our serivce to real estates with the included service
                of
                real estates lawyers. Today, our company have 5 offices throughout the states and is planning to build more.
            </p>
        </div>
    </div>

    <div class="container mt-3">
        <h4>Our Offices</h4>
        <div class="d-flex">
            @foreach ($offices as $office)
                <div class="card mx-1" style="width: 18rem;">
                    @if ($office->image)
                        <img src="{{ asset('storage/office-images/' . $office->image) }}" class="card-img-top">
                    @else
                        {{-- NANTI INI dan if else DI DELETE --}}
                        <img class="card-img-top" src="https://source.unsplash.com/1600x900/?building">
                    @endif
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
