{{-- /resources/views/books/create.blade.php --}}
@extends('layouts.master')

@section('title')
    New book
@endsection

@section('content')
    <h1>Add a new refugee</h1>

    <form method='POST' action='/Test/public/Refugees'>
        {{ csrf_field() }}

        <fieldset>
            <label for='firstName'>First Name</label>
            <input type='text' name='firstName' id='firstName' value='{{ old('firstName') }}' >

            <label for='lastName'>Last Name</label>
            <input type='text' name='lastName' id='lastName' value='{{ old('lastName') }}' >
            <br/>
            <label for='firstName'>birth Year</label>
            <input type='text' name='birthYear' id='birthYear' value='{{ old('birthYear') }}' >

            <label for='firstName'>Cell Number</label>
            <input type='text' name='cell_phone' id='cell_phone' value='{{ old('cell_phone') }}' >
            <br/>

            <label for='city_id'>* City</label>
            <select name='city_id' id='city_id'>
                <option value=''>Choose one...</option>
                @foreach($citiesForDropDown as $id => $cityName)
                    <option value='{{ $id }}'>  {{ $cityName }}</option>
                @endforeach
            </select>
            <br/>
                <label for='family_id'>* Family</label>
                @foreach($familiesForChechBoxes as $id => $family_name)
                    <ul class='families'>
                        <li>
                            <label>
                                <input

                                        type='checkbox'
                                        name='familiess[]'
                                        value='{{ $id }}'>
                                {{ $family_name }}
                            </label>
                        </li>
                    </ul>
                @endforeach


        </fieldset>

        <input type='submit' value='Add book'>
    </form>
    <a href='../Refugees'> Back to All Refugees </a>
    @if(count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection