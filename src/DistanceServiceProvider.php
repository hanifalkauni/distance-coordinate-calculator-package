<?php

namespace Alkauni\DistanceCoordinateCalculator;

use Illuminate\Support\ServiceProvider;

class DistanceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish configuration
        $this->publishes([
            __DIR__.'/../config/distance.php' => config_path('distance.php'),
        ], 'config');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Merge configuration
        $this->mergeConfigFrom(
            __DIR__.'/../config/distance.php', 'distance'
        );

        // Register the main class to use with the facade
        $this->app->singleton('distance', function ($app) {
            return new DistanceCalculator();
        });
    }
}
