<?php

namespace Andrepgsilva\LaraArrayPagination\Classes\Tests;

/**
 * Dummy class for tests 
 */
class DummyElement
{
    public $name, $description;

    public function __construct($name = '', $description = '')
    {
        $this->name = $name;
        $this->description = $description;    
    }
}