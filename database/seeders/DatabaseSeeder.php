<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employe;
use App\Models\Evaluateur;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

       
<<<<<<< HEAD
        /*DB::table('users')->insert([
=======
        DB::table('users')->insert([
>>>>>>> 67faa3d39cc2fc536e08f63f13a70da92fa93658

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
<<<<<<< HEAD
            'password'=>bcrypt('password'),]);*/
=======
            'password'=>bcrypt('password'),]);
>>>>>>> 67faa3d39cc2fc536e08f63f13a70da92fa93658
       $this->call(PosteSeeder::class);
        Employe::factory(10)->create();
        Evaluateur::factory(5)->create();

    }}