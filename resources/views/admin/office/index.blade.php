@extends('layouts.main')

@section('content')
    <div class="container">

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a href="/manage-company/create" class="btn btn-primary mb-5">+ Add Office</a>

        <div class="d-flex">
            @foreach ($offices as $office)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">

                        @if ($office->image)
                            <img src="{{ asset('storage/' . $office->image) }}" class="card-img-top">
                        @else
                            {{-- NANTI INI DI DELETE --}}
                            <img class="card-img-top" src="https://source.unsplash.com/1600x900/?bulding"
                                alt="Card image cap">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $office->name }}</h5>
                            <p class="card-text ">{{ $office->address }}</p>
                            <p class="card-text">{{ $office->contact_name }} : {{ $office->contact_phone }}</p>

                            <div class="d-flex justify-content-evenly">
                                <a href="/manage-company/{{ $office->id }}/edit" class="btn btn-primary">Update</a>

                                <form action="/manage-company/{{ $office->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Are you sure want to delete {{ $office->name }} ?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $offices->links() }}
        </div>

    </div>
@endsection
