@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        {{-- status message --}}
        @if (session()->has('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif

        <h3 class="text-center">Login</h3>
        <form action="/login" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                    placeholder="Enter Your Email" value={{ old('email') }}>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password"
                    placeholder="Your password must be at least 8 characters">
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember">
                <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
@endsection
