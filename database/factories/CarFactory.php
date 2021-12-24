<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\departament;

class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'model' => $this->faker->sentence(),
            'brand' => $this->faker->sentence(),
            'department' => $this->faker->sentence(),
        ];
    }
}
