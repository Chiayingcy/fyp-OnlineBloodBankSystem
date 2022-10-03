<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\role;

class RoleSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = [
            [
                'id' => "1",
                'role_description' => "Donor",
            ],
    
            [
                'id' => "2",
                'role_description' => "Hospital",
            ],
    
            [
                'id' => "3",
                'role_description' => "Admin",
            ],

            ];
    
            role::insert($role);
    }
}
