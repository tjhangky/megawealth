@extends('layouts.main')

@section('title', 'Manage Property')

@section('content')
    <div class="container">

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a href="/manage-company/create" class="btn btn-dark mb-5">+ Add Office</a>

        <div class="row">
            @foreach ($offices as $office)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">

                        <img src="{{ asset('storage/' . $office->image) }}" class="card-img-top">

                        <div class="card-body">
                            <p class="card-title">{{ $office->name }}</p>
                            <p class="card-text ">{{ $office->address }}</p>
                            <p class="card-text">{{ $office->contact_name }} : {{ $office->contact_phone }}</p>

                            <div class="d-flex justify-content-evenly">
                                <a href="/manage-company/{{ $office->id }}/edit" class="btn btn-dark">Update</a>

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
