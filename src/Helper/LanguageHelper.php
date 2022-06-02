<?php

namespace JoeriAbbo\LaravelEasyTranslations\Helper;

use JoeriAbbo\LaravelEasyTranslations\LaravelEasyTranslationsPackageServiceProvider as Provider;

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
        return config(Provider::PACKAGE_NAME . '.default_language');
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

        $path = $this->getLanguageFilePath($language);
        $translations = $this->getLanguageFileData($path);

        if (array_key_exists($translation, $translations)) {
            return $translations[$translation];
        }
        $translations[$translation] = $translation;
        $this->updateLangFile($path, $translations);
        return $translation;
    }

    /**
     * @param string $path
     * @param array $data
     * @return void
     */
    public function updateLangFile(string $path, array $data): void
    {
        file_put_contents($path, json_encode($data));
    }

    /**
     * Get language file data.
     * @param string $path
     * @return array
     */
    public function getLanguageFileData(string $path): array
    {
        if (file_exists($path)) {
            return json_decode(file_get_contents($path), true);
        }

        return [];
    }

    /**
     * Get the language file path.
     * @param string $language
     * @return string
     */
    public function getLanguageFilePath(string $language): string
    {
        return Config::getSetting('storage_path') . '/' . $language . '.json';
    }
}
