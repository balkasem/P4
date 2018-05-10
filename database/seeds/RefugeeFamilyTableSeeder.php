<?php

use Illuminate\Database\Seeder;
use App\Family;
use App\Refugee;

class RefugeeFamilyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $refugees = [
            'Sika' => ['Balkasem', 'Najjar', 'Jhon'],
            'Kareem' => ['Muller', 'Najjar', 'Jhon'],
            'Latife' => ['Jhon', 'Najjar', 'Jhon'],
            'Yassin' => ['Jhon', 'Najjar', 'Jhon'],
            'Steve' => ['Jhon', 'Najjar', 'Jhon']
        ];
        
        foreach ( $refugees as $firstName => $families ){

            $refugee = Refugee::where('first_name','LIKE', $firstName)->first();
            foreach( $families as $family_name ){
                $family = Family ::where('family_name','LIKE', $family_name )->first();
                $refugee->families()->save($family);
            }
        }
    }
}
