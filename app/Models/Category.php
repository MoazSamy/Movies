<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //Relation between categories and movies table. (One to many)
    public function movie()
    {
        return $this ->hasMany(movie::class);
    }
}
