<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 22.12.17
 * Time: 17:18
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class EffectChange
 * @package PokeAPI\Pokemon
 */
class EffectChange extends Resource
{
    /**
     * @var Translations
     */
    protected $effect;

    /**
     * @var VersionGroup
     */
    protected $versionGroup;

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->effect = new Translations($data['effect_entries'], 'effect');
        $this->versionGroup = $this->client->versionGroup($data['version_group']['url']);
    }

    /**
     * @return Translations
     */
    public function getEffect(): Translations
    {
        return $this->effect;
    }

    /**
     * @return VersionGroup
     */
    public function getVersionGroup(): VersionGroup
    {
        return $this->versionGroup;
    }
}