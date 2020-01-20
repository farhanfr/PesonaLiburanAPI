<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RequestDestinationModel;

class RequestDestinationController extends Controller
{
    public function add_req_destination(Request $request)
    {
    	$addReqDes=RequestDestinationModel::create([
    		'name_city'=>$request->name_city,
    		'name_destination'=>$request->name_destination,
    		'desc_destination'=>$request->desc_destination
    	]);

    	if ($addReqDes) {
    		return response()->json([
    			'status'=>200,
    			'data'=>[$addReqDes],
    			'msg'=>'add req success'
    		]);
    	}
    	else{
    		return response()->json([
    			'status'=>500,
    			'data'=>[$addReqDes],
    			'msg'=>'add req successl'
    		]);	
    	}
    }
}
