<?php

namespace JoeriAbbo\LaravelEasyTranslations;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use JoeriAbbo\LaravelEasyTranslations\Console\Commands\Installer;
use JoeriAbbo\LaravelEasyTranslations\Console\Commands\TranslateLanguageFile;
use JoeriAbbo\LaravelEasyTranslations\Helper\Config;
use JoeriAbbo\LaravelEasyTranslations\Helper\LanguageHelper;

class LaravelEasyTranslationsPackageServiceProvider extends ServiceProvider
{
    public const PACKAGE_NAME = 'laravel-easy-translations';

    public function register()
    {
        //
    }

    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../resources/assets/build' => public_path('vendor/' . self::PACKAGE_NAME),
        ], 'public');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', self::PACKAGE_NAME);

        Blade::directive('translate', function ($arguments) {
            // Funky madness to accept multiple arguments into the directive
            list($translation, $language) = array_pad(explode(',', trim($arguments, "() ")), 2, '');

            $translation = trim($translation, "' ");
            $language = trim($language, "' ");
            $language = empty($language) ? null : $language;

            return LanguageHelper::getInstance()->getTranslation($translation, $language);
        });

        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config/config.php' => config_path(self::PACKAGE_NAME . '.php'),], 'config');
        }

        if (config(self::PACKAGE_NAME . '.routes_enabled')) {
            Route::group($this->routeConfiguration(), function () {
                $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
            });
        }

        $this->commands([
            Installer::class,
            TranslateLanguageFile::class
        ]);
    }

    /**
     * Set the route configuration for the package.
     * @return array
     */
    protected function routeConfiguration(): array
    {
        return [
            'routes_enabled' => Config::getSetting('routes_enabled'),
            'prefix' => Config::getSetting('prefix'),
            'middleware' => Config::getSetting('middleware'),
            'namespace' => Config::getSetting('namespace'),
        ];
    }
}
