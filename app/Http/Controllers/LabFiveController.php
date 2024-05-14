<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\LabFive;

class LabFiveController extends Controller
{
    public function spiral()
{
    $n = 5;
    $spiral = $this->generateSpiral($n);
    return view('labfive.spiral', compact('spiral'));
}
private function generateSpiral($n)
{
    $result = [];
    for ($i = 0; $i < $n; $i++) {
        $result[$i] = [];
        for ($j = 0; $j < $n; $j++) {
            $result[$i][$j] = 0;
        }
    }

    $x = 0;
    $y = 0;
    $dx = 0;
    $dy = -1;
    for ($i = 0; $i < $n * $n; $i++) {
        if ((-($n / 2) < $x) && ($x <= ($n / 2)) && (-($n / 2) < $y) && ($y <= ($n / 2))) {
            $result[$x + ($n / 2)][$y + ($n / 2)] = $i + 1;
        }

        if ($x == $y || ($x < 0 && $x == -$y) || ($x > 0 && $x == 1 - $y)) {
            $temp = $dx;
            $dx = -$dy;
            $dy = $temp;
        }

        $x += $dx;
        $y += $dy;
    }

    return $result;
}

}
