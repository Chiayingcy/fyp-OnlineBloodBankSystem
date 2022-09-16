<?php

namespace Database\Seeders;

use App\Models\Hospitals;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class HospitalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        Hospitals::create([
            'hospitalName'  => 'Hospital ABC Pulau Pinang',
            'hospitalID'    => 'H0001',
            'email'         => 'abc_hospitalPP@gmail.com',
            'phoneNo'       => '0123452654',
            'address'       => '456, Lorong ABC',
            'zipCode'       => '11700',
            'state'         => 'Penang',
            'password'      => Hash::make('@Abcd1234'),

        ]);

    }
}
