@extends('layouts.main')

@section('title', 'Register')

@section('content')
    <div class="container mt-5">
        <h3 class="text-center mb-3">Register</h3>

        <div class="d-flex justify-content-center">
            <div class="col-md-4">
                <form action="/register" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            placeholder="Enter Your Name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email address</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                            placeholder="Enter Your Email" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group mb-3">
                        <label for="password">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            placeholder="Your password must be at least 8 characters">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group mb-3">
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" class="form-control @error('confirm-password') is-invalid @enderror"
                            name="confirm-password" placeholder="Re-type your password">
                        @error('confirm-password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>
    </div>
@endsection
