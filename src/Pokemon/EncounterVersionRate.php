<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 25.12.17
 * Time: 14:00
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class EncounterVersionRate
 * @package PokeAPI\Pokemon
 */
class EncounterVersionRate
{
    /**
     * @var integer
     */
    protected $rate;

    /**
     * @var Version
     */
    protected $version;

    /**
     * @return int|null
     */
    public function getRate(): int
    {
        return $this->rate;
    }

    /**
     * @return Version
     */
    public function getVersion(): Version
    {
        return $this->version;
    }
}