<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Refugee;
use App\City;
use App\Family;

class RefugeeController extends Controller
{
    //
    public function index()
    {
        $refugees =  Refugee::orderBy('first_name')->get();
        return view('Refugee.all')
            ->with([
                 'refugees'=> $refugees,
            ]);
        //return 'Here are all the Refugees...';
    }

    public function show($name = null)
    {
        return view('Refugee.show')->with(['name' => $name ]);
        //return 'Refugee name entered is ... ' . $name  ;
    }

    public function search(Request $request) {

        # ======== Temporary code to explore $request ==========

        # See all the properties and methods available in the $request object
        dump($request);

        # See just the form data from the $request object
        dump($request->all());

        # See just the form data for a specific input, in this case a text input
        dump($request->input('searchTerm'));

        # See what the form data looks like for a checkbox
        dump($request->input('caseSensitive'));

        # Boolean to see if the request contains data for a particular field
        dump($request->has('searchTerm')); # Should be true
        dump($request->has('publishedYear')); # There's no publishedYear input, so this should be false

        # You can get more information about a request than just the data of the form, for example...
        dump($request->path()); # "books/search"
        dump($request->is('books/search')); # True
        dump($request->is('search')); # False
        dump($request->fullUrl()); # http://foobooks.loc/books/search
        dump($request->method()); # GET
        dump($request->isMethod('post')); # False

        # ======== End exploration of $request ==========
        $city = City::where('city_name', '=', 'Chicago')->first();
        $refugee = new Refugee;
        $refugee->first_name = "Kareem";
        $refugee->last_name = 'Omari';
        $refugee->birth_year = '1992';
        $refugee->city = 'Damascus';
        $refugee->cell_phone = '24522322';
        //$refugee->city = 'Damascus';
        $refugee->city()->associate($city); # <--- Associate the author with this book
        $refugee->save();
        dump($refugee->toArray());

        $Refugee2 = Refugee::first();
        $city = $Refugee2->city;
        
        //dump( $city->city_name);
        dump($Refugee2->toArray());


        $Refugees3 = Refugee::with('city')->get();

        foreach ($Refugees3 as $refugee) {
            dump($refugee->city->city_name);
            //.' '.$refugee->author->last_name.' wrote '.$refugee->title);
        }

        dump($Refugees3->toArray());
        
        return view('Refugee.search');
    }

    public function create(Request $request)
    {
        // Get all Cities in order

        $cities = City::orderBy('city_name')->get();

        $citiesForDropDown = [];
        foreach($cities as $city){
            $citiesForDropDown[$city->id] = $city->city_name;
        }
        //dump($citiesForDropDown);

        $familiesForChechBoxes = [];

        $families = Family::orderBy('family_name')->get();

        foreach($families as $family){
            $familiesForChechBoxes[$family['id']] = $family->family_name;
        }
        //dump($familiesForChechBoxes);
        //return view('Refugee.create')->with([
        //    'citiesForDropDown' => $citiesForDropDown # Make $authorsForDropdown available for the view
        //]);
        return view('Refugee.create')
            ->with([
                'citiesForDropDown' => $citiesForDropDown,
                'familiesForChechBoxes' => $familiesForChechBoxes,
                ]);
        //return view('Refugee.create');
    }

    public function store(Request $request)
    {
        //dd($request->input('familiess'));

        $this->validate($request, [
            'firstName' => 'required|min:3',
            'lastName' => 'required|min:3',
            'birthYear' => 'required|min:3',
            //'city' => 'required|min:3',
            'cell_phone' => 'required|min:3',
            'city_id' => 'required',
        ]);
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $birthYear = $request->input('birthYear');
        $city = $request->input('city');
        $cell_phone = $request->input('cell_phone');
        $refugee = new Refugee();
        $refugee-> first_name = $firstName;
        $refugee-> last_name = $lastName;
        $refugee-> birth_year = $birthYear;
        $refugee-> city = '';
        $refugee-> cell_phone = $cell_phone;
        $refugee-> city_id = $request->input('city_id');
        $refugee->save();

        $refugee->families()->sync($request->input('familiess')); //, false));
        #
        #
        # [...Code will eventually go here to actually save this book to a database...]
        #
        #

        # Redirect the user to the page to view the book
        return redirect('/Refugee/' . $firstName);
    }

    public function edit($id)
    {

        $refugee = Refugee::where('id', '=', $id)->first();
        # Get this book and eager load its tags
        //$book = Refugee::with('tags')->find($id);
        //dd($refugee);

        $cities = City::orderBy('city_name')->get();

        $citiesForDropDown = [];
        foreach($cities as $city){
            $citiesForDropDown[$city->id] = $city->city_name;
        }
        //dump($citiesForDropDown);

        $familiesForChechBoxes = [];

        $families = Family::orderBy('family_name')->get();

        foreach($families as $family){
            $familiesForChechBoxes[$family['id']] = $family->family_name;
        }

        # Handle the case where we can't find the given book
        if (!$refugee) {
            return redirect('/Refugee')->with(
                ['alert' => 'refugee ' . $id . ' not found.']
            );
        }

        # Show the book edit form
        return view('Refugee.edit')
            ->with([
                'citiesForDropDown' => $citiesForDropDown,
                'familiesForChechBoxes' => $familiesForChechBoxes,
                'families' => $refugee->families()->pluck('family_id')->toArray(),
                //'tags' => $refugee->families()->pluck('families.id')->toArray(),
                'refugee' => $refugee
            ]);
    }

    public function update(Request $request, $id)
    {
        //dd($id);
        $this->validate($request, [
            'firstName' => 'required|min:3',
            'lastName' => 'required|min:3',
            'birthYear' => 'required|min:3',
            //'city' => 'required|min:3',
            'cell_phone' => 'required|min:3',
            'city_id' => 'required',
        ]);

        $refugee = Refugee::find($id);

        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $birthYear = $request->input('birthYear');
        $city = $request->input('city');
        $cell_phone = $request->input('cell_phone');
        //$refugee = new Refugee();
        $refugee-> first_name = $firstName;
        $refugee-> last_name = $lastName;
        $refugee-> birth_year = $birthYear;
        $refugee-> city = '';
        $refugee-> cell_phone = $cell_phone;
        $refugee-> city_id = $request->input('city_id');
        $refugee->save();

        $refugee->families()->sync($request->input('familiess')); //, false));

        return redirect('/Refugees/' . $id . '/edit')->with([
            'alert' => 'Your changes were saved'
        ]);

        # Redirect the user to the page to view the book
        //return redirect('/Refugee/' . $firstName);
    }

    public function delete($id){

        $refugee = Refugee::find($id);

        if(!$refugee){

        }
        return view('refugee.delete')->with([
            'refugee' => $refugee,
        ]);
    }

    public function destroy($id)
    {
        //dd($id);
        $refugee = Refugee::find($id);

        $refugee->families()->detach();
        $refugee->delete();
        $refugees =  Refugee::orderBy('first_name')->get();


        return redirect('Refugees')
            ->with([
                'refugees'=> $refugees,
                'alert' => '“' . $refugee->first_name . '” was removed.'
            ]);
    }

}
