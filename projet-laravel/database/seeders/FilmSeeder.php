<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         
        DB::table('acteurs')->insert([
            'nom'=> 'tkitak',
            'prenom'=> 'oussama',
            'pays'=> 'maroc',
        ]);

        \App\Models\Film::factory(4)->create() ;
        
    }
}
