<?php

namespace JoeriAbbo\LaravelEasyTranslations\Helper;

use JoeriAbbo\LaravelEasyTranslations\LaravelEasyTranslationsPackageServiceProvider as Config;

class LanguageHelper
{
    /**
     * Just a singleton.
     * @var LanguageHelper|null $instance
     */
    private static ?LanguageHelper $instance = null;
    /**
     * The language
     * @var string|null
     */
    private ?string $language = null;

    /**
     * Get the instance of the LanguageHelper.
     * @return static
     */
    public static function getInstance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Get the default language.
     * @return string
     */
    public function getDefaultLanguage(): string
    {
        return config(Config::PACKAGE_NAME . '.default_language');
    }

    /**
     * Set the language.
     * @param string $language
     * @return $this
     */
    public function setLanguage(string $language): LanguageHelper
    {
        $this->language = $language;
        return $this;
    }

    /**
     * Get the language.
     * @return string
     */
    public function getLanguage(): string
    {
        return $this->language ?? $this->getDefaultLanguage();
    }

    /**
     * Get the translation by key if none is found return the key.
     * @param string $translation
     * @param string|null $language
     * @return string
     */
    public function getTranslation(string $translation, ?string $language = null): string
    {
        if (is_null($language)) {
            $language = $this->getLanguage();
        }

// Return the translation if it exists. form json file
        return $translation;
    }
}
