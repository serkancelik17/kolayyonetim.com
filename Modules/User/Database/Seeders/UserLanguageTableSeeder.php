<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserLanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $languages = [
            ['id' => 1, 'code' => 'tr', 'title' => 'Türkçe'],
            ['id'=> 2, 'code' => 'en', 'title' => 'İngilizce'],
        ];

            DB::table('user_languages')->insert($languages);
    }
}
