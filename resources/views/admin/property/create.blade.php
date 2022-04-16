@extends('layouts.main')

@section('content')
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-md-6">
            <form action="/manage-property" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="sale_type">Sales Type</label>
                    <select class="form-select @error('sale_type') is-invalid @enderror" name="sale_type">
                        <option selected>Choose the type of sales</option>
                        <option value="1">Sale</option>
                        <option value="2">Rent</option>
                    </select>
                    @error('sale_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="property_type">Building Type</label>
                    <select class="form-select @error('property_type') is-invalid @enderror" name="property_type">
                        <option selected>Choose the building type</option>
                        <option value="1">Apartment</option>
                        <option value="2">House</option>
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="price">Price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                        value="{{ old('price') }}">
                    @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="address">Location</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" name="address"
                        value="{{ old('address') }}">
                    @error('address')
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
