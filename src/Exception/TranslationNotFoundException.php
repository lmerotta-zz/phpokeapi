<?php

namespace PokeAPI\Exception;

use Throwable;

/**
 * Class TranslationNotFoundException
 * @package PokeAPI\Exception
 */
class TranslationNotFoundException extends \Exception
{
    /**
     * @param string $locale
     * @return TranslationNotFoundException
     */
    public static function create(string $locale) : TranslationNotFoundException
    {
        $message = sprintf("Translation \"%s\" not found", $locale);

        return new static($message);
    }
}