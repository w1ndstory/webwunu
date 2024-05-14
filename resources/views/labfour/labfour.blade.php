@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <form action="{{ route('labfour.showBooks') }}" method="POST">
                    @csrf
                <div class="form-group">
                        <label for="author_id">Оберіть автора:</label>
                        <select class="form-control" id="author_id" name="author_id">
                        @foreach ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->author_name }} {{ $author->author_surname }}</option>
                            @endforeach
                        </select>
                </div>
                <button type="submit" class="btn btn-primary">Показати книги</button>
            </form> 
                <a class="btn btn-primary " href="{{ route('minMaxPages') }}">Показати книги з мінімальною і максимальною кількістю сторінок</a>           
                <a class="btn btn-primary" href="{{ route('showBookWithMaxLengthName') }}">Книга з найбільшою кількістю знаків у назві</a>
                <a class="btn btn-primary" href="{{ route('perauthor') }}">Книги у кожного автора</a>
                <a class="btn btn-primary" href="{{ route('byletter') }}">Найбільше прізвищ</a>
                <a class="btn btn-primary" href="{{ route('surnameko') }}">Прізвища на "Ко"</a>
                <a class="btn btn-primary" href="{{ route('birthday') }}">День народження автора</a>
                <a class="btn btn-primary" href="{{ route('booksyearsago') }}">Книга 4 роки створення</a>
                <a class="btn btn-primary" href="{{ route('leapyearbooks') }}">Книга у високосному році</a>
                <a class="btn btn-primary" href="{{ route('sincecreation') }}">Минули роки від створення книги</a>
                <a class="btn btn-primary" href="{{route('labfour.create')}}">Створити нову книгу</a>
                <a class="btn btn-primary" href="{{route('author.create')}}">Створити нового автора</a>
            <div class="card-header">{{ __('Books') }}</div>
                <table>
                    <thead>
                        <th>Id</th>
                        <th>Book</th>
                        <th>Pages</th>
                        <th>Author</th>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                        <tr>
                            <td> {{ $book->id }} </td>
                            <td> {{ $book->book_name }} </td>
                            <td> {{ $book->book_pages }} </td>
                            <td> {{ $book->author->author_name ?? 'Unknown' }} {{ $book->author->author_surname ?? 'Unknown' }}</td>
                            <td>
                                    <a class="btn btn-warning" href="{{ route('labfour.edit', $book->id) }}">Edit</a>
                            </td>
                            <td>
                            <form id="delete-form-{{ $book->id }}" action="{{ route('labfour.destroy', $book->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card">
                <div class="card-header">{{ __('Authors') }}</div>
                <table>
                    <thead>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Information</th>
                    </thead>
                    <tbody>
                        @foreach ($authors as $author)
                        <tr>
                            <td> {{ $author->id }} </td>
                            <td> {{ $author->author_name }} </td>
                            <td> {{ $author->author_surname }} </td>
                            <td> <b>Birthdate:</b>{{ $author->author_birthdate }} <b>Phone:</b>{{ $author->author_phone }} <b>Nationality:</b>{{ $author->author_national }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
