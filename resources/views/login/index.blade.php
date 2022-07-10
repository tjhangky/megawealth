@extends('layouts.main')

@section('title', 'Login')

@section('content')
    <div class="login-banner" style="background-image: url('{{ asset('storage/misc-images/login_banner.jpg') }}')">
        <div class="blur">
            <div class="container">
                {{-- status message u/ logged out --}}
                @if (session()->has('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="d-flex justify-content-center">
                    <div class="col-md-5">
                        <div class="card card-login" style="margin-top: 15vh">
                            <div class="card-body">
                                <h1 class="text-center mb-3" style="font-family: 'Yellowtail'">megAWealth</h1>
                                <form action="/login" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label fs-6">Email address</label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"
                                            name="email" placeholder="Enter your email"
                                            value="{{ Cookie::get('loginCookie') !== null ? Cookie::get('loginCookie') : '' }}">
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

                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox" name="remember">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Remember me
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-warning fw-bold w-50">Login</button>
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
