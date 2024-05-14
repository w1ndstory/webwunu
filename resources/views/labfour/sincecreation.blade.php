@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Years Since Creation') }}</div>
                    <div class="card-body">
                        <table>
                            <thead>
                                <th>Name</th>
                                <th>Years Old</th>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item['Name'] }}</td>
                                        <td>{{ $item['Years_old'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    