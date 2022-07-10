@extends('layouts.main')

@section('title', 'Login')

@section('content')
    <div class="container mt-5">
        {{-- status message u/ logged out --}}
        @if (session()->has('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif

        <div class="d-flex justify-content-center align-items-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center mb-3 fw-bold">Login</h3>
                        <form action="/login" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="email" class="form-label fw-bold">Email address</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" placeholder="Enter Your Email"
                                    value="{{ Cookie::get('loginCookie') !== null ? Cookie::get('loginCookie') : '' }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password" class="form-label fw-bold">Password</label>
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
                                <button type="submit" class="btn btn-dark">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
