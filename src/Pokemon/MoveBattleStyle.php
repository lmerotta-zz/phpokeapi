<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 31.05.18
 * Time: 21:49
 */

namespace PokeAPI\Pokemon;

use PokeAPI\Translations;

/**
 * Class MoveBattleStyle
 * @package PokeAPI\Pokemon
 */
class MoveBattleStyle
{

    const POKEAPI_ENDPOINT = 'move-battle-style';

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
}