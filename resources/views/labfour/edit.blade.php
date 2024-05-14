@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Book') }}</div>
                <form action="{{ route('labfour.update', $book->id) }}" method="post">
                    @csrf
                    @if(session('success_message'))
                    <div class="alert alert-success mt-3">
                        {{ session('success_message') }}
                    </div>
                    @endif
                    @method('PUT')
                    <input type="text" name="book_name" id="book_name" value="{{ $book->book_name }}">
                    @error('book_name')
                    <p>{{ $message }}</p>
                    @enderror
                    <input type="text" name="book_pages" id="book_pages" value="{{ $book->book_pages }}">
                    @error('book_pages')
                    <p>{{ $message }}</p>
                    @enderror
                    <select name="author_id" id="author">
                        @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ $author->id == $book->author_id ? 'selected' : '' }}>
                            {{ $author->author_name}} {{ $author->author_surname }}  
                        </option>
                        @endforeach
                    </select>
                    @error('author')
                    <p>{{ $message }}</p>
                    @enderror
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection