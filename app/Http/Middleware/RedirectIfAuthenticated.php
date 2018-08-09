<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {   
        if (Auth::guard($guard)->check()) {
            return redirect('/');
        } 
 
        /*else {
            echo 2;
            die;
            return redirect("/register?name=$request->name&password=$request->password");
        }
         * 
         */

        return $next($request);
    }
}
