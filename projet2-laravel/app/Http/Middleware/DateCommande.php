<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DateCommande
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->has('date')){
            $datelimit = '2020-01-01' ;
            $dateentry = $request->input('date') ;

            if($dateentry <= $datelimit){
                abort(404) ;
            }
        }
        return $next($request);
    }
}
