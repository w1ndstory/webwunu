@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Books Added More Than 4 Years Ago') }}</div>
                    <div class="card-body">
                        <table>
                            <thead>
                                <th>Id</th>
                                <th>Book Name</th>
                                <th>Pages</th>
                                <th>Author</th>
                            </thead>
                            <tbody>
                                @foreach ($books as $book)
                                    <tr>
                                        <td>{{ $book->id }}</td>
                                        <td>{{ $book->book_name }}</td>
                                        <td>{{ $book->book_pages }}</td>
                                        <td>{{ $book->author->author_name ?? 'Unknown' }} {{ $book->author->author_surname ?? 'Unknown' }}</td>
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
