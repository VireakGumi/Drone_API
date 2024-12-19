<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            ['name'=>'rice','email'=>"rice@gmai.com",'password'=>12345678],
            ['name'=>'pujgphum','email'=>"pujgphum@gmai.com",'password'=>12345678],
        ];
        foreach ($users as $user){
            User::create($user);
        }
    }
}
