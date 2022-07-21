@extends('layout')
@section('content')
<table id="table1"cellspacing="0" cellpadding="5" class="dashboard">
    <thead>
        <tr>
            <td>
                <div>
                    Movie name
                </div>
            </td>

        
            <td>
                <div>
                    Actor
                </div>
            </td>

            <td>
                <div>
                    Rating
                </div>
            </td>
            <!-- FILLER CELLS-->
            <td>
            </td>
            <td>
            </td>
            <!--END OF FILLER CELLS-->
        </tr>
    </thead>
    <tbody>
        @foreach($movies as $movie)
        <tr>
            <td>
                <div>
                    <a href="/movies/{{$movie->slug}}" class="movies">{{$movie->name}}</a>
                </div>
            </td>

            <td>
                <div>
                    <a href="/actors/{{$movie->actor->slug}}" id="actors">{{$movie->actor->name}}</a>
                </div>
            </td>

            <td>
                <div>
                    {{$movie->rating}}/5
                </div>
            </td>

            <td>
                <div>
                   <a href="/admin/movies/{{$movie->id}}/edit">Edit</a>
                </div>
            </td>
            <td>
                <form method="POST" action="/admin/movies/{{$movie->id}}">
                    @csrf
                    @method('DELETE')
                    <button class="delete"> Delete </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection