<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FamilyTableSeeder::class);
        $this->call(CityTableSeeder::class);
        $this->call(RefugeeTableSeeder::class);
        $this->call(RefugeeFamilyTableSeeder::class);
    }
}
