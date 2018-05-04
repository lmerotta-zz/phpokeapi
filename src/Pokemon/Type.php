<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 22.12.17
 * Time: 17:08
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Type
 * @package PokeAPI\Pokemon
 */
class Type extends Resource
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var array|TypeRelation
     */
    protected $damageRelation;

    /**
     * @var array|Gameindex[]
     */
    protected $gameIndices = [];

    /**
     * @var Generation
     */
    protected $generation;

    /**
     * @var MoveDamageClass
     */
    protected $moveDamageClass;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var PokemonType
     */
    protected $pokemons = [];

    /**
     * @var array|Move[]
     */
    protected $moves = [];
}