<?php

namespace App\Http\Controllers;


use App\Models\actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    //Returns a view "actors" with all actors from the actor table.
    public function actors(actor $actor)
    {
        $actors= $actor::all();
        return view('actors',[
            'actors' => $actors
        ]);
    }
    //Return a view "movies" with all movies related to a single actor from the actor table.
    public function actor(actor $actor)
    {
        return view('movies' , [
            'movies' => $actor->movie
        ]);
    }
}
