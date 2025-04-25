<?php

namespace GeoRouter\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetGeoContext
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->route('region')) {
            app()->instance('region', $request->route('region'));
        }

        if ($request->route('country')) {
            app()->instance('country', $request->route('country'));
        }

        return $next($request);
    }
}
