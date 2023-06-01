@extends('layouts.auth')

@section('content')
    <div class="container">
        <h1>{{ $genre->name }}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Developer</th>
                    <th>Release Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genre->games as $game)
                    <tr>
                        <td>{{ $game->id }}</td>
                        <td>{{ $game->title }}</td>
                        <td>{{ $game->developer }}</td>
                        <td>{{ $game->release_date }}</td>
                        <td><a href="{{ route('admin.games.show', $game->id) }}" class="btn btn-primary">Show</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
