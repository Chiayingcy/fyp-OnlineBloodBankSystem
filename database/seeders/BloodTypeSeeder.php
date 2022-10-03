<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BloodType;

class BloodTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $bloodType = [
            [
                'bloodType' => "A+",
            ],
    
            [
                'bloodType' => "A-",
            ],
    
            [
                'bloodType' => "B+",
            ],
    
            [
                'bloodType' => "B-",
            ],
    
            [
                'bloodType' => "AB+",
            ],
    
            [
                'bloodType' => "AB-",
            ],
    
            [
                'bloodType' => "O+",
            ],
    
            [
                'bloodType' => "O-",
            ],

            ];
    
            BloodType::insert($bloodType);
    }
}
