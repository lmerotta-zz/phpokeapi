<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 21.12.17
 * Time: 07:06
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Translations;

/**
 * Class FlavorText
 * @package PokeAPI\Pokemon
 */
class FlavorText
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
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->flavorTexts = new Translations($data['entries'], 'flavor_text');
        $this->version = $this->client->version($data['version']['url']);
    }

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