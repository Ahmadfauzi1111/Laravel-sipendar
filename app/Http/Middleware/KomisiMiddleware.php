<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class KomisiMiddleware
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
        if ($request->user() && $request->user()->level != 'Komisi')
        {
            return new Response(view('unauthorized')->with('role', 'Komisi'));
        }   
        return $next($request);
    }
}
