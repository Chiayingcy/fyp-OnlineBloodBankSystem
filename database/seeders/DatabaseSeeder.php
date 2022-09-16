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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

         $this->call([
            UserSeeder::class,
            HospitalsSeeder::class,
            AdminSeeder::class,
        ]);

   //     \App\Models\User::factory()->create([
    //        'name'      => 'Donor',
    //        'ic'        => '010101-07-0123',   
    //        'email'     => 'donor@gmail.com',
    //        'bloodType' => 'O+',
     //       'gender'    => 'female',
     //       'phoneNo'   => '0123452654',
     //       'address'   => '123, Jalan Timun, Taman ABC',
    //        'zipCode'   => '11500',
     //       'state'     => 'Penang',
    //        'password'  => Hash::make(123456789),
    //    ]);

    //    \App\Models\Hospitals::factory()->create([
      //      'hospitalName'  => 'Hospital ABC Pulau Pinang',
       //     'hospitalID'    => 'H0001',
      //      'email'         => 'abc_hospitalPP@gmail.com',
      //      'phoneNo'       => '0123452654',
      //      'address'       => '456, Lorong ABC',
      //      'zipCode'       => '11700',
     //       'state'         => 'Penang',
    //        'password'      => Hash::make(123456789),
   //     ]);

    //    \App\Models\Admin::factory()->create([
   //         'adminName'     => 'Claudia Tan',
    //        'adminID'       => 'A0001',
     //       'email'         => 'claudiaTan',
   //         'password'      => Hash::make(123456789),
   //     ]);
    }

}
