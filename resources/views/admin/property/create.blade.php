@extends('layouts.main')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="/manage-property" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="sale_type">Sales Type</label>
                            <select class="form-select @error('sale_type') is-invalid @enderror" name="sale_type">
                                <option selected>Choose the type of sales</option>
                                {{-- NANTI DIGANTI PAKE TABLE --}}
                                <option value="Sale">Sale</option>
                                <option value="Rent">Rent</option>
                            </select>
                            @error('sale_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="property_type">Building Type</label>
                            <select class="form-select @error('property_type') is-invalid @enderror" name="property_type">
                                <option selected>Choose the building type</option>
                                {{-- NANTI DIGANTI PAKE TABLE --}}
                                <option value="Apartment">Apartment</option>
                                <option value="House">House</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                                value="{{ old('price') }}">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Location</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                                value="{{ old('address') }}">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Upload Image</label>
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
