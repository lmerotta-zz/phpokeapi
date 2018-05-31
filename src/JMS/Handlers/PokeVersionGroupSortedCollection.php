<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 04.05.18
 * Time: 14:53
 */
namespace PokeAPI\JMS\Handlers;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonDeserializationVisitor;
use PokeAPI\Translations;

/**
 * Class PokeVersionGroupSortedCollection
 */
class PokeVersionGroupSortedCollection implements SubscribingHandlerInterface
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
                'type' => 'PokeVersionGroupSortedCollection',
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
        $versionGroups = [];
        $sortedItems = [];

        foreach ($data as $toSort) {
            $versionGroupName = $toSort['version_group']['name'];
            if (empty($sortedItems[$versionGroupName])) {
                $sortedItems[$versionGroupName] = [];
                $versionGroups[$versionGroupName] = $toSort['version_group'];
            }

            $sortedItems[$versionGroupName][] = $toSort;
        }

        $formattedData = [];

        foreach ($versionGroups as $versionGroupName => $versionGroup) {
            $formattedData[] = [
                'version_group' => $versionGroup,
                'entries' => $sortedItems[$versionGroupName]
            ];
        }


        return new ArrayCollection($visitor->visitArray($formattedData, ['name' => 'array', 'params' => [['name' => $type['params'][0]]]], $context));
    }
}