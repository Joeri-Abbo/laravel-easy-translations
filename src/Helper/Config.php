<?php

namespace JoeriAbbo\LaravelEasyTranslations\Helper;

use Illuminate\Config\Repository;
use Illuminate\Contracts\Foundation\Application;
use JoeriAbbo\LaravelEasyTranslations\LaravelEasyTranslationsPackageServiceProvider as Package;

class Config
{

    /**
     * @return Repository|Application|mixed
     */
    public static function getConfig(): mixed
    {
        return config(Package::PACKAGE_NAME);
    }

    /**
     * @param string $key
     * @return Repository|Application|mixed
     */
    public static function getSetting(string $key): mixed
    {
        return config(Package::PACKAGE_NAME . '.' . $key);
    }
}