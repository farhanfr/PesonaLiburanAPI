<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use Hash;

class UserController extends Controller
{
    public function get_profile($user_id)
    {
    	$getProfile = UserModel::where('user_id',$user_id)->get();
    	if ($getProfile) {
    		return response()->json([
    			'status'=>200,
    			'data'=>$getProfile,
    			'msg'=>'get profile success'
    		]);
    	}
    	else{
    		return response()->json([
    			'status'=>500,
    			'data'=>'',
    			'msg'=>'get profile failed'
    		]);	
    	}
    }

    public function update_user(Request $request, $user_id)
    {
        $updateUser = UserModel::where('user_id',$user_id)->first();
        $updateUser->name_user = $request['name_user'];
        $updateUser->username = $request['username'];
        $updateUser->password = Hash::make($request['password']);
        $updateUser->about_user = $request['about_user'];
        $file = $request->file('user_img');
        if ($file == "") {
            $updateUser->update();
        }
        else{
            $fileName = $file->getClientOriginalName();
            $request->file('user_img')->move("img/",$fileName);
            $updateUser->user_img = $fileName;
            $updateUser->update();
        }
        
        if ($updateUser) {
            return response()->json([
                'status'=>200,
                'data'=>$updateUser,
                'msg'=>'update User profile success'
            ]);
        }
        else{
            return response()->json([
                'status'=>500,
                'data'=>'',
                'msg'=>'update User profile failed'
            ]);  
        }
    }
}
