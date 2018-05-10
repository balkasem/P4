<?php

use Illuminate\Database\Seeder;
use App\Family;

class FamilyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $refugees = 
            ['Balkasem', 'Najjar', 'Jhon', 'Muller'];

        //$refugees = [
          //  ['Balkasem', '6', 'Ramiz', '2478346269'],
           // ['Najjar', '3', 'Salem', '2478346269'],
            //['Jhon', '4', 'Badee', '2478346269'],
            //['Muller', '1', 'Harash', '2478346269'],
            //['Rakan', '8', 'Latife', '2478346269'],
        //];

        $count = count($refugees);

        foreach ( $refugees as $familyName){
            $family = new Family();

            //$city_id = City::where('city_name', '=', 'Detroit')->pluck('id')->first();
            $family->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $family->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $family->family_name = $familyName;
            $family->member_count = '2';
            $family->sponser_name = 'Ramiz';
            $family->cell_number = '2233344';
            //$refugee->city_id = $city_id;
            //$refugee->cell_phone = $refugeeData[4];
            //if($address_id != null){
            //    $refugee->address_id = $address_id;
            //}

            $family->save();
            $count--;
        }
    }
}
