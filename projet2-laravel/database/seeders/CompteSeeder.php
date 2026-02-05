<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comptes')->insert([
            'login' => 'admin',
            'mot_passe' => 'admin123',
            'profil' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
