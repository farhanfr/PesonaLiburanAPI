<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;
use Hash;

class LoginController extends Controller
{
    public function login_user(Request $request)
    {
    	$usernameInput=$request['username'];
		$passwordInput=$request['password'];
		$token=substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'), 1);

		$data=UserModel::where('username',$usernameInput)->get();
		if (count($data) > 0) {
			if (Hash::check($passwordInput, $data[0]->password)) {
				$getToken=UserModel::findOrFail($data[0]->user_id);
				$getToken->token_user=$token;
				if ($getToken->update()) {
					return response()->json([
						'status'=>200,
						'data'=>$data,
						'msg'=>'Login Success'
					]);
				}
				else {
					return response()->json([
						'status'=>401,
						'data'=>[],
						'msg'=>'get token failed'
					]);
				}
				
			}
			else {
					return response()->json([
						'status'=>401,
						'data'=>[],
						'msg'=>'username atau password salah'
					]);
				}
		}
		else {
			return response()->json([
				'status'=>401,
				'data'=>[],
				'msg'=>'username atau password salah'
			]);
		}
    }
}
