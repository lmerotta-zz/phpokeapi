<?php

namespace PokeAPI;

use Doctrine\Common\Collections\ArrayCollection;
use PokeAPI\Exception\TranslationNotFoundException;

/**
 * Class Translations
 * @package PokeAPI
 */
class Translations
{
    /**
     * @var array indexed by language code
     */
    protected $translations;

    /**
     * Translations constructor.
     * @param array $translations
     * @param string $key
     */
    public function __construct(array $translations, string $key)
    {
        $this->translations = [];

        foreach ($translations as $translation)
        {
            $this->translations[$translation['language']['name']] = $translation[$key];
        }
    }

    /**
     * @param string $languageCode
     * @return string
     * @throws TranslationNotFoundException
     */
    public function getValue(string $languageCode) : string
    {
        if (empty($this->translations[$languageCode])) {
            throw TranslationNotFoundException::create($languageCode);
        }

        return $this->translations[$languageCode];
    }

    public function getTranslations(): ArrayCollection
    {
        return new ArrayCollection($this->translations);
    }
}