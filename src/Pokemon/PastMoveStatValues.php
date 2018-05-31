<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 01.01.18
 * Time: 22:25
 */

namespace PokeAPI\Pokemon;

use PokeAPI\Translations;

/**
 * Class PastMoveStatValues
 * @package PokeAPI\Pokemon
 */
class PastMoveStatValues
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