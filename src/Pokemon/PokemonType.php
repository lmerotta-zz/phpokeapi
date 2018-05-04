<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 30.01.18
 * Time: 07:31
 */

namespace PokeAPI\Pokemon;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class PokemonType
 * @package PokeAPI\Pokemon
 */
class PokemonType extends Resource
{
    /**
     * @var integer
     */
    protected $slot;

    /**
     * @var Type
     */
    protected $type;

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->slot = $data['slot'];
        $this->type = $this->client->type($data['type']['url']);
    }

    /**
     * @return int
     */
    public function getSlot(): int
    {
        return $this->slot;
    }

    /**
     * @return Type
     */
    public function getType(): Type
    {
        return $this->type;
    }
}