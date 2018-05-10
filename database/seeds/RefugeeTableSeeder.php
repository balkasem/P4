<?php

use Illuminate\Database\Seeder;
use App\Refugee;
use App\City;

class RefugeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $refugees = [
            ['Sika', 'Balkasem', '1995', 'farmington hills', '2478346269'],
            ['Kareem', 'Omari', '2008', 'Damascus', '2483462648'],
            ['Latife', 'Tony', '1980', 'Farmington Hills', '2483462647'],
            ['Yassin', 'Jeo', '1975', 'Troy', '2483462466'],
            ['Steve', 'Roberts', '1954', 'Sterling Hights', '2483452299'],
        ];

        $count = count($refugees);

        foreach ( $refugees as $key => $refugeeData){
            $refugee = new Refugee();

            $city_id = City::where('city_name', '=', 'Detroit')->pluck('id')->first();
            $refugee->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $refugee->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $refugee->first_name = $refugeeData[0];
            $refugee->last_name = $refugeeData[1];
            $refugee->birth_year = $refugeeData[2];
            $refugee->city = $refugeeData[3];
            $refugee->city_id = $city_id;
            $refugee->cell_phone = $refugeeData[4];
            //if($address_id != null){
            //    $refugee->address_id = $address_id;
            //}

            $refugee->save();
            $count--;
        }
    }
}
