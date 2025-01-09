<?php

namespace App\Providers;

use App\State\BookProvider;
use ApiPlatform\State\ProviderInterface;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->environment('local')) {
            Mail::alwaysTo('lerni@example.com');
        }

        $this->app->tag(BookProvider::class, ProviderInterface::class);
    }
}
