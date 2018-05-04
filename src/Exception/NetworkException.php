<?php

namespace PokeAPI\Exception;

use Throwable;

/**
 * Class NetworkException
 * @package PokeAPI\Exception
 */
class NetworkException extends \Exception
{
    /**
     * @param string $endpoint
     * @param string $response
     * @return NetworkException
     */
    public static function create(string $endpoint, string $response) : NetworkException
    {
        $message = sprintf("Error occured when querying endpoint %s. Error: %s", $endpoint, $response);

        return new static($message);
    }
}