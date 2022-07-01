@extends('properties.main')

@section('info')
    @if (request('search') == '')
        <p>Showing All Properties</p>
    @else
        <p>Showing Search Results for "{{ request('search') }}"</p>
    @endif
@endsection
