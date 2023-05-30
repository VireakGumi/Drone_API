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
            ['action'=>'run','description'=>'run drone on the farm'],
            ['action'=>'run','description'=>'run drone on the farm'],
            ['action'=>'stop','description'=>'stop drone and go home'],
        ];

        foreach ($instructions as $instruction){
            Instruction::create($instruction);
        }
    }
}

