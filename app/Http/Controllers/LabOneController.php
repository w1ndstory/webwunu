<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LabOneController extends Controller
{
    public function labOne()
    {
        $alpha = 5.46;
        $x = 1.52;
        $task1Result = ($alpha * sin($x ** 2) + tan($alpha)) / sqrt(exp(1));
    
        $number = 12345;
        $digits = str_split($number);
        $product = array_product($digits);
        $task2Result = "Добуток цифр $number: $product";
    
        $array = [3, 5, 1, 9, 4, 7];
        $min = min($array);
        $task3Result = "Найменший елемент масиву: $min";
    
        $A = [
            [1, 2, 3, 4, 5],
            [6, 7, 8, 9, 10],
            [11, 12, 13, 14, 15],
            [16, 17, 18, 19, 20],
            [21, 22, 23, 24, 25]
        ];
        $max = max(array_map('max', $A));
        $indices = array_keys(array_map('max', $A), $max);
        $index = [$indices[0], array_search($max, $A[$indices[0]])];
        $task4Result = "Максимальний елемент масиву: $max, індекси: ($index[0], $index[1])";
    
        $A5 = [1, -2, 3, -4, 5, -6, 7, -8];
        $B5 = [-1, -2, -3, -4, -5, 6, 7, 8];
        $positiveA5 = count(array_filter($A5, function ($value) {
            return $value > 0;
        }));
        $positiveB5 = count(array_filter($B5, function ($value) {
            return $value > 0;
        }));
        $totalPositive5 = $positiveA5 + $positiveB5;
        $task5Result = "Загальна кількість додатних елементів у масивах A та B: $totalPositive5";
    
        $string6 = "abcdef";
        $length6 = strlen($string6);
        $middle6 = floor($length6 / 2);
        if ($length6 % 2 == 0) {
            $result = substr_replace($string6, '', $middle6 - 1, 2);
        } else {
            $result = substr_replace($string6, '', $middle6, 1);
        }
        $task6Result = "$result";
    
        return view('labone.labone', compact('task1Result', 'task2Result', 'task3Result', 'task4Result', 'task5Result', 'task6Result'));
    }
    
}
