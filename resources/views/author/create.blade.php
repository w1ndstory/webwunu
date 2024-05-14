@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Author') }}</div>
                <form action="{{ route('author.store')}}" method="post">
                    @csrf
                    <label for="author_name">Author Name:</label>
                    <input type="text" name="author_name" id="author_name">
                    @error('author_name')
                    <p>{{ $message }}</p>
                    @enderror
                    <label for="author_surname">Author Surname:</label>
                    <input type="text" name="author_surname" id="author_surname">
                    @error('author_surname')
                    <p>{{ $message }}</p>
                    @enderror
                    <label for="author_birthdate">Author Birthdate:</label>
                    <input type="date" name="author_birthdate" id="author_birthdate">
                    @error('author_birthdate')
                    <p>{{ $message }}</p>
                    @enderror
                    <label for="author_phone">Author Phone:</label>
                    <input type="text" name="author_phone" id="author_phone">
                    @error('author_phone')
                    <p>{{ $message }}</p>
                    @enderror
                    <label for="author_national">Author Nationality:</label>
                    <input type="text" name="author_national" id="author_national">
                    @error('author_national')
                    <p>{{ $message }}</p>
                    @enderror
                    <input class="btn btn-primary" type="submit" name="author_add" value="Create">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
