<?php

namespace JoeriAbbo\LaravelEasyTranslations\Http\Controllers\Languages;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Response;
use JoeriAbbo\LaravelEasyTranslations\Http\Controllers\Controller;
use JoeriAbbo\LaravelEasyTranslations\Http\Requests\Languages\EditRequest;
use JoeriAbbo\LaravelEasyTranslations\Http\Requests\Languages\UpdateRequest;

class Edit extends Controller
{
    /**
     * Provision a new web server.
     *
     * @param EditRequest $request
     * @param string $language
     * @return Response
     */
    public function __invoke(EditRequest $request, string $language): Response
    {
        $validated_data = $request->validated();
        dd($validated_data, $language);
    }
}
