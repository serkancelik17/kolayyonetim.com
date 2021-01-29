<?php

namespace Modules\Location\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LocationDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(LocationCountriesTableSeeder::class); //countries
        $this->call(LocationCitiesAndDistrictsTableSeeder::class); // cities and districts
    }
}
