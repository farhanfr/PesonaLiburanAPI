<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CountModel;

class CountController extends Controller
{
   	public function get_count_city($area_id)
   	{
   		$getCount=CountModel::select('count_city')->where('area_id',$area_id)->get();
   		if ($getCount) {
    		return response()->json([
    			'status'=>200,
    			'data'=>$getCount,
    			'msg'=>'get city count success'
    		]);
    	}
    	else{
    		return response()->json([
    			'status'=>500,
    			'data'=>'',
    			'msg'=>'get city count failed'
    		]);	
    	}
   	}

    public function get_count_destination($area_id)
    {
      $getCount=CountModel::select('count_destination')->where('area_id',$area_id)->get();
      if ($getCount) {
        return response()->json([
          'status'=>200,
          'data'=>$getCount,
          'msg'=>'get destination count success'
        ]);
      }
      else{
        return response()->json([
          'status'=>500,
          'data'=>'',
          'msg'=>'get destination count failed'
        ]); 
      }
    }
}
