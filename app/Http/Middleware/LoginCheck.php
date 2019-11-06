<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class LoginCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()){ 
            if (Auth::user()->role==2){
                return $next($request);
            } else if (Auth::user()->role==1){
                return  $next($request);
            } else {
                return redirect ('/')->with('alert', 'role error');
            }
        }else {
            return redirect ('/')->with('alert', 'logineerror');
        }
    }
}
