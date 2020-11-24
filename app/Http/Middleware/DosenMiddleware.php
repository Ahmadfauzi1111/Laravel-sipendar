<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class DosenMiddleware
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
        if ($request->user() && $request->user()->level != 'Dosen')
        {
            return new Response(view('unauthorized')->with('role', 'Dosen'));
        }   
        return $next($request);
    }
}
