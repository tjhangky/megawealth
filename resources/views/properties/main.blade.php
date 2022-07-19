@extends('layouts.main')

@section('content')
    <div class="container mt-5">
        @if (session('status'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @yield('info')

        @if ($properties->isEmpty())
            <div class="d-flex justify-content-center">
                No Properties Found.
            </div>
        @else
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
                                <div class="d-flex mb-2">
                                    <span class="badge bg-primary">{{ $property->property_type }}</span>
                                </div>
                                <div class="d-flex justify-content-evenly">
                                    <form action="/cart" method="POST">
                                        @csrf
                                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                                        <button type="submit" class="btn btn-dark">
                                            @if ($property->sale_type == 'Rent')
                                                Rent
                                            @else
                                                Buy
                                            @endif
                                        </button>
                                    </form>
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
