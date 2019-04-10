<?php

namespace App\Providers;

use App\BusinessPersonRole;
use App\Observers\BusinessPersonRoleObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        BusinessPersonRole::observe(BusinessPersonRoleObserver::class);
    }
}
