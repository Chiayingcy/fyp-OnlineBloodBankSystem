<?php

namespace Database\Seeders;

use App\Models\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Admin::create([
            'adminName'     => 'Claudia Tan',
            'adminID'       => 'A0001',
            'email'         => 'claudiaTan@gmail.com',
            'password'      => Hash::make('@Abcd1234'),

        ]);
    }
}
