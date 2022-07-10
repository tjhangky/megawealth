@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        <div class="row">

            <div class="col-md-6">
                <img src="{{ asset('storage/' . $property->image) }}" style="width: 100%; height: 400px">
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="/manage-property/{{ $property->id }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            <div class="input-group mb-3">
                                <span class="input-group-text">Sales Type</span>
                                <select class="form-select @error('sale_type') is-invalid @enderror" name="sale_type">
                                    <option value="Sale" {{ $property->sale_type == 'Sale' ? 'selected' : '' }}>Sale
                                    </option>
                                    <option value="Rent" {{ $property->sale_type == 'Rent' ? 'selected' : '' }}>Rent
                                    </option>
                                    {{-- SEMENTARA PAKE MANUAL DULU, NANTI SALE RENT DIJADIIN TABLE BARU AJA JD TINGGAL DI LOOP --}}
                                </select>

                                @error('sale_type')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text">Building Type</span>
                                <select class="form-select @error('property_type') is-invalid @enderror"
                                    name="property_type">
                                    <option value="Apartment"
                                        {{ $property->property_type == 'Apartment' ? 'selected' : '' }}>
                                        Apartment
                                    </option>
                                    <option value="House" {{ $property->property_type == 'House' ? 'selected' : '' }}>
                                        House
                                    </option>
                                    {{-- SEMENTARA PAKE MANUAL DULU, NANTI SALE RENT DIJADIIN TABLE BARU AJA JD TINGGAL DI LOOP --}}
                                </select>
                            </div>

                            <div class="form-group mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                    name="price" value="{{ old('price', $property->price) }}">
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="address" class="form-label">Location</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="address" value="{{ old('address', $property->address) }}">
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="file" class="form-label">Upload Image</label>
                                <input type="file" name="image"
                                    class="form-control
                                    @error('image') is-invalid @enderror">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-dark"
                                onclick="return confirm('Are you sure want to update this property?')">Update</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection
