<?php

namespace JoeriAbbo\LaravelEasyTranslations\Http\Requests\Languages;

use Illuminate\Validation\Rule;
use JoeriAbbo\LaravelEasyTranslations\Http\Requests\Request;

class UpdateRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [];
    }
}
