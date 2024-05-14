<?php

namespace App\Classes;

class CalcDispatcher
{
    private $calc;

    public function __construct(Calc $calc)
    {
        $this->calc = $calc;
    }

    public function dispatch($operation, $a, $b = null)
    {
        switch ($operation) {
            case 'add':
                return $this->calc->add($a, $b);
            case 'subtract':
                return $this->calc->subtract($a, $b);
            case 'multiply':
                return $this->calc->multiply($a, $b);
            case 'divide':
                return $this->calc->divide($a, $b);
            case 'squareRoot':
                return $this->calc->squareRoot($a);
            case 'power':
                return $this->calc->power($a, $b);
            default:
                throw new \InvalidArgumentException('Невідома операція');
        }
    }

    public function display()
    {
        return "<h2>Результат обчислень:</h2> <p>{$this->result}</p>";
    }
}
