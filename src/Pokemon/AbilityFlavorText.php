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
class AbilityFlavorText
{
    /**
     * @var VersionGroup
     */
    protected $versionGroup;

    /**
     * @var Translations
     */
    protected $flavorTexts;

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
    public function getFlavorTexts(): Translations
    {
        return $this->flavorTexts;
    }
}