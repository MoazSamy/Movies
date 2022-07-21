@extends('layout')
@section('content')
        <div class="container">
            @foreach ($categories as $category)
                <a href="/categories/{{$category->name}}" class="categories">{{$category->name}}</a>
            @endforeach
        </div>
@endsection
 