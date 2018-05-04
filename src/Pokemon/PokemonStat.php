<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 28.01.18
 * Time: 11:41
 */

namespace PokeAPI\Pokemon;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class PokemonStat
 * @package PokeAPI\Pokemon
 */
class PokemonStat extends Resource
{
    /**
     * @var Stat
     */
    protected $stat;

    /**
     * @var integer
     */
    protected $effort;

    /**
     * @var integer
     */
    protected $baseStat;

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->stat = $this->client->stat($data['stat']['url']);
        $this->effort = $data['effort'];
        $this->baseStat = $data['base_stat'];
    }

    /**
     * @return Stat
     */
    public function getStat(): Stat
    {
        return $this->stat;
    }

    /**
     * @return int
     */
    public function getEffort(): int
    {
        return $this->effort;
    }

    /**
     * @return int
     */
    public function getBaseStat(): int
    {
        return $this->baseStat;
    }
}