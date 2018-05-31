<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 31.05.18
 * Time: 18:52
 */

namespace PokeAPI\Pokemon;

use PokeAPI\Translations;

/**
 * Class EncounterConditionValue
 * @package PokeAPI\Pokemon
 */
class EncounterConditionValue
{

    const POKEAPI_ENDPOINT = 'encounter-condition-value';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var EncounterCondition
     */
    protected $condition;

    /**
     * @var Translations
     */
    protected $names;

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
     * @return EncounterCondition
     */
    public function getCondition(): EncounterCondition
    {
        return $this->condition;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }
}