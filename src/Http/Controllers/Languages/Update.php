<?php

namespace JoeriAbbo\LaravelEasyTranslations\Http\Controllers\Languages;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Response;
use JoeriAbbo\LaravelEasyTranslations\Http\Controllers\Controller;
use JoeriAbbo\LaravelEasyTranslations\Http\Requests\Languages\UpdateRequest;

class Update extends Controller
{
    /**
     * Provision a new web server.
     *
     * @param UpdateRequest $request
     * @param string $language
     * @return Response
     */
    public function __invoke(UpdateRequest $request, string $language): Response
    {
        dd($request->input(), $language);
    }
}
