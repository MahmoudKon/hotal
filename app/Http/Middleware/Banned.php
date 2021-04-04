<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Banned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->banned == 1) {
            if (auth()->guard('web')->check())
                return redirect()->route('banned');

            if (auth()->guard('employee')->check())
                return redirect()->route('dashboard.banned');
        }

        return $next($request);
    }
}
