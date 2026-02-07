<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Si la requête attend du JSON OU si l'URL commence par 'api/'
        if ($request->expectsJson() || $request->is('api/*')) {
            return null; // On retourne NULL = Pas de redirection = Erreur 401 directe
        }

        return route('login');
    }
}
