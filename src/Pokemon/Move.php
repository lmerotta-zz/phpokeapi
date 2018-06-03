<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 22.12.17
 * Time: 17:08
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class Move
 * @package PokeAPI\Pokemon
 */
class Move
{
    public const POKEAPI_ENDPOINT = 'move';

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var integer|null
     */
    protected $accuracy;

    /**
     * @var integer|null
     */
    protected $effectChance;

    /**
     * @var integer|null
     */
    protected $pp;

    /**
     * @var integer
     */
    protected $priority;

    /**
     * @var integer|null
     */
    protected $power;

    /**
     * @var ArrayCollection|ContestComboDetail[]
     */
    protected $contestCombos;

    /**
     * @var ContestType
     */
    protected $contestType;

    /**
     * @var ContestEffect
     */
    protected $contestEffect;

    /**
     * @var MoveDamageClass
     */
    protected $damageClass;

    /**
     * @var Translations
     */
    protected $effects;

    /**
     * @var Translations
     */
    protected $shortEffects;

    /**
     * @var ArrayCollection|EffectChange[]
     */
    protected $effectChanges;

    /**
     * @var ArrayCollection|FlavorTextEntry[]
     */
    protected $flavorTexts;

    /**
     * @var Generation
     */
    protected $generation;

    /**
     * @var ArrayCollection|ItemVersionMachine
     */
    protected $machines;

    /**
     * @var MoveMetadata
     */
    protected $metadata;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var ArrayCollection|PastMoveStatValues[]
     */
    protected $pastValues;

    /**
     * @var ArrayCollection|MoveStatChange[]
     */
    protected $statChanges;

    /**
     * @var SuperContestEffect
     */
    protected $superContestEffect;

    /**
     * @var MoveTarget
     */
    protected $target;

    /**
     * @var Type
     */
    protected $type;

    /**
     * Move constructor.
     */
    public function __construct()
    {
        $this->effectChanges = new ArrayCollection();
        $this->flavorTexts = new ArrayCollection();
        $this->machines = new ArrayCollection();
        $this->pastValues = new ArrayCollection();
        $this->statChanges = new ArrayCollection();
        $this->contestCombos = new ArrayCollection();
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
     * @return int|null
     */
    public function getAccuracy(): ?int
    {
        return $this->accuracy;
    }

    /**
     * @return int|null
     */
    public function getEffectChance(): ?int
    {
        return $this->effectChance;
    }

    /**
     * @return int|null
     */
    public function getPp(): ?int
    {
        return $this->pp;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @return int|null
     */
    public function getPower(): ?int
    {
        return $this->power;
    }

    /**
     * @return ArrayCollection|ContestComboDetail[]
     */
    public function getContestCombos(): ArrayCollection
    {
        return $this->contestCombos;
    }

    /**
     * @return ContestType
     */
    public function getContestType(): ContestType
    {
        return $this->contestType;
    }

    /**
     * @return ContestEffect
     */
    public function getContestEffect(): ContestEffect
    {
        return $this->contestEffect;
    }

    /**
     * @return MoveDamageClass
     */
    public function getDamageClass(): MoveDamageClass
    {
        return $this->damageClass;
    }

    /**
     * @return Translations
     */
    public function getEffects(): Translations
    {
        return $this->effects;
    }

    /**
     * @return Translations
     */
    public function getShortEffects(): Translations
    {
        return $this->shortEffects;
    }

    /**
     * @return ArrayCollection|EffectChange[]
     */
    public function getEffectChanges(): ArrayCollection
    {
        return $this->effectChanges;
    }

    /**
     * @return ArrayCollection|FlavorTextEntry[]
     */
    public function getFlavorTexts(): ArrayCollection
    {
        return $this->flavorTexts;
    }

    /**
     * @return Generation
     */
    public function getGeneration(): Generation
    {
        return $this->generation;
    }

    /**
     * @return ArrayCollection|ItemVersionMachine
     */
    public function getMachines(): ArrayCollection
    {
        return $this->machines;
    }

    /**
     * @return MoveMetadata
     */
    public function getMetadata(): MoveMetadata
    {
        return $this->metadata;
    }

    /**
     * @return Translations
     */
    public function getNames(): Translations
    {
        return $this->names;
    }

    /**
     * @return ArrayCollection|PastMoveStatValues[]
     */
    public function getPastValues(): ArrayCollection
    {
        return $this->pastValues;
    }

    /**
     * @return ArrayCollection|MoveStatChange[]
     */
    public function getStatChanges(): ArrayCollection
    {
        return $this->statChanges;
    }

    /**
     * @return SuperContestEffect
     */
    public function getSuperContestEffect(): SuperContestEffect
    {
        return $this->superContestEffect;
    }

    /**
     * @return MoveTarget
     */
    public function getTarget(): MoveTarget
    {
        return $this->target;
    }

    /**
     * @return Type
     */
    public function getType(): Type
    {
        return $this->type;
    }
}