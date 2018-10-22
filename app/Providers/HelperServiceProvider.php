<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\SiteSetting;
use View;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $site_settings = SiteSetting::first();

        config()->set('settings', $site_settings ? $site_settings->toArray() : '');

        return View::share(compact('site_settings'));
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
