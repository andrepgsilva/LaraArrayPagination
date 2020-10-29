<?php

namespace Andrepgsilva\LaraArrayPagination\Classes;

class TypeVerification
{
    /**
     * Assert a variable type
     *
     * Undocumented function long description
     *
     * @param Mixed $variable
     * @param String $type
     * 
     * @throws \TypeError
     **/
    public static function assert($variable, $type)
    {
        if (gettype($variable) !== $type) {
            throw new \TypeError('The type must be an array');
        }
    }
}