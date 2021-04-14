<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\View;
use Closure;

class CheckRole
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
        if (! $request->user()->rol_id == 0) {
            return redirect()->route('403');
        }
        
    return $next($request);
    }
}