<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 21.12.17
 * Time: 20:54
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class ExperienceLevel
 * @package PokeAPI\Pokemon
 */
class ExperienceLevel
{

    /**
     * @var integer
     */
    protected $experience;

    /**
     * @var integer
     */
    protected $level;

    /**
     * @return int
     */
    public function getExperience(): int
    {
        return $this->experience;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }
}