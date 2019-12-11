<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Alumno{
    public function handle($request, Closure $next){
        $session = Auth::user();
        //dd($session);
        if($session->rol == 'alumno'){
            //dd(true);
            return $next($request);
        }
        return redirect('/');
    }
}