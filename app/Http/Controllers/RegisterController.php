<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use Hash;

class RegisterController extends Controller
{
    public function register_user(Request $request)
    {
    	$registerUser=UserModel::create([
    		'name_user'=>$request->name_user,
    		'username'=>$request->username,
    		'password'=>Hash::make($request->password),
    		'about_user'=>$request->about_user,
            'user_img'=>'default-profile.png'
    	]);

    	if ($registerUser) {
    		return response()->json([
    			'status'=>200,
    			'data'=>[$registerUser],
    			'msg'=>'Register Berhasil'
    		]);
    	}
    	else{
    		return response()->json([
    			'status'=>500,
    			'data'=>[],
    			'msg'=>'Register gagal'
    		]);	
    	}
    }
}
