<?php

namespace JoeriAbbo\LaravelEasyTranslations\Http\Controllers\Languages;

use Illuminate\View\View;
use JoeriAbbo\LaravelEasyTranslations\Helper\LanguageHelper;
use JoeriAbbo\LaravelEasyTranslations\Http\Controllers\Controller;
use JoeriAbbo\LaravelEasyTranslations\Http\Requests\Languages\IndexRequest;
use JoeriAbbo\LaravelEasyTranslations\LaravelEasyTranslationsPackageServiceProvider as Provider;

class Index extends Controller
{
    /**
     * @param IndexRequest $request
     * @return View
     */
    public function __invoke(IndexRequest $request,): View
    {
        return view(Provider::PACKAGE_NAME . '::pages.index', [
            'languages' => LanguageHelper::getInstance()->getLanguages()
        ]);
    }
}
