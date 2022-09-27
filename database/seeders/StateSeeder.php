<?php

namespace Database\Seeders;
use App\Models\State;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $States = [
        [
            'stateCode' => "MY-01",
            'stateName' => "Johor",
        ],

        [
            'stateCode' => "MY-02",
            'stateName' => "Kedah",
        ],

        [
            'stateCode' => "MY-03",
            'stateName' => "Kelantan",
        ],

        [
            'stateCode' => "MY-04",
            'stateName' => "Melaka",
        ],

        [
            'stateCode' => "MY-05",
            'stateName' => "Negeri Sembilan",
        ],

        [
            'stateCode' => "MY-06",
            'stateName' => "Pahang",
        ],

        [
            'stateCode' => "MY-07",
            'stateName' => "Pulau Pinang",
        ],

        [
            'stateCode' => "MY-08",
            'stateName' => "Perak",
        ],

        [
            'stateCode' => "MY-09",
            'stateName' => "Perlis",
        ],

        [
            'stateCode' => "MY-12",
            'stateName' => "Sabah",
        ],

        [
            'stateCode' => "MY-13",
            'stateName' => "Sarawak",
        ],

        [
            'stateCode' => "MY-10",
            'stateName' => "Selangor",
        ],

        [
            'stateCode' => "MY-11",
            'stateName' => "Terengganu",
        ],

        ];

        State::insert($States);
    }
    
}
