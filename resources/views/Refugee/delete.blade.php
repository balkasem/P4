@extends('layouts.master')

@push('head')
    <link href='/css/books/delete.css' rel='stylesheet'>
@endpush

@section('title')
    Confirm deletion: {{ $refugee->first_name }}
@endsection

@section('content')
    <h1>Confirm deletion</h1>

    <p>Are you sure you want to delete <strong>{{ $refugee->first_name }}</strong>?</p>

    <img src='{{ $refugee->cover_url }}' class='cover' alt='Cover image for {{ $refugee->first_name }}'>

    <form method='POST' action='/Refugees/{{ $refugee->id }}/destroy'>

        {{ csrf_field() }}
        <input type='submit' value='Yes, delete it!' class='btn btn-danger btn-small'>
    </form>

    <p class='cancel'>
        <a href='../'> No, Go Back to All Refugees. </a>
    </p>
@endsection