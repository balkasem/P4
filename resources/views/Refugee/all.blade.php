@extends('layouts.master')

@section('title')

@endsection

@push('head')
    {{-- Page specific CSS includes should be defined here; this .css file does not exist yet, but we can create it --}}
    <link href='/css/books/show.css' type='text/css' rel='stylesheet'>
@endpush

@section('content')
    <h1>All Refugees</h1>
    <a class='book cf' href='Refugee/create'> Create New Refugee </a>
        @foreach($refugees as $refugee)
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Birth Year</th>
                <th>Cell Number</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>{{ $refugee->first_name }}</td>
                <td>{{  $refugee->last_name }}</td>
                <td>{{  $refugee->birth_year }}</td>
                <td>{{  $refugee->cell_phone }}</td>
                <td>
                    <a class='book cf' href='Refugees/{{ $refugee->id }}/edit'> Edit </a>
                    <br/>
                    <a class='book cf' href='Refugees/{{ $refugee->id }}/delete'> Delete </a>
                </td>
            </tr>
        </table>
            @endforeach
@endsection