<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Acceptances>
 */
class AcceptancesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $usersId = User::pluck('id')->toArray();
        return [
           'city_id'=>$this->faker->randomElement($usersId),
           'university_name'=>$this->faker->unique()->name,
           'Fees'=>$this->faker->numberBetween(1000,10000)
        ];
    }
}
