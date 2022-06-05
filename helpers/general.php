<?php

use JoeriAbbo\LaravelEasyTranslations\Helper\LanguageHelper;

/**
 * Translate function
 * @param string $translation
 * @param string|null $language
 * @return string
 */
function translate(string $translation, string $language = null): string
{
    return LanguageHelper::getInstance()->getTranslation($translation, $language);
}