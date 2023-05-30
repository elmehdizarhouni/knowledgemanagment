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
       /* DB::table('users')->insert([
=======
        DB::table('users')->insert([
>>>>>>> 550b7ed80ddcb5c66281b16eb4ce11df9864e396
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
<<<<<<< HEAD
        ]);*/
       /* $this->call(PosteSeeder::class);
        Employe::factory(10)->create();
        Evaluateur::factory(5)->create();*/
=======
        ]);
>>>>>>> 550b7ed80ddcb5c66281b16eb4ce11df9864e396
    }
}
