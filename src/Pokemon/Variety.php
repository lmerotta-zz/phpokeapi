<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 21.12.17
 * Time: 07:28
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Variety
 * @package PokeAPI\Pokemon
 */
class Variety extends Resource
{
    /**
     * @var boolean
     */
    protected $default;

    /**
     * @var Pokemon
     */
    protected $pokemon;

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->default = $data['is_default'];
        $this->pokemon = $this->client->pokemon($data['pokemon']['url']);
    }

    /**
     * @return bool
     */
    public function isDefault(): bool
    {
        return $this->default;
    }

    /**
     * @return Pokemon
     */
    public function getPokemon(): Pokemon
    {
        return $this->pokemon;
    }
}