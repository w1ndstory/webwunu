<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LabTwoController extends Controller
{
    public function labTwo()
    {
        return view('labtwo.labtwo');
    }

    public function leapYear(Request $request)
    {
        $year = $request->input('year');

        if (($year % 4 == 0 && $year % 100 != 0) || $year % 400 == 0) {
            $result = "$year є високосний.";
        } else {
            $result = "$year не є високосний.";
        }

        return view('labtwo.labtwo', ['leapYearResult' => $result]);
    }

    public function hoursFromDegrees(Request $request)
    {
        $degrees = $request->input('degrees');
        $hours = $degrees / 15;

        return view('labtwo.labtwo', ['hoursFromDegreesResult' => "$degrees градусів це $hours годин."]);
    }

    public function generateRandomString(Request $request)
    {
        $length = $request->input('length');
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }

        return view('labtwo.labtwo', ['randomStringResult' => $randomString]);
    }

    public function substring(Request $request)
    {
        $string = $request->input('string');
        $n = $request->input('n');

        if ($n >= strlen($string)) {
            return view('labtwo.labtwo', ['substringResult' => $string]);
        }

        $result = substr($string, 0, $n);

        return view('labtwo.labtwo', ['substringResult' => $result]);
    }



    public function randomLineToFile()
    {
        $lines = file('E:\OSPanel\domains\webwunu\resources\testlabtwo.txt');
        $randomLine = $lines[array_rand($lines)];
        file_put_contents('E:\OSPanel\domains\webwunu\resources\testlabtwoin.txt', $randomLine);
        return view('labtwo.labtwo', ['randomLineToFileResult' => "Стрічка скопійована і вставлена у файл."]);
    }
}

