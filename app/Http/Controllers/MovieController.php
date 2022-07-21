<?php

namespace App\Http\Controllers;

use App\Models\movie;


class MovieController extends Controller
{
    //Returns view "movies" with all the movies recorded in the movies table.
    //Handles search queries sent from the search box in the navbar.
    public function index(){
        $movies = movie::latest();

        if(request('search')){
            $movies
                ->where('name' , 'like' , '%' .request('search').'%');
        }
        return view('movies',[
            'movies' => $movies->get()
        ]);
    }
    //Returns view "movie" with a single movie details displayed.
    public function movie(movie $movie)
    {
        return view('movie', [
            'movie' => $movie
        ]);
    }
}
