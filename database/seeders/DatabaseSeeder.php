<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call the specified seeders to seed data into the database
        $this->call([
                RoleSeeder::class,
                UserSeeder::class,
                GroupSeeder::class,
                CleanUpSeeder::class,
               
        ]);
    }
}