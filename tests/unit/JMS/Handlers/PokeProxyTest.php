<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 03.06.18
 * Time: 09:52
 */

namespace tests\unit\JMS\Handlers;

use JMS\Serializer\Context;
use JMS\Serializer\JsonDeserializationVisitor;
use PokeAPI\JMS\Handlers\PokeProxy;
use PHPUnit\Framework\TestCase;
use PokeAPI\Pokemon\Location;
use ProxyManager\Proxy\VirtualProxyInterface;
use tests\unit\ClientMock;

/**
 * Class PokeProxyTest
 * @package tests\JMS\Handlers
 */
class PokeProxyTest extends TestCase
{
    public function testReturnedObjectIsAProxy()
    {
        $handler = new PokeProxy(new ClientMock());
        $params = [
            'params' => [Location::class]
        ];
        $data = [
            "url" => "https://pokeapi.co/api/v2/location/1/",
            "name" => "canalave-city"
        ];
        $visitor = $this->prophesize(JsonDeserializationVisitor::class);
        $context = $this->prophesize(Context::class);

        $instance = $handler->deserializeProxyToJson(
            $visitor->reveal(),
            $data,
            $params,
            $context->reveal()
        );

        $this->assertInstanceOf(Location::class, $instance);
        $this->assertInstanceOf(VirtualProxyInterface::class, $instance);
        $this->assertFalse($instance->isProxyInitialized());
    }
}
