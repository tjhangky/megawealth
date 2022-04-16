@extends('layouts.main')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-md-6">
            <form action="/manage-company" method="POST">
                @csrf
                <div class="form-group">
                    <label for="sale-type">Sales Type</label>
                    <input type="text" class="form-control @error('sale-type') is-invalid @enderror" name="sale-type"
                        value="{{ old('sale-type') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Building Type</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                        value="{{ old('address') }}">
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="contact_name">Price</label>
                    <input type="text" class="form-control @error('contact_name') is-invalid @enderror" name="contact_name"
                        value="{{ old('contact_name') }}">
                    @error('contact_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="contact_phone">Location</label>
                    <input type="text" class="form-control @error('contact_phone') is-invalid @enderror"
                        name="contact_phone" value="{{ old('contact_phone') }}">
                    @error('contact_phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="file">Upload Image</label>
                    <input type="file" class="form-control" id="inputGroupFile02">
                </div> --}}

                <button type="submit" class="btn btn-primary mt-3">Insert</button>
            </form>
        </div>

    </div>
@endsection
