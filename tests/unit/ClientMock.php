<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 02.06.18
 * Time: 23:51
 */

namespace tests\unit;

use PokeAPI\Client;

/**
 * Class ClientMock
 * @package tests
 */
class ClientMock extends Client
{
    /**
     * @var string
     */
    private $prefix = __DIR__.'/responses';

    /**
     * @param string $className
     * @param int|string $identifier
     * @return mixed
     */
    public function sendRequest(string $className, $identifier)
    {
        $path = sprintf(
            "%s/%s/%s.json",
            $this->prefix,
            $className::POKEAPI_ENDPOINT,
            $identifier
        );
        return $this->deserialize($className, file_get_contents($path));
    }
}