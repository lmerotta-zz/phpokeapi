<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 31.05.18
 * Time: 21:37
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Nature
 * @package PokeAPI\Pokemon
 */
class Nature
{

    const POKEAPI_ENDPOINT = 'nature';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var Stat
     */
    protected $decreasedStat;

    /**
     * @var Stat
     */
    protected $increasedStat;

    /**
     * @var BerryFlavor
     */
    protected $hatedFlavor;

    /**
     * @var BerryFlavor
     */
    protected $likedFlavor;

    /**
     * @var ArrayCollection|NatureStatChange[]
     */
    protected $pokeathlonStatChanges;

    /**
     * @var ArrayCollection|MoveBattleStylePreference[]
     */
    protected $moveBattleStylePreferences;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * Nature constructor.
     */
    public function __construct()
    {
        $this->moveBattleStylePreferences = new ArrayCollection();
        $this->pokeathlonStatChanges = new ArrayCollection();
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
     * @return Stat
     */
    public function getDecreasedStat(): Stat
    {
        return $this->decreasedStat;
    }

    /**
     * @return Stat
     */
    public function getIncreasedStat(): Stat
    {
        return $this->increasedStat;
    }

    /**
     * @return BerryFlavor
     */
    public function getHatedFlavor(): BerryFlavor
    {
        return $this->hatedFlavor;
    }

    /**
     * @return BerryFlavor
     */
    public function getLikedFlavor(): BerryFlavor
    {
        return $this->likedFlavor;
    }

    /**
     * @return ArrayCollection|NatureStatChange[]
     */
    public function getPokeathlonStatChanges(): ArrayCollection
    {
        return $this->pokeathlonStatChanges;
    }

    /**
     * @return ArrayCollection|MoveBattleStylePreference
     */
    public function getMoveBattleStylePreferences(): ArrayCollection
    {
        return $this->moveBattleStylePreferences;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }
}