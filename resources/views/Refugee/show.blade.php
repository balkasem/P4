@extends('layouts.master')

@section('title')
    {{ $name }}
@endsection

@push('head')
    {{-- Page specific CSS includes should be defined here; this .css file does not exist yet, but we can create it --}}
    <link href='/css/refugees/show.css' type='text/css' rel='stylesheet'>
@endpush

@section('content')
    <h1>{{ $name }}</h1>

    <p>
        New refugee {{ $name }} is added successfully ...
        <br/>
        <a href='/Refugees'> Back to All Refugees </a>
    </p>
@endsection