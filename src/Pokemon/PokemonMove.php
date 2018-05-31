<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 30.01.18
 * Time: 07:28
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class PokemonMove
 * @package PokeAPI\Pokemon
 */
class PokemonMove
{
    /**
     * @var Move
     */
    protected $move;

    /**
     * @var ArrayCollection|VersionGroupPokemonMove[]
     */
    protected $versionPokemonMoves;

    /**
     * PokemonMove constructor.
     */
    public function __construct()
    {
        $this->versionPokemonMoves = new ArrayCollection();
    }

    /**
     * @return Move
     */
    public function getMove(): Move
    {
        return $this->move;
    }

    /**
     * @return ArrayCollection|VersionGroupPokemonMove[]
     */
    public function getVersionPokemonMoves(): ArrayCollection
    {
        return $this->versionPokemonMoves;
    }
}