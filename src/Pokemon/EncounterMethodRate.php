<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 25.12.17
 * Time: 13:50
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class EncounterMethodRate
 * @package PokeAPI\Pokemon
 */
class EncounterMethodRate extends Resource
{
    /**
     * @var EncounterMethod
     */
    protected $method;

    /**
     * @var array|EncounterVersionRates[]
     */
    protected $versionRates = [];

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->method = $this->client->encounterMethod($data['encounter_method']['url']);

        foreach ($data['version_details'] as $versionRate) {
            $this->versionRates[] = new EncounterVersionRates($this->client, $versionRate);
        }
    }

    /**
     * @return EncounterMethod
     */
    public function getMethod(): EncounterMethod
    {
        return $this->method;
    }

    /**
     * @return array|EncounterVersionRates[]
     */
    public function getVersionRates()
    {
        return $this->versionRates;
    }
}