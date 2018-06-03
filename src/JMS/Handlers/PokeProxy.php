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
use ProxyManager\Factory\RemoteObjectFactory;
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
        $class = $type['params'][0];

        $identifier = empty($data['name']) ? $data['url'] : $data['name'];
        return $this->createProxy($class, $identifier);
    }

    /**
     * @param string $class
     * @param int|string $identifier
     * @return object a proxy of $class
     */
    private function createProxy(string $class, $identifier)
    {
        $factory     = new LazyLoadingValueHolderFactory();
        $initializer = function (& $wrappedObject, LazyLoadingInterface $proxy, $method, array $parameters, & $initializer) use ($class, $identifier) {
            $response = $this->client->sendRequest($class, $identifier);
            $initializer   = null;
            $wrappedObject = $response;

            return true;
        };

        return $factory->createProxy($class, $initializer);
    }
}