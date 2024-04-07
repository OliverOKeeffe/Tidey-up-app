<?php

namespace Database\Factories;

use App\Models\CleanUp;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CleanUp>
 */
class CleanUpFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'location' => $this->faker->city(),
            'time' => $this->faker->time(),
            'date' => $this->faker->date(),
            'description' => $this->faker->realText(150),
            'group_id' => Group::inRandomOrder()->take(1)->pluck('id')[0]

        ];
    }
}
