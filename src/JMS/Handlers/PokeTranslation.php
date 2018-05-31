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
use PokeAPI\Translations;

/**
 * Class PokeTranslation
 */
class PokeTranslation implements SubscribingHandlerInterface
{
    /**
     * @return array
     */
    public static function getSubscribingMethods()
    {
        return [
            [
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => 'json',
                'type' => 'PokeTranslation',
                'method' => 'deserializeTranslationToJson',
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
    public function deserializeTranslationToJson(JsonDeserializationVisitor $visitor, $data, array $type, Context $context)
    {
        $property = $type['params'][0];
        return new Translations($data, $property);
    }
}