<?php

namespace Database\Seeders;

use App\Models\Instruction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instructions = [
            ['action'=>'run','description'=>'run drone on the farm'],
            ['action'=>'stop','description'=>'stop drone and go home'],
            ['action'=>'other','description'=>'the drone just stopped because the instruction is not run or stop it was 1 to tell drone to run and 2 is to stop'],
        ];

        foreach ($instructions as $instruction){
            Instruction::create($instruction);
        }
    }
}

