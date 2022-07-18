@extends('layouts.main')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="/manage-property" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="sale_type" class="form-label fs-6">Sales Type</label>
                            <select class="form-select @error('sale_type') is-invalid @enderror" name="sale_type">
                                <option selected>Choose the type of sales</option>
                                <option value="Sale" {{ old('sale_type') == 'Sale' ? 'selected' : '' }}>Sale</option>
                                <option value="Rent" {{ old('sale_type') == 'Rent' ? 'selected' : '' }}>Rent</option>
                            </select>
                            @error('sale_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="property_type" class="form-label fs-6">Building Type</label>
                            <select class="form-select @error('property_type') is-invalid @enderror" name="property_type">
                                <option selected>Choose the building type</option>
                                <option value="Apartment" {{ old('property_type') == 'Apartment' ? 'selected' : '' }}>
                                    Apartment
                                </option>
                                <option value="House" {{ old('property_type') == 'House' ? 'selected' : '' }}>House
                                </option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="price" class="form-label fs-6">Price</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                                value="{{ old('price') }}">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="address" class="form-label fs-6">Location</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                                value="{{ old('address') }}">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="image" class="form-label fs-6">Upload Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                                name="image">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-dark mt-3">Insert</button>
                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection
