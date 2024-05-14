@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Books per Author') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Author</th>
                                <th>Number of Books</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($booksPerAuthor as $item)
                            <tr>
                                <td>{{ $item->author->author_name ?? 'Unknown' }} {{ $item->author->author_surname ?? 'Unknown' }}</td>
                                <td>{{ $item->book_count }}</td>
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
