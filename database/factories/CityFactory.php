<?php

namespace Database\Factories;

use FontLib\Table\Type\name;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name'=> fake()->name(),
            // 'country' => fake()->city(),
            'latitude' => fake()->latitude($min = -90, $max = 90),
            'longitude'=> fake()->longitude($min = -180, $max = 180),
        ];
    }
}
