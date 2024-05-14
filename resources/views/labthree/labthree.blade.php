@extends('layouts.app')
<link rel="stylesheet" href="/css/labthree.css">

@section('content')
<div>
    <h1>Лабораторна робота #3</h1>
    <form method="post" action="{{ route('labThree') }}">
        @csrf
        <label for="number">Введіть число для виведення таблиці множення:</label>
        <input type="number" id="number" name="number" value="{{ $number }}" min="1">
        <button type="submit">Вивести таблицю</button>
    </form>
    @if (isset($table))
        {!! $table !!}
    @endif
    <form method="post" id="userForm" action="{{ route('createUser') }}" onsubmit="submitForm(event)">
        @csrf
        <label for="surname">Прізвище:</label>
        <input type="text" id="surname" name="surname" required><br>
        <label for="name">Ім'я:</label>
        <input type="text" id="name" name="name" required><br>
        <label for="age">Вік:</label>
        <input type="number" id="age" name="age" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <button type="button" onclick="submitForm()">Додати користувача</button>
    </form>
    <div id="userResult"></div>
    <form method="post" id="countryForm" action="{{ route('createCountry') }}">
        @csrf
        <label for="countryName">Назва країни:</label>
        <input type="text" id="countryName" name="countryName" required><br>
        <label for="population">Населення:</label>
        <input type="number" id="population" name="population" required><br>
        <label for="capital">Столиця:</label>
        <input type="text" id="capital" name="capital" required><br>
        <button type="button" onclick="submitCountryForm()">Додати країну</button>
    </form>
    <div id="countryResult"></div>
    <form method="get" id="calcForm" action="{{ route('calculate') }}" onsubmit="submitCalcForm(event)">
        @csrf
        <label for="operation">Оберіть операцію:</label>
        <select id="operation" name="operation">
            <option value="add">Додавання</option>
            <option value="subtract">Віднімання</option>
            <option value="multiply">Множення</option>
            <option value="divide">Ділення</option>
            <option value="squareRoot">Квадратний корінь</option>
            <option value="power">Піднесення до степеня</option>
        </select><br>
        <label for="a">Число A:</label>
        <input type="number" id="a" name="a" required><br>
        <label for="b">Число B:</label>
        <input type="number" id="b" name="b" required><br>
        <button type="submit">Обчислити</button>
    </form>
    <div id="calcResult"></div>
</div>
@endsection

<script>
function submitCountryForm() {
    let countryName = document.getElementById('countryName').value;
    let population = document.getElementById('population').value;
    let capital = document.getElementById('capital').value;

    if (!countryName || !population || !capital) {
        alert("Будь ласка, заповніть всі поля");
        return;
    }

    let formData = new FormData(document.getElementById('countryForm'));
    fetch("{{ route('createCountry') }}", {
        method: "POST",
        body: formData
    })
    .then(response => response.json()) 
    .then(data => {
        document.getElementById('countryResult').innerHTML = data.message;
    });
}

function submitForm() {
    let surname = document.getElementById('surname').value;
    let name = document.getElementById('name').value;
    let age = document.getElementById('age').value;
    let email = document.getElementById('email').value;

    if (!surname || !name || !age || !email) {
        alert("Будь ласка, заповніть всі поля");
        return;
    }

    let formData = new FormData(document.getElementById('userForm'));
    fetch("{{ route('createUser') }}", {
        method: "POST",
        body: formData
    })
    .then(response => response.json()) 
    .then(data => {
        document.getElementById('userResult').innerHTML = data.message;
    });
}

function submitCalcForm(event) {
    event.preventDefault();
    let operation = document.getElementById('operation').value;
    let a = document.getElementById('a').value;
    let b = document.getElementById('b').value;

    if (!a || !b) {
        alert("Будь ласка, заповніть всі поля");
        return;
    }

    fetch(`{{ route('calculate') }}?operation=${operation}&a=${a}&b=${b}`, {
        method: "GET"
    })
    .then(response => response.json()) 
    .then(data => {
        document.getElementById('calcResult').innerHTML = data.message;
    });
}
</script>