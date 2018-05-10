@extends('layouts.master')

@section('title')
    Search
@endsection

@section('content')
    <h1>Search </h1>

    <form method='GET' action='/Test/public/Refugees/search'>

        <fieldset>
            <label for='searchTerm'>Search by title:</label>
            <input type='text' name='searchTerm' id='searchTerm'>

            <input type='checkbox' name='caseSensitive'>
            <label>case sensitive</label>
        </fieldset>

        <input type='submit' value='Search' class='btn btn-primary btn-small'>

    </form>
@endsection