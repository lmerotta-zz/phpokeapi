<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 25.12.17
 * Time: 14:00
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class EncounterVersionRates
 * @package PokeAPI\Pokemon
 */
class EncounterVersionRates
{
    /**
     * @var integer|null
     */
    protected $rate;

    /**
     * @var Version
     */
    protected $version;

    /**
     * @param ArrayCollection $data
     */
    protected function hydrate(ArrayCollection $data): void
    {
        $this->rate = $data['rate'];
        $this->version = $this->client->version($data['version']['url']);
    }

    /**
     * @return int|null
     */
    public function getRate(): ?int
    {
        return $this->rate;
    }

    /**
     * @return Version
     */
    public function getVersion(): Version
    {
        return $this->version;
    }
}