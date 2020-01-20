<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserModel;

class LogoutController extends Controller
{
    public function logout_user($user_id)
    {
    	$logoutUser=UserModel::where('user_id',$user_id)->first();
  		$logoutUser->token_user="0";
  		$logoutUser->update();
  		if ($logoutUser) {
  			return response()->json([
  			'status'=>200,
				'data'=>[$logoutUser],
				'msg'=>'Logout berhasil'
  			]);
  		}
  		else{
  			return response()->json([
  				'status'=>500,
				'data'=>'',
				'msg'=>'Logout gagal'
  			]);	
  		}
    }
}
