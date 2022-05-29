<?php

use Illuminate\Support\Facades\Route;
use JoeriAbbo\LaravelEasyTranslations\LaravelEasyTranslationsPackageServiceProvider;

Route::group(['prefix' => LaravelEasyTranslationsPackageServiceProvider::PACKAGE_NAME, 'namespace' => 'Languages', 'as' => LaravelEasyTranslationsPackageServiceProvider::PACKAGE_NAME . '.'], function () {
    Route::get('/', 'Index')->name('index');
    Route::get('/edit/{language}', 'Edit')->name('edit');
    Route::put('/edit/{language}', 'Update')->name('update');
});
