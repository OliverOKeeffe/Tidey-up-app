<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    // Define an array of groups to seed into the database
    $groups = [
        [
            'name' => 'Group 1',
            'location' => 'Dublin',
            'no_of_users' => 20,
            'no_of_cleanups' => 10,
        ],
        [
            'name' => 'Group 2',
            'location' => 'Achill',
            'no_of_users' => 30,
            'no_of_cleanups' => 15,
        ],
        [
            'name' => 'Group 3',
            'location' => 'Donegal',
            'no_of_users' => 25,
            'no_of_cleanups' => 12,
        ],
        [
            'name' => 'Group 4',
            'location' => 'Wicklow',
            'no_of_users' => 35,
            'no_of_cleanups' => 18,
        ],
        [
            'name' => 'Group 5',
            'location' => 'Clare',
            'no_of_users' => 40,
            'no_of_cleanups' => 20,
        ],
        [
            'name' => 'Group 6',
            'location' => 'Sligo',
            'no_of_users' => 45,
            'no_of_cleanups' => 22,
        ],
        [
            'name' => 'Group 7',
            'location' => 'Mayo',
            'no_of_users' => 50,
            'no_of_cleanups' => 25,
        ],
    ];

    // Loop through the groups array and create a new group for each item
    foreach ($groups as $group) {
        Group::create($group);
    }
}
}