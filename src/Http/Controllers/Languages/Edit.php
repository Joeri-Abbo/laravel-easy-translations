<?php

namespace JoeriAbbo\LaravelEasyTranslations\Http\Controllers\Languages;

use Illuminate\View\View;
use JoeriAbbo\LaravelEasyTranslations\Helper\LanguageHelper;
use JoeriAbbo\LaravelEasyTranslations\Http\Controllers\Controller;
use JoeriAbbo\LaravelEasyTranslations\Http\Requests\Languages\EditRequest;
use JoeriAbbo\LaravelEasyTranslations\LaravelEasyTranslationsPackageServiceProvider as Provider;

class Edit extends Controller
{
    /**
     * Provision a new web server.
     *
     * @param EditRequest $request
     * @param string $language
     * @return View
     */
    public function __invoke(EditRequest $request, string $language): View
    {
        $languages = LanguageHelper::getInstance()->getLanguages();
        if (!in_array($language, $languages)) {
            return view(Provider::PACKAGE_NAME . '::pages.404');
        }

        return view(Provider::PACKAGE_NAME . '::pages.edit', [
            'language' => $language
        ]);
    }
}
