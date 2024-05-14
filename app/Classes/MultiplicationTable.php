<?php

namespace App\Classes;

class MultiplicationTable
{
    private $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function generateTable()
    {
        $table = '<table border="1">';
        for ($i = 1; $i <= 10; $i++) {
            $table .= '<tr><td>' . $this->number . '</td><td>*</td><td>' . $i . '</td><td>=</td><td>' . ($this->number * $i) . '</td></tr>';
        }
        $table .= '</table>';
        return $table;
    }
}