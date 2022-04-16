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
                        <img class="card-img-top" src="https://source.unsplash.com/1600x900/?bulding" alt="Card image cap">
                        <div class="card-body">
                            @if ($property->sale_type == 'Rent')
                                <h5 class="card-title">${{ $property->price }} / month</h5>
                            @else
                                <h5 class="card-title">${{ $property->price }}</h5>
                            @endif

                            <p class="card-text">{{ $property->address }}</p>
                            <div class="d-flex">
                                <p class="card-tag tag-property-type">{{ $property->property_type }}</p>
                                <p class="card-tag tag-sale-type">{{ $property->sale_type }}</p>
                                <p class="card-tag tag-status">{{ $property->status }}</p>
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