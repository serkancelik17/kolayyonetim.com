<?php

namespace Modules\Site\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SiteUnitGroupsTableSeeder extends Seeder
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
            ['site_id'=>1,'name'=>'Bağımsız Bölüm Grubu 1'],
            ['site_id'=>1,'name'=>'Bağımsız Bölüm Grubu 2'],
        ];

        DB::table('site_unit_types')->insert($unit_types);
    }
}
