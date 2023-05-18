@extends('layouts.app')

@section('page.main')

    <div class="container">
      <h1>Lista Games</h1>
        <hr>
       <table class="table">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Image</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Genre</th>
            <th scope="col">Developer</th>
            <th scope="col">Publisher</th>
            <th scope="col">Release Date</th>
            <th scope="col">Score</th>
            <th scope="col">Original Language</th>
            <th scope="col">Available Language</th>
            <th scope="col">Released</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($games as $game)

          <tr>
            <td>{{ $game->title }}</td>
            <td>{{ $game->image }}</td>
            <td>{{ $game->description }}</td>
            <td>{{ $game->price }}</td>
            <td>{{ $game->genre }}</td>
            <td>{{ $game->developer }}</td>
            <td>{{ $game->publisher }}</td>
            <td>{{ $game->release_date }}</td>
            <td>{{ $game->score }}</td>
            <td>{{ $game->original_language }}</td>
            <td>{{ $game->available_language }}</td>
            <td>{{ $game->released }}</td>
            
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

@endsection

