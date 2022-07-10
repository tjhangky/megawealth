@extends('layouts.main')

@section('title', 'Register')

@section('content')
    <div class="login-banner" style="background-image: url('{{ asset('storage/misc-images/login_banner.jpg') }}')">
        <div class="blur">
            <div class="container">
                <div class="d-flex justify-content-center">
                    <div class="col-md-5">
                        <div class="card card-login" style="margin-top: 5vh">
                            <div class="card-body">
                                <h1 class="text-center mb-3" style="font-family: 'Yellowtail'">megAWealth</h1>
                                <form action="/register" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="name" class="form-label fs-6">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" placeholder="Enter your name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label fs-6">Email address</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            name="email" placeholder="Enter your email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="password" class="form-label fs-6">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            name="password" placeholder="Your password must be at least 8 characters">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="confirm-password" class="form-label fs-6">Confirm Password</label>
                                        <input type="password"
                                            class="form-control @error('confirm-password') is-invalid @enderror"
                                            name="confirm-password" placeholder="Re-type your password">
                                        @error('confirm-password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-warning fw-bold w-50">Register</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
