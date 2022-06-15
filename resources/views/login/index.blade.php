@extends('layouts.main')

@section('content')
    <div class="container mt-5">


        <h3 class="text-center mb-3">Login</h3>
        {{-- status message --}}
        @if (session()->has('status'))
            <div class="alert alert-danger">
                {{ session('status') }}
            </div>
        @endif

        <div class="d-flex justify-content-center">
            <div class="col-md-4">
                <form action="/login" method="POST">
                    @csrf
                    {{-- <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Enter Your Email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="floatingInput"
                            name="email" placeholder=" Enter Your Email">
                        <label for="floatingInput">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="Your password must be at least 8 characters">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div> --}}

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="floatingInput" name="password" placeholder="Your password must be at least 8 characters">
                        <label for="floatingInput">Password</label>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
        </div>




    </div>
@endsection
