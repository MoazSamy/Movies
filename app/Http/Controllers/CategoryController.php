<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Returns a view loading all the categories from the categories table in the database.
    public function categories(Category $category)
    {
        $categories= $category::all();
        return view('categories',[
            'categories' => $categories
        ]);
    }
    //Returns a view loading all movies related to a single category in the database.
    public function category(Category $category)
    {
        return view('movies' , [
            'movies' => $category->movie
        ]);
    }
}
