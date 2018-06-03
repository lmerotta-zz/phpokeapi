<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 02.06.18
 * Time: 23:26
 */

namespace tests\unit;

use PHPUnit\Framework\TestCase;
use PokeAPI\Client;
use PokeAPI\Pokemon\Area;

/**
 * Class ClientTest
 * @package tests
 */
class ClientTest extends TestCase
{
    /**
     * @expectedException PokeAPI\Exception\NetworkException
     */
    public function testExceptionIsThrownOnCurlError()
    {
        $client = new Client('notreachableapi');
        $client->species(1);
    }

    public function testRequestedObjectIsReturned()
    {
        $client = new ClientMock();
        $instance = $client->area(1);

        $this->assertInstanceOf(Area::class, $instance);
        $this->assertEquals(1, $instance->getId());
    }
}