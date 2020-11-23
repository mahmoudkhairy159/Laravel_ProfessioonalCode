<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkAge
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
        //logic Of middleware
        $userAge= Auth::user()->age;
        if($userAge <15){
            return redirect(url('/home'));
        }
        return $next($request);
    }
}
