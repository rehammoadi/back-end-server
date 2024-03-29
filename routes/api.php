<?php

use Illuminate\Http\Request;
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
header('Access-Control-Allow-Headers: *');
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getLastNotices',"BaseApi@getLastNotices");

//signup
Route::post('/signup','BaseApi@signup_new_user');
//login
Route::post('/login','BaseApi@login_user');

//new new_objection
Route::post('/new_objection','BaseApi@NewObjection');
//report problem
Route::post('/new_problem','BaseApi@NewProblemInAnnouncement');
//new new_requestByUser 
Route::post('/new_requestByUser','BaseApi@new_requestByUser');


//search data
Route::post('/search_data','BaseApi@search_data');


