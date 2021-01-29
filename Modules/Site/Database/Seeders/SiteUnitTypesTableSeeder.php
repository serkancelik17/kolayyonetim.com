<?php

namespace Modules\Site\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SiteUnitTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $unit_types = [
            ['site_id'=>1,'name'=>'3+1'],
        ];

        DB::table('site_unit_types')->insert($unit_types);
    }
}
