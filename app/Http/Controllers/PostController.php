<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Comments;

use Carbon\Carbon;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function index($limit=null){
        $posts = Posts::limit($limit)->get();
        return $posts;
    }

    public function read($slug){
        $post_title = Str::replace('-'," ",$slug);
        $post = Posts::where("title",$post_title)->first();
        if($post==NULL){
            return response(["response"=>"Post not found"],404);
        }
        $response = ["post"=>$post,"comments"=>$post->comments->count()];
        return $response;
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
        try{
            $post->save();
            return ['reponse'=>'Post Created'];
        }
        catch(\Exception $e)
        {
            Log::error($e);
            return response(['reponse'=>'Error creating new post'],400);
        }
    }

    public function update($post_id,Request $request){
        $post = Posts::find($post_id);
        $post->updated_at=Carbon::now()->timestamp;
        try{
            $post->update($request->all());
            return ['reponse'=>'Post Updated'];
        }
        catch(\Exception $e){
            Log::error($e);
            return response(['reponse'=>'Error updating post'],400);
        }
    }

    public function destroy($post_id){
        $post = Posts::find($post_id);
        if($post){
            $post->comments()->delete();
            $post->delete();
            return ['reponse'=>'Post Updated'];
        }
        else{
            return response(['response'=>'Error deleting post,post don\'t exist']);
        }
    }
}
