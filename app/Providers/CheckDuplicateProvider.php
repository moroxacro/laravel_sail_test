<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CheckDuplicateProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->singleton(CheckDuplicateInterface::class, function($app) {
        //     return $app->make(Tag::class);
        //     return $app->make(Like::class);
        // });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
