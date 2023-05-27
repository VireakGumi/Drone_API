<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            ['type'=>'seeding','name'=>'rice','dateTime'=>'2023-05-26 06:13:38','area'=>'"POLYGON((11.9924000,105.4645030 
            11.9924006,105.4645057 11.9924102,105.4645254))"','spray_density'=>50,'farm_id'=>1],

            ['type'=>'spraying','name'=>'rice','dateTime'=>'2023-06-26 06:13:38','area'=>'"POLYGON((11.9924000,105.4645030 
            11.9924006,105.4645057 11.9924102,105.4645254))"','spray_density'=>50,'farm_id'=>1],

            ['type'=>'sensing','name'=>'rice','dateTime'=>'2023-05-26 06:13:38','area'=>'"POLYGON((11.9924000,105.4645030 
            11.9924006,105.4645057 11.9924102,105.4645254))"','spray_density'=>50,'farm_id'=>1],
        ];

        foreach ($plans as $plan){
            Plan::create($plan);
        }
    }
}
