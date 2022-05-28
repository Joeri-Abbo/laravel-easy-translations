<?php

namespace JoeriAbbo\LaravelEasyTranslations\Console\Commands;

use Illuminate\Console\Command;

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
        // create config file
        // create directory for translations
        // test write permissions for directory create

        return 0;
    }
}
