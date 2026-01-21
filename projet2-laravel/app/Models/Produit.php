<?php

namespace App\Models;

use App\Models\Commande ;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    public function Commande(){
        return $this->belongsToMany(Commande::class)->withPivot('qte_cmd') ;
    }
}
