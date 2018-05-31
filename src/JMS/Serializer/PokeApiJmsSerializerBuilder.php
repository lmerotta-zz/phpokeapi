<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 04.05.18
 * Time: 14:43
 */
namespace PokeAPI\JMS\Serializer;
use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\SerializerBuilder;
use PokeAPI\Client;
use PokeAPI\JMS\Handlers\PokeProxy;
use PokeAPI\JMS\Handlers\PokeTranslation;
use PokeAPI\JMS\Handlers\PokeVersionGroupSortedCollection;

/**
 * Class PokeApiJmsSerializerBuilder
 */
class PokeApiJmsSerializerBuilder
{
    /**
     * @param Client $client
     * @return \JMS\Serializer\Serializer
     */
    public static function build(Client $client)
    {
        return SerializerBuilder::create()
            ->addMetadataDir(__DIR__.'/../config')
            ->configureHandlers(function (HandlerRegistry $registry) use ($client) {
                $registry->registerSubscribingHandler(new PokeProxy($client));
                $registry->registerSubscribingHandler(new PokeTranslation());
                $registry->registerSubscribingHandler(new PokeVersionGroupSortedCollection());
            })
            ->addDefaultHandlers()
            ->build();
    }
}