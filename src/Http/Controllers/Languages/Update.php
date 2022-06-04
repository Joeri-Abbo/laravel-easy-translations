<?php

namespace JoeriAbbo\LaravelEasyTranslations\Http\Controllers\Languages;

use Illuminate\Http\RedirectResponse;
use JoeriAbbo\LaravelEasyTranslations\Helper\LanguageHelper;
use JoeriAbbo\LaravelEasyTranslations\Http\Controllers\Controller;
use JoeriAbbo\LaravelEasyTranslations\Http\Requests\Languages\UpdateRequest;

class Update extends Controller
{
    /**
     * Provision a new web server.
     *
     * @param UpdateRequest $request
     * @param string $language
     * @return RedirectResponse
     */
    public function __invoke(UpdateRequest $request, string $language): RedirectResponse
    {
        $translations = $request->input();
        unset($translations['_token']);
        unset($translations['_method']);
        LanguageHelper::getInstance()->setLanguageTranslations($language, $translations);
        return redirect()->back()->with('message', 'Transulations updated!');
    }
}
