<?php

use JoeriAbbo\LaravelEasyTranslations\Helper\LanguageHelper;

function transulate(string $translation, string $language = null): string
{
    return LanguageHelper::getInstance()->getTranslation($translation, $language);
}