<?php

namespace Modules\Site\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SiteUnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $blocks = [1,2,3,4];

        for($i=0;$i<sizeof($blocks);$i++) {
            for($no = 1;$no<=24;$no++) {
                $unit = [
                    'block_id' => $blocks[$i],
                    'no' => $no,
                ];

                DB::table('site_units')->insert($unit);

            }
        }

    }
}
