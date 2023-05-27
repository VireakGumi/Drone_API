<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations =[
            ['latitude'=>'12.213123','longitude'=>'23.312313'],
            ['latitude'=>'34.213123','longitude'=>'45.312313'],
            ['latitude'=>'56.213123','longitude'=>'67.312313'],
            ['latitude'=>'78.213123','longitude'=>'78.312313'],
            ['latitude'=>'90.213123','longitude'=>'89.312313'],
        ];

        foreach ($locations as $location){
            Location::create($location);
        }
    }
}
