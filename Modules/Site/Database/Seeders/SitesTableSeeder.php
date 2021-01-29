<?php

namespace Modules\Site\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        //238 - çanakkale merkez
        $sites = [
            ['location_district_id'=>238,'name'=>'Yıldızkent Sitesi'],
        ];

        DB::table('sites')->insert($sites);
    }
}
