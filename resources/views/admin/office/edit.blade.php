@extends('layouts.main')

@section('content')
    <div class="container mt-5 ">
        <div class="row">

            <div class="col-md-6">
                <img src="{{ asset('storage/' . $office->image) }}" style="width: 100%; height: 400px">
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="/manage-company/{{ $office->id }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Office Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name', $office->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="address" class="form-label">Office Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="address" value="{{ old('address', $office->address) }}">
                                @error('address')
                                    <div class="  invalid-feedback">{{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="contact_name" class="form-label">Contact Name</label>
                                <input type="text" class="form-control @error('contact_name') is-invalid @enderror"
                                    name="contact_name" value="{{ old('contact_name', $office->contact_name) }}">
                                @error('contact_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="contact_phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control @error('contact_phone') is-invalid @enderror"
                                    name="contact_phone" value="{{ old('contact_phone', $office->contact_phone) }}">
                                @error('contact_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-dark"
                                onclick="return confirm('Are you sure want to update this office?')">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
