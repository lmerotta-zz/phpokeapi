<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 01.01.18
 * Time: 22:25
 */

namespace PokeAPI\Pokemon;
use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class PastMoveStatValues
 * @package PokeAPI\Pokemon
 */
class PastMoveStatValues extends Resource
{
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
    protected $power;

    /**
     * @var integer|null
     */
    protected $pp;

    /**
     * @var Translations
     */
    protected $effects;

    /**
     * @var Translations
     */
    protected $shortEffects;

    /**
     * @var Type|null
     */
    protected $type;

    /**
     * @var VersionGroup
     */
    protected $versionGroup;

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->accuracy = $data['accuracy'];
        $this->effectChance = $data['effect_chance'];
        $this->power = $data['power'];
        $this->pp = $data['pp'];
        $this->effects = new Translations($data['effect_entries'], 'effect');
        $this->shortEffects = new Translations($data['effect_entries'], 'short_effect');

        if (!empty($data['type'])) {
            $this->type = $this->client->type($data['type']['url']);
        }

        $this->versionGroup = $this->client->versionGroup($data['version_group']['url']);
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
    public function getPower(): ?int
    {
        return $this->power;
    }

    /**
     * @return int|null
     */
    public function getPp(): ?int
    {
        return $this->pp;
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
     * @return null|Type
     */
    public function getType(): ?Type
    {
        return $this->type;
    }

    /**
     * @return VersionGroup
     */
    public function getVersionGroup(): VersionGroup
    {
        return $this->versionGroup;
    }
}