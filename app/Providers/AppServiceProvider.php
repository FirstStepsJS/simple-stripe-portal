<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\UrlGenerator;

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
    public function boot(UrlGenerator $url)
    {
        // As suggested here https://laracasts.com/discuss/channels/laravel/how-to-apply-https-to-the-helpers-asset-and-url
        if(env('REDIRECT_HTTPS'))
        {
            $url->forceScheme('https');
        }
    }
}
