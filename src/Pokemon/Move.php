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
class Move extends Resource
{
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
     * @var array|EffectChange[]
     */
    protected $effectChanges = [];

    /**
     * @var array|AbilityFlavorText[]
     */
    protected $flavorTexts = [];

    /**
     * @var Generation
     */
    protected $generation;

    /**
     * @var array|ItemVersionMachine
     */
    protected $machines = [];

    /**
     * @var MoveMetaData
     */
    protected $metadata;

    /**
     * @var Translations
     */
    protected $names;

    /**
     * @var array|PastMoveStatValues[]
     */
    protected $pastValues = [];

    /**
     * @var array|MoveStatChange[]
     */
    protected $statChanges = [];

    /**
     * @var MoveTarget
     */
    protected $target;

    /**
     * @var Type
     */
    protected $type;

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->accuracy = $data['accuracy'];
        $this->effectChance = $data['effect_chance'];
        $this->pp = $data['pp'];
        $this->priority = $data['priority'];
        $this->power = $data['power'];
        $this->damageClass = $this->client->moveDamageClass($data['damage_class']['url']);
        $this->effects = new Translations($data['effect_entries'], 'effect');
        $this->shortEffects = new Translations($data['effect_entries'], 'short_effect');

        foreach ($data['effect_changes'] as $effectChange) {
            $this->effectChanges[] = new EffectChange($this->client, $effectChange);
        }

        $versionGroups = [];
        $sortedFlavorTextEntries = [];
        foreach ($data['flavor_text_entries'] as $flavorTextEntry) {
            $versionGroupName = $flavorTextEntry['version_group']['name'];
            if (empty($sortedFlavorTextEntries[$versionGroupName])) {
                $sortedFlavorTextEntries[$versionGroupName] = [];
                $versionGroups[$versionGroupName] = $flavorTextEntry['version_group'];
            }

            $sortedFlavorTextEntries[$versionGroupName][] = $flavorTextEntry;
        }

        foreach ($versionGroups as $versionGroupName => $versionGroup) {
            $this->flavorTexts[] = new AbilityFlavorText($this->client, ['version' => $versionGroup, 'entries' => $sortedFlavorTextEntries[$versionGroupName]]);
        }

        $this->generation = $this->client->generation($data['generation']['url']);

        foreach ($data['machines'] as $machine) {
            $this->machines[] = new ItemVersionMachine($machine);
        }

        $this->metadata = new MoveMetaData($data['meta']);
        $this->names = new Translations($data['names'], 'name');

        foreach ($data['past_values'] as $pastValue) {
            $this->pastValues[] = new PastMoveStatValues($this->client, $pastValue);
        }

        foreach ($data['stat_changes'] as $statChange) {
            $this->statChanges[] = new MoveStatChange($this->client, $statChange);
        }

        $this->target = $this->client->moveTarget($data['target']['url']);
        $this->type = $this->client->type($data['type']['url']);
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
     * @return array|EffectChange[]
     */
    public function getEffectChanges()
    {
        return $this->effectChanges;
    }

    /**
     * @return array|AbilityFlavorText[]
     */
    public function getFlavorTexts()
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
     * @return array|ItemVersionMachine
     */
    public function getMachines()
    {
        return $this->machines;
    }

    /**
     * @return MoveMetaData
     */
    public function getMetadata(): MoveMetaData
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
     * @return array|PastMoveStatValues[]
     */
    public function getPastValues()
    {
        return $this->pastValues;
    }

    /**
     * @return array|MoveStatChange[]
     */
    public function getStatChanges()
    {
        return $this->statChanges;
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