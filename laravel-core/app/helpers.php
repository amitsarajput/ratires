<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

if (!function_exists('safeRoute')) {
    /**
     * Generate a route URL and clean it from double slashes,
     * safely ignoring empty/null parameters.
     *
     * @param string $name        The name of the route
     * @param array $parameters   Route parameters (e.g. ['region' => 'eu', 'country' => null])
     * @param bool $absolute      Whether to generate an absolute URL
     * @return string
     */
    function safeRoute(string $name, array $parameters = [], bool $absolute = true): string
    {
        // Remove null or empty parameters to avoid double slashes
        $filtered = array_filter($parameters, fn($val) => !is_null($val) && $val !== '');

        // Generate the route
        $url = route($name, $filtered, $absolute);

        // Remove double slashes but not after the protocol (http:// or https://)
        return preg_replace('#(?<!:)/{2,}#', '/', $url);
    }
}


if (!function_exists('getAvailableLocations')) {
    /**
     * Loads available location slugs (region/country codes) from the session once.
     *
     * @return array List of valid location slugs.
     */
    function getAvailableLocations(): array
    {
        return session('omni_data.available_locations', []);
    }
}

if (!function_exists('extractRegionFromUrl')) {
    /**
     * Extracts and validates the region code from the first URL segment.
     *
     * Assumes region slugs are <= 4 characters and exist in available locations.
     *
     * @return string|null Valid region slug or null if not found/invalid.
     */
    function extractRegionFromUrl(): ?string
    {
        $segment = request()->segment(1);
        return (strlen($segment) <= 4 && in_array($segment, getAvailableLocations()))
            ? $segment
            : null;
    }
}

if (!function_exists('extractCountryFromUrl')) {
    /**
     * Extracts and validates the country code from the second URL segment.
     *
     * Assumes country slugs are < 3 characters and exist in available locations.
     *
     * @return string|null Valid country slug or null if not found/invalid.
     */
    function extractCountryFromUrl(): ?string
    {
        $segment = request()->segment(2);
        return (strlen($segment) < 3 && in_array($segment, getAvailableLocations()))
            ? $segment
            : null;
    }
}
if (!function_exists('localized_asset')) {
    /**
     * Generate a URL for an asset with a country code inserted before the file extension,
     * based on session('omni_data.country'). If country is null, returns the original path.
     *
     * Example:
     *  - Input:  'images/hero.jpg'
     *  - Output: 'images/hero-es.jpg' (if country = 'es')
     *            'images/hero.jpg'   (if country is null)
     *
     * @param  string  $path  Relative path to the asset (e.g., 'images/hero.jpg')
     * @return string  Fully-qualified URL to the (localized) asset
     */
    function localized_asset($path)
    {
        $omni = session('omni_data');
        $country = $omni['country'] ?? null;

        $extension = pathinfo($path, PATHINFO_EXTENSION);
        $filename = basename($path, '.' . $extension);
        $dirname = dirname($path);

        if ($country) {
            $localizedPath = "$dirname/{$filename}-{$country}.{$extension}";
        } else {
            $localizedPath = $path;
        }

        return asset($localizedPath);
    }
}


