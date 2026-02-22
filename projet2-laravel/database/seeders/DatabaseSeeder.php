<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('auteurs')->insert([
            ['id' => 1, 'nom' => 'Hugo', 'prenom' => 'Victor'],
            ['id' => 2, 'nom' => 'Camus', 'prenom' => 'Albert'],
            ['id' => 3, 'nom' => 'Orwell', 'prenom' => 'George'],
        ]);

        // 2. Insertion des Livres
        DB::table('livres')->insert([
            ['id' => 1, 'titre' => 'Les Misérables', 'annee_pub' => 1962, 'nb_pages' => 1462, 'auteur_id' => 1],
            ['id' => 2, 'titre' => "L'Étranger", 'annee_pub' => 1942, 'nb_pages' => 159, 'auteur_id' => 2],
            ['id' => 3, 'titre' => '1984', 'annee_pub' => 1949, 'nb_pages' => 328, 'auteur_id' => 3],
            ['id' => 4, 'titre' => 'Notre-Dame de Paris', 'annee_pub' => 1931, 'nb_pages' => 940, 'auteur_id' => 1],
        ]);

        // 3. Insertion des Emprunts
        // Note: Utilisez "null" pour une date de retour non définie (le livre n'est pas encore rendu)
        DB::table('emprunts')->insert([
            ['id' => 1, 'livre_id' => 1, 'date_emp' => '2024-02-10', 'date_retour' => '2024-02-20'],
            ['id' => 2, 'livre_id' => 3, 'date_emp' => '2024-02-18', 'date_retour' => null],
            ['id' => 3, 'livre_id' => 2, 'date_emp' => '2024-01-05', 'date_retour' => '2024-01-25'],
        ]);
    }
}
