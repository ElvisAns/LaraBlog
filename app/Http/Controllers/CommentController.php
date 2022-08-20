<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comments;

class CommentController extends Controller
{
    public function destroy($comment_id){
        $comment = Comments::find($comment_id);
        if($post){
            $comment->delete();
            return ['reponse'=>'Comment successfully deleted'];
        }
        else{
            return response(['response'=>'Error deleting comment,Comment don\'t exist'],404);
        }
    }
}
