<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

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
        // Register Livewire component explicitly in case auto-discovery misses it
        $locale = session('locale', config('app.locale'));
        app()->setLocale(session('locale', 'en'));
    }
}
