<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StagaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            DB::table('stagaires')->insert([
            [
                'nom' => 'Alami',
                'prenom' => 'Ahmed',
                'date_naissance' => '2000-01-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Bennani',
                'prenom' => 'Sara',
                'date_naissance' => '1998-11-23',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Idrissi',
                'prenom' => 'Karim',
                'date_naissance' => '2001-05-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Tazi',
                'prenom' => 'Meryem',
                'date_naissance' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
