<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/getallcity/{area_id}', 'CityController@get_city');
Route::get('/getdestination/{city_id}', 'DestinationController@get_destination');
Route::get('/showmoredestination/{city_id}', 'DestinationController@show_more_destination');
Route::post('/searchcity', 'CityController@search_city');
Route::post('/searchdestination/{city_id}', 'DestinationController@search_destination');
Route::get('/getcountcity/{area_id}','CountController@get_count_city');
Route::get('/getcountdestination/{area_id}','CountController@get_count_destination');
Route::get('/getallpost','PostController@get_all_post');
Route::get('/getpostuser/{user_id}', 'PostController@get_post_user');
Route::get('/getdetailpost/{user_id}', 'PostController@get_post_detail');
Route::post('/uploadpost','PostController@post_upload');
Route::get('/getimgsubdes/{destination_id}', 'ImgSubDestinationController@get_img_subdes');
Route::post('/logout/{user_id}','LogoutController@logout_user');
Route::post('/addreqdes','RequestDestinationController@add_req_destination');
Route::get('/deletepost/{post_id}', 'PostController@delete_post');

Route::post('/loginuser','LoginController@login_user');
Route::post('/registeruser', 'RegisterController@register_user');
Route::get('/getprofile/{user_id}', 'UserController@get_profile');
Route::post('/updateprofile/{user_id}','UserController@update_user' );


