<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\URL;

class SetDefaultLocaleForUrls
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //URL::defaults(['locale' => $request->user()->locale]);
        //dd(strtolower(session('omni_data.preffered_location') ?session('omni_data.preffered_location'): session('omni_data.default_location')));
        URL::defaults(['country' => strtolower(session('omni_data.preffered_location') ?session('omni_data.preffered_location'): session('omni_data.default_location'))]);
        
        return $next($request);
    }
}
