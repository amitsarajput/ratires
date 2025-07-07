<?php

namespace ProductManager;

use Illuminate\Support\ServiceProvider;

class ProductManagerServiceProvider extends ServiceProvider
{
    public function register()
    {
        $router = $this->app['router'];
        $router->aliasMiddleware('setsessiondata', \ProductManager\Http\Middleware\SetSessionData::class);
        $router->aliasMiddleware('setdefaultlocaleforurls', \ProductManager\Http\Middleware\SetDefaultLocaleForUrls::class);
        $router->aliasMiddleware('localization', \ProductManager\Http\Middleware\Localization::class);
        $router->aliasMiddleware('normalizeslashes', \ProductManager\Http\Middleware\NormalizeDoubleSlashes::class);

    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/productroutes.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/admin.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'ProductManager');
    }
}