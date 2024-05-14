@extends('layouts.app') 
@section('content')
    <label for="fahrenheit">Temperature in Fahrenheit:</label>
    <input type="text" id="fahrenheit" oninput="convertTemperature()">
    <br>
    <label for="celsius">Temperature in Celsius:</label>
    <input type="text" id="celsius" oninput="convertTemperature()">
    <table>
        @foreach ($spiral as $row)
            <tr>
                @foreach ($row as $cell)
                    <td>{{ $cell }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
    <style>
        .point {
            position: absolute;
            width: 2px;
            height: 2px;
            background: #000;
        }
        table {
            border-collapse: collapse;
        }
        td {
            width: 30px;
            height: 30px;
            border: 1px solid #ccc;
            text-align: center;
            vertical-align: middle;
        }
    </style>
    <div id="graph"></div>
    <script>
        function convertTemperature() {
            let fahrenheit = document.getElementById('fahrenheit').value;
            let celsius = document.getElementById('celsius').value;

            if (fahrenheit !== '') {
                celsius = (5/9) * (fahrenheit - 32);
                document.getElementById('celsius').value = celsius.toFixed(2);
            } else if (celsius !== '') {
                fahrenheit = (celsius * 9/5) + 32;
                document.getElementById('fahrenheit').value = fahrenheit.toFixed(2);
            }
        }
        let graph = document.getElementById('graph');
        let amplitude = 50;
        let frequency = 0.1;
        let phaseShift = 0;
        let offsetX = 320;
        let offsetY = 350;
        for (let x = 0; x < 500; x++) {
            let y = amplitude * Math.cos(frequency * x + phaseShift) + offsetY;
            let point = document.createElement('div');
            point.className = 'point';
            point.style.left = x + offsetX + 'px';
            point.style.top = y + 'px';
            graph.appendChild(point);
        }
    </script>
@endsection