@extends('layouts.main')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-md-6">

            <img src="https://source.unsplash.com/1600x900/?bulding" style="width: 100%">
        </div>
        <div class="col-md-6">
            <form action="/manage-property/{{ $property->id }}" method="POST">
                @method('put')
                @csrf
                <div class="form-group mb-3">
                    <label for="sale_type">Sales Type</label>
                    <select class="form-select @error('sale_type') is-invalid @enderror" name="sale_type">
                        <option value="Sale" {{ $property->sale_type == 'Sale' ? 'selected' : '' }}>Sale</option>
                        <option value="Rent" {{ $property->sale_type == 'Rent' ? 'selected' : '' }}>Rent</option>
                        {{-- SEMENTARA PAKE MANUAL DULU, NANTI SALE RENT DIJADIIN TABLE BARU AJA JD TINGGAL DI LOOP --}}
                    </select>
                    @error('sale_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="property_type">Building Type</label>
                    <select class="form-select @error('property_type') is-invalid @enderror" name="property_type">
                        <option value="Apartment" {{ $property->property_type == 'Apartment' ? 'selected' : '' }}>
                            Apartment
                        </option>
                        <option value="House" {{ $property->property_type == 'House' ? 'selected' : '' }}>House</option>
                        {{-- SEMENTARA PAKE MANUAL DULU, NANTI SALE RENT DIJADIIN TABLE BARU AJA JD TINGGAL DI LOOP --}}
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="price">Price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                        value="{{ old('price', $property->price) }}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="address">Location</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                        value="{{ old('address', $property->address) }}">
                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- <div class="form-group">
                    <label for="file">Upload Image</label>
                    <input type="file" class="form-control" id="inputGroupFile02">
                </div> --}}

                <button type="submit" class="btn btn-primary mt-3">Update</button>
            </form>
        </div>

    </div>
@endsection
