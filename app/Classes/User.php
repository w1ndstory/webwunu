<?php

namespace App\Classes;

class User
{
    public $surname;
    public $name;
    public $age;
    public $email;

    public function __construct($surname, $name, $age, $email)
    {
        $this->surname = $surname;
        $this->name = $name;
        $this->age = $age;
        $this->email = $email;
    }

    public function displayInfo()
    {
        return "Прізвище: $this->surname, Ім'я: $this->name, Вік: $this->age, Email: $this->email";
    }
}
