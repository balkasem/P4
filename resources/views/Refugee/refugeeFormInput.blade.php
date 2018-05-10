<label for='firstName'>First Name</label>
<input type='text' name='firstName' id='firstName' value='{{ old('firstName') }}' >

<label for='lastName'>Last Name</label>
<input type='text' name='lastName' id='lastName' value='{{ old('lastName') }}' >
<br/>
<label for='firstName'>birth Year</label>
<input type='text' name='birthYear' id='birthYear' value='{{ old('city') }}' >

<label for='firstName'>Cell Number</label>
<input type='text' name='cell_phone' id='cell_phone' value='{{ old('cell_phone') }}' >
<br/>
<label for='streetAddress'>Street Address</label>
<input type='text' name='streetAddress' id='streetAddress' value='{{ old('streetAddress') }}' >

<label for='unitNumber'>Unit Number</label>
<input type='text' name='unitNumber' id='unitNumber' value='{{ old('unitNumber') }}' >
<br/>
<label for='firstName'>Zip Code</label>
<input type='text' name='city' id='zipCode' value='{{ old('zipCode') }}' >

<label for='firstName'>City</label>
<input type='text' name='city' id='city' value='{{ old('city') }}' >

<label for='author_id'>* City</label>
<select name='city_id' id='city_id'>
    <option value=''>Choose one...</option>
    @foreach($citiesForDropDown as $id => $cityName)
        <option value='{{ $id }}'>  {{ $cityName }}</option>
    @endforeach
</select>