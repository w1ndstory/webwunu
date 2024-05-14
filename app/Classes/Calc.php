<?php

namespace App\Classes;

class Calc
{
    public function add($a, $b)
    {
        return $a + $b;
    }

    public function subtract($a, $b)
    {
        return $a - $b;
    }

    public function multiply($a, $b)
    {
        return $a * $b;
    }

    public function divide($a, $b)
    {
        if ($b == 0) {
            throw new \InvalidArgumentException("Ділення на нуль неможливе");
        }
        return $a / $b;
    }

    public function squareRoot($a)
    {
        if ($a < 0) {
            throw new \InvalidArgumentException("Від'ємне число для взяття кореня");
        }
        return sqrt($a);
    }

    public function power($a, $b)
    {
        return pow($a, $b);
    }
}
