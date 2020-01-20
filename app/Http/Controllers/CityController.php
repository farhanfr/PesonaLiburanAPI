<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CityModel;
use App\CountModel;
use App\DestinationModel;

class CityController extends Controller
{
	public function get_city($area_id)
	{
		$getCity=CityModel::where('area.area_id',$area_id)->join('area','area.area_id','=','city.area_id')->get();

		if ($getCity) {
			$countCity=CityModel::where('area_id',$area_id)->count();
			$updateData1=CountModel::where('area_id',$area_id)->first();
			$updateData1->count_city=$countCity;
			if ($updateData1->update()) {
				$countDestination=DestinationModel::where('area_id',$area_id)->count();
				$updateData2=CountModel::where('area_id',$area_id)->first();
				$updateData2->count_destination=$countDestination;
				if ($updateData2->update()) {
					return response()->json([
						'status'=>200,
						'data'=>$getCity,
						'msg'=>'get city success'
					]);
				}
				else{
					return response()->json([
						'status'=>500,
						'data'=>'',
						'msg'=>'get city failed'
					]);	
				}
			}
			else{
				return response()->json([
					'status'=>500,
					'data'=>'',
					'msg'=>'get city failed'
				]);	
			}

		}
		else{
			return response()->json([
				'status'=>500,
				'data'=>'',
				'msg'=>'get city failed'
			]);	
		}
    	// if ($getCity) {
    	// 	return response()->json([
    	// 		'status'=>200,
    	// 		'data'=>$getCity,
    	// 		'msg'=>'get city success'
    	// 	]);
    	// }
    	// else{
    	// 	return response()->json([
    	// 		'status'=>500,
    	// 		'data'=>'',
    	// 		'msg'=>'get city failed'
    	// 	]);	
    	// }
	}

	public function search_city(Request $request)
	{
		$citySearch=$request->get('citySearch');
		$getCitySearch=CityModel::where('city_name','like',"%{$citySearch}%")->get();
		if (count($getCitySearch) > 0) {
			return response()->json([
				'status'=>200,
				'data'=>$getCitySearch,
				'msg'=>'search data success'
			]);
		}
		else{
			return response()->json([
				'status'=>500,
				'data'=>$getCitySearch,
				'msg'=>'search data failed'
			]);   
		}
	}
}
