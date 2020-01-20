<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImgSubDestinationModel;

class ImgSubDestinationController extends Controller
{
    public function get_img_subdes($destination_id)
    {
    	$getImgSubdes = ImgSubDestinationModel::where('destination_id',$destination_id)->get();
    	if ($getImgSubdes) {
            return response()->json([
                'status'=>200,
                'data'=>$getImgSubdes,
                'msg'=>'get img sub destination success'
            ]);
        }
        else{
            return response()->json([
                'status'=>500,
                'data'=>$getImgSubdes,
                'msg'=>'get img sub destination failed'
            ]); 
        }   
    }
}
