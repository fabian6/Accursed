<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class Admin{
    public function handle($request, Closure $next){
        $session = Auth::user();
        //dd($session);
        if($session->admin == 1){
            //dd($session->admin);
            return $next($request);
        }
        return redirect('/');
    }
}