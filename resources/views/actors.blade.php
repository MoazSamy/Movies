@extends('layout')
@section('content')
    <div class="container">
        @foreach ($actors as $actor)
            <a href="/actors/{{$actor->name}}" id="actors">{{$actor->name}}</a>
        @endforeach
    </div>
@endsection
 