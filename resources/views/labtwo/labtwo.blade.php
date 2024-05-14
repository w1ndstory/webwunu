@extends('layouts.app')
<link rel="stylesheet" href="/css/labtwo.css">

@section('content')
<div>
    <h1>Лабораторна робота #2</h1>

    <h3>Task 1: Перевірити чи високосний рік</h3>
    <form method="post" action="/leap-year">
        @csrf
        <label>Введіть рік:</label>
        <input type="text" name="year">
        <button type="submit">Перевірити</button>
    </form>
    @isset($leapYearResult)
        <p>{{ $leapYearResult }}</p>
    @endisset

    <h3>Task 2: Кількість годин по введених градусах</h3>
    <form method="post" action="/hours-from-degrees">
        @csrf
        <label>Введіть градуси:</label>
        <input type="text" name="degrees">
        <button type="submit">Обчислити</button>
    </form>
    @isset($hoursFromDegreesResult)
        <p>{{ $hoursFromDegreesResult }}</p>
    @endisset

    <h3>Task 3: Генерування випадкової стрічки</h3>
    <form method="post" action="/generate-random-string">
        @csrf
        <label>Введіть довжину стрічки:</label>
        <input type="text" name="length">
        <button type="submit">Згенерувати</button>
    </form>
    @isset($randomStringResult)
        <p>{{ $randomStringResult }}</p>
    @endisset

    <h3>Task 4: Функція substring</h3>
    <form method="post" action="/substring">
        @csrf
        <label>Введіть рядок:</label>
        <input type="text" name="string">
        <label>Введіть n:</label>
        <input type="text" name="n">
        <button type="submit">Обрізати</button>
    </form>
    @isset($substringResult)
        <p>{{ $substringResult }}</p>
    @endisset

    <h3>Task 5: Ввести випадковий рядок з файлу у файл</h3>
    <form method="post" action="/random-line-to-file">
        @csrf
        <button type="submit">Обрати випадковий рядок та записати в файл</button>
    </form>
    @isset($randomLineToFileResult)
        <p>{{ $randomLineToFileResult }}</p>
    @endisset
</div>
@endsection