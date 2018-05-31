<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 08.01.18
 * Time: 17:41
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class MoveAilment
 * @package PokeAPI\Pokemon
 */
class MoveAilment
{

    const POKEAPI_ENDPOINT = 'move-ailment';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var ArrayCollection|Move[]
     */
    protected $moves;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * MoveAilment constructor.
     */
    public function __construct()
    {
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
     * @return ArrayCollection|Move[]
     */
    public function getMoves(): ArrayCollection
    {
        return $this->moves;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }
}