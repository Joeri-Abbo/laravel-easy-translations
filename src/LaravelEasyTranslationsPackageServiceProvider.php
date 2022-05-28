<?php

namespace JoeriAbbo\Boilerplate;

use Illuminate\Support\ServiceProvider;

class LaravelEasyTranslationsPackageServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
        }
    }

}