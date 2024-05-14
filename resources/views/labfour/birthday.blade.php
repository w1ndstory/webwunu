@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Authors with Birthday Today') }}</div>
                <div class="card-body">
                    <ul>
                        @foreach ($authors as $author)
                            <li>{{ $author->author_name }} {{ $author->author_surname }} {{ $author->created_at }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
