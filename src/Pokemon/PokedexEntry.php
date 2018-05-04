<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 20.12.17
 * Time: 12:59
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class PokedexEntry
 * @package PokeAPI\Pokemon
 */
class PokedexEntry extends Resource
{
    /**
     * @var integer
     */
    protected $number;

    /**
     * @var Pokedex
     */
    protected $pokedex;

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->number = $data['entry_number'];
        $this->pokedex = $this->client->pokedex($data['pokedex']['url']);
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return Pokedex
     */
    public function getPokedex(): Pokedex
    {
        return $this->pokedex;
    }
}