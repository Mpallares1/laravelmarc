<?php

namespace App\Providers;

use App\View\Components\Button;
use Illuminate\Support\Facades\Blade;
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
        $authServiceProvider = new AuthServiceProvider($this->app);
        $authServiceProvider->registerPolicies();
        $authServiceProvider->define_gates();
        $authServiceProvider->create_permissions();
        Blade::component('button', Button::class);
        Blade::component('card', Card::class);


    }
}
