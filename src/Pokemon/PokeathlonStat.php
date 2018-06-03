<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 03.06.18
 * Time: 16:43
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class PokeathlonStat
 * @package src\Pokemon
 */
class PokeathlonStat
{

    const POKEAPI_ENDPOINT = 'pokeathlon-stat';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var ArrayCollection|StatNatureChange[]
     */
    protected $affectingNatures;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * PokeathlonStat constructor.
     */
    public function __construct()
    {
        $this->affectingNatures = new ArrayCollection();
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
     * @return ArrayCollection|StatNatureChange[]
     */
    public function getAffectingNatures(): ArrayCollection
    {
        return $this->affectingNatures;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }
}