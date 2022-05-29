<?php

namespace JoeriAbbo\LaravelEasyTranslations\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use JoeriAbbo\LaravelEasyTranslations\Helper\Config;
use JoeriAbbo\LaravelEasyTranslations\Helper\File;
use JoeriAbbo\LaravelEasyTranslations\LaravelEasyTranslationsPackageServiceProvider;

class Installer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel-easy-translations:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install this package';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Installing Laravel Easy Translations...');
        $this->info('Creating config file...');
        Artisan::call('vendor:publish --provider="' . LaravelEasyTranslationsPackageServiceProvider::class . '"');

        $this->info('Creating folder for translations...');
        File::makeDirPath(Config::getSetting('storage_path'));
//        publish views

        $this->info('Done!');
        return 0;
    }
}
