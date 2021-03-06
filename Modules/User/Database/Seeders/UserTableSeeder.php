<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

       $users = [
           ['name' => 'Serkan Çelik','email'=>'syaramaz@gmail.com','password'=>bcrypt('4414558'),'phone_number'=>'5444556958','language_id'=>1],
           ['name' => 'Ahmet Deneme','email'=>'deneme@gmail.com','password'=>bcrypt('4414558'),'phone_number'=>'5440000000','language_id'=>1],
           ];

       DB::table('users')->insert($users);
    }
}
