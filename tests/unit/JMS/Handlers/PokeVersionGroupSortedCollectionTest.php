<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 03.06.18
 * Time: 10:00
 */

namespace tests\unit\JMS\Handlers;

use JMS\Serializer\Context;
use JMS\Serializer\JsonDeserializationVisitor;
use PokeAPI\JMS\Handlers\PokeVersionGroupSortedCollection;
use PHPUnit\Framework\TestCase;

/**
 * Class PokeVersionGroupSortedCollectionTest
 * @package tests\JMS\Handlers
 */
class PokeVersionGroupSortedCollectionTest extends TestCase
{
    public function testDataIsFormattedCorrectly()
    {
        $expected = [
            [
                'version_group' => ['name' => 'red-blue'],
                'entries' => [
                    ['version_group' => ['name' => 'red-blue'], 'data' => 'entry2'],
                    ['version_group' => ['name' => 'red-blue'], 'data' => 'entry1'],
                ]
            ],
            [
                'version_group' => ['name' => 'yellow'],
                'entries' => [
                    ['version_group' => ['name' => 'yellow'], 'data' => 'entry3'],
                    ['version_group' => ['name' => 'yellow'], 'data' => 'entry4'],
                ]
            ],
        ];


        $data = [
            [
                'version_group' => ['name' => 'red-blue'],
                'data' => 'entry2',
            ],
            [
                'version_group' => ['name' => 'yellow'],
                'data' => 'entry3',
            ],
            [
                'version_group' => ['name' => 'red-blue'],
                'data' => 'entry1',
            ],
            [
                'version_group' => ['name' => 'yellow'],
                'data' => 'entry4',
            ],
        ];

        $params = [
            'params' => ['unit_test']
        ];

        $context = $this->prophesize(Context::class);

        $visitor = $this->prophesize(JsonDeserializationVisitor::class);
        $visitor->visitArray(
            $expected,
            ['name' => 'array', 'params' => [['name' => 'unit_test']]],
            $context->reveal()
        )->shouldBeCalled()->willReturn([]);

        $handler = new PokeVersionGroupSortedCollection();
        $handler->deserializeTranslationToJson(
            $visitor->reveal(),
            $data,
            $params,
            $context->reveal()
        );
    }
}
