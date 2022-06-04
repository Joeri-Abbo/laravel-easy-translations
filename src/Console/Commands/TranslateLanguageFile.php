<?php

namespace JoeriAbbo\LaravelEasyTranslations\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use JoeriAbbo\LaravelEasyTranslations\Helper\LanguageHelper;
use JoeriAbbo\LaravelEasyTranslations\LaravelEasyTranslationsPackageServiceProvider;
use Stichoza\GoogleTranslate\GoogleTranslate;

class TranslateLanguageFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = LaravelEasyTranslationsPackageServiceProvider::PACKAGE_NAME . ':translate-file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Translate your language files easy and fast with google. ';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->warn('Google rates the number of allowed translations.
         This means mid way the translate service can break.');
        $language = $this->choice(
            'which language do you want to translate?
',
            LanguageHelper::getInstance()->getLanguages()
        );

        $language_code = Str::lower($this->ask('What is the language code of the given language. Example en'));
        $new_language_code = Str::lower($this->ask('What is the new language code for the new language . Example nl'));

        if (in_array($new_language_code, LanguageHelper::getInstance()->getLanguages())) {
            if (!$this->confirm('Are you sure? The language already exists. The translations will be overwritten')) {
                $this->warn('User canceled the translations');
                $this->info('exited');
                exit;
            }
        }
        $this->info('Starting translation process');
        $tr = new GoogleTranslate();
        $tr->setSource($language_code);
        $tr->setTarget($new_language_code);

        $translations = LanguageHelper::getInstance()->getLanguageTranslations($language);
        LanguageHelper::getInstance()->setLanguageTranslations($new_language_code, $translations);
        foreach ($translations as $key => $translation) {
            try {
                $translations_new = LanguageHelper::getInstance()->getLanguageTranslations($new_language_code);
                $translation_new = $tr->translate($translation);
                $this->info(sprintf('%s : %s', $translation, $translation_new));
                $translations_new[$key] = $translation_new;
                LanguageHelper::getInstance()->setLanguageTranslations($new_language_code, $translations_new);
            } catch (\Exception$exception) {
                $this->error('O no something went wrong!: ' . $exception->getMessage());
            }
        }
        return 0;
    }
}
