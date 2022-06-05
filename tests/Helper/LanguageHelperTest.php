<?php

namespace JoeriAbbo\LaravelEasyTranslations\Tests\Helpers;

use JoeriAbbo\LaravelEasyTranslations\Tests\BaseTests;
use JoeriAbbo\LaravelEasyTranslations\Tests\TestsHelpers\LanguageHelper;

class LanguageHelperTest extends BaseTests
{
    /**
     * @test
     * @testWith ["Hello"]
     *           [""]
     *           ["12345"]
     *           ["12345"]
     *           ["1234.5"]
     *           ["~!@#$%^&*()-_=+[]{}|;':,.<>? +"]
     *           ["Everything I Lost Can Be Mine Again"]
     *           ["I Love You In Every Universe"]
     *           ["Every Night, The Same Dream, And Every Morning, The Same Nightmare"]
     *           ["You Always Had To Be The One With The Knife"]
     *           ["What An Honor It Is To Court Death With You Once More"]
     *           ["I Can’t Beat You, So I’ll Give You What You Want"]
     *           ["Just Because Someone Stumbles And Loses Their Way Doesn’t Mean They Are Lost Forever"]
     *           ["You Break The Rules And Become A Hero. I Do It And Become The Enemy. That Doesn't Seem Fair"]
     */
    public function getTranslationTest(string $translate)
    {
        $this->assertEquals(LanguageHelper::getInstance()->getTranslation($translate, 'en'), $translate);
    }
}
