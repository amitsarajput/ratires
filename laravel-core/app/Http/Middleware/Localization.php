<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {  
        $country = $request->segment(1); // Get the first segment of the URL
        if (strlen($country)==2 || strlen($country)==3 || strlen($country)==4) {
            //print_r($country);
            //print_r('From localize middleware.');
            if (Session::has('locale') && Session::has('omni_data')  && !empty(session('omni_data.available_locales')) ) 
            {
                $available_locales = Session::get('omni_data.available_locales');
                //print_r($available_locales);
                $default_locale = Session::get('omni_data.default_locale');
                $default_location = Session::get('omni_data.default_location');
                $country_upper=strtoupper($country);
                if (array_key_exists($country_upper, $available_locales)) {
                    Session::put('locale', $available_locales[$country_upper]);
                    App::setLocale($available_locales[$country_upper]);
                } else {
                    App::setLocale($default_locale);
                    Session::put('locale', $default_locale);
                    session(['omni_data.preffered_location'=>$default_location]);
                }
                //App::setLocale($default_locale);
                //dd(App::getLocale());
                
            }
        }

        return $next($request);
    }
}
