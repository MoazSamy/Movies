<?php

use App\Models\actor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminMoviesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Routes to GET home page and a single movie display page using its slug.
Route::get('/', [MovieController::class, 'index'])->name("home");
Route::get('movies/{movie:slug}', [MovieController::class, 'movie']);

//Routes to GET each category by its slug name , and to display all categories available.
Route::get('categories', [CategoryController::class, 'categories']);
Route::get('categories/{category:name}', [CategoryController::class, 'category']);

//Routes to GET each actor by their slug name , and to display all actors in the database.
Route::get('actors', [ActorController::class, 'actors']);
Route::get('actors/{actor:name}', [ActorController::class, 'actor']);

//Routes to GET the register page , and POST the attributes in database. Only available for guests.
Route::get('register', [RegisterController::class,'create'])->middleware('guest');
Route::post('register', [RegisterController::class,'store'])->middleware('guest');

//Routes to GET the login page , POST the attributes to store in database (Only available for guests) , and logout by destroying session (Only available for logged in users).
Route::get('login',[SessionController::class , 'create'])->middleware('guest');
Route::post('login',[SessionController::class , 'store'])->middleware('guest');
Route::post('logout',[SessionController::class , 'destroy'])->middleware('auth');

//Routes to GET the add movie page , and POST the attributes in the database. Only accessible by admins.
Route::get('admin/movies/create', [AdminMoviesController::class, 'create'])->middleware('admin');
Route::post('admin/movies', [AdminMoviesController::class, 'store'])->middleware('admin');

//Routes to GET all movies in the database and display them in a dashboard , GET the edit movie page , and PATCH the attributes of the edit in the database. Only accessible by admins.
Route::get('admin/movies', [AdminMoviesController::class, 'index'])->middleware('admin');
Route::get('admin/movies/{movie:id}/edit', [AdminMoviesController::class, 'edit'])->middleware('admin');
Route::patch('admin/movies/{movie:id}', [AdminMoviesController::class, 'update'])->middleware('admin');

//Route to DELETE a certain record in the database.
Route::delete('admin/movies/{movie:id}', [AdminMoviesController::class, 'destroy'])->middleware('admin');