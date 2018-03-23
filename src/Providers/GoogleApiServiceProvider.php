<?php

namespace RodShaffer\GoogleApi\Providers;

use Illuminate\Support\ServiceProvider;
use RodShaffer\GoogleApi\Services\GoogleService;

/**
 * Class GoogleApiServiceProvider Laravel Google API service provider
 * @package RodShaffer\GoogleApi\Providers
 */
class GoogleApiServiceProvider extends ServiceProvider
{
    /**
     * Configuration file path.
     */

    const CONFIG_PATH = __DIR__ . '/../config/config.php';

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('googleapi.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind('GoogleService', 'RodShaffer\GoogleApi\Services\GoogleService');


        $this->app->singleton('GoogleService', function () {
            return $this->app->make('RodShaffer\GoogleApi\Services\GoogleService');
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [GoogleService::class];
    }
}
