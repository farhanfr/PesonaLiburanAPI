<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DestinationModel;
class DestinationController extends Controller
{
    public function get_destination($city_id)
    {
    	$getDestination=DestinationModel::where('city.city_id',$city_id)->join('city','city.city_id','=','destination.city_id')->limit(4)->get();
    	if ($getDestination) {
    		return response()->json([
    			'status'=>200,
    			'data'=>$getDestination,
    			'msg'=>'get destination success'
    		]);
    	}
    	else{
    		return response()->json([
    			'status'=>500,
    			'data'=>'',
    			'msg'=>'get destination failed'
    		]);	
    	}
    }

    public function show_more_destination($city_id)
    {
    	$showMoreDestination=DestinationModel::where('city.city_id',$city_id)->join('city','city.city_id','=','destination.city_id')->get();
    	if ($showMoreDestination) {
    		return response()->json([
    			'status'=>200,
    			'data'=>$showMoreDestination,
    			'msg'=>'show more success'
    		]);
    	}
    	else{
    		return response()->json([
    			'status'=>500,
    			'data'=>'',
    			'msg'=>'show more failed'
    		]);	
    	}	
    }

    public function search_destination(Request $request,$city_id)
    {
        $destinationSearch=$request->get('destinationSearch');
        $getDestinationSearch=DestinationModel::where('city_id',$city_id)->where('destination_name','like',"%{$destinationSearch}%")->get();
        if (count($getDestinationSearch) > 0) {
            return response()->json([
                'status'=>200,
                'data'=>$getDestinationSearch,
                'msg'=>'search data success'
            ]);
        }
        else{
            return response()->json([
                'status'=>500,
                'data'=>$getDestinationSearch,
                'msg'=>'search data failed'
            ]);   
        }
    }
}
