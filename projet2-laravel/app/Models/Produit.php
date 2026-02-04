<?php

namespace App\Models;

use App\Models\Commande ;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produit extends Model
{
    use HasFactory;
    use SoftDeletes ;
    protected $fillable = ['nom' , 'qte_stock' , 'prix' ,'image'];

    public function Commande(){
        return $this->belongsToMany(Commande::class)->withPivot('qte_cmd') ;
    }
}
