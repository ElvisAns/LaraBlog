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
        $post = Posts::where("title",$title)->first();
        return $post;
    }

    public function create(Request $request){
        $post = new Posts();
        $post->title=$request->input('title');
        $post->caption=$request->input('');
        $post->content=$request->input('');
        $post->image_url=$request->input('');
        $post->category=$request->input('');
        $post->user_id=$request->input('');
        $post->created_at=$request->input('');
        $post->updated_at=$request->input('');
    }
}
