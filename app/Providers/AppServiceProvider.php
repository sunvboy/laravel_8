<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Laravel\Passport\Passport;

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
        Paginator::useBootstrap();
        Passport::routes();
        // cấu hình thời gian sống cho refresh tokens và access tokens
        // Passport::tokensExpireIn(Carbon::now()->addDays(15));
        // Passport::refreshTokensExpireIn(Carbon::now()->addDays(30));
        // loại bỏ các tokens 
        //Passport::pruneRevokedTokens();
    }
}
