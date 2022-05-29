<?php

namespace JoeriAbbo\LaravelEasyTranslations\Http\Controllers\Languages;

use Illuminate\Http\Response;
use JoeriAbbo\LaravelEasyTranslations\Http\Controllers\Controller;
use JoeriAbbo\LaravelEasyTranslations\Http\Requests\Languages\IndexRequest;

class Index extends Controller
{
    /**
     * Provision a new web server.
     *
     * @param IndexRequest $request
     * @return Response
     */
    public function __invoke(IndexRequest $request,): Response
    {
        $validated_data = $request->validated();
        dd($validated_data);
    }
}
