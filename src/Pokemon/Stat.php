<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 08.01.18
 * Time: 17:54
 */

namespace PokeAPI\Pokemon;
use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Stat
 * @package PokeAPI\Pokemon
 */
class Stat
{

    const POKEAPI_ENDPOINT = 'stat';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var integer
     */
    protected $gameIndex;

    /**
     * @var boolean
     */
    protected $battleOnly;

    /**
     * @var ArrayCollection|MoveStatAffect[]
     */
    protected $affectingMoves;

    /**
     * @var ArrayCollection|Nature[]
     */
    protected $affectingNatures;

    /**
     * @var ArrayCollection|Characteristic[]
     */
    protected $characteristics;

    /**
     * @var MoveDamageClass
     */
    protected $moveDamageClass;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->affectingMoves = new ArrayCollection();
        $this->affectingNatures = new ArrayCollection();
        $this->characteristics = new ArrayCollection();
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
     * @return int
     */
    public function getGameIndex(): int
    {
        return $this->gameIndex;
    }

    /**
     * @return bool
     */
    public function isBattleOnly(): bool
    {
        return $this->battleOnly;
    }

    /**
     * @return ArrayCollection|MoveStatAffect[]
     */
    public function getAffectingMoves(): ArrayCollection
    {
        return $this->affectingMoves;
    }

    /**
     * @return ArrayCollection|NatureStatAffect[]
     */
    public function getAffectingNatures(): ArrayCollection
    {
        return $this->affectingNatures;
    }

    /**
     * @return ArrayCollection|Characteristic[]
     */
    public function getCharacteristics(): ArrayCollection
    {
        return $this->characteristics;
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
}