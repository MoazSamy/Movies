@extends('layout')
@section('content')
        <article style="background-image:url({{$movie->image}})">
            <h1>{!! $movie->name !!}</h1>
            <p>
                Category : <a href="/categories/{{$movie->category->name}}" class="categories">{{$movie->category->name}}</a>
            </p>
            <p>
                Main Actor name : <a href="/actors/{{$movie->actor->name}}" id="actors">{{$movie->actor->name}}</a>
            </p>
            <h3>Rating : <strong>{{$movie->rating}}/5</strong></h3>
            <h4 class="underline">Description :</h4>
            <p>
                {!! $movie->description !!}
            </p>
            
        </article>
@endsection
 
