<?php

namespace App\Providers;

use App\Models\CouponRedemption;
use App\Models\User;
use App\Services\LanguageService;
use Illuminate\Support\Facades\App;
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
        LanguageService::setAppLocaleFromSession();
    }
}
