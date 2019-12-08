<?php

namespace App\Http\Middleware;

use Closure;

class AuthRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, String $role)
    {
      //runs an if statement that requests the user or the user's role and return that user to their home page
      if(!$request->user() || !$request->user()->hasRole($role)) {
            return redirect()->route('home');
      }
        return $next($request);
    }
}
