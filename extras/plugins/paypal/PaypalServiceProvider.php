<?php

namespace extras\plugins\paypal;

use Illuminate\Support\ServiceProvider;
use Route;

class PaypalServiceProvider extends ServiceProvider
{
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('paypal', function ($app) {
            return new Paypal($app);
        });
    }

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // Load plugin views
        $this->loadViewsFrom(realpath(__DIR__ . '/resources/views'), 'payment');

        // Load plugin languages files
        $this->loadTranslationsFrom(realpath(__DIR__ . '/resources/lang'), 'paypal');

        // Merge plugin config
        $this->mergeConfigFrom(realpath(__DIR__ . '/config.php'), 'payment');
    }
}
