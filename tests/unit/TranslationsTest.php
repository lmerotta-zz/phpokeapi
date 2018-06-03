<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 02.06.18
 * Time: 23:35
 */

namespace tests\unit;

use PokeAPI\Exception\TranslationNotFoundException;
use PokeAPI\Translations;
use PHPUnit\Framework\TestCase;

/**
 * Class TranslationsTest
 * @package tests
 */
class TranslationsTest extends TestCase
{
    /**
     * @return array
     */
    public function getValueProvider()
    {
        return [
            'Language available' => [
                'data' => [
                    ['language' => ['name' => 'fr'], 'value' => 'Ceci est un test'],
                    ['language' => ['name' => 'it'], 'value' => 'Questo è un test'],
                    ['language' => ['name' => 'en'], 'value' => 'This is a test']
                ],
                'languageCode' => 'fr',
                'expectException' => false,
                'expectedReturnValue' => 'Ceci est un test'
            ],
            'Language not available' => [
                'data' => [
                    ['language' => ['name' => 'fr'], 'value' => 'Ceci est un test'],
                    ['language' => ['name' => 'it'], 'value' => 'Questo è un test'],
                    ['language' => ['name' => 'en'], 'value' => 'This is a test']
                ],
                'languageCode' => 'de',
                'expectException' => true,
                'expectedReturnValue' => null
            ]
        ];
    }

    /**
     * @dataProvider getValueProvider
     * @param array $data
     * @param string $languageCode
     * @param bool $expectException
     * @param string $expectedReturnValue
     */
    public function testGetValue(array $data, string $languageCode, bool $expectException, string $expectedReturnValue = null)
    {
        if ($expectException) {
            $this->expectException(TranslationNotFoundException::class);
            $this->expectExceptionMessage(sprintf("Translation \"%s\" not found", $languageCode));
        }

        $translations = new Translations($data, 'value');
        $returnValue = $translations->getValue($languageCode);
        $this->assertEquals($expectedReturnValue, $returnValue);
    }
}
