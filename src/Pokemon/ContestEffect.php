<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 03.06.18
 * Time: 22:59
 */

namespace PokeAPI\Pokemon;

use PokeAPI\Translations;

/**
 * Class ContestEffect
 * @package PokeAPI\Pokemon
 */
class ContestEffect
{

    const POKEAPI_ENDPOINT = 'contest-effect';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var integer
     */
    protected $appeal;

    /**
     * @var integer
     */
    protected $jam;

    /**
     * @var Translations
     */
    protected $effects;

    /**
     * @var Translations
     */
    protected $flavorTexts;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getAppeal(): int
    {
        return $this->appeal;
    }

    /**
     * @return int
     */
    public function getJam(): int
    {
        return $this->jam;
    }

    /**
     * @return Translations
     */
    public function getEffects(): Translations
    {
        return $this->effects;
    }

    /**
     * @return Translations
     */
    public function getFlavorTexts(): Translations
    {
        return $this->flavorTexts;
    }
}