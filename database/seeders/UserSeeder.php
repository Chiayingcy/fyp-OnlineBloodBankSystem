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
            'ic'        => '010101070123',
            'age'       => '21',   
            'email'     => 'donor@gmail.com',
            'bloodType' => '5',
            'gender'    => 'female',
            'phoneNo'   => '0123452654',
            'address'   => '123, Jalan Timun, Taman ABC',
            'zipCode'   => '11500',
           // 'state' => 'Penang',
            //'stateCode' => 'MY-07',
            'stateID'   => '7',
            'role'      => '1',
            'password'  => Hash::make('@Abcd1234'),
        ]);

      
    }
}
