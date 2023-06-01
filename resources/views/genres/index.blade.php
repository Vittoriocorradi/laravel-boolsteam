@extends('layouts.auth')

@section('content')
    <div class="container">
        <h1>Genres</h1>
        {{-- <a href="{{ route('admin.genres.create') }}" class="btn btn-primary">Create new genre</a> --}}
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $genre)
                    <tr>
                        <td>{{ $genre->id }}</td>
                        <td>{{ $genre->name }}</td>
                        <td>{{ $genre->slug }}</td>
                        <td>
                            <ul class="list-unstyled d-flex gap-2">
                                <li><a href="{{ route('admin.genres.show', $genre) }}" class="btn btn-primary">Show</a></li>
                                {{-- <li><a href="{{ route('admin.genres.edit', $genre->id) }}" class="btn btn-secondary">Edit</a> --}}
                                </li>
                                <li>
                                    <form action="{{ route('admin.genres.destroy', $genre->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
