<?php

namespace App\Http\Middleware;

use App\Models\Region;
use App\Models\Country;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetSessionData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //session()->forget(['omni_data','locale']);
        //session()->invalidate();
        if(!session()->has('omni_data') || 
        empty(session('omni_data')) || 
        empty(session('omni_data.available_locations')) || 
        empty(session('omni_data.available_locales')) ){ 
            //
            //This function is runing on every request session is getting away after every request life cycle. Need to fix it.--fixed by putting start session midleware before the setsessiondata middleware in kernel.php file.
            //print_r('here');
            $omnidata=[
                'all_continents'=>[],
                'available_locations'=>[],
                'default_location'=>'eu',
                'available_locales'=>[],
                'default_locale'=>'en',
                'preffered_location'=>'',
                'user_location'=>'',
                'region'=>'eu',
                'country'=>null,
                'brand'=>'radar',
                'bubble_closed'=>0,
                'dealerform_open'=>0,
            ];
            try{
                $all_countries=Country::where('published',1)->orderBy('order', 'asc')->get();
                $all_continents=Region::with(['countries' => function($query) { $query->where('published', 1); }])->orderBy('order', 'asc')->get();
                //dd($all_continents->toArray());
            }catch(\Exception $e){
                return response('Error on the server. Please check after refreshing the page.');
            }
            $omnidata['all_continents']=$all_continents->toArray();
            //dd($omnidata['all_continents']);
            // Extract region and country name/code pairs
            $regionCountryMap = $all_continents->flatMap(function ($region) {
                $map = [$region['name'] => $region['code']];
                foreach ($region['countries'] as $country) {
                    $map[$country['name']] = $country['code'];
                }
                return $map;
            })->toArray();
            // Extract region and country locale_code/code pairs
            $regionCountryMapLocaleCode = $all_continents->flatMap(function ($region) {
                $map = [$region['code'] => $region['locale_code']];
                foreach ($region['countries'] as $country) {
                    $map[$country['code']] = $country['locale_code'];
                }
                return $map;
            })->toArray();
            // Extract region and country locale_code/code pairs
            $regionCountryMapSlug = $all_continents->flatMap(function ($region) {
                $map = [$region['code'] => $region['slug']];
                foreach ($region['countries'] as $country) {
                    $map[$country['code']] = $country['slug'];
                }
                return $map;
            })->toArray();
            //dd($regionCountryMapSlug);
            
            $omnidata['available_locations']=$regionCountryMap;
            //dd($omnidata['available_locations']);
            $omnidata['available_locales']=$regionCountryMapLocaleCode;
            $omnidata['slugs']=$regionCountryMapSlug;
            session(['omni_data' => $omnidata]);//Set Session
            session(['locale' => $omnidata['default_locale']]);//Set default locale
            
        }
        //dd(session('omni_data'));
        return $next($request);
    }
}
