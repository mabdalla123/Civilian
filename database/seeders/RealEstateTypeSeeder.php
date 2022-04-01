<?php

namespace Database\Seeders;

use App\Models\RealEstateType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RealEstateTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RealEstateType::create(['type_name'=>'Apartment']);
        RealEstateType::create(['type_name'=>'House']);
        RealEstateType::create(['type_name'=>'Villa']);

    }
}
