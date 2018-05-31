<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 04.05.18
 * Time: 14:53
 */
namespace PokeAPI\JMS\Handlers;

use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use PokeAPI\Client;
use ProxyManager\Factory\LazyLoadingValueHolderFactory;
use ProxyManager\Proxy\LazyLoadingInterface;

/**
 * Class PokeProxy
 */
class PokeProxy implements SubscribingHandlerInterface
{
    /**
     * @var Client
     */
    private $client;

    /**
     * PokeProxy constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return array
     */
    public static function getSubscribingMethods()
    {
        return [
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => 'PokeProxy',
                'method' => 'deserializeProxyToJson',
            ]
        ];
    }

    /**
     * @param JsonDeserializationVisitor $visitor
     * @param $data
     * @param array $type
     * @param Context $context
     * @return object
     */
    public function deserializeProxyToJson(JsonDeserializationVisitor $visitor, $data, array $type, Context $context)
    {
        list($class, $endpoint, $identifier) = $type['params'];
        return $this->createProxy($class, $endpoint, $data[$identifier]);
    }

    /**
     * @param string $class
     * @param string $resourceUri
     * @param int|string $identifier
     * @return object a proxy of $class
     */
    private function createProxy(string $class, string $resourceUri, $identifier)
    {
        $client = $this;
        $factory     = new LazyLoadingValueHolderFactory();
        $initializer = function (& $wrappedObject, LazyLoadingInterface $proxy, $method, array $parameters, & $initializer) use ($client, $class, $resourceUri, $identifier) {
            $response = $this->client->sendRequest($class, $resourceUri, $identifier);
            $initializer   = null; // disable initialization
            $wrappedObject = new $class($client, $response); // fill your object with values here

            return true; // confirm that initialization occurred correctly
        };

        return $factory->createProxy($class, $initializer);
    }
}