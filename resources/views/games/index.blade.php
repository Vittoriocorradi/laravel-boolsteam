@extends('layouts.app')

@section('page.main')
<div>
@foreach ($games as $game)
    <p>{{$game->title}}</p>
    
@endforeach
</div>
@endsection
