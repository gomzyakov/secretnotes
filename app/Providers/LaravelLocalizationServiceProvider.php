<?php

namespace App\Providers;

use App\Services\LaravelLocalization\LaravelLocalization;
use Illuminate\Support\ServiceProvider;

class LaravelLocalizationServiceProvider extends ServiceProvider
{
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['modules.handler', 'modules'];
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(LaravelLocalization::class, function () {
            return new LaravelLocalization();
        });

        $this->app->alias(LaravelLocalization::class, 'laravellocalization');
    }
}
