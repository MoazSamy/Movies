@extends('layout')
@section('content')
    <form method="POST" action="/admin/movies" align="center" class="create">
        @csrf
        <table>
            <tr>
                <td>
                    <label for="name">
                        Title of movie
                    </label>
                </td>
                <td>
                    <input type="text" name="name" id="name" value = "{{old("name")}}"required>
                    <!--JS ERROR MESSAGE-->
                    <p class="error perror" id="name-error">
                        Please provide a movie name between 0-255 characters.
                    </p>
                    <!--LARAVEL ERROR MESSAGE-->
                    @error('name')
                        <p class="error">{{$message}}</p>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>
                    <label for="slug">
                        Slug
                    </label>
                </td>
                <td>
                    <input type="text" name="slug" id="slug" value = "{{old("slug")}}" required>
                    <p class="error perror" id="slug-error">
                        Please provide a slug between 0-255 characters.
                    </p>
                    <!--LARAVEL ERROR MESSAGE-->
                    @error('slug')
                        <p class="error">{{$message}}</p>
                    @enderror
                </td>
            </tr>
            <tr>
                <td>
                    <label for="actor_id">
                        Actor
                    </label>
                </td>
                <td>
                    <select type="text" name="actor_id" id="actor_id" required>
                        @php
                            $actors = \App\Models\actor::all();
                        @endphp
                        @foreach ($actors as $actor)
                            <option 
                                value="{{$actor->id}}" 
                                {{ old('actor_id') == $actor->id ? 'selected' :''}}>
                                {{ucwords($actor -> name)}}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="category_id">
                        Genre
                    </label>
                </td>
                <td>
                    <select type="text" name="category_id" id="category_id" required>
                        @php
                            $categories = \App\Models\Category::all();
                        @endphp
                        @foreach ($categories as $category)
                            <option 
                                value="{{$category->id}}" 
                                {{ old('category_id') == $category->id ? 'selected' :''}}>
                                {{ucwords($category -> name)}}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="image">
                        Thumbnail Link
                    </label>
                </td>
                <td>
                    <input type="text" name="image" id="image" value = "{{old("image")}}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="rating">
                        Rating
                    </label>
                </td>
                <td>
                    <input type="text" name="rating" id="rating" value = "{{old("rating")}}" required>
                    <!--JS ERROR MESSAGE-->
                    <p class="error perror" id="rating-error">
                        Please enter rating of only one number 0-5.
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="description">
                        Description
                    </label>
                </td>
                <td>
                    <textarea type="text" name="description" id="description" required>{{old("description")}}</textarea>
                    <!--JS ERROR MESSAGE-->
                    <p class="error perror" id="description-short-error">
                        Please provide a longer description.
                    </p>
                    <!--JS ERROR MESSAGE-->
                    <p class="error perror" id="description-long-error">
                        Please provide a shorter description.
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="submit" onclick="validate()">
                        Submit
                    </button>
                </td>
            </tr>
        </table>
    </form>
    <script src="/ValidationJs/createValidate.js">
    </script>
@endsection