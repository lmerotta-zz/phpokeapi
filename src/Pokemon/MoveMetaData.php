<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 01.01.18
 * Time: 22:24
 */

namespace PokeAPI\Pokemon;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class MoveMetaData
 * @package PokeAPI\Pokemon
 */
class MoveMetaData extends Resource
{
    /**
     * @var MoveAilment
     */
    protected $ailment;

    /**
     * @var MoveCategory
     */
    protected $category;

    /**
     * @var integer|null
     */
    protected $minHits;

    /**
     * @var integer|null
     */
    protected $maxHits;

    /**
     * @var integer|null
     */
    protected $minTurns;

    /**
     * @var integer|null
     */
    protected $maxTurns;

    /**
     * @var integer
     * If negative, recoil damage. If positive, HP drain
     */
    protected $drainPercent;

    /**
     * @var integer
     * Percentage based off the Pokémon's max HP
     */
    protected $healingPercent;

    /**
     * @var integer
     */
    protected $criticalRate;

    /**
     * @var integer
     */
    protected $ailmentChance;

    /**
     * @var integer
     */
    protected $flintChance;

    /**
     * @var integer
     */
    protected $statChance;

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->ailment = $this->client->moveAilment($data['ailment']['url']);
        $this->category = $this->client->moveCategory($data['category']['url']);
        $this->minHits = $data['min_hits'];
        $this->maxHits = $data['max_hits'];
        $this->minturns = $data['min_turns'];
        $this->maxturns = $data['max_turns'];
        $this->drainPercent = $data['drain'];
        $this->healingPercent = $data['healing'];
        $this->criticalRate = $data['crit_rate'];
        $this->ailmentChance = $data['ailment_chance'];
        $this->flintChance = $data['flint_chance'];
        $this->statChance = $data['stat_chance'];
    }

    /**
     * @return MoveAilment
     */
    public function getAilment(): MoveAilment
    {
        return $this->ailment;
    }

    /**
     * @return MoveCategory
     */
    public function getCategory(): MoveCategory
    {
        return $this->category;
    }

    /**
     * @return int|null
     */
    public function getMinHits(): ?int
    {
        return $this->minHits;
    }

    /**
     * @return int|null
     */
    public function getMaxHits(): ?int
    {
        return $this->maxHits;
    }

    /**
     * @return int|null
     */
    public function getMinTurns(): ?int
    {
        return $this->minTurns;
    }

    /**
     * @return int|null
     */
    public function getMaxTurns(): ?int
    {
        return $this->maxTurns;
    }

    /**
     * @return int
     */
    public function getDrainPercent(): int
    {
        return $this->drainPercent;
    }

    /**
     * @return int
     */
    public function getHealingPercent(): int
    {
        return $this->healingPercent;
    }

    /**
     * @return int
     */
    public function getCriticalRate(): int
    {
        return $this->criticalRate;
    }

    /**
     * @return int
     */
    public function getAilmentChance(): int
    {
        return $this->ailmentChance;
    }

    /**
     * @return int
     */
    public function getFlintChance(): int
    {
        return $this->flintChance;
    }

    /**
     * @return int
     */
    public function getStatChance(): int
    {
        return $this->statChance;
    }
}