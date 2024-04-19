<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CleanUp;

class CleanUpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    // Define an array of cleanups to seed into the database
    $cleanups = [
        [
            'location' => 'Killiney Beach, Dublin',
            'latitude' => 53.257716,
            'longitude' => -6.112020,
            'time' => '12:00:00',
            'date' => '2022-01-01',
            'description' => 'Cleanup on Killiney Beach',
            'group_id' => 1,
        ],
        [
            'location' => 'Keem beach, Achill',
            'latitude' => 53.967609,
            'longitude' => -10.192553,
            'time' => '13:00:00',
            'date' => '2022-02-01',
            'description' => 'Cleanup on Keem beach',
            'group_id' => 2,
        ],
        [
            'location' => 'Portsalon Beach, Donegal',
            'latitude' => 55.188995,
            'longitude' => -7.609561,
            'time' => '14:00:00',
            'date' => '2022-03-01',
            'description' => 'Cleanup on Portsalon Beach',
            'group_id' => 3,
        ],
        [
            'location' => 'Brittas Bay Beach, Wicklow',
            'latitude' => 52.889973,
            'longitude' => -6.052106,
            'time' => '15:00:00',
            'date' => '2022-04-01',
            'description' => 'Cleanup on Brittas Bay Beach',
            'group_id' => 4,
        ],
        [
            'location' => 'Portmarnock Beach, Dublin',
            'latitude' => 53.427799,
            'longitude' => -6.122886,
            'time' => '16:00:00',
            'date' => '2022-05-01',
            'description' => 'Cleanup on Portmarnock Beach',
            'group_id' => 1,
        ],
        [
            'location' => 'Lahinch Beach, Clare',
            'latitude' => 52.933402,
            'longitude' => -9.347941,
            'time' => '17:00:00',
            'date' => '2022-06-01',
            'description' => 'Cleanup on Lahinch Beach',
            'group_id' => 5,
        ],
        [
            'location' => 'Rush North Beach, Dublin',
            'latitude' => 53.530804,
            'longitude' => -6.086972,
            'time' => '18:00:00',
            'date' => '2022-07-01',
            'description' => 'Cleanup on Rush North Beach',
            'group_id' => 1,
        ],
        [
            'location' => 'Enniscrone Beach, Sligo',
            'latitude' => 54.212548,
            'longitude' => -9.097056,
            'time' => '19:00:00',
            'date' => '2022-08-01',
            'description' => 'Cleanup on Enniscrone Beach',
            'group_id' => 6,
        ],
        [
            'location' => 'Ballycastle Beach, Mayo',
            'latitude' => 54.295282,
            'longitude' => -9.378540,
            'time' => '20:00:00',
            'date' => '2022-09-01',
            'description' => 'Cleanup on Ballycastle Beach',
            'group_id' => 7,
        ],
        [
            'location' => 'Silver Strand Beach, Donegal',
            'latitude' => 54.664426,
            'longitude' => -8.776420,
            'time' => '21:00:00',
            'date' => '2022-10-01',
            'description' => 'Cleanup on Silver Strand Beach',
            'group_id' => 3,
        ]

    ];
    // Loop through each cleanup in the cleanups array and create a new cleanup in the database
    foreach ($cleanups as $cleanup) {
        Cleanup::create($cleanup);
    }
}
}
