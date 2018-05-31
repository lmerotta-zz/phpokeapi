<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 25.12.17
 * Time: 13:54
 */

namespace PokeAPI\Pokemon;

/**
 * Class EvolutionDetails
 * @package PokeAPI\Pokemon
 */
class EvolutionDetails
{
    /**
     * @var Item|null
     */
    protected $item;

    /**
     * @var EvolutionTrigger
     */
    protected $trigger;

    /**
     * @var Gender|null
     */
    protected $gender;

    /**
     * @var Item|null
     */
    protected $heldItem;

    /**
     * @var Move|null
     */
    protected $knownMove;

    /**
     * @var Type|null
     */
    protected $knownMoveType;

    /**
     * @var Location|null
     */
    protected $location;

    /**
     * @var integer|null
     */
    protected $minLevel;

    /**
     * @var integer|null
     */
    protected $minHappiness;

    /**
     * @var integer|null
     */
    protected $minBeauty;

    /**
     * @var integer|null
     */
    protected $minAffection;

    /**
     * @var boolean
     */
    protected $needsRain;

    /**
     * @var Species|null
     */
    protected $partySpecies;

    /**
     * @var Type|null
     */
    protected $partyType;

    /**
     * @var integer|null
     * 1 means Attack > Defense. 0 means Attack = Defense. -1 means Attack < Defense.
     */
    protected $physicalStats;

    /**
     * @var string|null
     */
    protected $timeOfDay;

    /**
     * @var Species|null
     */
    protected $tradeSpecies;

    /**
     * @var boolean
     */
    protected $upsideDown;

    /**
     * @return null|Item
     */
    public function getItem(): ?Item
    {
        return $this->item;
    }

    /**
     * @return EvolutionTrigger
     */
    public function getTrigger(): EvolutionTrigger
    {
        return $this->trigger;
    }

    /**
     * @return null|Gender
     */
    public function getGender(): ?Gender
    {
        return $this->gender;
    }

    /**
     * @return null|Item
     */
    public function getHeldItem(): ?Item
    {
        return $this->heldItem;
    }

    /**
     * @return null|Move
     */
    public function getKnownMove(): ?Move
    {
        return $this->knownMove;
    }

    /**
     * @return null|Type
     */
    public function getKnownMoveType(): ?Type
    {
        return $this->knownMoveType;
    }

    /**
     * @return null|Location
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @return int|null
     */
    public function getMinLevel(): ?int
    {
        return $this->minLevel;
    }

    /**
     * @return int|null
     */
    public function getMinHappiness(): ?int
    {
        return $this->minHappiness;
    }

    /**
     * @return int|null
     */
    public function getMinBeauty(): ?int
    {
        return $this->minBeauty;
    }

    /**
     * @return int|null
     */
    public function getMinAffection(): ?int
    {
        return $this->minAffection;
    }

    /**
     * @return bool
     */
    public function isNeedsRain(): bool
    {
        return $this->needsRain;
    }

    /**
     * @return null|Species
     */
    public function getPartySpecies(): ?Species
    {
        return $this->partySpecies;
    }

    /**
     * @return null|Type
     */
    public function getPartyType(): ?Type
    {
        return $this->partyType;
    }

    /**
     * @return int|null
     */
    public function getPhysicalStats(): ?int
    {
        return $this->physicalStats;
    }

    /**
     * @return null|string
     */
    public function getTimeOfDay(): ?string
    {
        return $this->timeOfDay;
    }

    /**
     * @return null|Species
     */
    public function getTradeSpecies(): ?Species
    {
        return $this->tradeSpecies;
    }

    /**
     * @return bool
     */
    public function isUpsideDown(): bool
    {
        return $this->upsideDown;
    }
}