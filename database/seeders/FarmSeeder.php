<?php

namespace Database\Seeders;

use App\Models\Farm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $farms = [
            ['type'=>'rice','user_id'=>1,'province_id'=>1],
            ['type'=>'corn','user_id'=>1,'province_id'=>1],
            ['type'=>'orange','user_id'=>2,'province_id'=>2],
            ['type'=>'apple','user_id'=>2,'province_id'=>2],
        ];
        foreach ($farms as $farm){
            Farm::create($farm);
        }
    }
}
