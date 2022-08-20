<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class PostController extends Controller
{
    public function index($limit=null){
        $posts = Posts::limit($limit)->get();
        return $posts;
    }

    public function read($title){
        $post = Posts::where("title","=",$title)->
    }
}
