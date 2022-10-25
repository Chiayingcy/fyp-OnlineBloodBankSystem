<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
            UserSeeder::class,
            HospitalsSeeder::class,
            AdminSeeder::class,
            StateSeeder::class,
            BloodTypeSeeder::class,
            RoleSeeder::class,
            UserTestSeeder::class,
        ]);

    }

}
