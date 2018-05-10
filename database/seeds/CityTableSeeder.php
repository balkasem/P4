<?php

use Illuminate\Database\Seeder;
use App\City;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $authors = [
            ['Detroit'],
            ['Los Angelos'],
            ['Chicago'],
        ];
        $count = count($authors);

        # Loop through each author, adding them to the database
        foreach ($authors as $authorData) {
            $author = new City();

            $author->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $author->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $author->city_name = $authorData[0];
            $author->save();

            $count--;
        }
    }
}
