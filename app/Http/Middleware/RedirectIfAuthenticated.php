<?php

namespace App\Http\Middleware;

use App\Models\Role;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (auth()->guard('employee')->check())
            return redirect()->route(RouteServiceProvider::DASHBOARD);

        if (auth()->guard('web')->check())
            return redirect()->route(RouteServiceProvider::HOME);

        return $next($request);
    }
}
