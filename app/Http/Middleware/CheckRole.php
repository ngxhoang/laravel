<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // dd($roles);
        foreach ($roles as $role) {
            if ($request->user()->role == $role) {
                return $next($request);
            }
        }


        return abort(403);
    }
}
