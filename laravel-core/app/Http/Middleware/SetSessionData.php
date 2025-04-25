<?php

namespace App\Http\Middleware;

use App\Models\Region;
use App\Models\Country;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetSessionData
{
    public function handle(Request $request, Closure $next): Response
    {
        //session()->forget(['omni_data','locale']);
        //session()->invalidate();
        if ($this->shouldSetOmniData()) {
            $this->setOmniData();
        }

        return $next($request);
    }

    private function shouldSetOmniData(): bool
    {
        $data = session('omni_data');

        return !session()->has('omni_data') ||
               empty($data) ||
               empty($data['available_locations'] ?? null) ||
               empty($data['available_locales'] ?? null);
    }

    private function setOmniData(): void
    {
        $defaultRegion = 'us';
        $defaultLocale = 'en';
        $defaultBrand = 'radar';

        $allContinents = Region::with(['countries' => function ($query) {
            $query->where('published', 1);
        }])->orderBy('order', 'asc')->get();

        // try {
        //     //$allCountries = Country::where('published', 1)->orderBy('order', 'asc')->get();
            
        // } catch (\Exception $e) {
        //     abort(500, 'Error on the server. Please check after refreshing the page.');
        // }

        $omniData = [
            'all_continents' => $allContinents->toArray(),
            'available_locations' => $this->extractMap($allContinents, 'name', 'code'),
            'available_locales' => $this->extractMap($allContinents, 'code', 'locale_code'),
            'slugs' => $this->extractMap($allContinents, 'code', 'slug'),
            'default_location' => $defaultRegion,
            'default_locale' => $defaultLocale,
            'preffered_location' => '',
            'user_location' => '',
            'region' => $defaultRegion,
            'country' => null,
            'brand' => $defaultBrand,
            'bubble_closed' => 0,
            'dealerform_open' => 0,
        ];

        session([
            'omni_data' => $omniData,
            'locale' => $defaultLocale
        ]);
        //dd(session('omni_data'));
    }

    /**
     * Extracts key-value maps from regions and their countries.
     */
    private function extractMap($regions, string $keyField, string $valueField): array
    {
        return $regions->flatMap(function ($region) use ($keyField, $valueField) {
            $map = [];

            if (isset($region[$keyField], $region[$valueField])) {
                $map[$region[$keyField]] = $region[$valueField];
            }

            foreach ($region['countries'] as $country) {
                if (isset($country[$keyField], $country[$valueField])) {
                    $map[$country[$keyField]] = $country[$valueField];
                }
            }

            return $map;
        })->toArray();
    }
}
