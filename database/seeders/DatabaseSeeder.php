<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\actor;
use App\Models\movie;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        
        $ap = actor::create([
            "name" => "Al Pacino",
        ]);
        $th = actor::create([
            "name" => "Tom Hanks",
        ]);
        
        $action = Category::create([
            "name" => "Action",
            "slug" => "action"
        ]);
        $drama = Category::create([
            "name" => "Drama",
            "slug" => "drama"
        ]);
        $tgf= movie::create([
            "name" => "The Godfather",
            "slug" => "The-Godfather",
            "description"=>"<p>A film about the italian mob in America</p>",
            "actor_id" => $ap->id,
            "image"=>"https://m.media-amazon.com/images/M/MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_.jpg",
            "category_id"=> $action->id,
            "rating" => 5

        ]);
        $sow= movie::create([
            "name" => "Scent of a woman",
            "slug" => "Scent-of-a-woman",
            "description"=>"<p>A yale student at the aid of a former colonel.</p>",
            "actor_id" => $ap->id,
            "image"=>"https://m.media-amazon.com/images/M/MV5BZTM3ZjA3NTctZThkYy00ODYyLTk2ZjItZmE0MmZlMTk3YjQwXkEyXkFqcGdeQXVyNTA4NzY1MzY@._V1_.jpg",
            "category_id"=> $drama->id,
            "rating" => 4
        ]);
        $big= movie::create([
            "name" => "Big",
            "slug" => "big",
            "description"=>"<p>A boy who wished to be grown overnight.</p>",
            "actor_id" => $th->id,
            "image"=>"https://m.media-amazon.com/images/I/719-Gr9WKVL._AC_SY500_.jpg",
            "category_id"=> $drama->id,
            "rating" => 3
        ]);
        
    }
}
