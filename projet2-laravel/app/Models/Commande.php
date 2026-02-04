<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = ['date' , 'client_id'];

    public function Client(){
        return $this->belongsTo(Client::class) ;
    }

    public function Produits(){
        return $this->belongsToMany(Produit::class , 'commande_produit')->withPivot('qte_cmd') ;
    }
}
