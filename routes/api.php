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

Route::get('/test',function (){
    return response()->json(array(
        'id'=>1
    ));
});

//signup
Route::post('/signup',function (){
    return response()->json(array(
        'id'=>1
    ));
});

Route::post('/login',function (Request $request){

   // $req = json_decode($request->getContent(), true);
    $req =  $request->all();
    if($req['username'] && $req['password'] ){
        return response()->json(
               ['userData'=>['work'=>'work']]//$request->all()
        );
    }else{
        return response()->json(
              ['userData'=>[]]//$request->all()
            
        );
    }
});