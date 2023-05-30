<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PosteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("postes")->insert(['nom_poste'=>'comptable',
        'salaire'=>'7000',
        'description_poste'=>'',]
         );
         DB::table("postes")->insert(['nom_poste'=>'auditeur',
         'salaire'=>'8000',
         'description_poste'=>'',]
          );
          DB::table("postes")->insert(['nom_poste'=>'commissaire aux comptes',
          'salaire'=>'7000',
          'description_poste'=>'',]
           );
           DB::table("postes")->insert(['nom_poste'=>'gestionnaire de paie',
           'salaire'=>'7000',
           'description_poste'=>'',]
            );
            DB::table("postes")->insert(['nom_poste'=>'Commercial',
            'salaire'=>'7000',
            'description_poste'=>'',]
             );
             DB::table("postes")->insert(['nom_poste'=>'Administrateur des ventes',
             'salaire'=>'12000',
             'description_poste'=>'',]
              );
              DB::table("postes")->insert(['nom_poste'=>'responsable marketing',
              'salaire'=>'10000',
              'description_poste'=>'',]
               );
               DB::table("postes")->insert(['nom_poste'=>" Responsable des Technologies de l'Information (IT)" ,
              'salaire'=>'50000',
              'description_poste'=>'',]
               );
               DB::table("postes")->insert(['nom_poste'=>'Responsable de la Recherche et Développement (R&D)',
              'salaire'=>'7000',
              'description_poste'=>'',]
               );
               DB::table("postes")->insert(['nom_poste'=>'Responsable des Opérations',
              'salaire'=>'7000',
              'description_poste'=>'',]
               );
               DB::table("postes")->insert(['nom_poste'=>'Responsable de la Communication',
              'salaire'=>'7000',
              'description_poste'=>'',]
               );
               DB::table("postes")->insert(['nom_poste'=>'Responsable de qualité',
              'salaire'=>'7000',
              'description_poste'=>'',]
               );
    }
}
