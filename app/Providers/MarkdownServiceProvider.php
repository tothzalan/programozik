<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Parsedown;

class MarkdownServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Parsedown::class, function ($app) {
            return new Parsedown();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
