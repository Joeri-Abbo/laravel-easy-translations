<?php

namespace JoeriAbbo\LaravelEasyTranslations\Helper;

use Illuminate\Support\Str;
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
     * Get the language.
     * @return array
     */
    public function getLanguages(): array
    {
        $languages = scandir(Config::getSetting('storage_path'));
        foreach (['.DS_Store', '.', '..', '.gitkeep'] as $item) {
            unset($languages[array_search($item, $languages)]);
        }
        if (empty($languages)) {
            return [];
        }

        foreach ($languages as &$language) {
            $language = str_replace('.json', '', $language);
        }

        return array_values($languages);
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

        $translations = $this->getLanguageTranslations($language);

        $translation_key = $this->getTranslationKey($translation);
        if (array_key_exists($translation_key, $translations)) {
            return $translations[$translation_key];
        }
        $translations[$translation_key] = $translation;
        $this->setLanguageTranslations($language, $translations);
        return $translation;
    }

    /**
     * Get the given translations key for translation.
     * @param string $translation
     * @return string
     */
    public function getTranslationKey(string $translation): string
    {
        return Str::slug($this->strReplace(['-', '.', '"', "'"], '_', $translation));
    }

    /**
     * Bulk replace
     * @param array $items
     * @param string $replace
     * @param string $string
     * @return string
     */
    public function strReplace(array $items, string $replace, string $string): string
    {
        foreach ($items as $search) {
            $string = str_replace($search, $replace, $string);
        }
        return $string;
    }

    /**
     * Get the strings for language
     * @param string $language
     * @return array
     */
    public function getLanguageTranslations(string $language): array
    {
        $path = $this->getLanguageFilePath($language);
        return $this->getLanguageFileData($path);
    }

    /**
     * Set the translational for the given language.
     * @param string $language
     * @param array $translations
     * @return void
     */
    public function setLanguageTranslations(string $language, array $translations): void
    {
        $this->updateLangFile($this->getLanguageFilePath($language), $translations);
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
