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
class Type
{

    const POKEAPI_ENDPOINT = 'type';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var ArrayCollection|TypeRelation
     * array of relations to types, where the key is the relation
     */
    protected $damageRelations;

    /**
     * @var ArrayCollection|GameIndex[]
     */
    protected $gameIndices;

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
     * @var ArrayCollection|PokemonType
     */
    protected $pokemons;

    /**
     * @var ArrayCollection|Move[]
     */
    protected $moves;

    /**
     * Type constructor.
     */
    public function __construct()
    {
        $this->damageRelations = new ArrayCollection();
        $this->damageRelations = new ArrayCollection();
        $this->gameIndices = new ArrayCollection();
        $this->moves = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return ArrayCollection|TypeRelation
     */
    public function getDamageRelations(): ArrayCollection
    {
        return $this->damageRelations;
    }

    /**
     * @return ArrayCollection|GameIndex[]
     */
    public function getGameIndices(): ArrayCollection
    {
        return $this->gameIndices;
    }

    /**
     * @return Generation
     */
    public function getGeneration(): Generation
    {
        return $this->generation;
    }

    /**
     * @return MoveDamageClass
     */
    public function getMoveDamageClass(): MoveDamageClass
    {
        return $this->moveDamageClass;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }

    /**
     * @return ArrayCollection|PokemonType
     */
    public function getPokemons(): ArrayCollection
    {
        return $this->pokemons;
    }

    /**
     * @return ArrayCollection|Move[]
     */
    public function getMoves(): ArrayCollection
    {
        return $this->moves;
    }
}