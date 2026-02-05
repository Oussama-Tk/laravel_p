<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable ;

class Compte extends Authenticatable
{
    use HasFactory;
    protected $guarded = [];

    public function getAuthPassword()
    {
        return $this->mot_passe ;
    }
}
