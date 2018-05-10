@extends('layouts.master')

@section('title')

@endsection

@push('head')
    {{-- Page specific CSS includes should be defined here; this .css file does not exist yet, but we can create it --}}
    <link href='refuugees.css' type='text/css' rel='stylesheet'>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        align:center;
        margin-left:auto;
        margin-right:auto;
    }
    th, td {
        padding: 20px;
        text-align: right;
    }

    body {
        color: black;
    }

    h1 {
        color: green;
        margin-left:auto;
        margin-right:auto;
    }
    a{
        margin-left:auto;
        margin-right:auto;
    }
    div{
        border: 0px solid black;
        border-collapse: collapse;
        align:center;
        margin-left:auto;
        margin-right:auto;
    }
</style>
@endpush

@section('content')
    <div style='margin-left:800px;' >
    <h1>All Refugees</h1>
    <a class='refugees cf' href='Refugee/create'> Create New Refugee </a>
        </div>
    <br/>
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
                    <a class='refugees cf' href='Refugees/{{ $refugee->id }}/edit'> Edit </a>
                    <br/>
                    <a class='refugees cf' href='Refugees/{{ $refugee->id }}/delete'> Delete </a>
                </td>
            </tr>
        </table>
            @endforeach
@endsection