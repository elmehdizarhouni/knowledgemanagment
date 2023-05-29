<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name'=>'User1',
            'email'=>'user1@email.com',
            'type'=>'Evaluateur',
            'password'=>bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name'=>'User2',
            'email'=>'user2@email.com',
            'type'=>'Employé',
            'password'=>bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name'=>'User3',
            'email'=>'user3@email.com',
            'type'=>'Employé',
            'password'=>bcrypt('password'),
        ]);
    }
}
