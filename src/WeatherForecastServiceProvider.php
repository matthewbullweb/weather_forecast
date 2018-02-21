<?php

namespace Ecce\WeatherForecast;

use Illuminate\Support\ServiceProvider;

class WeatherForecastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        include __DIR__.'/routes.php';
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Ecce\WeatherForecast\ForecastController');
        $this->loadViewsFrom(__DIR__.'/views', 'forecast');
    }
}
