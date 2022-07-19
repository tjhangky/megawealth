@extends('layouts.main')

@section('title', 'Manage Property')

@section('content')
    <div class="container mt-4">

        @if ($properties->isEmpty())
            <div class="d-flex
        justify-content-center">
                No Properties Found.
            </div>
        @else
            {{-- status crud properti --}}
            @if (session('status'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- info --}}
            @if (request('search') == '')
                <p>Showing All Properties</p>
            @else
                <p>Showing Search Results for "{{ request('search') }}"</p>
            @endif

            <a href="/manage-property/create" class="btn btn-dark mb-4">+ Add Property</a>

            <div class="row">
                @foreach ($properties as $property)
                    <div class="col-md-3">
                        <div class="card popup">

                            <img src="{{ asset('storage/' . $property->image) }}" class="card-img-top">

                            <div class="card-body">
                                <h5 class="card-title">
                                    @if ($property->sale_type == 'Rent')
                                        ${{ number_format($property->price, 0, '.', ',') }} / month
                                    @else
                                        ${{ number_format($property->price, 0, '.', ',') }}
                                    @endif
                                </h5>

                                <p class="card-text">{{ $property->address }}</p>
                                <div class="d-flex mb-3">
                                    <span class="badge bg-primary me-1">{{ $property->property_type }}</span>
                                    <span class="badge bg-danger me-1">{{ $property->sale_type }}</span>
                                    <span class="badge bg-warning me-1">{{ $property->status }}</span>
                                </div>

                                <div class="d-flex justify-content-around">
                                    <a href="/manage-property/{{ $property->id }}/edit" class="btn btn-primary">Update</a>

                                    @if ($property->status == 'Open')
                                        <form action="/manage-property/{{ $property->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('Are you sure want to delete {{ $property->name }} ?')">Delete</button>
                                        </form>
                                    @endif


                                    {{-- cek status property yg cart --}}
                                    @if ($property->status == 'Cart')
                                        <form action="/manage-property/{{ $property->id }}/finish" method="POST">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-success"
                                                onclick="return confirm('Are you sure want to finish this transaction ?')">Finish</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $properties->withQueryString()->links() }}
            </div>
        @endif



    </div>
@endsection
