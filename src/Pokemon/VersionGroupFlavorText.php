<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 21.12.17
 * Time: 07:06
 */

namespace PokeAPI\Pokemon;

use PokeAPI\Translations;

/**
 * Class VersionGroupFlavorText
 * @package PokeAPI\Pokemon
 */
class VersionGroupFlavorText
{
    /**
     * @var Translations
     */
    protected $flavorTexts;

    /**
     * @var Version
     */
    protected $version;

    /**
     * @return Translations
     */
    public function getFlavorTexts(): Translations
    {
        return $this->flavorTexts;
    }

    /**
     * @return Version
     */
    public function getVersion(): Version
    {
        return $this->version;
    }
}