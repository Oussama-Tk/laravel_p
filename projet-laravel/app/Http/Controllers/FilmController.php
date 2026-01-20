<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilmController extends Controller
{
    public function TpBuilder(){
        $films = DB::table('films')->get() ;
        $filmAnne = DB::table('films')->where('annee' , '>=' , 2022)->get() ;
        $acteurD = DB::table('acteurs')->where('nom' , 'like' , 'D%')->get() ;
        $filmSuperier = DB::table('films')->whereRaw('TIME_TO_SEC(duree) > ?' , [120*60])->get() ;
        $filmEntre = DB::table('films')->whereBetween('annee' , [2021,2024])->get() ;
        DB::table('films')->insert([
            'titre' => 'interstellar' ,
            'pays' => 'maroc' ,
            'duree' => '02:49:00' ,
            'genre' => 'tt' ,
            'annee' => 2014 ,
            'created_at' => now(),
        ]);
        DB::table('films')->insert([
    
            [
                'titre' => 'The Batman',
                'pays' => 'maroc' ,
                'annee' => 2022,
                'duree' => '02:56:00',
                'genre' => 'tt' ,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'Spider-Man: No Way Home',
                'pays' => 'maroc' ,
                'annee' => 2021,
                'duree' => '02:28:00',
                'genre' => 'tt' ,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'Dune: Part Two',
                'pays' => 'maroc' ,
                'annee' => 2024,
                'duree' => '02:46:00',
                'genre' => 'tt' ,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        DB::table('films')->where('id' , 2)->update(['titre' => 'Erased']) ;
        // DB::table('films')->where('annee' , '<' , 2022)->update(['annee' => 2028]) ;

        DB::table('films')->where('id' , 1)->delete() ;
        // DB::table('films')->where('annee' , '<' , 2020)->delete() ;

        $nb_films = DB::table('films')->count() ;
        $avg_duree_films = DB::table('films')->avg(DB::table('films')->raw('TIME_TO_SEC(duree)'));
        $avg_duree_films = DB::table('films')->avg('annee');
        $nb_films_acteur = DB::table('participations')->where('acteur_id' , 1)->count();
        $films_pages = DB::table('films')->paginate(10);


        $films_avec_acteurs = DB::table('films')->join('participations' , 'films.id' , '=' , 'film_id')->join('acteurs' , 'acteur_id' , 'acteurs.id' ,)->select(
            'films.titre as titre',
            DB::raw('GROUP_CONCAT(acteurs.nom SEPARATOR ", ") as liste_acteurs')
        )->groupBy('films.titre')->get() ;

        $acteur_action = DB::table('acteurs')->join('participations' , 'acteurs.id' , '=' , 'acteur_id')->join('films' , 'films.id' , '=' , 'films.id' )->where('films.genre' , '=' , 'Action')->select(
            'acteurs.nom as acteur_nom' , 'acteurs.prenom as acteur_pr'
        )->distinct()->get() ;

        $film_acteur_role = DB::table('films')
        ->join('participations' , 'films.id' , '=' , 'film_id')
        ->join('acteurs' , 'acteur_id' , '=' , 'acteurs.id')
        ->select('films.titre as titre' , 'acteurs.nom as nom' , 'participations.role as role')->get();

        $acteur_sans_film = DB::table('acteurs')
        ->leftJoin('participations' , 'acteurs.id' , '=' , 'acteur_id')
        ->whereNull('participations.acteur_id')->get();

        $nb_participation_trios = DB::table('films')
        ->join('participations' , 'films.id' , '=' , 'film_id')
        ->selectRaw('films.titre as titre , COUNT(acteur_id) as nb_participation')
        ->groupBy('films.id')
        ->having('nb_participation', '>' , 3)->get();

        $participation_entre_date = DB::table('acteurs')
        ->join('participations' , 'acteurs.id' , '=' , 'acteur_id')
        ->join('films' , 'film_id' , '=' , 'films.id')
        ->select('acteurs.nom' , 'acteurs.prenom')
        ->whereBetween('films.annee', [2010,2020])->get();

        // $test = Film::findOrFail(1) ;
        
        $films = DB::table('films')
        ->select('titre', 'duree', 'date');

        $acteurs = DB::table('acteurs')
            ->select('nom', 'prenom', 'pays');

        $tous = $films
        ->union($acteurs)
        ->get();

        return view('affTpBuilder' , ['participation_entre_date'=> $participation_entre_date,'nb_participation_trios'=> $nb_participation_trios,'acteur_sans_film'=> $acteur_sans_film,'film_acteur_role'=> $film_acteur_role,'acteur_action' => $acteur_action ,'films_avec_acteurs' => $films_avec_acteurs ,'films' => $films , 'filmAnne' => $filmAnne , 'acteurD' => $acteurD, 'filmSuperier' => $filmSuperier , 'filmEntre' => $filmEntre , 'filmSuperier' => $filmSuperier , 'nb_films' => $nb_films, 'avg_duree_films' => $avg_duree_films ,'films_pages' => $films_pages ]) ;
    }
    
}
