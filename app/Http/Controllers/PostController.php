<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PostModel;

class PostController extends Controller
{
    public function get_all_post()
    {
    	$getAllPost=PostModel::join('user','user.user_id','=','post.user_id')->orderBy('post_date','desc')->orderBy('post_time','desc')->get();
    	if ($getAllPost) {
    		return response()->json([
    			'status'=>200,
    			'data'=>$getAllPost,
    			'msg'=>'get post success'
    		]);
    	}
    	else{
    		return response()->json([
    			'status'=>500,
    			'data'=>$getAllPost,
    			'msg'=>'get post failed'
    		]);	
    	}
    }

    public function get_post_user($user_id)
    {
        $getPostUser=PostModel::where('post.user_id',$user_id)->join('user','user.user_id','=','post.user_id')->get();
        if ($getPostUser) {
            return response()->json([
                'status'=>200,
                'data'=>$getPostUser,
                'msg'=>'get post user success'
            ]);
        }
        else{
            return response()->json([
                'status'=>500,
                'data'=>'',
                'msg'=>'get post user failed'
            ]); 
        }   
    }

    public function get_post_detail($post_id)
    {
        $getPostDetail=PostModel::where('post_id',$post_id)->join('user','user.user_id','=','post.user_id')->get();
        if ($getPostDetail) {
            return response()->json([
                'status'=>200,
                'data'=>$getPostDetail,
                'msg'=>'get detail post success'
            ]);
        }
        else{
            return response()->json([
                'status'=>500,
                'data'=>'',  
                'msg'=>'get detail post failed'
            ]); 
        }   
    }

    // public function delete_post($post_id)
    // {
        
    // }

    public function post_upload(Request $request)
    {
        $postUpload=new PostModel();
        $postUpload->user_id=$request['user_id'];
        $postUpload->post_title=$request['post_title'];
        $postUpload->post=$request['post'];
        $postUpload->post_date=date('Y-m-d');
        date_default_timezone_set('Asia/Jakarta');
        $postUpload->post_time=date('H:i:s');

        $file = $request->file('post_img');
        $fileName = $file->getClientOriginalName();
        $request->file('post_img')->move("img/",$fileName);

        $postUpload->post_img = $fileName;
        $postUpload->save();

        if ($postUpload) {
            return response()->json([
                'status'=>200,
                'data'=>[$postUpload],
                'msg'=>'upload post success'
            ]);
        }
        else{
            return response()->json([
                'status'=>500,
                'data'=>'',  
                'msg'=>'upload post failed'
            ]); 
        }   
    }

    public function delete_post($post_id)
    {
        $deletePost=PostModel::where('post_id',$post_id)->first();
        $deletePost->delete();
        if ($deletePost) {
            return response()->json([
                'status'=>200,
                'data'=>[$deletePost],
                'msg'=>'delete post success'
            ]);
        }
        else{
            return response()->json([
                'status'=>500,
                'data'=>'',  
                'msg'=>'delete post failed'
            ]); 
        }
    }
}
