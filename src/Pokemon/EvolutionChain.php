<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 20.12.17
 * Time: 13:09
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class EvolutionChain
 * @package PokeAPI\Pokemon
 */
class EvolutionChain extends Resource
{

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var Item|null
     */
    protected $babyTriggerItem;

    /**
     * @var ChainLink
     */
    protected $chain;

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];

        if (!empty($data['baby_trigger_item'])) {
            $this->babyTriggerItem = $this->client->item($data['baby_trigger_item']['url']);
        }

        $this->chain = new ChainLink($this->client, $data['chain']);
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return Item|null
     */
    public function getBabyTriggerItem(): ?Item
    {
        return $this->babyTriggerItem;
    }

    /**
     * @return ChainLink
     */
    public function getChain(): ChainLink
    {
        return $this->chain;
    }
}