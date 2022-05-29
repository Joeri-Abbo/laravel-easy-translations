<?php

namespace JoeriAbbo\LaravelEasyTranslations\Helper;

class File
{
    /**
     * Make dir if not exists.
     * @param string $path
     * @return bool
     */
    public static function makeDirPath(string $path): bool
    {
        return file_exists($path) || mkdir($path, 0777, true);
    }
}
