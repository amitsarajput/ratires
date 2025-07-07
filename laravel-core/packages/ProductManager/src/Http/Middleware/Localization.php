<?php

namespace ProductManager\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\URL;

class Localization
{
    /**
     * Handle an incoming request and set the app locale based on region/country in the URL.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Extract region and country from the first and second URL segments
        $region = extractRegionFromUrl()?? Session::get('omni_data.region');
        $country = extractCountryFromUrl()??Session::get('omni_data.country');        
        
        //if country is present, set the locale for the country other wise set to region
        if ($country !== null) {
            $this->setLocaleFromSessionData($region, $country);
        }else{
            $this->setLocaleFromSessionData($region, $country);
        }
        return $next($request);
    }
    

    /**
     * Set the app locale using session-stored omni_data if available.
     * Prioritizes country locale if available, else falls back to region.
     */
    private function setLocaleFromSessionData(string $region, ?string $country): void
    {
        // Check if both 'locale' and 'omni_data' exist in session before proceeding
        if (!Session::has('locale') || !Session::has('omni_data')) {
            return;
        }

        // Retrieve omni_data from session
        $omni = Session::get('omni_data');

        // Extract needed values from omni_data
        $availableLocales = $omni['available_locales'] ?? [];
        $defaultLocale = $omni['default_locale'] ?? 'en';
        $defaultLocation = $omni['default_location'] ?? $region;

        // Choose which location key to use: prefer country if available
        $key = $country ?? $region;

        // If this location has a matching locale in the session data
        if (array_key_exists($key, $availableLocales)) {
            $locale = $availableLocales[$key];

            // Set Laravel's app locale and update the session
            Session::put('locale', $locale);
            App::setLocale($locale);

            // Update preferred region and country in omni_data
            session()->put('omni_data.preffered_location', $key);
            session()->put('omni_data.region', $region);
            session()->put('omni_data.country', $country);
        } else {
            // Fallback: use default locale and location
            Session::put('locale', $defaultLocale);
            App::setLocale($defaultLocale);

            session()->put('omni_data.preffered_location', $defaultLocation);
        }
        

        //suply default keys to all urls
        URL::defaults([
            'region' => session('omni_data.region'), 
            'country' => session('omni_data.country')
        ]);

        //dd(App::getLocale());

    }
}
