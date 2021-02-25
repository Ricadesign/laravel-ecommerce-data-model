<?php

namespace Ricadesign\LaravelEcommerceDataModel;

use Illuminate\Support\ServiceProvider;

class LaravelEcommerceDataModelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/database/migrations' => database_path('migrations'),
            __DIR__.'/database/factories' => database_path('factories'),
            __DIR__.'/database/seeders' => database_path('seeders'),
            __DIR__.'/models' => app_path('Models'),
            __DIR__.'/resources' => app_path('Nova'),
        ], 'ecommerce-data-model');
    }
}