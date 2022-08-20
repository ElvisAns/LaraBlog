<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

use Carbon\Carbon;

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
        $post->caption=$request->input('caption');
        $post->content=$request->input('content');
        $post->image_url=$request->input('image_url');
        $post->category=$request->input('category');
        $post->user_id=$request->input('user_id');
        $post->created_at=Carbon::now()->timestamp;
        $post->updated_at=Carbon::now()->timestamp;
        $post->save();
        return ['reponse'=>'Post Created'];
    }

    public function update($post_id,Request $request){
        $post = Posts::find($post_id);
        $post->title=$request->input('title');
        $post->caption=$request->input('caption');
        $post->content=$request->input('content');
        $post->image_url=$request->input('image_url');
        $post->category=$request->input('category');
        $post->user_id=$request->input('user_id');
        $post->updated_at=Carbon::now()->timestamp;
        $post->update();
        return ['reponse'=>'Post Updated'];
    }
}
