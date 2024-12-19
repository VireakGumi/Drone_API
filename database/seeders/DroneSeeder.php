<?php

namespace Database\Seeders;

use App\Models\Drone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DroneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drones = [
            ['name'=>"D1",'type'=>"seeding",'payload'=>10,'battery'=>100,'fligth_range'=>10,
            'weight'=>10,'user_id'=>1,'plan_id'=>1,'instruction_id'=>1,'location_id'=>1],

            ['name'=>"D2",'type'=>"spraying",'payload'=>10,'battery'=>100,'fligth_range'=>10,
            'weight'=>10,'user_id'=>1,'plan_id'=>1,'instruction_id'=>1,'location_id'=>1],

            ['name'=>"D3",'type'=>"sensing",'payload'=>10,'battery'=>100,'fligth_range'=>10,
            'weight'=>10,'user_id'=>1,'plan_id'=>1,'instruction_id'=>2,'location_id'=>1],

            ['name'=>"D4",'type'=>"harvesting",'payload'=>10,'battery'=>100,'fligth_range'=>10,
            'weight'=>10,'user_id'=>2,'plan_id'=>1,'instruction_id'=>2,'location_id'=>1],

            ['name'=>"D5",'type'=>"mapping",'payload'=>10,'battery'=>100,'fligth_range'=>10,
            'weight'=>10,'user_id'=>2,'plan_id'=>1,'instruction_id'=>1,'location_id'=>1],
        ];

        foreach ($drones as $drone){
            Drone::create($drone);
        }
    }
}
