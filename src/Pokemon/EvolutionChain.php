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
class EvolutionChain
{

    const POKEAPI_ENDPOINT = 'evolution-chain';

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