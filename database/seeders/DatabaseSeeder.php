<?php

namespace Database\Seeders;

use Database\Factories\CityFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
         \App\Models\User::factory(1)->create();
         \App\Models\City::factory(10)->create();
         //\App\Models\Acceptances::factory(10)->create();
        $this->call(RealEstateTypeSeeder::class);
      
    }
}
