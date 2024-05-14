@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Authors by First Letter') }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>First Letter</th>
                                <th>Author Name</th>
                                <th>Number of Authors</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($authorsByFirstLetter as $item)
                            <tr>
                                <td>{{ $item->first_letter }}</td>
                                <td>
                                    @foreach($authors as $author)
                                        @if (strpos($author->author_surname, $item->first_letter) === 0)
                                            {{ $author->author_surname }}<br>
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ $item->author_count }}</td>
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
