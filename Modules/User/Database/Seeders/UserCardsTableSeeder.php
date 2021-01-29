<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserCardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $user_cards = [
            ['user_id'=>1,'title'=>'Kart Title','name_surname'=>'Serkan Çelik','number'=>"1111111111111111",'expire_month'=>2,'expire_year'=>2021,'cvc'=>'093'],
            ['user_id'=>2,'title'=>'Kart Title2','name_surname'=>'Ahmet Mahmut','number'=>"2222222222222222",'expire_month'=>4,'expire_year'=>2022,'cvc'=>'045'],
        ];

        DB::table('user_cards')->insert($user_cards);
    }
}
