<?php

namespace JoeriAbbo\LaravelEasyTranslations\Tests\TestsHelpers;


class LanguageHelper extends \JoeriAbbo\LaravelEasyTranslations\Helper\LanguageHelper
{
    public array $languageData = [];

    /**
     * Mock interactions with file store
     * @param string $path
     * @param array $data
     * @return void
     */
    public function updateLangFile(string $path, array $data): void
    {
        $this->languageData[$path] = $data;
    }

    /**
     * Mock interactions with file get
     * @param string $path
     * @return array
     */
    public function getLanguageFileData(string $path): array
    {
        if (key_exists($path, $this->languageData)) {
            return $this->languageData[$path];
        }

        return [];
    }


}