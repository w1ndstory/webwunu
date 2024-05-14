<?php

namespace App\Classes;

class Country
{
    public $name;
    public $population;
    public $capital;

    public function __construct($name, $population, $capital)
    {
        $this->name = $name;
        $this->population = $population;
        $this->capital = $capital;
    }
}
