<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 25.12.17
 * Time: 13:54
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class EvolutionDetails
 * @package PokeAPI\Pokemon
 */
class EvolutionDetails extends Resource
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
    protected $minaffection;

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
     * @var boolean|null
     */
    protected $requiresDay;

    /**
     * @var Species|null
     */
    protected $tradeSpecies;

    /**
     * @var boolean
     */
    protected $upsideDown;

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {

        if (!empty($data['item'])) {
            $this->item = $this->client->item($data['item']['url']);
        }

        $this->trigger = $this->client->evolutionTrigger($data['trigger']['url']);

        if (!empty($data['gender'])) {
            $this->gender = $this->client->gender($data['gender']);
        }

        if (!empty($data['held_item'])) {
            $this->heldItem = $this->client->item($data['held_item']['url']);
        }

        if (!empty($data['known_move'])) {
            $this->knownMove = $this->client->move($data['known_move']['url']);
        }

        if (!empty($data['known_move_type'])) {
            $this->knownMoveType = $this->client->type($data['known_move_type']['url']);
        }

        if (!empty($data['location'])) {
            $this->location = $this->client->location($data['location']['url']);
        }

        $this->minLevel = $data['min_level'];
        $this->minHappiness = $data['min_happiness'];
        $this->minBeauty = $data['min_beauty'];
        $this->minaffection = $data['min_affection'];
        $this->needsRain = $data['needs_overworld_rain'];

        if (!empty($data['party_species'])) {
            $this->partySpecies = $this->client->species($data['party_species']['url']);
        }

        if (!empty($data['party_type'])) {
            $this->partyType = $this->client->type($data['party_type']['url']);
        }

        $this->physicalStats = $data['relative_physical_stats'];
        $this->requiresDay = $data['time_of_day'] ? $data['time_of_day'] === 'day' : null;

        if (!empty($data['trade_species'])) {
            $this->tradeSpecies = $this->client->species($data['trade_species']['url']);
        }
        $this->upsideDown = $data['turn_upside_down'];
    }

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
    public function getMinaffection(): ?int
    {
        return $this->minaffection;
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
     * @return bool|null
     */
    public function getRequiresDay(): ?bool
    {
        return $this->requiresDay;
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