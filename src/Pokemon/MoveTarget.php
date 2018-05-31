<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 01.01.18
 * Time: 22:26
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class MoveTarget
 * @package PokeAPI\Pokemon
 */
class MoveTarget
{

    const POKEAPI_ENDPOINT = 'move-target';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Translations|null
     */
    protected $descriptions;

    /**
     * @var ArrayCollection|Move[]
     */
    protected $moves;

    /**
     * @var Translations|null
     */
    protected $names;

    /**
     * MoveTarget constructor.
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
     * @return null|Translations
     */
    public function getDescriptions(): ?Translations
    {
        return $this->descriptions;
    }

    /**
     * @return ArrayCollection|Move[]
     */
    public function getMoves(): ArrayCollection
    {
        return $this->moves;
    }

    /**
     * @return null|Translations
     */
    public function getNames(): ?Translations
    {
        return $this->names;
    }
}