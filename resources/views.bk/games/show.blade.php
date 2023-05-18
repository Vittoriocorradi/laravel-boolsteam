@extends('layouts.app')


@section('page.main')
    <div class="container">
        <h3>{{ $game->title }}</h3>
            <p>Description: {!! $game->description !!}</p>
            <p>Price: {{ $game->price }}</p>
            <p>Genre: {{ $game->genre }}</p>
            <p>Developer: {{ $game->developer }}</p>
            <p>Publisher: {{ $game->publisher }}</p>
            <p>Release Date: {{ $game->release_date }}</p>
            <p>Score: {{ $game->score }}</p>
            <p>Original Language: {{ $game->original_language }}</p>
            <p>Available Language: {{ $game->available_language }}</p>
        <div class="d-flex justify-content-center my-5">
            <a href="{{ route('games.index', $game) }}" class="mx-2"><button class="btn btn-primary mx-2">Go back to the list</button></a>
            <a href="{{ route('games.edit', $game) }}" class="mx-2"><button class="btn btn-warning mx-2">Edit details</button></a>

            <form action="{{ route('games.destroy', $game) }}" method="POST" class="mx-2">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger mx-2" value="Cancella">
            </form>
        </div>
    </div>
@endsection
