<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 31.05.18
 * Time: 22:34
 */

namespace tests;

use PHPUnit\Framework\TestCase;
use PokeAPI\Client;
use PokeAPI\Exception\NetworkException;
use Symfony\Component\Cache\Simple\NullCache;

/**
 * Class ClientTest
 * @package tests
 */
class ClientTest extends TestCase
{
    /**
     * @expectedException PokeAPI\Exception\NetworkException
     */
    public function testThatANetworkExceptionIsThrownWhenTheApiIsDown()
    {
        $client = new Client('notavalidurl', new NullCache());
        $client->area(1);
    }

    // TODO: test proxy
}
