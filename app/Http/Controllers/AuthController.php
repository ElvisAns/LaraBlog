<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class AuthController extends Controller
{
    public function index(Request $request){
        $validate = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
    
        if($validate->fails()){
            return response($validate->errors(),400);
        }
    
        $user=User::where('email', $request->email)->first();
    
        if (! $user || ! Hash::check($request->password, $user->password)) {
           return response([
                'email' => ['The provided credentials are incorrect.'],
            ],400);
        }
    
        return [
            "user_info" => $user,
            "token" =>$user->createToken($request->device_name)->plainTextToken
        ];
    }
}
