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
    $groups = [
        [
            'name' => 'Group 1',
            'location' => 'New York',
            'no_of_users' => 20,
            'no_of_cleanups' => 10,
        ],
        [
            'name' => 'Group 2',
            'location' => 'Los Angeles',
            'no_of_users' => 30,
            'no_of_cleanups' => 15,
        ],
        [
            'name' => 'Group 3',
            'location' => 'Chicago',
            'no_of_users' => 25,
            'no_of_cleanups' => 12,
        ],
        [
            'name' => 'Group 4',
            'location' => 'Houston',
            'no_of_users' => 35,
            'no_of_cleanups' => 18,
        ],
        [
            'name' => 'Group 5',
            'location' => 'Phoenix',
            'no_of_users' => 40,
            'no_of_cleanups' => 20,
        ],
        [
            'name' => 'Group 6',
            'location' => 'Philadelphia',
            'no_of_users' => 45,
            'no_of_cleanups' => 22,
        ],
        [
            'name' => 'Group 7',
            'location' => 'San Antonio',
            'no_of_users' => 50,
            'no_of_cleanups' => 25,
        ],
        [
            'name' => 'Group 8',
            'location' => 'San Diego',
            'no_of_users' => 55,
            'no_of_cleanups' => 28,
        ],
        [
            'name' => 'Group 9',
            'location' => 'Dallas',
            'no_of_users' => 60,
            'no_of_cleanups' => 30,
        ],
        [
            'name' => 'Group 10',
            'location' => 'San Jose',
            'no_of_users' => 65,
            'no_of_cleanups' => 32,
        ]

        // Add more predefined groups as needed
    ];

    return $this->faker->randomElement($groups);
}
}