<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        User::create([
            'name'      => 'Donor',
            'ic'        => '010101-07-0123',   
            'email'     => 'donor@gmail.com',
            'bloodType' => 'O+',
            'gender'    => 'female',
            'phoneNo'   => '0123452654',
            'address'   => '123, Jalan Timun, Taman ABC',
            'zipCode'   => '11500',
            'state'     => 'Penang',
            'password'  => Hash::make('@Abcd1234'),
        ]);

      
    }
}
