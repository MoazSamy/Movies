<?php

namespace App\Http\Controllers;

use App\Models\movie;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminMoviesController extends Controller
{
    //Returns dashboard view "index" with all the movies recorded in the movies table.
    //Handles search queries sent from the search box in the navbar.
    public function index()
    {
        $movies = movie::latest();

        if(request('search')){
            $movies
                ->where('name' , 'like' , '%' .request('search').'%');
        }
        return view('admin.movies.index',[
            'movies' => $movies->get()
        ]);
    }

    //Returns the add movie page view.
    public function create(){
        return view('admin.movies.create');
    }

    //Validates the attributes of the to-be added movie then stores those attributes in a new record in the database.
    public function store(){
       $attributes=request()->validate([
           'name' => ['required' , Rule::unique('movies' , 'name')],
           'slug' => ['required' , Rule::unique('movies', 'slug')],
           'actor_id' => ['required' , Rule::exists('actors' , 'id')],
           'category_id' => ['required' , Rule::exists('categories' , 'id')],
           'rating'=> 'required',
           'description' => 'required',
           'image'=>[]
       ]);
       movie::create($attributes);
       return redirect('/')->with('success' , 'Movie added!');
    }

    //Returns the edit movie view with the necessary attributes.
    public function edit(movie $movie){
        return view('admin.movies.edit' , ['movie' => $movie]);
    }

    //Validates the attributes of the to-be updated movie then stores those attributes in the same record in the database.
    public function update(movie $movie){
        $attributes=request()->validate([
            'name' => ['required' , Rule::unique('movies' , 'name')->ignore($movie->id)],
            'slug' => ['required' , Rule::unique('movies', 'slug')->ignore($movie->id)],
            'actor_id' => ['required' , Rule::exists('actors' , 'id')],
            'category_id' => ['required' , Rule::exists('categories' , 'id')],
            'rating'=> 'required',
            'description' => 'required',
            'image'=>[]
        ]);
        $movie->update($attributes);
        return back()->with('success' , 'Movie updated!');
    }

    //Deletes a certain record from the database.
    public function destroy(movie $movie)
    {
        $movie->delete();
        return back()->with("success" , 'Movie deleted.');
    }
}
