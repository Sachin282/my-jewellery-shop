<?php

namespace App\Http\Middleware;

use Closure;
use Session;
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
        // if(!empty(Session::get('_previous')['url'])){        
        // //store nexthop url to directly redirect to payment page after registration
        //     Session::put('nextHop', Session::get('_previous')['url']);
        //     Session::save();
        // }

        if (Auth::guard($guard)->check()) {
            if($guard == 'admin')
                return redirect('/admin');
            else
                return redirect('/home');
        }

        return $next($request);
    }
}
