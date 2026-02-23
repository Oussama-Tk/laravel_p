<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if(!$request->session()->has('currentUser')){
        //     return redirect()->route('login')->with('error' , 'Vous devez être connecté pour accéder à cette page.') ;
        // }
        return $next($request);
    }
}
