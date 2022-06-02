<?php

use JoeriAbbo\LaravelEasyTranslations\Helper\LanguageHelper;

function translate(string $translation, string $language = null): string
{
    return LanguageHelper::getInstance()->getTranslation($translation, $language);
}