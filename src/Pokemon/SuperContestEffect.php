<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 03.06.18
 * Time: 22:59
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class SuperContestEffect
 * @package PokeAPI\Pokemon
 */
class SuperContestEffect
{

    const POKEAPI_ENDPOINT = 'super-contest-effect';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var integer
     */
    protected $appeal;

    /**
     * @var Translations
     */
    protected $flavorTexts;

    /**
     * @var ArrayCollection|Move[]
     */
    protected $moves;

    /**
     * SuperContestEffect constructor.
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
     * @return int
     */
    public function getAppeal(): int
    {
        return $this->appeal;
    }

    /**
     * @return Translations
     */
    public function getFlavorTexts(): Translations
    {
        return $this->flavorTexts;
    }

    /**
     * @return ArrayCollection|Move[]
     */
    public function getMoves(): ArrayCollection
    {
        return $this->moves;
    }
}