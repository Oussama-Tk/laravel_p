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
       DB::table('clients')->insert([
            ['id' => 1, 'nom' => 'Dupont', 'prenom' => 'Jean'],
            ['id' => 2, 'nom' => 'Martin', 'prenom' => 'Sophie'],
            ['id' => 3, 'nom' => 'Bernard', 'prenom' => 'Lucas'],
            ['id' => 4, 'nom' => 'Petit', 'prenom' => 'Emma'],
        ]);

        DB::table('produits')->insert([
            ['id' => 101, 'nom' => 'Ordinateur Portable', 'qte_stock' => 10, 'prix' => 850.00],
            ['id' => 102, 'nom' => 'Souris sans fil', 'qte_stock' => 50, 'prix' => 25.50],
            ['id' => 103, 'nom' => 'Clavier Mécanique', 'qte_stock' => 30, 'prix' => 60.00],
            ['id' => 104, 'nom' => 'Écran 24 pouces', 'qte_stock' => 20, 'prix' => 180.00],
            ['id' => 105, 'nom' => 'Disque Dur SSD', 'qte_stock' => 15, 'prix' => 90.00],
        ]);

        DB::table('commandes')->insert([
            ['id' => 1001, 'date' => '2023-10-01', 'client_id' => 1],
            ['id' => 1002, 'date' => '2023-10-02', 'client_id' => 2],
            ['id' => 1003, 'date' => '2023-10-05', 'client_id' => 1],
            ['id' => 1004, 'date' => '2023-10-10', 'client_id' => 3],
        ]);

        DB::table('commande_produit')->insert([
            ['commande_id' => 1001, 'produit_id' => 101, 'qte_cmd' => 1],
            ['commande_id' => 1001, 'produit_id' => 102, 'qte_cmd' => 1],
            ['commande_id' => 1002, 'produit_id' => 104, 'qte_cmd' => 2],
            ['commande_id' => 1003, 'produit_id' => 103, 'qte_cmd' => 1],
            ['commande_id' => 1004, 'produit_id' => 105, 'qte_cmd' => 5],
            ['commande_id' => 1004, 'produit_id' => 102, 'qte_cmd' => 5],
        ]);
    }
}
