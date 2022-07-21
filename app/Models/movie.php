<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    use HasFactory;
    
    //Mass assignment
    protected $guarded=[];

    //Eager loading to prevent multiple queries on the same tables.
    protected $with = ["category" , "actor"];
    
    //Returns relations between movies and categories tables. (Many to one)
    public function category()
    {
        return $this -> belongsTo(Category::class);
    }

    //Returns relation between movies and actors tables. (Many to one)
    public function actor()
    {
        return $this -> belongsTo(actor::class);
    }
}
