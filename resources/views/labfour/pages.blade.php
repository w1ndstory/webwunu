@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Books with Min and Max Pages') }}</div>
                <div class="card-body">
                    <h3>Book with Min Pages: {{ $bookWithMinPages->book_name }}</h3>
                    <h3>Book with Max Pages: {{ $bookWithMaxPages->book_name }}</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection