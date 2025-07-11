<?php

namespace ProductManager\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\URL;

class RedirectCountryFromUrl
{
    /**
     * Handle an incoming request and set the app locale based on region/country in the URL.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Extract region and country from the first and second URL segments
        $region = extractRegionFromUrl();// ?? Session::get('omni_data.region')?? Session::get('omni_data.default_location');
        $country = extractCountryFromUrl();//??Session::get('omni_data.country');  
        
        $defaultRegion= Session::get('omni_data.default_location');
        $region_country=collect(Session::get('omni_data.region_country_map')); 
        $redirects=Session::get('omni_data.all_redirects'); 
        //if country is present, set the locale for the country other wise set to region
        $needToRedirect = false;
        
        if ($region === null) {
            $region=$defaultRegion;
            //dd($region_country, $region, $country );
        }
        
        if ($region!==null) {
            if(!$region_country->has($region)){
                $region=$defaultRegion;
                $needToRedirect = true;
            }
            //dd($region_country, $region, $country);
        }
        if ($country !== null) {
            $actual_region=$region_country->search(function ($countries) use ($country) {
                return in_array($country, $countries);
            });
            if ( $region!== $actual_region ) {
                $region = $defaultRegion;
                $country = null;
                $needToRedirect = true;
            }
        }

        
        if ($needToRedirect) {
            $url = URL::to("{$region}/{$country}");
            //dd($url);
            return redirect()->to($url)->send();
        }else {
            $url = "{$region}";
            if ($country) {
                $url .= "/{$country}";
            }
            //dd($url);
            if ( array_key_exists($url, $redirects)) {
                return redirect()->to($redirects[$url])->send();
            }
        }
        
        return $next($request);
    }

}
