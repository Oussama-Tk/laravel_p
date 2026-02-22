<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    use HasFactory;

    public function Auteur(){
        return $this->belongsTo(Auteur::class) ;
    }

    public function Emprunts(){
        return $this->hasMany(Emprunt::class) ;
    }
}
