@extends('layouts.main')

@section('content')
    <div class="container">

        @if ($properties->isEmpty())
            <div class="d-flex justify-content-center">
                No Properties Found.
            </div>
        @else
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <a href="/manage-property/create" class="btn btn-primary mb-5">+ Add Property</a>
            <div class="d-flex">
                @foreach ($properties as $property)
                    <div class="card mx-1" style="width: 18rem;">

                        @if ($property->image)
                            <img src="{{ asset('storage/' . $property->image) }}" class="card-img-top">
                        @else
                            {{-- NANTI INI DI DELETE --}}
                            <img class="card-img-top" src="https://source.unsplash.com/1600x900/?bulding"
                                alt="Card image cap">
                        @endif

                        <div class="card-body">
                            @if ($property->sale_type == 'Rent')
                                <h5 class="card-title">${{ $property->price }} / month</h5>
                            @else
                                <h5 class="card-title">${{ $property->price }}</h5>
                            @endif

                            <p class="card-text">{{ $property->address }}</p>
                            <div class="d-flex mb-2">
                                <span class="badge bg-primary me-1">{{ $property->property_type }}</span>
                                <span class="badge bg-danger me-1">{{ $property->sale_type }}</span>
                                <span class="badge bg-warning me-1">{{ $property->status }}</span>
                            </div>

                            <div class="d-flex justify-content-around">
                                <a href="/manage-property/{{ $property->id }}/edit" class="btn btn-primary">Update</a>

                                <form action="/manage-property/{{ $property->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure want to delete {{ $property->name }} ?')">Delete</button>
                                </form>

                                @if ($property->status == 'Cart')
                                    <form action="/manage-property/{{ $property->id }}/finish" method="POST">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-success"
                                            onclick="return confirm('Are you sure want to finish {{ $property->name }} transaction ?')">Finish</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $properties->links() }}
            </div>
        @endif



    </div>
@endsection
