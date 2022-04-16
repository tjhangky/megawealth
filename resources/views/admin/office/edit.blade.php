@extends('layouts.main')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-md-6">
            <form action="/manage-company/{{ $office->id }}" method="POST">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name">Office Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name', $office->name) }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Office Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                        value="{{ old('address', $office->address) }}">
                    @error('address')
                        <div class="  invalid-feedback">{{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="contact_name">Contact Name</label>
                    <input type="text" class="form-control @error('contact_name') is-invalid @enderror" name="contact_name"
                        value="{{ old('contact_name', $office->contact_name) }}">
                    @error('contact_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="contact_phone">Phone Number</label>
                    <input type="text" class="form-control @error('contact_phone') is-invalid @enderror"
                        name="contact_phone" value="{{ old('contact_phone', $office->contact_phone) }}">
                    @error('contact_phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>

    </div>
@endsection
