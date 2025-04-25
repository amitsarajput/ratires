<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NormalizeDoubleSlashes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $originalUrl = $request->getRequestUri();

        // Check for double slashes in the path (excluding query string)
        if (strpos($originalUrl, '//') !== false) {
            // Replace multiple slashes with one
            $normalizedUrl = preg_replace('/\/+/', '/', $originalUrl);

            // Preserve query string if exists
            $queryString = $request->getQueryString();
            if ($queryString) {
                $normalizedUrl .= '?' . $queryString;
            }

            return redirect($normalizedUrl, 301); // permanent redirect
        }
        
        return $next($request);
    }
}
