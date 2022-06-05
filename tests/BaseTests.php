<?php

namespace JoeriAbbo\LaravelEasyTranslations\Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use JoeriAbbo\LaravelEasyTranslations\LaravelEasyTranslationsPackageServiceProvider;

class BaseTests extends \Orchestra\Testbench\TestCase
{
    protected $loadEnvironmentVariables = true;

    use DatabaseMigrations;
    use WithFaker;

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:refresh', [
            '--database' => 'testbench',
            '--path' => '../../../../database/migrations'
        ])->run();

    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelEasyTranslationsPackageServiceProvider::class,
        ];
    }
}
