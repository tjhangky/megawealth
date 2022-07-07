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
        <div class="row mt-3">
            @foreach ($offices as $office)
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('storage/' . $office->image) }}" class="card-img-top">

                        <div class="card-body">
                            <p class="card-title">{{ $office->name }}</p>
                            <p class="card-text">{{ $office->address }}</p>
                            <p class="card-text mb-0">{{ $office->contact_name }} : </p>
                            <p class="card-text">{{ $office->contact_phone }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $offices->links() }}
    </div>
    </div>
@endsection
