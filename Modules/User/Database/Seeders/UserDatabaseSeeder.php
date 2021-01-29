<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(UserLanguageTableSeeder::class); //languages
         $this->call(UserTableSeeder::class);
         $this->call(UserCardsTableSeeder::class); //cards
         $this->call(UserTypesTableSeeder::class); // types
        // $this->call(UserSitesTableSeeder::class); // sites
    }
}
