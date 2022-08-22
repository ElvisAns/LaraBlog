<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function get($user_id){
        $users = User::find($user_id);
        if($users)
            return $users;
        else
            return response(["response"=>"No user found"],404);
    }

    public function all(){
        $users = User::all();
        return $users;
    }

    public function create(Request $request){
        
        $validate = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
            'name' => 'required',
        ]);
    
        if($validate->fails()){
            return response($validate->errors(),400);
        }

        $user = new User();
        $post->name=$request->input('name');
        $post->email=$request->input('email');
        $post->password=Hash::make($request->input('password'));
        $post->created_at=Carbon::now()->timestamp;
        $post->updated_at=Carbon::now()->timestamp;
        try{
            $post->save();
            return ['reponse'=>'User Created'];
        }
        catch(\Exception $e)
        {
            Log::error($e);
            return response(['reponse'=>'Error creating new user'],400);
        }
    }
    
}
