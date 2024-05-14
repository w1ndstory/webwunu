@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Book') }}</div>
                <form action="{{ route('labfour.store')}}" method="post">
                    @csrf
                    <label for="book_name">Book Name:</label>
                    <input type="text" name="book_name" id="book_name">
                    @error('book_name')
                    <p>{{ $message }}</p>
                    @enderror
                    <label for="book_pages">Number of Pages:</label>
                    <input type="text" name="book_pages" id="book_pages">
                    @error('book_pages')
                    <p>{{ $message }}</p>
                    @enderror
                    <label for="author_id">Author:</label>
                    <select name="author_id" id="author_id">
                        @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->author_name }} {{$author->author_surname}}</option>
                        @endforeach
                    </select>
                    @error('author_id')
                    <p>{{ $message }}</p>
                    @enderror
                    <input class="btn btn-primary" type="submit" name="book_add" value="Create">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
