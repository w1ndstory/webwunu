@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Книги автора {{ $author->author_name }} {{ $author->author_surname }}</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Назва книги</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
            <tr>
                <td>{{ $book->book_name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
