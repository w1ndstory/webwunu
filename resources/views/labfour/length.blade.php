@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Book with the Longest Name') }}</div>
                <div class="card-body">
                    <h3>Book Name: {{ $book->book_name }}</h3>
                    <h3>Author: {{ $book->author->author_name ?? 'Unknown' }} {{ $book->author->author_surname ?? 'Unknown' }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
