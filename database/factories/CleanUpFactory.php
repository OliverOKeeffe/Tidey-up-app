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
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    public function definition(): array
    {
        $cleanups = [
            [
                'location' => 'New York',
                'latitude' => 40.7128,
                'longitude' => -74.0060,
                'time' => '12:00:00',
                'date' => '2022-01-01',
                'description' => 'Cleanup in New York',
                'group_id' => 1,
            ],
            [
                'location' => 'Los Angeles',
                'latitude' => 34.0522,
                'longitude' => -118.2437,
                'time' => '13:00:00',
                'date' => '2022-02-01',
                'description' => 'Cleanup in Los Angeles',
                'group_id' => 2,
            ],
            [
                'location' => 'Chicago',
                'latitude' => 41.8781,
                'longitude' => -87.6298,
                'time' => '14:00:00',
                'date' => '2022-03-01',
                'description' => 'Cleanup in Chicago',
                'group_id' => 3,
            ],
            [
                'location' => 'Houston',
                'latitude' => 29.7604,
                'longitude' => -95.3698,
                'time' => '15:00:00',
                'date' => '2022-04-01',
                'description' => 'Cleanup in Houston',
                'group_id' => 4,
            ],
            [
                'location' => 'Phoenix',
                'latitude' => 33.4484,
                'longitude' => -112.0740,
                'time' => '16:00:00',
                'date' => '2022-05-01',
                'description' => 'Cleanup in Phoenix',
                'group_id' => 5,
            ],
            [
                'location' => 'Philadelphia',
                'latitude' => 39.9526,
                'longitude' => -75.1652,
                'time' => '17:00:00',
                'date' => '2022-06-01',
                'description' => 'Cleanup in Philadelphia',
                'group_id' => 6,
            ],
            [
                'location' => 'San Antonio',
                'latitude' => 29.4241,
                'longitude' => -98.4936,
                'time' => '18:00:00',
                'date' => '2022-07-01',
                'description' => 'Cleanup in San Antonio',
                'group_id' => 7,
            ],
            [
                'location' => 'San Diego',
                'latitude' => 32.7157,
                'longitude' => -117.1611,
                'time' => '19:00:00',
                'date' => '2022-08-01',
                'description' => 'Cleanup in San Diego',
                'group_id' => 8,
            ],
            [
                'location' => 'Dallas',
                'latitude' => 32.7767,
                'longitude' => -96.7970,
                'time' => '20:00:00',
                'date' => '2022-09-01',
                'description' => 'Cleanup in Dallas',
                'group_id' => 9,
            ],
            [
                'location' => 'San Jose',
                'latitude' => 37.3382,
                'longitude' => -121.8863,
                'time' => '21:00:00',
                'date' => '2022-10-01',
                'description' => 'Cleanup in San Jose',
                'group_id' => 10,
            ]
            // Add more predefined cleanups as needed
        ];
    
        return $this->faker->randomElement($cleanups);
    }

    
}
