<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 30.01.18
 * Time: 07:23
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class PokemonHeldItem
 * @package PokeAPI\Pokemon
 */
class PokemonHeldItem extends Resource
{
    /**
     * @var Item
     */
    protected $item;

    /**
     * @var array|VersionHeldItem[]
     */
    protected $versionHeldItems = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->item = $this->client->item($data['item']['url']);

        foreach ($data['version_details'] as $detail) {
            $this->versionHeldItems[] = new VersionHeldItem($this->client, $detail);
        }
    }

    /**
     * @return Item
     */
    public function getItem(): Item
    {
        return $this->item;
    }

    /**
     * @return array|VersionHeldItem[]
     */
    public function getVersionHeldItems()
    {
        return $this->versionHeldItems;
    }
}