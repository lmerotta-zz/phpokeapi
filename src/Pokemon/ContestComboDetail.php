<?php
/**
 * Created by PhpStorm.
 * User: zack
 * Date: 03.06.18
 * Time: 22:47
 */

namespace PokeAPI\Pokemon;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class ContestComboDetail
 * @package src\Pokemon
 */
class ContestComboDetail
{
    /**
     * @var ArrayCollection|Move[]
     */
    protected $useBefore;
    /**
     * @var ArrayCollection|Move[]
     */
    protected $useAfter;

    /**
     * ContestComboDetail constructor.
     */
    public function __construct()
    {
        $this->useBefore = new ArrayCollection();
        $this->useAfter = new ArrayCollection();
    }

    /**
     * @return ArrayCollection|Move[]
     */
    public function getUseBefore(): ArrayCollection
    {
        return $this->useBefore;
    }

    /**
     * @return ArrayCollection|Move[]
     */
    public function getUseAfter(): ArrayCollection
    {
        return $this->useAfter;
    }
}