@extends('layouts.auth')

@section('content')

    <div class="container">
      <h1>Lista Platforms</h1>
        <a href="{{ route('admin.platforms.create') }}" class="btn btn-primary">Create new Platform</a>
        <hr>
       <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($platforms as $platform)
          <tr>
            <td>{{ $platform->id }}</td>
            <td>{{ $platform->name }}</td>
            <td>
                <nav>
                    <ul class="list-unstyled d-flex gap-2">
                        <li><a href="{{ route('admin.platforms.edit', $platform->id) }}" class="btn btn-secondary">Edit</a></li>
                        <li>
                            <form action="{{ route('admin.platforms.destroy', $platform->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </li>
                    </ul>
                </nav>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
@endsection

