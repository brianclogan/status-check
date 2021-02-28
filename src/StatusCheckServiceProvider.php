<?php

namespace Darkgoldblade01\StatusCheck;

use Illuminate\Support\ServiceProvider;

class StatusCheckServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'status-check');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'status-check');
         $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('status-check.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/status-check'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/status-check'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/status-check'),
            ], 'lang');*/

//             Publishing the database migrations.
//            $this->publishes([
//                __DIR__.'/database/migrations' => app_path('database/migrations'),
//            ], 'lang');

            // Registering package commands.
             $this->commands([
                 \Darkgoldblade01\StatusCheck\Commands\StatusCheck::class,
             ]);
        }

        StatusCheck::registerEvents();
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'status-check');

        // Register the main class to use with the facade
        $this->app->singleton('status-check', function () {
            return new StatusCheck;
        });
    }
}
