<?php

// LabThreeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\MultiplicationTable;
use App\Classes\LogParser;
use App\Classes\User;
use App\Classes\Calc;
use App\Classes\Country;
use App\Classes\CalcDispatcher;

class LabThreeController extends Controller
{
    public function labThree(Request $request)
    {
        $number = $request->input('number', 1);
        $table = $this->generateMultiplicationTable($number);
        return view('labthree.labthree', compact('table', 'number'));
    }
    
    private function generateMultiplicationTable($number)
    {
        $table = new MultiplicationTable($number);
        return $table->generateTable();
    }
    public function createCountry(Request $request)
    {
        $countryName = $request->input('countryName');
        $population = $request->input('population');
        $capital = $request->input('capital');
    
        $country = new Country($countryName, $population, $capital);
    
        return response()->json([
            'message' => "Створено нову країну: Назва: $countryName, Населення: $population, Столиця: $capital"
        ]);
    }
    public function dispatchCalc(Request $request)
    {
        $operation = $request->input('operation');
        $a = $request->input('a');
        $b = $request->input('b');

        $dispatcher = new CalcDispatcher(new Calc());
        $result = $dispatcher->dispatch($operation, $a, $b);

        return response()->json([
            'message' => "Результат обчислення: $result"
        ]);
    }

    public function calculate(Request $request)
{
    $operation = $request->input('operation');
    $a = $request->input('a');
    $b = $request->input('b');

    $dispatcher = new CalcDispatcher(new Calc());
    $result = $dispatcher->dispatch($operation, $a, $b);

    return response()->json([
        'message' => "Результат обчислення: $result"
    ]);
}

    public function createUser(Request $request)
    {
        $surname = $request->input('surname');
        $name = $request->input('name');
        $age = $request->input('age');
        $email = $request->input('email');

        $user = new User($surname, $name, $age, $email);


        return response()->json([
            'message' => "Користувач створений: Прізвище: $surname, Ім'я: $name, Вік: $age, Email: $email"
        ]);
    }


}