<div align="center">

<h3 align="center">Laravel Easy Translations</h3>
</div>

[![Test](https://github.com/Joeri-Abbo/laravel-easy-translations/actions/workflows/test.yml/badge.svg)](https://github.com/Joeri-Abbo/laravel-easy-translations/actions/workflows/test.yml)
[![Test](https://github.com/Joeri-Abbo/laravel-easy-translations/actions/workflows/psalm.yml/badge.svg)](https://github.com/Joeri-Abbo/laravel-easy-translations/actions/workflows/psalm.yml)
[![Test](https://github.com/Joeri-Abbo/laravel-easy-translations/actions/workflows/codeql-analysis.yml/badge.svg)](https://github.com/Joeri-Abbo/laravel-easy-translations/actions/workflows/codeql-analysis.yml)
[![Test](https://github.com/Joeri-Abbo/laravel-easy-translations/actions/workflows/composer-normalize.yml/badge.svg)](https://github.com/Joeri-Abbo/laravel-easy-translations/actions/workflows/composer-normalize.yml)
[![Test](https://github.com/Joeri-Abbo/laravel-easy-translations/actions/workflows/php-normalize.yml/badge.svg)](https://github.com/Joeri-Abbo/laravel-easy-translations/actions/workflows/php-normalize.yml)

## Getting Started

### Prerequisites
- Php 8 and up
- Laravel 9 
### Installation
To get started require the package with composer.

```bash
composer require joeri-abbo/laravel-easy-translations
```

After installing the package in to your laravel project run the command below to add the config and create the language
folder.

```bash
php artisan laravel-easy-translations:install
```

You can custom the dir for the language file storage by editing the config setting storage_path to your wanted path.
After changing this setting the dir automatically will be generated when a transulation is called. You can also force it
by running

```bash
php artisan laravel-easy-translations:install
```

## Usage

You can easily use the translate function in your application. The first parameter is required the second one is your
language pack. Default it uses your default set in the config. If you do not change this it will be english.

```php
<?php
echo translate('String to translate')
?>
```

If you want to translate to your custom language pack it is as easy as adding the second parameter for the language
pack like below

```php
<?php
echo translate('String to translate','dutch')
?>
```

To change the default pack on your web pack it is as easy to change the value inside the Language helper class like
below.
The translated sting will be in the set language pack. If it is not found it will return the given string.

```php
<?php
\JoeriAbbo\LaravelEasyTranslations\Helper\LanguageHelper::getInstance()->setLanguage('dutch')

echo translate('String to translate')
?>
```

You can translate the json file by your editor but there is also a view for this. To access this view your application
env needs to be value APP_ENV needs to be local.
The url is `base_url/laravel-easy-translations` this view shows the found languages and the option to edit these translations.


You can also automatic translate your application by using the command below. It wil use Google translate to translate your given base language pack
```bash
php artisan laravel-easy-translations:translate-file
```

## Releases

version 1.0.0

- Initial release