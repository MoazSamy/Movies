<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actor extends Model
{
    use HasFactory;
    
    //Mass assignment
    protected $guarded=[];
    
    //Relation between actor and movie tables. (One to many)
    public function movie()
    {
        return $this ->hasMany(movie::class);
    }
}
