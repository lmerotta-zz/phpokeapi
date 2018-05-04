<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 22.12.17
 * Time: 17:27
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class AbilityFlavorText
 * @package PokeAPI\Pokemon
 */
class AbilityFlavorText extends Resource
{
    /**
     * @var VersionGroup
     */
    protected $versionGroup;

    /**
     * @var Translations
     */
    protected $flavorText;

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        if (!empty($data['version_group'])) {
            $this->versionGroup = $this->client->versionGroup($data['version_group']['url']);
        }

        $this->flavorText = new Translations($data['entries'], 'flavor_text');
    }

    /**
     * @return VersionGroup
     */
    public function getVersionGroup(): VersionGroup
    {
        return $this->versionGroup;
    }

    /**
     * @return Translations
     */
    public function getFlavorText(): Translations
    {
        return $this->flavorText;
    }
}