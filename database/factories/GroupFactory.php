<?php

namespace Database\Factories;

use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->country(),
            'location' => $this->faker->city(),
            'no_of_users' => $this->faker->numberBetween($min = 10, $max = 50),
            'no_of_cleanups' => $this->faker->numberBetween($min = 1, $max = 10),
        ];
    }
}