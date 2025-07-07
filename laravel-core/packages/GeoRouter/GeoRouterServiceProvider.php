<?php

namespace GeoRouter;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Blade;

class GeoRouterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::macro('geo', function (callable $routes, string $namePrefix = '', array $middleware = []) {
            // Region-only prefix
            Route::prefix('{region:slug}')
                ->name($namePrefix)
                ->where(['region' => '[a-zA-Z]{2,4}'])
                ->middleware(array_merge(['geo.context'], $middleware))
                ->group($routes);
        
            // Region + Country prefix
            Route::prefix('{region:slug}/{country:slug?}')
                ->name($namePrefix)
                ->where([
                    'region' => '[a-zA-Z]{2,4}',
                    'country' => '[a-zA-Z]{2}',
                ])
                ->middleware(array_merge(['geo.context'], $middleware))
                ->group($routes);
        });
        
        // Route model bindings
        // Route::bind('region', function ($value) {
        //     return \App\Models\Region::where('slug', $value)->firstOrFail();
        // });

        // Route::bind('country', function ($value) {
        //     return \App\Models\Country::where('slug', $value)->firstOrFail();
        // });
        
        // Route::bind('brand', function($value){ 
        //     return \App\Models\Brand::where('slug', $value)->firstOrFail();
        // });
        
        // Route::bind('tyre', function($value){ 
        //     return \App\Models\Tyre::where('slug', $value)->firstOrFail();
        // });

        // Middleware registration
        $this->app['router']->aliasMiddleware('geo.context', \GeoRouter\Middleware\SetGeoContext::class);

        
        
        // Route Macro
        // Route::macro('geo', function (callable $routes, string $namePrefix = '') {
        //     Route::prefix('{region:slug}/{country:slug?}')
        //         ->where([
        //             'region' => '[a-zA-Z]{2,4}',
        //             'country' => '[a-zA-Z]{2}',
        //         ])
        //         ->middleware('geo.context')
        //         ->name($namePrefix) // dynamic name prefix
        //         ->group($routes);
        // });

        // Blade directives
        Blade::directive('region', fn () => "<?php echo request()->region->slug ?? ''; ?>");
        Blade::directive('country', fn () => "<?php echo request()->country->slug ?? ''; ?>");
        Blade::directive('geoLocale', fn () => "<?php echo app()->getLocale(); ?>");
    }

    public function register()
    {
        // Bind helper
        $this->app->singleton('geo', function () {
            return new \GeoRouter\Support\GeoHelper();
        });
    }
}
