<?php

namespace JoeriAbbo\LaravelEasyTranslations\Tests\Helpers;

use JoeriAbbo\LaravelEasyTranslations\Tests\BaseTests;
use JoeriAbbo\LaravelEasyTranslations\Tests\TestsHelpers\LanguageHelper;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestWith;

class LanguageHelperTest extends BaseTests
{
    #[Test]
    #[TestWith(["Hello"])]
    #[TestWith([""])]
    #[TestWith(["12345"])]
    #[TestWith(["1234.5"])]
    #[TestWith(["~!@#$%^&*()-_=+[]{}|;':,.<>? +"])]
    #[TestWith(["Everything I Lost Can Be Mine Again"])]
    #[TestWith(["I Love You In Every Universe"])]
    #[TestWith(["Every Night, The Same Dream, And Every Morning, The Same Nightmare"])]
    #[TestWith(["You Always Had To Be The One With The Knife"])]
    #[TestWith(["What An Honor It Is To Court Death With You Once More"])]
    #[TestWith(["I Can't Beat You, So I'll Give You What You Want"])]
    #[TestWith(["Just Because Someone Stumbles And Loses Their Way Doesn't Mean They Are Lost Forever"])]
    #[TestWith(["You Break The Rules And Become A Hero. I Do It And Become The Enemy. That Doesn't Seem Fair"])]
    public function getTranslationTest(string $translate)
    {
        $this->assertEquals(LanguageHelper::getInstance()->getTranslation($translate, 'en'), $translate);
    }
}
