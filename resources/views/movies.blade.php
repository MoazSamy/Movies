@extends('layout')
@section('content')
    @foreach ($movies as $movie)
        <article style="background-image:url({{$movie->image}})">
            <h1><a href="/movies/{{$movie->slug}}" class="movies">{{ucwords($movie->name)}}</a></h1>
            <p>
                Category : <a href="/categories/{{$movie->category->name}}" class="categories">{{$movie->category->name}}</a>
            </p>
            <p>
                Main Actor name : <a href="/actors/{{$movie->actor->name}}" id="actors">{{$movie->actor->name}}</a>
            </p>
            <p>
                {!! $movie ->description !!}
            </p>
        </article>
    @endforeach
@endsection
