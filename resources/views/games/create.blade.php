@extends('layouts.app')

@section('page.main')
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form to create a new game --}}
        <form action="{{ route('admin.games.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="text" class="form-control" id="image" name="image" value="{{ old('image') }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price"
                    value="{{ old('price') }}">
            </div>
            <div class="mb-3">
                <div class="mb-3">Genres</div>
                @foreach ($genres as $genre)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="genres" value="{{ $genre->id }}"
                            name="genres[]" {{ in_array($genre->id, old('genres', [])) ? 'checked' : '' }}>
                        <label class="form-check-label" for="genres">{{ $genre->name }}</label>
                    </div>
                @endforeach
            </div>
            <div class="mb-3">
                <label for="developer" class="form-label">Developer</label>
                <input type="text" class="form-control" id="developer" name="developer" value="{{ old('developer') }}">
            </div>
            <div class="mb-3">
                <label for="publisher" class="form-label">Publisher</label>
                <input type="text" class="form-control" id="publisher" name="publisher" value="{{ old('publisher') }}">
            </div>
            <div class="mb-3">
                <label for="release_date" class="form-label">Release Date</label>
                <input type="date" class="form-control" id="release_date" name="release_date"
                    value="{{ old('release_date') }}">
            </div>
            <div class="mb-3">
                <label for="score" class="form-label">Score</label>
                <input type="number" step="0.1" class="form-control" id="score" name="score"
                    value="{{ old('score') }}">
            </div>
            <div class="mb-3">
                <label for="original_language" class="form-label">Original Language</label>
                <input type="text" class="form-control" id="original_language" name="original_language"
                    value="{{ old('original_language') }}">
            </div>
            <div class="mb-3">
                <label for="available_language" class="form-label">Available Language</label>
                <input type="text" class="form-control" id="available_language" name="available_language"
                    value="{{ old('available_language') }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
