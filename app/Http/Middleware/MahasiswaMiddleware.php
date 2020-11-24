<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class MahasiswaMiddleware
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
        if ($request->user() && $request->user()->level != 'Mahasiswa')
        {
            return new Response(view('unauthorized')->with('role', 'Mahasiswa'));
        }   
        return $next($request);
    }
}
