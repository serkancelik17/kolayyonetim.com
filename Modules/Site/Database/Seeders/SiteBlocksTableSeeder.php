<?php

namespace Modules\Site\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SiteBlocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $blocks = [
            ['site_id'=>1,'name'=>'A'],
            ['site_id'=>1,'name'=>'B'],
            ['site_id'=>1,'name'=>'C'],
            ['site_id'=>1,'name'=>'D'],
        ];

        DB::table('site_blocks')->insert($blocks);
    }
}
