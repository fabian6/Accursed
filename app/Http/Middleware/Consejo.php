<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Consejo{
    public function handle($request, Closure $next){
        $session = Auth::user();
        //dd($session);
        if($session->rol == 'consejo'){
            //dd($session->admin);
            return $next($request);
        }
        return redirect('/');
    }
}