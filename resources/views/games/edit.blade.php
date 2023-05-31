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

        {{-- Form to edit an existing game --}}
        <form action="{{ route('admin.games.update', $game->id) }}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $game->title) }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                </div>
            <div class="mb-3">
                  <label for="description" class="form-label">Description</label>
                  <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $game->description) }}</textarea>
            </div>
            <div class="mb-3">
                  <label for="price" class="form-label">Price</label>
                  <input type="number" step="0.01" class="form-control" id="price" name="price" value="{{ old('price', $game->price) }}">
            </div>
            <div class="mb-3">
                  <label for="discount" class="form-label">Discount</label>
                  <input type="number" step="0.01" class="form-control" id="discount" name="discount" value="{{ old('discount', $game->discount) }}">
            </div>
            @if ($errors->any())
                <div class="mb-3">
                    <div class="mb-3">Genres</div>
                    @foreach ($genres as $genre)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="genres" value="{{ $genre->id }}" name="genres[]"
                                {{ in_array($genre->id, old('genres', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="genres">{{ $genre->name }}</label>
                        </div>
                    @endforeach

                </div>
            @else
                <div class="mb-3">
                    <div class="mb-3">Genres</div>

                    @foreach ($genres as $genre)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="genres" value="{{ $genre->id }}"
                                name="genres[]"
                                {{ $game->genres->contains($genre->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="genres">{{ $genre->name }}</label>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="mb-3">
                  <label for="developer" class="form-label">Developer</label>
                  <input type="text" class="form-control" id="developer" name="developer" value="{{ old('developer', $game->developer) }}">
            </div>
            @if ($errors->any())
                <div class="mb-3">
                    <div class="mb-3">Platforms</div>
                    @foreach ($platforms as $platform)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="platforms" value="{{ $platform->id }}" name="platforms[]"
                                {{ in_array($platform->id, old('platforms', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="platforms">{{ $platform->name }}</label>
                        </div>
                    @endforeach

                </div>
            @else
                <div class="mb-3">
                    <div class="mb-3">Platforms</div>

                    @foreach ($platforms as $platform)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="platforms" value="{{ $platform->id }}"
                                name="platforms[]"
                                {{ $game->platforms->contains($platform->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="platforms">{{ $platform->name }}</label>
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="mb-3">

                  <label for="release_date" class="form-label">Release Date</label>
                  <input type="date" class="form-control" id="release_date" name="release_date" value="{{ old('release_date', $game->release_date) }}">
            </div>
            <div class="mb-3">
                  <label for="score" class="form-label">Score</label>
                  <input type="number" step="0.1" class="form-control" id="score" name="score" value="{{ old('score', $game->score) }}">
            </div>
            <div class="mb-3">
                  <label for="original_language" class="form-label">Original Language</label>
                  <input type="text" class="form-control" id="original_language" name="original_language" value="{{ old('original_language', $game->original_language) }}">
            </div>
            <div class="mb-3">
                  <label for="available_language" class="form-label">Available Language</label>
                  <input type="text" class="form-control" id="available_language" name="available_language" value="{{ old('available_language', $game->available_language) }}">
              </div>

              <div class="mb-3">
                <label for="publisher_id" class="form-label">Company</label>
                <select class="form-select" name="publisher_id" id="publisher_id">
                    <option value="">Select type</option>
                    @foreach ($publishers as $publisher)
                        <option value="{{ $publisher->id }}" {{ old('publisher_id', $game->publisher_id) == $publisher->id ? 'selected' : '' }}>{{ $publisher->company }}</option>
                    @endforeach
                </select>
            </div>
            
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
@endsection
