<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 02.06.18
 * Time: 23:50
 */

namespace tests\unit\JMS\Handlers;

use JMS\Serializer\Context;
use JMS\Serializer\JsonDeserializationVisitor;
use PokeAPI\JMS\Handlers\PokeTranslation;
use PHPUnit\Framework\TestCase;
use PokeAPI\Translations;

/**
 * Class PokeTranslationTest
 * @package tests\JMS\Handlers
 */
class PokeTranslationTest extends TestCase
{
    public function testTranslationsInstanceIsReturned()
    {
        $visitor = $this->prophesize(JsonDeserializationVisitor::class);
        $context = $this->prophesize(Context::class);

        $data = [
            ['language' => ['name' => 'fr'], 'value' => 'Ceci est un test'],
            ['language' => ['name' => 'it'], 'value' => 'Questo è un test'],
            ['language' => ['name' => 'en'], 'value' => 'This is a test']
        ];

        $handler = new PokeTranslation();
        $returnValue = $handler->deserializeTranslationToJson(
            $visitor->reveal(),
            $data,
            ['params' => ['value']],
            $context->reveal()
        );

        $this->assertInstanceOf(Translations::class, $returnValue);
        $this->assertEquals('Questo è un test', $returnValue->getValue('it'));
    }
}
