{{-- /resources/views/books/create.blade.php --}}
@extends('layouts.master')

@section('title')
    New book
@endsection

@section('content')
    <h1>Update Refugee</h1>
    <form method='POST' action='/Test/public/Refugees/{{ $refugee->id }}'>
        {{ csrf_field() }}

        <fieldset>
            <label for='firstName'>First Name</label>
            <input type='text' name='firstName' id='firstName' value='{{ old('firstName', $refugee->first_name ) }}' >

            <label for='lastName'>Last Name</label>
            <input type='text' name='lastName' id='lastName' value='{{ old('lastName', $refugee->last_name ) }}' >
            <br/>
            <label for='firstName'>birth Year</label>
            <input type='text' name='birthYear' id='birthYear' value='{{ old('city', $refugee->birth_year ) }}' >

            <label for='firstName'>Cell Number</label>
            <input type='text' name='cell_phone' id='cell_phone' value='{{ old('cell_phone', $refugee->cell_phone ) }}' >

            <br/>
            <label for='author_id'>* City</label>
            <select name='city_id' id='city_id'>
                <option value=''>Choose one...</option>
                @foreach($citiesForDropDown as $id => $cityName)
                    <option value='{{ $id }}'>  {{ $cityName }}</option>
                    <option value='{{ $id }}' {{ (old('city_id', $refugee->city_id) == $id) ? 'selected' : '' }}>{{ $cityName }}</option>
                @endforeach
            </select>
            <br/>
            <label for='family_id'>* Family</label>
            @foreach($familiesForChechBoxes as $id => $family_name)
                <ul class='families'>
                    <li>
                        <label>
                            <input
                                    {{ (in_array( $id, $families) ) ? 'checked' : '' }}
                                    type='checkbox'
                                    name='familiess[]'
                                    value='{{ $id }}'

                                    >
                            {{ $family_name }}
                        </label>
                    </li>
                </ul>
            @endforeach
            <input type='submit' value='Update Refugee'>
            <a href='../'> Back to All Refugees </a>
        </fieldset>

    </form>

    @if(count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection

