<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 31.05.18
 * Time: 18:55
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class EncounterCondition
 * @package PokeAPI\Pokemon
 */
class EncounterCondition
{

    const POKEAPI_ENDPOINT = 'encounter-condition';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var ArrayCollection|EncounterConditionValue[]
     */
    protected $values;

    /**
     * EncounterCondition constructor.
     */
    public function __construct()
    {
        $this->values = new ArrayCollection();
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
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }

    /**
     * @return ArrayCollection|EncounterConditionValue[]
     */
    public function getValues(): ArrayCollection
    {
        return $this->values;
    }
}